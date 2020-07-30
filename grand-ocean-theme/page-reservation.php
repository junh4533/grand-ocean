<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Reservation Page */ ?>

<?php get_header();?>

<section id="reservation">
    <div class="container-fluid h-100 w-100">
        <div class="row h-100 w-100">
            <div class="col-7 d-flex align-items-end justify-content-center">
                <div>
                    <h1 class="mb-5">Reservation</h1>
                    <div class="d-flex">
                        <span class="circle mr-5">
                            <p>1</p>
                        </span>
                        <h3 class="d-inline">Customer</h3>
                    </div>
                    <hr>

                    <form action="">
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">WeChat ID</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                    </form>

                    <div class="d-flex">
                        <span class="circle mr-5">
                            <p>2</p>
                        </span>
                        <h3 class="d-inline">Delivery</h3>
                    </div>
                    <hr>

                    <form action="">
                        <div class="form-group">
                            <label for="email">Street</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">State</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Zip Code</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                    </form>

                    <div class="d-flex">
                        <span class="circle mr-5">
                            <p>3</p>
                        </span>
                        <h3 class="d-inline">Details</h3>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="comment">Comments:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-5" id="order-summary">
                <div class="tint"></div>
                <h1>Order Summary</h1>
                <div class="row">
                    <div class="col-6 d-flex flex-column">
                        <img class="align-self-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/abalone.jpg" alt="Abalone">
                        <p class="item-price align-self-end">$99.99 ea</p>
                    </div>
                    <div class="col-6 d-flex">
                        <p class="align-self-center total-price">$299.97</p>
                        <p class="align-self-end item-price">x3</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_footer();?>