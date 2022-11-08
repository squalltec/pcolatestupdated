<?php

include 'db_connection.php';
session_start();

include 'header.php';

$hotel=$_GET['hotel'];
$country=$_GET['country'];
$city=$_GET['city'];
$venue=$_GET['venue'];












if(isset($_POST['update']))
{
    
   
   
     $area=$_POST['area'];
     $dimension=$_POST['dimension'];
     $location=$_POST['location'];
     $venueinfo=$_POST['venueinfo'];
     $gettinghere=$_POST['gettinghere'];
     $glance=$_POST['glance'];
     $venueaddress=$_POST['venueaddress'];
     $lastrenovated=$_POST['lastrenovated'];
     $venuerating=$_POST['venuerating'];
     $outdoorindoor=$_POST['outdoorindoor'];
     $naturaldaylight=$_POST['naturaldaylight'];
     $ceilingheight=$_POST['ceilingheight'];
     $doorwidthheight=$_POST['doorwidthheight'];
     $carlaunch=$_POST['carlaunch'];
     $vehiclewidthheight=$_POST['vehiclewidthheight'];
     $socialdistance=$_POST['socialdistance'];
     $smoking=$_POST['smoking'];
     $availablepower=$_POST['availablepower'];
     $distancedb=$_POST['distancedb'];
     $stage=$_POST['stage'];
     $stageblocks=$_POST['stageblocks'];
     $carpets=$_POST['carpets'];
     $hangingpoints=$_POST['hangingpoints'];
     $numberofhanging=$_POST['numberofhanging'];
     $venueavailabilityprior=$_POST['venueavailabilityprior'];
     $mixer=$_POST['mixer'];
     $welcomecarpet=$_POST['welcomecarpet'];
     $mictype=$_POST['mictype'];
     $chargedfreemic=$_POST['chargedfreemic'];
     $projectortype=$_POST['projectortype'];
     $projectorlumens=$_POST['projectorlumens'];
     $mobilemounted=$_POST['mobilemounted'];
     $backfront=$_POST['backfront'];
     $speakertype=$_POST['speakertype'];
     $decibels=$_POST['decibels'];
     $dancefloorsize=$_POST['dancefloorsize'];
     $dancefloormaterial=$_POST['dancefloormaterial'];
     $dancefloorcost=$_POST['dancefloorcost'];
     $skirtingsize=$_POST['skirtingsize'];
     $skirtingpodium=$_POST['skirtingpodium'];
     $theater=$_POST['theater'];
     $classroom=$_POST['classroom'];
     $cabaret=$_POST['cabaret'];
     $boardroom=$_POST['boardroom'];
     $ushape=$_POST['ushape'];
     $banquetdinner=$_POST['banquetdinner'];
     $cocktailreception=$_POST['cocktailreception'];
     
     
     
     //inclusions
     $conferencepackaginginclusions=$_POST['conferencepackaginginclusions'];
     $conferencepackaginginclusions= implode(",",$conferencepackaginginclusions);
     
     
     $vinclusions=$_POST['vinclusions'];
     $vinclusions= implode(",",$vinclusions);
     
  //arrays
     $carpetcolors=$_POST['carpetcolors'];
     $carpetcolors= implode(",",$carpetcolors);
     
     $locationhp=$_POST['locationhp'];
     $locationhp= implode(",",$locationhp);
     
     $hpaccessiblethrough=$_POST['hpaccessiblethrough'];
     $hpaccessiblethrough= implode(",",$hpaccessiblethrough);
     
     
     $hpchargedincluded=$_POST['hpchargedincluded'];
     $hpchargedincluded= implode(",",$hpchargedincluded);
     
     $cocktailtablesize=$_POST['cocktailtablesize'];
     $cocktailtablesize= implode(",",$cocktailtablesize);
     
     
     $roundtablesize=$_POST['roundtablesize'];
     $roundtablesize= implode(",",$roundtablesize);
     
     
     $chairssize=$_POST['chairssize'];
     $chairssize= implode(",",$chairssize);
     
     
     $tableclothsize=$_POST['tableclothsize'];
     $tableclothsize= implode(",",$tableclothsize);
     
     
     $tableclothcolors=$_POST['tableclothcolors'];
     $tableclothcolors= implode(",",$tableclothcolors);
     
     
     $runnersize=$_POST['runnersize'];
     $runnersize= implode(",",$runnersize);
     
     
     $runnercolors=$_POST['runnercolors'];
     $runnercolors= implode(",",$runnercolors);
     
     
     $centerpiecetype=$_POST['centerpiecetype'];
     $centerpiecetype= implode(",",$centerpiecetype);
     
     
     $centerpiecesize=$_POST['centerpiecesize'];
     $centerpiecesize= implode(",",$centerpiecesize);
     
     $pastevents=$_POST['pastevents'];
     $pastevents= implode(",",$pastevents);
     
                     
$sql ="UPDATE meetingbanquetplanner SET area='$area',dimension='$dimension',location='$location',venueinfo='$venueinfo',gettinghere='$gettinghere',glance='$glance',venueaddress='$venueaddress',lastrenovated='$lastrenovated',venuerating='$venuerating',outdoorindoor='$outdoorindoor',naturaldaylight='$naturaldaylight',ceilingheight='$ceilingheight',doorwidthheight='$doorwidthheight',carlaunch='$carlaunch',vehiclewidthheight='$vehiclewidthheight',socialdistance='$socialdistance',smoking='$smoking',availablepower='$availablepower',distancedb='$distancedb',stage='$stage',stageblocks='$stageblocks',carpets='$carpets',hangingpoints='$hangingpoints',numberofhanging='$numberofhanging',venueavailabilityprior='$venueavailabilityprior',mixer='$mixer',welcomecarpet='$welcomecarpet',chargedfreemic='$chargedfreemic',projectortype='$projectortype',projectorlumens='$projectorlumens',mobilemounted='$mobilemounted',backfront='$backfront',speakertype='$speakertype',decibels='$decibels',dancefloorsize='$dancefloorsize',dancefloormaterial='$dancefloormaterial',dancefloorcost='$dancefloorcost',skirtingsize='$skirtingsize',skirtingpodium='$skirtingpodium',theater='$theater',classroom='$classroom',cabaret='$cabaret',boardroom='$boardroom',ushape='$ushape',banquetdinner='$banquetdinner',cocktailreception='$cocktailreception',conferencepackaginginclusions='$conferencepackaginginclusions',vinclusions='$vinclusions',carpetcolors='$carpetcolors',locationhp='$locationhp',hpaccessiblethrough='$hpaccessiblethrough',hpchargedincluded='$hpchargedincluded',cocktailtablesize='$cocktailtablesize',roundtablesize='$roundtablesize',chairssize='$chairssize',tableclothsize='$tableclothsize',tableclothcolors='$tableclothcolors',runnersize='$runnersize',runnercolors='$runnercolors',centerpiecetypes='$centerpiecetype',centerpiecesizes='$centerpiecesize',pastevents='$pastevents' WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 $_SESSION['alertme']=1;
 
 
// echo "<script>location.replace('managehotel.php');</script>";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}   
       



    
     
     

     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     

mkdir("../Venue Original Images/".$hotel."/".$venue, 0755, true);	
		

 $uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['theaterimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['theaterimages']['name'][$id];
                $tempLocation    = $_FILES['theaterimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','theater')");
                    
                    
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
		
		








$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['classroomimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['classroomimages']['name'][$id];
                $tempLocation    = $_FILES['classroomimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','classroom')");
                    
                    
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
		






$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['cabaretimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['cabaretimages']['name'][$id];
                $tempLocation    = $_FILES['cabaretimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','cabaret')");
                    
                    
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
		











$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['boardroomimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['boardroomimages']['name'][$id];
                $tempLocation    = $_FILES['boardroomimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','boardroom')");
                    
                    
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
		








$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['ushapeimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['ushapeimages']['name'][$id];
                $tempLocation    = $_FILES['ushapeimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','ushape')");
                    
                    
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
		









$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['banquetimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['banquetimages']['name'][$id];
                $tempLocation    = $_FILES['banquetimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','banquet')");
                    
                    
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
		










$uploadsDir = "../Venue Original Images/".$hotel."/".$venue."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['cocktailimages']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['cocktailimages']['name'][$id];
                $tempLocation    = $_FILES['cocktailimages']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','cocktail')");
                    
                    
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
		




     
     
   
   
}

    
?>







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">





<main class='page-content'>
    
    <h4 align='center'>Update <?php echo $venue;?></h4>
    
    
  
  <form action='#' method='POST' enctype="multipart/form-data">
      
    
    <?php
    
$sql1 ="SELECT * FROM meetingbanquetplanner WHERE venue='$venue' && hotel='$hotel' && city='$city' && country='$country'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
     while($row = $result1->fetch_assoc()) {
  ?>
  
  <br/>
   <div class='row'>
    <div class='col-sm'>
        <label>Area</label>
        <input class='form-control' name='area' value='<?php echo $row['area'];?>'>
    </div>
    <div class='col-sm'>
        <label>Dimension</label>
        <input class='form-control' name='dimension' value='<?php echo $row['dimension'];?>'>
    </div>
    
     <div class='col-sm'>
        <label>Location</label>
        <input class='form-control' name='location' value='<?php echo $row['location'];?>'>
    </div>
    
    </div>
  <br/>
     <div class='row'>
    <div class='col-sm'>
        <label>Venue Info</label>
        <textarea class='form-control' rows='5' name='venueinfo' ><?php echo $row['venueinfo'];?></textarea>
    </div>
    <div class='col-sm'>
        <label>Getting Here</label>
        <textarea class='form-control' rows='5' name='gettinghere'><?php echo $row['gettinghere'];?></textarea>
    </div>
    
     <div class='col-sm'>
        <label>At Glance</label>
        <textarea class='form-control' rows='5' name='glance'><?php echo $row['glance'];?></textarea>
    </div>
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
     <br/>
     <div class='row'>
  
      <div class='col-sm'>
        <label>Venue Address</label>
        <input class='form-control' name='venueaddress' value='<?php echo $row['venueaddress'];?>'>
    </div>
    
     <div class='col-sm'>
        <label>Last Renovated</label>
        <input type='date' class='form-control' name='lastrenovated' value='<?php echo $row['lastrenovated'];?>'>
    </div>
    
      <div class='col-sm'>
        <label>Venue Rating</label>
        <input class='form-control' name='venuerating' value='<?php echo $row['venuerating'];?>'>
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     <br/>
     <div class='row'>
         
         
         
         
          <div class='col-sm'>
        <label>Outdoor/Indoor</label>
        <select class='form-control' name='outdoorindoor'>
            <option>
                <?php echo $row['outdoorindoor'];?>
            </option>
            
              <option>
                <?php if($row['outdoorindoor']=='Outdoor')
                {
                echo 'Indoor';
                }
                else{
                echo 'Outdoor';
                }?>
            </option>
        </select>
    </div>  
         
         
         
         
         
         
         
    <div class='col-sm'>
        <label>Natural Daylight</label>
        <select class='form-control' name='naturaldaylight'>
            <option>
                <?php echo $row['naturaldaylight'];?>
            </option>
            
              <option>
                <?php if($row['naturaldaylight']=='Yes')
                {
                echo 'No';
                }
                else{
                echo 'Yes';
                }?>
            </option>
        </select>
    </div>
    <div class='col-sm'>
        <label>Ceiling Height</label>
        <input class='form-control' name='ceilingheight' value='<?php echo $row['ceilingheight'];?>'>
    </div>
    
    
    
    </div>
  
    
     <br/>
     <div class='row'>
          <div class='col-sm'>
        <label>Door Size</label>
        <input class='form-control' name='doorwidthheight' value='<?php echo $row['doorwidthheight'];?>'>
    </div>
    
    <div class='col-sm'>
        <label>Car Launch</label>
        <select class='form-control' name='carlaunch'>
            <option>
                <?php echo $row['carlaunch'];?>
            </option>
            
              <option>
                <?php if($row['carlaunch']=='Yes')
                {
                echo 'No';
                }
                else{
                echo 'Yes';
                }?>
            </option>
        </select>
    </div>
  
     <div class='col-sm'>
        <label>Vehicle Size</label>
        <input class='form-control' name='vehiclewidthheight' value='<?php echo $row['vehiclewidthheight'];?>'>
    </div>
    
    
    
    </div>
    
    
    
    
    
    
    
   <br/>
     <div class='row'>
          <div class='col-sm'>
        <label>Social Distance</label>
        <input class='form-control' name='socialdistance' value='<?php echo $row['socialdistance'];?>'>
    </div>
    
    <div class='col-sm'>
        <label>Smoking / Non Smoking</label>
        <select class='form-control' name='smoking'>
            <option>
                <?php echo $row['smoking'];?>
            </option>
            
              <option>
                <?php if($row['smoking']=='Non Smoking')
                {
                echo 'Smoking';
                }
                else{
                echo 'Non Smoking';
                }?>
            </option>
        </select>
    </div>
    </div>  
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    
    
   <br/>
     <div class='row'>
        
    <div class='col-sm'>
        <label>Available Power</label>
        <select class='form-control' name='availablepower'>
            <option>
                <?php echo $row['availablepower'];?>
            </option>
            
             <?php if($row['availablepower']=='120AMPS 3PHASE')
                {
                echo '<option>63AMPS 3PHASE</option>';
                 echo '<option>32AMPS 3PHASE</option>';
                }
               ?>
               
                <?php if($row['availablepower']=='63AMPS 3PHASE')
                {
                echo '<option>120AMPS 3PHASE</option>';
                 echo '<option>32AMPS 3PHASE</option>';
                }
               ?>
           
                <?php if($row['availablepower']=='32AMPS 3PHASE')
                {
                echo '<option>120AMPS 3PHASE</option>';
                 echo '<option>63AMPS 3PHASE</option>';
                }
               ?>
        </select>
    </div>
    
        <div class='col-sm'>
        <label>Distance from DB</label>
        <input class='form-control' name='distancedb' value='<?php echo $row['distancedb'];?>'>
    </div>
    </div>  
    
    
    
    
    
    
    
    
    
    
    
    
        
   <br/>
     <div class='row'>
         
          <div class='col-sm'>
        <label>Stage</label>
        <select class='form-control' name='stage'>
            <option>
                <?php echo $row['stage'];?>
            </option>
            
              <option>
                <?php if($row['stage']=='Yes')
                {
                echo 'No';
                }
                else{
                echo 'Yes';
                }?>
            </option>
        </select>
    </div>
    
          <div class='col-sm'>
        <label>Stage Blocks</label>
        <input class='form-control' name='stageblocks' value='<?php echo $row['stageblocks'];?>'>
    </div>
    </div>  
    
    
    
    
    <br/>
     <div class='row'>
         
          <div class='col-sm'>
        <label>Carpets</label>
        <select class='form-control' name='carpets'>
            <option>
                <?php echo $row['carpets'];?>
            </option>
            
              <option>
                <?php if($row['carpets']=='Yes')
                {
                echo 'No';
                }
                else{
                echo 'Yes';
                }?>
            </option>
        </select>
    </div>
    
       <div class='col-sm'>
           <label>Carpet Colors</label>
           <input name='carpetcolors[]' id='rts' class='form-control' value='<?php echo $row['carpetcolors'];;?>' placeholder='Colors'>
        </div>
    </div>  
    
    
    
    
    
    
    
    
    
    
    
    
      <br/>
     <div class='row'>
          <div class='col-sm'>
        <label>Hanging Points</label>
        <select class='form-control' name='hangingpoints'>
            <option>
                <?php echo $row['hangingpoints'];?>
            </option>
            
              <option>
                <?php if($row['hangingpoints']=='Yes')
                {
                echo 'No';
                }
                else{
                echo 'Yes';
                }?>
            </option>
        </select>
    </div>
    
     <div class='col-sm'>
        <label># of Hanging Points</label>
        <input class='form-control' id='hps' name='numberofhanging' value='<?php echo $row['numberofhanging'];?>'>
    </div>
    
    </div>  
    
    
    <br/>
    
    <?php
    $locations=$row['locationhp'];
    $accessiblethrough=$row['hpaccessiblethrough'];
    $chargedincluded=$row['hpchargedincluded'];
    
    $locations=explode(",",$locations);
    
    $accessiblethrough=explode(",",$accessiblethrough);
    
    $chargedincluded=explode(",",$chargedincluded);
 
     
    if($row['numberofhanging']=='0' || $row['numberofhanging']=='')
    {
        
    ?>
    <div id='labelshp' style='display:none;' >
        <div class='row'>
          <div class='col-sm'>
        <label>Locations of Hanging Points</label>
    </div>
      <div class='col-sm'>
        <label>Accessible Through</label>
    </div>
     <div class='col-sm'>
        <label>Charged / Included</label>
    </div>
    </div> 
    </div>
    <?php
    }
    else
    {
        ?>
        <div id='labelshp' style='display:block;'>
               <div class='row'>
          <div class='col-sm'>
        <label>Locations of Hanging Points</label>
    </div>
      <div class='col-sm'>
        <label>Accessible Through</label>
    </div>
     <div class='col-sm'>
        <label>Charged / Included</label>
    </div>
    </div> 
    </div>
        
        <?php
        
    }
    ?>
    
    
    
    
    
   <nonsense id='hangingpoints'>
    
    <?php
    
      
    if($locations[0]!='')
    {
   
    $n=0;
    foreach($locations as $loca)
    {
    ?>
     <div class='row'>
          <div class='col-sm'>
        <input class='form-control' name='locationhp[]' value='<?php echo $locations[$n];?>'>
    </div>
      <div class='col-sm'>
        <input class='form-control' list='at' name='hpaccessiblethrough[]' value='<?php echo $accessiblethrough[$n];?>'>
    </div>
    <div class='col-sm'>
        <input class='form-control' list='ci' name='hpchargedincluded[]' value='<?php echo $chargedincluded[$n];?>'>
    </div>
    </div>  
    <?php
    $n=$n+1;
    }
    
    }
    ?>
    
    
    </nonsense>
    
    
    
    
    
    
    
    
    
    
    <br/>

    <div class='row'>
        <h6 align='center'>Tables Sizes</h6>
        <div class='col-sm'>
           <input name='classroomtablesize[]' id='crts' class='form-control'  value='<?php echo $row['classroomtablesize'];?>' placeholder='Classroom Table Size'>
        </div>
        
        <div class='col-sm'>
           <input name='cocktailtablesize[]' id='cots' class='form-control' value='<?php echo $row['cocktailtablesize'];?>' placeholder='Cocktail Table Size'>
        </div>
        
        <div class='col-sm'>
           <input name='roundtablesize[]' id='rts' class='form-control' value='<?php echo $row['roundtablesize'];?>' placeholder='Round Table Size'>
        </div>
      
    </div>

    
    
    
    
      
    
    <br/>

    <div class='row'>
        <h6 align='center'>Chairs Sizes</h6>
        <div class='col-sm'>
           <input name='chairssize[]' id='crts' class='form-control'  value='<?php echo $row['chairssize'];?>' placeholder='Chairs Size'>
        </div>
        
     
      
    </div>

    
    
    
    
    <br/>

    <div class='row'>
        <h6 align='center'>Tables Cloth</h6>
        <div class='col-sm'>
           <input name='tableclothsize[]' id='crts' class='form-control'  value='<?php echo $row['tableclothsize'];?>' placeholder='Table Cloth Sizes'>
        </div>
        
       
        
        <div class='col-sm'>
           <input name='tableclothcolors[]' id='rts' class='form-control' value='<?php echo $row['tableclothcolors'];?>' placeholder='Colors'>
        </div>
      
    </div>

    
    
       
    <br/>

    <div class='row'>
        <h6 align='center'>Runners</h6>
        <div class='col-sm'>
           <input name='runnersize[]' id='crts' class='form-control'  value='<?php echo $row['runnersize'];?>' placeholder='Runner Sizes'>
        </div>
        
       
        
        <div class='col-sm'>
           <input name='runnercolors[]' id='rts' class='form-control' value='<?php echo $row['runnercolors'];?>' placeholder='Colors'>
        </div>
      
    </div>

    
    
    
    
       
       
    <br/>

    <div class='row'>
        <h6 align='center'>Center Pieces</h6>
        <div class='col-sm'>
           <input name='centerpiecetype[]' id='crts' class='form-control'  value='<?php echo $row['centerpiecetype'];?>' placeholder='Center Pieces Types'>
        </div>
        
       
        
        <div class='col-sm'>
           <input name='centerpiecesize[]' id='rts' class='form-control' value='<?php echo $row['centerpiecesize'];?>' placeholder='Sizes'>
        </div>
      
    </div>

    
    
    <br/>
    
    <div class="row">
        
         <h6 align='center'>Accessibility</h6>
        
<div class="col-sm">
<input class="form-control" value='<?php echo $row['venueavailabilityprior'];?>' list="avails" placeholder="Venue Availability Prior to Event" name="venueavailabilityprior">
</div>
<datalist id="avails">
<option>1 Hour</option>
<option>2 Hours</option>
<option>1 Day</option>
</datalist>
<div class="col-sm">
<input class="form-control" value='<?php echo $row['accessibilitytimming'];?>'  placeholder="Accessibility Timing" name="accessibilitytimming">
</div>
</div>
    
    
    
    
    
    
    
    
     <br/>
    
    <div class="row">
        
         <h6 align='center'>AVR Inclusions</h6>
        
<div class="col-sm">
    <label>Mixer</label>
<select class="form-control" name="mixer">
    <?php
    if($row['mixer']=='Yes')
    {
         echo '<option>Yes</option>';
       echo '<option>No</option>';
    }
     else if($row['mixer']=='No')
    {
         echo '<option>No</option>';
       echo '<option>Yes</option>';
    }
    else{
         echo '<option>No</option>';
       echo '<option>Yes</option>';
    }
    ?>
    
    </select>
</div>

<div class="col-sm">
       <label>Welcome Carpet</label>
<select class="form-control" name="welcomecarpet">
    <?php
    if($row['welcomecarpet']=='Yes')
    {
        echo '<option>Yes</option>';
       echo '<option>No</option>';
       
    }
     else if($row['mixer']=='No')
    {
         
       echo '<option>No</option>';
       echo '<option>Yes</option>';
    }
    else{
        echo '<option>No</option>';
       echo '<option>Yes</option>';
    }
    ?>
    
    </select>
</div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     <br/>
    
    <div class="row">
        
         <h6 align='center'>Microphones</h6>
        
<div class="col-sm">
    <label>Mic Type</label>
<input class="form-control" value='<?php echo $row['mictype'];?>'  placeholder="MIC Type" name="mictype">
</div>

<div class="col-sm">
       <label>Charged/Free</label>
<select class="form-control" name="chargedfreemic">
    <?php
    if($row['chargedfreemic']=='Charged')
    {
        echo '<option>Charged</option>';
       echo '<option>Free</option>';
       
    }
     else if($row['chargedfreemic']=='Free')
    {
         
       echo '<option>Free</option>';
       echo '<option>Charged</option>';
    }
    else{
         echo '<option>Charged/Free?</option>';
        echo '<option>Free</option>';
       echo '<option>Charged</option>';
       
    }
    ?>
    
    </select>
</div>
</div>
    
    
    
    
    
    
    
    
   
     <br/>
    
    <div class="row">
        
         <h6 align='center'>Projectors</h6>
        
<div class="col-sm">
    <label>Projector Type</label>
<input class="form-control" value='<?php echo $row['projectortype'];?>'  placeholder="Projector Type" name="projectortype">
</div>

<div class="col-sm">
    <label>Projector Lumens</label>
<input class="form-control" value='<?php echo $row['projectorlumens'];?>'  placeholder="Projector Lumens" name="projectorlumens">
</div>



<div class="col-sm">
       <label>Mobile/Mounted</label>
<select class="form-control" name="mobilemounted">
    <?php
    if($row['mobilemounted']=='Mobile')
    {
        echo '<option>Mobile</option>';
       echo '<option>Mounted</option>';
       
    }
     else if($row['mobilemounted']=='Mounted')
    {
         
       echo '<option>Mounted</option>';
       echo '<option>Mobile</option>';
    }
    else{
         echo '<option>Mobile/Mounted?</option>';
        echo '<option>Mobile</option>';
       echo '<option>Mounted</option>';
       
    }
    ?>
    
    </select>
</div>





<div class="col-sm">
       <label>Back/Front Projection</label>
<select class="form-control" name="backfront">
    <?php
    if($row['backfront']=='Back')
    {
        echo '<option>Back</option>';
       echo '<option>Front</option>';
       
    }
     else if($row['backfront']=='Front')
    {
         
       echo '<option>Front</option>';
       echo '<option>Back</option>';
    }
    else{
         echo '<option>Back/Front?</option>';
       echo '<option>Front</option>';
       echo '<option>Back</option>';
       
    }
    ?>
    
    </select>
</div>


</div>
     
    
    
    
    
    
    
    
    
     <br/>
    
    <div class="row">
        
         <h6 align='center'>Speakers</h6>
        
<div class="col-sm">
    <label>Speaker Type</label>
<input class="form-control" value='<?php echo $row['speakertype'];?>'  placeholder="Speaker Type" name="speakertype">
</div>

<div class="col-sm">
      <label>Decibels</label>
<input class="form-control" value='<?php echo $row['decibels'];?>'  placeholder="Decibels" name="decibels">
</div>
</div>
    
    
    
    
     <br/>
    
    <div class="row">
        
         <h6 align='center'>Dance Floor</h6>
        
<div class="col-sm">
    <label>Size</label>
<input class="form-control" value='<?php echo $row['dancefloorsize'];?>'  placeholder="Size" name="dancefloorsize">
</div>

<div class="col-sm">
    <label>Material</label>
<input class="form-control" value='<?php echo $row['dancefloormaterial'];?>'  placeholder="Material" name="dancefloormaterial">
</div>

<div class="col-sm">
    <label>Cost</label>
<input class="form-control" value='<?php echo $row['dancefloorcost'];?>'  placeholder="Cost" name="dancefloorcost">
</div>

</div>
     
    
    
    
      
     <br/>
    
    <div class="row">
        
         <h6 align='center'>Skirting</h6>
        
<div class="col-sm">
    <label>Size</label>
<input class="form-control" value='<?php echo $row['skirtingsize'];?>'  placeholder="Size" name="skirtingsize">
</div>

<div class="col-sm">
    <label>Podium</label>
<input class="form-control" value='<?php echo $row['skirtingpodium'];?>'  placeholder="Podium" name="skirtingpodium">
</div>

</div>
     
     
     
     
     
     
     
     
     
     
     
     <br/>
 
    <div class='row'>

 <div class="form-group">
       <label>Conference packaging inclusions</label><br/>
         
         
         
         
           <?php
           $cpi=$row['conferencepackaginginclusions'];
           
       $sqlv ="SELECT * FROM venueconferencepackaginginclusions";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
     if (strpos($cpi, $rowv['name']) !== false) { 
     
      
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input name='conferencepackaginginclusions[]' checked type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
      }
      else{
          ?>
           <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input name='conferencepackaginginclusions[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
          <?php
      }
  }
}
?>
          
         
<nonsense id='addnc2'>
    
</nonsense>


<input type='submit' id='pds2' class='btn btn-danger' onclick='addcardnew2()' value='+'>

       </div> 



    </div>










     
     
     <br/>
 
    <div class='row'>

 <div class="form-group">
       <label>Past Events</label><br/>
         
         
         
         
           <?php
           
           $pes=$row['pastevents'];
           
           $pesarr = explode(",", $pes);
           
           foreach($pesarr as $pp)
           {
      ?>
      
       
       <input name='pastevents[]' type='text' class='form-control' value='<?php echo $pp;?>'>
       
      
       
          <?php
           }
           ?>
         
<nonsense id='addnc2pe'>
    
</nonsense>


<input type='submit' id='pds2pe' class='btn btn-danger' onclick='addcardnew2pe()' value='+'>

       </div> 



    </div>












     
     
     
     <br/>
 
    <div class='row'>

 <div class="form-group">
       <label>inclusions</label><br/>
         
         
         
         
           <?php
           $cpi=$row['vinclusions'];
           
       $sqlv ="SELECT * FROM venueinclusions";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
     if (strpos($cpi, $rowv['name']) !== false) { 
     
      
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input name='vinclusions[]' checked type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
      }
      else{
          ?>
           <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input name='vinclusions[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
          <?php
      }
  }
}
?>
          
         
<nonsense id='addnc2vi'>
    
</nonsense>


<input type='submit' id='pds2vi' class='btn btn-danger' onclick='addcardnew2vi()' value='+'>

       </div> 



    </div>








    
    
     <br/>
     
     
    <div class="row">
        
         <h6 align='center'>Pax each Style</h6>
        
<div class="col-sm">
    <label>Theater Style</label>
<input class="form-control" value='<?php echo $row['theater'];?>'  placeholder="Theater Pax" name="theater">
</div>

<div class="col-sm">
    <label>Theater Images</label>
    <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='theater'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>


<div class="col-sm">
    <label>Upload Theater Style Images</label>
    <input type='file' name='theaterimages[]' multiple class='form-control' accept='image/*'>
    
    </div>
    
    
</div>
    
    
      <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Classroom Style</label>
<input class="form-control" value='<?php echo $row['classroom'];?>'  placeholder="Classroom Pax" name="classroom">
</div>



<div class="col-sm">
    <label>Classroom Images</label>
     <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='classroom'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>


<div class="col-sm">
    <label>Upload Classroom Style Images</label>
    <input type='file' name='classroomimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    
</div>
    

      <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Cabaret Style</label>
<input class="form-control" value='<?php echo $row['cabaret'];?>'  placeholder="Cabaret Pax" name="cabaret">
</div>



<div class="col-sm">
    <label>Cabaret Images</label>
     <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='cabaret'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>


<div class="col-sm">
    <label>Upload Cabaret Style Images</label>
    <input type='file' name='cabaretimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    

</div>
    

    <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Boardroom Style</label>
<input class="form-control" value='<?php echo $row['boardroom'];?>'  placeholder="Boardroom Pax" name="boardroom">
</div>


<div class="col-sm">
    <label>Boardroom Images</label>
     <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='boardroom'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>

<div class="col-sm">
    <label>Upload Boardroom Style Images</label>
    <input type='file' name='boardroomimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    


</div>


    <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Ushape Style</label>
<input class="form-control" value='<?php echo $row['ushape'];?>'  placeholder="Ushape Pax" name="ushape">
</div>


<div class="col-sm">
    <label>Ushape Images</label>
     <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='ushape'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>


<div class="col-sm">
    <label>Upload Ushape Style Images</label>
    <input type='file' name='ushapeimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    
</div>



    <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Banquet Style</label>
<input class="form-control" value='<?php echo $row['banquetdinner'];?>'  placeholder="Banquet Pax" name="banquetdinner">
</div>

<div class="col-sm">
    <label>Banquet Images</label>
     <br/>


<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='banquet'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>


<div class="col-sm">
    <label>Upload Banquet Style Images</label>
    <input type='file' name='banquetimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    
</div>



    <br/>
    
    <div class="row">
        
<div class="col-sm">
      <label>Cocktail Reception Style</label>
<input class="form-control" value='<?php echo $row['cocktailreception'];?>'  placeholder="Cocktail Reception Pax" name="cocktailreception">
</div>

<div class="col-sm">
    <label>Cocktail Images</label>
    
<br/>

<?php

  $sqlv ="SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='cocktail'";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      

      ?>
      <img style='width:50px; height:50px;' src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $rowv['image'];?>'>
      
      <?php
      
  }
}
?>


</div>




<div class="col-sm">
    <label>Upload Cocktail Style Images</label>
    <input type='file' name='cocktailimages[]' multiple class='form-control' accept='image/*'>
    </div>
    
    
    
    
    
</div>




     
     
     
       
    
    
    <br/>
    <br/>
    <br/>
    <br/>
    
    
  
	<?php    
    
    
    
	  }
}
	  ?>
    
    
    
   
    
  <datalist id='at'>
      <option>
          Scaffolding
      </option>
        <option>
          Fork Lift
      </option>
        <option>
          Genie Lift
      </option>
  </datalist>  
  
  
  
  <datalist id='ci'>
      <option>
          Charged
      </option>
        <option>
          Included
      </option>
        
  </datalist>  
  
  
  
  
  
  
  
   
    <input name='update' style='float:right;' type='submit' value='Update' class='btn btn-danger'>
    
      </form>
    <br/>
        <br/>
            <br/>    <br/>
                <br/>
                    <br/>
                        <br/>
                            <br/>
                                <br/>
                                    <br/>
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script>
    $( "#hps" ).keyup(function() {  
        
        var hps=document.getElementById('hps').value;
        
        document.getElementById('hangingpoints').innerHTML='';
        
        var nonsense=document.getElementById('hangingpoints');
        
        
        
        if(hps=='' || hps=='0')
        {
            
            document.getElementById('labelshp').style.display='none';
            
        }
        else{
          document.getElementById('labelshp').style.display='block';  
          
          for(let i=0; i<parseInt(hps); i++)
          {
              
              var dr= document.createElement('div');
              dr.classList.add('row');
              
              var dc1= document.createElement('div');
              dc1.classList.add('col-sm');
              
              var dc2= document.createElement('div');
              dc2.classList.add('col-sm');
              
              var dc3= document.createElement('div');
              dc3.classList.add('col-sm');
              
              
              var inp1=document.createElement('INPUT');
              inp1.classList.add('form-control');
              inp1.setAttribute('placeholder','Location');
              inp1.setAttribute('name','locationhp[]');
              
               var inp2=document.createElement('INPUT');
              inp2.classList.add('form-control');
              inp2.setAttribute('placeholder','Accessible Through');
              inp2.setAttribute('list','at');
              inp2.setAttribute('name','hpaccessiblethrough[]');
              
               var inp3=document.createElement('INPUT');
              inp3.classList.add('form-control');
              inp3.setAttribute('placeholder','Charged/ Included');
              inp3.setAttribute('list','ci');
              inp3.setAttribute('name','hpchargedincluded[]');
              
              dc1.appendChild(inp1);
              dc2.appendChild(inp2);
              dc3.appendChild(inp3);
              
              
              dr.appendChild(dc1);
              dr.appendChild(dc2);
              dr.appendChild(dc3);
             
              nonsense.appendChild(dr);
              
              
          }
          
          
          
          
          
        }
        
        
        
        
        
    });
    
    
    
    
  </script>
</main>












<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
</script>



<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-buttonn', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
</script>



<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-buttonbn', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
</script>

<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-buttonbnb', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>


<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#rs', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>
 
 
 <script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#tcs', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>

<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#cs', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>



<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#rts', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>


<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#cots', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>
 
 
<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#crts', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:100,
        renderChoiceLimit:100
      }); 
     
     
 });
 </script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>




<script>

function addcardnew2(){
   var parent=document.getElementById("addnc2");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','conferencepackaginginclusions[]');
   inpt.setAttribute('placeholder','Conference Packaging Inclusion');
   inpt.classList.add('form-control');
   parent.appendChild(inpt);
    
}

</script>



<script>

function addcardnew2pe(){
   var parent=document.getElementById("addnc2pe");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','pastevents[]');
   inpt.setAttribute('placeholder','Past Event');
   inpt.classList.add('form-control');
   parent.appendChild(inpt);
    
}

</script>



<script>

function addcardnew2vi(){
   var parent=document.getElementById("addnc2vi");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','vinclusions[]');
   inpt.setAttribute('placeholder','Inclusion');
   inpt.classList.add('form-control');
   parent.appendChild(inpt);
    
}

</script>






