<?php include 'config-file-file.php';?> 
<?php session_start(); ?> 
<?php
var_dump($_POST);
	$stateId = $_POST['stateId'];
	if (isset($_POST['stateId']) && !empty($_POST['stateId'])) {
		$states = $db->getRows('billcity WHERE billstateid = "'.$stateId.'"');
		foreach ($states as $key => $value) {
			if($stateId == $value->billstateid){
				echo '<option value="'.$value->billcityid.'">'.$value->billcity.'</option>';
			}
		}
	}
?> 
