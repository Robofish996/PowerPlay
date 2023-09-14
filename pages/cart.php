<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); 
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Database connection
$connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the 'remove_product' form was submitted
if (isset($_POST['remove_product']) && isset($_POST['remove_product_id'])) {
    $productIDToRemove = $_POST['remove_product_id'];

    // Check if the product ID exists in the cart
    if (in_array($productIDToRemove, $_SESSION['cart'])) {
        // Find the index of the product to remove
        $indexToRemove = array_search($productIDToRemove, $_SESSION['cart']);

        // Remove the product from the cart array
        unset($_SESSION['cart'][$indexToRemove]);
    }
}

// Calculate the total price
$totalPrice = 0;
$cartItems = $_SESSION['cart'];
$ordersData = array(); // To store order data

foreach ($cartItems as $cartItem) {
    $productID = $cartItem['product_id'];
    $productPrice = getProductPrice($productID);
    $quantity = $cartItem['quantity']; // You should have this in your cart data
    
    // Calculate the total price for this item
    $itemTotalPrice = $productPrice * $quantity;
    
    // Add item data to ordersData
    $ordersData[] = array(
        'product_id' => $productID,
        'quantity' => $quantity,
        'item_total' => $itemTotalPrice
    );

    // Add the item total price to the total
    $totalPrice += $itemTotalPrice;
}

// Store the total price in the session
$_SESSION['total_price'] = $totalPrice;

// Function to retrieve product price (replace with your actual method)
function getProductPrice($productID)
{
    // Database connection
    $connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to retrieve product price based on productID
    $query = "SELECT product_price FROM featured_products WHERE product_id = $productID";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productPrice = $row['product_price'];
    } else {
        $productPrice = 0; 
    }

    // Close the database connection
    mysqli_close($connection);

    return $productPrice;
}

// Check if the checkout form was submitted
if (isset($_POST['checkout'])) {
    $userID = $_SESSION['user_id'];
    $shippingAddress = mysqli_real_escape_string($connection, $_POST['shipping_address']);
    $shippingCity = mysqli_real_escape_string($connection, $_POST['shipping_city']);
    $shippingState = mysqli_real_escape_string($connection, $_POST['shipping_state']);
    $shippingZip = mysqli_real_escape_string($connection, $_POST['shipping_zip']);

    // Start a database transaction
    mysqli_autocommit($connection, false);

    // Insert the order into the orders table
    $insertOrderQuery = "INSERT INTO orders (user_id, order_date, total_price, shipping_address, shipping_city, shipping_state, shipping_zip) VALUES ('$userID', NOW(), '$totalPrice', '$shippingAddress', '$shippingCity', '$shippingState', '$shippingZip')";

    if (mysqli_query($connection, $insertOrderQuery)) {
        // Get the order ID of the inserted order
        $orderID = mysqli_insert_id($connection);

        // Insert order items into the order_items table
        foreach ($ordersData as $orderItem) {
            $productID = $orderItem['product_id'];
            $quantity = $orderItem['quantity'];
            $itemTotalPrice = $orderItem['item_total'];
            
            $insertOrderItemQuery = "INSERT INTO order_items (order_id, product_id, quantity, item_total) VALUES ('$orderID', '$productID', '$quantity', '$itemTotalPrice')";
            
            if (!mysqli_query($connection, $insertOrderItemQuery)) {
                // Error occurred while inserting order items, rollback the transaction
                mysqli_rollback($connection);
                echo "Error: " . mysqli_error($connection);
                exit();
            }
        }

        // Commit the transaction
        mysqli_commit($connection);

        // Clear the cart
        $_SESSION['cart'] = array();

        // JavaScript to display a popup message and redirect
        echo '<script>';
        echo 'alert("Thanks for your purchase!");';
        echo 'window.location.href = "store.php";';
        echo '</script>';
        exit();
    } else {
        // Error occurred while inserting the order, rollback the transaction
        mysqli_rollback($connection);
        echo "Error: " . mysqli_error($connection);
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
    <link rel="stylesheet" href="../css/cart.css"> <!-- Replace with your CSS file -->
    <title>Your Cart</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <!-- Hamburger menu button here if needed -->
            </div>
            <!-- Navbar buttons -->
            <div class="navbar-buttons">
                <?php
                // Check if the user is logged in (you can customize this condition)
                if (isset($_SESSION['username'])) {
                    // Display the user dropdown menu with the profile icon
                    echo '
                    <div class="user-dropdown">
                        <div class="profile-circle">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="dropdown-content">
                            <a href="./settings.php">Settings</a>
                            <a href="./logout.php">Logout</a>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </nav>

    <!-- Cart Items Section -->
    <section class="cart-items">
        <div class="container">
            <h2>Your Cart</h2>
            <ul class="cart-list">
                <?php
                if (!empty($products)) {
                    foreach ($products as $product) {
                        echo '<li class="cart-item">';
                        echo '<div class="cart-item-details">';
                        echo '<img src="' . $product['product_image'] . '" alt="' . $product['product_name'] . '">';
                        echo '<h3>' . $product['product_name'] . '</h3>';
                        echo '<p>Price: R ' . number_format($product['product_price'], 2) . '</p>';
                        echo '</div>';
                        echo '<div class="cart-item-actions">';
                        // Add a remove button for each product
                        echo '<form method="post">';
                        echo '<input type="hidden" name="remove_product_id" value="' . $product['product_id'] . '">';
                        echo '<button type="submit" name="remove_product">Remove</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</li>';
                    }
                } else {
                    echo '<li>Your cart is empty.</li>';
                }
                ?>
            </ul>
            <!-- Shipping Details Section -->
            <section class="shipping-details">
                <h2>Shipping Details</h2>
                <form method="post" action="cart.php">
                    <label for="shipping_address">Shipping Address:</label>
                    <input type="text" id="shipping_address" name="shipping_address" required>

                    <label for="shipping_city">City:</label>
                    <input type="text" id="shipping_city" name="shipping_city" required>

                    <label for="shipping_state">State:</label>
                    <input type="text" id="shipping_state" name="shipping_state" required>

                    <label for="shipping_zip">Zip Code:</label>
                    <input type="text" id="shipping_zip" name="shipping_zip" required>

                    <!-- Display the total price -->
                    <div class="cart-total">
                        <strong>Total Price:</strong> R <?php echo number_format($totalPrice, 2); ?>
                    </div>

                    <!-- Checkout button -->
                    <button type="submit" name="checkout">Checkout</button>
                </form>
            </section>
        </div>
    </section>
</body>

</html>
