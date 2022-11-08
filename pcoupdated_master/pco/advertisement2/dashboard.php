<?php
session_start();
include 'header.php';
include 'db_connection.php';

$hotel=$_SESSION['hotel'];

?>





       <!--start content-->
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

				
<!--				
	<select class='form-select'>
	    <option>Daily</option>
	    <option>Weekly</option>
	    <option>Monthly</option>
	</select>			
				
	-->		
			<br/>	
				
				
				
				
				
				
				
				
				
				
			  <?php
	
	$countrieschart=array();
								   
$sql ="SELECT * FROM adsviewed  WHERE company='".$_SESSION['hotel']."'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      
  array_push($countrieschart, $row['country']);
    
      
  }
}




$allcountrykeys=array();

$allcountries=array();

$vals = array_count_values($countrieschart);
foreach($vals as $key => $vl) {
  
  
  array_push($allcountrykeys,$key);
  array_push($allcountries,$vl);
   
    
}



	?>	
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				


  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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


            <div class="row">
              <div class="col-xl-10 mx-auto">
            
            
            
            
                <h6 class="mb-0 text-uppercase">Chart</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div id="chart8"></div>
                  </div>
                </div>
                
                
                
                
              </div>
            </div><!--end row-->

         
		
				
		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		
  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>
  
  
  
  
  
  
  
  
  
  
  <script>
      
	// chart 8
	
	var ck= <?php echo json_encode($allcountrykeys); ?>;
		var cc= <?php echo json_encode($allcountries); ?>;
	
	
	var options = {
		series: cc,
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6c757d", "#17a00e", "#f41127","#FFFF00","#FFA500","#808080","#FFC0CB"],
		labels: ck,
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart8"), options);
	chart.render();
	
	
  </script>
  
  
  
  
  
  <!--app-->
  <script src="assets/js/app.js"></script>
		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<h6 class="mb-0 text-uppercase">Ads Traffic</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Company</th>
										<th>Country</th>
										<th>Side</th>
										<th>Date</th>
										<th>Time</th>
									
									
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
$sql ="SELECT * FROM adsviewed WHERE company='".$_SESSION['hotel']."'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
									<tr>
									
										<td><?php echo $row['company'];?></td>
										<td><?php echo $row['country'];?></td>
										<td><?php echo $row['side'];?></td>
										<td><?php echo $row['date'];?></td>
										<td><?php echo $row['time'];?></td>
									
									
									</tr>
								
								<?php
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			
				<h6 class="mb-0 text-uppercase">Summarized</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Company</th>
									
										<th>Left Ad Clicks</th>
										<th>Right Ad Clicks</th>
										
									
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
								   
$sql ="SELECT * FROM adsviewed  WHERE company='".$_SESSION['hotel']."' GROUP BY company";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

$leftadclicks=0;
$rightadclicks=0;

$sql2 ="SELECT * FROM adsviewed WHERE company='".$row['company']."'";
		$result2 = $conn->query($sql2);
	
if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
      
      
     if($row2['side']=='left')
     
     {
         $leftadclicks=$leftadclicks+1;
     }
       if($row2['side']=='right')
     
     {
         $rightadclicks=$rightadclicks+1;
     }
     
     
     
     
  }
}


	?>
								    
									
									
										<tr>
									
										<td><?php echo $row['company'];?></td>
											<td><?php echo $leftadclicks;?></td>
												<td><?php echo $rightadclicks;?></td>
										
										</tr>
									
									
									
									
									
									
									
									
									
								
								<?php
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		
		


  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>
	








		  
		  
            
</main>