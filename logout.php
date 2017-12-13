<?php 
if(!isset($_SESSION))session_start();
foreach($_SESSION as $k => $v){  
$_SESSION[$k] = NULL;
}
session_destroy();
header("Location: index.php");
?>