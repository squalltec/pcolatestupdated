<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
    
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$brand=$_POST['facilitiess'];

$model=$_POST['facilitiess2'];

$year=$_POST['facilitiess3'];

$trans=$_POST['facilitiess100'];

$numberofcars=$_POST['facilitiess4'];

$nn=0;
foreach ($brand as $value) {


$sql = "INSERT INTO rentacarInventorydatabase (hotel,country,city,brand,model,year,numberofcars,transmission)
           VALUES ('$hotel','$country','$city','$value','$model[$nn]','$year[$nn]','$numberofcars[$nn]','$trans[$nn]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;

}

$nn=$nn+1;
}



$_SESSION['yer']=$year;
$_SESSION['roomname']=$model;

$_SESSION['roomnamecount']='0';
	
$_SESSION['numberofcars']=$numberofcars;
$_SESSION['brands']=$brand;

echo "<script>location.replace('addinventory3.php');</script>";



  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1  align='center'>Add Vehicles</h1>
<form action="#" method="post" enctype="multipart/form-data">
    <br/>
<style>
    .delbtn{
        font-size:10px; 
        right:30px; 
        position:absolute;
    }
</style>
 <div class='container'>
           
            <div class='row'>
                <div class='col-sm'>
                    <label>Brand</label>
                    </div>
                    <div class='col-sm'>
                    <label>Model</label>
                    </div>
                    <div class='col-sm'>
                    <label>Year</label>
                    </div>
                    <div class='col-sm'>
                    <label>Number of Cars</label>
                    </div>
                     <div class='col-sm'>
                    <label>Transmission</label>
                    </div>
                
                </div>
                </div>

        <br/>
        <div class='container'>
            <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
            <div class='row'>
                
                
                
                <div class='col-sm'>
        <div>
        
        <input class='form-control' required name='facilitiess[]' placeholder='Brand Name' >
        
        </div>
        </div>
        
        
        
        
        
                <div class='col-sm'>
        <div>
        
        <input class='form-control' required name='facilitiess2[]' placeholder='Model' >
       
       
        </div>
        </div>
        
       
                <div class='col-sm'>
        <div>
        
        <input class='form-control' type='number' required name='facilitiess3[]' placeholder='Year' >
       
       
        </div>
        </div> 
        
        
                 <div class='col-sm'>
        <div>
        
        <input class='form-control' type='number' min='1' required name='facilitiess4[]'>
       
       
        </div>
        </div> 
        
        
        
        
            
                 <div class='col-sm'>
        <div>
        
        <select class='form-select' name='facilitiess100[]'>
            
            <option>
                Automatic
            </option>
             <option>
                Manual
            </option>
            
            </select>
       
       
        </div>
        </div> 
        
        
        </div>
        </div>
        
        <div id='aacctt2'>
            
        </div>
        
        
        
 <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 




<br/>


<br/>
<br/>


   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>



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













<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



var n=1;

function myFunction2() {
 var act = document.getElementById("aacctt2"); 
 
 var ybo0 = document.createElement("div");
 var ybo1 = document.createElement("div");
 var ybo2 = document.createElement("div");
  var ybo22 = document.createElement("div");
   var ybo222 = document.createElement("div");
   var ybo2222 = document.createElement("div");
   
   var ybo22222 = document.createElement("div");
 
 ybo0.classList.add("container");
 ybo1.classList.add("row");
 
 
 
 ybo2.classList.add("col-sm");
  ybo22.classList.add("col-sm");
   ybo222.classList.add("col-sm");
    ybo2222.classList.add("col-sm");
    
    ybo22222.classList.add("col-sm");
   
 
   
   
   
var ycbtn = document.createElement("BUTTON");
ycbtn.setAttribute('name','delbtn');
ycbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);')
ycbtn.innerHTML='X';
ycbtn.setAttribute('class','delbtn');

ybo0.appendChild(ycbtn);
   
   
 
var ycx = document.createElement("br");



var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "facilitiess[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Room Name");
ybo2.appendChild(yc);








var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "facilitiess2[]");
yc2.setAttribute("type", "text");
yc2.setAttribute("placeholder", "Model");
ybo22.appendChild(yc2);






var yc22 = document.createElement("INPUT");

yc22.setAttribute("class", "form-control");
yc22.setAttribute("Name", "facilitiess3[]");
yc22.setAttribute("type", "number");
yc22.setAttribute("placeholder", "Year");
ybo222.appendChild(yc22);





var yc222 = document.createElement("INPUT");

yc222.setAttribute("class", "form-control");
yc222.setAttribute("Name", "facilitiess4[]");
yc222.setAttribute("type", "number");
yc222.setAttribute("min", "1");
ybo2222.appendChild(yc222);



var yc2222 = document.createElement("SELECT");

yc2222.setAttribute("class", "form-select");
yc2222.setAttribute("Name", "facilitiess100[]");




var option100 =document.createElement("option");
option100.innerHTML='Automatic';


var option200 =document.createElement("option");
option200.innerHTML='Manual';

yc2222.appendChild(option100);

yc2222.appendChild(option200);


ybo22222.appendChild(yc2222);



  ybo1.appendChild(ybo2);
   ybo1.appendChild(ybo22);
   ybo1.appendChild(ybo222);
   ybo1.appendChild(ybo2222);
   
   ybo1.appendChild(ybo22222);
   
   
   
   ybo0.appendChild(ybo1)
   
   act.appendChild(ycx);
   
act.appendChild(ybo0);


 n=n+1;
 
}

</script>














</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

