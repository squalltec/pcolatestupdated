<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






if (isset($_POST['addnew'])) {
    
$activity=mysqli_real_escape_string($conn, $_POST['activity']);
  

$sqlTpl1 = "INSERT INTO hotelsdatabaseactivities (hotel,country,city,activity) VALUES (%s )";
		   
$sqlArr1 = array();

foreach($activity as $k => $v )

  $sqlArr1[] = '"'.$hotel.'","'.$country.'","'.$city.'","'.$activity[$k].'"';
$sqlStr1 = sprintf( $sqlTpl1 ,
            implode( ' ) , ( ' , $sqlArr1 ) );





 $result1 = $conn->query($sqlStr1);


if ($result1 === TRUE) {
$_SESSION['alertme']=1;
  


} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}




//end
    
    
    
    
    
    
    
    
}




















if (isset($_POST['submit'])) {
    

$activity=mysqli_real_escape_string($conn, $_POST['activity']);

$id=$_POST['iad'];	




$sql ="UPDATE hotelsdatabaseactivities SET activity='$activity' WHERE id='$id'";

 $result = $conn->query($sql);


if ($result === TRUE) {
  $_SESSION['alertme']=1;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

		






}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">



<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Manage Activities</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Activities</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                    
                    
                    
                    <?php
                    
                    $n=0;
                    
$sqll ="SELECT * FROM hotelsdatabaseactivities WHERE hotel='$hotel' && country='$country' && city='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      $aid=$roww['id'];
	  
	?>
             <form action="#" method="post" enctype="multipart/form-data">       
                    <input style='display:none;' name='iad' value='<?php echo $roww['id'];?>'>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $n;?>" aria-expanded="true" aria-controls="collapse<?php echo $n;?>">
                           <label>Activity:&nbsp; </label><br/>
                <input class='form-control' value='<?php echo mysqli_real_escape_string($conn, $roww['activity']);?>' id='activity' name='activity'> <br/>
                
             
                          </button>
                        
                                    <div class="form-group">
                                        <a href='del.php?tbl=hotelsdatabaseactivities&aid=<?php echo $aid;?>'><b><span style='font-size:0.5em; position:absolute; z-index:1; color:red;'>Delete</span></b> </a>
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Update</button>
  </div>
           <br/>
          
          

  </form>
                    
                    
                    <?php
                    $n=$n+1;
  }
}
?>

                           
                            
                      <input style='display:none;' name='counter' value='<?php echo $n; ?>'>
                      
                    </div>
                  </div>
                </div>

                

              </div>
          </div><!--end row-->
         
     
     
     
     
     
     
     
     
     
    </div>






  </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>









<br/>
<br/>
<br/>
<br/>






<form action="#" method="post" enctype="multipart/form-data">


<div class="container">
       <div class='row'>
        <label>Add More Activities</label>
        <div id='aacctt2'>
           <div class="col-sm">
               
                  <input type='text' placeholder='Activity Name' class="form-control" name='activity[]'>
                  
                
        
          </div>
          
              </div>
               <div class="col-sm">
               
                <h1 align='center'><button class='btn btn-primary' id='addact2' onclick="myFunction2()">+</button></h1> 
        </div>  
        
        
        
        
        
        
        
            
     </div>
          </div>



   <div class="form-group">
 <button style="float:right;"type="submit" name='addnew' class="btn btn-primary">Add New</button>
  </div>
  


</form>






<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>












</main>



<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



    
var n=1;

function myFunction2() {
 var act = document.getElementById("aacctt2"); 
 
 var dv = document.createElement("div");

dv.setAttribute("class", "col-sm");

var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "activity[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Activity Name");



dv.appendChild(yc);

act.appendChild(dv);


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





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

