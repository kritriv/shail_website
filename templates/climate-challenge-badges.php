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
    <div class="content-part climate-page">
        <section class="section climate-chellenge-section">
            <div class="container">
                <?=$page[0]->fullcontent?>                
                <br><br>
                <div class="buttons-section">
                    <a href="#" class="btn border-btn">Corporate due diligence</a>
                    <a href="#" class="btn border-btn">Private equity &amp; Joint venture</a>
                    <a href="#" class="btn border-btn">International Project Funding</a>
                    <a href="#" class="btn border-btn">Government Sovereign Finance</a>
                    <a href="#" class="btn border-btn">Structured Financing</a>
                    <a href="#" class="btn border-btn">Heritage Funds</a>
                    <a href="#" class="btn border-btn">Private Placement Program</a>
                    <a href="#" class="btn border-btn">Buy/Sell of Financial Instruments</a>
                </div>
            </div>
        </section>
        
    </div>  
