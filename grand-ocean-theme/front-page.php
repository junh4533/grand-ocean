<!-- Template for the home page -->

<?php get_header();?>

<section id="home">
    <div class="tint"></div>
    <div id="home-content" class="d-flex justify-content-center">
        <!-- <h1>鲜</h1> -->
        <img class="w-50" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png"
                alt="Logo">
    </div>
</section>
<section id="products">
    <div class="modal fade in" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">我的购物车</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode("[woocommerce_cart]"); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                </div>
            </div>

        </div>
    </div>
    <div id="main">
        <div class="products-header">
            <h3 class="products-title">今天的精选</h3>
            <?php echo do_shortcode("[woo_cart_but]"); ?>
        </div>
        <?php echo do_shortcode("[products columns='4' class='products']"); ?>
    </div>
</section>

<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="column col-12 col-sm-12 col-md-6 col-lg-6">
                <h1>我们的故事</h1>
                <br>
                <p>盛宴海鲜是一家位于纽约大学城的海鲜批发商店。自2015年以来，我们一直在努力工作，以最低的价格为您带来最新鲜的海鲜。我们种类繁多的海鲜非常适合餐厅，海鲜市场，小型家庭聚会和大型活动餐饮。我们每周7天为纽约市5区供应海鲜。立即订购新鲜海鲜！</p>
                <br>
                <h3>营业时间</h3>
                <br>
                <br>
                <p>我们每周（包括周末）每天上午10:00至下午5:00营业！假期的营业时间可能会更改。</p>
                <br>
                <br>
                <a class="nav-link" style="padding: 0;" href="#products">
                <button type="button" class="button1">今天的精选</button>
                </a>
            </div>
            <div class="column p-5 d-flex align-items-center col-12 col-sm-12 col-md-6 col-lg-6">
                <img class="about-image img-fluid"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg"
                    alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>