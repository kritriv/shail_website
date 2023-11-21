<?php $this->load->view('partials/header-ui'); ?>
		<div class="buyer-log">
            <div class="container buyrr">
                <div class="row">
                    <div class="col-md-7">
                        <h2>logo</h2>
                        <p>Introducing TeaSoko Online Ecomerce and Bidding Application </p>
                        <h3>LET's CONNECT FOR<br>BUSINESS!</h3>
                        <p class="secod-par">Login to experience your world of TEA!</p>
                        <a href="#" class="check-link1">Contact Us</a>
                        <ul class="tea-typ">
                            <li><i class="fa fa-cart-plus" aria-hidden="true"></i> Ecomerce</li>
                            <li><i class="fa fa-leaf" aria-hidden="true"></i> Bidding</li>
                            <li><i class="fa fa-unlock-alt" aria-hidden="true"></i> Secure</li>
                        </ul>
                        <p class="need-acc">Social Media<span><a href="index.php"><i class="fa fa-google" aria-hidden="true"></i></a></span>
                            <span><a href="index.php"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                            <span><a href="index.php"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                        </p>
                        <div class="footr">
                            <p class="secod-par">Copyrights © 2018, TeaSoko. All Rights Reserved.</p>
                            <ul>
                                <li class="trm"><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 right-pt">
                        <div class="buyyer-form log-form">
                            <?php $this->load->view('partials/notification_messages'); ?>
                            <div class="inn-buyyer-form">
                                <h2>Forgot Password</h2>
                                <form method="post" style="padding:10px;">
                                        <div class="input-group mb-3 log-txt">
    	                                    <div class="input-group-prepend">
    	                                        <div class="input-group-text inn-log-txt">
    	                                            <img src="<?php echo base_url("asset/image/pwd.png");?>" alt=""> 
                                                </div>
    	                                    </div>
    	                                    <input type="password" name="user_password" class="form-control input-fields" required placeholder="Password"/>
    	                                </div>
                                        <div class="input-group mb-3 log-txt">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text inn-log-txt">
                                                    <img src="<?php echo base_url("asset/image/pwd.png");?>" alt=""> 
                                                </div>
                                            </div>
                                            <input type="password" name="confirm_password" class="form-control input-fields" required placeholder="Confirm Password"/>
                                        </div>
                                    <button type="submit" name="user_login" class="btn btn-success butnt">Submit</button>
                                </form>
                                <p class="need-acc">Click here<span><a href="<?=base_url('login')?>">Login</a></span></p>
                                <p class="need-acc log-sign">Need an account?</p>
                                <p class="buy-seller"><span><a href="#">Buyer SignUp</a></span> <!--<span><a href="#">Seller SignUp</a></span>--></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('partials/footer-ui'); ?>
