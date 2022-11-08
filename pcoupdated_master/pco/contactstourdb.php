<?php
require_once('db_connection.php');


include('header.php');



 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
    
        


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Create Contact</h2>

</div>
<div>
    
    
    
    
    
    
    <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
                
     <div class="form-group">
    <label>Company Name</label>
    
    <input list='ht' type="text" class="form-control" name='hotelname' id='hotelname' required placeholder="Company">

<datalist id='ht' style='display:none;'class='form-control'>
      <?php
         
					   $sqllas = "SELECT * FROM contactstour GROUP BY company";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
      ?>
       
       <option><?php echo $row['hotel'];?></option>
       <?php
}
?>

   </datalist>
    
  </div>
    
    </div>
  
  
  
  
  
  
    <div class='col-sm'>
  
  <div class="form-group">
    <label>Country</label>
    <select name='country' id='country' class="form-control">
        <option>Select Country</option>
        <?php
        
        
$sqll ="SELECT * FROM countries";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      echo '<option>'.$roww['country'].'</option>';
	  
  }
}
        
        
        ?>
        
        
        
        
        
        </select>
  </div>
    </div>
    
    
      <div class='col-sm'>
  <div class="form-group">
    <label>City</label>
    <select id='city' name='city' class="form-control">
       
        
        </select>
  </div>
    
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
                
     <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name='fname' id='fname' required placeholder="First Name">
  </div>
    
    </div>
    
     <div class='col-sm'>
                
     <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name='lname' id='lname' required placeholder="Last Name">
  </div>
    
    </div>
    
    
    
    
    
    
        </div>
    </div>
    
    
    
    
    <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
                
     <div class="form-group">
    <label>Designation</label>
    <input list='abc' autocomplete="false" class='form-control' id='designation' name='designation'>
   <datalist id='abc' style='display:none;'class='form-control'>
      <?php
         
					   $sqllas = "SELECT * FROM designationshotels";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
      ?>
       
       <option><?php echo $row['designations'];?></option>
       <?php
}
?>

   </datalist>
  </div>
    
    </div>
  
    
    
    
    
    
    
    
    
     
           
    
    
    
    
    
    
    
    
    
    
        </div>
    </div>
    
    
    
    
    
    
    
    
    
      <div class='container'>
        <div class='row'>
           
            <datalist id='dep' style='display:none;'class='form-control'>
      <?php
         
					   $sqllas2 = "SELECT * FROM departmentshotels";
 
 
 $result2=$conn->query($sqllas2);


while($row2=mysqli_fetch_assoc($result2)){
    
      ?>
       
       <option><?php echo $row2['departments'];?></option>
       <?php
}
?>

   </datalist>
           
           
           
           
            
            
    
     <div class='col-sm'>
                
     <div class="form-group">
    <label>Department</label>
    <input list='dep' autocomplete="false" class='form-control' onchange='dep(this)' data-id='0' id='department' name='department[]'>
  
  </div>
    
    </div>
  
    
    
    
    
      <div style='display:none;'  id='outletdiv' class='col-sm'>
                
     <div class="form-group">
    <label>Outlet</label>
    <input class='form-control' id='outlet' name='outlet[]'>
    
    </div>
    </div>
    
    
    
    
    <nonsense id='populateme'>
        
    </nonsense>
    
    
    
    
    
<h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">Add More Departments</button></h1> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        </div>
    </div>
    
    
    <br/>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
  
  <div class="form-group">
    <label>Email</label>
    <input class="form-control" name='email' id='email' type='email' required value='<?php echo $_SESSION['emailc'];?>' placeholder="xxxxx@example.com">
  </div>
  
 
      </div>
    
    
     <div class='col-sm'>
  
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name='phone' id='phone' required placeholder="+971xxxxxxxx">
  </div>
  
 
      </div>
    
        </div>
    </div>
  
   
   
   
   <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
  
  <div class="form-group">
    <label>Nationality</label>
    <input class="form-control" name='nationality' id='nationality' type='text'>
  </div>
  
 
      </div>
    
    
     <div class='col-sm'>
  
  <div class="form-group">
    <label>Birthday</label>
    <input type="date" class="form-control" name='birthday' id='birthday'>
  </div>
  
 
      </div>
    
        </div>
    </div>
    
    
  
   <div class="form-group">
 <button style="float:right;" onclick='submitcontact()' type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>

<br/>
<br/>
<br/>

</main>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});
</script>

