<?php
// Include necessary files and configure your database connection (already done in your code).
include_once '../include/header.php';
include_once '../include/config.php';

// Check if the payment was successful (you may have a mechanism to determine this)
$paymentSuccessful = true; // Replace with your actual payment check

if ($paymentSuccessful) {
    // Clear the cart data (e.g., delete records from the cart table).
    $pdo->exec("DELETE FROM cart"); // Example: Delete all records from the 'cart' table
}

// Rest of your "thank you" page content
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Your head section ... -->
</head>

<body>
    <!-- ... Your "thank you" page content ... -->
    <?php
    include_once '../include/footer.php';

    ?>