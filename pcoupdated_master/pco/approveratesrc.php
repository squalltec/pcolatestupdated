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
    $price=$_POST['price'];
    $priceweekly=$_POST['priceweekly'];
    $pricemonthly=$_POST['pricemonthly'];
    
    $today=date("d/m/Y");
    $n=0;
    
    
    
    
    
    foreach($ida as $id)
    {
        
        $approve=$_POST['approve'.$n];
        
        if($approve=='on')
        {
           
          
         
        if($type[$n]=='Amount')
            
            {
                
                
                if($price[$n]!='' || $price[$n]!='0' )
                {
                   $slp= intval($markup[$n])+intval($price[$n]);
                   
                   
                }
                if($price[$n]=='' || $price[$n]=='0' )
                {
                    $slp='';
                }
                
                
                
                
                
                  if($priceweekly[$n]!='' || $priceweekly[$n]!='0' )
                {
                   $slpweekly= (intval($markup[$n])*7)+intval($priceweekly[$n]);
                   
                   
                   
                }
                if($priceweekly[$n]=='' || $priceweekly[$n]=='0' )
                {
                    $slpweekly='';
                }
                
                
               
                   
                  if($pricemonthly[$n]!='' || $pricemonthly[$n]!='0' )
                {
                   $slpmonthly= (intval($markup[$n])*30)+intval($pricemonthly[$n]);
                }
                if($pricemonthly[$n]=='' || $pricemonthly[$n]=='0' )
                {
                    $slpmonthly='';
                } 
                 
                
                
            }
            
            
            
            
           else if($type[$n]=='Percentage')
            
            {
                
                if($price[$n]!='' || $price[$n]!='0' )
                {
                  $per= (intval($price[$n])/100)* intval($markup[$n]);
                    
                   $slp= intval($per)+intval($price[$n]);
                }
                 if($price[$n]=='' || $price[$n]=='0' )
                 {
                    $slp='';
                }
                
                
                
                
                
                  if($priceweekly[$n]!='' || $priceweekly[$n]!='0' )
                {
                    
                    $dailyrate=intval($priceweekly[$n])/7;
                    
                    
                  $per2= (intval($dailyrate)/100)* intval($markup[$n]);
                  
                  $per=$per2*7;
                    
                   $slpweekly= intval($per)+intval($priceweekly[$n]);
                   
                }
                 if($priceweekly[$n]=='' || $priceweekly[$n]=='0' )
                 {
                    $slpweekly='';
                }
                
                
                
                
                
                
                
                    if($pricemonthly[$n]!='' || $pricemonthly[$n]!='0' )
                {
                    
                    
                   $dailyrate=intval($pricemonthly[$n])/30;
                    
                    
                  $per2= (intval($dailyrate)/100)* intval($markup[$n]);
                  
                  $per=$per2*30;  
                    
                    
                  $per= (intval($pricemonthly[$n])/100)* intval($markup[$n]);
                    
                   $slpmonthly= intval($per)+intval($pricemonthly[$n]);
                   
                   
                }
                 if($pricemonthly[$n]=='' || $pricemonthly[$n]=='0' )
                 {
                    $slpmonthly='';
                }
                
                
                
                
                
                
            }
            
            
        
        
$sql ="UPDATE newrentacarprices SET markupamount='$markup[$n]' , aorp='$type[$n]' , pricem='$slp',previousprice='$price[$n]',pricemweekly='$slpweekly',previouspriceweekly='$priceweekly[$n]',pricemmonthly='$slpmonthly',previouspricemonthly='$pricemonthly[$n]',approved='approved',approveddate='$today' WHERE id='$id'";

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
				
				<h6 style='margin-top:-100px;' class="mb-0 text-uppercase">Non Approved Rates of <?php echo $hotel;?></h6>
				<hr/>
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>Model</th>
										<th>Brand</th>
										<th>Year</th>
										<th>Country</th>
										<th>Price</th>
										<th>Price Weekly</th>
										<th>Price Monthly</th>
										<th>Approve</th>
										<th>Markup</th>
										<th>Amount/<br/>Percentage</th>
									</tr>
								</thead>
								<tbody>
								   
								   <tr style='border:1px red solid;'>
								       <td></td>
								        <td></td>
								         <td></td>
								          <td></td>
								           <td></td>
								            <td></td>
								             <td></td>
								              
								              
								       <td><label for='select-all'>Approve All</label><br/><input  type='checkbox' name='select-all' id='select-all'></td>
		<td><label>All Markup</label><br/><input style='border:1px red solid;' type='number' id='markup-all'></td>
								       
								       
		<td><select id='typer' style='border:1px red solid;' class='form-select'>
									        <option>Amount</option>
									         <option>Percentage</option>
									        </select>
									    </td>						       
								       
								       
								       
								       
								   </tr>
								   <?php
								   $an=0;
$sql ="SELECT * FROM newrentacarprices WHERE name='$hotel' && country='$country' && city='$city' && approved=''";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

	?>
								    
								    
								    
				<input name='idz[]' style='display:none;' value='<?php echo $row['id'];?>'>	 
				<input name='price[]' style='display:none;' value='<?php echo $row['price'];?>'>	  
				<input name='priceweekly[]' style='display:none;' value='<?php echo $row['priceweekly'];?>'>	
				<input name='pricemonthly[]' style='display:none;' value='<?php echo $row['pricemonthly'];?>'>	
							  
									<tr>
									    
										<td><?php echo $row['model'];?></td>
										<td>
										    <?php echo $row['brand'];?>
										</td>
										<td><?php echo $row['year'];?></td>	
										
									    <td><?php echo $row['country'];?></td>
									   
									    <td><?php echo $row['price'];?></td>
									   
									    <td><?php echo $row['priceweekly'];?></td>
									     
									     <td><?php echo $row['pricemonthly'];?></td>
									      
									    <td><input name='approve<?php echo $an;?>' type='checkbox'></td>
									    <td><input class='markupvalues' name='markup[]' class='form-control' type='number'></td>
									    <td><select name='type[]' class='selecter form-select'>
									        <option>Amount</option>
									         <option>Percentage</option>
									        </select>
									    </td>
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
		
		
		<input type='submit' style='float:right;' class='btn-danger btn' name='submit' value='Submit'>
		
		
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
		
		
		

<script>
    
    $("#typer").on("change", function(){
        
        var sel=document.getElementById("typer");
        
        
        
         var elements = document.querySelectorAll('.selecter');
    elements.forEach(function(element){
        element.selectedIndex = sel.selectedIndex;
    });
    
    
     
        
       
        
    })
    
    
    
    
    $("#markup-all").on("keyup", function(){
    var mk=document.getElementById('markup-all').value;
    
    
    var elements = document.querySelectorAll('.markupvalues');
    elements.forEach(function(element){
        element.value = mk;
    });

    
    
    
    
    
    
})
    
    
    
</script>
  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
 











</main>








 