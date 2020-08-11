<?php

function load_stylesheets()
{
    // Bootstrap CSS 
    wp_register_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), false, 'all');
    // Custom CSS
    wp_register_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('custom-stylesheet');
    wp_enqueue_style('bootstrap4');
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

// ADDING UNIT ATTRIBUTE NEXT TO PRICE
function bd_rrp_sale_price_html( $price, $product ) {
    $unit = $product->get_attribute('Unit');
    if ($unit) {
        $unit = ' <span class="product-unit">per ' . $unit . '</span>';
    }
    if ( $product->is_on_sale() ) :
      $has_sale_text = array(
        '<ins>' => '<br>Sale: <ins>',
        '<del>' => '<del>' . $unit
      );
      $return_string = str_replace(array_keys( $has_sale_text ), array_values( $has_sale_text ), $price);
    else :
      $return_string = $price . $unit;
    endif;
  
    return $return_string;
  }
add_filter( 'woocommerce_get_price_html', 'bd_rrp_sale_price_html', 100, 2 );
//Minimum Quantity

/*
* Changing the minimum quantity to 1 for all the WooCommerce products
*/

function woocommerce_quantity_input_min_callback( $min, $product ) {
	$min = 1;  
	return $min;
}
add_filter( 'woocommerce_quantity_input_min', 'woocommerce_quantity_input_min_callback', 10, 2 );

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
        $html = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>%s',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $class ) ? $class : 'button' ),
            esc_html( $product->add_to_cart_text() ),
            woocommerce_quantity_input( array(), $product, false )
        );
    } else if ($product && $product->is_type( 'simple' ) && $product->is_purchasable() && !$product->is_in_stock() && ! $product->is_sold_individually() ) {
        $html = "<div class='out-of-stock'>缺货</div>";
    }
    return $html;
}

add_action( 'wp_head' , 'hide_ajax_view_cart_button' );
function hide_ajax_view_cart_button(){
    if( is_shop() || is_product_category() || is_product_tag() ): ?>
<style>
    a.added_to_cart.wc-forward {
        display: none;
    }
</style>
<?php endif;
}

add_action( 'wp_ajax_product_remove', 'product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'product_remove' );
function product_remove() {
    $cart = WC()->instance()->cart;
    $id = $_POST['product_id'];
    $cart_id = $cart->generate_cart_id($id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if($cart_item_id){
        $cart->set_quantity($cart_item_id,0);
    }
    
    $updated_content = do_shortcode('[woocommerce_cart]');
    $cart_count = WC()->cart->cart_contents_count;
    wp_send_json(array("content" => $updated_content, "count" => $cart_count));
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

// ICON SHORTCODE
add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
<div class="cart-icon"><span class="cart-contents" data-toggle="modal" data-target="#myModal" title="My Basket">
        <?php
        if ( $cart_count > 0 ) {
       ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
    </span></div>
<?php
	        
    return ob_get_clean();
 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
<span class="cart-contents menu-item" data-toggle="modal" data-target="#myModal"
    title="<?php _e( 'View your shopping cart' ); ?>">
    <?php
    if ( $cart_count > 0 ) {
        ?>
    <span class="cart-contents-count"><?php echo $cart_count; ?></span>
    <?php            
    }
        ?></span>
<?php
 
    $fragments['span.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

// ADD DESCRIPTIONS TO PRODUCTS
function cloudways_short_des_product() {
    echo the_excerpt();
}
add_action( 'woocommerce_after_shop_loop_item_title', 'cloudways_short_des_product', 40 );

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
    return __( '添加', 'woocommerce' );
}

// Place Order on Checkout button text
add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );
 
function misha_custom_button_text( $button_text ) {
   return '确认订单'; 
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

// add_filter( 'the_title', 'woo_title_order_received', 10, 2 );


// add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
// function woo_custom_redirect_after_purchase() {
// 	global $wp;
// 	if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) {
// 		wp_redirect(get_template_directory_uri() + "/confirmation");
// 		exit;
// 	}
// }

// add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
  
// function bbloomer_redirectcustom( $order_id ){
//     $order = wc_get_order( $order_id );
//     $url = 'https://google.com';
//     if ( ! $order->has_status( 'failed' ) ) {
//         wp_safe_redirect( $url );
//         exit;
//     }
// }

// function woo_title_order_received( $title, $id ) {
// 	if ( function_exists( 'is_order_received_page' ) && 
// 	     is_order_received_page() && get_the_ID() === $id ) {
// 		$title = "Thank you for your order! :)";
// 	}
// 	return $title;
// }

// validation for phone number field
add_action('woocommerce_checkout_process', 'custom_validate_billing_phone');
function custom_validate_billing_phone() {
    $is_correct = preg_match('/^[0-9\D]{10}/i', $_POST['billing_phone']);
    if ( $_POST['billing_phone'] && !$is_correct) {
        wc_add_notice( __( '电话号码必须使用此格式: <strong>1234567890</strong>.' ), 'error' );
    }
}

// Show product gallery
add_action( 'woocommerce_before_shop_loop_item_title', 'action_template_loop_product_thumbnail', 9 );
function action_template_loop_product_thumbnail() {
    global $product;
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

    $product_id = $product->get_id();
    $product_sku = $product->get_sku();
    $product_thumbnail = $product->get_image_id();
    $attachment_ids = $product->get_gallery_image_ids();
    if(!empty($attachment_ids)) {
        $html = '<div id="' . $product_sku . '" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">';
        $html .= '<div class="carousel-item active">';
        $html .= '<img class="d-block w-100" src="' . wp_get_attachment_image_url($product_thumbnail) . '" />';
        $html .= '</div>';

        foreach($attachment_ids as $image_id) {
            $html .= '<div class="carousel-item">';
            $html .= '<img class="d-block w-100" src="' . wp_get_attachment_image_url($image_id) . '" />';
            $html .= '</div>';
            
        }
        $html .= '</div>
        <a class="carousel-control-prev carousel-control" href="#' . $product_sku . '" role="button" data-slide="prev">
          <i class="fas fa-chevron-left carousel-icon"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next carousel-control" href="#' . $product_sku . '" role="button" data-slide="next">
          <i class="fas fa-chevron-right carousel-icon"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>';
        echo $html;
    } else {
        echo $product->get_image();
        // echo '<img width="200" src="https://media.nesta.org.uk/images/Predictions-2019_Twitter_02.width-1200.png"></img>';
    }
    // $file = get_field('archive_video', $product->get_id());

    // if( isset($file['url']) && ! empty($file['url']) ) {


        //echo '<img width="200" src="https://media.nesta.org.uk/images/Predictions-2019_Twitter_02.width-1200.png"></img>';
    // }
}

// CHANGING SHIPPING LABELS IN CART/CHECKOUT
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return 'Delivery';
}

?>