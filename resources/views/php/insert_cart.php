<?php 

require_once base_path('resources/views/php/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from POST request
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Insert data into the cart table
    $sql = "INSERT INTO cart (product_id, qty) VALUES ('$product_id', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        Header('Location: /cart');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>