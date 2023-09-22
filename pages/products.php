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

?>


<section>
    <div class="container">
        <div class="row">
            <?php foreach ($getAllProducts as $product) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $product->product_image_path; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize"><?php echo $product->product_name; ?></h5>
                            <p class="card-text"><?php echo $product->product_description; ?></p>
                            <h3><?php echo $product->product_price; ?></h3>

                            <!-- Add to cart button with a link to cart.php -->
                            <a href="<?php echo APPURL; ?>/pages/singleProduct.php?id=<?php echo $product->product_id; ?>">
                                <button class="btn btn-primary text-white text-uppercase fw-bold mb-3" type="button">Click die ding</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>



</section>



<?php

include_once '../include/footer.php';
?>