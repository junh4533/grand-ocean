<?php /* Template Name: Order */ ?>
<?php get_header(); ?>
    <div id="main">
    <?php echo do_shortcode("[woocommerce_checkout]"); ?>
    </div>
<?php get_footer(); ?>