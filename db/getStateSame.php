<?php include 'config-file-file.php';?> 
<?php session_start(); ?> 
<?php
	$countryId = $_POST['countryId'];
	if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {
		$states = $db->getRows('billstate WHERE billcountryid = "'.$countryId.'"');
		foreach ($states as $key => $value) {
			if($countryId == $value->billcountryid){
				if ($_REQUEST['stateId'] == $value->billstateid) $sel = 'selected';else $sel = '';
				echo '<option value="'.$value->billstateid.'" '.$sel.'>'.$value->billstate.'</option>';
			}
		}
	}
?> 
