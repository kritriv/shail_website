    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$page[0]->mainimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / 
                    <span><?=$page[0]->pagetitle?></span>
                    <h1 class="title"><?=$page[0]->pagetitle?></h1>
                </div>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
    <div class="content-part climate-page">
        <!-- 6 Columns Section -->
        <section class="section six-column-section">
            <div class="column-bg-image bg-img-section"></div>
            <div class="container">
                <ul class="six-columns">
                    <?php $busicats = array(STAT => '1');
                    $fincat = $db->getpageRows(FINANCE,$busicats); 
                    foreach($fincat as $key=>$fincatv){ ?>
                    <li class="image<?=($key+1)?>">
                        <a href="<?=DIR_PATH_FULL.'financial-services-detail/'.$fincatv->slug?>" data-bgcolor="#A2DED0" data-bg="<?= DIR_PATH_FULL.UI_IMAGE_PATH.$fincatv->slideimage?>">
                            <span class="icon"><img src="<?= DIR_PATH_FULL.UI_IMAGE_PATH.$fincatv->mainimage?>" width="55" height="55" alt="<?=$fincatv->posttitle?>"/></span>
                            <span class="title"><?=$fincatv->posttitle?></span>
                            <span class="explore-btn">Explore <i class="fa fa-arrow-right"></i></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        
    </div>  
