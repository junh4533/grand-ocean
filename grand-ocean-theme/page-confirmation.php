<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Confirmation */ ?>
<?php get_header();?>

<section id="confirmation">
    <div class="container">
        <div class="row">
            <div class="col-4" id='receipt'>
                <div id='row1'>
                    <p>Grand Ocean Seafood Wholesale</p>
                    <p>35-20 College Point Blvd</p>
                    <p>(347) 532-0987</p>
                </div>

                <div id='row2'>
                    <h3>Thank you, </br> CUSTOMER</h3>
                </div>

                <div id='row3'>
                    <h3>Reservation # </br></h3>
                    <h2 id='number'>5678</h2>
                </div>

                <div id='row4'>
                    <p><h5>Total</h5> &nbsp;&nbsp;&nbsp; <h4 id='number'>$599.94</h4></p>
                </div>
            </div>
            <div class="col">
                <strong>You MUST call/WeChat message to CONFIRM the reservation</strong>
                <br>
                <strong>Otherwise your reservation will NOT be placed</strong>
                <br>

            <div class='col-2'>

            </div>

            
            <div class="col-6">
                <div id='white'>
                    <h3>You MUST call/WeChat message </br> to CONFIRM the reservation.</h3>
                    <br>
                    <br>
                    <h3>Otherwise your reservation will </br> NOT be placed</h3>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a class="nav-link" href="<?php echo get_site_url(); ?>/#footer">
                            <i class="fab fa-weixin" id='icon'></i>
                            <h5>&nbsp;&nbsp;&nbsp;Lisa307266</h5>
                        </a>
                        <a class="nav-link" href="tel:347-532-0987">
                            <i class="fas fa-phone" id='icon'></i>
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(347) 532-0987</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>