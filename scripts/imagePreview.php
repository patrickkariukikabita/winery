<?php 
session_start();
require_once "../resources/config.php";
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){

    $loggedin=true;
    $productid=clean($_GET['data']);
}
else{
    $loggedin=false;
    $customerid="";
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
  
  <body class="body bg-dark" data-loggedin="<?php echo $loggedin?>"">
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
                        <button type="button" class="btn btn-warning login invisible" data-bs-toggle="modal" data-bs-target="#started">  Login  </button>
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
    <h2 class="text-center mt-3 text-light">Product Information</h2>   
    <div class="row g-4 productspanel">   
     <?php echo fetchProduct($conn,$productid)?>
     </div>
     </div>
     </section>
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

   //logging out
   $(".cartbutton").click(function(){
           
    window.location="./cart.php";
         
           })//end of logout click
           


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
                  $('.logout').removeClass('visible').addClass('invisible')
                  window.location="../index.php";
         
              }
                })//end of ajax
           })//end of logout click
           
         
           


              
         })//end of ready function
         
     </script>
     <script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>
     </body>  
</html>
