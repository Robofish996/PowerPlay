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

// Fetch featured products from the database
$featuredProductsQuery = "SELECT * FROM featured_products";
$result = $mysqli->query($featuredProductsQuery);

// Initialize an array to store the featured products
$featuredProductsData = array();

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add each product to the array
        $featuredProductsData[] = $row;
    }
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
        We technology meets people
    </div>
</div>

<!-- Featured Products Flip Cards Section -->
<!-- Featured Products Flip Cards Section -->
<section class="featured-products">
    <h2>Featured Products</h2>
    <div class="container">
        
        <div class="product-cards">
            <?php
            // Loop through the featured products data and create flip cards
            foreach ($featuredProductsData as $product) {
                echo '<div class="product-card-container">';
                echo '<div class="product-card">';
                echo '<div class="card-front">';
                echo '<img src="' . $product['product_image'] . '" alt="' . $product['product_name'] . '">';
                echo '</div>';
                echo '<div class="card-back">';
                echo '<h3>' . $product['product_name'] . '</h3>';
                echo '<p>' . $product['product_description'] . '</p>';
                echo '<p>Price: $' . number_format($product['product_price'], 2) . '</p>';
                echo '<p>Rating: ' . $product['product_rating'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>




    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <a href="#">Power Play</a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </aside>

    <script src="../js/store.js"></script>
</body>

</html>