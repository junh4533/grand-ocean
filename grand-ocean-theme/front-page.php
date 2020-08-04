<!-- Template for the home page -->

<?php get_header();?>

<section id="home">
    <div class="tint"></div>
    <div id="home-content">
        <h1>鲜</h1>
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
            <h3 class="text-heading">今天的精选</h3>
            <?php echo do_shortcode("[woo_cart_but]"); ?>
        </div>
        <?php echo do_shortcode("[products columns='4' class='products']"); ?>
    </div>
</section>

<section id="about-us">
    <div class="container">
        <div class="row">
            <div
                class="column d-flex align-items-center justify-content-center col-12 col-sm-12 col-md-6 col-lg-6 order-md-2 p-sm-5 mb-3">
                <img class="about-image img-fluid"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/seafood-place.jpg"
                    alt="Exterior of Grand Ocean Seafood Wholesale Shop" class="center">
            </div>
            <div class="column col-12 col-sm-12 col-md-6 col-lg-6 order-md-1 mb-3">
                <h1 class="text-heading">我们的故事</h1>
                <p class="my-5">
                    盛宴海鲜是一家位于纽约大学城的海鲜批发商店。自2015年以来，我们一直在努力工作，以最低的价格为您带来最新鲜的海鲜。我们种类繁多的海鲜非常适合餐厅，海鲜市场，小型家庭聚会和大型活动餐饮。我们每周7天为纽约市5区供应海鲜。立即订购新鲜海鲜！
                </p>
                <h3 class="text-heading">营业时间</h3>
                <p class="my-5">我们每周（包括周末）每天上午10:00至下午5:00营业！假期的营业时间可能会更改。</p>
                <a class="btn button1" href="<?php echo get_site_url(); ?>#products">
                    今天的精选
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>