<?php
session_start();
if(isset($_POST['logout'])){
    $_SESSION=array();
    session_unset();
    
echo 1;}?>