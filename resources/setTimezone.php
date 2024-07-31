<?php
session_start();
require_once'../resources/config.php';
$_SESSION['timezone']=clean($_POST['timezone']);
?>

