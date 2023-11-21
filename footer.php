
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row dflex wrap">
                <div class="col-md-6 col-sm-12 second-column">
                    <h4><a href="<?= DIR_PATH_FULL?>our-bussiness">Businesses</a></h4>
                    <ul class="">
                        <?php foreach($bussines as $keyb=>$bussinesvalue){ ?>
                            <?php if($bussinesvalue->pcategoryid =='14'){ ?>
                                <li><a href="<?= DIR_PATH_FULL.'financial-services'?>"><?=$bussinesvalue->pcategory?></a></li>
                            <?php }else{ ?>
                                <li><a href="<?= DIR_PATH_FULL.'our-bussiness/'.$bussinesvalue->slug?>"><?=$bussinesvalue->pcategory?></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-5 third-column">
                    <h4>Quick Links</h4>
                    <ul>
                    <li><a href="<?= DIR_PATH_FULL?>about-us">About us</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>community">Community</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>newsroom">Newsroom</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>photos">Photos</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>human-social-protection-and-development">Human Social Protection and Development</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>contact-us">Contact</a></li>
                    </ul>    
                </div>
                <div class="col-md-4 col-sm-8 col-xs-7 first-column">
                    <div class="footer-logo"><a href="<?= DIR_PATH_FULL?>"><img src="<?= DIR_PATH_FULL.UI_IMAGE_PATH.$web[0]->footerlogo?>" alt="<?= $pagetitle;?>"/></a></div>
                    <ul>
                      <!--<li><a href="mailto:<?=$web[0]->email?>" target="_top"><i class="fas fa-envelope-open-text"></i> <?=$web[0]->email?></a></li>-->
                      <li><a href="#" target="_top"><i class="fas fa-map-signs"></i> <?=$web[0]->address?></a></li>    
                     <?php foreach($s_social as $keys=>$s_socialv){ ?>
                         <li><a href="<?=$s_socialv->sociallink?>" target="_blank"><i class="<?=$s_socialv->socialicon?>"></i> <span><?=$s_socialv->socialtitle?></span></a></li>
                      <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container dflex space-bitween">
                <p><?=$web[0]->copyright?><p>
                <ul class="terms-list">
                    <li><a href="<?= DIR_PATH_FULL?>privacy-policy">Privacy Policy</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>legal-disclaimer">Legal Disclaimer</a></li>
                    <li><a href="<?= DIR_PATH_FULL?>terms-conditions">Terms & Conditions </a></li>
                </ul>
            </div>
            <hr />
            <p style="text-align:center;">Design & Developed by <a href="https://www.xpectoitsolutions.com">Xpecto®</a><p>
        </div>
    </footer>  
      
      
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= DIR_PATH_FULL?>js/slick.min.js"></script>  
    <script src="<?= DIR_PATH_FULL?>js/custom.js"></script>
  </body>
</html>
<script>
    function refreshCaptcha() {
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
    }
    $('#pinfo').hide();
    $('#fine-instruments').hide();
    $('#montid').hide();
    $('#montidv').hide();
    $(document).ready(function(){
        $("#topic").change(function() {
            var v1=$(this).val();
            if(v1=='Project Funding'){
                $('#pinfo').show();
                $('#fine-instruments').hide();
                $('#projectlocated').val('');
                $('#projectdescription').val('');
                $('#finnace').val('');
                $('#instrumentowner').val('');
                $('#instrumenttype').val('');
                $('#facevalue').val('');
                $('#issuerissued').val('');
                $('#security').val('');
                $('#isinno').val('');
                $('#countryname').val('');
                $('#companyregisterd').val('');
                $('#mainbussiness').val('');
                $('#powerofattorney').val('');
                $('#organisationname').val('');
                $('#montid').hide();
                $('#montidv').hide();
            }else if(v1=='Financial Instruments Monetization'){
                $('#pinfo').hide();
                $('#fine-instruments').show();
                $('#projectlocated').val('');
                $('#projectdescription').val('');
                $('#finnace').val('');
                $('#instrumentowner').val('');
                $('#instrumenttype').val('');
                $('#facevalue').val('');
                $('#issuerissued').val('');
                $('#security').val('');
                $('#isinno').val('');
                $('#countryname').val('');
                $('#companyregisterd').val('');
                $('#mainbussiness').val('');
                $('#powerofattorney').val('');
                $('#organisationname').val('');
                $('#montid').show();
                $('#montidv').show();
            }else{
                $('#pinfo').hide();
                $('#fine-instruments').hide();
                $('#projectlocated').val('');
                $('#projectdescription').val('');
                $('#finnace').val('');
                $('#instrumentowner').val('');
                $('#instrumenttype').val('');
                $('#facevalue').val('');
                $('#issuerissued').val('');
                $('#security').val('');
                $('#isinno').val('');
                $('#countryname').val('');
                $('#companyregisterd').val('');
                $('#mainbussiness').val('');
                $('#powerofattorney').val('');
                $('#organisationname').val('');
                $('#montid').hide();
                $('#montidv').hide();
            }
        });
    });
</script>
<script type="text/javascript" language="javascript">
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    }); 
</script>
<script type="text/JavaScript"> 
function killCopy(e){ return false } 
function reEnable(){ return true } 
document.onselectstart=new Function ("return false"); 
if (window.sidebar)
{ document.onmousedown=killCopy; 
document.onclick=reEnable; } 
</script>