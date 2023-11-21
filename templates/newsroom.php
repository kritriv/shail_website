    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$page[0]->mainimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / 
                <span><?=$page[0]->pagetitle?></span>
                </div>
                <h1 class="title"><?=$page[0]->pagetitle?></h1>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
            <div class="content-part newsroom-page">
        <section class="section newsroom-section">
            <div class="container">
                <div class="row dflex wrap">
                    <div class="col-md-12 col-sm-12 col-xs-12 newsupdate">
                        <div class="bg-white">
                            <ul class="ul-news-section">
                                <?=str_replace('<p>','<i class="far fa-newspaper"></i>&nbsp;&nbsp;',$page[0]->fullcontent)?></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
