<?php include 'config-file-file.php';?> 
<?php
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    if (isset($_REQUEST['mobile']) && $_REQUEST['mobile'] !='undefined' && !empty($_REQUEST['mobile'])) {
        $field = $_REQUEST['mobile'];
        $userData['mobile'] = html_entity_decode(htmlspecialchars($field,ENT_QUOTES));
    }
    if (isset($_REQUEST['password']) && $_REQUEST['password']!='undefined' && !empty($_REQUEST['password'])) {
        $field = $_REQUEST['password'];
        $userData['password'] = md5(html_entity_decode(htmlspecialchars($field,ENT_QUOTES)) );
    }
    
    $tblName = 'users';
    $where = '';
    switch($type){
        case "user":
	        $randstring = '';
	        $characters = '0123456789';
	        for ($k = 0; $k < 4; $k++) {
	            $randstring .= $characters[rand(0, strlen($characters)-1)];
	        }
	        if (isset($_REQUEST['mobile']) && !empty($_REQUEST['mobile']) && isset($_REQUEST['password']) && empty($_REQUEST['password'])) {
		        $where = ' mobile = "'.$_REQUEST['mobile'].'"';
		        $records = $db->getRow($tblName,$where);
		        if($records){
			        $rr['password'] = md5($randstring);
			    	$wh = array('id' => $records->id);
			    	$db->update($tblName,$rr,$wh);
			    	$data['password'] = $randstring;
			        $data['name'] = $records->name;
			        $data['id'] = $records->id;
			        $data['email'] = $records->email;
			        $data['status'] = 'OK';
			        $data['login'] = 'OTP';
			    }else{
			    	$data['status'] = 'OK';
			        $data['login'] = 'NO';
			    }

		    }else if (isset($_REQUEST['mobile']) && !empty($_REQUEST['mobile']) && isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
		        $where = ' mobile = "'.$_REQUEST['mobile'].'" AND password = "'.md5($_REQUEST['password']).'"';
		        $records = $db->getRow($tblName,$where);
		        if($records){
			    	$rr['isLogin'] = 1;
			    	$wh = array('id' => $records->id);
			    	$db->update($tblName,$rr,$wh);
			    	/*$_SESSION['key']=$records->id;
		    		$_SESSION['email']=$records->email;
		    		$_SESSION['name']=$records->name;
		    		$_SESSION['mobile']=$records->mobile;
		    		$_SESSION['userRole'] = $records->userRole;*/
		    		$data['name'] = $records->name;
			        $data['id'] = $records->id;
			        $data['email'] = $records->email;
		    		$data['status'] = 'OK';
			        $data['login'] = 'YES';
			    }else{
			    	$data['records'] = array();
			        $data['status'] = 'ERR';
			        $data['msg'] = '<span style="color:red">Please Enter Correct Email ID & Password</span>';
					$data['field'] = 'username';
			    }
		    }
            echo json_encode($data);
            break;
        default:
            echo '{"status":"INVALID"}';
    }
}