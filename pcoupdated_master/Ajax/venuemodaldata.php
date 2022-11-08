<?php
include '../db_connection.php';
$id=$_GET['ID'];





$imageNames = array();







                    
$sql = "SELECT * FROM meetingbanquetplanner WHERE id='$id'";
$vanues = $conn->query($sql);

  if ($vanues->num_rows > 0) {


                      while ($van = $vanues->fetch_assoc()) {
                          
                          
                          $hotel=$van['hotel'];
                          $country=$van['country'];
                          $city=$van['city'];
                          $venue=$van['venue'];
                          $venueinfo=$van['venueinfo'];
                          $gettinghere=$van['gettinghere'];
                          $glance=$van['glance'];
                          $naturaldaylight=$van['naturaldaylight'];
                          $vinclusions=$van['vinclusions'];
                          $conferencepackaginginclusions=$van['conferencepackaginginclusions'];
                          $pastevents=$van['pastevents'];
                          $socialdistance=$van['socialdistance'];
                          
                          $numberofhanging=$van['numberofhanging'];
                          $locationhp=$van['locationhp'];
                          $hpaccessiblethrough=$van['hpaccessiblethrough'];
                          $availablepower=$van['availablepower'];
                          $hpchargedincluded=$van['hpchargedincluded'];
                          $distancedb=$van['distancedb'];
                          
                          
                          $ceilingheight=$van['ceilingheight'];
                          $doorwidthheight=$van['doorwidthheight'];
                          $vehiclewidthheight=$van['vehiclewidthheight'];
                          $stageblocks=$van['stageblocks'];
                          $venueavailabilityprior=$van['venueavailabilityprior'];
                          $accessibletimming=$van['accessibletimming'];
                          
                          
                          $tableType=$van['tableType'];
                          $tableType=explode(',',$tableType);
                          
                          $tableSize=$van['tableSize'];
                          $tableSize=explode(',',$tableSize);
                          
                          $tableClothType=$van['tableClothType'];
                          $tableClothType=explode(',',$tableClothType);
                          
                           $tableClothSize=$van['tableClothSize'];
                          $tableClothSize=explode(',',$tableClothSize);
                          
                          
                          $chairType=$van['chairType'];
                          $chairType=explode(',',$chairType);
                          
                          $chairSize=$van['chairSize'];
                          $chairSize=explode(',',$chairSize);
                          
                          
                           $runnerType=$van['runnerType'];
                          $runnerType=explode(',',$runnerType);
                          
                          $runnerSize=$van['runnerSize'];
                          $runnerSize=explode(',',$runnerSize);

                          $centerpieceType=$van['centerpieceType'];
                          $centerpieceType=explode(',',$centerpieceType);
                          
                          $centerpieceSize=$van['centerpieceSize'];
                          $centerpieceSize=explode(',',$centerpieceSize);

                          $carpetsType=$van['carpetsType'];
                          $carpetsType=explode(',',$carpetsType);
                          
                          $carpetsSize=$van['carpetsSize'];
                          $carpetsSize=explode(',',$carpetsSize);

                          $stageType=$van['stageType'];
                          $stageType=explode(',',$stageType);
                          
                          $stageSize=$van['stageSize'];
                          $stageSize=explode(',',$stageSize);


                          $skirtingtype=$van['skirtingtype'];
                          $skirtingtype=explode(',',$skirtingtype);
                          
                          $skirtingsize=$van['skirtingsize'];
                          $skirtingsize=explode(',',$skirtingsize);
                         
                          $skirtingpodium=$van['skirtingpodium'];
                          $skirtingpodium=explode(',',$skirtingpodium);
                          
                          $dancefloorsize=$van['dancefloorsize'];
                          $dancefloorsize=explode(',',$dancefloorsize);
                          
                          $dancefloormaterial=$van['dancefloormaterial'];
                          $dancefloormaterial=explode(',',$dancefloormaterial);
                          
                          $dancefloorcost=$van['dancefloorcost'];
                          $dancefloorcost=explode(',',$dancefloorcost);


                          $speakertype=$van['speakertype'];
                          $speakertype=explode(',',$speakertype);
                          
                          $decibels=$van['decibels'];
                          $decibels=explode(',',$decibels);
                          
                          
                          $projectortype=$van['projectortype'];
                          $projectortype=explode(',',$projectortype);
                          
                          $projectorlumens=$van['projectorlumens'];
                          $projectorlumens=explode(',',$projectorlumens);
                          
                          $mobilemounted=$van['mobilemounted'];
                          $mobilemounted=explode(',',$mobilemounted);
                          
                          $backfront=$van['backfront'];
                          $backfront=explode(',',$backfront);
                          
                          
                          $locationhp=$van['locationhp'];
                          $locationhp=explode(',',$locationhp);
                          
                          
                          $hpaccessiblethrough=$van['hpaccessiblethrough'];
                          $hpaccessiblethrough=explode(',',$hpaccessiblethrough);
                          
                          $hpchargedincluded=$van['hpchargedincluded'];
                          $hpchargedincluded=explode(',',$hpchargedincluded);
                          

}
}



                  
$sqld = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && category=''";
$vanuesd = $conn->query($sqld);

  if ($vanuesd->num_rows > 0) {
      
        while ($vand = $vanuesd->fetch_assoc()) {
            
            
            array_push($imageNames, $vand['image']);
            
            
        }
  }


