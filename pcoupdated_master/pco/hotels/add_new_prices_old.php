<?php
require_once('db_connection.php');


include('header.php');

$star=$_SESSION['star'];	

$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





if (isset($_POST['submit'])) {
    
    $newsdate=$_POST['sdate'];	
$newedate=$_POST['edate'];	
    $mars=0;
    
    
    foreach($newsdate as $maer)
    {
        
    
    $sdate=$newsdate[$mars];	
    $edate=$newedate[$mars];	
    
    
    
    
    
    
    
    
    
  
    $tt2=$_POST['taxes'];
    
    
    $tt=implode(",",$tt2);

  
   
    
    
    
	 
$event=$_POST['event'];	

$room=$_POST['room'];	
$number=$_POST['number'];	
$release=$_POST['release'];		
$minimumstay=$_POST['minimumstay'];	
$single=$_POST['single'];	
$double=$_POST['double'];
$commision=$_POST['commision'];
$commisionable=$_POST['commisionable'];



$n=0;
foreach ($number as $value) {
if($value==''){
    
}

else{







$sqll ="SELECT * FROM events WHERE hotel='$hotel' && country='$country' && location='$city' && event='$event'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
}
else{	  

$sql = "INSERT INTO events (hotel,country,location,event,price,pricedbl,sdate,edate,minimumstay,numberofrooms,roomname)
           VALUES ('$hotel','$country','$city','$event','$single[$n]','$double[$n]','$sdate','$edate','$minimumstay[$n]','$number[$n]','$room[$n]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	
}

}



$date = date('Y-m-d');
$newdate = date('Y-m-d', strtotime($date.' + '.$release[$n]. 'days'));




$samerand=rand(10000,100000000000);


$sql2 = "INSERT INTO setprices (hotel,country,location,name,sellprice,dblsellprice,sdate,edate,event,releasedays,dates,commision,commisionable,including,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$single[$n]','$double[$n]','$sdate','$edate','$event','$release[$n]','$newdate','$commision[$n]','$commisionable[$n]','$tt','$samerand')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}



$sql2 = "INSERT INTO roomnumbers (hotel,country,location,name,number,actualnumber,releasedate,dates,sdate,edate,minimumstay,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$number[$n]','$number[$n]','$release[$n]','$newdate','$sdate','$edate','$minimumstay[$n]','$samerand')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

$_SESSION['alertme']='1';

$_SESSION['decision']='1';
	
}


}


$n=$n+1;
}






$mars=$mars+1;


    }  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add Prices</h1>
              
              <input style='display:none;' value='<?php echo $_SESSION['decision']?>' id='decision'>
<form action="#" method="post" enctype="multipart/form-data">





 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Event Name</label>
       <select id='event' name='event' class='form-control'>
          <option>Select Event</option>
           <?php
           
           
$sqll ="SELECT * FROM newevents";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      ?>
      
      <option><?php echo $roww['name'];?></option>
     
     
     
     <?php
	  
  }
}
           
           
           ?>
       </select>
       
       
        </div>
           </div>
           </div>
        
        
        <br/></br/>
         
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Starting Date</label>
         <input type='date' required class='form-control' id='sdate' name='sdate[]' value='<?php echo ''; ?>'>
         
         </div>
         
         <div class="col-sm">
         <label>Ending Date</label>
         <input type='date' required class='form-control' id='edate' name='edate[]' value='<?php echo ''; ?>'>
         
         </div>
           <label style='width:5px; height:5px; backgroundColor:Transparent; border:none;'></label>
         </div>
         
         
         <nonsense id='popler'>
             
         </nonsense>
         </div>
      
      
      
          <h1 align='center'><button class='btn btn-danger' id='addact2new' onclick="myFunction2new()">+</button></h1> 

        <br/></br/>
        
        
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Pricing</label>
         
         
         
         
         <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
 
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table >
  <tr>
    <th>Room Type</th>
    <th>Allotment</th>
    <th>Release Days</th>
    <th>Minimum Stay</th>
     <th>Single Price</th>
      <th>Double Price</th>
      
       <th>Commisionable?</th>
      <th style='display:none;' id='cms'>Commision %</th>

  </tr>
  
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
     
           <?php
            $a=0;
           $nu=0;
$sqlzl ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY type";
		$resultzt = $conn->query($sqlzl);

