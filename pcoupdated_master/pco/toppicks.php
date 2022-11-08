<?php
require_once('db_connection.php');


include('header.php');




if (isset($_POST['best'])) {
    
    
    
    
    $sqlna = "DELETE FROM bestdeal";

if ($conn->query($sqlna) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
    
    
    
    $ida=$_POST['idz'];
   
    $n=0;
    
    
    
    
    
    foreach($ida as $id)
    {
        
        $approve=$_POST['approve'.$n];
        
        if($approve=='on')
        {
            
            
       
$sql ="INSERT INTO bestdeal (carid) VALUES ('$id')";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        $n=$n+1;
        
       
    }
    
    
    
}







if (isset($_POST['most'])) {
    
    
    
    
    $sqlna = "DELETE FROM mostbooked";

if ($conn->query($sqlna) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
    
    
    
    $ida=$_POST['idz'];
   
    $n=0;
    
    
    
    
    
    foreach($ida as $id)
    {
        
        $approve=$_POST['approve'.$n];
        
        if($approve=='on')
        {
            
            
       
$sql ="INSERT INTO mostbooked (carid) VALUES ('$id')";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        $n=$n+1;
        
       
    }
    
    
    
}










if (isset($_POST['submit'])) {
    
    
    
    
    $sqlna = "DELETE FROM toppicks";

if ($conn->query($sqlna) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
    
    
    
    $ida=$_POST['idz'];
   
    $n=0;
    
    
    
    
    
    foreach($ida as $id)
    {
        
        $approve=$_POST['approve'.$n];
        
        if($approve=='on')
        {
            
            
       
$sql ="INSERT INTO toppicks (carid) VALUES ('$id')";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        $n=$n+1;
        
       
    }
    
    
    
}










 ?>
 
 


          <main class="page-content">
   









  <!--plugins-->
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

<style>
    tr:hover {
  background-color: #dc3545 !important;
   color: white !important;
}
</style>
			<form action='#' method='POST'>
				
				<h3 align='center' style='margin-top:-100px;' class="mb-0 text-uppercase">Select for Top Picks</h3>
				<hr/>
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
									    <th>Select</th>
									    <th>Company</th>
										<th>Brand</th>
										<th>Model</th>
										<th>Year</th>
										
									
									</tr>
								</thead>
								<tbody>
							
								   <?php
								   $an=0;
								   $cntr=0;
$sql ="SELECT * FROM rentacarInventorydatabase";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
								    
								    
						<input style='display:none;' name='idz[]' value='<?php echo $row['id'];?>'>	
								
								
								
								<tr>
									  
									  	<td>
								<?php
								$padi=$row['id'];
								$sqlm ="SELECT * FROM toppicks WHERE carid='$padi'";
		$resultm = $conn->query($sqlm);
	
if ($resultm->num_rows > 0) {
 
	?>
								
								
							 	    
									  	    
										   <input type='checkbox' checked id='approve<?php echo $cntr;?>' name='approve<?php echo $cntr;?>'>
										   
								<?php
}
else
{
?>
	<input type='checkbox' name='approve<?php echo $cntr;?>'>									   
			<?php
}
			?>
										   
										   
										</td>  
									
									<td>
										    <?php echo $row['hotel'];?>
										</td>
										<td>
										    <?php echo $row['brand'];?>
										</td>
										<td>
										    <?php echo $row['model'];?>
										</td>	
										<td>
										    <?php echo $row['year'];?>
										</td>
											
									  
									</tr>
								
								<?php
								
								$an=$an+1;
								$cntr=$cntr+1;
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		<button type='submit' name='submit' class='btn btn-danger' style='float:right;'>Submit</button>
		
		
		</form>
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
			<form action='#' method='POST'>
				
				<h3 align='center' style='margin-top:-100px;' class="mb-0 text-uppercase">Select for Most Booked Vehicles</h3>
				<hr/>
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
									<th>Select</th>
									<th>Company</th>
										<th>Brand</th>
										<th>Model</th>
										<th>Year</th>
									
									
									</tr>
								</thead>
								<tbody>
							
								   <?php
								   $an=0;
								   $cntr=0;
$sql ="SELECT * FROM rentacarInventorydatabase";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
								    
								    
						<input style='display:none;' name='idz[]' value='<?php echo $row['id'];?>'>	
									<tr>
									  
									  	<td>
								<?php
								$padi=$row['id'];
								$sqlm ="SELECT * FROM mostbooked WHERE carid='$padi'";
		$resultm = $conn->query($sqlm);
	
if ($resultm->num_rows > 0) {
 
	?>
								
								
							 	    
									  	    
										   <input type='checkbox' checked name='approve<?php echo $cntr;?>'>
										   
								<?php
}
else
{
?>
	<input type='checkbox' name='approve<?php echo $cntr;?>'>									   
			<?php
}
			?>
										   
										   
										</td>  
										<td>
										    <?php echo $row['hotel'];?>
										</td>
										<td>
										    <?php echo $row['brand'];?>
										</td>
										<td>
										    <?php echo $row['model'];?>
										</td>	
										<td>
										    <?php echo $row['year'];?>
										</td>
										
									  
									  
									  
								
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									</tr>
								
								<?php
								
								$an=$an+1;
								$cntr=$cntr+1;
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		<button type='submit' name='most' class='btn btn-danger' style='float:right;'>Submit</button>
		
		
		</form>
		
		
		
		
		
		
		
		
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
			<form action='#' method='POST'>
				
				<h3 align='center' style='margin-top:-100px;' class="mb-0 text-uppercase">Select for Best Deals</h3>
				<hr/>
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
									<th>Select</th>
									<th>Company</th>
										<th>Brand</th>
										<th>Model</th>
										<th>Year</th>
									
									<th>Starting Date</th>
												<th>Ending Date</th>
										<th>Price</th>
										<th>Discounted Price</th>
										<th>Markup</th>
										<th>Amount/ Percentage</th>
										<th>Price After Markup</th>
										<th>Approved Date</th>
									</tr>
								</thead>
								<tbody>
							
								   <?php
								   $an=0;
								   $cntr=0;
$sql ="SELECT * FROM newrentacarpricesdis WHERE approvedornot='approved'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
								    
								    
						<input style='display:none;' name='idz[]' value='<?php echo $row['id'];?>'>	
									<tr>
									  
									  	<td>
								<?php
								$padi=$row['id'];
								$sqlm ="SELECT * FROM bestdeal WHERE carid='$padi'";
		$resultm = $conn->query($sqlm);
	
if ($resultm->num_rows > 0) {
 
	?>
								
								
							 	    
									  	    
										   <input type='checkbox' checked name='approve<?php echo $cntr;?>'>
										   
								<?php
}
else
{
?>
	<input type='checkbox' name='approve<?php echo $cntr;?>'>									   
			<?php
}
			?>
										   
										   
										</td>  
										<td>
										    <?php echo $row['name'];?>
										</td>
										<td>
										    <?php echo $row['brand'];?>
										</td>
										<td>
										    <?php echo $row['model'];?>
										</td>	
										<td>
										    <?php echo $row['year'];?>
										</td>
										
									  
									  
									  
									  
									  	  
									  
							<td>
										    <?php echo $row['sdates'];?>
										</td>
											<td>
										    <?php echo $row['edates'];?>
										</td>
										  <td><?php echo $row['price'];?></td>
										  <td><?php echo $row['dprice'];?></td>
										<td>
										    <?php echo $row['markup'];?>
										</td>	
										<td>
										    <?php echo $row['amorper'];?>
										</td>	
										
										
									<td>
										    <?php 
										    
										   if($row['amorper']=='Amount')
										    {
										     echo intval($row['dprice'])+intval($row['markup']);  
										    }
										   else if($row['amorper']=='Percentage')
										    {
										     echo intval($row['dprice'])+(intval($row['dprice'])/100)*intval($row['markup']);  
										    }
										    
										    ?>
										</td>		
										
										
										
										
										
										
									   
									    <td><?php echo $row['approveddate'];?></td>
									  			  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									</tr>
								
								<?php
								
								$an=$an+1;
								$cntr=$cntr+1;
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		<button type='submit' name='best' class='btn btn-danger' style='float:right;'>Submit</button>
		
		
		</form>
		
		
		
		
		
		
		
		
		
		
<script>
    $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
</script>		
		
		
		


  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
 











</main>








 