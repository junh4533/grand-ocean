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
                        <div class="form-group w-25">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="form-group w-25">
                            <label for="wechat">WeChat ID</label>
                            <input type="text" class="form-control" id="wechat">
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
                        <div class="form-group w-75">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street">
                        </div>
                        <div class="form-group w-25">
                            <label for="text">State</label>
                            <input type="text" class="form-control" id="pwd">
                        </div>
                        <div class="form-group w-25">
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

            <div class="col-5 d-flex align-items-center justify-content-center flex-column" id="order-summary">
                <div class="bg"></div>
                <div class="tint"></div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 mb-5">
                        <h1>Order Summary</h1>
                    </div>
                    <div class="col-5 d-flex flex-column">
                        <img class="align-self-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/abalone.jpg" alt="Abalone">
                        <p class="item-price align-self-end mt-3">$99.99 ea</p>
                    </div>
                    <div class="col-5 d-flex justify-content-end">
                        <p class="align-self-center total-price">$299.97</p>
                        <p class="align-self-end item-price mt-3">x3</p>
                    </div>
                    <div class="col-10"><hr></div>

                    <div class="col-5 d-flex flex-column">
                        <img class="align-self-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/abalone.jpg" alt="Abalone">
                        <p class="item-price align-self-end mt-3">$99.99 ea</p>
                    </div>
                    <div class="col-5 d-flex justify-content-end">
                        <p class="align-self-center total-price">$299.97</p>
                        <p class="align-self-end item-price mt-3">x3</p>
                    </div>
                    <div class="col-10"><hr></div>
                    <div class="col-10 text-right"><p class="d-inline mr-3">Total</p> <p class="d-inline final-price">$599.94</p></div>
                    <div class="col-12 text-right mt-5">
                        <button type="button" class="btn">Reserve</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_footer();?>