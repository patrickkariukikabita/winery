<?php
//adding the user to the database
	$serverhost="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbasename="winery";
	$siteName="Bolly's Winery Store";

	//establishing db conn
  try{
  	$conn=new PDO("mysql:host=$serverhost;dbname=$dbasename",$dbusername,$dbpassword);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
   //MAKING A FUNCTION TO CLEAN THE USER INPUT
    function clean($data){
        $data=trim($data);
        $data=implode("",explode("\\",$data));//remove all slashes
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

   


  

function getCustomerName( $conn,$customerid){
  $query = "SELECT CustomerName FROM Customers WHERE CustomerID = ?";
  $statement = $conn->prepare($query);
  $statement->execute([$customerid]);
  $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['CustomerName'];
}

function getEmployeeName($conn,$employeeid){
  $query = "SELECT EmployeeName FROM Employees WHERE EmployeeID = ?";
  $statement = $conn->prepare($query);
  $statement->execute([$employeeid]);
  $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['EmployeeName'];
}



 function fetchAdminProducts($conn){
   $query='select * from Products';
   $stmt=$conn->prepare($query);
  $stmt->execute([]);
  if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
  $productid=$out['ProductID'];
  $productname=$out['ProductName'];
  $price=$out['ProductPrice'];
  $quantity=$out['Quantity'];
  $image=$out['image'];
  $description=$out['description'];
  
  $output='
  
    
            
                 <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center"style="max-height: 400px;">
                             <img src="../productImages/'.$image.'" class=" img mb-3" data-id="'.$productid.'" width=200 height=200 style="min-height: 200px;" alt="'.$productname.'"/> 
                             <span class="d-inline-block  text-dark text-truncate" style="max-width: 150px;">
                             '.$productname.'
                              </span><br>
                              <span class="d-inline-block  text-dark text-truncate" style="max-width: 150px;">
                             '.$price.'
                              </span><br>
                             <span class="d-inline-block  text-dark text-truncate" style="max-width: 120px;">
                             '.$description.'
                              </span><br>
                          
                              <button class=" text-warning bg-dark btn btn-block productedit productedit'.$productid.'"  data-id="'.$productid.'" type="button"><i class="fa fa-pencil"></i></button>

                              </div>
                     </div>
                 </div>
              
               
         
  ';
  echo $output;
}
  }else{
  $output='
  
         <div class="container text-light">
             Sorry,No products found;
         </div>
   
  ';
  echo $output;
  }

 }
 
function getSuppliers($conn){
  $query="select * from Suppliers";
   $stmt=$conn->prepare($query);
  $stmt->execute();
  if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
  $supplierid=$out['SupplierID'];
  $suppliername=$out['SupplierName'];
  $supplierlocation=$out['SupplierLocation'];

  $output='
  <option value="'.$supplierid.'"> '.$suppliername.' </option>
  ';
  echo $output;
}
  }else{
  $output='
  
  <option value="0"> None </option>
   
  ';
  echo $output;
  }

}


function fetchProducts($conn){
  $query="select * from Products";
  $stmt=$conn->prepare($query);
 $stmt->execute();
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $productid=$out['ProductID'];
 $productname=$out['ProductName'];
 $price=$out['ProductPrice'];
 $quantity=$out['Quantity'];
 $image=$out['image'];
 $description=$out['description'];
 
 $output='
      <div class="col-md-6 col-lg-4">
          <div class="card bg-light">
              <div class="card-body text-center"style="height:380px; max-height: 400px;">
              <div class=" w-full" style=" height:200px; width:100%;" >
              <img src="../productImages/'.$image.'" class="img-fluid mb-3 " 
                  style=" height:100%;" data-id="'.$productid.'" alt="'.$productname.'"/> 
              </div>
                  
                  <div  class=" px-2 d-flex justify-content-between items-center text-dark text-truncate " >
                   <p class=" text-dark text-truncate text-sm"> 
                  '.$productname.'
                    </p> 
                    <p class="text-dark text-truncate"> 
                      $ '.$price.'
                    </p>
                    </div>
                  <p class="text-dark text-truncate text-start px-2 " style="font-size:12px;" >
                  '.$description.'
                    </p>
                    <input type="number" id="form1" class=" mb-2 form-control quantity quantity'.$productid.'" placeholder="Quantity">
                  <button class=" text-warning bg-dark btn btn-block mt-2 addtocart addtocart'.$productid.'" data-id="'.$productid.'" type="button">Buy</button>
              </div>
          </div>
      </div>
    
              
        
 ';
 echo $output;
}
 }else{
 $output='
 
        <div class="container text-light">
            Sorry,No products found;
        </div>
  
 ';
 echo $output;
 }

}

