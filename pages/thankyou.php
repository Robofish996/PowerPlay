<?php
// Include necessary files and configure your database connection (already done in your code).
include_once './config.php';
// Check if the payment was successful (you may have a mechanism to determine this)
$paymentSuccessful = true; // Replace with your actual payment check
if ($paymentSuccessful) {
    // Clear the cart data (e.g., delete records from the cart table).
    $pdo->exec("DELETE FROM combined_orders"); // Example: Delete all records from the 'cart' table
}
// Rest of your "thank you" page content
?>
<!DOCTYPE html>
<html lang="en">
<head>
<form action="../pages/store.php">
        <button type="submit">Back to Product Page</button>
    </form></head>
<body>
    <!-- ... Your "thank you" page content ... -->
</body>
</html>