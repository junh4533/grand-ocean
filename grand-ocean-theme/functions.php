<?php

function load_stylesheets()
{
    // Bootstrap CSS 
    wp_register_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), false, 'all');
    // Custom CSS
    wp_register_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');

    wp_enqueue_style('bootstrap4');
    wp_enqueue_style('custom-stylesheet');
}

function load_scripts()
{
    // Bootstrap js + Popper.js
    wp_register_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js', false, true);
    // Font Awesome 6
    wp_register_script('font-awesome6', 'https://kit.fontawesome.com/7737a0af7b.js', false, true); 
    // Custom js
    wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, 'all'); 
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-bundle');
    wp_enqueue_script('font-awesome6');
    wp_enqueue_script('custom-js');
}

function customtheme_add_woocommerce_support()
{
    add_theme_support( 'woocommerce' );
}

add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );
add_action('wp_enqueue_scripts', 'load_stylesheets');
add_action('wp_enqueue_scripts', 'load_scripts');

// QUANTITY
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_loop_ajax_add_to_cart', 10, 2 );
function quantity_inputs_for_loop_ajax_add_to_cart( $html, $product ) {
    if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        // Get the necessary classes
        $class = implode( ' ', array_filter( array(
            'button',
            'product_type_' . $product->get_type(),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        ) ) );

        // Embedding the quantity field to Ajax add to cart button
        $html = sprintf( '%s<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
            woocommerce_quantity_input( array(), $product, false ),
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $class ) ? $class : 'button' ),
            esc_html( $product->add_to_cart_text() )
        );
    } else if ($product && $product->is_type( 'simple' ) && $product->is_purchasable() && !$product->is_in_stock() && ! $product->is_sold_individually()) {
        $html = '<div class="out-of-stock">OUT OF STOCK</div>';
    }
    return $html;
}

//Minimum Quantity

/*
* Changing the minimum quantity to 1 for all the WooCommerce products
*/

function woocommerce_quantity_input_min_callback( $min, $product ) {
	$min = 1;  
	return $min;
}
add_filter( 'woocommerce_quantity_input_min', 'woocommerce_quantity_input_min_callback', 10, 2 );

add_action( 'wp_footer' , 'archives_quantity_fields_script' );
function archives_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
        jQuery(function($){
            // Update data-quantity
            $(document.body).on('click input', 'input.qty', function() {
                $(this).parent().parent().find('a.ajax_add_to_cart').attr('data-quantity', $(this).val());
                // (optional) Removing other previous "view cart" buttons
                $(".added_to_cart").remove();
            });
        });
        jQuery(document.body).on('click', 'a.remove', function(){
            var product_id = jQuery(this).attr("data-product_id");
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/wp-admin/admin-ajax.php",
                data: { action: "product_remove",
                    product_id: product_id
                },success: function(data){
                    update_cart();
                }
            });
            return false;
        });
    </script>
    <?php
}

// UPDATE SHORTCODE CONTENT
add_action( 'wp_ajax_update_shortcode_content', 'update_shortcode_content' );
add_action( 'wp_ajax_nopriv_update_shortcode_content', 'update_shortcode_content' );

function update_shortcode_content(){
    if( !empty( $_REQUEST['shortcode'] ) ){
        $updated_content = do_shortcode( '[' . $_REQUEST['shortcode'] . ']' );
        wp_send_json( array( "content" => $updated_content ) );
    }
}

// AJAX REMOVE PRODUCT
add_action( 'wp_ajax_product_remove', 'product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'product_remove' );
function product_remove() {
    $cart = WC()->instance()->cart;
    $id = $_POST['product_id'];
    $cart_id = $cart->generate_cart_id($id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if($cart_item_id){
       $cart->set_quantity($cart_item_id, 0);
       return true;
    } 
    return false;
}

// CART ICON CUSTOM SHORTCODE
add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <div class="cart-icon"><a class="menu-item cart-contents" href="" data-toggle="modal" data-target="#myModal" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></div>
        <?php
	        
    return ob_get_clean();
 
}

// // AJAX UPDATE CART AFTER ADDING
// function shortcode_test() {
//     if ( !empty($_REQUEST['shortcode']) ) {
//       // Try and sanitize your shortcode to prevent possible exploits. Users typically can't call shortcodes directly.
//       $shortcode_name = esc_attr($_REQUEST['shortcode']);
  
//       // Wrap the shortcode in tags. You might also want to add arguments here.
//       $full_shortcode = sprintf('[%s]', $shortcode_name);
  
//       // Perform the shortcode
//       echo do_shortcode( $full_shortcode );
  
//       // Stop the script before WordPress tries to display a template file.
//       exit;
//     }
//   }
// add_action('init', 'shortcode_test');

// AJAX REMOVE PRODUCT FROM CART
function remove_item_from_cart() {
    $cart = WC()->instance()->cart;
    $id = $_POST['product_id'];
    $cart_id = $cart->generate_cart_id($id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if($cart_item_id){
       $cart->set_quantity($cart_item_id, 0);
       return true;
    } 
    return false;
}

add_action('wp_ajax_remove_item_from_cart', 'remove_item_from_cart');
add_action('wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart');

// ADD DESCRIPTIONS TO PRODUCTS
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
    ob_start();

    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item test" href="" data-toggle="modal" data-target="#myModal"  title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

function cloudways_short_des_product() {
    echo the_excerpt();
}
add_action( 'woocommerce_after_shop_loop_item_title', 'cloudways_short_des_product', 40 );

// AJAX FOR REMOVE CART ITEM


// PREVENTS ACCESS TO PRODUCT PAGE VIA URL
function prevent_access_to_product_page(){
    global $post;
    if ( is_product() ) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}

add_action('wp','prevent_access_to_product_page');

// REMOVE ABILITY TO CLICK ON PRODUCT
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Add To Cart', 'woocommerce' );
}

// Place Order on Checkout button text
add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );
 
function misha_custom_button_text( $button_text ) {
   return 'Reserve'; 
}

/**
 * Change the default state and country on the checkout page
 */
add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );

function change_default_checkout_country() {
  return 'US'; // country code
}

function change_default_checkout_state() {
  return 'NY'; // state code
}