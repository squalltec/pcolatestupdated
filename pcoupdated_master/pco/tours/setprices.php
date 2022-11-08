<?php
require_once('db_connection.php');


include('header.php');



$getid=$_GET['id'];



  $sqlvconzq ="SELECT * FROM vehicleprices WHERE vehicle='$getid'";
		$resultvconzq = $conn->query($sqlvconzq);

if ($resultvconzq->num_rows > 0) {
  // output data of each row
  while($rowvconzq = $resultvconzq->fetch_assoc()) {
      
      $half=$rowvconzq['halfdayprice'];
      $full=$rowvconzq['fulldayprice'];
      $extra=$rowvconzq['extrahour'];
     
      
  }
}










  $sqlvconz ="SELECT * FROM vehiclesInventorydatabase WHERE id='$getid'";
		$resultvconz = $conn->query($sqlvconz);

if ($resultvconz->num_rows > 0) {
  // output data of each row
  while($rowvconz = $resultvconz->fetch_assoc()) {
      
      
      $bran= $rowvconz['brand'];
      $mode= $rowvconz['model'];
      $yea= $rowvconz['year'];
  }
}












$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	



       $sqlvcon ="SELECT * FROM countries WHERE country='$country'";
		$resultvcon = $conn->query($sqlvcon);

if ($resultvcon->num_rows > 0) {
  // output data of each row
  while($rowvcon = $resultvcon->fetch_assoc()) {
      
      
      $iso2= $rowvcon['iso2'];
  }
}












if (isset($_POST['submit'])) {
    
    
    
$fromarea=$_POST['from'];   
$toarea=$_POST['to']; 
$price=$_POST['price'];  
$parkingprice=$_POST['parkingprice'];  
$pagingprice=$_POST['pagingprice'];  
$country=$_SESSION['country']; 
$city1=$_POST['city1']; 
$city2=$_POST['city2']; 
$half=$_POST['halfdayprice']; 
$full=$_POST['fulldayprice']; 
$extrahour=$_POST['extrahour']; 





foreach ($fromarea as $value) {
    
  
  
  
$sql1 ="SELECT * FROM destination WHERE country='$country' && city='$city1'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
   while($row1 = $result1->fetch_assoc()) {
       
       $attractions=$row1['attractions'];
       $areas=$row1['areas'];
       $airports=$row1['airports'];
       
   }
	    
	  }
	  
	 
	  if(strpos($attractions,$value)!==false || strpos($areas,$value)!==false || strpos($airports,$value)!==false)
	  
	  {
	      
	  }
	  
	  else{
	      
	       if($areas!==''){
	      $new=$areas.','.$value;
	      }
	      else{
	         $new=$value; 
	      }
	      
	      	    
$sqlbb="UPDATE destination SET areas='$new' WHERE country='$country' && city='$city1'";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  //echo "Category created successfully";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  















}











foreach ($toarea as $value) {
    
  
  
  
$sql1 ="SELECT * FROM destination WHERE country='$country' && city='$city2'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
   while($row1 = $result1->fetch_assoc()) {
       
       $attractions=$row1['attractions'];
       $areas=$row1['areas'];
       $airports=$row1['airports'];
       
   }
	    
	  }
	  
	 
	  if(strpos($attractions,$value)!==false || strpos($areas,$value)!==false || strpos($airports,$value)!==false)
	  
	  {
	      
	  }
	  
	  else{
	      if($areas!==''){
	      $new=$areas.','.$value;
	      }
	      else{
	         $new=$value; 
	      }
	      	    
$sqlbb="UPDATE destination SET areas='$new' WHERE country='$country' && city='$city2'";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  //echo "Category created successfully";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  















}



















$n=0;
foreach($fromarea as $value){
    
	   	    
$sqlbb="INSERT INTO vehicleprices (name,country,city,city1,city2,area1,area2,price,halfdayprice,fulldayprice,vehicle,extrahour,parkingprice,pagingprice) VALUES ('$hotel','$country','$city','$city1','$city2','$value','$toarea[$n]','$price[$n]','$half','$full','$getid','$extrahour','$parkingprice[$n]','$pagingprice[$n]')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
  
  $n=$n+1;   
	 
}








	      


}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              
              
              <form action='#' method='POST'>
              
        <input name='countryname' id='countryname' style='display:none;' value='<?php echo $country;?>'>      
              
              
              
              
              
              
              
              
              
              
              

<h1> Set Prices for <small><?php echo $bran;echo ' ';echo $mode;echo ' (';echo $yea;echo ')';?></small> </h1>
<br/>

