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
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}