?>

<div class="container-lg contentcat" style="background: rgb(42, 42, 58);">
    <div class="row">
        <div class="col-lg-8" style="position: relative;">

            <?php 
            foreach ($imageNames as $index=>$imn) { 
                ?>

                <div class="mySlidesCss mySlides">
                    <img src="pco/Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?= $imn ?>" alt="" class="img-fluid" style="width:100%; object-fill:cover;">
                </div>

            <?php } ?>


            <a class="prevs" onclick="plusSlides(-1)">❮</a>
            <a class="nexts" onclick="plusSlides(1)">❯</a>
        </div>
        <div class="col-lg-4 bg-white ModalrightDescriptionSection" >
            <div class="text-end">
                <button type="button" style="font-size: 10px;" class="btn-close m-2 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="">
                <div id="sideright">
                    <!-- <div class="sidebar"> -->
                    <ul style="margin-top: -20px;" class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" style='color:red;' aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" style='color:red;' aria-selected="false">Inclusions</button>
                        </li>
                      
                      <?php
                      if($pastevents!='')
                      {
                          ?>
                      
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" style='color:red;' aria-selected="false">Past Events</button>
                        </li>
                        <?php
                      }
                      ?>
                      
                      
                           <li class="nav-item" role="presentation">
                            <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional" type="button" role="tab" aria-controls="additional" style='color:red;' aria-selected="false">Additional Info</button>
                        </li>
                        
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row pt-2">
                             
                             <!--   <div class="col-md-6">

                                    <p class="infoBox">
                                        Infro Box 

                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p class="infoBox">
                                        Year
                                    </p>


                                </div>
                                
                                -->
                                <?php if($venueinfo!==''){?>
                                <h5>Description:</h5>
                               <?php echo $venueinfo;?>
                              <br/><br/>
                              <?php
                              }
                              ?>
                              <?php if($gettinghere!==''){?>
                               <h5>Getting Here:</h5>
                               <?php echo $gettinghere;?>
                            
                            <br/><br/>
                             <?php
                              }
                              ?>
                              <?php if($glance!==''){?>
                               <h5>At Glance:</h5>
                               <?php echo $glance;?>
                               
                                <?php
                              }
                              ?>
                               
                               
                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br />


                            <ul class="list-unstyled mx-0 mb-0">
                                
                             <?php
                              $vinclusions=explode(",", $vinclusions);
                                   foreach($vinclusions as $pe)
                                   {
                                   if($pe=='')
                                   {
                                   }
                                   else
                                   {
                                   ?>
                                   
                                     <li>
                                    <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                    <span><?php echo $pe;?></span>
                                </li>
                                   
                                   <?php
                                   } 
                                   }
                                   
                                    $conferencepackaginginclusions=explode(",", $conferencepackaginginclusions);
                                   foreach($conferencepackaginginclusions as $pe)
                                   {
                                        if($pe=='')
                                   {
                                   }
                                   else
                                   {
                                       ?>
                                        <li>
                                    <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                    <span><?php echo $pe;?></span>
                                </li>
                                       <?php
                                   }
                                       
                                   }
                             ?>
                             

                               
                               
                              
                                
                                
                                

                            </ul>



                        </div>
                        
                        
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                       <ul class="list-unstyled mx-0 mb-0">
                                   <br/>
                                   <?php 
                                   $pastevents=explode(",", $pastevents);
                                   foreach($pastevents as $pe)
                                   {
                                       echo '<li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span><span><b>'.$pe.'</b></span></li>';
                                       
                                   }
                                   
                                   
                                   ?>
                                   </ul>
                                   
                                
                        </div>
                        
                        
                        
                        
                        
                        <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">

                       <ul class="list-unstyled mx-0 mb-0">
                                   <br/>
                                   General:
                                <?php
                                if($naturaldaylight=='Yes')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b>Natural Daylight</b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                     <?php
                                if($ceilingheight!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Ceiling Height  ('.$ceilingheight.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                 <?php
                                if($doorwidthheight!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Door Dimensions  ('.$doorwidthheight.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                
                                  <?php
                                if($vehiclewidthheight!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Vehicle Dimensions  ('.$vehiclewidthheight.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                 <?php
                                if($availablepower!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Available Power  ('.$availablepower.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                 <?php
                                if($distancedb!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Distance From DB  ('.$distancedb.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                <?php
                                if($stageblocks!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Stage Blocks  ('.$stageblocks.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                
                                      <?php
                                if($venueavailabilityprior!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Venue Available Prior  ('.$venueavailabilityprior.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                
                                          <?php
                                if($accessibletimming!='')
                                {
                                ?>
                                  <li><span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                  
                                  <span><b><?php echo 'Accessible Timming  ('.$accessibletimming.')';?></b>
                                  
                                  </span></li>
                                       
                                   <?php
                                }
                                ?>
                                
                                
                                
                                 <?php
                                 if($tableType[0]!='') 
                                {
                                ?>
                               <br/>
                                   Tables:
                                    <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                   
                                                <?php
                                                $n=0;
                                foreach($tableType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $tableSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                  <?php
                                 if($tableClothType[0]!='') 
                                {
                                ?>
                                    <br/>
                                   Tables Cloth:
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                   
                                                <?php
                                                $n=0;
                                foreach($tableClothType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $tableClothSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?>  
                                   
                                   <?php
                                 if($chairType[0]!='') 
                                {
                                ?>
                               <br/>
                                   Chairs:
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                    <?php
                                                $n=0;
                                foreach($chairType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $chairSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                 <?php
                                 if($runnerType[0]!='') 
                                {
                                ?>
                               <br/>
                                   Runners:
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                         <?php
                                                $n=0;
                                foreach($runnerType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $runnerSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                 <?php
                                 if($centerpieceType[0]!='') 
                                {
                                ?>
                                <br/>
                                   Center Pieces:  
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                         <?php
                                                $n=0;
                                foreach($centerpieceType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $centerpieceSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                  <?php
                                 if($carpetsType[0]!='') 
                                {
                                ?>
                                <br/>
                                   Carpets: 
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                         <?php
                                                $n=0;
                                foreach($carpetsType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $carpetsSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                 <?php
                                 if($stageType[0]!='') 
                                {
                                ?>
                                <br/>
                                   Stage: 
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      </div>
                                         <?php
                                                $n=0;
                                foreach($stageType as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $stageSize[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                 <?php
                                 if($dancefloormaterial[0]!='') 
                                {
                                ?>
                                <br/>
                                   Dance Floor: 
                                      <div class='row'>
                                  <div class='col-sm'>
                                      <small>Material</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      <div class='col-sm'>
                                             <small>Cost</small>
                                      </div>
                                      </div>
                                              <?php
                                                $n=0;
                                foreach($dancefloormaterial as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $dancefloorsize[$n];?>
                                  </div>
                                  
                                     <div class='col-sm'>
                                      <?php echo $dancefloorcost[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                
                                
                                <?php
                                 if($skirtingtype[0]!='') 
                                {
                                ?>
                                
                                 <br/>
                                   Skirting: 
                                           <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Size</small>
                                      </div>
                                      
                                      <div class='col-sm'>
                                             <small>Podium</small>
                                      </div>
                                      </div>
                                   
                                              <?php
                                                $n=0;
                                foreach($skirtingtype as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $skirtingsize[$n];?>
                                  </div>
                                  
                                     <div class='col-sm'>
                                      <?php echo $skirtingpodium[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                
                                   
                                <?php
                                 if($speakertype[0]!='') 
                                {
                                ?>
                                <br/>
                                   Speakers: 
                                              <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Decibels</small>
                                      </div>
                                      
                                     
                                      </div>
                                              <?php
                                                $n=0;
                                foreach($speakertype as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $decibels[$n];?>
                                  </div>
                                  
                                    
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                <?php
                                 if($locationhp[0]!='') 
                                {
                                ?>
                                  <br/>
                                   Hanging Points: 
                                              <div class='row'>
                                  <div class='col-sm'>
                                      <small>Location</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Accessible By</small>
                                      </div>
                                      
                                      <div class='col-sm'>
                                             <small>Charged/Included</small>
                                      </div>
                                      </div>
                                              <?php
                                                $n=0;
                                foreach($locationhp as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $hpaccessiblethrough[$n];?>
                                  </div>
                                  
                                   <div class='col-sm'>
                                      <?php echo $hpchargedincluded[$n];?>
                                  </div>
                                     
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                   <?php
                                 if($projectortype[0]!='') 
                                {
                                ?>
                                   <br/>
                                   Projector: 
                                                 <div class='row'>
                                  <div class='col-sm'>
                                      <small>Type</small>
                                      </div>
                                        <div class='col-sm'>
                                             <small>Lumens</small>
                                      </div>
                                      
                                      <div class='col-sm'>
                                             <small>Projection</small>
                                      </div>
                                      </div>
                                              <?php
                                                $n=0;
                                foreach($projectortype as $tt)
                                {
                                ?>
                                  
                                  <div class='row'>
                                  <div class='col-sm'>
                                      <?php echo $tt;?>
                                  </div>
                                  
                                  <div class='col-sm'>
                                      <?php echo $projectorlumens[$n];?>
                                  </div>
                                  
                                   <div class='col-sm'>
                                      <?php echo $mobilemounted[$n];?>
                                  </div>
                                     <div class='col-sm'>
                                      <?php echo $backfront[$n];?>
                                  </div>
                                  </div>
                                  
                                       
                                   <?php
                                }
                                }
                                ?> 
                                
                                
                                
                                
                                 
                                
                                   </ul>
                                   
                                
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>


                    <!-- </div> -->
                </div>

               <!-- <div class="btn-bg">
                    <a href='hotelsingle.php?hotel'>
                        <button class="btn btn-danger" type="button">View Venue </button></a>
                </div>-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row col-md-12 list-c-main">
            <div class="col-md-10">
                <ul class="list-c">
                    <li class="list active1">
                        <a class="cat" onclick="showCat(1)">All</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <?php 
                    foreach ($imageNames as $index=>$imn) { 
                ?>
                <div class="numbertext" id="numbertext"><?= $index + 1 ?> / <?= count($imageNames) ?></div>  
            <?php } ?>      
            </div>
        </div>
    </div>
    <div style="padding:10px;" class="row myCat" onclick="currentCat(1)">
        <?php foreach ($imageNames as $index => $imn) { ?>
            <div class="column thumbnailBox " onclick="currentSlide(<?= $index + 1 ?>)">
                <img src="pco/Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?= $imn ?>" alt="" class="img-fluid">
            </div>
        <?php } ?>
    </div>
    <div clsss="contentcat">
    </div>
</div>