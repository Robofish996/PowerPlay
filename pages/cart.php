<?php
// Include necessary files and configure your database connection (already done in your code).
include_once '../include/header.php';
include_once '../include/config.php';

// Retrieve cart items from the database.
$cartItems = $pdo->query("SELECT * FROM cart")->fetchAll(PDO::FETCH_OBJ);
$totalPrice = 0;

$paymentSuccessful = False; // Set this to true only after a successful payment

if ($paymentSuccessful) {
    // Clear the cart data (e.g., delete records from the cart table).
    $pdo->exec("DELETE FROM cart"); // Example: Delete all records from the 'cart' table
}

?>

<!-- Cart page HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Your head section ... -->
</head>

<body>

     <div class="container">

        <div class="row">
            <table class="table">

                <thead class="table-primary">
                    <tr>

                        <th scope="col ">Name</th>
                        <th scope="col ">Quantity</th>
                        <th scope="col ">Price</th>
                        <th scope="col ">Remove</th>
                    </tr>
                </thead>
                <?php foreach ($cartItems as $cartItem) : ?>
                    <tbody>
                        <tr>

                            <td><?php echo $cartItem->name; ?></td>
                            <td><?php echo $cartItem->quantity; ?></td>
                            <td><?php echo $cartItem->price; ?></td>
                            <td>
                                <form action="<?php echo APPURL; ?>/shopPages/remove_from_cart.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $cartItem->id; ?>">
                                    <button type="submit" name="remove" class="btn btn-secondary text-white btn-sm">Remove</button>
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
                    <td>R<?php echo number_format($totalPrice, 2); ?></td>
                    <td>
                        <div id="paypal-button-container"></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=Ac4BivSthi2Ef4zH2li-a6Gqs3fh6ix5rmHyQl28-g23BRjKWqbSFPfd6tiOBaVKORFQhtzhsvze-Gnc&currency=USD"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: <?php echo $totalPrice; ?>, // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function (orderData) {
                        // Set paymentSuccessful to true after a successful payment
                        <?php $paymentSuccessful = true; ?>
                        window.location.href = '../pages/store.php';
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>
    <?php
     include_once '../include/footer.php';
     ?>
   
</body>

</html>
