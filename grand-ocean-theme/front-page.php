<!-- Template for the home page -->

<?php get_header();?>

<section id="home">
    <div class="tint"></div>
    <div id="home-content"><h1>鲜</h1></div>
</section>

<section id="contact-us">
    <div class="container">
        <div class="column">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg" alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
        </div>
        <div class="column">
        <h1>Contact Us</h1>
        <br>
        <br>
        <div class=row>
            <div class=col1>
            <a class="red" href="<?php echo get_site_url(); ?>/#footer"><i class="fab fa-weixin"></i></a>
            <a class="red" href="tel:347-532-0987"><i class="fas fa-phone"></i></a>
            </div>
            <div class=col2>
                <h4>Lisa307266</h4>
                <br>
                <br>
                <h4>(347) 532-0987</h4>
            </div>
        </div>
    <div>

</section>

<?php get_footer();?>