<?php

session_start();
include 'db_connection.php';

$number=$_SESSION['book'];
     
   
   
   
   include 'header.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Booking Retrieved</title>
</head>
<body>
    
    
    
    
    
    
    
    
    
    
    <style>
        .badger{
                color: #fff;
    background-color: #28a745;
    padding-right: .6em;
    padding-left: .6em;
    border-radius: 10rem;
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
        }
    </style>
    
    
    
    
    
    
    <div class = "main-holder invo-pg">
    <section class="page_title">
        <div class="container">
            <h1>Retrieved Information</h1>
        </div>
    </section>
    
    <section class="invo mt-5 mb-3">
        <div class="container invo-wrapper px-3 d-flex flex-column">
            <div class = "invo-top d-md-flex align-items-center justify-content-between">
                <div class = "col-left">
                    <img src = "img/logo.png" alt = "">
                </div>
                <div class = "col-right">
                    <ul class = "list-unstyled mx-0">
                        <li>Sheik Zayad Road, Dubai, UAE</li>
                        <li>Phone: +971-474848993, +971-474848993 </li>
                        <li>Email: support@pcoconnect.com</li>
                    </ul>
                </div>
            </div>

            <div class = "html invo-body mt-3">
                <div class = "invo-body-wrapper">
                    <div class = "invoice-top d-flex justify-content-between align-items-center py-3">
                        <div class = "col-left">
                            <p class = "mb-0"><span class = "fw-bold">Invoice Number:</span> <span><?php echo $_SESSION['book'];?></span></p>
                            <input style='display:none;' id='bookingnumber' value='<?php echo $_SESSION['book'];?>'>
                        </div>
                        <div class = "col-mid">
                            <p class = "fw-bold text-uppercase mb-0">proforma invoice</p>
                        </div>
                     <!--   <div class = "col-right">
                            <p class = "mb-0"><span class = "fw-bold">Issue Date:</span> <span><?php echo date("d/m/Y");?></span></p>
                        </div>-->
                    </div>
    
    
    <?php
    if($_SESSION['hotelcheck']=='htr')
    {?>
    
    
    
    
    <!--HOTEL with transfer and rent-->
     
                        <h3 align='center'>Hotel Booking</h3>
   
    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Check In</div>
                            <div>Check Out</div>
                            <div>Nights</div>
                            <div>Avg/Night</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                                 <?php
                       //echo $_SESSION['hotelcheck'];
                        $sqllasxx = "SELECT * FROM bookings WHERE uniquenumber='$number' GROUP BY hotel";
     $resultxx=$conn->query($sqllasxx);
    
    
while($rowxx=mysqli_fetch_assoc($resultxx)){
                        
                        ?>
                                <div class = "d-block invoice-tbl-item-title px-4">Hotel: <?php echo $rowxx['hotel'];?></div>
                              
                              <?php
}
?>
                              
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM bookings WHERE uniquenumber='$number'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        
                                       
                                        
                                        <?php echo $rowx['roomtype'];?><br>
                                        <?php
                                       
                                            echo 'Adults: '.$rowx['adults'].'&nbsp;&nbsp;&nbsp;';
                                        
                                       
                                            echo 'Children: '.$rowx['children'];
                                        
                                        ?>
                                    </div>
                                    <div class = "text-center"><?php echo $rowx['checkin'];?></div>
                                    <div class = "text-center"><?php echo $rowx['checkout'];?></div>
                                    <div class = "text-center"><?php echo $rowx['days'];?></div>
                                    <div class = "text-center"><?php echo 'AED '.intval($rowx['price'])/intval($rowx['days']);?></div>
                                    <div class = "text-center"><?php echo 'AED '.$rowx['price'];?></div>
                                </div>
                                
                                
                               
                                 
                                <?php
                          
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                        
                        
                        
                        
                        
                <!--tranfer with hotel and rent-->          
                        
                        <h3 align='center'>Transport Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div></div>
                             <div>Flight Details</div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM transfernewbookingsnew WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Booked For <?php echo $rowx['pax'].' ';?> Persons</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                        if($rowx['carida']!='')
                                        {
                                        echo 'Arrival Car:<br/>';
                                        
                                            
                        $sqllasxn = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['carida']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    echo 'Cars: '.$rowx['arrivalcarsneeded'];
}
                                        
                                        }
                                        echo '<br/><br/><br/>';
                                        
                                         if($rowx['caridd']!='')
                                        {
                                         echo 'Departure Car:<br/>';
                                        
                                            
                        $sqllasxnv = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['caridd']."'";
     $resultxnv=$conn->query($sqllasxnv);
    
    
while($rowxnv=mysqli_fetch_assoc($resultxnv)){
    
    echo $rowxnv['brand'].' '.$rowxnv['model'].' ('.$rowxnv['year'].')';
     echo '<br/>';
    echo 'Cars: '.$rowx['departurecarsneeded'];
}
                                       
                                        }
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivalfromlocation'].'<br/>'.$rowx['arrivaldate'].'<br/>'.$rowx['arrivaltime'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departurefromlocation'].'<br/>'.$rowx['departuredate'].'<br/>'.$rowx['departuretime'];
                                     
                                        }
                                        ?>
                                        
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                         <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivaltolocation'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/><br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departuretolocation'];
                                     
                                        }
                                        ?>
                                        
                                        
                                        
                                    </div>
                                    <div class = "text-center"></div>
                                    <div class = "text-center">
                                        
                                        
                                        
                            <?php 
                             if($rowx['carida']!='')
                                        {
                            echo 'Arrival<br/>';
                            echo 'Airline: '.$rowx['airlinearrival'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberarrival'].'<br/>';
                                        }
                                          if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                             if($rowx['caridd']!='')
                                        {
                             echo 'Departure<br/>';
                            echo 'Airline: '.$rowx['airlinedeparture'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberdeparture'];
                                        }
                            ?>
                                        
                                        
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                        <?php
                                         if($rowx['carida']!='')
                                        {
                                          echo 'Arrival<br/>';
                            echo 'AED: '.$rowx['arrivalprice'].'<br/>';   
                                        }
                                        
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                                        
                                        
                                         if($rowx['caridd']!='')
                                        {
                                        echo 'Departure<br/>';
                            echo 'AED: '.$rowx['departureprice'].'<br/>';     
                                        }
                                        
                                        ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                
                        
                    
                        
                        
                        
                        
                        
                        
                        
                       
                <!--Rent with hotel and transfer-->          
                        
                        <h3 align='center'>Rent a Car Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div>Days</div>
                             <div></div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM rentacarbookings WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Car Booked</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                       
                                            
                        $sqllasxn = "SELECT * FROM rentacarInventorydatabase WHERE id='".$rowx['carid']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    
}
                                        
                                     
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                           echo $rowx['pickuplocation'];
                                           echo '<br/>';
                                            echo $rowx['pickupdate'];
                                            echo '<br/>';
                                             echo $rowx['pickuptime'];
                                    ?>
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                        
                                         <?php
                                           echo $rowx['dropofflocation'];
                                           echo '<br/>';
                                            echo $rowx['dropoffdate'];
                                            echo '<br/>';
                                             echo $rowx['dropofftime'];
                                    ?>
                                        
                                        
                                    </div>
                                    <div class = "text-center">
                                      <?php   echo $rowx['days'];?>
                                    </div>
                                    <div class = "text-center">
                                        
                                          
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                       <?php 
                                       echo 'AED '.$rowx['price'];
                                       
                                       ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
    
   <?php }
    else if($_SESSION['hotelcheck']=='ht')
    {?>
    
    
    
    <!--HOTEL with transfer and rent-->
     
                        <h3 align='center'>Hotel Booking</h3>
    
    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Check In</div>
                            <div>Check Out</div>
                            <div>Nights</div>
                            <div>Avg/Night</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                                 <?php
                       //echo $_SESSION['hotelcheck'];
                        $sqllasxx = "SELECT * FROM bookings WHERE uniquenumber='$number' GROUP BY hotel";
     $resultxx=$conn->query($sqllasxx);
    
    
while($rowxx=mysqli_fetch_assoc($resultxx)){
                        
                        ?>
                                <div class = "d-block invoice-tbl-item-title px-4">Hotel: <?php echo $rowxx['hotel'];?></div>
                              
                              <?php
}
?>
                              
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM bookings WHERE uniquenumber='$number'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php echo $rowx['roomtype'];?><br>
                                        <?php
                                       
                                            echo 'Adults: '.$rowx['adults'].'&nbsp;&nbsp;&nbsp;';
                                        
                                       
                                            echo 'Children: '.$rowx['children'];
                                        
                                        ?>
                                    </div>
                                    <div class = "text-center"><?php echo $rowx['checkin'];?></div>
                                    <div class = "text-center"><?php echo $rowx['checkout'];?></div>
                                    <div class = "text-center"><?php echo $rowx['days'];?></div>
                                    <div class = "text-center"><?php echo 'AED '.intval($rowx['price'])/intval($rowx['days']);?></div>
                                    <div class = "text-center"><?php echo 'AED '.$rowx['price'];?></div>
                                </div>
                                
                                
                               
                                 
                                <?php
                          
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                        
                        
                        
                        
                        
                <!--tranfer with hotel and rent-->          
                        
                        <h3 align='center'>Transport Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div></div>
                             <div>Flight Details</div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM transfernewbookingsnew WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Booked For <?php echo $rowx['pax'].' ';?> Persons</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                        if($rowx['carida']!='')
                                        {
                                        echo 'Arrival Car:<br/>';
                                        
                                            
                        $sqllasxn = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['carida']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    echo 'Cars: '.$rowx['arrivalcarsneeded'];
}
                                        
                                        }
                                        echo '<br/><br/><br/>';
                                        
                                         if($rowx['caridd']!='')
                                        {
                                         echo 'Departure Car:<br/>';
                                        
                                            
                        $sqllasxnv = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['caridd']."'";
     $resultxnv=$conn->query($sqllasxnv);
    
    
while($rowxnv=mysqli_fetch_assoc($resultxnv)){
    
    echo $rowxnv['brand'].' '.$rowxnv['model'].' ('.$rowxnv['year'].')';
     echo '<br/>';
    echo 'Cars: '.$rowx['departurecarsneeded'];
}
                                       
                                        }
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivalfromlocation'].'<br/>'.$rowx['arrivaldate'].'<br/>'.$rowx['arrivaltime'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departurefromlocation'].'<br/>'.$rowx['departuredate'].'<br/>'.$rowx['departuretime'];
                                     
                                        }
                                        ?>
                                        
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                         <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivaltolocation'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/><br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departuretolocation'];
                                     
                                        }
                                        ?>
                                        
                                        
                                        
                                    </div>
                                    <div class = "text-center"></div>
                                    <div class = "text-center">
                                        
                                        
                                        
                            <?php 
                             if($rowx['carida']!='')
                                        {
                            echo 'Arrival<br/>';
                            echo 'Airline: '.$rowx['airlinearrival'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberarrival'].'<br/>';
                                        }
                                          if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                             if($rowx['caridd']!='')
                                        {
                             echo 'Departure<br/>';
                            echo 'Airline: '.$rowx['airlinedeparture'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberdeparture'];
                                        }
                            ?>
                                        
                                        
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                        <?php
                                         if($rowx['carida']!='')
                                        {
                                          echo 'Arrival<br/>';
                            echo 'AED: '.$rowx['arrivalprice'].'<br/>';   
                                        }
                                        
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                                        
                                        
                                         if($rowx['caridd']!='')
                                        {
                                        echo 'Departure<br/>';
                            echo 'AED: '.$rowx['departureprice'].'<br/>';     
                                        }
                                        
                                        ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                
                        
    
    
   <?php
        
    }
      else if($_SESSION['hotelcheck']=='hr')
    {?>
    
    
    
    <!--HOTEL with transfer and rent-->
     
                        <h3 align='center'>Hotel Booking</h3>
    
    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Check In</div>
                            <div>Check Out</div>
                            <div>Nights</div>
                            <div>Avg/Night</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                                 <?php
                       //echo $_SESSION['hotelcheck'];
                        $sqllasxx = "SELECT * FROM bookings WHERE uniquenumber='$number' GROUP BY hotel";
     $resultxx=$conn->query($sqllasxx);
    
    
while($rowxx=mysqli_fetch_assoc($resultxx)){
                        
                        ?>
                                <div class = "d-block invoice-tbl-item-title px-4">Hotel: <?php echo $rowxx['hotel'];?></div>
                              
                              <?php
}
?>
                              
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM bookings WHERE uniquenumber='$number'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php echo $rowx['roomtype'];?><br>
                                        <?php
                                       
                                            echo 'Adults: '.$rowx['adults'].'&nbsp;&nbsp;&nbsp;';
                                        
                                       
                                            echo 'Children: '.$rowx['children'];
                                        
                                        ?>
                                    </div>
                                    <div class = "text-center"><?php echo $rowx['checkin'];?></div>
                                    <div class = "text-center"><?php echo $rowx['checkout'];?></div>
                                    <div class = "text-center"><?php echo $rowx['days'];?></div>
                                    <div class = "text-center"><?php echo 'AED '.intval($rowx['price'])/intval($rowx['days']);?></div>
                                    <div class = "text-center"><?php echo 'AED '.$rowx['price'];?></div>
                                </div>
                                
                                
                               
                                 
                                <?php
                          
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                        
                   
                   
                       
                <!--Rent with hotel and transfer-->          
                        
                        <h3 align='center'>Rent a Car Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div>Days</div>
                             <div></div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM rentacarbookings WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Car Booked</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                       
                                            
                        $sqllasxn = "SELECT * FROM rentacarInventorydatabase WHERE id='".$rowx['carid']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    
}
                                        
                                     
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                           echo $rowx['pickuplocation'];
                                           echo '<br/>';
                                            echo $rowx['pickupdate'];
                                            echo '<br/>';
                                             echo $rowx['pickuptime'];
                                    ?>
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                        
                                         <?php
                                           echo $rowx['dropofflocation'];
                                           echo '<br/>';
                                            echo $rowx['dropoffdate'];
                                            echo '<br/>';
                                             echo $rowx['dropofftime'];
                                    ?>
                                        
                                        
                                    </div>
                                    <div class = "text-center">
                                      <?php   echo $rowx['days'];?>
                                    </div>
                                    <div class = "text-center">
                                        
                                          
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                       <?php 
                                       echo 'AED '.$rowx['price'];
                                       
                                       ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                    
                        
                        
                        
                             
                        
   <?php
        
    }
      else if($_SESSION['hotelcheck']=='h')
    {
    ?>
                
    
 
    <!--HOTEL with transfer and rent-->
     
                        <h3 align='center'>Hotel Booking</h3>
                        
                        
    <?php
     
    $sqllasxxane = "SELECT * FROM bookings WHERE uniquenumber='$number' GROUP BY hotel";
     $resultxxane=$conn->query($sqllasxxane);
    
    
while($rowxxane=mysqli_fetch_assoc($resultxxane)){
                        
         if($rowxxane['cancellationapplied']=='')   
         {
        ?>
        <button onclick='cancelbooking()' class='btn btn-danger'>Cancel My Booking</button>
    <?php
    }
    else{
        if($rowxxane['cancellationconfirmed']=='Confirmed')   
         {
        ?>
    
     <h5><span class="badger">Cancellation Confirmed</span></h5>
     <?php
         }
         else{
           ?>
            <h5><span class="badger">Applied for Cancellation</span></h5>
           <?php
             
         }
    }
    }
    ?>
    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Check In</div>
                            <div>Check Out</div>
                            <div>Nights</div>
                            <div>Avg/Night</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                                 <?php
                       //echo $_SESSION['hotelcheck'];
                        $sqllasxx = "SELECT * FROM bookings WHERE uniquenumber='$number' GROUP BY hotel";
     $resultxx=$conn->query($sqllasxx);
    
    
while($rowxx=mysqli_fetch_assoc($resultxx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Hotel: <?php echo $rowxx['hotel'];?></div>
                              
                              <?php
}
?>
                              
                      
                      
                        <?php
                       $cancelnumber=0;
                        $sqllasx = "SELECT * FROM bookings WHERE uniquenumber='$number'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        
                    <?php
                       $typeforcancel= $rowx['roomtype'];
                        $sqllasxvb = "SELECT * FROM hotelsInventorydatabase WHERE type='$typeforcancel'";
     $resultxvb=$conn->query($sqllasxvb);
    
    
while($rowxvb=mysqli_fetch_assoc($resultxvb)){
                        
                        ?>                     
                                        
                                        
                                         <input style='display:none;' class='tpcancel' id='tpcancel<?php echo $cancelnumber;?>' value='<?php echo $rowxvb['cancellationpercentage'];?>'>
                                       <?php
                                       }
                                       ?>
                                        <input id='tpcancelprice<?php echo $cancelnumber;?>' style='display:none;' value='<?php echo $rowx['price'];?>'>
                                        
                                        <?php
                                        $cancelnumber=$cancelnumber+1;
                                        echo $rowx['roomtype'];?><br>
                                        <?php
                                       
                                            echo 'Adults: '.$rowx['adults'].'&nbsp;&nbsp;&nbsp;';
                                        
                                       
                                            echo 'Children: '.$rowx['children'];
                                        
                                        ?>
                                    </div>
                                    <div class = "text-center"><?php echo $rowx['checkin'];?></div>
                                    <div class = "text-center"><?php echo $rowx['checkout'];?></div>
                                    <div class = "text-center"><?php echo $rowx['days'];?></div>
                                    <div class = "text-center"><?php echo 'AED '.intval($rowx['price'])/intval($rowx['days']);?></div>
                                    <div class = "text-center"><?php echo 'AED '.$rowx['price'];?></div>
                                </div>
                                
                                
                               
                                 
                                <?php
                          
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                        
                
    <?php
    }
        else if($_SESSION['hotelcheck']=='t')
    {?>
    
      
                        
                <!--tranfer with hotel and rent-->          
                        
                        <h3 align='center'>Transport Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div></div>
                             <div>Flight Details</div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM transfernewbookingsnew WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Booked For <?php echo $rowx['pax'].' ';?> Persons</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                        if($rowx['carida']!='')
                                        {
                                        echo 'Arrival Car:<br/>';
                                        
                                            
                        $sqllasxn = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['carida']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    echo 'Cars: '.$rowx['arrivalcarsneeded'];
}
                                        
                                        }
                                        echo '<br/><br/><br/>';
                                        
                                         if($rowx['caridd']!='')
                                        {
                                         echo 'Departure Car:<br/>';
                                        
                                            
                        $sqllasxnv = "SELECT * FROM vehiclesInventorydatabase WHERE id='".$rowx['caridd']."'";
     $resultxnv=$conn->query($sqllasxnv);
    
    
while($rowxnv=mysqli_fetch_assoc($resultxnv)){
    
    echo $rowxnv['brand'].' '.$rowxnv['model'].' ('.$rowxnv['year'].')';
     echo '<br/>';
    echo 'Cars: '.$rowx['departurecarsneeded'];
}
                                       
                                        }
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivalfromlocation'].'<br/>'.$rowx['arrivaldate'].'<br/>'.$rowx['arrivaltime'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departurefromlocation'].'<br/>'.$rowx['departuredate'].'<br/>'.$rowx['departuretime'];
                                     
                                        }
                                        ?>
                                        
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                         <?php
                                     if($rowx['carida']!='')
                                        {
                                            
                                       echo $rowx['arrivaltolocation'];
                                     
                                        }
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                                            echo '<br/><br/><br/><br/>';
                                        }
                                        
                                         if($rowx['caridd']!='')
                                        {
                                            
                                       echo $rowx['departuretolocation'];
                                     
                                        }
                                        ?>
                                        
                                        
                                        
                                    </div>
                                    <div class = "text-center"></div>
                                    <div class = "text-center">
                                        
                                        
                                        
                            <?php 
                             if($rowx['carida']!='')
                                        {
                            echo 'Arrival<br/>';
                            echo 'Airline: '.$rowx['airlinearrival'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberarrival'].'<br/>';
                                        }
                                          if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                             if($rowx['caridd']!='')
                                        {
                             echo 'Departure<br/>';
                            echo 'Airline: '.$rowx['airlinedeparture'].'<br/>';
                            echo 'Flight #: '.$rowx['flightnumberdeparture'];
                                        }
                            ?>
                                        
                                        
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                        <?php
                                         if($rowx['carida']!='')
                                        {
                                          echo 'Arrival<br/>';
                            echo 'AED: '.$rowx['arrivalprice'].'<br/>';   
                                        }
                                        
                                         if($rowx['carida']!='' && $rowx['caridd']!='')
                                        {
                            echo '<br/><br/>';
                                        }
                                        
                                        
                                         if($rowx['caridd']!='')
                                        {
                                        echo 'Departure<br/>';
                            echo 'AED: '.$rowx['departureprice'].'<br/>';     
                                        }
                                        
                                        ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                        </div></div>
                        
                
    
   <?php
       
    }
        else if($_SESSION['hotelcheck']=='r')
    {?>
    
    
    
    
                        
                       
                <!--Rent with hotel and transfer-->          
                        
                        <h3 align='center'>Rent a Car Booking</h3>
                        
                <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                           <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>Dropoff Location</div>
                            <div>Days</div>
                             <div></div>
                             
                             <div>Total AED</div>     
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                
                              
                
                      
                      
                        <?php
                       
                        $sqllasx = "SELECT * FROM rentacarbookings WHERE uniquenumber='$number' GROUP BY uniquenumber";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
                        
                        ?>
                        
                                <div class = "d-block invoice-tbl-item-title px-4">Car Booked</div>
                              
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php 
                                       
                                            
                        $sqllasxn = "SELECT * FROM rentacarInventorydatabase WHERE id='".$rowx['carid']."'";
     $resultxn=$conn->query($sqllasxn);
    
    
while($rowxn=mysqli_fetch_assoc($resultxn)){
    
    echo $rowxn['brand'].' '.$rowxn['model'].' ('.$rowxn['year'].')';
    echo '<br/>';
    
}
                                        
                                     
                                        ?>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                    </div>
                                     
                                   
                                    <div class = "text-center">
                                          <?php
                                           echo $rowx['pickuplocation'];
                                           echo '<br/>';
                                            echo $rowx['pickupdate'];
                                            echo '<br/>';
                                             echo $rowx['pickuptime'];
                                    ?>
                                        </div>
                                    
                                    
                                    
                                    <div class = "text-center">
                                        
                                        
                                         <?php
                                           echo $rowx['dropofflocation'];
                                           echo '<br/>';
                                            echo $rowx['dropoffdate'];
                                            echo '<br/>';
                                             echo $rowx['dropofftime'];
                                    ?>
                                        
                                        
                                    </div>
                                    <div class = "text-center">
                                      <?php   echo $rowx['days'];?>
                                    </div>
                                    <div class = "text-center">
                                        
                                          
                                        
                                        </div>
                                    <div class = "text-center">
                                        
                                       <?php 
                                       echo 'AED '.$rowx['price'];
                                       
                                       ?>
                                        
                                        </div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
                            
                            
                        </div></div>
                     
    
   <?php
        
        
        
        
        
    }
    
    ?>                
                    
                   
                   
              
