<?php $this->load->view('partials/header-ui-user'); ?>

<div class="buyyer-form log-form">

    <?php $this->load->view('partials/notification_messages'); ?>

    <div class="inn-buyyer-form">

        <h3>Forgot your password?</h3>

        <form method="post" style="padding:10px;">

                <div class="input-group mb-3 log-txt colortext">

                    <div class="input-group-prepend">

                        <div class="input-group-text inn-log-txt">

                            <img src="<?php echo base_url("asset/image/pwd.png");?>" alt=""> 

                        </div>

                    </div>

                    <input type="password" name="user_password" class="form-control input-fields" required placeholder="Password"/>

					<input type="checkbox" onclick="show_password_function1()" class="forgotpassword">Show

                </div>

                <div class="input-group mb-3 log-txt colortext">

                    <div class="input-group-prepend">

                        <div class="input-group-text inn-log-txt">

                            <img src="<?php echo base_url("asset/image/pwd.png");?>" alt=""> 

                        </div>

                    </div>

                    <input type="password" name="confirm_password" class="form-control input-fields" required placeholder="Confirm Password"/>

					<input type="checkbox" onclick="show_password_function1()" class="forgotpassword">Show

                </div>

            <button type="submit" name="user_login" class="btn btn-success butnt">Submit</button>

        </form>

        <p class="need-acc">Click here<span><a href="<?=base_url('login')?>">Login</a></span></p>

        <!--<p class="need-acc log-sign">New account?</p>

        <p class="buy-seller"><span><a href="<?=base_url('buyersignup')?>">Buyer Signup</a></span> <!--<span><a href="<?=base_url('sellersignup')?>">Seller SignUp</a></span></p>-->

    </div>

</div>

<script>

function show_password_function() {

  var x = document.getElementById("user_password");

  if (x.type === "password") {

    x.type = "text";

  } else {

    x.type = "password";

  }

}



function show_password_function1() {

  var x = document.getElementById("confirm_password");

  if (x.type === "password") {

    x.type = "text";

  } else {

    x.type = "password";

  }

}

</script>

<?php $this->load->view('partials/footer-ui-user'); ?>