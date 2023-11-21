<?php include "header.php"; ?>
     
   <div class="container">  
    <div class="row-fluid">
        <div class="">
            <div class="row-fluid">
            	<div class="marg-top">
	                <div class="table-responsive"> 
	                    <table class="table table-bordered table-striped">
	                        <tbody>
	                        	<tr>
		                        	<th colspan="6" style="background:none; border-right:none;"></th>
		                    		<th colspan="2" style="background:none;border-left:none;">
		                    			<a style="float: right;width: 205px;" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" href="index.php">&lt; Continue Shopping</a>
		                    		</th>
		                    	</tr>
		                        <tr>
		                            <th>Action</th>
		                            <th>Product Image</th>
		                            <th>Product Name</th>
		                            <th>Color</th>
		                            <th>Quantity</th>
		                            <th colspan="2" style="text-align:right;width:10%">Price</th>
		                            <th style="text-align:right;width:11%">Sub Total</th>
		                        </tr>
		                        
		                         
		                        <tr>
									<td>
									<form action="product-cart/cart-remove.php" method="post">
										<input type="hidden" value="key66" name="remove_product_id">
										<div class="add-btn">
											<input type="submit" name="addtocart" value="X" class="btnAddAction">
										</div>
									</form>
									</td>                  
									<td><img src="image/44.jpg" width="50"></td>                  
									<td>
										<a style="color:#999999" href="#">TEA BAG</a>									</td>
									<td>green</td>
									<td>
										<form method="post" name="home_cartForm66" id="home_cartForm66">
	                                    <input type="hidden" name="request_qury" >
	                                        <input type="hidden" value="" name="productUrl">
	                                        <input type="hidden" value="66" name="product_id">
	                                        <input type="hidden" value="Love Drops (Carnelian)" name="product_name">
	                                        <input type="hidden" value="#" name="image">
	                                        <input type="hidden" value="10022" name="color">
	                                        <input type="hidden" value="10004" name="size">
	                                        <input type="hidden" value="40" name="product_sale_price">
	                                        <input type="hidden" value="40" name="product_mrp_price">
	                                        <input type="hidden" value="10018" name="postCategory">
                                                <input type="hidden" value="0" name="product_weight">
	                                            <table>
	                                                <tbody><tr>
	                                                    <td style="padding:0px">
	                                           	<select name="quantity" style="color: #000;padding: 5px 0 5px 2px;width: 60px;border:none;">
																<option value="1" selected="">1</option><option value="2">2</option>															</select>
	                                                    </td>
	                                                    <td style="padding:0px">
	                                                        <a class="btn btn-success" onclick="submitFormAddtoCart('home_cartForm',66)"><i class="fa fa-shopping-cart"></i> Update</a>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>
	                                    </form>
                                	</td>
									<td colspan="2" style="text-align:right!important;">$ 40.00 </td> 
																		<td style="text-align:right!important;">$ 40.00 </td>     
			                    </tr>
			                    		                    			                    	<tr><th colspan="4">
		                    			<form method="post" class="one-ln">
																				<br>
										<input type="text" name="couponCode" placeholder="Coupon Code">
										<input type="submit" value="Coupon Apply" name="couponUpdate" class="coupanapply"></form>
		                    			
		                    		</th>
		                    		<th colspan="3" style="text-align:right;">Sub Total:</th>
		                    		<th style="text-align:right;"> $ 40.00</th>
		                    	</tr>
		                    				                    			                    			                    	<tr>
			                    		<th colspan="7" style="text-align:right;">Total:</th>
			                    		<th style="text-align:right;"> CHF 40.00</th>
			                    	</tr>
		                    			                    	<tr>
		                    		<th colspan="6" style="background:none;border-right:none;"></th>
		                    		<th colspan="2" style="background:none;border-left:none;">
		                    			<form class="form-horizontal" method="POST" action="personalinfo.php">
	<input type="hidden" name="PAYMENTREQUEST_0_ITEMAMT" value="40.00" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_TAXAMT" value="0" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_SHIPPINGAMT" value="0" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_HANDLINGAMT" value="0" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_SHIPDISCAMT" value="0" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_INSURANCEAMT" value="0" readonly="">
	<input type="hidden" name="PAYMENTREQUEST_0_AMT" value="40.00" readonly="">
	<input type="hidden" name="LOGOIMG" value="">
	<input type="hidden" name="currencyCodeType" value="$" readonly="">
	<input type="Submit" alt="Proceed to Checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" value="Checkout" name="checkout">
</form>
		                    						    				</th>
		                    	</tr>
	                    	</tbody>
	                    </table>
	                </div>
                </div>
	        </div>
	    </div>
	</div>
</div>
    
    <?php include "footer.php"; ?>