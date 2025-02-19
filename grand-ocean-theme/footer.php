<!-- footer -->
<footer id="footer">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-6 col-xl-2 order-xl-2 px-5 my-5" id="site-links">
                <p class="footer-heading">网页网址</p>
                <a href="<?php echo get_site_url(); ?>">主页</a>
                <a href="<?php echo get_site_url(); ?>#about-us">我们的故事</a>
                <a href="<?php echo get_site_url(); ?>#products">今天的精选</a>
                <a href="<?php echo get_site_url(); ?>#footer">联系我们</a>
                <!-- <div class="my-3">   
                    <a class="d-inline" href="<?php echo get_site_url(); ?>/en">English</a>
                    <p class="d-inline mx-1">•</p>
                    <a class="d-inline" href="<?php echo get_site_url(); ?>">中文</a>
                </div> -->
            </div>

            <div class="col-6 col-xl-2 order-xl-3 px-1 px-sm-5 px-xl-3 my-5">
                <p class="footer-heading">联系方式</p>
                <p>盛宴海鲜</p>
                <p>Lisa Qiu</p> 
                <div class="my-3">
                    <i class="fas fa-phone d-inline mr-2"></i>
                    <a class="d-inline" href="tel:347-532-0987">(347) 532-0987</a>
                </div>
                <div class="my-3">
                    <i class="fab fa-weixin d-inline mr-2"></i>
                    <p class="d-inline">微信: &nbsp; Lisa307266</p>
                </div>
            </div>
            <div class="col-8 col-sm-6 col-xl-3 order-xl-1 px-sm-5 px-xl-3 my-5 text-center">
                <img class="mb-3 img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/qr-code.jpg"
                    alt="WeChat QR Code">
                <img class="img-fluid mx-auto my-3" id="footer-logo"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="Logo White">
            </div>
            <div class="col-10 col-sm-6 col-xl-5 order-xl-4 text-center px-sm-5 my-5">
                <a
                    class="text-center"
                    href="https://www.google.com/maps?q=35-20+College+Point+Blvd+Flushing,+NY+11354&rlz=1C1GCEA_enUS885US885&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiPk6vaivPqAhXsmOAKHVwWBdYQ_AUoAXoECA0QAw">
                    <img class="mb-3 img-fluid"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/ft-map.jpg"
                        alt="Grand Ocean Seafood Wholesale Shop on Google Maps">
                </a>
                <p>35-20 College Point Blvd Flushing, NY 11354</p>
                <p>©2014-2020 Grand Ocean (盛宴海鲜) All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer();?>
</body>

</html>