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
    jQuery('.woocommerce-billing-fields__field-wrapper').before('<hr />');
});