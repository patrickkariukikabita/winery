
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["productid"])  ){
    $productid=$_POST['productid'];
               $updater = "delete from Orders where ProductID = ? ";
               $stmt=$conn->prepare($updater);
               //checking if image ha been uploaded
                if($stmt->execute([$productid])){
           
                echo  1;
            
               }else{
             echo 0;
                exit;
            } //
        }

     




 ?>
