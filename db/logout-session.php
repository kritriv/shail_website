<?php include 'config-file-file.php';?> 
<?php
	define('DIR_PATH_FULL', selfURL().DIR_PATH);
	$tblName = 'users';
	$rr['isLogin'] = 0;
	$rr['logout'] = time();
	$wh = array('id' => $_SESSION['key']);
	$db->update($tblName,$rr,$wh);
	ob_start();
	session_start();
	session_destroy();
	unset($_SESSION['key']);
	unset($_SESSION['lastLogin']);
	unset($_SESSION['userRole']);
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['phone']);
	unset($_SESSION['userRole']);
	header('location:'.DIR_PATH_FULL.'/login.php');
?>    