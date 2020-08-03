jQuery(document).ready(function () {
    let first_header = jQuery('.woocommerce-billing-fields h3');
    first_header.text('Customer');
    first_header.addClass('checkout-header');
    let second_header = jQuery('.checkout-phone');
    second_header.after('<h3 class="checkout-header">Delivery</h3><hr/>');
    let third_header = jQuery('.woocommerce-additional-fields h3');
    third_header.text('Details');
    third_header.addClass('checkout-header');
    third_header.after('<hr />');
    jQuery('.woocommerce-checkout').addClass("row");
    jQuery('#customer_details').addClass('col-12', 'col-lg-7', 'py-5');
    jQuery('#order_review').addClass('col-12', 'col-lg-5', 'py-5');
    jQuery('.checkout-header').each(function(index) {
        jQuery(this).before('<span class="checkout-badge-wrapper"><span class="checkout-badge">' + (index + 1) + '</span></span>');
    });
    jQuery('.modal-body .woocommerce-cart-form').attr("action", "#products");
    jQuery('.woocommerce-billing-fields__field-wrapper').before('<hr />');
});

function update_cart() {
    jQuery.ajax({
        type: 'POST',
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: { 
            action: "update_shortcode_content",
            shortcode: "woocommerce_cart"
        },success: function(data){
            jQuery('.modal-body').html(data.content);
            jQuery('.modal-body .woocommerce-cart-form').attr("action", "#products");
        }
    });
    // jQuery.ajax({
    //     url: '/?shortcode=woocommerce_cart',
    //     success: (data) => {
    //         
    //         // after update from cart, we want to scroll back to products
    //         jQuery('.modal-body .woocommerce-cart-form').attr("action", "#products");
    //     },
    //     error: (xhr, status, error) => {
    //         console.log(error);
    //     }
    // });
}