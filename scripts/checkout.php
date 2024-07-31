
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["orderid"])  ){
    $code=clean($_POST['code']);
    $orderid=clean($_POST['orderid']);
    $status='processed';


// +-----------------+--------------+------+-----+---------------------+----------------+
// | Field           | Type         | Null | Key | Default             | Extra          |
// +-----------------+--------------+------+-----+---------------------+----------------+
// | OrderID         | int(50)      | NO   | PRI | NULL                | auto_increment |
// | CustomerID      | int(50)      | NO   |     | NULL                |                |
// | TransactionCode | varchar(150) | YES  |     | NULL                |                |
// | ProductID       | int(50)      | NO   |     | NULL                |                |
// | AmountOrdered   | int(10)      | NO   |     | NULL                |                |
// | OrderStatus     | varchar(20)  | NO   |     | NULL                |                |
// | OrderDate       | timestamp    | NO   |     | current_timestamp() |                |
// +-----------------+--------------+------+-----+---------------------+----------------+


               $updater = "update Orders set TransactionCode = ? ,
               OrderStatus = ? where   OrderID = ? ";
               $stmt=$conn->prepare($updater);
               //checking if image ha been uploaded
                if($stmt->execute([$code,$status,$orderid])){
           
                echo  1;
            
               }else{
             echo 0;
                exit;
            } //
        }

     




 ?>
