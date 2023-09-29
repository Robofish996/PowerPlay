<?php
include_once '../include/header.php';
include_once '../include/config.php';

// Fetch featured products
$featuredProducts = $pdo->query("SELECT * FROM products WHERE product_featured = 'yes'");
$featuredProducts->execute();
$featuredProductsList = $featuredProducts->fetchAll(PDO::FETCH_OBJ);

// Fetch product categories
$products = $pdo->query("SELECT * FROM category WHERE status = 1");
$products->execute();
$allProducts = $products->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <!-- Banner/Hero Section -->
    <div class="banner">
        <img src="<?php echo APPURL; ?>/css/images/pexels-artem-podrez-7773543.jpg" alt="Banner Image">
        <div class="banner-text" id="randomizedText"></div>
    </div>


    <div class="jumbotron">
        <div class="jumbotron-item">
            <div class="circle">
                <i class="fa fa-money fa-stack-1x fa-inverse"></i>
            </div>
            <h2>GREAT VALUE</h2>
            <p class="lead">We source the best deals at the best pricing available so that you can enjoy superb performance & quality without breaking the bank.</p>
        </div>
        <div class="jumbotron-item">
            <div class="circle">
                <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
            </div>
            <h2>UP-TO-DATE</h2>
            <p class="lead">Our inventory is constantly updated to keep up with the latest technology trends, ensuring you always have access to the latest products.</p>
        </div>
        <div class="jumbotron-item">
            <div class="circle">
                <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
            </div>
            <h2>WE DELIVER</h2>
            <p class="lead">Get your orders delivered right to your doorstep. Fast and reliable shipping services to get you what you need when you need it.</p>
        </div>
        <div class="jumbotron-item">
            <div class="circle">
                <i class="fa fa-certificate fa-stack-1x fa-inverse"></i>
            </div>
            <h2>EXPERT ADVICE</h2>
            <p class="lead">Our seasoned team of professionals provides you with knowledgeable insights and suggestions for informed decisions and progress.</p>
        </div>
    </div>





<!-- Category Tiles Section -->
<section class="category-tiles">
    <div class="container" style="max-width: 1700px;">
        <h2 class="section-heading">Browse through our various collection</h2>
        <div class="row justify-content-between">
            <?php foreach ($allProducts as $product) : ?>
                <div class="col-md-4 mb-4">
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


    <?php include_once '../include/footer.php'; ?>
</body>