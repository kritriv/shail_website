<?php $this->load->view('partials/header-ui-user'); ?>
<div class="buyyer-form">
    <?php //var_dump(array_keys($allArray)); ?>
    <?php //var_dump($allArray['typeofbuyer']); ?>

    <div class="inn-buyyer-form">
        <br/>
        <div class="text-pt">
            <?php $this->load->view('partials/notification_messages'); ?>
        </div>
        <?php echo validation_errors(); ?>
        <h2>Seller SignUp </h2>
        <form method="post" style="padding:10px;" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="First Name" name="firstname" value="<?=set_value('firstname')?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Last Name" name="lastname" value="<?=set_value('lastname')?>" required>
            </div>
            <div class="form-group"><span id="uEmailSpan"></span>
                <input type="email" class="form-control"  placeholder="Email" name="emailid" value="<?=set_value('emailid')?>" onkeyup="checkExist(this.value,'uEmailSpan','emailid')" required>
            </div>
            <div class="form-group showpassword">
				<div class="row">
					<div class="col-md-8">
						<input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" requireed value="<?=set_value('user_password')?>" required>
					</div>
					<div class="col-md-4">
						<input type="checkbox" onclick="show_password_function()" class="checkclass">Show
					</div>
				</div>
            </div>
            <div class="form-group showpassword">
				<div class="row">
					<div class="col-md-8">
						<input type="password" class="form-control"  placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
					</div>
					<div class="col-md-4">
						<input type="checkbox" onclick="show_password_function1()" class="checkclass">Show
					</div>
				</div>
            </div>
            <input type="hidden" name="statusid" value="2">
            <input type="hidden" name="roleid" value="4">
            
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Company Name" name="companyname" value="<?=set_value('companyname')?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Registration No" name="registrationno" value="<?=set_value('registrationno')?>">
            </div>
            
            <div class="form-group">
                <select class="form-control" name="sellertypeid" value="<?=set_value('sellertypeid')?>" required>
                    <option value="">Select Seller Type</option>
                    <?php foreach ($allArray['sellertype'] as $key => $value) { ?>
                        <option value="<?=$value['sellertypeid']?>"><?=$value['sellertype']?></option>
                    <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control"  name="billcountryid" value="<?=set_value('billcountryid')?>" onchange="getState(this.value,'billstateid','sellerphonewithcode')" required>
                    <option value="">Select Country</option>
                    <?php foreach ($allArray['shipcountry'] as $key => $value) { ?>
                        <option value="<?=$value['shipcountryid']?>"><?=$value['shipcountry']?></option>
                    <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control"  name="billstateid" id="billstateid" value="<?=set_value('billstateid')?>" onchange="getCity(this.value,'billcityid')" required>
                    <option value="">Select State</option>
                    <?php foreach ($allArray['shipstate'] as $key => $value) { ?>
                        <option value="<?=$value['shipstateid']?>"><?=$value['shipstate']?></option>
                    <?php   }   ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="billcityid" id="billcityid" value="<?=set_value('billcityid')?>" required>
                    <option value="">Select City</option>
                    <?php foreach ($allArray['shipcity'] as $key => $value) { ?>
                        <option value="<?=$value['shipcityid']?>"><?=$value['shipcity']?></option>
                    <?php   }   ?>
                </select>
            </div>
            <div class="form-group mergg">
                <div class="input-group-prepend">
                    <input type="text" readonly name="sellerphonewithcode" id="sellerphonewithcode" class="sellerphonewithcode" placeholder="Country Code"/>
                    <!--
                    <select class="input-group-text" name="sellerphonewithcode" id="sellerphonewithcode">
                        <option value="0">Select</option>
                        <?php foreach ($allArray['countryphonecode'] as $ki => $vi) { ?>
                            <option value="+<?=$vi['phonecode']?>">+<?=$vi['phonecode']?></option>
                        <?php   }    ?>
                    </select>
                    <script type="text/javascript"> $( function() { $( "#sellerphonewithcode" ).combobox(); } ); </script>-->
                </div>
                <input type="text" class="form-control tsr" onkeypress="return isNumberKey(event);" maxlength="10"  placeholder="Phone/Mobile" name="sellerphone" value="<?=set_value('sellerphone')?>" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="1" name="address" placeholder="Address" value="<?=set_value('address')?>" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Zip Code" onkeypress="return isNumberKey(event);" maxlength="6" name="billzipcode" value="<?=set_value('billzipcode')?>" required>
            </div>
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div>
            </div>
            <div class="form-check-inline">
                <input type="checkbox" class="form-check-input check-typ" value="" required>I Accept the Term and Conditions
            </div>
            <button type="submit" name="insert" class="btn btn-success butnt xp_submit">SignUp</button>
        </form>
        <p class="need-acc"><span><a href="<?=base_url('forgot')?>">Forgot your password ?</a></span></p>
        <p class="need-acc log-sign">Need an account?</p>
        <p class="buy-seller"><span><a href="<?=base_url('login')?>">Login</a></span> <span><a href="<?=base_url('buyersignup')?>">Buyer SignUp</a></span></p>
        <br/>
        <br/>
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