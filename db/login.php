<?php
include 'config-file-file.php';
	$tblName = 'userlogin';
	$where = '';
	$where1 = '';
	if (isset($_REQUEST['username']) && !empty($_REQUEST['username'])) {
        $where = ' emailid = "'.trim($_REQUEST['username']).'"';
        if (isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
	        $where .= ' AND user_password = "'.md5($_REQUEST['password']).'"';
	    }else{
	    		$data['records'] = array();
		        $data['status'] = 'ERR';
		        $data['message'] = '<span style="color:red">Please Enter Correct Password</span>';
		        $data['field'] = 'password';
	    }
    }else{
    	$data['records'] = array();
        $data['status'] = 'ERR';
        $data['msg'] = '<span style="color:red">Please Enter Correct Email ID</span>';
		$data['field'] = 'username';
    }
    
    if (isset($_REQUEST['username']) && !empty($_REQUEST['username']) && isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
    	$where .= ' AND status = 1';
    	$records = $db->getRow($tblName,$where);
	    if($records){
	    	$_SESSION['key'] = $records->id;
    		$_SESSION['email'] = $records->emailid;
    		var_dump($_SESSION);
    		$data['result'] = $records;
	        $data['status'] = 'OK';
	        $data['error'] = 'NO';
	    }else{
	    	$data['records'] = array();
	        $data['status'] = 'ERR';
	        $data['msg'] = '<span style="color:white">Please Enter Correct Email ID & Password</span>';
			$data['field'] = 'username';
	    }
    }
	
    echo json_encode($data);
?>    