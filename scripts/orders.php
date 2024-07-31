<?php 
session_start();
require_once "../resources/config.php";
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    $employeeid=$_SESSION['employeeid'];
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
  
  <body class="body bg-dark" data-loggedin="<?php echo $loggedin?>" data-employeeid="<?php echo $employeeid?>" >
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
    <h2 class="text-center mt-3 text-light">All Customer Orders</h2>   
    <div class="row g-4 productspanel">   
     <?php 
     echo  allOrders($conn)?>
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
     
    
     <script src="../resources/jquery-3.6.0.js"></script>
     <script src="../resources/timezone.js"></script>
     <script >
         $(document).ready(function(){
           var loggedin=$(".body").data('loggedin')
             //fetching users chats
             window.employeeid=$(".body").data('employeeid')
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


                  //creating account
          $(".createAccountForm").submit(function(e){
                 e.preventDefault();
                 var formData=new FormData(this)
                $.ajax({
                    url:"./scripts/createAccount.php",
                    method:"POST",
                   data:formData,
           processData: false,
            contentType: false,
           beforeSend:function(){
               $(".createstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){
       
         
         if(data==2){
              $(".createstat").html('<p class="text-center text-danger">user already exists</p>')
             
             $('.email,.phone,.username,.password').val('');
            //   $('.phone').val('');
            //      $('.username').val('');
            //       $('.password').val(''); //this is used for singular clearing
             
         }
         else if(data==1){
              $(".createstat").html('<p class="text-center text-info">account created and you are loggined</p>')
              setTimeout(Accstat,2000);
            
             function Accstat(){
                 $(".createstat").html("")
                 $('.createClose').click()
             }
         }
            
         else{
              $(".createstat").html('<p class="text-center text-danger">error please try again</p>')
             
         }
           },
           error:function(){
            $(".createstat").html('<p class="text-center text-danger">error connecting please try again</p>')
             
           }
          })//end of ajax call
             })
             
           
// previewing image
$(document).on("click",'.img',function(){
  var productid=$(this).data('id')
  window.location = './imagePreview.php/data=' +productid;
})



             //handling login
             $('.loginForm').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               $.ajax({
                   url:"./scripts/loginner.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".loginstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){
          if(data==1){
               $(".loginstat").html('<p class="text-center text-info">logged in successfully</p>')
              setTimeout(Logstat,2000);
             function Logstat(){
                 $(".loginstat").html("")
                 $(".close").click();
             }
          }
          else{
              $(".loginstat").html('<p class="text-center text-danger">incorrect details, try again</p>')
              $('.loginpassword').val('');
          }
           },
           error:function(){
                  $(".loginstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
             
       
// handling remove from cart

  $(document).on("click",'.removeProduct',function(){
   var productid=$(this).data("id")
   $.ajax({
           url:"./removeFromCart.php",
           method:"POST",
           data:{productid:productid},
          beforeSend:function(){
              $('.removeProduct'+productid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){
            if(data==1){
        //    reload the page
        window.location.reload()
           }else{
            $('.removeProduct'+productid).html('Error ').removeClass('text-warning').addClass('text-danger')
           }
             },
             error:function(){
               $('.removeProduct'+productid).html('Error ').removeClass('text-warning').addClass('text-danger')
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
