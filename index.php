<?php include("header.php");
?>    
 <!-- video Part -->
<video width="100%" height="10%" autoplay muted>
  <source src="images/Wind Mill - 13238.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  
</video>

    <!-- Slider Part -->
    <!--<div class="slider-part home-slider">
        <?php $slidata = array(SLU => "home-page");
        $sliders = $db->getpageRows(SLIDER,$slidata);
        $media =explode(",",$sliders[0]->imagesid);
        foreach ($media as $key => $value) { 
            if (!empty($value)) { 
                $medi = array(MEDI.'id' => $value);
                $images = $db->getpageRows(MEDI,$medi);
                $IMG = $images[0]->multiimages;   
            } ?>   
        <div class="slide-item" style="background-image: url(<?php echo UI_IMAGE_PATH.$IMG; ?>);">
            <div class="slide-content">
                <div class="container">
                    <span><?=$images[0]->mediatitle?></span>
                    <h1><?=$images[0]->mediasubtitle?></h1>
                    <a href="<?=DIR_PATH_FULL?>contact-us" class="btn btn-primary">Contact</a>
                </div>    
            </div>
        </div>
      <?php } ?>
    </div> --> 
    <!-- Content Part -->
    <div class="content-part">
        <section class="section about-section">
            <div class="container">
            <div class="row dflex wrap align-center">
                <div class="col-md-6 col-sm-6">
                    <div class="image">
                        <img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH?><?=$aboutus[0]->galleryimage?>" alt="<?=$aboutus[0]->pagetitle?>"/>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title"><?=$aboutus[0]->pagetitle?></h2>
                    <?=$aboutus[0]->shortcontent?>
                    <p><a href="<?=DIR_PATH_FULL?>about-us" class="btn btn-primary">Read More</a></p>
                </div>
            </div>
            </div>
        </section>
        <section class="section business-section bg-img-section" style="background-image: url(<?=DIR_PATH_FULL.UI_IMAGE_PATH.$businpus[0]->galleryimage?>);">
            <div class="container">
                <h2 class="title text-center"><?=$businpus[0]->pagetitle?></h2>
                <p></p>
                <ul class="service-list">
                    <?php foreach($bussines as $keyb=>$bussinesvalue){ ?>
                        <li>
                          <img src="<?=UI_IMAGE_PATH.$bussinesvalue->mainimage?>" width="70" height="70" alt="<?=$bussinesvalue->pcategory?>"/>
                           <?php if($bussinesvalue->pcategoryid =='14'){ ?>
                                <h3><a href="<?= DIR_PATH_FULL.'financial-services'?>"><?=$bussinesvalue->pcategory?></a></h3>
                                <a href="<?=DIR_PATH_FULL.'financial-services'?>" class="know-more">Know More <i class="fas fa-angle-right"></i></a>
                            <?php }else{ ?>
                                <h3><a href="<?= DIR_PATH_FULL.'our-bussiness/'.$bussinesvalue->slug?>"><?=$bussinesvalue->pcategory?></a></h3>
                                <a href="<?=DIR_PATH_FULL.'our-bussiness/'.$bussinesvalue->slug?>" class="know-more">Know More <i class="fas fa-angle-right"></i></a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section> 
        <section class="section news-updates-section bg-img-section" style="background-image: url(<?=UI_IMAGE_PATH.$newsd[0]->galleryimage?>);">
            <div class="container">
                <div class="row dflex wrap">
                    <div class="col-md-4 col-sm-12 newsupdate">
                        <div class="bg-white box-shadow">
                            <h3 class="title"><?=$newsd[0]->pagetitle?></h3>
                            <ul class="ul-news-section">
                                <?=str_replace('<p>','<i class="far fa-newspaper"></i>&nbsp;&nbsp;',$newsd[0]->shortcontent)?></a>
                            </ul>
                            </ul>
                            <a href="<?=DIR_PATH_FULL?>newsroom" class="btn btn-primary view-more">View more</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="climate-section bg-blue text-white">
                            <h3 class="title"><?=$climated[0]->pagetitle?></h3>
                            <?=$climated[0]->shortcontent?>
                            <p><a href="<?=DIR_PATH_FULL?>climate-challenge-badges" class="btn btn-default view-more">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section blogs-section">
            <div class="container">
                <h2 class="title text-center">Community</h2>
                <p></p>
                <div class="row">
                    <?php foreach($commu as $keyc=>$commuvalue){ ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog-item shadow">
                            <a href="<?=DIR_PATH_FULL.'community/'.$commuvalue->slug?>" class="blog-img"><img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH.$commuvalue->mainimage?>" alt="<?=$commuvalue->community?>" /></a>
                            <div class="blog-content">
                                <h3><a href="<?=DIR_PATH_FULL.'community/'.$commuvalue->slug?>"><?=$commuvalue->community?></a></h3>
                                <?=$commuvalue->shortcontent;?>
                                <a href="<?=DIR_PATH_FULL.'community/'.$commuvalue->slug?>" class="know-more">Read More <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="section cta-section">
            <div class="container">
                <div class="cta-content text-center">
                    <h2>Do you have Enquiry?</h2>
                    <!--<h3>Get your Quote or Call +918950921096</h3>-->
                    <a href="<?=DIR_PATH_FULL?>contact-us" class="btn btn-default">Send Enquiry</a>
                </div>
            </div>
        </section>
    </div>  
<?php include("footer.php");?>      
