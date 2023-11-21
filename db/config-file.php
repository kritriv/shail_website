<?php
include 'include/login.php';
$db = new Login();
$tblName = 'userlogin';
$where = ' id = "1" AND deleted = 0';
$records = $db->getRow($tblName,$where);

?>