function fetchOrderProduct($conn,$productid,$quantity,$status){
  $querry="select * from Products where ProductID = ?";
  $st=$conn->prepare($querry);
 $st->execute([$productid]);
 if($st->rowCount()>0){
   $ou=$st->fetch(PDO::FETCH_ASSOC);
 $productname=$ou['ProductName'];
 $price=getProductPrice($conn,$productid);
 $image=$ou['image'];
 $description=$ou['description'];
 $tot=$price*$quantity;
 if($status=="processed"){
   $btn='';
 }else{
  $btn='<div class="col"> 
  <button class=" text-danger bg-dark border border-warning btn btn-block removeProduct removeProduct'.$productid.'" data-id="'.$productid.'" type="button">
  <i class="fa fa-trash"></i></button>
  </div>';
 }
  $output='



 <div class="row  ">
 <div class="row main align-items-center">
     <div class="col"> 
      <img src="../productImages/'.$image.'" class="img " style="max-height: 100px;" data-id="'.$productid.'" alt="'.$productname.'"/>
      </div>
     <div class="col">
         <div class="row text-warning">'.$productname.'</div>
     </div>
   
     <div class="col"> price/unit: '.$price.' 
     </div>
     <div class="col"> Quantity: '.$quantity.' 
     </div>
     <div class="col-lg-3 text-warning h2 "> Total: '.$tot.' 
     </div>
     '.$btn.'
 </div>
</div>
            
        
 ';

 }else{
 $output='
 
        <div class="container text-light">
            Sorry,No products found;
        </div>
  
 ';

 }
return $output;
}



function fetchOrders($conn,$customerid){
  $query="select * from Orders where CustomerID=? order by OrderDate desc";
  $stmt=$conn->prepare($query);
 $stmt->execute([$customerid]);
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $date=$out['OrderDate'];
 $orderid=$out['OrderID'];
 $dt = new DateTime($date);
 $dt=date_format($dt,'Y/m/d');
$status=$out['OrderStatus'];
$code=$out['TransactionCode'];
$customerid=$out['CustomerID'];
$productid=$out['ProductID'];
$quantity=$out['AmountOrdered'];
if($status=="processed"){
  $btn='
  <div class="col">
  <span class="d-inline-block mx-5 mt-2 text-light text-truncate">
             Transaction Code : '.$code.'
              </span> 
  </div>
  <div class="col "> 
  <button class=" text-warning bg-dark border border-warning btn btn-block "type="button" disabled>
  CHECKED OUT</button>
  </div>';
  
}else{
$btn='
<div class="col"> 
<input type="text" id="form1" class="form-control transactioncode transactioncode'.$orderid.'" placeholder="Transaction Code">
</div>
<div class="col "> 
<button class=" text-warning bg-dark border border-warning btn btn-block checkout checkout'.$orderid.'" data-id="'.$orderid.'" data-date='.$date.'type="button">
CHECKOUT</button>
</div>';
}

 $output='
         <div class="col-md-12 col-lg-12">
             <div class="card bg-dark border border-warning">
             <div class="bg-dark text-light ">
             <span class="d-inline-block mx-5 mt-2 text-light text-truncate" style="max-width: 150px;">
             Date '.$dt.'
              </span>
              <span class="d-inline-block mt-2 mx-3 text-light text-truncate" style="max-width: 150px;"> Name:
              '.getCustomerName($conn,$customerid).'
              </span>
                </div>
             <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
        <p class="bg-light text-warning">'.fetchOrderProduct($conn,$productid,$quantity,$status).'</p>
             </div>
             <div class="row me-2 my-2 mx-2  ">
             <div class="row main align-items-center mt-2">
                 <div class="col">
                     <div class="row text-warning"></div>
                 </div>
               
                 <div class="col"> Free Home Delivery 
                 </div>
                
                '.$btn.'
             </div>
            </div>


                </div>
              </div>
       
 ';
 echo $output;
}
 }else{
 $output='

        <div class="container text-light">
            Sorry,No Orders Placed;
        </div>
  
 ';
 echo $output;
 }

}

function getProductPrice($conn,$productid){
$stmt=$conn->prepare("select ProductPrice from Products where ProductId=?");
$stmt->execute([$productid]);
if($stmt->rowCount()>0){
  $out=$stmt->fetch(PDO::FETCH_ASSOC);
  return $out['ProductPrice'];
}
}

