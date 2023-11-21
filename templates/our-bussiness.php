    <?php $busicats = array(STAT => '1',SLU=>$_REQUEST['slug1']);
    $bussinesv = $db->getpageRows(BUSSICAT,$busicats); ?>
    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$bussinesv[0]->listimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / 
                <?php if(!empty($_REQUEST['slug1'])){ ?>
                    <span><a href="<?=DIR_PATH_FULL?>our-bussiness"><?=$page[0]->pagetitle?></a></span> / <span><?=$bussinesv[0]->pcategory?></span>
                    <h1 class="title"><?=$bussinesv[0]->pcategory?></h1>
                <?php } else { ?>
                    <span><?=$page[0]->pagetitle?></span>
                    <h1 class="title"><?=$page[0]->pagetitle?></h1>
                <?php } ?>
                </div>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
    <?php if(!empty($_REQUEST['slug1'])){?>
    <div class="content-part business-page">
        <section class="section power-generation-section">
            <div class="container">
                <div class="row dflex wrap">                    
                    <div class="col-md-6 col-sm-6">
                        <h2 class="title"><?=$bussinesv[0]->pcategory?></h2>
                        <?php  if(!empty($bussinesv[0]->shortcontent)){ ?>
                            <?=$bussinesv[0]->shortcontent;?>
                        <?php } else{ ?>
                            <?=$bussinesv[0]->fullcontent?>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="service-img-slider">
                            <div class="slide-item">
                                <img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH.$bussinesv[0]->innerimage?>" alt="<?=$bussines[0]->pcategory?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="row dflex wrap">                    
                    <div class="col-md-12 col-sm-12">
                        <?php  if(!empty($bussinesv[0]->shortcontent)){ ?>
                            <?=$bussinesv[0]->fullcontent?>
                        <?php } else{ ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php }else{ ?>
        <div class="content-part business-page">
            <section class="section about-section">
                <div class="container">
                    <div class="row dflex wrap">
                        <?php foreach($bussines as $keyb=>$bussinesvalue){ ?>
                            <div class="col-md-4 col-sm-6 service-item">
                                <div class="service-item-content">
                                    <div class="img"><img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH.$bussinesvalue->listimage?>" alt="<?=$bussinesvalue->pcategory?>"/></div>
                                    <div class="content">
                                        <h3><?=$bussinesvalue->pcategory?></h3>
                                        <?=$bussinesvalue->shortcontent?>
                                    </div>
                                    <a href="<?=DIR_PATH_FULL.'our-bussiness/'.$bussinesvalue->slug?>" class="overlaylink"><span>Know More</span></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    <?php } ?>