<div class='invoice-tbl my-4'>
    
       <?php 
                          
       
        if($_SESSION['hotelcheck']=='h')
        {
       
         $sqlq = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $totaqa= $rowq['total'];
}
        }
        
        
          if($_SESSION['hotelcheck']=='t')
        {
       
         $sqlq = "SELECT * FROM fullbookingtransfernew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $totaqa= $rowq['total'];
}
        }
        
        
        
        
             if($_SESSION['hotelcheck']=='r')
        {
       
         $sqlq = "SELECT * FROM fullbookingrentacarnew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $totaqa= $rowq['total'];
}
        }
        
        
        
      
             if($_SESSION['hotelcheck']=='ht')
        {
       
         $sqlq = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h1= $rowq['total'];
}


 $sqlq = "SELECT * FROM fullbookingtransfernew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h2= $rowq['total'];
}


$totaa= intval($h1)+intval($h2);


        }  
        
        
        
        
             if($_SESSION['hotelcheck']=='hr')
        {
       
         $sqlq = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h1= $rowq['total'];
}


 $sqlq = "SELECT * FROM fullbookingrentacarnew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h2= $rowq['total'];
}


$totaa= intval($h1)+intval($h2);


        }  
        
        
        
        
             if($_SESSION['hotelcheck']=='tr')
        {
       
         $sqlq = "SELECT * FROM fullbookingtransfernew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h1= $rowq['total'];
}


 $sqlq = "SELECT * FROM fullbookingrentacarnew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h2= $rowq['total'];
}


