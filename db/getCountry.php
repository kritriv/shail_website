<?php include 'config-file-file.php';?> 
<?php session_start(); ?> 
<?php
	$countryId = $_POST['countryId'];
	if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {
		$country = $db->getRow('billcountry ','billcountryid = "'.$countryId.'"');
		echo trim('+'.$country->phonecode);
	}
?> 
