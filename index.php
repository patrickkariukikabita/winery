<?php
require_once"./resources/config.php";

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
  <link rel="stylesheet" href="/style.css">
  <title>
     <?php echo $siteName?>
  </title>
     <style>
 
             </style>
    </head>
  
  <body>
     <nav class =" navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
         <div class ="container">
         <img src="./resources/winelogo.png" height=50 width=50>
             <a href ="./index.php" class="navbar-brand text-warning">  <?php echo $siteName?> </a>
             
             <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
             <div class="collapse navbar-collapse" id="navmenu">
                 <ul class="navbar-nav ms-auto gap-2">
                     <li class ="nav-item">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#started">Login</button>
                     </li>
                        <li class ="nav-item">
                        <button type="button" class="btn btn-warning orderbtn">Order Now</button>
                     </li>
                        
                     </ul>
                     
                  </div>
         </div>
         
     </nav>
     
     <!-- showcase -->
     
     <section class="bg-dark text-light p-md-5 pt-lg-3 pt-5  text-center text-sm-start">
         <div class ="container mt-5">
             <div class="d-sm-flex align-items-center p-md-2 mt-5 pb-2 justify-content-between">
                 <div>
                 <h1>The Best wines in town, around and everywhere... <br> <span class="text-warning">At A Fair Price</span></h1>  
                <p class="lead my-4">Our top categories include:- Red Wines, White Wines, Sweet Wines ,Spirits  and Many others</p>
                 <button class="btn btn-warning btn-lg orderbtn">Place your order now</button>
                 </div>
                
                 
                 <img class="img-fluid d-none d-sm-block"  src="./resources/wine1.jpg" alt="Wine image">
                
             </div>
             
         </div>
         
     </section>
     
    

     
     <section id="learn" class="p-md-5 bg-dark ">
         <div class="container">
             <div class="row align-items-center text-light justify-content-between">
                <div class="col-md">
                    <img src="./resources/wine2.jpg" class="img-fluid " alt=""/>
    
                 </div>
                 <div class="col-md p-3">
                     <h2>Make friends,our wines will make the moments.</h2>
                     <p class="lead text-light">
                       Available at affordable prices,Our wines are the magic needed
                        to turn every meeting to a memorable feast. We also offer discounts to our products, 
                        you not only ge the best, but also at a discounted price.</p>
                     <a type="button" class="btn btn-warning mt-3 orderbtn"><i class="bi bi-chevron-right"></i> Place an Order</a>
                 </div>
                 
             </div>
         </div>
     </section>
     <section id="accounts" class="p-md-5 p-sm-3 bg-dark">
         <div class="container border-top border-secondary">
             <h2 class="text-center mt-3 text-light">Our  Categories</h2>
             <p class="lead text-center text-light mb-3">
              Some of our categories
             </p>
             <div class="row g-4">
                 <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/sweetwine.png" class=" mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Sweet Wines</h3>
                         </div>
                     </div>
                 </div>
                 
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/whitewine.png" class=" mb-3" alt=""/> 
                             <h3 class="card-title mb-3">White Wines</h3>
                         </div>
                     </div>
                 </div>
                 
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/redwine.png" class="rounded-circle mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Red Wines</h3>
                         </div>
                     </div>
                 </div>
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/spirits.png" class="rounded-circle mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Spirits</h3>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
      <section id="learn" class="p-md-5 bg-dark">
         <div class="container">
             <div class="row align-items-center text-light justify-content-between">
                 <div class="col-md p-3 ">
                     <h2>Our Guarantee</h2>
                     <p class="lead text-light">
                        Best-price guarantee<br>
                         Free-Delivery policy<br>
                         Money-back guarantee<br>
                          Privacy policy<br>
                        Fair-cooperation guarantee <br>
                        
                         
                     </p>
                 </div>
                 <div class="col-md">
                    <img src="./resources/wine1.jpg" class="img-fluid " alt=""/>
                    
                 </div>
             </div>
         </div>
     </section>
     
     <section id="question" class="p-3 bg-dark ">
         <div class ="container border-top border-secondary">
             <h2 class ="text-center mb-4">Frequently asked questions</h2>
            
        
             <div class ="accordion accordion-flush" id="questions">
                 <div class="accordion-item">
                     <h2 class="accordion-header" id="flush-headingOne">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                         data-bs-target="#question1" > Why choose us </button>
                     </h2>
                     <div id="question1" class="accordion-collapse collapse" data-bs-parent="#question1">
                         <div class="accordion-body">  
                     We have the best wines in town.We believe in quality and customer satisfaction
                         </div>
                     </div>
                 </div>
                 
                     <div class="accordion-item">
                     <h2 class="accordion-header" id="flush-headingOne">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                         data-bs-target="#question2" > Do we give offers?  </button>
                     </h2>
                     <div id="question2" class="accordion-collapse collapse"
                     data-bs-parent="#question2">
                         <div class="accordion-body">  
                   Yes, we have discounts,offers and occasional black fridays
                         </div>
                     </div>
                 </div>
                 
                     <div class="accordion-item ">
                     <h2 class="accordion-header" id="flush-headingOne">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                         data-bs-target="#question3" > Whats information do you store? </button>
                     </h2>
                     <div id="question3" class="accordion-collapse collapse"
                     data-bs-parent="#question3">
                         <div class="accordion-body">  
                         We do not store sensitive customer information
                         </div>
                     </div>
                 </div>
                 
                     <div class="accordion-item">
                     <h2 class="accordion-header" id="flush-headingOne">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                         data-bs-target="#question4" > How long we have been operating? </button>
                     </h2>
                     <div id="question4" class="accordion-collapse collapse"
                     data-bs-parent="#question4">
                         <div class="accordion-body">  
                    Bolly's Winery was instantiated in 1806, it is the oldest winery store in town
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     
     <section id="accounts" class="p-md-5 p-sm-3 bg-dark">
         <div class="container border-top border-secondary">
             <h2 class="text-center mt-3 text-light">Our  Categories</h2>
             <p class="lead text-center text-light mb-3">
               Select from our vast category pool
             </p>
             <div class="row g-4">
                 <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/sweetwine.png" class=" mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Sweet Wines</h3>
                         </div>
                     </div>
                 </div>
                 
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/whitewine.png" class=" mb-3" alt=""/> 
                             <h3 class="card-title mb-3">White Wines</h3>
                         </div>
                     </div>
                 </div>
                 
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/redwine.png" class="rounded-circle mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Red Wines</h3>
                         </div>
                     </div>
                 </div>
                   <div class="col-md-6 col-lg-3">
                     <div class="card bg-light">
                         <div class="card-body text-center">
                             <img src="./resources/spirits.png" class="rounded-circle mb-3" alt=""/> 
                             <h3 class="card-title mb-3">Spirits</h3>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     
    
     
     <section class="p-md-5 bg-dark pt-5" id="contact">
         <div class="container ">
             <div class="row g-4 bg-dark border-top border-secondary">
                 <div class="col-md bg-dark text-light mt-5">
                     <h2 class="text-center mb-4">Contact Info</h2>
                     
                     <ul class="list-group list-group-flush lead ">
                        
                          <li class="list-group-item bg-dark text-light" >
                             <span class="fw-bold">Main Phone: +35425252525 </span>
                         </li>
                          <li class="list-group-item bg-dark text-light">
                             <span class="fw-bold">Main Email: admin.bollyswinery@gmail.com </span>
                         </li>
                          <li class="list-group-item bg-dark text-light">
                             <span class="fw-bold ">CustomerCare: customer.bollyswinery@gmail.com </span>
                         </li>
                         
                     </ul>
                 </div>
                 <div class="col-md">
                      <img src="./resources/wine2.jpg" class="img-fluid" alt=""/>
                    
                 </div>
             </div>
         </div>
     </section>  
     <footer class="p-5 bg-dark text-white text-center position-relative">
         <div class="container">
             <p class="lead text-light">Copyright &copy; <?php echo $siteName?></p>
             
             <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
         </div>
     </footer>
     
     <div class="modal fade" id="started" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="startedLabel">Login To your account</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    
                 </div>
                 <div class="modal-body">
                     <form class="loginForm" method="POST">
                         <div class="mb-3">
                             <input type="text" id="" class="form-control email" name="email" placeholder="enter email">
                                   </div>
                             <div class="mb-3">
                             <input type="password" id="userpassword" name="loginpassword" class="form-control loginpassword" placeholder="enter password" aria-describedby="passwordHelpInline">
                          </div>
                     
                      <p class="loginstat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-between">
                       <p><a href="#" role="button" class="btn tooltip-test text-primary" title="createAccount" data-bs-toggle="modal" data-bs-target="#createAccount">Create Account</a></p>
                    <div>
                     <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" >Login</button>
                 </div></div>
                 </form>
                 
             </div>
         </div>
     </div>
     
     <!--create account modal -->
       <div class="modal fade createAccountModal" id="createAccount" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
         
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Create your account</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    
                 </div>
                 <div class="modal-body">
                     <form class="createAccountForm" method="POST">
                         <div class="mb-3">
                             <input type="text" id="" class="form-control email" placeholder="enter email" required name="email" required>
                                   </div>
                                   <div class="mb-3">
                             <input type="text" id="" class="form-control name" placeholder="enter Full names" name="name" required>
                                   </div>
                         <div class="mb-3">
                             <input type="text" id="" class="form-control address" placeholder="enter Address" required name="address" required>
                                   </div>
            
                             <input type="password" id="userpassword" class="form-control password" placeholder="enter password" aria-describedby="passwordHelpInline" name="password" required>
                          </div>
                          <div class="mb-3">
                            <p class="createstat text-center" value=""></p>
                            </div>
                 
                                         <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary createAccountBtn">Create Account</button>
                          </div>
                  </form>
             </div>
         </div>
     </div>
     
     <script src="./resources/jquery-3.6.0.js"></script>
     <script >
         $(document).ready(function(){
           
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
        
             
         }
         else if(data==1){
              $(".createstat").html('<p class="text-center text-info">account created and you are loggined</p>')
              setTimeout(Accstat,2000);
            
             function Accstat(){
                 $(".createstat").html("")
                   //$(".createAccountModal").hide();
                     window.location="./scripts/customerHome.php";
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
               $(".loginstat").html('<p class="text-center text-info">Customer logged in successfully</p>')
              setTimeout(Logstat,2000);
            
             function Logstat(){
                 $(".loginstat").html("")
                 $(".close").click();
                 
                window.location="./scripts/customerHome.php";
             }
          }
          if(data==11){
               $(".loginstat").html('<p class="text-center text-info">Employee logged in successfully</p>')
              setTimeout(EmpLogstat,2000);
            
             function EmpLogstat(){
                 $(".loginstat").html("")
                 $(".close").click();
                 
                window.location="./scripts/employeeHome.php";
             }
          }
          else if (data==0){
              $(".loginstat").html('<p class="text-center text-danger">incorrect details, try again</p>')
              $('.loginpassword').val('');
              
          }
               
           },
           error:function(){
                  $(".loginstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })



             $('.orderbtn').click(function(){
                window.location="./scripts/seeProducts.php";
             })

               //handling history
         window.history.replaceState('','',window.location.href)
         })
       
     </script>
     <script>
  
</script>
     </body>  
</html>
