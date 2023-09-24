<?php

include_once '../include/header.php';
include_once '../include/config.php';
include_once '../include/customer_reviews.php';



$products = $pdo->query("SELECT * FROM category WHERE status = 1");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

?>


<body>
<!-- Banner/Hero Section -->
<div class="banner">
    <img src="<?php echo APPURL; ?>/css/images/pexels-artem-podrez-7773543.jpg" alt="Banner Image">
    <div class="banner-text" id="randomizedText">
    </div>
</div>

<!-- Customer Reviews Section -->
<section class="customer-reviews">
    <h3 class="tileHeading">Customer Reviews</h3>
    <div id="customerCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($customerReviews as $index => $review) : ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="customer-card">
                        <img src="<?php echo $review['image_url']; ?>" alt="<?php echo $review['name']; ?>">
                        <h3><?php echo $review['name']; ?></h3>
                        <p><?php echo $review['review']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#customerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<!-- Category Tiles Section -->
<h3 class="tileHeading">Browse through our various collection</h3>
<section>
    <div class="container">
        <div class="row justify-content-between">
            <?php foreach ($allProducts as $product) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
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
</body>