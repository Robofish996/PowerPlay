<?php
session_start();

// Cart Array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Database connection
$connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all product information from the products table and store it in the session
if (!isset($_SESSION['all_products'])) {
    $_SESSION['all_products'] = array();

    // Fetch all products from the products table
    $query_all_products = "SELECT * FROM products";
    $result_all_products = mysqli_query($connection, $query_all_products);

    // Store products information in the session
    while ($product_row = mysqli_fetch_assoc($result_all_products)) {
        $_SESSION['all_products'][$product_row['product_id']] = $product_row;
    }
}

// Adding products to cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];
    if (!in_array($productID, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productID;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Keyboards</title>
    <link rel="stylesheet" type="text/css" href="../css/keyboards.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <video autoplay muted loop id="video-bg">
        <source src="../css/videos/mouseVid.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="hamburger-menu" id="hamburger-menu">
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


    <div class="content">
        <h1>Pawn Noobs with your keyboard!</h1>

        <div class="container">
            <div class="products-container">
                <?php
                // Fetch all products from the products table
                $query_products = "SELECT * FROM products WHERE product_category = 'Keyboards'";
                $result_products = mysqli_query($connection, $query_products);

                // Display product in cards
                while ($row = mysqli_fetch_assoc($result_products)) {
                    echo '<div class="product-card">';
                    if (!empty($row['product_image_path'])) {
                        echo '<img src="' . $row['product_image_path'] . '" alt="' . $row['product_name'] . '">';
                    }
                    echo '<h2>' . $row['product_name'] . '</h2>';
                    echo '<p>' . $row['product_description'] . '</p>';
                    echo '<p class="cardPrice">Price: R' . $row['product_price'] . '</p>';
                    echo '<form method="post" class="add-to-cart-form">';
                    echo '<input type="hidden" name="add_to_cart" value="1">';
                    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                    echo '<button type="submit" class="add-to-cart-button">Add to Cart</button>';
                    echo '</form>'; // Add to Cart form
                    echo '</div>';
                }
                // Close the database connection
                mysqli_close($connection);
                ?>
            </div>
        </div>
    </div>
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
            <li><a href="../pages/cart.php">Cart</a></li>
            <li><a href="./settings.php">Settings</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>
    </aside>
    <!--Open The Modal -->
    <button id="myBtn" class="cart-button">
        <i class="fas fa-shopping-cart"></i>
    </button>


    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Cart</h2>
            </div>
            <div class="modal-body">
                <div id="cart-items">
                    <p class="warningText">Please note that its only one variant per customer as we are a startup</p>
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        // Database connection
                        $connection = mysqli_connect('localhost', 'Mathew', 'mysql@123', 'powerplay');
                        if (!$connection) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        //store the total price
                        $totalPrice = 0;

                        //store item quantities
                        $itemQuantities = array();

                        // Fetch and display product information for items in the cart
                        foreach ($_SESSION['cart'] as $productID) {
                            $query = "SELECT product_id, product_name, product_price, product_image_path FROM products WHERE product_id = $productID";
                            $result = mysqli_query($connection, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                //Set quantity to 1
                                $itemQuantities[$productID] = 1;


                                // Get the quantity for this item
                                $quantity = $itemQuantities[$productID];

                                echo '<div class="cart-item">';
                                echo '<img src="' . $row['product_image_path'] . '" alt="' . $row['product_name'] . '">';
                                echo '<p>' . $row['product_name'] . ' - Price: R ' . number_format($row['product_price'], 2) . ' - Quantity: ' . $quantity . '</p>';
                                echo '</div>';

                                // Calculate the total price for this item
                                $totalPrice += ($row['product_price']);
                            }
                        }

                        // Close the database connection
                        mysqli_close($connection);

                        // Display the total price
                        echo '<p id="grand-total">Grand Total: R ' . number_format($totalPrice, 2) . '</p>';
                    } else {
                        echo 'Your cart is empty.';
                    }
                    ?>
                    <a href="cart.php"><button class="modalbutton">Go to Cart</button></a>
                </div>
            </div>
        </div>
    </div>
    <button id="back-to-top-button" class="back-to-top-button">Back to Top</button>

    <script src="../js/store.js"></script>
    <script src="../js/mice.js"></script>
</body>

</html>