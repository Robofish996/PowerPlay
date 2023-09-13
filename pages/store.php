<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/store.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Your Store</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
<!-- Navbar buttons -->
<div class="navbar-buttons">
    <?php
    // Check if the user is logged in (you can customize this condition)
    if (isset($_SESSION['username'])) {
        // If logged in, display the user dropdown menu
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
    } else {
        // If not logged in, display the login and signup buttons
        echo '<a href="login.php" class="login-button">Login</a>';
        echo '<a href="signup.php" class="signup-button">Sign Up</a>';
    }
    ?>
</div>

    </div>
</nav>


    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <a href="#">Your Store</a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </aside>

    <!-- Your store content goes here -->

    <script src="../js/store.js"></script> <!-- Link to your JavaScript file -->
</body>
</html>
