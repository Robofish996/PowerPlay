<?php
// Include your database configuration here
include_once '../include/config.php';

if (isset($_POST['remove'])) {
    $productId = $_POST['product_id'];

    // Perform the database query to remove the product from the cart
    // Replace 'cart' with your actual database table name
    $stmt = $pdo->prepare("DELETE FROM cart WHERE id = :product_id");
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect back to the cart page or update the cart UI
        header("Location: cart.php");
        exit();
    } else {
        // Handle the error, e.g., display an error message
        echo "Failed to remove product from cart.";
    }
}
