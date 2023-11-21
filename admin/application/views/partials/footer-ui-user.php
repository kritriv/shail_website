                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<style type="text/css">
.buyerphonewithcode{
    width: 56px;
}
</style>
<script type="text/javascript">
		function getState(id,field,phonecodeid){
			$.ajax({
                type: "POST",
                url: "<?=str_replace('/admin', '', base_url())?>db/getState.php",
                data: {'countryId':id},
                cache: false,
                success: function(data){
                	$('#'+field).html('<option value=""> Select State</option>'+data);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?=str_replace('/admin', '', base_url())?>db/getCountry.php",
                data: {'countryId':id},
                cache: false,
                success: function(data){
                    console.log(data);
                    $('#'+phonecodeid).val(data);
                }
            });
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
            check(data,msgId);
        }
        function check(dataSend,field){
            $.ajax({
                type: "POST",
                url: "<?=str_replace('/admin', '', base_url())?>db/checkExist.php",
                data: dataSend,
                cache: false,
                success: function(data){
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
        function getbuyerType(val){
            if(val == 2){
                $('#companyname').attr('required');
                $('#registrationno').attr('required');
                $('#companyname').show();
                $('#registrationno').show();
            }else{
                $('#companyname').removeAttr('required');
                $('#registrationno').removeAttr('required');
                $('#companyname').hide();
                $('#registrationno').hide();
            }

        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31  && (charCode < 48 || charCode > 57 ) )
            return false;
            return true;
        }
        $(document).ready(function() {
            function setHeight() {
                windowHeight = $(window).innerHeight();
                $('.buyer-log').css('min-height', windowHeight);
            };
            setHeight();
          
            $(window).resize(function() {
                setHeight();
            });
        });
</script>