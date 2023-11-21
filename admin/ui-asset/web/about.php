<?php include "header.php"; ?>


      
	  <div class="baneeeer">
	    <h2>About US</h2>
	  </div>
  
    <div class="section-mid-part">
    <div class="container">
      
        <div class="row">
            <div class="col-md-6">
            <div class="col-12 inmg-party">
                <img src="image/aboutt.jpg" alt="">
             
                </div>
            </div>
            <div class="col-md-6">
               <div class="col-12">
               
                <h2>Lorem Ipsum simply </h2>
           
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, </p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                </div>
            </div>
            
        </div>
        </div>
        
    </div>	     <div class="top-footerr-about"> 

    <div class="link-auct-dir">
				<ul>
				<li><h2  class="dicrtty dicrt-show active" style="font-size:18px">our vision</h2>
				
				</li>
				<li><h2 class="auction-hide" style="font-size:18px">our Mission</h2>
				
				</li>
				</ul>
				</div> 
<div class="clickblee">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, </p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
				</div>	

<div class="clickblee1">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, </p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>
				</div>				
				</div>
       </div>
	   
	   
	   
	   
	   	<script>
$(document).ready(function(){
    $(".clickblee1").hide();
 });
</script>

<script>
$(document).ready(function(){

  $(".dicrt-show").click(function(){
    $(".clickblee1").show();
  });
});
</script>


<script>
$(document).ready(function(){

  $(".auction-hide").click(function(){
    $(".clickblee1").hide();
  });
});
</script>
	   
	   
	   
	   
	   
	   
	   <script>
$(document).ready(function(){
$('.dicrt-show').click(function(){
$('.auction-hide').removeClass('active');
});
});
</script>

<script>
$(document).ready(function(){
$( ".dicrt-show" ).addClass( "active" );
});
</script>
<script>
$(document).ready(function(){
$('.auction-hide').click(function(){
$('.dicrt-show').removeClass('active');
});
});
</script>
   <?php include "footer.php"; ?>