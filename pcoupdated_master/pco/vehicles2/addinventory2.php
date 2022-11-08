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

$numberofcars=$_POST['facilitiess4'];

$type=$_POST['type'];

$doors=$_POST['doors'];

$seating=$_POST['seating'];

$pax=$_POST['pax'];

$luggage=$_POST['luggage'];

$large=$_POST['large'];

$small=$_POST['small'];

$nn=0;
foreach ($brand as $value) {


$sql = "INSERT INTO vehiclesInventorydatabase (hotel,country,city,brand,model,year,numberofcars,type,doors,seating,maximum,luggages,large,small)
           VALUES ('$hotel','$country','$city','$value','$model[$nn]','$year[$nn]','$numberofcars[$nn]','$type[$nn]','$doors[$nn]','$seating[$nn]','$pax[$nn]','$luggage[$nn]','$large[$nn]','$small[$nn]')";
		  
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
<form autocomplete='off' action="#" method="post" enctype="multipart/form-data">
    <br/>
<style>
    .delbtn{
        font-size:10px; 
        right:30px; 
        position:absolute;
    }
</style>
 <div class='row'>
           
           
                <div style='border:1px solid black;' class='col-sm'>
                    <label>Brand</label>
                    </div>
                    <div style='border:1px solid black;' class='col-sm'>
                    <label>Model</label>
                    </div>
                    <div style='border:1px solid black;' class='col-sm'>
                    <label>Year</label>
                    </div>
                    <div style='border:1px solid black;' class='col-sm'>
                    <label>Number of Cars</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Type</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Doors</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Seating</label>
                    </div>
                    <div style='border:1px solid black;' class='col-sm'>
                    <label>Pax</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Luggages</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Large Bags</label>
                    </div>
                     <div style='border:1px solid black;' class='col-sm'>
                    <label>Small Bags</label>
                    </div>
                
                </div>

        <br/>
       
            <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
            <div class='row'>
                
                
                
                <div class='col-sm'>
        <div>
        
        <input list='brandsnames' id='brand' class='form-control' onchange='myFunctionaa(this);' data-id='0' required name='facilitiess[]' placeholder='Brand Name' >
        
        </div>
        </div>
        
        
        
        <datalist style='display:none;' id='brandsnames'>
           
           
              <?php
									       
									       
									       
									       
	$sql1="SELECT * FROM vehiclesInventorydatabase Group By brand";

	$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
      
      ?>
      
      <option><?php echo $row1['brand'];?></option>
      
      <?php
      
      
  }
}
?>

        </datalist>
        
        
        
        
                <div class='col-sm'>
        <div>
        
        <input class='form-control' required name='facilitiess2[]' list='model0' placeholder='Model' >
       
       
       
       
       
        <datalist style='display:none;' id='model0'>
           </datalist>
       
       
       
       
       
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
       
        <select class='form-control' required name='type[]'>
            <option>Economy</option>
            <option>Luxury</option>
            <option>Super Luxury</option>
            <option>Bus</option>
            </select>
   
        </div> 
        
        
        
        
         <div class='col-sm'>
       
        <select class='form-control' required name='doors[]'>
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            </select>
   
        </div> 
        
        
        
                 <div class='col-sm'>
    
        <input class='form-control' type='number' min='0' required name='seating[]'>
        
        </div> 
        
        <div class='col-sm'>
    
        <input class='form-control' type='number' min='0' required name='pax[]'>
        
        </div> 
        
        
        <div class='col-sm'>
    
        <input class='form-control' type='number' min='0' required name='luggage[]'>
        
        </div> 
        
        <div class='col-sm'>
    
        <input class='form-control' type='number' min='0' required name='large[]'>
        
        </div> 
        
        <div class='col-sm'>
    
        <input class='form-control' type='number' min='0' required name='small[]'>
        
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
 function myFunctionaa($this) {
     
     
     var brand=$this.value;
     var id=$this.getAttribute('data-id');
    
    
  
   $.ajax({
      
			  type:'POST',
              url:'getmodels.php',
              data:{'brand':brand},
              
              success:function(result){
                  
                  
                 document.getElementById('model'+id).innerHTML=result;
               
               
              }
			  
          });
    
    
    }
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
  var ybo22datalist = document.createElement("div");
   var ybo222 = document.createElement("div");
   var ybo2222 = document.createElement("div");
 
  var d1 = document.createElement("div");
   var d2 = document.createElement("div");
   var d3 = document.createElement("div");
   var d4 = document.createElement("div");
   var d5 = document.createElement("div");
   var d6 = document.createElement("div");
   var d7 = document.createElement("div");
 
 
   d1.classList.add("col-sm");
    d2.classList.add("col-sm");
    d3.classList.add("col-sm");
    d4.classList.add("col-sm");
    d5.classList.add("col-sm");
    d6.classList.add("col-sm");
    d7.classList.add("col-sm");
 
 
 
 
 
 ybo0.classList.add("container");
 ybo1.classList.add("row");
 
 
 
 ybo2.classList.add("col-sm");
  ybo22.classList.add("col-sm");
   ybo222.classList.add("col-sm");
    ybo2222.classList.add("col-sm");
   
 
   
   
   
