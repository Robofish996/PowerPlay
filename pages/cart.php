<?php
// Include necessary files and configure your database connection (already done in your code).
include_once '../include/header.php';
include_once '../include/config.php';

// Retrieve cart items from the database.
$cartItems = $pdo->query("SELECT * FROM cart")->fetchAll(PDO::FETCH_OBJ);
$totalPrice = 0;
$paymentSuccessful = false; // Set this to true only after a successful payment

if ($paymentSuccessful) {
    // Clear the cart data (e.g., delete records from the cart table).
    $pdo->exec("DELETE FROM cart"); // Example: Delete all records from the 'cart' table
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your page title and other head elements here -->
</head>
<body>
    <div class="container cart-container">
        <div class="row">
            <h1 class="cart-title">Your Cart</h1>
            <table class="table cart-table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <?php foreach ($cartItems as $cartItem) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $cartItem->name; ?></td>
                            <td><?php echo $cartItem->quantity; ?></td>
                            <td>$<?php echo $cartItem->price; ?></td>
                            <td>
                                <form action="<?php echo APPURL; ?>/pages/remove_from_cart.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $cartItem->id; ?>">
                                    <button type="submit" name="remove" class="btn btn-secondary btn-sm cart-remove-btn">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        // Calculate the product total (price multiplied by quantity) and add it to the total price
                        $productTotal = $cartItem->price * $cartItem->quantity;
                        $totalPrice += $productTotal;
                        ?>
                    </tbody>
                <?php endforeach; ?>
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tr>
                    <td colspan="2"></td>
                    <td>$<?php echo number_format($totalPrice, 2); ?></td>
                    <td>
                        <div id="paypal-button-container"></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container cart-buttons">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=Ac4BivSthi2Ef4zH2li-a6Gqs3fh6ix5rmHyQl28-g23BRjKWqbSFPfd6tiOBaVKORFQhtzhsvze-Gnc&currency=USD"></script>
        <div id="paypal-button-container"></div>
    </div>
<!-- Category Buttons Section -->
<section>
    <h4 class="productButtonHeading">Feel free to browse our collection</h4>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <a href="products.php?id=1" class="btn btn-primary btn-block">Mice</a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="products.php?id=2" class="btn btn-primary btn-block">Keyboards</a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="products.php?id=3" class="btn btn-primary btn-block">Monitors</a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="products.php?id=4" class="btn btn-primary btn-block">Laptops</a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="products.php?id=5" class="btn btn-primary btn-block">Headsets</a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="products.php?id=6" class="btn btn-primary btn-block">Gaming Chairs</a>
            </div>
        </div>
    </div>
</section>
    <?php
    include_once '../include/footer.php';
    ?>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Render the PayPal button
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    currency_code: 'USD', // Change to your currency code
                                    value: <?php echo $totalPrice; ?>, // Use the total price from PHP
                                },
                            }, ],
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            // Handle a successful payment (e.g., redirect to a thank you page)
                            window.location.href = 'your-thank-you-page.php';
                        });
                    },
                }).render('#paypal-button-container');
            })
        </script>
</body>
</html>
