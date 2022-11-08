<?php
require_once('db_connection.php');

include('header.php');

    
    
    
    
 $countvenues=$_SESSION['counting'];
 $venues=$_SESSION['venues'];
 
 
 
  

   
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];      


if (isset($_POST['submit'])) {
  
  
   if(isset($_POST['socialdistance']))
   {
$socialdistance=mysqli_real_escape_string($conn,$_POST['socialdistance']);
}
else{
    $socialdistance='';
}



 if(isset($_POST['smoking']))
   {
$smoking=mysqli_real_escape_string($conn,$_POST['smoking']);
}
else{
    $smoking='';
}
  
  
  
  
  
  
   
   if(isset($_POST['venueinfo']))
   {
$venueinfo=mysqli_real_escape_string($conn,$_POST['venueinfo']);
}
else{
    $venueinfo='';
}if(isset($_POST['gettinghere']))
{
$gettinghere=mysqli_real_escape_string($conn,$_POST['gettinghere']);
}
else{
    $gettinghere='';
}if(isset($_POST['glance']))
{
$glance=mysqli_real_escape_string($conn,$_POST['glance']);
}
else{
    $glance='';
}if(isset($_POST['naturaldaylight']))
{
$naturaldaylight=$_POST['naturaldaylight'];
}
else{
    $naturaldaylight='';
}if(isset($_POST['ceilingheight']))
{
$ceilingheight=mysqli_real_escape_string($conn,$_POST['ceilingheight']);
}
else{
    $ceilingheight='';
}if(isset($_POST['doorwidthheight']))
{
$doorwidthheight=mysqli_real_escape_string($conn,$_POST['doorwidthheight']);
}
else{
    $doorwidthheight='';
}if(isset($_POST['carlaunch']))
{
$carlaunch=$_POST['carlaunch'];
}
else{
    $carlaunch='';
}if(isset($_POST['vehiclewidthheight']))
{
$vehiclewidthheight=mysqli_real_escape_string($conn,$_POST['vehiclewidthheight']);
}
else{
    $vehiclewidthheight='';
}if(isset($_POST['venueaddress']))
{
$venueaddress=mysqli_real_escape_string($conn,$_POST['venueaddress']);
}
else{
    $venueaddress='';
}if(isset($_POST['lastrenovated']))
{
$lastrenovated=$_POST['lastrenovated'];
}
else{
    $lastrenovated='';
}if(isset($_POST['venuerating']))
{
$venuerating=$_POST['venuerating'];
}
else{
    $venuerating='';
}if(isset($_POST['outdoorindoor']))
{
$outdoorindoor=$_POST['outdoorindoor'];
}
else{
    $outdoorindoor='';
}if(isset($_POST['numberofmeetingrooms']))
{
$numberofmeetingrooms=$_POST['numberofmeetingrooms'];
}
else{
    $numberofmeetingrooms='';
}if(isset($_POST['numberofbanquet']))
{
$numberofbanquet=$_POST['numberofbanquet'];
}
else{
    $numberofbanquet='';
}if(isset($_POST['numberofbreakout']))
{
$numberofbreakout=$_POST['numberofbreakout'];
}
else{
    $numberofbreakout='';
}












if(isset($_POST['mnames']))
{
$mnames=implode(", ", $_POST['mnames']);
$mnames=mysqli_real_escape_string($conn,$mnames);
}
else{
  $mnames  ='';
}if(isset($_POST['mdescriptions']))
{
$mdescriptions=implode(", ", $_POST['mdescriptions']);

$mdescriptions=mysqli_real_escape_string($conn,$mdescriptions);



}
else{
  $mdescriptions  ='';
}if(isset($_POST['bnames']))
{
$bnames=implode(", ", $_POST['bnames']);
$bnames=mysqli_real_escape_string($conn,$bnames);

}
else{
   $bnames ='';
}if(isset($_POST['bdescriptions']))
{
$bdescriptions=implode(", ", $_POST['bdescriptions']);
$bdescriptions=mysqli_real_escape_string($conn,$bdescriptions);
}
else{
   $bdescriptions ='';
}if(isset($_POST['brnames']))
{
$brnames=implode(", ", $_POST['brnames']);
$brnames=mysqli_real_escape_string($conn,$brnames);
}
else{
   $brnames ='';
}if(isset($_POST['brlocations']))
{
$brlocations=implode(", ", $_POST['brlocations']);
}
else{
   $brlocations ='';
}if(isset($_POST['brsizes']))
{
$brsizes=implode(", ", $_POST['brsizes']);
}
else{
   $brsizes ='';
}if(isset($_POST['cards']))
{
$pastevents = implode(", ", $_POST['cards']);
}
else{
   $pastevents ='';
}
    
    
    $vinclusions = implode(", ", $_POST['vinclusions']);
    
    
    $arraycards=$_POST['vinclusions'];
    
    
    
foreach ($arraycards as $value) {
    
  
$sql1 ="SELECT * FROM venueinclusions WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO venueinclusions (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  //echo "Category created successfully";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	  
  }
    
    

                      
                     
$sql ="UPDATE meetingbanquetplanner SET venueinfo='$venueinfo',gettinghere='$gettinghere',glance='$glance',naturaldaylight='$naturaldaylight',ceilingheight='$ceilingheight',doorwidthheight='$doorwidthheight', carlaunch='$carlaunch', vehiclewidthheight='$vehiclewidthheight', venueaddress='$venueaddress', lastrenovated='$lastrenovated',outdoorindoor='$outdoorindoor',pastevents='$pastevents',vinclusions='$vinclusions',numberofmeetingrooms='$numberofmeetingrooms',numberofbanquet='$numberofbanquet',numberofbreakout='$numberofbreakout',mnames='$mnames',mdescriptions='$mdescriptions',bnames='$bnames',bdescriptions='$bdescriptions',brnames='$brnames',brlocations='$brlocations',brsizes='$brsizes',smoking='$smoking',socialdistance='$socialdistance' WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venues[$countvenues]'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 $_SESSION['alertme']=1;
 
 
// echo "<script>location.replace('managehotel.php');</script>";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}   
       





$nmm=0;
foreach($_POST['mnames'] as $valu)
{
mkdir("../Venue Original Images/".$hotel."/".$venues[$countvenues], 0755, true);	
		

 $uploadsDir = "../Venue Original Images/".$hotel."/".$venues[$countvenues]."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['mimages'.$nmm]['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['mimages'.$nmm]['name'][$id];
                $tempLocation    = $_FILES['mimages'.$nmm]['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(true){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                      $sqlVal = "('".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','meetingrooms')");
                    
                    
                    if($insert) {
                        
                       
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                       
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
		
		
		
		$nmm=$nmm+1;
}























$nmm2=0;
foreach($_POST['bnames'] as $valu)
{
mkdir("../Venue Original Images/".$hotel."/".$venues[$countvenues], 0755, true);	
		

 $uploadsDir = "../Venue Original Images/".$hotel."/".$venues[$countvenues]."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['bimages'.$nmm2]['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['bimages'.$nmm2]['name'][$id];
                $tempLocation    = $_FILES['bimages'.$nmm2]['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(true){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                      $sqlVal = "('".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','banquet')");
                    
                    
                    if($insert) {
                        
                       
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                       
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
		
		
		
		$nmm2=$nmm2+1;
}









$nmm3=0;
foreach($_POST['brnames'] as $valu)
{
mkdir("../Venue Original Images/".$hotel."/".$venues[$countvenues], 0755, true);	
		

 $uploadsDir = "../Venue Original Images/".$hotel."/".$venues[$countvenues]."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['brimages'.$nmm3]['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['brimages'.$nmm3]['name'][$id];
                $tempLocation    = $_FILES['brimages'.$nmm3]['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(true){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                      $sqlVal = "('".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','breakoutrooms')");
                    
                    
                    if($insert) {
                        
                       
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                       
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
		
		
		
		$nmm3=$nmm3+1;
}





$babzq=intval($_SESSION['counting'])+1;
    
   
  if(count($venues)>$babzq) 
  {
      $_SESSION['counting']=intval($_SESSION['counting'])+1;
      echo "<script>location.replace('addplanner2.php');</script>"; 
  }
  else{
       $_SESSION['counting']='0';
      echo "<script>location.replace('uploadorfp.php');</script>"; 
  }
   
   
    
}



 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1  align='center'>Info for <?php echo $venues[$_SESSION['counting']];?></h1>
<form action="#" method="post" enctype="multipart/form-data">
     



<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <textarea class='form-control' placeholder='Venue Info (Description)' name='venueinfo'></textarea>
        </div>
    </div>
</div>
<br/>
<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <textarea class='form-control' placeholder='Getting Here' name='gettinghere'></textarea>
            
        </div>
         <div class='col-sm'>
            <textarea class='form-control' placeholder='At a glance info' name='glance'></textarea>
        </div>
    </div>
</div>


<br/>
<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <select class='form-select' name='naturaldaylight'>
                <option selected disabled>Natural Daylight?</option>
                <option>Yes</option>
                <option>No</option>
                </select>
            
        </div>
         <div class='col-sm'>
            <input class='form-control' placeholder='Ceiling Height' name='ceilingheight'>
        </div>
        <div class='col-sm'>
            <input class='form-control' placeholder='Door Width Height' name='doorwidthheight'>
        </div>
    </div>
</div>

<br/>








<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <select class='form-select' name='carlaunch'>
                <option selected disabled>Car Launch Possible?</option>
                <option>Yes</option>
                <option>No</option>
                </select>
            <small style='color:red;'>*Vehicles can be displayed in Ballroom / Foyer*</small>
        </div>
       
        <div class='col-sm'>
            <input class='form-control' placeholder='Max Vehicle Size' name='vehiclewidthheight'>
            
        </div>
    </div>
</div>








<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <select class='form-select' name='smoking'>
                <option selected disabled>Smoking / Non Smoking?</option>
                <option>Non Smoking</option>
                <option>Smoking</option>
                </select>
            
        </div>
       
        <div class='col-sm'>
            <input class='form-control' placeholder='Social Distance' name='socialdistance'>
            <small>Last Renovated On</small>
        </div>
    </div>
</div>





<div class='container'>
    <div class='row'>
<div class='col-sm'>
    
            <input class='form-control' placeholder='Event Venue Address' name='venueaddress'>
        </div>
        <div class='col-sm'>
            
           <input class='form-control' type='date' name='lastrenovated'>
        </div>
        
       

  </div>
</div>







<br/>
<div class='container'>
    <div class='row'>
<div class='col-sm'>
            <input class='form-control' placeholder='Venue Rating' name='venuerating'>
        </div>
        <div class='col-sm'>
           <select class='form-select' name='outdoorindoor'>
                <option selected disabled>Outdoor / Indoor Venue?</option>
                <option>Outdoor</option>
                <option>Indoor</option>
                </select>
        </div>
        
       

  </div>
</div>


<br/>
<div class='container'>
    <div class='row'>

 <div class="form-group">
       <label>Past Events</label><br/>
         
<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='+'>

       </div> 



    </div>
</div>




<br/>
<div class='container'>
    <div class='row'>




 <div class="form-group">
       <label>Inclusions</label><br/>
            
       <?php
       $sqlv ="SELECT * FROM venueinclusions";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcard" name='vinclusions[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='vaddnc'>
    
</nonsense>


<input type='submit' id='vpds' onclick='vaddcardnew()' value='+'>

       </div> 















 </div>
</div>


<br/>
<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            <input class='form-control' type='number' onkeyup='addmeetings()' min='0' placeholder='# of Meeting Rooms' id='numberofmeetingrooms' name='numberofmeetingrooms'>
            
        </div>
         <div class='col-sm'>
             <input class='form-control' type='number'  onkeyup='addbanquets()' min='0' placeholder='# of Banquet' id='numberofbanquet' name='numberofbanquet'>
        </div>
         <div class='col-sm'>
             <input class='form-control' type='number'  onkeyup='addbreakouts()' min='0' placeholder='# of Breakout Rooms' id='numberofbreakout' name='numberofbreakout'>
        </div>
    </div>
</div>

<br/>


<nonsense id='meetings'>
    
</nonsense>

<br/>
<nonsense id='banquets'>
    
</nonsense>

<br/>
<nonsense id='breakouts'>
    
</nonsense>

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
    document.getElementById("vpds").addEventListener("click", function(event){
  event.preventDefault()
});

function vaddcardnew(){
   var parent=document.getElementById("vaddnc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','vinclusions[]');
   parent.appendChild(inpt);
    
}
</script>


<script>
    document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});

function addcardnew(){
   var parent=document.getElementById("addnc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards[]');
  
   
   parent.appendChild(inpt);
    
}
</script>

<script>
    function addmeetings(){
        var n=0;
        
        var container=document.getElementById('meetings');
        
        
        container.innerHTML='';
        
        var rooms=document.getElementById('numberofmeetingrooms').value;
        
        
        
        if(rooms=='' || rooms=='0')
        
        {
            container.innerHTML='';
        }
        
        else{
            
            
        
        
         var h1=document.createElement('h4');
         h1.setAttribute=('align','center');
         h1.innerHTML='Meeting Rooms';
        
        
        var table=document.createElement('TABLE');
        table.classList.add('table');
        table.classList.add('table-striped');
        table.classList.add('table-bordered');
        
       
        var thead=document.createElement('thead');
        var trh=document.createElement('tr');
        
        
         var th1=document.createElement('th');
         th1.innerHTML='Name';
         
         var th2=document.createElement('th');
         th2.innerHTML='Description';
         
         var th3=document.createElement('th');
         th3.innerHTML='Images';
            
            
            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th3);
            thead.appendChild(trh);
           
           
           
           
         var tbody=document.createElement('tbody');
         
        
            
            
        for(let i=0; i<rooms; i++)
        {
            var trb=document.createElement('tr');
           var trd1=document.createElement('td');
           var trd2=document.createElement('td');
           var trd3=document.createElement('td');
            
            
            
            
            
            
            var in1=document.createElement('INPUT');
            
            in1.classList.add('form-control');
            in1.setAttribute('placeholder','Name');
            in1.setAttribute('type','text');
            in1.setAttribute('name','mnames[]');
            
            
             var in2=document.createElement('TEXTAREA');
            
            in2.classList.add('form-control');
            in2.setAttribute('placeholder','Description');
            in2.setAttribute('name','mdescriptions[]');
            
             var in3=document.createElement('INPUT');
            
            in3.classList.add('form-control');
            in3.setAttribute('type','file');
            in3.setAttribute('multiple','true');
            in3.setAttribute('name','mimages'+n+'[]');
            
            
            
            
            
            trd1.appendChild(in1);
            trd2.appendChild(in2);
            trd3.appendChild(in3);
            trb.appendChild(trd1);
            trb.appendChild(trd2);
            trb.appendChild(trd3);
            tbody.appendChild(trb);
            n=n+1;
        }
        
        
       
        
         table.appendChild(thead);
        table.appendChild(tbody);
        container.appendChild(h1);
        container.appendChild(table);
        
        }
        
    }
</script>


<script>
    function addbanquets(){
        var n=0;
        
        var container=document.getElementById('banquets');
        
        
        container.innerHTML='';
        
        var rooms=document.getElementById('numberofbanquet').value;
        
        
        
        if(rooms=='' || rooms=='0')
        
        {
            container.innerHTML='';
        }
        
        else{
            
            
        
        
         var h1=document.createElement('h4');
         h1.setAttribute=('align','center');
         h1.innerHTML='Banquets';
        
        
        var table=document.createElement('TABLE');
        table.classList.add('table');
        table.classList.add('table-striped');
        table.classList.add('table-bordered');
        
       
        var thead=document.createElement('thead');
        var trh=document.createElement('tr');
        
        
         var th1=document.createElement('th');
         th1.innerHTML='Name';
         
         var th2=document.createElement('th');
         th2.innerHTML='Description';
         
         var th3=document.createElement('th');
         th3.innerHTML='Images';
            
            
            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th3);
            thead.appendChild(trh);
           
           
           
           
         var tbody=document.createElement('tbody');
         
        
            
            
        for(let i=0; i<rooms; i++)
        {
            var trb=document.createElement('tr');
           var trd1=document.createElement('td');
           var trd2=document.createElement('td');
           var trd3=document.createElement('td');
            
            
            
            
            
            
            var in1=document.createElement('INPUT');
            
            in1.classList.add('form-control');
            in1.setAttribute('placeholder','Name');
            in1.setAttribute('type','text');
            in1.setAttribute('name','bnames[]');
            
            
             var in2=document.createElement('TEXTAREA');
            
            in2.classList.add('form-control');
            in2.setAttribute('placeholder','Description');
            in2.setAttribute('name','bdescriptions[]');
            
             var in3=document.createElement('INPUT');
            
            in3.classList.add('form-control');
            in3.setAttribute('type','file');
            in3.setAttribute('multiple','true');
            in3.setAttribute('name','bimages'+n+'[]');
            
            
            
            
            
            trd1.appendChild(in1);
            trd2.appendChild(in2);
            trd3.appendChild(in3);
            trb.appendChild(trd1);
            trb.appendChild(trd2);
            trb.appendChild(trd3);
            tbody.appendChild(trb);
            n=n+1;
        }
        
        
       
        
         table.appendChild(thead);
        table.appendChild(tbody);
        container.appendChild(h1);
        container.appendChild(table);
        
        }
        
    }
</script>





<script>
    function addbreakouts(){
        var n=0;
        
        var container=document.getElementById('breakouts');
        
        
        container.innerHTML='';
        
        var rooms=document.getElementById('numberofbreakout').value;
        
        
        
        if(rooms=='' || rooms=='0')
        
        {
            container.innerHTML='';
        }
        
        else{
            
            
        
        
         var h1=document.createElement('h4');
         h1.setAttribute=('align','center');
         h1.innerHTML='Breakout Rooms';
        
        
        var table=document.createElement('TABLE');
        table.classList.add('table');
        table.classList.add('table-striped');
        table.classList.add('table-bordered');
        
       
        var thead=document.createElement('thead');
        var trh=document.createElement('tr');
        
        
         var th1=document.createElement('th');
         th1.innerHTML='Name';
         
         var th2=document.createElement('th');
         th2.innerHTML='Location';
         
          var th4=document.createElement('th');
         th4.innerHTML='Size';
         
         var th3=document.createElement('th');
         th3.innerHTML='Images';
            
            
            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th4);
            trh.appendChild(th3);
            thead.appendChild(trh);
           
           
           
           
         var tbody=document.createElement('tbody');
         
        
            
            
        for(let i=0; i<rooms; i++)
        {
            var trb=document.createElement('tr');
           var trd1=document.createElement('td');
           var trd2=document.createElement('td');
           var trd3=document.createElement('td');
           var trd4=document.createElement('td');
            
            
            
            
            
            
            var in1=document.createElement('INPUT');
            
            in1.classList.add('form-control');
            in1.setAttribute('placeholder','Name');
            in1.setAttribute('type','text');
            in1.setAttribute('name','brnames[]');
            
            
             var in2=document.createElement('TEXTAREA');
            
            in2.classList.add('form-control');
            in2.setAttribute('placeholder','Location');
            in2.setAttribute('name','brlocations[]');
            
             var in3=document.createElement('INPUT');
            
            in3.classList.add('form-control');
            in3.setAttribute('type','file');
            in3.setAttribute('multiple','true');
            in3.setAttribute('name','brimages'+n+'[]');
            
           
             var in4=document.createElement('INPUT');
            
            in4.classList.add('form-control');
            in4.setAttribute('type','number');
            in4.setAttribute('name','brsizes[]');  
            
            
            
            trd1.appendChild(in1);
            trd2.appendChild(in2);
            trd3.appendChild(in3);
             trd4.appendChild(in4);
            trb.appendChild(trd1);
            trb.appendChild(trd2);
            trb.appendChild(trd4);
            trb.appendChild(trd3);
            tbody.appendChild(trb);
            n=n+1;
        }
        
        
       
        
         table.appendChild(thead);
        table.appendChild(tbody);
        container.appendChild(h1);
        container.appendChild(table);
        
        }
        
    }
</script>


















<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>











</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

