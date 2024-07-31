<?php 
session_start();

require_once('../resources/config.php');
if(isset($_POST['email'])&& $_SERVER['REQUEST_METHOD']=='POST'){
    $email=clean($_POST['email']);
    $password=clean($_POST['password']);
    $address=clean($_POST['address']);
    $name=clean($_POST['name']);
    $password=md5($password);
    
    // CustomerID 	int(50) 	NO 	PRI 	NULL 	auto_increment
    // CustomerName 	varchar(30) 	NO 		NULL 	
    // CustomerAddress 	varchar(30) 	NO 		NULL 	
    // CustomerContact 	varchar(30) 	NO 		NULL 	
    // Password 	varchar(30) 	NO 		NULL 	

    //attempt customer login
    $query="insert into Customers values(?,?,?,?,?)";
    $stt=$conn->prepare($query);
    if( $stt->execute([null,$name,$address,$email,$password])){
        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
    
       
    }
?>