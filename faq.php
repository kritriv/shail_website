<?php include("header.php");
    $home = $db->getRowArray(PAGE," deleted = 0 AND slug = 'home'");
    $pack = $db->getRowArray(PAGE,"deleted = 0 AND slug = 'faq'");
?>

<style>
.template_faq {
    background: #edf3fe none repeat scroll 0 0;
}
.panel-group {
    background: #fff none repeat scroll 0 0;
    border-radius: 3px;
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.04);
    margin-bottom: 0;
    padding: 30px;
}
#accordion .panel {
    border: medium none;
    border-radius: 0;
    box-shadow: none;
    margin: 0 0 15px 10px;
}
#accordion .panel-heading {
    border-radius: 30px;
    padding: 0;
}
#accordion .panel-title a {
    background: #ffb900 none repeat scroll 0 0;
    border: 1px solid transparent;
    border-radius: 30px;
    color: #fff;
    display: block;
    font-size: 18px;
    font-weight: 600;
    padding: 12px 20px 12px 50px;
    position: relative;
    transition: all 0.3s ease 0s;
}
#accordion .panel-title a.collapsed {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    color: #333;
}
#accordion .panel-title a::after, #accordion .panel-title a.collapsed::after {
    background: #ffb900 none repeat scroll 0 0;
    border: 1px solid transparent;
    border-radius: 50%;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.58);
    color: #fff;
    content: "";
    font-family: fontawesome;
    font-size: 25px;
    height: 55px;
    left: -20px;
    line-height: 55px;
    position: absolute;
    text-align: center;
    top: -5px;
    transition: all 0.3s ease 0s;
    width: 55px;
}
#accordion .panel-title a.collapsed::after {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    box-shadow: none;
    color: #333;
    content: "";
}
#accordion .panel-body {
    background: transparent none repeat scroll 0 0;
    border-top: medium none;
    padding: 20px 25px 10px 9px;
    position: relative;
}
#accordion .panel-body p {
    /*accordion .panel-body p*border-left: 1px dashed #8c8c8c;*/
    padding-left: 25px;
}
</style>
<section class="fw p-rel text-center inner-banner parallax" data-scrollax-parent="true">
    <div class="bg-fixed" data-scrollax="properties: { translateY: '200px' }" style="background-image: url(<?= DIR_PATH_FULL.UI_IMAGE_PATH.$pack['mainimage']?>);"></div>
    <div class="bubbles"></div>
    <div class="parallax-content parallax-center">
        <div class="container">
            <h1 class="banner-title"><?=$pack['pagetitle']?></h1>
            <div class="breadcrumb">
                <div class="bred-content"><a href="<?= DIR_PATH_FULL?>"><?=$home['pagetitle']?></a><span class="current"><?=$pack['pagetitle']?></span></div>
            </div>
        </div>
    </div>
</section>
<!-- Container -->
<!-- *** Content Part *** -->
<section class="section who-we-are">
    <div class="container">
       <div class="who-we-are-content row">
            <?php   $faq = $db->getRowssArray('faq'," deleted = 0 and statusid = '1' ORDER BY faqid DESC");?> 
            <?php   $faql = $db->getRowssArray('faq'," deleted = 0 and statusid = '1' ORDER BY faqid DESC limit 0,1");?> 
            <?php   if($faq) { ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php  foreach ($faq as $keyposts => $valueposts) { ?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading<?=($keyposts+1)?>">
								<h4 class="panel-title">
								    <?php if($faql[0]['faqid']==$valueposts['faqid']){
    								    $cls=""; 
    								    $in="in"; 
								    }else{
	    							    $cls="collapsed"; 
    								    $in=""; 
								    }?>
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=($keyposts+1)?>" aria-expanded="true" aria-controls="collapse<?=($keyposts+1)?>">
									<?=$valueposts['faq']?>
									</a>
								</h4>
							</div>
							<div id="collapse<?=($keyposts+1)?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?=($keyposts+1)?>">
								<div class="panel-body">
                                    <?=$valueposts['shortcontent']?>
                                </div>
							</div>
						</div>
					<?php } ?>	
				</div>
            </div>
            <?php   }else { ?>
                <div class="col-md-12 col-sm-12 col-xs-12"><p class="text-center">Faq Not Found!</p></div>
            <?php   } ?>
       </div>
    </div>
</section>
<?php include("footer.php");?>
