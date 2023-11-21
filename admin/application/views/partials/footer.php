          </div>

          <div class="parhgralph">

            <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright © 2021 Shail - International Group. All rights reserved. </span></p>

            <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Designed by <a href="#">Xpecto®️ </a></span></p>

          </div>

          <div class"clear"></div>

        </div>

    </div>

</div>

<script>

        $(document).ready(function(){

            $(".order-maang").click(function(){

                $(".inn-order-ma").toggle(1000);

            });

        });

      $(document).ready(function(){

      $(".inn-web-mang2").hide();

      });

      $(document).ready(function(){

      $(".in-web-man2").click(function(){

      $(".inn-web-mang2").toggle(1000);

      });

      });

    </script> 





    <script>

      $(document).ready(function(){

      $(".in-web-man").click(function(){

      $(".inn-web-mang").toggle(1000);

      });

      });

    </script> 

    <script>

      $(document).ready(function(){

      $(".sellr-mng").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".sell-maan").click(function(){

      $(".sellr-mng").toggle(1000);

      });

      });

    </script>  









    <script>

      $(document).ready(function(){

      $(".inn-seller-man").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".sell-maan").click(function(){

      $(".inn-seller-man").toggle(1000);

      });

      });

    </script> 









    <script>

      $(document).ready(function(){

      $(".clk-filt").click(function(){

      $(".filter-slid").toggle(1000);

      });

      });

    </script>





    <script>

      $(document).ready(function(){

      //$(".filter-slid").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".in-sellll").hide();

      });

    </script>



    <script>

      $(document).ready(function(){

      $(".inn-inn-seller-man").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".shw1").click(function(){

      $(".in-sellll").toggle(1000);

      });

      });

    </script>



    <script>

      $(document).ready(function(){

      $(".in-sellll").click(function(){

      $(".inn-inn-seller-man").toggle(1000);

      });

      });

    </script>







    <script>

      $(document).ready(function(){

      $(".inn-order-ma").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".inn-web-mang").hide();

      });

    </script>





    <script>

      $(document).ready(function(){

      $(".shw4").click(function(){

      $(".inn-web-mang").toggle(1000);

      });

      });

    </script>



    <script>

      $(document).ready(function(){

      $(".shw8").click(function(){

      $(".inn-order-ma").toggle(1000);

      });

      });

    </script>











    <script>

      /*function openNav() {

      document.getElementById("side-br").style.width = "250px";

      }



      function closeNav() {

      document.getElementById("side-br").style.width = "0";

      }*/

    </script>

    <script type="text/javascript">

      function openItModel(id){

          document.getElementById(id).style.display = "block";

      }

      function closeItModel(id){

          document.getElementById(id).style.display = "none";

      }

      function passStrengthCheck(password1, password2, passwordMsg){



          var password1       = $('#'+password1); //id of first password field



          var password2       = $('#'+password2); //id of second password field



          var passwordsInfo   = $('#'+passwordMsg); //id of indicator element



          //Must contain 5 characters or more



          var WeakPass = /(?=.{5,}).*/; 



          //Must contain lower case letters and at least one digit.



          var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 



          //Must contain at least one upper case letter, one lower case letter and one digit.



          var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 



          //Must contain at least one upper case letter, one lower case letter and one digit.



          var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/; 



          $(password1).on('keyup', function(e) {



              if(VryStrongPass.test(password1.val()))



              {



                  passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Awesome, please don't forget your pass now!)");



              }   



              else if(StrongPass.test(password1.val()))



              {



                  passwordsInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");



              }   



              else if(MediumPass.test(password1.val()))



              {



                  passwordsInfo.removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");



              }



              else if(WeakPass.test(password1.val()))



              {



                  passwordsInfo.removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make good password)");



              }



              else



              {



                  passwordsInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 6 chars)");



              }



          });



          $(password2).on('keyup', function(e) {



              



              if(password1.val() !== password2.val())



              {



                  passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!");   



              }else{



                  passwordsInfo.removeClass().addClass('goodpass').html("Passwords match!");  



              }



          });

      }

      $(document).ready(function(){  

        $('#create_excel').click(function(){  

             var excel_data = $('#listTable').html();

             /*//console.log(excel_data); 

             var page = "http://[::1]/code/2018/CI/tea-soko/product/download/" + excel_data;  

             console.log(page); 

             window.location = page; */



        });  

   });



