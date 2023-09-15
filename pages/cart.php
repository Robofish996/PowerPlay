<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];
    
    // Check if the product is already in the cart
    if (!in_array($productID, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productID;
        echo "Product added to the cart.";
    } else {
        echo "Product is already in the cart.";
    }
}

// Remove a product from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart']) && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];
    
    // Find the index of the product in the cart
    $index = array_search($productID, $_SESSION['cart']);
    
    // If found, remove it from the cart
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        echo "Product removed from the cart.";
    } else {
        echo "Product not found in the cart.";
    }
}

// Fetch product information for items in the cart
$cartItems = array();
$totalPrice = 0;

if (!empty($_SESSION['cart'])) {
    // Database connection
    $connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch product information for each item in the cart
    foreach ($_SESSION['cart'] as $productID) {
        $query = "SELECT product_id, product_name, product_price, product_image_path FROM products WHERE product_id = $productID";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $cartItems[] = $row;

            // Calculate the total price for this item
            $totalPrice += $row['product_price'];
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
</head>

<body>
    <h1>Your Cart</h1>

    <!-- List of products in the cart -->
    <?php if (!empty($cartItems)) : ?>
        <ul>
            <?php foreach ($cartItems as $item) : ?>
                <li>
                    <img src="<?php echo $item['product_image_path']; ?>" alt="<?php echo $item['product_name']; ?>" width="100">
                    <?php echo $item['product_name']; ?> - Price: R <?php echo number_format($item['product_price'], 2); ?>

                    <!-- Form to remove the product from the cart -->
                    <form method="post">
                        <input type="hidden" name="remove_from_cart" value="1">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                        <button type="submit">Remove from Cart</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <!-- Grand Total -->
    <p>Grand Total: R <?php echo number_format($totalPrice, 2); ?></p>

    <!-- Link back to the product page -->
    <a href="mice.php">Back to Product Page</a>
</body>

</html>
