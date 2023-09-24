<?php
include_once '../include/header.php';
include_once '../include/config.php';

// Check if the payment was successful
$paymentSuccessful = true; 

// Define the thank you message
$thankYouMessage = $paymentSuccessful ? 'Thank you for your purchase!' : 'Payment failed.';

// Clear the cart data if payment was successful
if ($paymentSuccessful) {
    $pdo->exec("DELETE FROM cart"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>

</head>
<body>
    <div class="container">
        <h1>Thank You</h1>
        <p class="message"><?php echo $thankYouMessage; ?></p>
        <p>You will recieve a email with the invoice number</p>
    </div>
    <script>
        setTimeout(function () {
            window.location.href = 'store.php';
        }, 5000); // 5000 milliseconds (5 seconds)
    </script>
</body>
<?php include_once '../include/footer.php'; ?>
</html>
