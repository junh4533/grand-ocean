<?php /* Template Name: Store */ ?>
<?php get_header(); ?>
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
<?php get_footer(); ?>