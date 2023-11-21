    <?php $busicats = array(STAT => '1',SLU=>$_REQUEST['slug1']);
    $fincat = $db->getpageRows(FINANCE,$busicats); ?>
    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$fincat[0]->galleryimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> /
                    <a href="<?=DIR_PATH_FULL?>financial-services">Financial Service</a> / 
                    <span><?=$fincat[0]->posttitle?></span>
                    <h1 class="title"><?=$fincat[0]->posttitle?></h1>
                </div>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
    <div class="content-part climate-page">
        <section class="section climate-chellenge-section">
            <div class="container">
                <?=$fincat[0]->fullcontent?>
                <br><br>
                <div class="buttons-section">
                    <?=str_replace('<p>','<a href="#" class="btn border-btn">',str_replace('</p>','</a>',$fincat[0]->shortcontent))?>
                </div>
            </div>
        </section>
        
    </div>  