var xport = {

  _fallbacktoCSV: true,  

  toXLS: function(tableId, filename) {   

    this._filename = (typeof filename == 'undefined') ? tableId : filename;

    

    //var ieVersion = this._getMsieVersion();

    //Fallback to CSV for IE & Edge

    if ((this._getMsieVersion() || this._isFirefox()) && this._fallbacktoCSV) {

      return this.toCSV(tableId);

    } else if (this._getMsieVersion() || this._isFirefox()) {

      alert("Not supported browser");

    }



    //Other Browser can download xls

    var htmltable = document.getElementById(tableId);

    var html = htmltable.outerHTML;



    this._downloadAnchor("data:application/vnd.ms-excel" + encodeURIComponent(html), 'xls'); 

  },

  toCSV: function(tableId, filename) {

    this._filename = (typeof filename === 'undefined') ? tableId : filename;

    // Generate our CSV string from out HTML Table

    var csv = this._tableToCSV(document.getElementById(tableId));

    // Create a CSV Blob

    var blob = new Blob([csv], { type: "text/csv" });



    // Determine which approach to take for the download

    if (navigator.msSaveOrOpenBlob) {

      // Works for Internet Explorer and Microsoft Edge

      navigator.msSaveOrOpenBlob(blob, this._filename + ".csv");

    } else {      

      this._downloadAnchor(URL.createObjectURL(blob), 'csv');      

    }

  },

  _getMsieVersion: function() {

    var ua = window.navigator.userAgent;



    var msie = ua.indexOf("MSIE ");

    if (msie > 0) {

      // IE 10 or older => return version number

      return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);

    }



    var trident = ua.indexOf("Trident/");

    if (trident > 0) {

      // IE 11 => return version number

      var rv = ua.indexOf("rv:");

      return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);

    }



    var edge = ua.indexOf("Edge/");

    if (edge > 0) {

      // Edge (IE 12+) => return version number

      return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);

    }



    // other browser

    return false;

  },

  _isFirefox: function(){

    if (navigator.userAgent.indexOf("Firefox") > 0) {

      return 1;

    }

    

    return 0;

  },

  _downloadAnchor: function(content, ext) {

      var anchor = document.createElement("a");

      anchor.style = "display:none !important";

      anchor.id = "downloadanchor";

      document.body.appendChild(anchor);



      // If the [download] attribute is supported, try to use it

      

      if ("download" in anchor) {

        anchor.download = this._filename + "." + ext;

      }

      anchor.href = content;

      anchor.click();

      anchor.remove();

  },

  _tableToCSV: function(table) {

    // We'll be co-opting `slice` to create arrays

    var slice = Array.prototype.slice;



    return slice

      .call(table.rows)

      .map(function(row) {

        return slice

          .call(row.cells)

          .map(function(cell) {

            return '"t"'.replace("t", cell.textContent);

          })

          .join(",");

      })

      .join("\r\n");

  }

};





      

    </script>

    <script type="text/javascript">

          function getState(id,field){

              $.ajax({

                  type: "POST",

                  url: "<?=str_replace('/admin', '', base_url())?>db/getState.php",

                  data: {'countryId':id},

                  cache: false,

                  success: function(data){

                      $('#'+field).html('<option value=""> Select State</option>'+data);

                  }

              });

          }

          function removeWishList(id,url){

            window.location.href=url;

            /*$.ajax({

                  type: "POST",

                  url: "<?=str_replace('/admin', '', base_url())?>db/wishlist-remove.php",

                  data: {'wishlistid':id,'url':url,'type':'add'},

                  cache: false,

                  success: function(data){

                      console.log(data);

                      d = $.parseJSON(data);

                      if(d.status == 'OK'){

                          window.location.href=url;

                      }

                  }

              });*/

          }

          function getCity(id,field){

              $.ajax({

                  type: "POST",

                  url: "<?=str_replace('/admin', '', base_url())?>db/getCity.php",

                  data: {'stateId':id},

                  cache: false,

                  success: function(data){

                      $('#'+field).html('<option value=""> Select City</option>'+data);

                  }

              });

          }

          function checkExist(val,msgId,column){

              data = {'field':val,'type':'user','column':column}

              checkemailid(data,msgId);

          }

          function checkemailid(dataSend,field){

              $.ajax({

                  type: "POST",

                  url: "<?=str_replace('/admin', '', base_url())?>db/checkExist.php",

                  data: dataSend,

                  cache: false,

                  success: function(data){

                    console.log(data);

                      d = $.parseJSON(data);

                      if(d.status != 'OK'){

                          $('#'+field).html('');

                          $('.xp_submit').show();

                      }

                      else {

                          $('#'+field).html(d.msg);

                          $('.xp_submit').hide();

                      }



                  }

              });

          }

          function IsEmail(email) {

              var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

              if (!regex.test(email)) {

                  return false;

              } else {

                  return true;

              }

          }

          function isNumberKey(evt){

              var charCode = (evt.which) ? evt.which : evt.keyCode;

              if (charCode > 31  && (charCode < 48 || charCode > 57 ) )

              return false;

              return true;

          }

      </script>

      <script type="text/javascript"> 

              $(document).ready(function() { 

                  $(".mytablePagination").dataTable( {

                "oLanguage": {

                  "sLengthMenu": "Display _MENU_ records"

                }

            }); 

              }); 

      </script> 

    </body>

</html>