<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["employeename"])  ){
 $email=clean($_POST['employeeemail']);
 $designation=clean($_POST['designation']);
 $password=md5(clean($_POST['employeepassword']));
 $name=clean($_POST['employeename']);
               $inserter = "insert into Employees values (?,?,?,?,?)";
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([null,$name,$email,$designation,$password])){
                $statusMsg = 1;
               }else{
                $statusMsg = 0;
          
            } //
      
}else{
    $statusMsg = 0;
 
}


echo $statusMsg;

 ?>