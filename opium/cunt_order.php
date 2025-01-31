<?php
// Start session
session_start();

// Log errors instead of displaying them
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(["success" => false, "message" => "Please log in to checkout."]);
    exit;
}

// Include database connection
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['email'];
    
    $stmt = $conn->prepare("SELECT user_id FROM user WHERE user_email = ?");
    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "SQL Error: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "User not found."]);
        exit;
    }

    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];

    // Read and decode raw POST data
    $rawData = file_get_contents("php://input");
    $inputData = json_decode($rawData, true);

    

    $address = trim($inputData['finaladdress']);
    $payment_method = trim($inputData['finalpayment_method']);
    $total_price = floatval($inputData['finaltotal']);
    $item_id = intval($inputData['finalitem_id']);
    $quantity = intval($inputData['finalquantity']);

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Insert into `order` table
        $order_query = "INSERT INTO `order` (user_id, order_date, order_address, payment_method, order_price) VALUES (?, NOW(), ?, ?, ?)";
        $stmt = $conn->prepare($order_query);
        if (!$stmt) {
            throw new Exception("Order Insert Error: " . $conn->error);
        }
        $stmt->bind_param("issd", $user_id, $address, $payment_method, $total_price);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        // Insert into `order_item` table
        $order_item_query = "INSERT INTO order_item (order_id, item_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($order_item_query);
        if (!$stmt) {
            throw new Exception("Order Item Insert Error: " . $conn->error);
        }
        $stmt->bind_param("iii", $order_id, $item_id, $quantity);
        $stmt->execute();

        // Update `quantity_stock` in the `item` table
        $update_stock_query = "UPDATE item SET quantity_stock = quantity_stock - ? WHERE item_id = ? AND quantity_stock >= ?";
        $stmt = $conn->prepare($update_stock_query);
        if (!$stmt) {
            throw new Exception("Stock Update Error: " . $conn->error);
        }
        $stmt->bind_param("iii", $quantity, $item_id, $quantity);
        $stmt->execute();

        // Insert into `payment` table
        $payment_query = "INSERT INTO `payment` (order_id, payment_method, payed_amount, payment_date) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($payment_query);
        if (!$stmt) {
            throw new Exception("Payment Insert Error: " . $conn->error);
        }
        $stmt->bind_param("isd", $order_id, $payment_method, $total_price);
        $stmt->execute();

        // Commit transaction
        $conn->commit();

        echo json_encode(["success" => true, "message" => "Order placed successfully."]);
    } catch (Exception $e) {
        $conn->rollback();
        header("Location: CART.html");

    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

$conn->close();
?>
