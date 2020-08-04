<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Confirmation */ ?>
<?php get_header();?>

<section id="confirmation">
    <div class="container">
        <div class="row">
            <div class="col-4" id='receipt'>
                <div>
                    <p>盛宴海鲜</p>
                    <p>35-20 College Point Blvd</p>
                    <p>(347) 532-0987</p>
                </div>

                <div id="order-number-row">
                    <h3>订单号</br></h3>
                    <h2><?php echo preg_replace('/[^0-9]+/' , '' , do_shortcode('[xlwcty_order]')) ?></h2>
                </div>

                <div>
                    <h2><?php echo do_shortcode('[xlwcty_order_details]') ?></h2>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <div class="confirmation-message mb-3">
                    <h3>You MUST call/WeChat message </br> to CONFIRM the reservation.</h3>
                    <br>
                    <br>
                    <h4>Otherwise your reservation will </br> NOT be placed</h4>
                </div>

                <div class="confirmation-message">
                    <a class="nav-link" href="<?php echo get_site_url(); ?>/#footer">
                        <i class="fab fa-weixin" id='icon'></i>
                        <h5>&nbsp;&nbsp;&nbsp;Lisa307266</h5>
                    </a>
                    <a class="nav-link" href="tel:347-532-0987">
                        <i class="fas fa-phone" id='icon'></i>
                        <h5>&nbsp;&nbsp;&nbsp;(347) 532-0987</h5>
                    </a>
                </div>
            </div>
        </div>
</section>

<?php get_footer();?>