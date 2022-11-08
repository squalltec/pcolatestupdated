<?php
require_once('db_connection.php');


include('header.php');




 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Approved Discounts</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Rent a Car Companies</h5>
                    <div class="my-3 border-top"></div>
                    
                    <div class="accordion" id="accordionExample">
                    
                    
                        <?php
                    
                    $nn=0;
                   
                    
$sqllc ="SELECT * FROM newrentacarpricesdis WHERE approvedornot='approved' GROUP BY name";
		$resulttc = $conn->query($sqllc);

if ($resulttc->num_rows > 0) {
  // output data of each row
  while($rowwc = $resulttc->fetch_assoc()) {
	  
	?>
	<style>
	    .accordion-button:after {
	     backgound-image:url('') !important;   
	    }
	   
	   
	</style>
        
                    




                    
                   <a href='approveddiscounts2rc.php?hotel=<?php echo $rowwc['name']; ?>&country=<?php echo $rowwc['country']; ?>&city=<?php echo $rowwc['city']; ?>'>   <div class="accordion-item">
                    
                   <h2 class="accordion-header">
                          <button class="accordion-button" type="button">
                           <label>Hotel:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $rowwc['name'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                        
                        
                        
                        
                      
</div>
</a>

<?php
 $nn=$nn+1;
}
}
?>







              </div>
          </div><!--end row-->
         
     
     
     
     

     
     
     
     
     
     
    </div>


   
     
     <br/>
     <br/>


  </div>

</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>









<br/>
<br/>
<br/>
<br/>




</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

