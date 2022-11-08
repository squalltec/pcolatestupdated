<?php

require_once('db_connection.php');

include('header.php');




$classic="";
$premium="";
$premiumplus="";
$clubroom="";
$premiumsuite="";
$familyroom="";



$c="";
$p="";
$pp="";
$cr="";
$ps="";
$fr="";




	
	

if (isset($_POST['submit'])) {
	
	
	
	
$c=$_POST['classicrooms'];
$p=$_POST['premiumrooms'];
$pp=$_POST['premiumplusrooms'];
$cr=$_POST['clubrooms'];
$ps=$_POST['premiumsuiterooms'];
$fr=$_POST['familyrooms'];


	
	
	
	
	
	
	
	
	
	$dates=array();
	$datee=array();
	
	// receive all data in an array
$fields = $_POST['sfield'];
$fielde = $_POST['efield'];
  
// output / process all data
foreach ($fields as $value) {
	
	array_push($dates,$value);
 
  
}

foreach ($fielde as $value) {
	
	array_push($datee,$value);
	
  
}






$sqlTpl = "INSERT INTO prices ( name , country, address , c,p,pp,cr,ps,fr, sdate , edate )
           VALUES (%s )";
		   
$sqlArr = array();

foreach( $dates as $k => $v )

  $sqlArr[] = '"'.$hn.'","'.$cn.'","'.$an.'" ,"'.$c.'" ,"'.$p.'" ,"'.$pp.'" ,"'.$cr.'" ,"'.$ps.'" ,"'.$fr.'" ,"'.$dates[$k].'" , "'.$datee[$k].'"';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );





 $result = $conn->query($sqlStr);


if ($result === TRUE) {
  echo "New record created successfully";
  


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}










}
 ?>
 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">
		  
		  


<div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">View Prices</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     

<?php	
					
				
					

		
		
		
$sqll ="SELECT * FROM hotels";
		$resultt = $conn->query($sqll);

 $a=0;
 
	
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  ?>
					  
					  
					  
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#collapse<?php echo $a;?>' aria-expanded="false" aria-controls="collapseTwo">
                            <?php 
							echo $roww['name']; 
							$naam=$roww['name']; 
							echo " - "; 
							echo $roww['country'];  
							$mulk=$roww['country']; 
							echo " - "; 
							echo $roww['location'];
							$jaga=$roww['location']; 
							?>
                          </button>
                        </h2>
                        <div id='collapse<?php echo $a; ?>' class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                          
						 	 <?php
						
						  
$sqlla ="SELECT * FROM setprices WHERE hotel='$naam' ";
		$resultta = $conn->query($sqlla);

 ?>
	 <table>
	  <thead>
	  <th>Type</th>
	   <th></th>
	  <th></th>
	  <th>Price</th>
	   <th></th>
	   <th></th>
	  <th>Starting Date</th>
	   <th></th>
	    <th></th>
	  <th>Ending Date</th>
	  </thead>
	  <tbody>
	  
	  <?php
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowww = $resultta->fetch_assoc()) {
	  ?>
	  	 
	  <tr>
	  <td align="center">   <?php echo $rowww['name']; ?> </td>
	  <td></td>
	   <td></td>
	   <td align="center" >   <?php echo $rowww['price']; ?> </td>
	    <td></td>
		 <td></td>
	    <td align="center">   <?php echo $rowww['sdate']; ?> </td>
		 <td></td>
		  <td></td>
		 <td align="center">   <?php echo $rowww['edate']; ?> </td>
	  
	  </tr>
	  
	  
	  
	 
	  
	  
	  
	  <?php
	  
	  
	  
	 
	  
	  
	  
	  
	  
	  
	  
	  
}}
	  ?>
                         
						
			 </tbody>
	  
	  
	  
	  </table>		
						
		


						 </div>
                        </div>
                      </div>
             
			 
			 
			 <?php
			 $a=$a+1;
}}
?>
			 
			 
                    </div>
                  </div>
                </div>

                

              </div>
          </div><!--end row-->
		  
		  
		  
		  
		  
		  
		  
 </br>
  </br>
   </br>

</main>









