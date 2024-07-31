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
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#started">  Add Employee  </button>
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
    <h2 class="text-center mt-3 text-light">All Employees</h2>   
    <div class="row g-4 productspanel">   
     <?php 
     echo fetchEmployees($conn)?>
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
     <!-- adding employee -->
  
     <div class="modal  fade" id="started" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header ">
                     <h5 class="modal-title" id="startedLabel">Add Employee</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                 </div>
                 <div class="modal-body">
                     <form class="addemployeeform"  enctype="multipart/form-data" method="POST">
                         <div class="mb-3">
                             <input type="text" id="employeename" class="form-control employeename" name="employeename" placeholder="Employee Name">
                                   </div>
                             <div class="mb-3">
                             <input type="text" id="employeeemail" name="employeeemail" class="form-control employeeemail" placeholder="Employee Email" >
                          </div>
                          <div class="mb-3">
                             <input type="text" id="designation" name="designation" class="form-control designation" placeholder="Designation" >
                          </div>
                          <div class="mb-3">
                             <input type="password" id="employeepassword" name="employeepassword" class="form-control employeepassword" placeholder="Password" >
                          </div>
                <p class="addemployeestat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-center">
                 <button type="submit" class="btn btn-primary btn-block" >Add Employee</button>
                    </div>
                 </form>
                 
             </div>
         </div>
     </div>

 <!-- editing employee -->
  
 <div class="modal  fade editemployeemodal" id="editemployeemodal" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header ">
                     <h5 class="modal-title" id="startedLabel">Edit Employee</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                 </div>
                 <div class="modal-body">
                     <form class="editemployeeform"  enctype="multipart/form-data" method="POST">
                         <div class="mb-3">
                             <input type="text" id="editemployeename" class="form-control editemployeename" name="editemployeename" placeholder="Employee Name">
                                   </div>
                             <div class="mb-3">
                             <input type="text" id="editemployeeemail" name="editemployeeemail" class="form-control editemployeeemail" placeholder="Employee Email" >
                          </div>
                          <div class="mb-3">
                             <input type="text" id="editdesignation" name="editdesignation" class="form-control editdesignation" placeholder="Designation" >
                          </div>
                          <div class="mb-3">
                             <input type="password" id="editemployeepassword" name="editemployeepassword" class="form-control editemployeepassword" placeholder="Password" >
                          </div>
                <p class="editemployeestat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-center">
                 <button type="submit" class="btn btn-primary btn-block" >Edit Employee</button>
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
           
        $('.btn-close').click(function(){
            window.location.reload()
        })


  $(document).on("click",'.removeEmployee',function(){
   var employeeid=$(this).data("id")
   $.ajax({
           url:"./removeEmployee.php",
           method:"POST",
           data:{employeeid:employeeid},
          beforeSend:function(){
              $('.removeEmployee'+employeeid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){

            if(data==1){
        //    reload the page
        window.location.reload()
           }else{
            $('.removeEmployee'+employeeid).html('Error ').removeClass('text-warning').addClass('text-danger')
           }
             },
             error:function(){
               $('.removeEmployee'+employeeid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
           
 })    

//adding supplier

   //adding new product
    //send image to the server for preocessing
    $('.addemployeeform').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               $.ajax({ 
                   url:"./addEmployee.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".addemployeestat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){  
                  
          if(data==1){
               $(".addemployeestat").html('<p class="text-center text-info">Supplier Added</p>')
              setTimeout(Logstat,2000);
                    //first clear the form
        $(':input','.addemployeeform')
        .not(':button, :submit, :reset, :hidden ').val('')
        .prop('checked', false)
        .prop('selected', false);
            function Logstat(){
                 $(".addemployeestat").html("")
           
             }
          }
          else if (data==0){
              $(".addemployeestat").html('<p class="text-center text-danger">Failed.</p>')
          } 
           },
           error:function(data){
              
                  $(".addemployeestat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
     
// //editing an employee detail



$(document).on("click",'.editEmployee',function(){
   var employeeid=$(this).data("id")
   var frer="attempt"
   $.ajax({
           url:"./editEmployee.php",
           method:"POST",
           data:{employeeid:employeeid,frer:frer},
          beforeSend:function(){
              $('.editEmployee'+employeeid).html('<i class="fa fa-spinner"></i>')
          },
          success:function(data){
        //   populate the edit modat
        var dat= jQuery.parseJSON(data );
        $('.editemployeename').val(dat[1])
        $('.editemployeeemail').val(dat[2])
        $('.editdesignation').val(dat[3])
     
        $('#editemployeemodal').modal('show');
// handling the change
    $('.editemployeeform').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               formData.append('employeeid',employeeid)
               $.ajax({ 
                   url:"./editEmployee.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".editemployeestat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){  
             
          if(data==1){
            $('#editemployeemodal').modal('hide');
          window.location.reload()
            
          }
          else if (data==0){
              $(".editemployeestat").html('<p class="text-center text-danger"> failed.</p>')
          } 
           },
           error:function(data){
              
                  $(".editemployeestat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })
// end of handling the change
        $('.editEmployee'+employeeid).html('<i class="fa fa-pencil"></i>')
             },
             error:function(){
               $('.editEmployee'+employeeid).html('Error ').removeClass('text-warning').addClass('text-danger')
             }
            })
          
 })


           
// previewing image
$(document).on("click",'.img',function(){
  var productid=$(this).data('id')
  window.location = './imagePreview.php?data=' +productid;
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
