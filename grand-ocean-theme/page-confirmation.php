<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Confirmation */ ?>
<?php get_header();?>

<section id="confirmation">
    <div class="container">
        <div class="row">
            <div class="col-4" id='receipt'>
                <div id='row1'>
                    <p>盛宴海鲜</p>
                    <p>35-20 College Point Blvd</p>
                    <p>(347) 532-0987</p>
                </div>

                <div id="row2">
                    <h3>谢谢你, </br> CUSTOMER</h3>
                </div>

                <div id="row3">
                    <h3>订单号</br></h3>
                    <h2 id='number'>5678</h2>
                </div>

                <div id="row4">
                    <p>
                        <h5>总额</h5> &nbsp;&nbsp;&nbsp; <h4 id='number'>$599.94</h4>
                    </p>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <div id='white'>
                    <h4>You MUST call/WeChat message </br> to CONFIRM the reservation.</h4>
                    <br>
                    <br>
                    <h4>Otherwise your reservation will </br> NOT be placed</h4>
                </div>

                <a class="nav-link" href="<?php echo get_site_url(); ?>/#footer">
                    <i class="fab fa-weixin" id='icon'></i>
                    <h5>&nbsp;&nbsp;&nbsp;Lisa307266</h5>
                </a>
                
                <a class="nav-link" href="tel:347-532-0987">
                    <i class="fas fa-phone" id='icon'></i>
                    <h5>&nbsp;&nbsp;&nbsp;(347)
                        532-0987</h5>
                </a>
            </div>
        </div>
</section>

<?php get_footer();?>