<?php
require_once base_path('resources/views/php/conn.php');
if(isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $product_id = $_POST['id'];
    
    $checkCartQuery = "SELECT * FROM cart WHERE product_id = $product_id";
    $checkCartResult = $conn->query($checkCartQuery);
    
    if ($checkCartResult->num_rows > 0) {
        $updateCartQuery = "UPDATE cart SET qty = qty + $quantity WHERE product_id = $product_id";
        $conn->query($updateCartQuery);
    } else {
        $insertCartQuery = "INSERT INTO cart (product_id, qty) VALUES ($product_id, $quantity)";
        $conn->query($insertCartQuery);
    }
    
    header('Location: /cart');
    exit();
}
?>