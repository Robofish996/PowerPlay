<?php
include_once '../include/header.php';
include_once '../include/config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $products = $pdo->query("SELECT * FROM category WHERE status = 1 AND id = '$id'");
    $products->execute();
    $singleProduct = $products->fetch(PDO::FETCH_OBJ);

    $getProduct = $pdo->query("SELECT * FROM products WHERE category_id='$id'");
    $getProduct->execute();

    $getAllProducts = $getProduct->fetchAll(PDO::FETCH_OBJ);
}
// Fetch cart items from the database
$cartItems = $pdo->query("SELECT * FROM cart");
$cartItems->execute();
$cartProducts = $cartItems->fetchAll(PDO::FETCH_ASSOC);

// Calculate the grand total
$grandTotal = 0;
foreach ($cartProducts as $product) {
    $grandTotal += $product['quantity'] * $product['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

</head>

<body>


</html>
<section id="product-section">
    <div class="container">
        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($getAllProducts as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $product->product_image_path; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize"><?php echo $product->product_name; ?></h5>
                            <p class="card-text"><?php echo $product->product_description; ?></p>
                            <h3 class="card-price">$<?php echo $product->product_price; ?></h3>

                            <!-- Add to cart button with a link to cart.php -->
                            <a href="<?php echo APPURL; ?>/pages/singleProduct.php?id=<?php echo $product->product_id; ?>">
                                <button class="btn btn-primary text-white text-uppercase fw-bold mt-auto" type="button">Add to Cart</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (++$i % 3 === 0) : ?>
        </div>
        <div class="row">
        <?php endif; ?>
    <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Button to open the modal -->
<button id="myBtn" data-toggle="modal" data-target="#myModal">
    <i class="fa-solid fa-cart-shopping"></i>
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content in the modal body -->
        <div class="modal-content">
        <div class="modal-header" style="display: flex; justify-content: space-between;">
    <h4 class="modal-title">Your Cart</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

            <div class="modal-body">
                <!-- Display cart items and grand total -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartProducts as $product) : ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td>$<?php echo $product['price']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><strong>Grand Total:</strong> $<?php echo $grandTotal; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
           
        </div>
    </div>
</section>




</body>





<?php

include_once '../include/footer.php';
?>