if ($resultzt->num_rows > 0) {
  // output data of each row
  while($rowwz = $resultzt->fetch_assoc()) {
      ?>
      
<tbody id='populateme<?php echo $a;?>'>

     <tr>
         <td><input type='text' readonly name='room[]' class='form-control' value='<?php echo $rowwz['type'];?>'></td>
            <td><input type='number' min='0' name='number[]' class='form-control'></td>
            <td><input type='number' min='0' name='release[]' class='form-control'></td>
            <td><input type='number' min='0' name='minimumstay[]' class='form-control'></td>
              <td><input type='number' min='0' name='single[]' class='form-control'></td>
                <td><input type='number' min='0' name='double[]' class='form-control'></td>
                     
         
      
       
       
 <td><select name='commisionable[]' data-id='<?php echo $a;?>' onchange='enable(this)' class='coma form-control'>
      <option>No</option>
      <option>Yes</option>
      
      </select>
      
  </td>
  
   <td><input type='number' style='display:none;' min='0' name='commision[]' id='co<?php echo $a;?>' placeholder='Commission' class='form-control'></td>

      
                
                
                
                
                
                
                
                
                <td> <h1 align='center'><button data-id='<?php echo $a;?>' data-room='<?php echo $rowwz['type'];?>' class='addact2 btn btn-danger' id='addact2' onclick="myFunction2(this)">Add More</button></h1> 
</td>

     </tr>
     </tbody>
     <?php
	  $a=$a+1;
 $nu=$nu+1;
  }
}
           
           
           ?>
       <input id='nu' style='display:none;' value='<?php echo $nu;?>'  >
       
       
       
       
       
   
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
            </div> <br/><br/><br/></div> </div>  


</table>
<br/><br/>
    
       <?php
       $str=$_SESSION['star'].' Star';
 $sqltx = "SELECT * FROM taxnames WHERE country = '$country' && city = '$city' && star = '$str'";
 
 
 $resulttx=$conn->query($sqltx);


while($rowtx=mysqli_fetch_assoc($resulttx)){
    
    $taxes= $rowtx['taxname'];
  $values= $rowtx['percentage'];
    
    $choices= $rowtx['choice'];
 

 
 
 
 
}


$taxes2=explode(',',$taxes);
$values2=explode(',',$values);
$choices2=explode(',',$choices);

$adi=0;
echo 'Above Prices Includes: <br/>';
echo '<br/>';
foreach($taxes2 as $tx)
{
    ?>
    
    
    <label for="tx<?php echo $adi;?>"><?php echo $tx;
    if($choices2[$adi]=='Percentage')
    {
        echo ' (';
        echo $values2[$adi];
        echo '%)';
        
    }
    else{
        echo ' (AED ';
        echo $values2[$adi];
        echo ')';
    }
    
    
    ?>
    </label>&nbsp;&nbsp;
    <?php
    echo '<input id="tx'.$adi.'" type="checkbox" name="taxes[]" value="'.$tx.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<br/>';
    $adi=$adi+1;
}

?>
   <div class="form-group">
       
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Submit</button>
  </div>
  
  </div>
  <br/><br/><br/>
</form>
<br/><br/><br/>


<input style='display:none;' id='contryz' value='<?php echo $_SESSION['country'];?>'>
<input style='display:none;' id='ctyz' value='<?php echo $_SESSION['city'];?>'>
<input style='display:none;' id='starz' value='<?php echo $_SESSION['star'];?>'>
<input style='display:none;' id='abc' >
        
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





<script>
   function enable($this)
   {
      var aid= $this.getAttribute('data-id');
      var aval= $this.value;
        var co=document.getElementById('co'+aid);
       var cms=document.getElementById('cms');
       if(aval=='Yes')
       {
           
      cms.style.display='block';
       co.style.display='block';
       }
       else{
           co.value='';
           
         co.style.display='none';  
       }
       
       
   }
</script>



<script>

$('.addact2').on('click', function(event) {
    
        event.preventDefault();

         return false; // Use when no action should be performed
  
});











