<!-- Template for the home page -->

<?php get_header();?>

<section id="home">
    <div class="tint"></div>
    <div id="home-content">
        <h1>鲜</h1>
    </div>
</section>
<section id="products">
    <div class="modal fade in" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">我的购物车</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode("[woocommerce_cart]"); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                </div>
            </div>

        </div>
    </div>
    <div id="main">
        <?php echo do_shortcode("[woo_cart_but]"); ?>
        <?php echo do_shortcode("[products columns='4' class='products']"); ?>
    </div>
</section>

<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>我们的故事</h1>
                <br>
                <p>Grand Ocean is a seafood wholesale store based in College Point, NYC. We have been working diligently since 2015 to bring you the freshest seafood for the lowest price. Our wide selection of seafood is perfect for restaurants, seafood markets, small family gatherings, and catering large scale events. We will deliver your order in the most timely manner to ensure maximum freshness. Place your order now for fresh seafood!</p>
                <br>
                <h3>Hours of Operation</h3>
                <br>
                <br>
                <p>We are open 10am-5pm every day of the week, including weekends! Operating hours may vary on holidays!</p>
                <br>
                <br>
                <a class="nav-link" href="#products">
                <button type="button" class="button1">Take me to the products!</button>
                </a>
            
            </div>
            <div class="column p-5 d-flex align-items-center">
                <img class="about-image img-fluid"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg"
                    alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>