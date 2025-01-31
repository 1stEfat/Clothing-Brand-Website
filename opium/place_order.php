<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(["success" => false, "message" => "Please log in to checkout."]);
    exit;
}

// Include database connection
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user ID based on session email
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT user_id FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "User not found."]);
        exit;
    }

    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];

    // Read the raw POST data
    $rawData = file_get_contents("php://input");
    $inputData = json_decode($rawData, true); // Decode JSON data into an array

    // Log raw data for debugging
    file_put_contents('debug.log', "Raw JSON: " . $rawData . PHP_EOL, FILE_APPEND);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(["success" => false, "message" => "Invalid JSON data."]);
        exit;
    }

    // Extract individual constants
    $address = trim($inputData['finaladdress']);
    $payment_method = trim($inputData['finalpayment_method']);
    $total_price = floatval($inputData['finaltotal']);
    $item_id = intval($inputData['finalitem_id']);
    $quantity = intval($inputData['finalquantity']);
    $price = floatval($inputData['finalprice']);
    $size = $inputData['finalitem_size'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Insert into `order` table
        $order_query = "INSERT INTO `order` (user_id, order_date, order_address, payment_method, order_price) VALUES (?, NOW(), ?, ?, ?)";
        $stmt = $conn->prepare($order_query);
        $stmt->bind_param("issd", $user_id, $address, $payment_method, $total_price);
        $stmt->execute();
        $order_id = $stmt->insert_id; // Get the generated order ID

        // Insert into `order_item` table
        $order_item_query = "INSERT INTO order_item (order_id, item_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($order_item_query);
        $stmt->bind_param("iii", $order_id, $item_id, $quantity);
        $stmt->execute();

        // Insert into `payment` table
        $payment_query = "INSERT INTO `payment` (order_id, payment_method, payed_amount, payment_date) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($payment_query);
        $stmt->bind_param("isd", $order_id, $payment_method, $total_price);
        $stmt->execute();

        // Commit transaction
        $conn->commit();

        echo json_encode(["success" => true, "message" => "Order placed successfully."]);
    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        echo json_encode(["success" => false, "message" => "Failed to place order. Error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

$conn->close();
?>
