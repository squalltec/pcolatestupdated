<?php
session_start();
include 'header.php';

$hotel=$_SESSION['hotel'];

?>





       <!--start content-->
          <main class="page-content">
		  
		  
		  
		 <?php
		 
$sqll ="SELECT * FROM hotelsdatabase WHERE name='$hotel'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {


               
}
else{
    ?>
    
         <div class="col">
               <a href='setup.php'><h1 align='center'>
                <div class="card overflow-hidden radius-10">
                 
                    <div class="card-body">
                    
                     <div style='font-size:2vw;' class="w-50">
                     Setup Hotel
                      </div>
                   
                 
                  </div>
                </div>
                 </h1></a>
               </div>
    
    
    <?php
    
}
               ?>
			  
		  
		  
            
</main>