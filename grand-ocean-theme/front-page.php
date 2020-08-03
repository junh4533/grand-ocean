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
        <div class="products-header">
            <h3 class="products-title">TODAY'S SELECTION</h3>
            <?php echo do_shortcode("[woo_cart_but]"); ?>
        </div>
        <?php echo do_shortcode("[products columns='4' class='products']"); ?>
    </div>
</section>

<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>我们的故事</h1>
                <br>
                <p>Grand Ocean Seafood Wholesale is a seafood wholesale store based in NYC. We have been working diligently since [INSERT FOUNDING YEAR] to bring you the freshest seafood for the lowest price. Our wide selection of seafood is perfect for restaurants, family gatherings, or any other big occasion. As soon as we get your order, we will start preparing your seafood right away and will deliver your order in the most timely manner to ensure maximum freshness. We look forward to working with you!</p>
            </div>
            <div class="column">
                <div class="m-5">
                    <img class="about-image img-fluid"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg"
                        alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>