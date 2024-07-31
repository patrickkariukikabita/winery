<?php
session_start();
require_once "../resources/config.php";
if(isset($_POST['frer'])){
    $predicate=clean($_POST['productid']);
  $query="select * from Products where ProductID =?";
  $stmt=$conn->prepare($query);
 $stmt->execute([$predicate]);
 if($stmt->rowCount()>0){
$out=$stmt->fetch(PDO::FETCH_ASSOC);
 $productid=$out['ProductID'];
 $productname=$out['ProductName'];
 $price=$out['ProductPrice'];
 $quantity=$out['Quantity'];
 $image=$out['image'];
 $description=$out['description'];
 
 $output=array();
 array_push($output,$productid,$productname,$price,$quantity,$image,$description);
 echo json_encode($output);
 
 }
exit;
}

if(isset($_POST["productid"])  ){
    $productid=$_POST['productid'];
    $statusMsg=0;
    $winedesc=clean($_POST['editdescription']);
    $productname=clean($_POST['editproductname']);
    $price=clean($_POST['editprice']);
    $quantity=clean($_POST['editquantity']);
    $supplierid=clean($_POST['editsupplierid']);
if(isset($_FILES["editproductform"]["name"])){
//set image
//giving the fie a name
$randId= uniqid('wine.');
//File upload path
$targetDir = "../productImages/";
//getting the name of the uploaded file
$mediafileName = basename($_FILES["editproductform"]["name"]);
//getting file extension
$extension = strtolower(pathinfo($_FILES["editproductform"]["name"], PATHINFO_EXTENSION));
$fileName=$randId.".".$extension;
$targetFilePath = $targetDir.$fileName;
$image_path="../productImages/".$fileName;//geting the relative file path
$size = $_FILES['editproductform']['size'];
//getting the extension in lower
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','tiff','psd','ai');
    if(in_array($fileType, $allowTypes)){
      //check  fie sze before uuploding
        if ($_FILES['editproductform']['size'] <=5000000) { // file shouldn't be larger than 5Megabytes
        // Upload file to server
          if(move_uploaded_file($_FILES["editproductform"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
               $inserter = "update Products set ProductName = ?,ProductPrice = ? ,Quantity = ? ,SupplierID = ? ,
                image = ?, description = ? where ProductID = ?" ;
               $stmt=$conn->prepare($inserter);
               //checking if image ha been uploaded
                if($stmt->execute([$productname,$price,$quantity,$supplierid,$fileName,$winedesc,$productid])){
                echo 1;
                exit;
               }else{
                echo 0;
                
            } //
        }else{
            echo 00;
            
        }
      }else{
       echo 000;
         
      }
    }
      //no image
    }
   
  //first checks whether there are any empty fields

    }
    
    


 ?>