<?php 
session_start();
require_once "../resources/config.php";
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    $employeeid=$_SESSION['userid'];
    $loggedin=true;
    
}
else{
    $loggedin=false;
    $employeeid="";
}

$_SESSION['userid']=9;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="/style.css">
  <title>
     <?php echo $siteName?>
  </title>
     <style>

 
             </style>
    </head>
  
  <body class="body bg-dark" data-loggedin="<?php echo $loggedin?>" data-employeeid="<?php echo $employeeid?>" data-t="<?php echo $timestring?>">
     <nav class =" navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
         <div class ="container">
         <img src="../resources/winelogo.png" height=50 width=50>
             <a href ="../index.php" class="navbar-brand py-3 text-warning">  <?php echo $siteName?> </a>
             
             <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
             <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav gap-2 gap-md-5 pb-2">
                
                     <li class ="nav-item">
                        <input type="search" id="form1" class="form-control search" placeholder="Search Product">
                     </li> 
                     </ul>
                 <ul class="navbar-nav ms-auto gap-2 gap-md-5">
                     <li class ="nav-item">
                        <button type="button" class="btn btn-warning   " data-bs-toggle="modal" data-bs-target="#started">  Add Product  </button>
                     </li>
                     <li class ="nav-item">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Admin Panel
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                              <li><a class="dropdown-item text-warning productsbtn" href="#">Products</a></li>
                              <li><a class="dropdown-item text-warning ordersbtn" href="#">Orders</a></li>
                              <li><a class="dropdown-item text-warning suppliersbtn" href="#">Suppliers</a></li>
                              <li><a class="dropdown-item text-warning employeesbtn" href="#">Employees</a></li>
                              <li><a class="dropdown-item text-danger logout" href="#">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                     </li>
                      <li class ="nav-item">
                        <button type="button" class="btn btn-warning login logout invisible">  Logout  </button>
                     </li>
                       
                        
                     </ul>
                     
                  </div>
         </div>
         
     </nav>
     <div class="container bg-dark mt-5">
           <!-- fetching products from the db -->
    <section id="accounts" class="bg-dark text-light p-md-5 pt-lg-3 pt-5  text-center text-sm-start">
     <div class="container border-top border-secondary mt-5">
    <h2 class="text-center mt-3 text-light">Products</h2>   
    <div class="row g-4 productspanel">   
     <?php 
     echo fetchAdminProducts($conn)?>
     </div>
     </div>
     </section>
     </div>
   <!-- Dealing with the add product modal -->
    
   <div class="modal fade" id="started" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="startedLabel">Edit Product</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                 </div>
                 <div class="modal-body">
                     <form class="addproductform" action="addProduct.php" enctype="multipart/form-data" method="POST">
                         <div class="mb-3">
                             <input type="text" id="productname" class="form-control productname" name="productname" placeholder="Product Name">
                                   </div>
                             <div class="mb-3">
                             <input type="number" id="price" name="price" class="form-control pricess" placeholder="Price" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                             <input type="number" id="quantity" name="quantity" class="form-control quantity" placeholder="Quantity" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                          <select class="form-select" name="supplierid">
                            <?php
                            getSuppliers($conn);
                            ?>
                            </select> 
                        </div>
                        <div class="mb-3">
                             <input type="text" id="description" name="description" maxlength=200 class="form-control description" placeholder="Description" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                        <label for="formFileLg" class="form-label">Product Image</label>
                        <input class="form-control form-control-lg" id="formFileLg"  name="addproductform" type="file" required/>                     
                             </div>
                        <div class="progress-bar bg-primary ">
                <!-- progress bar to show progress upload -->
                </div>
                <p class="addproductstat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-center">
                 <button type="submit" class="btn btn-primary btn-block" >Add Product</button>
                    </div>
                 </form>
                 
             </div>
         </div>
     </div>
     <!-- Handling edit product -->
     <div class="modal fade" id="editproductmodal" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="startedLabel">Add New Product</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                 </div>
                 <div class="modal-body">
                     <form class="editproductform" action="editProduct.php" enctype="multipart/form-data" method="POST">
                         <div class="mb-3">
                             <input type="text" id="editproductname" class="form-control editproductname" name="editproductname" placeholder="Product Name">
                                   </div>
                             <div class="mb-3">
                             <input type="number" id="editprice" name="editprice" class="form-control editprice" placeholder="Price" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                             <input type="number" id="editquantity" name="editquantity" class="form-control editquantity" placeholder="Quantity" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                          <select class="form-select" name="editsupplierid">
                            <?php
                            getSuppliers($conn);
                            ?>
                            </select> 
                        </div> 
                        <div class="mb-3">
                             <input type="text" id="editdescription" name="editdescription" maxlength=200 class="form-control editdescription" placeholder="Description" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="mb-3">
                          <img src="" class="editimage mb-3" width=200 height=200 style="min-height: 200px";> 
                          </div>
                          <div class="mb-3">
                        <label for="editformFileLg" class="form-label">Product Image</label>
                        <input class="form-control form-control-lg" id="editformFileLg"  name="editproductform" type="file" />                          </div>
                        <div class="editprogress-bar bg-primary ">
                <!-- progress bar to show progress upload -->
                </div>
                <p class="addproductstat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-center">
                 <button type="submit" class="btn btn-primary btn-block" >Edit Product</button>
                    </div>
                 </form>
                 
             </div>
         </div>
     </div>


     <footer class="p-5 bg-dark text-white text-center position-relative">
         <div class="container ">
             <p class="lead">Copyright &copy; 2022 <?php echo $siteName?></p>
             
             <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
         </div>
     </footer>
     
     
     
    
     <script src="../resources/jquery-3.6.0.js"></script>
     <script src="../resources/timezone.js"></script>
     <script >
         $(document).ready(function(){
           var loggedin=$(".body").data('loggedin')
             //fetching users chats
             window.customerid=$(".body").data('customerid')


           if(loggedin==1){
               $('.myorders,.chatinitiator,.logout').removeClass('invisible').addClass('visible')
           }
           else{
            window.location="../index.php";
           }
           //logging out
           $(".logout").click(function(){
               var logout="yes";
               $.ajax({
                  url:"../scripts/logout.php",
                  method:"POST",
                  data:{logout:logout},
                  success:function(data,status){
                 //refresh the current page
                 window.location="../index.php";
              }
                })//end of ajax
           })//end of logout click
                
// previewing image
$(document).on("click",'.img',function(){
  var productid=$(this).data('id')
  window.location = './imagePreview.php?data=' +productid;
})
      


               // Dealing with products
          $('.productsbtn').click(function(){
            window.location="./products.php";
          })

            // Dealing with Suppliers
            $('.suppliersbtn').click(function(){
            window.location="./suppliers.php";
          })

            // Dealing with orders
            $('.ordersbtn').click(function(){
            window.location="./orders.php";
          })

          // Dealing with employees
          $('.employeesbtn').click(function(){
                    window.location="./employees.php";
                  })

// editing product

$(document).on("click",'.productedit',function(){
   var productid=$(this).data("id")
   var frer="attempt"
   $.ajax({
           url:"./editProduct.php",
           method:"POST",
           data:{productid:productid,frer:frer},
          beforeSend:function(){
              $('.productedit'+productid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){
        //   populate the edit modat
        var dat= jQuery.parseJSON(data );
        $('.editproductname').val(dat[1])
        $('.editprice').val(dat[2])
        $('.editquantity').val(dat[3])
        $('.editimage').attr('src','../productImages/'+dat[4])
        $('.editdescription').val(dat[5])
        $('#editproductmodal').modal('show');
// handling the change
    $('.editproductform').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               formData.append('productid',productid)
               $.ajax({  xhr: function() {//updting the updat progress on progress bar
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".editprogress-bar").width(percentComplete + '%');
                        $(".editprogress-bar").html(percentComplete+'%').addClass("w3-green").addClass("w3-text-black");
                    }
                        }, false);
                        return xhr;
                },
                   url:"./editProduct.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".editproductstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){  
             
          if(data==1){
            $('#editproductmodal').modal('hide');
          window.location.reload()
            
          }
          else if (data==0){
              $(".editproductstat").html('<p class="text-center text-danger">Product upload failed.</p>')
          } else if (data==00){
              $(".editproductstat").html('<p class="text-center text-danger"> Error uploading product.</p>')  
          }   else if (data==000){
              $(".editproductstat").html('<p class="text-center text-danger">File too large! max 5M</p>') 
          } else if (data==0000){
              $(".editproductstat").html('<p class="text-center text-danger">File type not permissible </p>')
          }
         else if (data==00000){
              $(".editproductstat").html('<p class="text-center text-danger">No file selected </p>')  
         }
           },
           error:function(data){
              
                  $(".editproductstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
// end of handling the change
        $('.productedit'+productid).html('<i class="fa fa-pencil"></i>')
             },
             error:function(){
               $('.productedit'+productid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
          
 })






            // handling the search
            $('.search').keydown(function(){
              //  send ajax request
              var query =$('.search').val()
              if(query.length>=3){
          //  send ajax
   
          $.ajax({
                   url:"./adminProductSearch.php",
                   method:"POST",
                   data:{query:query},
           beforeSend:function(){
               $(".productspanel").html('searching products')
           },
           success:function(data){
            $(".productspanel").html(data)
              },
              error:function(){
                $(".productspanel").html('Error finding  products')
              }
             })
              }
            })


   //adding new product
    //send image to the server for preocessing
   $('.addproductform').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               $.ajax({  xhr: function() {//updting the updat progress on progress bar
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%').addClass("w3-green").addClass("w3-text-black");
                    }
                        }, false);
                        return xhr;
                },
                   url:"./addProduct.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".addproductstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){  
                  
          if(data==1){
               $(".addproductstat").html('<p class="text-center text-info">Product Added</p>')
              setTimeout(Logstat,2000);
                    //first clear the form
        $(':input','.addproductform')
        .not(':button, :submit, :reset, :hidden ').val('')
        .prop('checked', false)
        .prop('selected', false);
            function Logstat(){
                 $(".addproductstat").html("")
                 $(".progress-bar").html("")
             }
          }
          else if (data==0){
              $(".addproductstat").html('<p class="text-center text-danger">Product upload failed.</p>')
          } else if (data==00){
              $(".addproductstat").html('<p class="text-center text-danger"> Error uploading product.</p>')  
          }   else if (data==000){
              $(".addproductstat").html('<p class="text-center text-danger">File too large! max 5M</p>') 
          } else if (data==0000){
              $(".addproductstat").html('<p class="text-center text-danger">File type not permissible </p>')
          }
         else if (data==00000){
              $(".addproductstat").html('<p class="text-center text-danger">No file selected </p>')  
         }
           },
           error:function(data){
              
                  $(".addproductstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
     


    //    handling history
             window.history.replaceState('','',window.location.href)

              
         })//end of ready function
         
     </script>
     <script>
 
</script>
     </body>  
</html>