// Displaying orders to admins
function allOrders($conn){
  $query="select * from Orders ";
  $stmt=$conn->prepare($query);
 $stmt->execute();
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $date=$out['OrderDate'];
 $dt = new DateTime($date);
 $dt=date_format($dt,'Y/m/d');
$status=$out['OrderStatus'];
$code=$out['TransactionCode'];
$customerid=$out['CustomerID'];
$productid=$out['ProductID'];
$price=getProductPrice($conn,$productid);
$stat=$out['OrderStatus'];
$quantity=$out['AmountOrdered'];
$total=($price*$quantity);
 $output='
         <div class="col-md-12 col-lg-12">
             <div class="card bg-dark border border-warning">
             <span class="d-inline-block mx-5 text-light text-truncate" style="max-width: 150px;">
             Date: '.$dt.'
              </span>
              <span class="d-inline-block  mx-3 text-light text-truncate" style="max-width: 150px;"> Name:
              '.getCustomerName($conn,$customerid).'
              </span>
             <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
        <p class="bg-light text-warning">'.fetchOrderProduct($conn,$productid,$quantity,$stat).'</p>
             </div>
             </div>
              </div>
       
 ';
 echo $output;
}
 }else{
 $output='

        <div class="container text-light">
            Sorry,No Orders Placed;
        </div>
  
 ';
 echo $output;
 }
}//end of function
 function fetchAdminSuppliers($conn){
  $query="select * from Suppliers";
  $stmt=$conn->prepare($query);
 $stmt->execute();
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $supplierid=$out['SupplierID'];
 $suppliername=$out['SupplierName'];
 $supplierlocation=$out['SupplierLocation'];
 $btn='<div class="col"> 
 <button class=" text-danger bg-dark border border-warning btn btn-block removeSupplier removeSupplier'.$supplierid.'" data-id="'.$supplierid.'" type="button">
 <i class="fa fa-trash"></i></button>
 </div>';
 $output='
 <div class="col-md-12 col-lg-12">
     <div class="card bg-dark border border-warning">
     <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
     <div class="row  ">
     <div class="row main align-items-center">
         
         <div class="col-lg-4">
             <div class="row h3 text-light">'.$suppliername.'</div>
         </div>
         <div class="col"> 
         </div>
         <div class="col-lg-4 text-warning ">  '.$supplierlocation.' 
         </div>
         <div class="col"> 
         </div>
         '.$btn.'
     </div>
    </div>
                
     </div>
     </div>
      </div>

';
echo $output;
}
 }else{
  $output='
 <div class="col-md-12 col-lg-12">
     <div class="card bg-dark border border-warning">
     <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
     <div class="row  ">
     <div class="row main text-warning align-items-center">
        No Suppliers Found 
     </div>
    </div>
                
     </div>
     </div>
      </div>

';
 echo $output;
 }
 }


//  fetching employees

function fetchEmployees($conn){
  $query="select * from Employees";
  $stmt=$conn->prepare($query);
 $stmt->execute();
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $employeeid=$out['EmployeeID'];
 $employeename=$out['EmployeeName'];
 $employeecontact=$out['EmployeeContact'];
 $designation=$out['Designation'];
 $btn='<div class="col"> 
 <button class=" text-danger bg-dark border border-warning btn btn-block removeEmployee removeEmployee'.$employeeid.'" data-id="'.$employeeid.'" type="button">
 <i class="fa fa-trash"></i></button>
 </div>';
 $editbtn='<div class="col"> 
 <button class=" text-light bg-dark border border-primary btn btn-block editEmployee editEmployee'.$employeeid.'" data-id="'.$employeeid.'" type="button">
 <i class="fa fa-pencil"></i></button>
 </div>';
 $output='
 <div class="col-md-12 col-lg-12">
     <div class="card bg-dark border border-warning">
     <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
     <div class="row  ">
     <div class="row main align-items-center">
         
         <div class="col-lg-4">
             <div class="row h3 text-light">'.$employeename.'</div>
         </div>
         <div class="col-lg-3"> '.$employeecontact.'
         </div>
         <div class="col-lg-2 text-warning "> '.$designation.' 
         </div>
         <div class="col"> 
         </div>
         '.$btn.'
         '.$editbtn.'
     </div>
    </div>
                
     </div>
     </div>
      </div>

';
echo $output;
}
 }else{
  $output='
 <div class="col-md-12 col-lg-12">
     <div class="card bg-dark border border-warning">
     <div class="card-body text-left"style="max-height: 400px; overflow-y:scroll;">
     <div class="row  ">
     <div class="row main text-warning align-items-center">
        No Suppliers Found 
     </div>
    </div>
                
     </div>
     </div>
      </div>

';
 echo $output;
 }
 }


//  fetch product
function fetchProduct($conn,$productid){
  $query="select * from Products where ProductID = ?";
  $stmt=$conn->prepare($query);
 $stmt->execute([$productid]);
 if($stmt->rowCount()>0){
while($out=$stmt->fetch(PDO::FETCH_ASSOC)){
 $productid=$out['ProductID'];
 $productname=$out['ProductName'];
 $price=$out['ProductPrice'];
 $quantity=$out['Quantity'];
 $image=$out['image'];
 $description=$out['description'];
 
 $output='

 <section id="learn" class="p-md-5 bg-dark">
         <div class="container">
             <div class="row align-items-center text-light justify-content-between">
                 <div class="col-md p-3 ">
                     <h2> <span class="text-warning">Name : </span><br>'.$productname.'</h2>
                     <p class="lead ">
                     <span class="text-warning">  Description : </span> <br> '.$description.'
                         
                     </p>
                     <p class="lead  ">
                 <span class="text-warning">  Price : </span> <br> '.$price.'
                         
                     </p>
                 </div>
                 <div class="col-md">
                    <img src="../productImages/'.$image.'" class="img-fluid " alt=""/>
                    
                 </div>
             </div>
         </div>
     </section>
 ';
 echo $output;
}
 }else{
 $output='
 
        <div class="container text-light">
            Sorry,No products found;
        </div>
  
 ';
 echo $output;
 }

}
?>