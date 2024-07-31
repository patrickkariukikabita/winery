

<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["employeeid"])  ){
    $employeeid=$_POST['employeeid'];
               $updater = "delete from Employees where EmployeeID = ? ";
               $stmt=$conn->prepare($updater);
               //checking if image ha been uploaded
                if($stmt->execute([$employeeid])){
           
                echo  1;
            
               }else{
             echo 0;
                exit;
            } //
        }

     




 ?>
