<?php

include_once '../include/header.php';
include_once '../include/config.php';



$products = $pdo->query("SELECT * FROM category WHERE status = 1");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

?>

<!-- Banner/Hero Section -->
<div class="banner">
    <img src="<?php echo APPURL; ?>/css/images/pexels-artem-podrez-7773543.jpg" alt="Banner Image">
    <div class="banner-text">
        Where technology meets people
    </div>
</div>

<!-- Category Tiles Section -->
<h1 class="tileHeading">Browse through our various collection</h1>
<section>
    <div class="container">
        <div class="row">
            <?php foreach ($allProducts as $product) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo APPURL; ?>/image/<?php echo $product->image; ?>" class="card-img-top" alt="<?php echo $product->name; ?>">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize"><?php echo $product->name; ?></h5>

                            <a href="products.php?id=<?php echo $product->id; ?>" class="btn btn-primary">Explore Gear</a>
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