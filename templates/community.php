    <?php   $comutatas = array(SLU => $_REQUEST['slug1']);
            $communipuss = $db->getpageRows(COMMUCAT,$comutatas);
    ?>
    <!-- Banner Part -->
    <div class="banner-part inner-banner" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$communipus[0]->mainimage?>);">
        <div class="banner-content">
            <div class="container">
                <div class="head_breadcrumb"><a href="<?=DIR_PATH_FULL?>"><?=$homeus[0]->pagetitle?></a> / 
                <?php if(!empty($_REQUEST['slug1'])){ ?>
                    <span><a href="<?=DIR_PATH_FULL?>community"><?=$communipus[0]->pagetitle?></a></span> / <span><?=$communipuss[0]->community?></span>
                <?php } else { ?>
                    <span><?=$communipus[0]->pagetitle?></span>
                <?php } ?>
                </div>
                <?php if(!empty($_REQUEST['slug1'])){ ?>
                    <h1 class="title"><?=$communipuss[0]->community?></h1>
                <?php } else { ?>
                    <h1 class="title"><?=$communipus[0]->pagetitle?></h1>
                <?php } ?>
                <div class="spacebar"></div>
                <div class="stripline"><h2><?=str_replace("<p>","",str_replace("</p>","",$homeus[0]->shortcontent))?></h2></div>
            </div>    
        </div>
    </div>  
    <!-- Content Part -->
    <?php if(!empty($_REQUEST['slug1'])){ ?>
        <div class="content-part blogs-page">
            <section class="section blog-descp-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-8 col-xs-12 left-descp">
                            <div class="image-slider">
                                <div class="slide-item"><img class="img-responsive" src="<?=DIR_PATH_FULL.UI_IMAGE_PATH.$communipuss[0]->innerimage?>" alt="<?=$communipuss[0]->community?>"/></div>
                            </div>
                            <?=$communipuss[0]->fullcontent?>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 right-descp sticky-sidebar">
                            <div class="sidebar-content">
                                <ul class="list">
                                <?php foreach($commu as $keyc=>$commuvalue){ ?>
                                <?php   if($commuvalue->community ==$communipuss[0]->community){
                                            $ac='style="background-color:#e2c969"';
                                        }else{
                                            $ac='';
                                        } ?>
                                    <li <?=$ac?>><a href="<?=DIR_PATH_FULL.'community/'.$commuvalue->slug?>"><span><?=$commuvalue->community?></span></a></li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>  
    <?php } else { ?>
        <div class="content-part community-page">
            <section class="section community-section">
                <div class="container">
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
        </div>  
    <?php } ?>