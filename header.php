<?php include "db/config-file-file.php"; 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();
?>
<?php   
        $webdata = array(WEBSITE.'id' => 1);
        $web = $db->getpageRows(WEBSITE ,$webdata);
        
        $sb='';
        $s_social = $db->getpageRows(SOCIAL,$sb);
        $pagename= basename($_SERVER['PHP_SELF']);
        $pagenameID = str_replace('.php',"",$pagename);
        $pbdata = array(SLU => $pagenameID);
        if(empty($pagenameID) || $pagenameID=='page'){
            $pbdata1 = array(SLU => $_REQUEST['slug1']);
            $pbdatas = array(SLU => $_REQUEST['slug']);
            if(!empty($_REQUEST['slug1'])){
                if($_REQUEST['slug']=='community'){
                    $page = $db->getpageRows(PAGE,$pbdatas);
                    $pagev = $db->getpageRows(COMMUCAT,$pbdata1);
                    $seoTitle = $pagev[0]->seotitle;
            		$pagetitle = $web[0]->title.' | '.$pagev[0]->seotitle;
            	    $seoDescription = $pagev[0]->seodescription;
                    $seoKeywords = $pagev[0]->seokeyword;
                }else if($_REQUEST['slug']=='our-bussiness'){
                    $pagev = $db->getpageRows(BUSSICAT,$pbdata1);
                    $page = $db->getpageRows(PAGE,$pbdatas);
                    $seoTitle = $pagev[0]->seotitle;
            		$pagetitle = $web[0]->title.' | '.$pagev[0]->seotitle;
            	    $seoDescription = $pagev[0]->seodescription;
                    $seoKeywords = $pagev[0]->seokeyword;
                }else if($_REQUEST['slug']=='financial-services-detail'){
                    $pagev = $db->getpageRows(FINANCE,$pbdata1);
                    $page = $db->getpageRows(PAGE,$pbdatas);
                    $seoTitle = $pagev[0]->seotitle;
            		$pagetitle = $web[0]->title.' | '.$pagev[0]->seotitle;
            	    $seoDescription = $pagev[0]->seodescription;
                    $seoKeywords = $pagev[0]->seokeyword;
                }else{
                    $page = $db->getpageRows(PAGE,$pbdata1);
                    $seoTitle = $page[0]->seotitle;
            		$pagetitle = $web[0]->title.' | '.$page[0]->seotitle;
            	    $seoDescription = $page[0]->seodescription;
                    $seoKeywords = $page[0]->seokeyword;
                }
            }else{
                $page = $db->getpageRows(PAGE,$pbdatas);
                $seoTitle = $page[0]->seotitle;
        		$pagetitle = $web[0]->title.' | '.$page[0]->seotitle;
        	    $seoDescription = $page[0]->seodescription;
                $seoKeywords = $page[0]->seokeyword;
            }
        }else if(empty($pagenameID) || $pagenameID=='index'){
            $page = $db->getpageRows(PAGE,$pbdata);
            $seoTitle = $page[0]->seotitle;
    		$pagetitle = $web[0]->title.' | '.$page[0]->seotitle;
    	    $seoDescription = $page[0]->seodescription;
            $seoKeywords = $page[0]->seokeyword;
        }else{
            $page = $db->getpageRows(PAGE,$pbdata);
            $seoTitle = $page[0]->seotitle;
    		$pagetitle = $web[0]->title.' | '.$page[0]->seotitle;
    	    $seoDescription = $page[0]->seodescription;
            $seoKeywords = $page[0]->seokeyword;
        }
        $hmtata = array(SLU => 'index');
        $homeus = $db->getpageRows(PAGE,$hmtata);

        $abtata = array(SLU => 'about-us');
        $aboutus = $db->getpageRows(PAGE,$abtata);

        $busicat = array(STAT => '1');
        $bussines = $db->getpageRows(BUSSICAT,$busicat);
        $bustata = array(SLU => 'our-bussiness');
        $businpus = $db->getpageRows(PAGE,$bustata);

        $commucat = array(STAT => '1');
        $commu = $db->getpageRows(COMMUCAT,$commucat);
        $comutata = array(SLU => 'community');
        $communipus = $db->getpageRows(PAGE,$comutata);

        $news = array(SLU => 'newsroom');
        $newsd = $db->getpageRows(PAGE,$news);

        $climate = array(SLU => 'climate-challenge-badges');
        $climated = $db->getpageRows(PAGE,$climate);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $pagetitle;?></title>
    <meta name="title" content="<?php echo $seoTitle;?>" />
    <meta name="description" content="<?echo $seoDescription?>" />
    <meta name="keywords" content="<?echo $seoKeywords?>" /> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= DIR_PATH_FULL?>css/style.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J98MYWFXT1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J98MYWFXT1');
</script>

  </head>
  <body>
    <!-- Header -->
    <header class="header">
        <div class="container dflex wrap flex-start">
            <div class="logo"><a href="<?= DIR_PATH_FULL?>"><img src="<?= DIR_PATH_FULL.UI_IMAGE_PATH.$web[0]->headerlogo?>" alt="<?= $pagetitle;?>"></a></div>
            <div class="menubar">
                <div class="topbar">
                  <ul class="list dflex">
                     <li><a href="mailto:<?=$web[0]->email?>" target="_top"><i class="fas fa-envelope-open-text"></i> <span><?=$web[0]->email?></span></a></li>
                     <!--<li><a href="tel:<?=$web[0]->mobile?>" target="_top"><i class="fas fa-mobile-alt"></i> <span><?=$web[0]->mobile?></span></a></li>-->
                     <?php foreach($s_social as $keys=>$s_socialv){ ?>
                         <li><a href="<?=$s_socialv->sociallink?>" target="_blank"><i class="<?=$s_socialv->socialicon?>"></i> <span><?=$s_socialv->socialtitle?></span></a></li>
                      <?php } ?>
                    </ul>  
                </div>
                <button class="btn-menuToggler"><span></span><span></span><span></span></button>
                <div class="menu">
                    <ul class="menu-list dflex">
                        <li><a href="<?= DIR_PATH_FULL?>about-us">About us</a></li>
                        <li class="has-megaMenu">
                            <a href="#">Our Business</a>
                            <span class="sub-menu-toggler">+</span>
                            <div class="mega-menu">
                                <h3><a href="#">Our Business</a></h3>
                                <ul class="mega-menu-list">
                                    <?php foreach($bussines as $keyb=>$bussinesvalue){ ?>
                                        <?php if($bussinesvalue->pcategoryid =='14'){ ?>
                                            <li><a href="<?= DIR_PATH_FULL.'financial-services'?>"><?=$bussinesvalue->pcategory?></a></li>
                                        <?php }else{ ?>
                                            <li><a href="<?= DIR_PATH_FULL.'our-bussiness/'.$bussinesvalue->slug?>"><?=$bussinesvalue->pcategory?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= DIR_PATH_FULL?>community">Community</a></li>
                        <li><a href="<?= DIR_PATH_FULL?>newsroom">Newsroom</a></li>
                        <li><a href="<?= DIR_PATH_FULL?>photos">Photos</a></li>
                        <li><a href="<?= DIR_PATH_FULL?>contact-us">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
      </header>
