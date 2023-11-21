<?php $this->load->view('partials/header-ui-user'); ?>

<div class="buyyer-form log-form">

    <?php $this->load->view('partials/notification_messages'); ?>

    <div class="inn-buyyer-form">

        <h2>Forgot your password?</h2>

        <form method="post" style="padding:10px;">

            <div class="input-group mb-3 log-txt">

                <div class="input-group-prepend">

                    <div class="input-group-text inn-log-txt">

                        <img src="<?php echo base_url("asset/image/user.png");?>" alt=""> 

                    </div>

                </div>

                <input type="text" name="emailid" value="" class="form-control" placeholder="Email" required>

            </div>

            <button type="submit" name="user_login" class="btn btn-success butnt">Submit</button>

        </form>

        <p class="need-acc">Click here<span><a href="<?=base_url('login')?>">Log in</a></span></p>

        <!--<p class="need-acc log-sign">New account?</p>

        <p class="buy-seller"><span><a href="<?=base_url('buyersignup')?>">Buyer Signup</a></span> <!--<span><a href="<?=base_url('sellersignup')?>">Seller SignUp</a></span></p>-->

    </div>

</div>

<?php $this->load->view('partials/footer-ui-user'); ?>