<script>
    
    function dep($this)
    {
        if($this.value=='Food & Beverage')
        {
        var aid= $this.getAttribute('data-id');
        
        var showw=document.getElementById(aid);
        
        showw.style.display='block';
        
        
        
        }
        else{
            var aid= $this.getAttribute('data-id');
        
        var showw=document.getElementById(aid);
        
        showw.style.display='none';
        }
        
    }
    
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
var a=1;
function myFunction2()
{
    
   
    var populateme = document.getElementById("populateme");   
    
    var div1=document.createElement('div');
    div1.setAttribute('class','container');
    
    var div2=document.createElement('div');
    div2.setAttribute('class','row');
    
    
    
    
    
    
    
    
    
    
    
    
    var div3=document.createElement('div');
    div3.setAttribute('class','col-sm');
   
    
    var div5=document.createElement('div');
    div5.setAttribute('class','form-group');
    
    
    
    
    var inp1=document.createElement('INPUT');
    inp1.setAttribute('class','form-control');
    inp1.setAttribute('name','department[]');
    inp1.setAttribute('list','dep');
    inp1.setAttribute('data-id',a);
    inp1.setAttribute('onchange','dep(this)');
   
    
    
    div5.appendChild(inp1);
   
    
    
    
   
    
    
     
    var div4=document.createElement('div');
    div4.setAttribute('class','col-sm');
     div4.setAttribute('id',a);
    
    var div6=document.createElement('div');
    div6.setAttribute('class','form-group');
    
  
   var inp2=document.createElement('INPUT');
    inp2.setAttribute('class','form-control');
    inp2.setAttribute('name','outlet[]');
    inp2.setAttribute('placeholder','Outlet');
   
  div6.appendChild(inp2);
  
  
  
  
   div3.appendChild(div5);
   div4.appendChild(div6);
   
    div4.style.display='none';
   
   
   
   
   
   div2.appendChild(div3);
   div2.appendChild(div4);
   
   
   div1.appendChild(div2);
   populateme.appendChild(div1);
   
   
   
   
    
    a=a+1;
}











   function submitcontact(){
        
        var hotelname=document.getElementById('hotelname').value;
        var country=document.getElementById('country').value;
        var city=document.getElementById('city').value;
        var fname=document.getElementById('fname').value;
        var lname=document.getElementById('lname').value;
        var email=document.getElementById('email').value;
        var phone=document.getElementById('phone').value;
        var designation=document.getElementById('designation').value;
        
        var de = document.getElementsByName('department[]');
        
        const dps=[];
        
        
         var ot = document.getElementsByName('outlet[]');
        
        const ots=[];
        
        
        
        
        
       for (let i = 0; i < de.length; i++) {
           if(de[i].value!='')
           {
        dps.push(de[i].value);
           }
       }
        
        var department=dps.toString();
        
        
        
        
        
           for (let i = 0; i < ot.length; i++) {
           if(ot[i].value!='')
           {
        ots.push(ot[i].value);
           }
       }
        
        var outlet=ots.toString();
        
        
        
        
        
        var birthday=document.getElementById('birthday').value;
         var nationality=document.getElementById('nationality').value;
        
        
        
        
         $.ajax({
              type:'POST',
              url:'submittourcontact.php',
              data:{'hotelname':hotelname,'country':country,'city':city,'fname':fname,'lname':lname,'email':email,'phone':phone,'designation':designation,'department':department,'outlet':outlet,'birthday':birthday,'nationality':nationality},
             
              success:function(result){
                 
             
                Swal.fire({
  title: 'Success!',
  text: 'Contact Created',
  icon: 'success',
  confirmButtonText: 'OK'
})





 
  document.getElementById('fname').value='';
  document.getElementById('lname').value='';
  document.getElementById('email').value='';
  document.getElementById('phone').value='';
  document.getElementById('designation').value='';
  document.getElementById('birthday').value='';
document.getElementById('nationality').value='';

document.getElementById('department').value='';
document.getElementById('populateme').innerHTML='';




var outlet= document.getElementById('outletdiv');
 var outletval= document.getElementById('outlet');
       outletval.value='';
       outlet.style.display='none';

        
                 }
              
                
              }); 
        
        
        
        
        
        
        
        
        
        
    }
</script>










  <script>
  
  
  
  
  
  
  
      $.ajax({
              
			  type:'POST',
			  
              url:'getalertme.php',
              success:function(result){
                  
				
			    if(result.includes('exists')){
			     Swal.fire('Created Successfully')
			    }
               
               
                 
              }
			  
          }); 
		  
</script>













<script>
      $("#department").on('change', function() {
      var department= document.getElementById('department').value;
       var outlet= document.getElementById('outletdiv');
       var outletval= document.getElementById('outlet');
       outletval.value='';
       
       if(department=='Food & Beverage')
       {
           
       outlet.style.display='block';
       }
       else{
               
       outlet.style.display='none';
       }
       
      });
</script>





<script>
    $(document).ready(function() {
        
          $("#email").on('change', function() {
       var email= document.getElementById('email').value;
          
             $.ajax({
              type:'POST',
              url:'validateemailcontacts.php',
              data:{'email':email},
             
              success:function(result){
                 
             if(result.includes('exists'))
             {
                 
                 /*
                Swal.fire({
  title: 'Error!',
  text: 'Email Already Exists!',
  icon: 'error',
  confirmButtonText: 'OK'
})
document.getElementById('email').value='';
*/
             }
        
                 }
              
                
              }); 
              
       
          });	       
        
        
        
        
        
        
        
        

   $("#country").on('change', function() {
       

	var country= $("#country").val();

 $.ajax({
              type:'POST',
              url:'getcitiesforregister.php',
              data:{'country':country},
             
              success:function(result){
                 
                  $("#city").html(result);
              }
                
              });
   });

        });	
</script>














<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

