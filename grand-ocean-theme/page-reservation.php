<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Reservation Page */ ?>

<?php get_header();?>

<section id="reservation">
    <?php echo do_shortcode("[woocommerce_checkout]") ?>
</section>

<?php get_footer();?>


