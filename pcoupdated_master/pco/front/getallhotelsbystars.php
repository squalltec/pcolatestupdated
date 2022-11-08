<?php

session_start();
include("db_connection.php");
$idz=array();



$hn=$_SESSION['hotel'];
$start=$_SESSION['sdate'];
$end=$_SESSION['edate'];
$country=$_SESSION['country'];
$city=$_SESSION['city'];
$event=$_SESSION['event'];

$category=$_POST['category'];

if($category=='all'){
    
    
$repetition='';

$data=array();	
$sqllas = "SELECT * FROM events WHERE country='$country' && location='$city' && event='$event' GROUP BY hotel";
 
 $result=$conn->query($sqllas);
 

while($row=mysqli_fetch_assoc($result)){
     $abc=0;
    $hotna=$row['hotel'];
    
    
    $sqllase = "SELECT * FROM hotels WHERE name='$hotna'";
 
 $resulte=$conn->query($sqllase);
 

while($rowe=mysqli_fetch_assoc($resulte)){
    
    $imgr=$rowe['image'];
     $dessc=$rowe['description'];
    $caty=$rowe['category'];
}
    
    
    
    
    
   $hnamee=$row['hotel']; 
    
    
    
    
    
    
    echo '
	
	 <li>
        <div class="results-container clearfix">
          <div class="results-image"><img src="../Hotel Images/'.$hnamee.'/'.$imgr.'" alt="hotel-image"></div><!-- /end results-container-image -->
          <div class="results-inside">
            <h1 class="color-1">'.$hnamee.'';
           
            $lim=intval($caty);
            for ($x = 0; $x < $lim; $x++) {
            
            echo '<img src="img/star-ratings.png">';
        
            }
           
           echo '<p class="address">'.$_SESSION["country"].'</p>';
             echo '<h6>';
  
        
$sqllv ="SELECT * FROM facilities WHERE hotel='$hnamee' && country='$country' && location='$city'";
		$resulttv = $conn->query($sqllv);

if ($resulttv->num_rows > 0) {
  
  while($rowwv = $resulttv->fetch_assoc()) {
      
    echo '<input style="font-size:1.3vh; width:100px;" class="btn color-1 hover-normal" type="button" value="'.$rowwv['facilities'].'">';
     
  
  }
}
           
            echo '</h6>';
            
            
            
            
         echo '</h1><hr />
            <p class="address">'.$_SESSION["country"].'</p>
            <p class="description">'.$dessc.'</p>
            <i><a href="hotelmoreinfo.php?nam='.$hnamee.'" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i><!-- /end results-container-inside -->
            <!--<i><a href="hotelmoreinfo.php" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i>--> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">';
          
           
        
        echo "<br/>";
       
      echo '
      
      
          
       <p style="margin-top:-30px;"> '.$country.',
              '.$city.'<br/><br/></p>
      <img style="width:20px;" src="aeroplaneicon.png"> 10 KM
       <img style="width:20px;" src="trainicon.png"> 1 KM<br/><br/>
        <img style="width:20px;" src="worldtradecentericon.png"> 5 KM
        
        
        
        <form action="#" method="POST">
       
        <br/>
          <input name="naz" style="display:none;" id="n'.$abc.'" value="'.$hnamee.'">  
        <button type="submit" name="submit" class="btn color-1 hover-normal">Select</button>
        
       </form>
     
            <!--<a class="btn color-1 hover-normal fancybox fancybox.iframe" id="button" href="hotelmoreinfo.php">Select</a>--></div><!-- /end results-container-inside-rate -->
          </div>
      </li>
     
	';
	$abc=$abc+1;
	

}
	
}
	
	
	
	
	
	
	
else{
    
    $abc=0;
    
$repetition='';

$data=array();	
$sqllas = "SELECT * FROM events WHERE country='$country' && location='$city' && event='$event' GROUP BY hotel";
 
 $result=$conn->query($sqllas);
 

while($row=mysqli_fetch_assoc($result)){
    
    $hotna=$row['hotel'];
    
    
    $sqllase = "SELECT * FROM hotels WHERE name='$hotna' && category='$category'";
 
 $resulte=$conn->query($sqllase);
 

while($rowe=mysqli_fetch_assoc($resulte)){
    
    $imgr=$rowe['image'];
     $dessc=$rowe['description'];
    $caty=$rowe['category'];

    
    
    
    
    
   $hnamee=$row['hotel']; 
    
    
    
    
    
    
    echo '
	
	 <li>
        <div class="results-container clearfix">
          <div class="results-image"><img src="../Hotel Images/'.$hnamee.'/'.$imgr.'" alt="hotel-image"></div><!-- /end results-container-image -->
          <div class="results-inside">
            <h1 class="color-1">'.$hnamee.'';
           
            $lim=intval($caty);
            for ($x = 0; $x < $lim; $x++) {
            
            echo '<img src="img/star-ratings.png">';
        
            }
            echo '<p class="address">'.$_SESSION["country"].'</p>';
             echo '<h6>';
  
        
$sqllv ="SELECT * FROM facilities WHERE hotel='$hnamee' && country='$country' && location='$city'";
		$resulttv = $conn->query($sqllv);

if ($resulttv->num_rows > 0) {
  
  while($rowwv = $resulttv->fetch_assoc()) {
      
    echo '<input style="font-size:1.3vh; width:100px;" class="btn color-1 hover-normal" type="button" value="'.$rowwv['facilities'].'">';
     
  
  }
}
           
            echo '</h6>';
            
            
            
            
            
            
            
            
            
           
         echo '</h1><hr />
            
            <p class="description">'.$dessc.'</p>
            <i><a href="hotelmoreinfo.php?nam='.$hnamee.'" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i> <!-- /end results-container-inside -->
            <!--<i><a href="hotelmoreinfo.php" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i>--> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">';
       
       
        echo "<br/>";
       
      echo '
      
      
       <p style="margin-top:-30px;"> '.$country.',
              '.$city.'<br/><br/></p>
      <img style="width:20px;" src="aeroplaneicon.png"> 10 KM
       <img style="width:20px;" src="trainicon.png"> 1 KM<br/><br/>
        <img style="width:20px;" src="worldtradecentericon.png"> 5 KM
        
        
        
       
         <form action="#" method="POST">
       
        <br/>
         <input name="naz" style="display:none;" id="n'.$abc.'" value="'.$hnamee.'">
        <button type="submit" name="submit" class="btn color-1 hover-normal">Select</button>
        
       </form>
             <!-- <a class="btn color-1 hover-normal fancybox fancybox.iframe" id="button" href="hotelmoreinfo.php">Select</a>--></div><!-- /end results-container-inside-rate -->
          
          
          </div>
      </li>
     
	';
	
$abc=$abc+1;
}
}
}





?>