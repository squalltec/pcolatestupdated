<?php
require_once('db_connection.php');


include('header.php');




$hotel=$_GET['hotel'];

$country=$_GET['country'];

$city=$_GET['city'];








if (isset($_POST['submit'])) {
    
    
    
    $ida=$_POST['idz'];
    
    $markup=$_POST['markup'];
    $type=$_POST['type'];
    $singleprice=$_POST['singleprice'];
    $doubleprice=$_POST['doubleprice'];
    
    $today=date("d/m/Y");
    $n=0;
    
    
    
    
    
    foreach($ida as $id)
    {
        
        $approve=$_POST['approve'.$n];
        
        if($approve=='on')
        {
           
          
         
        if($type[$n]=='Amount')
            
            {
                
                
                if($singleprice[$n]!='' || $singleprice[$n]!='0' )
                {
                   $slp= intval($markup[$n])+intval($singleprice[$n]);
                }
                if($singleprice[$n]=='' || $singleprice[$n]=='0' )
                {
                    $slp='';
                }
                
                
                
                 if($doubleprice[$n]!='' || $doubleprice[$n]!='0' )
                {
                   $dlp= intval($markup[$n])+intval($doubleprice[$n]);
                }
               if($doubleprice[$n]=='' || $doubleprice[$n]=='0' )
               {
                    $dlp='';
                }
                
                
            }
            
            
            
            
           else if($type[$n]=='Percentage')
            
            {
                
                if($singleprice[$n]!='' || $singleprice[$n]!='0' )
                {
                  $per= (intval($singleprice[$n])/100)* intval($markup[$n]);
                    
                   $slp= intval($per)+intval($singleprice[$n]);
                }
                 if($singleprice[$n]=='' || $singleprice[$n]=='0' )
                 {
                    $slp='';
                }
                
                
                
                 if($doubleprice[$n]!='' || $doubleprice[$n]!='0' )
                {
                   $doubleper= (intval($doubleprice[$n])/100)* intval($markup[$n]);
                    
                   $dlp= intval($doubleper)+intval($doubleprice[$n]);
                }
                 if($doubleprice[$n]=='' || $doubleprice[$n]=='0' )
                {
                    $dlp='';
                }
                
                
            }
            
            
       
$sql ="UPDATE setprices SET sellprice='$slp',dblsellprice='$dlp',previoussingle='$singleprice[$n]',previousdouble='$doubleprice[$n]',approved='approved',approveddate='$today' WHERE id='$id'";

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

			<form action='#' method='POST'>
				
				<h6 style='margin-top:-100px;' class="mb-0 text-uppercase">Approved Rates of <?php echo $hotel;?></h6>
				<hr/>
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>Country</th>
										<th>Brand</th>
										<th>Model</th>
										<th>Approved Price</th>
										<th>Fuel</th>
										<th>Chaffeur</th>
										<th>Insurance</th>
										<th>Salik</th>
										<th>VAT</th>
										<th>Waiting Time</th>
										<th>Price By Company</th>
										<th>Approved Date</th>
										
									
									</tr>
								</thead>
								<tbody>
							
								   <?php
								   $an=0;
$sql ="SELECT * FROM newvehicleprices WHERE name='$hotel' && country='$country' && city='$city' && approved='approved'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
								    
								    
							
									<tr>
									    
										<td><?php echo $row['country'];?></td>
										<td>
										    <?php echo $row['brand'];?>
										</td>
										<td>
										    <?php echo $row['model'];?>
										</td>	
									    <td>
									        <?php echo $row['price'];?>
									    </td>
									    <td><?php echo $row['fuel'];?></td>
									    <td><?php echo $row['chaffeur'];?></td>
									    <td><?php echo $row['insurance'];?></td>
									    <td><?php echo $row['salik'];?></td>
									    <td><?php echo $row['vat'];?></td>
									    <td><?php echo $row['waitingtime'];?></td>
									    <td><p><?php echo $row['previousprice'];?></p></td>
									    <td><?php echo $row['approveddate'];?></td>
									  
									</tr>
								
								<?php
								
								$an=$an+1;
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		
		
		
		</form>
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		
		
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








 