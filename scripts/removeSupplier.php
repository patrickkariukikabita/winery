
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["supplierid"])  ){
    $supplierid=$_POST['supplierid'];
               $updater = "delete from Suppliers where SupplierID = ? ";
               $stmt=$conn->prepare($updater);
               //checking if image ha been uploaded
                if($stmt->execute([$supplierid])){
           
                echo  1;
            
               }else{
             echo 0;
                exit;
            } //
        }

     




 ?>
