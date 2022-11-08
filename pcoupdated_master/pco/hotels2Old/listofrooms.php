<?php
require_once('db_connection.php');


include('header.php');



$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

 
 ?>
 
 


  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <body>

<style>
    .btn-primary
    {
        background-color:#dc3545;
    }
    .btn-primary:hover
    {
        background-color:#dc3545;
    }
    .btn-primary:focus
    {
        background-color:#dc3545;
    }
</style>





       <!--start content-->
       <main class="page-content">
				<!--breadcrumb-->
			
				
				<h6 class="mb-0 text-uppercase">Rooms</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Room Types</th>
										<th>Room Description</th>
										<th>Room Size</th>
										<th>Amenities</th>
										<th>Pictures</th>
										
									</tr>
								</thead>
								<tbody>
								
								
				<?php
				         
				         $modalcount=0;
				         $modalcountfacilities=0;
				           
$sqll ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      ?>
									<tr>
										<td><?php echo $roww['type'];?></td>
										<td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $modalcount;?>">
  Description
</button></td>
										<td><?php echo $roww['roomsize'];?></td>
										<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterfac<?php echo $modalcountfacilities;?>">
  Amenities
</button></td>
										<td> 
										
										
										
			<?php
			$rmtype=$roww['type'];
			$sqllm ="SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$rmtype'";
		$resulttm = $conn->query($sqllm);

if ($resulttm->num_rows > 0) {
  // output data of each row
  while($rowwm = $resulttm->fetch_assoc()) {
  
  ?>
										
										
<img style='max-width:50px;' src='../Room Uploads/<?php echo $hotel;?>/<?php echo $rmtype;?>/<?php echo $rowwm['image'];?>'>					
					<?php
  }
					
  }
								?>		
										
										</td>
										
									</tr>
							







<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $modalcount;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p><?php echo $roww['singledescription'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModalCenterfac<?php echo $modalcountfacilities;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Amenities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class='row'>
         
         
         <div class='col-sm'>
     <?php 
     if($roww['inroomfacilities']!=='')
     {
         $rm=explode(',',$roww['inroomfacilities']);
         
         echo '<h5>In Room Facilities:</h5>';
         foreach($rm as $r)
         {
     echo $r.'<br/>';
         }
     }
     
     ?>
     </div>
     
     
      <div class='col-sm'>
     <?php 
     if($roww['kitchenfacilities']!=='')
     {
         $rm=explode(',',$roww['kitchenfacilities']);
         
         echo '<h5>Kitchen Facilities:</h5>';
         foreach($rm as $r)
         {
     echo $r.'<br/>';
         }
     }
     
     ?>
     </div>
     
     </div>
     
     <br/>
     
     
     
     <div class='row'>
     
       <div class='col-sm'>
     <?php 
     if($roww['privatebathroomfacilities']!=='')
     {
         $rm=explode(',',$roww['privatebathroomfacilities']);
         
         echo '<h5>Private Bathroom Facilities:</h5>';
         foreach($rm as $r)
         {
     echo $r.'<br/>';
         }
     }
     
     ?>
     </div>
     
     
     <div class='col-sm'>
     <?php 
     if($roww['complimentaryfacilities']!=='')
     {
         $rm=explode(',',$roww['complimentaryfacilities']);
         
         echo '<h5>Complimentary Facilities:</h5>';
         foreach($rm as $r)
         {
     echo $r.'<br/>';
         }
     }
     
     ?>
     </div>
     
      </div>
      
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>





	
								<?php
								
								$modalcount=$modalcount+1;
								$modalcountfacilities=$modalcountfacilities+1;
  }
}
?>







								
								</tbody>
						
							</table>
						</div>
					</div>
				</div>
			</main>
       <!--end page main-->











<br/>
<br/>
<p align='center'><a href='addinventory2.php'><button class='btn btn-danger'>Add More Rooms</button></a></p>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





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

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

