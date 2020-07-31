<!-- Template for the home page -->

<?php get_header();?>

<section id="home">
    <div class="tint"></div>
    <div id="home-content"><h1>鲜</h1></div>
</section>
<section id="products">
    <div class="modal fade in" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cart</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode("[woocommerce_cart]"); ?>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Return to Products</button>
            </div>
            </div>
            
        </div>
    </div>
    <div id="main">
        <?php echo do_shortcode("[woo_cart_but]"); ?>        
        <?php echo do_shortcode("[products columns='4' class='products']"); ?>
    </div>
</section>

<section id="contact-us" style="background: #E6E6E6">
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>About Us</h1>
                <br>
                <p>We are an immigrant-owned seafood wholsale store located on College Point Blvd.</p>
            </div>
            <div class="column">
                <div class="m-5">
                    <img class="about-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg" alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
                </div>
            </div>
         </div>
    </div>
</section>

<?php get_footer();?>