<?php 
session_start();
require_once "../resources/config.php";
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    $customerid=$_SESSION['customerid'];
    $loggedin=true;
    
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
  
  <body class="body bg-dark" data-loggedin="<?php echo $loggedin?>" data-customerid="<?php echo $customerid?>">
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
                        <button type="button" class="btn btn-warning login invisible" data-bs-toggle="modal" data-bs-target="#started">  Login  </button>
                     </li>
                     <li class ="nav-item">
                        <button type="button" class="btn btn-warning cartbutton"><i class="fa  fa-shopping-cart">Cart</i></button>
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
    <h2 class="text-center mt-3 text-light">My Orders</h2>   
    <div class="row g-4 productspanel">   
     <?php echo fetchOrders($conn,$customerid)?>
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
           


                      
// previewing image
$(document).on("click",'.img',function(){
  var productid=$(this).data('id')
  window.location = './imagePreview.php?data=' +productid;
})

         
             // handling the search
             $('.search').keydown(function(){
              //  send ajax request
              var query =$('.search').val()
              if(query.length>=3){
          //  send ajax
   
          $.ajax({
                   url:"./productSearch.php",
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
// handling checkout

$(document).on("click",'.checkout',function(){
   var orderid=$(this).data("id")
   var code=$('.transactioncode'+orderid).val();
   if(code.length>0){
   $.ajax({
           url:"./checkout.php",
           method:"POST",
           data:{code:code,orderid:orderid},
          beforeSend:function(){
              $('.checkout'+orderid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){
            if(data==1){
        //    reload the page
        window.location.reload()
           }else{
            $('.checkout'+orderid).html('Error ').removeClass('text-warning').addClass('text-danger')
           }
             },
             error:function(){
               $('.checkout'+orderid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
           }//if block end
           else{
            $('.transactioncode'+orderid).addClass("border border-danger")
           }
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

 // handling orders
 $(document).on("click",'.addtocart',function(){
   
   var productid=$(this).data("id")
   var quantity=$('.quantity'+productid).val();
   if(quantity>0){
   $.ajax({
           url:"./addToCart.php",
           method:"POST",
           data:{productid:productid,quantity:quantity,customerid:customerid},
          beforeSend:function(){
              $('.addtocart'+productid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){
          if(data==1){
           $('.quantity'+productid).removeClass('border border-danger')
           $('.addtocart'+productid).html('<i class="fa fa-check"></i>').removeClass('text-warning').addClass('text-success')
          }else{
           $('.addtocart'+productid).html('Error ').removeClass('text-warning').addClass('text-danger')
          }
             },
             error:function(){
               $('.addtocart'+productid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
           }//if block end
           else{
               $('.quantity'+productid).addClass('border border-danger')
           }
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
