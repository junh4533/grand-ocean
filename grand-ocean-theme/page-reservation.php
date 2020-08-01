<!-- ENSURE THAT THE TEMPLATE NAME IS CORRECT  -->
<?php /* Template Name: Reservation Page */ ?>

<?php get_header();?>

<section id="reservation">
    <?php echo do_shortcode("[woocommerce_checkout]") ?>
</div>

<!-- <section id="reservation">
    <div class="container-fluid h-100 w-100">
        <form class="h-100 w-100" action="">
            <div class="row h-100 w-100">

                <div class="col-12 col-lg-7 py-5 d-flex align-items-center justify-content-center">
                    <div class="w-75">
                        <h1 class="mb-5">Reservation</h1>

                        <div class="d-flex mt-3">
                            <span class="circle mr-5">
                                <p>1</p>
                            </span>
                            <h3 class="d-inline">Customer</h3>
                        </div>
                        <hr>

                        <div class="form-group w-25">
                            <label for="phone" class="required-label">Phone Number</label>
                            <input type="tel" title="Please enter a valid phone number"
                                pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group w-25">
                            <label for="wechat">WeChat ID</label>
                            <input type="text" placeholder="Optional" class="form-control" id="wechat">
                        </div>

                        <div class="d-flex mt-3">
                            <span class="circle mr-5">
                                <p>2</p>
                            </span>
                            <h3 class="d-inline">Delivery</h3>
                        </div>
                        <hr>

                        <div class="form-group w-75">
                            <label for="street" class="required-label">Street</label>
                            <input type="text" class="form-control" id="street" required>
                        </div>
                        <div class="form-group w-25">
                            <label for="city" class="required-label">City</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <div class="form-group w-25">
                            <label for="state" class="required-label">State</label>
                            <select class="form-control" id="state" name="state">
                                <option value="" selected>Please Select</option>
                                <option value="AK">Alaska</option>
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="AS">American Samoa</option>
                                <option value="AZ">Arizona</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorada</option>
                                <option value="CT">Conneticut</option>
                                <option value="DC">District of Colombia</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="FM">Federated States</option>
                                <option value="GA">Georgia</option>
                                <option value="GU">Guam</option>
                                <option value="HI">Hawaii</option>
                                <option value="IA">Iowa</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MD">Maryland</option>
                                <option value="ME">Maine</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MO">Missouri</option>
                                <option value="MS">Mississippi</option>
                                <option value="MT">Montana</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="NE">Nebraska</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NV">Nevada</option>
                                <option value="NY">New York</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VI">Virgin Islands</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WV">West Virginia</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="form-group w-25">
                            <label for="zip" class="required-label">Zip Code</label>
                            <input type="text" title="Please enter a valid zip code"
                                pattern="^\s*?\d{5}(?:[-\s]\d{4})?\s*?$" class="form-control" id="zip" required>
                        </div>

                        <div class="d-flex mt-3">
                            <span class="circle mr-5">
                                <p>3</p>
                            </span>
                            <h3 class="d-inline">Details</h3>
                        </div>
                        <hr>
                        <div class="form-group w-75">
                            <label for="comment">Comments</label>
                            <textarea class="form-control" rows="3" id="comment"></textarea>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-5 py-5 d-flex flex-column" id="order-summary">
                    <div class="bg"></div>
                    <div class="tint"></div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-12 mb-5">
                            <h1>Order Summary</h1>
                        </div>
                        <div class="col-5 d-flex flex-column">
                            <img class="align-self-center"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/abalone.jpg"
                                alt="Abalone">
                            <p class="item-price align-self-end mt-3">$99.99 ea</p>
                        </div>
                        <div class="col-5 d-flex justify-content-end">
                            <p class="align-self-center total-price">$299.97</p>
                            <p class="align-self-end item-price mt-3">x3</p>
                        </div>
                        <div class="col-10">
                            <hr>
                        </div>

                        <div class="col-5 d-flex flex-column">
                            <img class="align-self-center"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/abalone.jpg"
                                alt="Abalone">
                            <p class="item-price align-self-end mt-3">$99.99 ea</p>
                        </div>
                        <div class="col-5 d-flex justify-content-end">
                            <p class="align-self-center total-price">$299.97</p>
                            <p class="align-self-end item-price mt-3">x3</p>
                        </div>
                        <div class="col-10">
                            <hr>
                        </div>
                        <div class="col-10 text-right">
                            <p class="d-inline mr-3">Total</p>
                            <p class="d-inline final-price">$599.94</p>
                        </div>
                        <div class="col-12 text-right mt-5">
                            <button type="submit" class="btn btn-lg">Reserve</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section> -->

<?php get_footer();?>