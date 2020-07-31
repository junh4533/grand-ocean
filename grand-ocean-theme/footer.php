<!-- footer -->
<footer id="footer">
    <div class="container-fluid py-5 px-5">
        <div class="row">
            <div class="col-6 col-lg-2 order-lg-2">
                <p class="footer-heading">Site Links</p>
                <a href="<?php echo get_site_url(); ?>">主页</a>
                <a href="<?php echo get_site_url(); ?>/#products">今天的精选</a>
                <a href="<?php echo get_site_url(); ?>/#products">联系</a>
            </div>

            <div class="col-6 col-lg-3 order-lg-3">
                <p class="footer-heading">联系</p>
                <p>盛宴海鲜</p>
                <p>35-20 College Point Blvd <br> Flushing, NY <br> 11354</p>
                <p>Lisa Qiu</p>
                <a href="tel:347-532-0987">(347) 532-0987</a>
            </div>
            <div class="col-6 col-lg-4 order-lg-1">
                <img class="my-3 img-fluid"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT5btQn6gFp08LW8Vtqx728BKDWoDvI_OQ4Qg&usqp=CAU"
                    alt="WeChat QR Code"> <br>
                <!--<a class="d-inline"
                    href="https://www.google.com/maps?q=35-20+College+Point+Blvd+Flushing,+NY+11354&rlz=1C1GCEA_enUS885US885&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiPk6vaivPqAhXsmOAKHVwWBdYQ_AUoAXoECA0QAw"
                    target="_blank"> <i class="fas fa-map-marker-alt my-3 mr-2"></i>Google Maps</a> -->
                <br> 
                <i class="fab fa-weixin my-3 mr-2"></i>
                <p class="d-inline">微信: &nbsp; Lisa307266</p>
                <br>
                <a class="d-inline" href="<?php echo get_site_url(); ?>">English</a>
                <p class="d-inline mx-1">•</p>
                <a class="d-inline" href="<?php echo get_site_url(); ?>/zh/">中文</a>
                <br><br>
                <p>©2014-2020 Grand Ocean (盛宴海鲜) <br> All Rights Reserved</p> 
            </div>
            <div class="col-6 col-lg-3 order-lg-4" id="footer-logo-section">
            <a href="https://www.google.com/maps?q=35-20+College+Point+Blvd+Flushing,+NY+11354&rlz=1C1GCEA_enUS885US885&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiPk6vaivPqAhXsmOAKHVwWBdYQ_AUoAXoECA0QAw">
                <img class="mb-3 img-fluid" 
                src=" <?php echo get_template_directory_uri(); ?>/assets/images/ft-map.jpg" 
                alt="Grand Ocean Seafood Wholesale Shop on Google Maps"> 
            </a>
                <img class="img-fluid mx-auto" id="footer-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png"
                    alt="Logo White">
                <br>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer();?>
</body>

</html>