<?php include('header.php');?>
<?php if (empty($page[0]->template)) { ?>
    <?php $busicats = array(STAT => '1',SLU=>$_REQUEST['slug']);
    $bussinesv = $db->getpageRows(BUSSICAT,$busicats); ?>
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$businpus[0]->mainimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / <a href="<?=$businpus[0]->slug?>"><span><?=$businpus[0]->pagetitle?></span></a> / <span><?=$_REQUEST['slug']?></span></div>
                <h1 class="title"><?=$businpus[0]->pagetitle?></h1>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <div class="content-part business-page">
        <section class="section power-generation-section">
            <div class="container">
                <div class="row dflex wrap">                    
                    <div class="col-md-6 col-sm-6">
                        <h2 class="title"><?=$bussinesv[0]->pcategory?></h2>
                        <?=$bussinesv[0]->fullcontent?>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="service-img-slider">
                            <div class="slide-item">
                                <img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH.$bussinesv[0]->innerimage?>" alt="<?=$bussines[0]->pcategory?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php  }else{ ?>
	<?php include('templates/'.$page[0]->template); ?>
<?php  } ?>
<?php include('footer.php');?>