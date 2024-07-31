<?php
session_start();
require_once "../resources/config.php";
if(isset($_POST['frer'])){
    $predicate=clean($_POST['employeeid']);
  $query="select * from Employees where EmployeeID =?";
  $stmt=$conn->prepare($query);
 $stmt->execute([$predicate]);
 if($stmt->rowCount()>0){
$out=$stmt->fetch(PDO::FETCH_ASSOC);
 $employeeid=$out['EmployeeID'];
 $employeename=$out['EmployeeName'];
 $email=$out['EmployeeContact'];
 $designation=$out['Designation'];
 $password=$out['Password'];
 
 
 $output=array();
 array_push($output,$employeeid,$employeename,$email,$designation);
 echo json_encode($output);
 
 }
exit;
}

if(isset($_POST["employeeid"])  ){
    $employeeid=clean($_POST['employeeid']);
    $employeename=clean($_POST['editemployeename']);
    $email=clean($_POST['editemployeeemail']);
    $designation=clean($_POST['editdesignation']);
    $password=md5(clean($_POST['editemployeepassword']));
    
    
               $inserter = "update Employees set EmployeeName = ?,EmployeeContact = ? 
               ,Designation = ? ,Password = ? where EmployeeID = ?" ;
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([$employeename,$email,$designation,$password,$employeeid])){
                echo 1;
                exit;
               }else{
                echo 0;
                
            } //
        }else{
            echo 00;
            
      
   
  //first checks whether there are any empty fields

    }
    
    


 ?>