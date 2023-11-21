<?php include 'config-file-file.php';?> 
<?php
	$tblName = 'users';
	$rr['isLogin'] = 0;
	$rr['logout'] = time();
	$wh = array('id' => $_SESSION['key']);
	$db->update($tblName,$rr,$wh);
	ob_start();
	session_start();
	session_destroy();
	unset($_SESSION['key']);
	unset($_SESSION['userRole']);
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['phone']);
	unset($_SESSION['userRole']);
	$data['records'] = array();
    $data['status'] = 'ERR';
    $data['msg'] = '';
	$data['field'] = 'username';
    echo json_encode($data);
    header("location:../");
?>    