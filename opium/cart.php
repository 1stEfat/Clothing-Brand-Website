<?php
include 'connect.php';


$data = json_decode(file_get_contents('php://input'), true);

$product_name = $data['name'];
$quantity_requested = $data['quantity'];
$size = $data['size'];


$sql = "SELECT quantity_stock 
        FROM item 
        WHERE item_name = ? AND size = ? AND quantity_stock >= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $product_name, $size, $quantity_requested);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    echo json_encode(['success' => true]);
} else {
    
    echo json_encode(['success' => false, 'message' => 'Not enough stock available']);
}

$stmt->close();
$conn->close();
?>
