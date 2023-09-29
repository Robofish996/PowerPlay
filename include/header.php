<?php

include_once 'config.php';
define("APPURL", "http://localhost/Powerplay");
session_start();


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}

// Retrieve cart items from the database.
$cartItems = $pdo->query("SELECT * FROM cart")->fetchAll(PDO::FETCH_OBJ);

$totalPrice = 0;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Power Play</title>
    <link rel="stylesheet" href="../css/store.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/carousel.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="hamburger-menu custom-hamburger-menu" id="hamburger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>

            </div>
            <!-- Navbar buttons -->
            <div class="navbar-buttons">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                    // If logged in, display the user dropdown menu
                    echo '
            <div class="user-dropdown">
                <div class="dropdown-content">
                    <button class="dropdown-button" onclick="location.href=\'./settings.php\';">Settings</button>
                    <button class="dropdown-button" onclick="location.href=\'./logout.php\';">Logout</button>
                </div>
            </div>';
                } else {
                    // If not logged in, display the login and signup buttons
                    echo '<a href="login.php" class="login-button">Login</a>';
                    echo '<a href="signup.php" class="signup-button">Sign Up</a>';
                }
                ?>
    </nav>