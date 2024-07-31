<?php 
session_start();

require_once('../resources/config.php');
if(isset($_POST['email'])&& $_SERVER['REQUEST_METHOD']=='POST'){
    $email=clean($_POST['email']);
    $password=clean($_POST['loginpassword']);
    $x=0;
    $password=md5($password);
    
    //attempt customer login
    $query="select * from Customers where CustomerContact=? and Password=?";
    $stt=$conn->prepare($query);
    $stt->execute([$email,$password]);
    if($stt->rowCount()>0){
    //   logining succccessful
       $results=$stt->fetch(PDO::FETCH_ASSOC);
       $userid=$results['CustomerID'];
       $_SESSION['customerid']=$userid;
       $_SESSION['acctype']="Customer";
       $_SESSION['loggedin']=true;
       $x=$userid;
        echo 1;
        exit;
    }
    
        //attempt employee login
        $query="select * from Employees where EmployeeContact=? and Password=?";
        $stt=$conn->prepare($query);
        $stt->execute([$email,$password]);
        if($stt->rowCount()>0){
        //   logining succccessful
           $results=$stt->fetch(PDO::FETCH_ASSOC);
           $userid=$results['EmployeeID'];
           $_SESSION['employeeid']=$userid;
           $_SESSION['acctype']="Employee";
           $_SESSION['loggedin']=true;
           $x=$userid;
            echo 11;
            exit;
        }

        if($x==0){
            echo 0;
        }
    }
?>