<div class='container'>
    <div class='row'>
        
        <div class='col-sm'>
             <label>From City</label>
          <select name='city1' id='city1' class='form-control'>  
          <option disabled selected>Select City</option>
             <?php
       $sqlv ="SELECT * FROM cities WHERE country_code='$iso2'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      ?>
      
      <option><?php echo $rowv['name'];?></option>
      <?php
      
      
  }
}
      ?>
         
          
          
          
          
          </select>
        </div>
        
     
     
     
     
            <div class='col-sm'>
                <label>To City</label>
          <select name='city2' id='city2' class='form-control'>  
           <option disabled selected>Select City</option>
             <?php
       $sqlv ="SELECT * FROM cities WHERE country_code='$iso2'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      ?>
      
      <option><?php echo $rowv['name'];?></option>
      <?php
      
      
  }
}
      ?>
         
          
          
          </select>
        </div>
        
        
       
       
      
        
        
    </div>
</div>


<br/><br/>


<div class='container'>
    <div class='row'>
        
          <div class='col-sm'>
              <label>Half Day Price</label>
             <input name='halfdayprice' value='<?php echo $half;?>' class='form-control' required placeholder='Half Day Price'>
              </div>
              
              <div class='col-sm'>
              <label>Full Day Price</label>
              <input name='fulldayprice' value='<?php echo $full;?>' class='form-control' required placeholder='Full Day Price'>
              </div>
              
              
               
              <div class='col-sm'>
              <label>Extra Hour Price</label>
              <input name='extrahour' value='<?php echo $extra;?>' class='form-control' required placeholder='Extra Hour Price'>
              </div> 
              
              
              
              
              
              </div>
              </div>
              
              <br/><br/>




<div class='container'>
    <div class='row'>
        
          <div class='col-sm'>
             <label>From Area</label>
         
        </div>
            
             <div class='col-sm'>
              <label>To Area</label>
            
         
        </div>
            
             <div class='col-sm'>
              <label>Price</label>
             
       
        </div>
        
         <div class='col-sm'>
              <label>Parking Charges <small><br/>(if applicable)</small></label>
             
       
        </div>
        
        <div class='col-sm'>
              <label>Paging Charges <small><br/>(if applicable)</small></label>
             
       
        </div>
        
            </div>
            </div>



<div id='0' class='container'>
    <div class='row'>
        
          <div class='col-sm'>
            
          <select onchange="alif(this)" id='ff' name='from[]' class='form-control' required>
              </select>
              
        </div>
            
             <div class='col-sm'>
           
             <select onchange="alif(this)" name='to[]' id='tt' class='form-control' required>
         </select>
        </div>
            
             <div class='col-sm'>
             
             
         <input name='price[]' class='form-control' placeholder='Price' type='number'>
        </div>
        
        
         <div class='col-sm'>
             
             
         <input name='parkingprice[]' class='form-control' placeholder='Parking Charges' type='number'>
        </div>
        
            <div class='col-sm'>
             
             
         <input name='pagingprice[]' class='form-control' placeholder='Paging Charges' type='number'>
        </div>
        
            </div>
            <nonsence id='dis'>
                
            </nonsence>
            </div>

<input style='display:none;' id='fromval' type='text'>
<input style='display:none;' id='toval' type='text'>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


function alif(abc){
   
    
    var pn=abc.parentNode.parentNode.parentNode;
    
    var pid=abc.parentNode.parentNode.parentNode.id;
    
     var pr=document.getElementById(pid);
    
    
  if(abc.id=='ff'){
      var f= document.getElementById('fromval');
      f.value=abc.value;
      
      
      
      
      
      
  }
  
  if(abc.id=='tt'){
      
      var t= document.getElementById('toval');
      t.value=abc.value;
      
      var f= document.getElementById('fromval').value;
      
      
      
      
      
                    
 $.ajax({
              type:'POST',
              url:'../loginExample.php',
              data:{'loc1':f,'loc2':abc.value},
             
                    
             

			 success:function(result){
                
               var objJSON = JSON.parse(result);
                
                 var full=objJSON[2]+" "+objJSON[3];
                 
                 pn.querySelector("#dis").innerHTML ='';
                
                //pr.innerHTML=pr.innerHTML+full;
               
                pn.querySelector("#dis").innerHTML = full;
                      
                  }
                 
                 
          }); 
      
      
      
      
      
  }
 
};


</script>






<nonsense id='addnc'>
    
