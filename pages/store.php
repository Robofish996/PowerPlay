<?php
session_start();

// Connection details
$host = 'localhost';
$username = 'Mathew';
$password = 'mysql@123';
$database = 'powerplay';

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the user is logged in (you can customize this condition)
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}

// Close the database connection
$mysqli->close();
?>
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

    <!-- Banner/Hero Section -->
    <div class="banner">
        <img src="../css/images/pexels-artem-podrez-7773543.jpg" alt="Banner Image">
        <div class="banner-text">
            Where technology meets people
        </div>
    </div>

    <!-- Category Tiles Section -->
    <h1 class="tileHeading">Browse through our various collection</h1>
    <section class="category-tiles">
        <div class="container">
            <div class="category-tile">
                <a href="../pages/mice.php">
                    <img src="../css/images/tileImages/corsair-harpoon-rgb-wireless-gaming-mouse-600px-v3-removebg-preview.png" alt="Mice">
                    <h3>Mice</h3>
                </a>
            </div>
            <div class="category-tile">
                <a href="../pages/keyboards.php">
                    <img src="../css/images/tileImages/razor_BlackWidow_V4_75.png" alt="Keyboards">
                    <h3>Keyboards</h3>
                </a>
            </div>
            <div class="category-tile">
                <a href="../pages/monitors.php">
                    <img src="../css/images/tileImages/samsungmonitor-removebg-preview.png" alt="Monitors">
                    <h3>Monitors</h3>
                </a>
            </div>
            <div class="category-tile">
                <a href="../pages/laptops.php">
                    <img src="../css/images/tileImages/hp-victus-core-i5-rtx-3050-gaming-laptop-6f7f8ea-1000px-v10001-removebg-preview.png" alt="Laptops">
                    <h3>Laptops</h3>
                </a>
            </div>
        </div>
    </section>
</body>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <a href="#">Power Play</a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="./store.php">Home</a></li>
            <li><a href="./mice.php">Mice</a></li>
            <li><a href="./keyboards.php">Keyboards</a></li>
            <li><a href="./laptops.php">Laptops</a></li>
            <li><a href="./monitors.php">Monitors</a></li>
            <li><a href="../pages/cart.php">Cart</a></li>
            <li><a href="./settings.php">Settings</a></li>
            <li><a href="./logout.php">Logout.php</a></li>
        </ul>
    </aside>

    <script src="../js/store.js"></script>
</body>

</html>
