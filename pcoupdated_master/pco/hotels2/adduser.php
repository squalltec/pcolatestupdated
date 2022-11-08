<?php

require_once('db_connection.php');


include('header.php');



    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	
















if (isset($_POST['submit'])) {
    
    
    $admin = isset($_POST['admin']) ? "1" : "0";

    $prices = isset($_POST['prices']) ? "1" : "0";
    
    $restaurant = isset($_POST['restaurant']) ? "1" : "0";
    
    $club = isset($_POST['club']) ? "1" : "0";

  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add User</h1>
<form action="#" method="post" enctype="multipart/form-data">



<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

 
 <br/><br/>
 <div class='container'>
     <div class='row'>
         <div class='col-sm'>
             <label>First Name</label>
             <input id='fname' name='fname' placeholder='First Name' type='email' class='form-control'>
         </div>
         <div class='col-sm'>
             <label>Last Name</label>
             <input id='lname' name='email' placeholder='Last Name' type='email' class='form-control'>
         </div>
        
         
     </div>
 </div>


<div class='container'>
     <div class='row'>
 <div class='col-sm'>
     <label>Email</label>
             <input id='email' name='email' placeholder='Email Address' type='email' class='form-control'>
         </div>
         <div class='col-sm'>
             <label>Password</label>
             <input id='password' name='password' placeholder='Password' type='email' class='form-control'>
         </div>


   </div>
 </div>



<div class='container'>
     <div class='row'>
 <div class='col-sm'>
     <label>User Rights</label>
       
       <br/>
       <br/>
       
       
        <label for='admin'>Admin Access</label>
        <input name='admin' type='checkbox' id='admin'>
        <br/>
       
         <label for='prices'>Prices Access</label>
        <input name='prices' type='checkbox' id='prices'>
        <br/>
         <label for='restaurant'>Restaurants Access</label>
        <input name='restaurant' type='checkbox' id='restaurant'>
         <br/>
         <label for='club'>Clubs Access</label>
        <input name='club' type='checkbox' id='club'>
         
         
         
         
    
     </div>
     
     </div>
     </div>


<br/>
<br/>

   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>


<script>
 //var all=  document.getElementById('admin');
 
// if(all.is(':checked'))
// {
     
// }
 
 
 
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      $.ajax({
              
			  type:'POST',
			  
              url:'getalertme.php',
              success:function(result){
                  
				
			    if(result.includes('exists')){
			     Swal.fire('Updated Successfully')
			    }
               
               
                 
              }
			  
          }); 
		  
</script>









</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

