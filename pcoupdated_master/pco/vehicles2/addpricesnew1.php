<?php
require_once('db_connection.php');



include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






if (isset($_POST['submit'])) {
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];
    
/*    
    $delsql="DELETE from newvehicleprices WHERE name='$hotel' && country='$country' && city='$city'";
    if ($conn->query($delsql) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
  */
  
  

$areasactual=$_POST['areasactual'];
$brands=$_POST['brands'];
$models=$_POST['models'];
$price=$_POST['pricess'];


$fuel=$_POST['fuel'];
$chaffeur=$_POST['chaffeur'];
$insurance=$_POST['insurance'];
$salik=$_POST['salik'];
$vat=$_POST['vat'];
$waitingtime=$_POST['waitingtime'];

$idz=$_POST['idz'];




$n=0;
foreach($areasactual as $area)
{
    $a=0;
    foreach($brands as $brand)
    {
         


$sqlz2z="SELECT * FROM newvehicleprices WHERE name='$hotel'&& country='$country'&& city='$city'&& area='$area'&& model='$models[$a]' && brand='$brand'";

	$resultz2z = $conn->query($sqlz2z);

if ($resultz2z->num_rows > 0) {
    
 while($row2za = $resultz2z->fetch_assoc()) {
     
     $pp=$row2za['price'];
     
     if($pp==$price[$n])
     {
$sql ="UPDATE newvehicleprices SET price='$price[$n]' WHERE id='$idz[$n]'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

    else
     {
$sql ="UPDATE newvehicleprices SET price='$price[$n]' ,approved='' WHERE id='$idz[$n]'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}








}

}

else
{
    
        
       $sqla = "INSERT INTO newvehicleprices (name,country,city,area,model,brand,price,fuel,chaffeur,insurance,salik,vat,waitingtime)
           VALUES ('$hotel','$country','$city','$area','$models[$a]','$brand','$price[$n]','$fuel','$chaffeur','$insurance','$salik','$vat','$waitingtime')";
		  
 $resulta = $conn->query($sqla);


if ($resulta === TRUE) {

}
       
    
}





       
       
       
       
        $a=$a+1;
        $n=$n+1;
        
        
    }
}







}





 
 ?>
 
 

<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
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

  <title>PCO Connect Vehicle Rates</title>
</head>

<body>


       <!--start content-->
       <main class="page-content">
				<!--breadcrumb-->
			
				
				<h6 style='margin-top:-100px;' class="mb-0 text-uppercase"><?php echo $hotel;?></h6>
				<hr/>
					<form action='#' method='POST'>
					    
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						
						
					
							<table id="example2" class="table table-striped table-bordered">
								<thead>
								    <tr>
								        <h4>Trade Rate</h4>
								    </tr>
								    
									<tr>
									    <th>
									       <?php
									       
									       
									       
									       
									       $sql1="SELECT * FROM vehicleslogos WHERE hotel='$hotel' && country='$country' && city='$city'";

	$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
?>

<img src='../Vehicles Logos/<?php echo $hotel;?>/<?php echo $row1['image'];?>' style='width:50px; height:auto;'>

<?php
}
}
?>
									        
									        
									    </th>
									    <th>Transfers From <?php echo $city;?> To</th>
									    <?php
									    
									    $bds=array();
									    $mds=array();
									    
									    $acount=0;
$sql="SELECT * FROM vehiclesInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' && (type = 'Economy' || type = 'Bus')  GROUP BY seating";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $acount=$acount+1;
      array_push($bds,$row['brand']);
      array_push($mds,$row['model']);
?>

<th><?php echo $row['seating'].' Seater '.'(AED)';?></th>

<input style='display:none;' name='brands[]' value='<?php echo $row['brand'];?>'>
<input style='display:none;' name='models[]' value='<?php echo $row['model'];?>'>


<input style='display:block;' name='seating[]' value='<?php echo $row['seating'];?>'>




<?php



}
}


?>
										
										
									</tr>
									
									
								</thead>
								
								<tbody>
								    
								
								
								
								
	<?php
									    
									    
$sqlz="SELECT * FROM destination WHERE country='$country' && city='$city'";

	$resultz = $conn->query($sqlz);

if ($resultz->num_rows > 0) {
  // output data of each row
  while($rowz = $resultz->fetch_assoc()) {
    
    $areasall=$rowz['areas'];
    
  }
}

$areasactual2=array();
$areasactual=explode(',',$areasall);