var ycbtn = document.createElement("BUTTON");
ycbtn.setAttribute('name','delbtn');

ycbtn.setAttribute('style','position:absolute; right:0;');

ycbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);')
ycbtn.innerHTML='X';
ycbtn.setAttribute('class','delbtn');


   
   
 
var ycx = document.createElement("br");



var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "facilitiess[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Brand Name");
yc.setAttribute("list", "brandsnames");
yc.setAttribute("onchange", "myFunctionaa(this);");
yc.setAttribute("data-id", n);




ybo2.appendChild(yc);








var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "facilitiess2[]");
yc2.setAttribute("type", "text");
yc2.setAttribute("placeholder", "Model");
yc2.setAttribute("list", "model"+n);
ybo22.appendChild(yc2);



var yc2datalist = document.createElement("DATALIST");

yc2datalist.setAttribute("id", "model"+n);
yc2datalist.setAttribute("style", "display:none;");






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





 
var ty = document.createElement("SELECT");

ty.setAttribute("class", "form-control");
ty.setAttribute("Name", "type[]");



var op1= document.createElement("OPTION");
var op2= document.createElement("OPTION");
var op3= document.createElement("OPTION");
var op4= document.createElement("OPTION");
op1.innerHTML='Economy';
op2.innerHTML='Luxury';
op3.innerHTML='Super Luxury';
op4.innerHTML='Bus';
 
 ty.appendChild(op1);
 ty.appendChild(op2);
 ty.appendChild(op3);
 ty.appendChild(op4);
 
 d1.appendChild(ty);













 
var ty2 = document.createElement("SELECT");

ty2.setAttribute("class", "form-control");
ty2.setAttribute("Name", "doors[]");



var op12= document.createElement("OPTION");
var op22= document.createElement("OPTION");
var op32= document.createElement("OPTION");
var op42= document.createElement("OPTION");
op12.innerHTML='5';
op22.innerHTML='4';
op32.innerHTML='3';
op42.innerHTML='2';
 
 ty2.appendChild(op12);
 ty2.appendChild(op22);
 ty2.appendChild(op32);
 ty2.appendChild(op42);
 
 d2.appendChild(ty2);




var ty3 = document.createElement("INPUT");

ty3.setAttribute("class", "form-control");
ty3.setAttribute("Name", "seating[]");
ty3.setAttribute("type", "number");
ty3.setAttribute("min", "0");
d3.appendChild(ty3);



var ty4 = document.createElement("INPUT");

ty4.setAttribute("class", "form-control");
ty4.setAttribute("Name", "pax[]");
ty4.setAttribute("type", "number");
ty4.setAttribute("min", "0");
d4.appendChild(ty4);



var ty5 = document.createElement("INPUT");

ty5.setAttribute("class", "form-control");
ty5.setAttribute("Name", "luggage[]");
ty5.setAttribute("type", "number");
ty5.setAttribute("min", "0");
d5.appendChild(ty5);




var ty6 = document.createElement("INPUT");

ty6.setAttribute("class", "form-control");
ty6.setAttribute("Name", "large[]");
ty6.setAttribute("type", "number");
ty6.setAttribute("min", "0");
d6.appendChild(ty6);


var ty7 = document.createElement("INPUT");

ty7.setAttribute("class", "form-control");
ty7.setAttribute("Name", "small[]");
ty7.setAttribute("type", "number");
ty7.setAttribute("min", "0");
d7.appendChild(ty7);











  ybo1.appendChild(ybo2);
   ybo1.appendChild(ybo22);
    ybo1.appendChild(yc2datalist);
   ybo1.appendChild(ybo222);
   ybo1.appendChild(ybo2222);
   ybo1.appendChild(d1);
    ybo1.appendChild(d2);
    ybo1.appendChild(d3);
    ybo1.appendChild(d4);
    ybo1.appendChild(d5);
    ybo1.appendChild(d6);
    ybo1.appendChild(d7);
   
 
   
   ybo1.appendChild(ycx);
    //ybo1.appendChild(ycbtn);
   
act.appendChild(ybo1);



 n=n+1;
 
}

</script>














</main>
