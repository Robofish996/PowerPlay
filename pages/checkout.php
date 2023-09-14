<?php
session_start();
// Get the user ID from the session
$userID = $_SESSION['user_id'];

// Check if the user is logged in (you can customize this condition)
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Check if the total price is set in the session
if (!isset($_SESSION['total_price'])) {
    header('Location: cart.php'); // Redirect to cart page if total price is not set
    exit();
}

// Database connection
$connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get the total price from the session
$totalPrice = $_SESSION['total_price'];

// Get other form values
$shippingAddress = mysqli_real_escape_string($connection, $_POST['shipping_address']);
$shippingCity = mysqli_real_escape_string($connection, $_POST['shipping_city']);
$shippingState = mysqli_real_escape_string($connection, $_POST['shipping_state']);
$shippingZip = mysqli_real_escape_string($connection, $_POST['shipping_zip']);

// Insert the order into the orders table
$insertOrderQuery = "INSERT INTO orders (user_id, order_date, total_price, shipping_address, shipping_city, shipping_state, shipping_zip) VALUES ('$userID', NOW(), '$totalPrice', '$shippingAddress', '$shippingCity', '$shippingState', '$shippingZip')";

if (mysqli_query($connection, $insertOrderQuery)) {
    // Order successfully inserted
    // You may want to clear the cart or perform other actions here
    // Redirect to a thank you page or order confirmation page
    header('Location: order_confirmation.php');
    exit();
} else {
    // Error occurred while inserting the order
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css"> <!-- Replace with your CSS file -->
    <title>Checkout</title>
</head>
<body>
    <!-- Checkout Form Section -->
    <section class="checkout-form">
        <h2>Checkout</h2>
        <form method="post">
            <!-- Add form fields for shipping details -->
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
                <strong>Total Price:</strong> R <?php echo number_format($_SESSION['total_price'], 2); ?>
            </div>

            <!-- Confirm Order button -->
            <button type="submit" name="confirm_order">Confirm Order</button>
        </form>
    </section>

    <!-- Include your footer or any other necessary elements here -->

</body>
</html>
