<?php
require_once('db_connection.php');


include('header.php');

$getid=$_GET['id'];



$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





if (isset($_POST['postdiscount'])) {

  
  
  
   $name=$_POST['name'];
    $country=$_POST['country'];
     $city=$_POST['city'];
     
     $price=$_POST['price'];
     
      $brand=$_POST['brand'];
       $model=$_POST['model'];
        $year=$_POST['year'];
  
  
  $sdate=$_POST['sdate'];
  $edate=$_POST['edate'];
  
 
  
$dprice=$_POST['dprice'];	
$discountedvalue=$_POST['discountedvalue'];	
$ap=$_POST['ap'];	


$n=0;
foreach($sdate as $sd)
{
$sql2 = "INSERT INTO newrentacarpricesdis (name,country,city,brand,model,year,aidi,dprice,price,discount,ap,sdates,edates) VALUES ('$name','$country','$city','$brand','$model','$year','$getid','$discountedvalue','$price','$dprice','$ap','$sd','$edate[$n]')";


 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}
$n=$n+1;
}





 
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add Discount</h1>
              
              

<form action='#' method='POST'>

   <?php
              
               
$sqllvr="SELECT * FROM newrentacarprices WHERE id='$getid'";
		$resulttvr = $conn->query($sqllvr);

if ($resulttvr->num_rows > 0) {
  // output data of each row
  while($rowwvr = $resulttvr->fetch_assoc()) {
      
      
      $h=$rowwvr['name'];
      $co=$rowwvr['country'];
      $c=$rowwvr['city'];
      $b=$rowwvr['brand'];
      $m=$rowwvr['model'];
      $y=$rowwvr['year'];

?>
 
 <div class="container">
      <div class='row'>
   
   
       <div class="col-sm" style='display:none;'>
         <label>Country</label>
       <input id='country' name='country'  readonly value='<?php echo $rowwvr['country'];?>' class='form-control'>
        </div>
            
            
            <div class="col-sm" style='display:none;'>
         <label>City</label>
       <input id='city' name='city'  readonly value='<?php echo $rowwvr['city'];?>' class='form-control'>
        </div>
        
        <div class="col-sm" style='display:none;'>
         <label>Name</label>
       <input id='name' name='name'  readonly value='<?php echo $rowwvr['name'];?>' class='form-control'>
        </div>
        
        
        <div class="col-sm" style='display:none;'>
         <label>ID</label>
       <input id='id' name='id'  readonly value='<?php echo $rowwvr['id'];?>' class='form-control'>
        </div>
   
   
   
   
    <div class="col-sm">
         <label>Brand</label>
       <input id='brand' name='brand' readonly value='<?php echo $rowwvr['brand'];?>' class='form-control'>
        </div>
        
        
        
        
        <div class="col-sm">
         <label>Model</label>
       <input id='model' name='model' readonly value='<?php echo $rowwvr['model'];?>' class='form-control'>
         
       
        </div>
        <div class="col-sm">
         <label>Year</label>
       <input id='year' name='year' readonly value='<?php echo $rowwvr['year'];?>' class='form-control'>
                 </div>
              
          
        
           </div>
           </div>
           
           
           
           
           
             <br/></br/>
             <div class="container">
                  <div class="row">
                      <div class="col-sm"> 
                        <label>Starting Date</label>
                       </div>
                         <div class="col-sm"> 
                          <label>Ending Date</label>
                       </div>
                   
                   </div>
                   </div>
                      
             <div id='popalme' class="container">
                  <div class="row">
               
               
               <div class="col-sm">
                 
                   <input class='form-control' required name='sdate[]' type='date'>
                   </div>
                   
                    <div class="col-sm">
                       
                   <input class='form-control' required name='edate[]' type='date'>
                   </div>
                   
                   </div>
                   </div>
          <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 
           
           
           
           
           
           
           
            <br/></br/>
             <div class="container">
                  <div class="row">
               
               
               <div class="col-sm">
         <label>Price</label>
       <input id='price' name='price' readonly value='<?php echo $rowwvr['price'];?>' class='form-control'>
                 </div>   
                 
                <div class="col-sm">
         <label>Discount</label>
       <input id='dprice' type='number' required name='dprice' placeholder='Discount' class='form-control'>
                 </div>   
                        
                 <div class="col-sm">
         <label>Amount/ Percentage</label>
       <select id='ap' name='ap' class='form-select'>
           <option>Amount</option>
           <option>Percentage</option>
           </select>
                 </div>     
                 
                  </div>
           </div>
           
              <br/>
              
              <br/>
              <div class='container'>
                  <div class='row'>
                      <div class='col-sm'>
                          <labe>Discounted Price</labe>
                <input readonly id='discountedvalue' name='discountedvalue' class='form-control'>    
                      </div>
                  </div>
              </div>
            

     
        
  
  
  <br/>
  <br/>
 
  
  <button name='postdiscount' type='submit' class='btn btn-primary' style='float:right;' >Submit</button>
  
  </form>
  
   <br/>
  <br/> 
  
  
  
  
  
				
				<h6 class="mb-0 text-uppercase">Discounts</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>Starting Date</th>
										<th>Ending Date</th>
										<th>Full Price</th>
										<th>Discounted Price</th>
										<th>Discount</th>
										<th>Amount/ Percentage</th>
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
								   
							
$sql ="SELECT * FROM newrentacarpricesdis WHERE name='$h' && brand='$b' && model='$m' && year='$y' && country='$co' && city='$c' ORDER BY id DESC";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	 
	?>
								    
									<tr>
									<td><?php echo $row['sdates'];?></td>
										<td><?php echo $row['edates'];?></td>
										<td><?php echo $row['price'];?></td>
										<td><?php echo $row['dprice'];?></td>
										<td><?php echo $row['discount'];?></td>
										<td><?php echo $row['ap'];?></td>
									
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
		<?php
  }
}
  ?>
		
		



  
  
  
  
  
  
  
  
  
  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>












