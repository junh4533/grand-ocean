<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Confirmation */ ?>
<?php get_header();?>

<script> 
    function PrintReceipt(){
        var mywindow = window.open('', '', 'height=800,width=1200');

        // mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        // mywindow.document.write('</head><body >');
        // mywindow.document.write('<h1>' + document.title  + '</h1>');
        // mywindow.document.write('<h1>' + 'Here is a copy of your receipt:'  + '</h1>');
        // mywindow.document.write(document.getElementById('receipt').innerHTML);
        // mywindow.document.write('</body></html>');

        mywindow.document.write(
            '<html>' + 
                '<head>' + 
                    '<title>' + document.title  + '</title>' + 
                    '<link rel="stylesheet" media="print" href="style.css" type="text/css" />' + 
                '</head>' + 
                '<body>' + 
                    '<h1>' + document.title  + '</h1>' + 
                    document.getElementById('receipt').innerHTML + 
                '</body>'+
            '</html>'
        );

        mywindow.document.close(); 
        mywindow.focus(); 

        setTimeout(function(){ 
            mywindow.print(); 
            mywindow.close(); 
        }, 10000);
        
        mywindow.print();
        mywindow.close();

        return true;
    }
</script> 

<section class="hv-center" id="confirmation">
    <div class="container-fluid">
        <div class="row hv-center">
            <div class="col-12 col-sm-8 col-md-5 col-xl-4 my-3 order-confirmation-container">
                <div class="p-3" id="receipt">
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

                <input type="button" value="Print Your Receipt!" onclick="PrintReceipt()">  
            </div>
            <div class="col-xl-1"></div>
            <div class="col-12 col-sm-9 col-md-6 col-xl-6 my-3 order-confirmation-container hv-center">
                <div class="confirmation-message d-inline-block hv-center flex-column p-5">
                    <div id=step-0>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alert.png" alt="alert icon"
                            width="50px" height="50px" />
                        <h3 class="mb-5">Reservation not yet completed!</h3>
                    </div>

                    <div class="my-3 w-100" id='step-1'>
                        <h5 id='step-title'>Step 1: </h5>
                        <br>
                        <h5>Contact us via the below phone number/WeChat:</h5>
                        <br>
                        <br>
                        <a class="d-inline mr-5" href="<?php echo get_site_url(); ?>/#footer">
                            <i class="fab fa-weixin mr-3" id='icon'></i>
                            <h5>Lisa307266</h5>
                        </a>
                        <a class="d-inline" href="tel:347-532-0987">
                            <i class="fas fa-phone mr-3" id='icon'></i>
                            <h5>(347) 532-0987</h5>
                        </a>
                    </div>

                    <div class="my-3 w-75" id='step-2'>
                        <h5 id='step-title'>Step 2: </h5>
                        <br>
                        <h5>Confirm your order with us!</h5>
                    </div>

                    <div class="my-3 w-75" id='step-3'>
                        <h5 id='step-title'>Step 3: </h5>
                        <br>
                        <h5>Wait for our delivery and enjoy the fresh seafood!</h5>
                    </div>

                    <div id='step-4'>
                        <h6 class="mt-5"><em>* Failure of confirming will result in the cancellation of your order!</em></h6>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php get_footer();?>