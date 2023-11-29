<?php 

require_once base_path('resources/views/php/conn.php');

    $cart_id = $_GET['cart_id'];

    // Delete the item from the cart table
    $sql = "DELETE FROM cart WHERE cart_id='$cart_id'";
    
    if ($conn->query($sql) === TRUE) {
        Header('Location: /cart');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>