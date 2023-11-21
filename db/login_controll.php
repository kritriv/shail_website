<?php include 'config-file-file.php';?> 
<?php
//echo $_REQUEST['accesstoken'];die;
$logindetailsbb = $db->getRow("userlogin","accesscontrl='".$_REQUEST['accesstoken']."'");
$logindetailbuyerid = $db->getRow("buyer","emailid='".$logindetailsbb->emailid."'");

$_SESSION['login_id'] = $logindetailsbb->id;
$_SESSION['key'] =$logindetailbuyerid->buyerid;
$_SESSION['email'] = $logindetailsbb->emailid;
$_SESSION['role_id'] = '3';
//header("location: ./");

?>