<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



var n=1;

function myFunction2() {

var popalme=document.getElementById('popalme');

var divr=document.createElement('div');
divr.classList.add('row');

var divc1=document.createElement('div');
divc1.classList.add('col-sm');

var divc2=document.createElement('div');
divc2.classList.add('col-sm');


var s=document.createElement('INPUT');
s.classList.add('form-control');
s.setAttribute('type','date');
s.setAttribute('name','sdate[]');
s.setAttribute('required','true');


var e=document.createElement('INPUT');
e.classList.add('form-control');
e.setAttribute('type','date');
e.setAttribute('name','edate[]');
e.setAttribute('required','true');


var del=document.createElement('BUTTON');
del.innerHTML='X';
del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
del.setAttribute('style','right:100px; position:absolute; width:50px;')



divc1.appendChild(s);
divc2.appendChild(e);

divr.appendChild(divc1);
divr.appendChild(divc2);
divr.appendChild(del);

popalme.appendChild(divr);





 n=n+1;
 
}

</script>

















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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
  	
$("#dprice").on('keyup', function() {
    
    var op=document.getElementById('price').value;
    var d=document.getElementById('dprice').value;
    var ap=document.getElementById('ap').value;
   
   
   
   
   if((ap=='Amount' && parseFloat(d)>parseFloat(op))|| (ap=='Percentage' && parseFloat(d)>100) )
   {
       document.getElementById('discountedvalue').value='';  
       swal.fire('Discount Cannot be more than price');
        document.getElementById('dprice').value='';  
   }
   else{
   
   
    if(d=='' || d=='0')
   {
     document.getElementById('discountedvalue').value='';  
   }
   else
   {
    if(ap=='Amount')
    {
      var t=parseFloat(op)-parseFloat(d); 
      document.getElementById('discountedvalue').value=t;
    }
    
      else if(ap=='Percentage')
    {
         var tt=(parseFloat(op)/100)*parseFloat(d); 
         var t=parseFloat(op)-tt;
         document.getElementById('discountedvalue').value=t;
    }
   }
   
    
   }
   
   
});
  
  
  
$("#ap").on('change', function() {
    
    var op=document.getElementById('price').value;
    var d=document.getElementById('dprice').value;
    var ap=document.getElementById('ap').value;
   
   
   
   
   if((ap=='Amount' && parseFloat(d)>parseFloat(op))|| (ap=='Percentage' && parseFloat(d)>100) )
   {
       document.getElementById('discountedvalue').value='';  
        document.getElementById('dprice').value='';  
       
       swal.fire('Discount Cannot be more than price');
       
   }
   else{
   
   
    if(d=='' || d=='0')
   {
     document.getElementById('discountedvalue').value='';  
     
   }
   else
   {
    if(ap=='Amount')
    {
      var t=parseFloat(op)-parseFloat(d); 
      document.getElementById('discountedvalue').value=t;
    }
    
      else if(ap=='Percentage')
    {
         var tt=(parseFloat(op)/100)*parseFloat(d); 
         var t=parseFloat(op)-tt;
         document.getElementById('discountedvalue').value=t;
    }
   }
   
    
   }
    
});  
  
  
  
    
	
$("#event").on('change', function() {
    
    
  const event = document.getElementById('event').value;
	
	var compy1=event;
	
	  $.ajax({
	      
              
			  type:'POST',
              url:'geteventdates.php',
              data:{'compy1':compy1},
			  
              success:function(result){
			
				
		
		result = jQuery.parseJSON(result);
				
				
				for(i=0; i<result.length; i++){

					sdate=result[i].sdate;
					edate=result[i].edate;
					
					

				}
				
				
				
				$("#sdate").val(sdate);
				$("#edate").val(edate);
	
		
			 
              
                 
              }
			  
          }); 
		  
		  
		
	
})

    
</script>







</main>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