$sqlz2z="SELECT * FROM countries WHERE country='$country'";

	$resultz2z = $conn->query($sqlz2z);

if ($resultz2z->num_rows > 0) {
  // output data of each row
  while($rowz2z = $resultz2z->fetch_assoc()) {
      
      $iso2=$rowz2z['iso2'];
      
  }
}


									    
$sqlz2="SELECT * FROM cities WHERE country_code='$iso2'";

	$resultz2 = $conn->query($sqlz2);

if ($resultz2->num_rows > 0) {
  // output data of each row
  while($rowz2 = $resultz2->fetch_assoc()) {
    $nnam=$rowz2['name'];
    if($nnam!=$city)
    {
array_push($areasactual,$rowz2['name']);
}

}
}




array_push($areasactual2,'Half Day (5 Hour)');
array_push($areasactual2,'Full Day (10 Hour)');
array_push($areasactual2,'Extra Hour');
array_push($areasactual2,'Inter Emirates');
array_push($areasactual2,'Waiting Time Charges');
?>






									


<?php









$an=0;
foreach ($areasactual as $ar)
{
?>							
						<input style='display:none;' name='areasactual[]' value='<?php echo $ar;?>'>
								
									<tr>
										<td></td>
										<td><?php echo $ar;?></td>
										
										<?php
									    for($i=0; $i<$acount; $i++)
									    {
									        ?>
									  <td>
									    <?php
									    
$sqlz2c="SELECT * FROM newvehicleprices WHERE name='$hotel' && country='$country' && city='$city' && area='$ar' && model='$mds[$i]' && brand='$bds[$i]'";

	$resultz2c = $conn->query($sqlz2c);

if ($resultz2c->num_rows > 0) {
   
  // output data of each row
  while($rowz2c = $resultz2c->fetch_assoc()) {
      
      ?>
      
      <input name='idz[]' style='display:none;' value='<?php echo $rowz2c['id'];?>'>
      <input type='number'  name='pricess[]' data-max='<?php echo $rowz2c['price'];?>' onchange='checkmax(this)' value='<?php echo $rowz2c['price'];?>' class='form-control'>
      <?php
  }
}
else
{
?>
<input type='number' name='pricess[]' class='form-control'>
<?php
}
									    ?>  
									      
									     
									     
									     
									     
									     
									  </td>
									        <?php
									        $an=$an+1;
									    }
									    ?>
										
										
									</tr>
	
	
	
												
<?php

}
?>






				











								
								
								
								
							
								
								</tbody>
								<tfoot>
									
								</tfoot>
							</table>
							
							
						</div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
					
							
						<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						
						
					
							<table id="example2" class="table table-striped table-bordered">
							    <thead>
							        <th>Day Rates</th>
							        
							        
							        
							         <?php
									    
									    $acount=0;
$sql="SELECT * FROM vehiclesInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY model";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $acount=$acount+1;
?>

<th><?php echo $row['brand'].' '.$row['model'].' '.'(AED)';?></th>

<?php



}
}


?>
		
							        
							        
							        
							        
							        
							        
							    </thead>
							    
							    
							    <tbody>
							        
							        
							        
							        
							        
							        
							        
							        
<?php









$an=0;
foreach ($areasactual2 as $ar)
{
?>							
						<input style='display:none;' name='areasactual[]' value='<?php echo $ar;?>'>
								
									<tr>
										
										<td><?php echo $ar;?></td>
										
										<?php
									    for($i=0; $i<$acount; $i++)
									    {
									        ?>
									  <td>
									      <?php
									    
$sqlz2c="SELECT * FROM newvehicleprices WHERE name='$hotel' && country='$country' && city='$city' && area='$ar' && model='$mds[$i]' && brand='$bds[$i]'";

	$resultz2c = $conn->query($sqlz2c);

if ($resultz2c->num_rows > 0) {
   
  // output data of each row
  while($rowz2c = $resultz2c->fetch_assoc()) {
      
      ?>
      <input name='idz[]' style='display:none;' value='<?php echo $rowz2c['id'];?>'>
      <input type='number'  name='pricess[]' data-max='<?php echo $rowz2c['price'];?>' onchange='checkmax(this)'  value='<?php echo $rowz2c['price'];?>' class='form-control'>
      <?php
  }
}
else
{
?>
<input type='number' name='pricess[]' class='form-control'>
<?php
}
									    ?>  
									      
									  </td>
									        <?php
									        $an=$an+1;
									    }
									    ?>
										
										
									</tr>
	
	
	
												
<?php

}
?>

							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							        
							       
							    </tbody>
							    
							    
							    
							</table>
							
				
					</div>
					</div>
				</div>
				
				
				
				 <?php
									    