$totaa= intval($h1)+intval($h2);


        }  
        
       
        
             if($_SESSION['hotelcheck']=='htr')
        {
       
         $sqlq = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h1= $rowq['total'];
}


 $sqlq = "SELECT * FROM fullbookingrentacarnew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h2= $rowq['total'];
}

$sqlq = "SELECT * FROM fullbookingtransfernew WHERE uniquenumber='$number'";
     $resultq=$conn->query($sqlq);
    
    
while($rowq=mysqli_fetch_assoc($resultq)){
    
    $h3= $rowq['total'];
}

$totaa= intval($h1)+intval($h2)+intval($h3);


        }  
        
        
        
                              ?>
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words:&nbsp;&nbsp; </span>
                            <?php
                            echo numberTowords("$totaqa");
                            ?></div>
                            <div class = "fw-bold">VAT<br/>Grand Total <br/></div>
                            <div class = "fw-bold">
                                 <?php
                         echo 'AED '.intval($totaqa)/100*5;
                         ?>
                                <br/>
                         <?php
                         echo 'AED '.$totaqa;
                         ?>
                           
                           </div>
                        </div>
                        
                      
    
    
    
</div>
                   
                   
                    
                    
                </div>
            </div> 











<?php

function numberTowords($num)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}


?>















     
            
            <br/>
            
        </div>
         <a onclick="convert()" href = "#" style='margin-right:100px; float:right; width:200px;' class = "btn theme_btn active btn-secondary">Print Invoice</a>
     
       <br/><br/><br/>
    </section>


    
    
    
   


