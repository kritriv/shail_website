<?php   include './db/config-file.php'; ?>
<?php 
$_SESSION['login_id'] = $_REQUEST['login_id'];
$_SESSION['user_id'] = $_REQUEST['user_id'];
$_SESSION['key'] = $_REQUEST['key'];
$_SESSION['email'] = $_REQUEST['email'];
$_SESSION['role_id'] = $_REQUEST['role_id'];


header("location: ./");

?>
