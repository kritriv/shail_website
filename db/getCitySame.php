<?php include 'config-file-file.php';?> 
<?php session_start(); ?> 
<?php
	$stateId = $_POST['stateId'];
	if (isset($_POST['stateId']) && !empty($_POST['stateId'])) {
		$states = $db->getRows('billcity WHERE billstateid = "'.$stateId.'"');
		foreach ($states as $key => $value) {
			if($stateId == $value->billstateid){
				if ($_REQUEST['cityId'] == $value->billcityid) $sel = 'selected';else $sel = '';
				echo '<option value="'.$value->billcityid.'" '.$sel.'>'.$value->billcity.'</option>';
			}
		}
	}
?> 
