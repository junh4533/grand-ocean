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
    jQuery(function($){
        // Update data-quantity
        $(document.body).on('click input', 'input.qty', function() {
            $(this).parent().parent().find('a.ajax_add_to_cart').attr('data-quantity', $(this).val());

            // (optional) Removing other previous "view cart" buttons
            $(".added_to_cart").remove();
        });

        $(document.body).on('added_to_cart', function() {
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/wp-admin/admin-ajax.php",
                data: { action: "update_shortcode_content", 
                        shortcode: "woocommerce_cart"
                },success: function(data){
                    jQuery('.modal-body').html(data.content);
                    jQuery('span.cart-contents-count').html(data.count);
                    jQuery('.modal-body .woocommerce-cart-form').attr("action", "#products");
                }
            });
        });
    });
    jQuery(document.body).on('click', 'a.remove', function(e){
        e.preventDefault();
        var product_id = jQuery(this).attr("data-product_id");
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: "/wp-admin/admin-ajax.php",
            data: { action: "product_remove", 
                    product_id: product_id
            },success: function(data){
                jQuery('.modal-body').html(data.content);
                jQuery('span.cart-contents-count').html(data.count);
                jQuery('.modal-body .woocommerce-cart-form').attr("action", "#products");
            }
        });
    });

    jQuery('#collapsibleNavbar').on('show.bs.collapse', function () {
        jQuery('.navbar .tint').css({'background':'black', 'opacity': 1});
    })

    jQuery('#collapsibleNavbar').on('hide.bs.collapse', function () {
        jQuery('.navbar .tint').animate({
            opacity: "0"
        });
    })
});