var n=1;
var newv=0;
var co=100;
var nu =document.getElementById('nu').value;
function myFunction2($this) {
    
    var country=document.getElementById('contryz').value;
var city=document.getElementById('ctyz').value;
var star=document.getElementById('starz').value;
var abc=document.getElementById('abcz');


 var populateme = document.getElementById("populateme"+$this.getAttribute('data-id'));    
    
  var tr=   document.createElement("tr"); 
  
  var td1=   document.createElement("td"); 
  var td2=   document.createElement("td"); 
  var td3=   document.createElement("td"); 
  var td4=   document.createElement("td"); 
  var td5=   document.createElement("td"); 
  var td6=   document.createElement("td"); 

 
 
 
 
 var td7=   document.createElement("td"); 
  var td8=   document.createElement("td"); 











 var select = document.createElement('SELECT');
 select.setAttribute('class','coma form-control');
 select.setAttribute('name','commisionable[]');
 
 select.setAttribute('onchange','enable(this)');
 
 select.setAttribute('data-id',co);
 
 
 var opt1 = document.createElement('option');
 
 var opt2 = document.createElement('option');


opt1.innerHTML='No';

opt2.innerHTML='Yes';
 
      
      select.appendChild(opt1);
      
      select.appendChild(opt2);
      
    td7.appendChild(select);  
      
      
     
     
     
     
     var com = document.createElement('INPUT'); 
     com.setAttribute('class','form-control');
     com.setAttribute('name','commision[]');
     com.setAttribute('placeholder','Commission');
     com.setAttribute('id','co'+co);
      com.style.display='none';
     td8.appendChild(com);
     


var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "room[]");
yc.setAttribute("type", "text");
yc.setAttribute("value", $this.getAttribute('data-room'));
yc.setAttribute("placeholder", "Room Name");
yc.setAttribute("readonly", 'true');





td1.appendChild(yc);
//td1.appendChild(ycbtn);






var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "number[]");
yc1.setAttribute("type", "number");
yc1.setAttribute("placeholder", "Number of Rooms");
yc1.setAttribute("min", "0");

td2.appendChild(yc1);


var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "release[]");
yc2.setAttribute("type", "number");
yc2.setAttribute("placeholder", "Release Days");
yc2.setAttribute("min", "0");

td3.appendChild(yc2);

var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "minimumstay[]");
yc3.setAttribute("type", "number");
yc3.setAttribute("placeholder", "Minimum Stay");
yc3.setAttribute("min", "0");

td4.appendChild(yc3);


var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "single[]");
yc4.setAttribute("type", "number");
yc4.setAttribute("placeholder", "Single Price");
yc4.setAttribute("min", "0");

td5.appendChild(yc4);


var yc5 = document.createElement("INPUT");

yc5.setAttribute("class", "form-control");
yc5.setAttribute("Name", "double[]");
yc5.setAttribute("type", "number");
yc5.setAttribute("placeholder", "Double Price");
yc5.setAttribute("min", "0");

td6.appendChild(yc5);








tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);
tr.appendChild(td5);
tr.appendChild(td6);

	
	

	
tr.appendChild(td7);
tr.appendChild(td8);

populateme.appendChild(tr);
	









 co=co+1;
 n=n+1;
 newv=newv+1;
}

</script>





















<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    var dec=document.getElementById("decision").value;
    if(dec=='1'){
       
    <?php 
    $_SESSION['decision']='0';
    ?>
    
    
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'More Prices?',
  text: "You want to add more prices?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
      
    location.replace('add_new_prices.php');
    
    
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    
    
    location.replace('managerestaurants.php');
    
    
    
    
    
  }
})
    
    
    
    
    
    
    
    
    
    
    }
    
</script>








 












<script>
    
    
    
	
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




<script>
document.getElementById("addact2new").addEventListener("click", function(event){
  event.preventDefault()
});


function myFunction2new() {
    var popler= document.getElementById('popler');
    
    var row = document.createElement('div');
    row.classList.add('row');
    
    
    var col1 = document.createElement('div');
    col1.classList.add('col-sm');
    
    var col2 = document.createElement('div');
    col2.classList.add('col-sm');
    
    var col3 = document.createElement('div');
    col3.classList.add('col-sm');
    
    var date1 = document.createElement('INPUT');
    
    date1.classList.add('form-control');
     date1.setAttribute('name','sdate[]');
     date1.setAttribute('type','date');
    
     var date2 = document.createElement('INPUT');
    
    date2.classList.add('form-control');
     date2.setAttribute('name','edate[]');
     date2.setAttribute('type','date');
    
    
     var cross = document.createElement('BUTTON');
     cross.innerHTML='X';
     cross.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
        cross.style.width='5px';
         cross.style.height='5px';
         cross.style.backgroundColor='Transparent';
         cross.style.border='none';
    
    
    col1.appendChild(date1);
    
    col2.appendChild(date2);
    
   
    
    
    
    row.appendChild(col1);
    row.appendChild(col2);
    row.appendChild(cross);
    
    popler.appendChild(row);
    
    
}
</script>




</main>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