$sqlz2c="SELECT * FROM newvehicleprices WHERE name='$hotel' && country='$country' && city='$city'";

	$resultz2c = $conn->query($sqlz2c);

if ($resultz2c->num_rows > 0) {
   
  // output data of each row
  while($rowz2c = $resultz2c->fetch_assoc()) {
      
      $vt=$rowz2c['vat'];
      $ch=$rowz2c['chaffeur'];
      $fu=$rowz2c['fuel'];
      $in=$rowz2c['insurance'];
      $sa=$rowz2c['salik'];
      $wt=$rowz2c['waitingtime'];
      
      }
      }
      ?>
		
				<br/>
				
				<div class='container'>
				    <h4 align='center'> Above Rates Includes: </h4>	
				    <br/>
				    <div class='row'>
				        <div class='col-sm'>
			<h4 align='center'>	
			
			<?php
			if($fu=='included')
			{
			    ?>
			    <input id='fuel'  onclick="return false;" checked value='included' name='fuel' type='checkbox'>
			    <?php
			}
			else
			{
			?>
			<input id='fuel' value='included' name='fuel' type='checkbox'>
			<?php
			}
			?>
			
			
				<label for='fuel'>Fuel</label>
				&nbsp;&nbsp;&nbsp;
				
			<?php
			if($ch=='included')
			{
			    ?>
			    <input id='chaffeur'  onclick="return false;" checked value='included' name='chaffeur' type='checkbox'>
			    <?php
			}
			else
			{
			?>
			<input id='chaffeur' value='included' name='chaffeur' type='checkbox'>
			<?php
			}
			?>
			<label for='chaffeur'>Chaffeur</label>
				&nbsp;&nbsp;&nbsp;
				
				
				
					<?php
			if($in=='included')
			{
			    ?>
			    <input id='insurance'  onclick="return false;" checked value='included' name='insurance' type='checkbox'>
			    <?php
			}
			else
			{
			?>
			<input id='insurance' value='included' name='insurance' type='checkbox'>
			<?php
			}
			?>
				
				
				
				
			<label for='insurance'>Vehicle Insurance</label>
			&nbsp;&nbsp;&nbsp;
			
			
				<?php
			if($sa=='included')
			{
			    ?>
			    <input id='salik'  onclick="return false;" checked value='included' name='salik' type='checkbox'>
			    <?php
			}
			else
			{
			?>
			<input id='salik' value='included' name='salik' type='checkbox'>
			<?php
			}
			?>
			
			
			
			<label for='salik'>Salik</label>
				&nbsp;&nbsp;&nbsp;
				
				
				
				
					<?php
			if($vt=='included')
			{
			    ?>
			    <input id='vat'  onclick="return false;" checked value='included' name='vat' type='checkbox'>
			    <?php
			}
			else
			{
			?>
			<input id='vat' value='included' name='vat' type='checkbox'>
			<?php
			}
			?>
				
				
				
				
				
			<label for='vat'>VAT</label>
				&nbsp;&nbsp;&nbsp;
				
				</h4>
				     </div>
				        
				    </div>
				</div>
				
				<br/><br/>
				
				<div class='container'>
				    <div class='row'>
				        <div class='col-sm'>
				            <h6>Complimentary Waiting Time</h6>
				            
				            <?php
				            if($wt!='')
				            {?>
				       <input type='text' readonly class='form-control' name='waitingtime' value='<?php echo $wt;?>' placeholder='Complimentary Waiting Time'>           
				          <?php
				          }
				            else
				            {
				            ?>
				        <input type='text' class='form-control' name='waitingtime' placeholder='Complimentary Waiting Time'>   
				        <?php
				            }
				            ?>
				        </div>
				        
				    </div>
				</div>
				
				<br/><br/>
				 
										      <input style='float:right;' name='submit' type='submit' class='btn btn-danger'>
										
				<br/><br/><br/><br/>
				
							</form>
			</main>
       <!--end page main-->


<script>
   function checkmax($this)
   {
       var changed= $this.value;
       var max= $this.getAttribute('data-max');
       if(changed>max)
       {
       alert('Increasing Price is Not Allowed');
       
       $this.value=max;
           
       }
   }
    
</script>




  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
 
  <script src="assets/js/table-datatable.js"></script>
	
  
</body>


</html>


