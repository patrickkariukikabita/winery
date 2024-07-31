
<?php 
session_start();
require_once'../resources/config.php';
if(isset($_FILES["addproductform"]["name"])  ){
  //first checks whether there are any empty fields
$statusMsg=0;
//giving the fie a name
$randId= uniqid('wine.');
//File upload path
$targetDir = "../productImages/";
//getting the name of the uploaded file
$mediafileName = basename($_FILES["addproductform"]["name"]);

//getting file extension
$extension = strtolower(pathinfo($_FILES["addproductform"]["name"], PATHINFO_EXTENSION));
$fileName=$randId.".".$extension;

$targetFilePath = $targetDir.$fileName;
$image_path="../productImages/".$fileName;//geting the relative file path
$size = $_FILES['addproductform']['size'];

//getting the extension in lower
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
     $winedesc=clean($_POST['description']);
     $productname=clean($_POST['productname']);
     $price=clean($_POST['price']);
     $quantity=clean($_POST['quantity']);
     $supplierid=clean($_POST['supplierid']);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','tiff','psd','ai');
    if(in_array($fileType, $allowTypes)){
      //check  fie sze before uuploding
        if ($_FILES['addproductform']['size'] <=5000000) { // file shouldn't be larger than 5Megabytes
        // Upload file to server
          if(move_uploaded_file($_FILES["addproductform"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

//             MariaDB [winery]> desc Products;
// +--------------+-------------+------+-----+---------+----------------+
// | Field        | Type        | Null | Key | Default | Extra          |
// +--------------+-------------+------+-----+---------+----------------+
// | ProductID    | int(50)     | NO   | PRI | NULL    | auto_increment |
// | ProductName  | varchar(50) | NO   |     | NULL    |                |
// | ProductPrice | int(50)     | NO   |     | NULL    |                |
// | Quantity     | int(50)     | NO   |     | NULL    |                |
// | SupplierID   | int(50)     | NO   |     | NULL    |                |
// | image        | varchar(50) | NO   |     | NULL    |                |
// | description  | varchar(50) | NO   |     | NULL    |                |
// +--------------+-------------+------+-----+---------+----------------+

               $inserter = "insert into Products values (?,?,?,?,?,?,?)";
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([null,$productname,$price,$quantity,$supplierid,$fileName,$winedesc])){
                     $last_id = $conn->lastInsertId();
               
                $statusMsg = 1;


             
               }else{
                $statusMsg = 0;
                exit;
            } //
        }else{
            $statusMsg = 00;
            exit;
        }

      }else{
         $statusMsg= 000;
         exit;
      }
    }else{
        $statusMsg = 0000;
        exit;
    }
}else{
    $statusMsg = 00000;
    exit;
}


echo $statusMsg;

 ?>
