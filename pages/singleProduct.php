<?php
include_once '../include/header.php';
include_once '../include/config.php';

// Initialize an empty cart array in the session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if 'id' is set in the query parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details based on 'id'
    $productQuery = $pdo->prepare("SELECT * FROM products WHERE product_id = :id");
    $productQuery->bindParam(':id', $id);
    $productQuery->execute();
    $singleProduct = $productQuery->fetch(PDO::FETCH_OBJ);

    // Check if a product was found
    if ($singleProduct) {
        // Check if the product is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['product_id'] == $id) {
                // Update quantity and price for existing product in the cart
                $cartItem['quantity']++;
                $cartItem['price'] += $singleProduct->product_price;
                $found = true;
                break;
            }
        }

        // If the product is not in the cart, add it as a new item
        if (!$found) {
            $cartItem = array(
                'product_id' => $id,
                'name' => $singleProduct->product_name,
                'quantity' => 1,
                'price' => $singleProduct->product_price,
            );
            $_SESSION['cart'][] = $cartItem;
        }

        // Insert the selected product into the cart table in the database
        $stmt = $pdo->prepare("INSERT INTO cart (name, quantity, price, payment) VALUES (?, 1, ?, ?)");
        $stmt->execute([$singleProduct->product_name, $singleProduct->product_price, $singleProduct->product_price]);

        // Redirect to the cart page or show a success message
        header('Location: cart.php');
        exit();
    } else {
        // Handle the case where no product was found for the given ID
        echo "Product not found.";
    }
} else {
    // Handle the case where 'id' is not set in the query parameters
    echo "Product ID not provided.";
}

include_once '../include/footer.php';
?>

include_once '../include/footer.php';