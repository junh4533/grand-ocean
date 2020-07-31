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

/**
 * Override loop template and show quantities next to add to cart buttons, if not in stock it will display a custom message
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	} else if ($product && !($product->is_in_stock())) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= '<div class="out-of-stock">Out of Stock</div>';
		$html .= '<button type="submit" class="button alt product-disabled" disabled>' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
    }
	return $html;
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

// PREVENTS ACCESS TO PRODUCT PAGE VIA URL
function prevent_access_to_product_page(){
    global $post;
    // if ( is_product() ) {
    //     global $wp_query;
    //     $wp_query->set_404();
    //     status_header(404);
    // }
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