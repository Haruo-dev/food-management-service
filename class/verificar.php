<?php
include("./class_log.php");
$ver = new Login();
$user=$_REQUEST['email'];
$pass=$_REQUEST['password'];
$ver->validar($user,$pass);
?>