</nonsense>
<br/>
<h1 align='center'>
<input class='btn btn-primary' type='submit' id='pds' onclick='addcardnew()' value='+'>
</h1>


<input type='submit' name='submit' value='Submit' class='btn btn-primary' style='float:right;'>
</form>
  
  <br/><br/>
<script>
    document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});

var nn=1;
function addcardnew(){
     var parent=document.getElementById("addnc");
     
     
    
   var div1=document.createElement('div');
   div1.classList.add("container");
   div1.setAttribute('id',nn);
   
   
   var nonse=document.createElement('nonsense'); 
   nonse.setAttribute('id','dis');
   
   
   
   
   
   
   
   nn=nn+1;
    
    var div2=document.createElement('div');
   div2.classList.add("row");
   
   var div3=document.createElement('div');
   div3.classList.add("col-sm");
   
   var div4=document.createElement('div');
   div4.classList.add("col-sm");
   
   var div5=document.createElement('div');
   div5.classList.add("col-sm");
   
   var div6=document.createElement('div');
   div6.classList.add("col-sm");
   
   var div7=document.createElement('div');
   div7.classList.add("col-sm");
   
   
   var br=document.createElement('br');
   
  var listf=document.getElementById('from');
   var listt=document.getElementById('to');
   
   
   var inpt1=document.createElement('SELECT');
   inpt1.setAttribute('name','from[]');
   inpt1.setAttribute('id','ff');
   inpt1.setAttribute('class','form-control');
   inpt1.setAttribute('onchange','alif(this)');
   inpt1.innerHTML=listf.innerHTML;
   
 
   
   var inpt2=document.createElement('SELECT');
   inpt2.setAttribute('name','to[]');
   inpt2.setAttribute('id','tt');
   inpt2.setAttribute('class','form-control');
   inpt2.setAttribute('onchange','alif(this)');
   inpt2.innerHTML=listt.innerHTML;
   
   
   
   var inpt3=document.createElement('INPUT');
   inpt3.setAttribute('name', 'price[]');
   inpt3.setAttribute('class','form-control');
   inpt3.setAttribute('placeholder','Price');
   inpt3.setAttribute('type','number');
   inpt3.setAttribute('min','0');
   
     var inpt4=document.createElement('INPUT');
   inpt4.setAttribute('name', 'parkingprice[]');
   inpt4.setAttribute('class','form-control');
   inpt4.setAttribute('placeholder','Parking Charges');
   inpt4.setAttribute('type','number');
   inpt4.setAttribute('min','0');
   
   
     var inpt5=document.createElement('INPUT');
   inpt5.setAttribute('name', 'pagingprice[]');
   inpt5.setAttribute('class','form-control');
   inpt5.setAttribute('placeholder','Paging Charges');
   inpt5.setAttribute('type','number');
   inpt5.setAttribute('min','0');
   
   
   
   
   div3.appendChild(inpt1);
   div4.appendChild(inpt2);
   div5.appendChild(inpt3);
    div6.appendChild(inpt4);
     div7.appendChild(inpt5);
   
   
   
   div2.appendChild(div3);
    div2.appendChild(div4);
     div2.appendChild(div5);
       div2.appendChild(div6);
         div2.appendChild(div7);
   div1.appendChild(div2);
   div1.appendChild(nonse);
   parent.appendChild(br);
   parent.appendChild(div1);
   
   
   
   
   
   
    
}
</script>
  


















 <datalist id='to'>
              
              </datalist>  



<datalist id='from'>
              
              </datalist>  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
 $("#city1").change(function(event)
  { 
   var country=document.getElementById('countryname').value;
       var city=document.getElementById('city1').value;
              
  
  
  
   $.ajax({
      
             
			  type:'POST',
			  
              url:'getareas.php',
		data:{'country':country,'city':city},
              success:function(result){
                  
				var from=document.getElementById('from');
				from.innerHTML=result;
				ff.innerHTML=result;
			 
               
                 
              }
			  
          });
      
    
    
    
  });




</script>






<script>
    
 $("#city2").change(function(event)
  { 
   var country=document.getElementById('countryname').value;
       var city=document.getElementById('city2').value;
              
  
  
   $.ajax({
      
             
			  type:'POST',
			  
              url:'getareas.php',
		data:{'country':country,'city':city},
              success:function(result){
                 
				var to=document.getElementById('to');
				to.innerHTML=result;
			 tt.innerHTML=result;
               
                 
              }
			  
          });
      
    
    
    
  });




</script>





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


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

