
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["suppliername"])  ){
 $supplierlocation=clean($_POST['supplierlocation']);
 $suppliername=clean($_POST['suppliername']);
               $inserter = "insert into Suppliers values (?,?,?)";
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([null,$suppliername,$supplierlocation])){
                $statusMsg = 1;
               }else{
                $statusMsg = 0;
          
            } //
      
}else{
    $statusMsg = 0;
 
}


echo $statusMsg;

 ?>