<!--html2canvas-->

    <script src="  https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>
   
    <style>
        .result {
            display: none;
        }
 
        canvas {
            border: 2px solid blue;
        }
    </style>

  
        
   
    <div class="result">
        <a id='myCheck' href="">abc</a>
        <hr>
 
    </div>
    <script>
        const div = document.querySelector(".html");
        const result = document.querySelector(".result");
 
        function convert() {
            html2canvas(div).then(function (canvas) {
                result.appendChild(canvas);
                let cvs = document.querySelector("canvas");
                let dataURI = cvs.toDataURL("image/jpeg");
                let downloadLink = document.querySelector(".result>a");
                downloadLink.href = dataURI;
                downloadLink.download = "div2canvasimage.jpg";
                //console.log(dataURI);
                document.getElementById("myCheck").click();
            });
            //result.style.display='block';
            //document.getElementById("myCheck").click();
         //document.getElementById("downloadmee").click();
 
        }
    </script>

<!--end-->
    
    
    
    
    
    
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cancelbooking(){
            
            var totaldeduction=0;
          var tpcancel= document.getElementsByClassName('tpcancel');
            
            
            
            for(let i=0; i<tpcancel.length; i++)
            {
                var percentage=document.getElementById('tpcancel'+i).value;
                 var price=document.getElementById('tpcancelprice'+i).value;
                 var vat=(parseInt(price)/100)*5;
                 totaldeduction=totaldeduction+((parseInt(price)/100)*parseInt(percentage))+vat;
                 
                 
               
            }
            
           
            
        
            
            
            
            
            
            
            Swal.fire({
  title: 'Are you sure?',
  html: "Deduction of <b style='color:red;'>AED "+totaldeduction+"</b> will be done from total amount",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Agree, Cancel My Booking'
}).then((result) => {
  if (result.isConfirmed) {
      
      
      
      var cancel='hotel';
      var bookingnumber=document.getElementById('bookingnumber').value;
        $.ajax({

                                            type: 'POST',
                                            url: 'cancelmybookingsubmit.php',
                                            data: {
                                                'cancel': cancel,
                                                'bookingnumber': bookingnumber,
                                                'dedcutedprice':totaldeduction
                                            },

                                            success: function(result) {
                                                
    Swal.fire(
      'Requested Cancellation!',
      'Your cancellation request has been sent.',
      'success'
    ).then(function(isConfirm) {
      if (isConfirm) {
    
    location.reload();
      }
    })
    
                                            }

                                        });
      
      
      
      
      
      
      
      
    
  }
})
            
            
            
            
        }
    </script>
    
    
    
    <?php
    include 'footer.php';
    ?>
    
  
</body>
</html>