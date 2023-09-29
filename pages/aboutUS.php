<?php
include_once '../include/header.php';
include_once '../include/customer_reviews.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="path/to/about_us.css">
</head>

<body>
    <!-- Header Section -->
    <header id="header">
        <div class="container">
            <h1 style="text-decoration: underline;">About Us</h1>
            <p>Welcome to Powerplay, a dynamic and innovative retailer that caters to the gaming community's insatiable appetite for excitement and entertainment. At Powerplay, we're all about unlocking the limitless potential of gaming and embracing the thrill of digital adventures. Our journey begins in a world where pixels and polygons converge into breathtaking landscapes and challenging quests. We are passionate about unleashing the power of play, where every gamer becomes a hero, and every virtual realm an opportunity for exploration and achievement. Our core values drive us to stand out from the crowd. We believe in inclusivity, where every gamer is welcomed, regardless of experience level. Our dedication to quality ensures that we offer nothing but the best in gaming gear and accessories. From powerful gaming rigs to stylish peripherals, we've got it all. At Powerplay, we're committed to nurturing a gaming ecosystem where players can thrive, connect, and celebrate their love for gaming. We're not just a retailer; we're a community where your victories are our victories, and your journey is our inspiration. Join us on this epic quest through the world of gaming, where fun knows no bounds, and challenges are meant to be conquered. Power up and get ready to embark on an adventure like no other, as we redefine what it means to play. Welcome to Powerplay, where the gaming world comes alive.</p>
        </div>
    </header>

    <div class="container">
        <div class="row mt-5">
            <!--Map -->
            <div class="col-lg-6">
                <section id="map-location">
                    <h2>Our Location</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.17258160662743!2d-96.83265988618342!3d32.808677744510454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e9f6fba4ef00b%3A0x7036007f13765fe8!2sPNC%20Bank%20ATM!5e0!3m2!1sen!2sza!4v1695522439657!5m2!1sen!2sza" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
            </div>

            <!--Introduction and History -->
            <div class="col-lg-6">
                <!-- Introduction Section -->
                <section id="introduction">
                    <h2>Welcome to Powerplay</h2>
                    <p>
                        At Powerplay, we're passionate about unleashing the power of play. We offer a wide range of gaming gear and accessories, from powerful gaming rigs to stylish peripherals. Our commitment to quality ensures that we provide nothing but the best for gamers of all levels.
                    </p>
                </section>

                <!-- History Section -->
                <section id="history" class="my-5">
                    <h2>Our Journey</h2>
                    <p>
                        Founded in 2010, Powerplay has grown from a small local store to a dynamic and innovative retailer in the gaming world. We're dedicated to empowering gamers, celebrating their triumphs, and redefining what it means to play. Join us on this epic quest through the world of gaming.
                    </p>
                </section>
            </div>
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
    <?php include_once '../include/footer.php'; ?>
</body>

</html>