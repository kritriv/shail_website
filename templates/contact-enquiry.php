    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$page[0]->mainimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / <span><?=$page[0]->pagetitle?></span></div>
                <h1 class="title"><?=$page[0]->pagetitle?></h1>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
    <?php  if(isset($_POST['contactv'])){
            if (empty($_SESSION['captcha_code']) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0) {
                $val = "<span style='color:red;'> &nbsp;Captcha code does not match!</span>";
            } else {
                $mail->IsSMTP();
                //$mail->SMTPDebug = SMTPDEBUG;
                $mail->Mailer = MAILER;
                $mail->Host = HOST;
                $mail->Port = PORT; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
                $mail->SMTPAuth = SMTPAUTH;
                $mail->SMTPSecure = SMTPSECURE;
                $mail->Username = USERNAME;
                $mail->Password = PWD;
                $mail->Encoding = 'base64';
                $mail->charSet = "UTF-8";
                $mail->IsHTML(true);
                $mail->From = FROM;
                $mail->FromName = FROMNAME;
                $mail->AddAddress(CONTACT_MAIL_ID);
                $mail->Subject = "Contact Enquiry";
                $mail->Body = "Dear Admin,<br><br>Somebody has filled the contact enquiry form!<br><br>
                <p>Name: ".$_POST['name']."</p>
                <p>Email: ".$_POST['email']."</p>
                <p>Company: ".$_POST['company']."</p>
                <p>Telephone: ".$_POST['phone']."</p>
                <p>Project Description: ".$_POST['projectdescription']."</p><br><br>Thanks & Regards,<br>'.$web[0]->title";
                $mail->WordWrap = 50;
                if(!$mail->Send()) {
                    $val='<p style="color:red;font-size:18px;">Message Not Sent. Please try again!</p>';
                    $val= 'Mailer error: ' . $mail->ErrorInfo;
                } else {
                    $val='<p style="color:green;font-size:18px;">Message Sent Successfully!</p>';
                    header("refresh: 20; url =".DIR_PATH_FULL);   
                }
            }
        }
        ?>
    <div class="content-part contact-page bg-gray">
        <section class="section contact-section">
            <div class="container">
            <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 dflex wrap">
                <form class="contact-from bg-white" action="#" method="post">
                    <div class="row" id="errormessage" style="text-align:center;"><?=$val?></div>
                   <h2 class="title">Contact Enquiry</h2>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <input type="text" required class="form-control" name="name" placeholder="Name"/>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="email" required class="form-control" name="email" placeholder="Email"/>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" required class="form-control"  name="company" placeholder="Company"/>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="input-group dflex">
                                <input type="text" required class="countory-code" value="+91">
                                <input type="text" required class="form-control"  name="phone" placeholder="Telephone"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="input-group dflex">
                                <textarea class="form-control" rows="4" placeholder="Project Description" id="projectdescription" name="projectdescription"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12">
                            <div class="form-group">
                                <img src="captcha.php?rand=<?php echo rand(); ?>" id='captchaimg'><br>
                                &nbsp;Click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                            </div>
                            <div class="form-group">
                                 <span id="captcha_codeerror" style="float:left;"></span>
                               <input id="captcha_code" required class="form-control inpt" name="captcha_code" type="text" >
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12">
                            <button type="submit" class="btn btn-primary" id="contactv"  name="contactv" class="btn btn-primary">SEND FORM</button>
                        </div>
                    </div>    
                </form>
            </div>
            </div>
            </div>
        </section>
    </div>  