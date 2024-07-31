
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_POST["productid"])  ){
    $customerid=$_POST['customerid'];
    $productid=clean($_POST['productid']);
    $quantity=clean($_POST['quantity']);
    $status='unpocessed';
//     +---------------+-------------+------+-----+---------------------+-------+
// | Field         | Type        | Null | Key | Default             | Extra |
// +---------------+-------------+------+-----+---------------------+-------+
// | OrderID      | int(50)     | NO   | PRI | NULL                |       |
// | CustomerID    | int(50)     | NO   |     | NULL                |       |
// | EmployeeID    | int(50)     | YES  |     | NULL                |       |
// | ProductID     | int(50)     | NO   |     | NULL                |       |
// | AmountOrdered | int(10)     | NO   |     | NULL                |       |
// | OrderStatus   | varchar(20) | NO   |     | NULL                |       |
// | OrderDate     | timestamp   | NO   |     | current_timestamp() |       |
// +---------------+-------------+------+-----+---------------------+-------+
$price=getProductPrice($conn,$productid);
$total=$price*$quantity;
               $inserter = "insert into Orders(CustomerID,ProductID,AmountOrdered,OrderStatus)
                values (?,?,?,?)";
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([$customerid,$productid,$quantity,$status])){
           
            $OrderID=$conn->lastInsertID();
            $query="insert into Bills values(?,?,?)";
            $stmt=$conn->prepare($query);
            if($stmt->execute([null,$OrderID,$total])){
                echo  1;
            }
               }else{
             echo 0;
                exit;
            } //
        }

     




 ?>
