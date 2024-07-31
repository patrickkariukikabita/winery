<?php 
session_start();
require_once "../resources/config.php";
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    $userid=$_SESSION['userid'];
    $loggedin=true;
}
else{
    $loggedin=false;
    $userid="";
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
  
  <body class="body bg-dark" data-loggedin="<?php echo $loggedin?>" data-userid="<?php echo $userid?>" data-t="<?php echo $timestring?>">
     <nav class =" navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
         <div class ="container">
         <img src="../resources/winelogo.png" height=50 width=50>
             <a href ="../index.php" class="navbar-brand py-3 text-warning">  <?php echo $siteName?> </a>
             
             <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
             <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav gap-2 gap-md-5 pb-2">
                 
                     </ul>
                 <ul class="navbar-nav ms-auto gap-2 gap-md-5">
                     <li class ="nav-item">
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#started">  Add Supplier  </button>
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
    <h2 class="text-center mt-3 text-light">All Suppliers</h2>   
    <div class="row g-4 productspanel">   
     <?php 
     echo fetchAdminSuppliers($conn)?>
     </div>
     </div>
     </section>
     </div>

     <footer class="p-5 bg-dark text-white text-center position-relative">
         <div class="container mt-5">
             <p class="lead">Copyright &copy; 2022 <?php echo $siteName?></p>
             
             <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
         </div>
     </footer>
     <!-- adding supplier -->
  
     <div class="modal  fade" id="started" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header ">
                     <h5 class="modal-title" id="startedLabel">Add Supplier</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                 </div>
                 <div class="modal-body">
                     <form class="addsupplierform" action="addProduct.php" enctype="multipart/form-data" method="POST">
                         <div class="mb-3">
                             <input type="text" id="suppliername" class="form-control suppliername" name="suppliername" placeholder="Supplier Name">
                                   </div>
                             <div class="mb-3">
                             <input type="text" id="supplierlocation" name="supplierlocation" class="form-control supplierlocation" placeholder="Supplier Location" >
                          </div>
                <p class="addsupplierstat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-center">
                 <button type="submit" class="btn btn-primary btn-block" >Add Supplier</button>
                    </div>
                 </form>
                 
             </div>
         </div>
     </div>


    
     <script src="../resources/jquery-3.6.0.js"></script>
     <script src="../resources/timezone.js"></script>
     <script >
         $(document).ready(function(){
           var loggedin=$(".body").data('loggedin')
             //fetching users chats
             window.userid=$(".body").data('userid')
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

        
  $(document).on("click",'.removeSupplier',function(){
   var supplierid=$(this).data("id")
   $.ajax({
           url:"./removeSupplier.php",
           method:"POST",
           data:{supplierid:supplierid},
          beforeSend:function(){
              $('.removeSupplier'+supplierid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){

            if(data==1){
        //    reload the page
        window.location.reload()
           }else{
            $('.removeSupplier'+supplierid).html('Error ').removeClass('text-warning').addClass('text-danger')
           }
             },
             error:function(){
               $('.removeSupplier'+supplierid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
           
 })    

//adding supplier

   //adding new product
    //send image to the server for preocessing
    $('.addsupplierform').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               $.ajax({ 
                   url:"./addSupplier.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".addsupplierstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){  
                  
          if(data==1){
               $(".addsupplierstat").html('<p class="text-center text-info">Supplier Added</p>')
              setTimeout(Logstat,2000);
                    //first clear the form
        $(':input','.addsupplierform')
        .not(':button, :submit, :reset, :hidden ').val('')
        .prop('checked', false)
        .prop('selected', false);
            function Logstat(){
                 $(".addsupplierstat").html("")
           
             }
          }
          else if (data==0){
              $(".addsupplierstat").html('<p class="text-center text-danger">Failed.</p>')
          } 
           },
           error:function(data){
              
                  $(".addsupplierstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
     


              
         })//end of ready function
         
     </script>
     <script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>
     </body>  
</html>
