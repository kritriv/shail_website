<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TEA SOKO</title>
        <link rel="icon" type="image/png" href="<?php echo base_url("asset/image/favicon.ico"); ?>"/>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>


        <link rel="stylesheet" href="<?php echo base_url("asset/css/dash.css"); ?>"/>        
        <link rel="stylesheet" href="<?php echo base_url("asset/css/main.css"); ?>"/>
    </head>
    <body class="">
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                                <h2>Login</h2>
                                <form method="post" style="padding:10px;" enctype="multipart/form-data">
                                    <div class="input-group mb-3 log-txt">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text inn-log-txt">
                                                <img src="<?php echo base_url("asset/image/user.png");?>" alt=""> 
                                            </div>
                                        </div>
                                        <input type="text" name="email" value="" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="input-group mb-3 log-txt">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text inn-log-txt">
                                                <img src="<?php echo base_url("asset/image/pwd.png");?>" alt=""> 
                                            </div>
                                        </div>
                                        <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div>
                                    </div> 
                
                                   <button type="submit" name="user_login" class="btn btn-success butnt">Login</button>
                                </form>
                                <p class="need-acc"><span><a href="<?=base_url('forgot')?>">Forgot your password ?</a></span></p>
                                <p class="need-acc log-sign">Need an account?</p>
                                <p class="buy-seller"><span><a href="#">Buyer SignUp</a></span> <!--<span><a href="#">Seller SignUp</a></span>--></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>