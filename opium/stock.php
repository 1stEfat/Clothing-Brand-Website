<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed']));
}

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

$product_name = $data['product_name'];
$size = $data['size'];

// Query the database to check quantity
$sql = "SELECT quantity_stock FROM item WHERE item_name = ? AND size = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $product_name, $size);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantity = $row['quantity_stock'];

    if ($quantity > 0) {
        echo json_encode([
            'success' => true,
            'product_name' => $product_name,
            'size' => $size,
            'quantity' => $quantity
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'product_name' => $product_name,
            'size' => $size
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'product_name' => $product_name,
        'size' => $size,
        'error' => 'Product not found'
    ]);
}

$stmt->close();
$conn->close();