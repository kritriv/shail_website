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
    <?php  if(isset($_POST['contact'])){
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
                $mail->Subject = "Contact us Enquiry";
                $mail->Body .= "Dear Admin,<br><br>Somebody has filled the contact enquiry form!<br><br>
                <p>Name: ".$_POST['name']."</p>
                <p>Email: ".$_POST['email']."</p>
                <p>Company: ".$_POST['company']."</p>
                <p>Telephone: ".$_POST['phone']."</p>
                <p>Are you a?: ".$_POST['employeetype']."</p>
                <p>The topic of your inquiry: ".$_POST['topic']."</p>";
                if($_POST['topic']=='Project Funding'){
                    $mail->Body .="<p>In which country is your project located?: ".$_POST['projectlocated']."</p>
                        <p>Please briefly describe your project: ".$_POST['projectdescription']."</p>
                        <p>How much finance does your project need? State in US$ dollars: ".$_POST['finnace']."</p><br>";
                }
                if($_POST['topic']=='Financial Instruments Monetization'){
                    $mail->Body .="<p>1. Are you the owner of this instrument?: ".$_POST['instrumentowner']."</p>
                        <p>2. This is Leased Instrument/ Purchase Instrument?: ".$_POST['instrumenttype']."</p>
                        <p>3. What is the face value of the financial instrument?: ".$_POST['facevalue']."</p>
                        <p>4. When has the issuer issued the financial instrument?: ".$_POST['issuerissued']."</p>
                        <p>5. This financial security is asset backed instrument; it is a cash backed instrument?: ".$_POST['security']."</p>
                        <p>6. ISIN number.: ".$_POST['isinno']."</p>
                        <p>7. Financial Instrument issued from which bank and country.: ".$_POST['countryname']."</p>
                        <p>8. This Financial instrument is issued in the name of which company and in which country is this company registered? ".$_POST['companyregisterd']."</p>
                        <p>9. What is the main business of the company in whose name the financial instrument was issued?: ".$_POST['mainbussiness']."</p>
                        <p>10. Has the owner of the Financial instrument given you the power of attorney?: ".$_POST['powerofattorney']."</p>
                        <p>11. What is the name of the organization issuing the Financial instrument?: ".$_POST['organisationname']."</p><br>";
                }
                $mail->Body .="<br>Thanks & Regards,<br>".$web[0]->title;
                $mail->WordWrap = 50;
                if(!$mail->Send()) {
                    $val='<p style="color:red;font-size:18px;">Message Not Sent. Please try again!</p>';
                    $val= 'Mailer error: ' . $mail->ErrorInfo;
                } else {
                    $val='<p style="color:green;font-size:18px;">Message Sent Successfully!</p>';
                    header("refresh: 20; url =".DIR_PATH_FULL);   
                }
                //$to=CONTACT_MAIL_ID;
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
                   <h2 class="title">Your Enquiry</h2>
                   <p>If you are not clear about your requirement, please <a href="<?=DIR_PATH_FULL?>contact-enquiry">click here!</a></p>
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
                        <div class="form-group col-sm-7">
                            <div class="input-group dflex">
                                <input type="text" required class="countory-code" value="+91">
                                <input type="text" required class="form-control"  name="phone" placeholder="Telephone"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12">
                            <label>Are you a?</label>
                            <select type="text" required class="form-control selectpicker"  name="employeetype">
                                <option value="">Select An Option</option>
                                <option value="Client">Client</option>
                                <option value="Broker">Broker</option>
                                <option value="Representative">Representative</option>
                                <option value="Supplier">Supplier</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12">
                            <label>The topic of your inquiry *</label>
                            <select type="text" required class="form-control selectpicker" id="topic" name="topic">
                                <option value="">Select An Option</option>
                                <option value="Polysilicon">Polysilicon </option>
                                <option value="Solar Panels">Solar Panels</option>
                                <option value="Hydroponic Agriculture">Hydroponic Agriculture</option>
                                <option value="Project Funding">Project Funding</option>
                                <option value="Financial Instruments Monetization">Financial Instruments Monetization</option>
                                <option value="Private Placement Program">Private Placement Program</option>
                                <option value="Water Management">Water Management</option>
                                <option value="EV Charging Stations">EV Charging Stations</option>
                                <option value="Nuclear battery">Nuclear battery</option>
                                <option value="Import and export">Import and export</option>
                                <option value="Other Enquiry">Other Enquiry</option>
                            </select>
                        </div>
                        <div class="project-funding col-md-12 col-sm-12 col-sx-12" id="pinfo">
                            <h3>Project Information</h3>
                            <div class="form-group">
                                <label>In which country is your project located?</label>
                                <textarea class="form-control" rows="4" placeholder="" id="projectlocated" name="projectlocated"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Please briefly describe your project</label>
                                <textarea class="form-control" rows="4" placeholder="" id="projectdescription" name="projectdescription"></textarea>
                            </div>
                            <h4 class="like-note">Minimum financing amount is US$15,000,000.00 (Fifteen Million Dollars)</h4>
                            <div class="form-group">
                                <label>How much finance does your project need? State in US$ dollars*</label>
                                <textarea class="form-control" rows="4" placeholder=""  name="finnace"></textarea>
                            </div>
                        </div>
                        <div class="fine-instruments col-md-12 col-sm-12 col-sx-12" id="fine-instruments">
                            <h3>Financial Instruments Monetization</h3>
                            <p>You have been able to follow our terms and our policies seriously.</p>
                            <p>If you do not follow our policies and conditions seriously, you cannot achieve the process of monetization. Please study our every word carefully and answer it with loyalty and sweetness.</p>
                            <h4>Please answer the following questions</h4>
                            <div class="form-group">
                                <label>1. Are you the owner of this instrument?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="instrumentowner" name="instrumentowner"></textarea>
                            </div>
                            <div class="form-group">
                                <label>2. This is Leased Instrument/ Purchase Instrument?</label>
                                <textarea class="form-control" rows="2"  name="instrumenttype" id="instrumenttype" placeholder="Answer"></textarea>
                            </div>
                            <div class="form-group">
                                <label>3. What is the face value of the financial instrument?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer"  id="facevalue" name="facevalue"></textarea>
                            </div>
                            <div class="form-group">
                                <label>4. When has the issuer issued the financial instrument?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="issuerissued" name="issuerissued"></textarea>
                            </div>
                            <div class="form-group">
                                <label>5. This financial security is asset backed instrument; it is a cash backed instrument?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="security" name="security"></textarea>
                            </div>
                            <div class="form-group">
                                <label>6. ISIN number.</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="isinno" name="isinno"></textarea>
                            </div>
                            <div class="form-group">
                                <label>7. Financial Instrument issued from which bank and country.</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="countryname" name="countryname"></textarea>
                            </div>
                            <div class="form-group">
                                <label>8. This Financial instrument is issued in the name of which company and in which country is this company registered?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="companyregisterd" name="companyregisterd"></textarea>
                            </div>
                            <div class="form-group">
                                <label>9. What is the main business of the company in whose name the financial instrument was issued?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="mainbussiness" name="mainbussiness"></textarea>
                            </div>
                            <div class="form-group">
                                <label>10. Has the owner of the Financial instrument given you the power of attorney?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="powerofattorney" name="powerofattorney"></textarea>
                            </div>
                            <div class="form-group">
                                <label>11. What is the name of the organization issuing the Financial instrument?</label>
                                <textarea class="form-control" rows="2" placeholder="Answer" id="organisationname" name="organisationname"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12" id="montid">
                            <p>There is a verification process to validate the authenticity of each instrument so only Clients with valid Instruments (SBLCs) who can send via the Brussels Swift System should apply. For instruments on Euroclear, all 23 or 24 Euroclear pages must be presented. Many questions are answered on the Q&A Section but for specific details, please Contact Us with the particulars of your Instrument and we would be glad to provide the steps to success.</p>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-sx-12" id="montidv">
                            <p><input type="checkbox" />&nbsp;&nbsp; If you follow our conditions and our policy, we can monetize your instrument and we can use it on our trade platform but you will have to go through various questions. if you agree to terms and conditions. Submit the following documents below</p>
                            <p>This is the initial capacity document that will be confirmed by your ability.</p>
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
                            <button type="submit" class="btn btn-primary" id="contact"  name="contact" class="btn btn-primary">SEND FORM</button>
                        </div>
                    </div>    
                </form>
            </div>
            </div>
            </div>
        </section>
    </div>  