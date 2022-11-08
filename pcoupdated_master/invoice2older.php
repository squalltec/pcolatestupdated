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
                       echo $_SESSION['hotelcheck'];
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
    
              <!--          
              
              <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Transfer: 7 Seater Car</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>From:</b> Dubai Airport </span>
                                        <span><b>To:</b> Hotel Hyatt Regency</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Tours: Miracle Garden</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Trip:</b>  Miracle garden with ticket</span>
                                        <span><b>Packs:</b> 7</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Meet & Greet</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Packs: </b>   Family Pack Service (Marhabba) on Arrival</span>
                                        <span><b>Packs:</b> Family Pack Service (Marhabba) on Departure</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
                            
                            -->
                            
                            
                        </div>
    
    
    <!--tranfer-->
    
    
    
    
    
                        <?php
                       
                        $sqllasxa = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultxa=$conn->query($sqllasxa);
    
    
while($rowxa=mysqli_fetch_assoc($resultxa)){
    
    
    $tax=$rowxa['tax'];
    $ttl=$rowxa['total'];
    
}
                        
                        ?>
    
    
    
    
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words: </span>
                            <?php
echo numberTowords("$ttl");?></div>
                            <div class = "fw-bold">Grand Total <br/></div>
                            <div class = "fw-bold"><?php 
                           
                            echo 'AED '. $ttl;
                            ?>
                           
                           </div>
                        </div>
                        
                         <?php
                            
                                    echo '<small style="float:right;">VAT 5% Applicable</small>';
                                
                            ?>
                    </div>
    
   <?php }
    else if($_SESSION['hotelcheck']=='ht')
    {?>
    
    
   <?php
        
    }
      else if($_SESSION['hotelcheck']=='hr')
    {?>
    
    
   <?php
        
    }
      else if($_SESSION['hotelcheck']=='h')
    {
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
                       echo $_SESSION['hotelcheck'];
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
    
              <!--          
              
              <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Transfer: 7 Seater Car</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>From:</b> Dubai Airport </span>
                                        <span><b>To:</b> Hotel Hyatt Regency</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Tours: Miracle Garden</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Trip:</b>  Miracle garden with ticket</span>
                                        <span><b>Packs:</b> 7</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Meet & Greet</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Packs: </b>   Family Pack Service (Marhabba) on Arrival</span>
                                        <span><b>Packs:</b> Family Pack Service (Marhabba) on Departure</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
                            
                            -->
                            
                            
                        </div>
    
    
    
    
                        <?php
                       
                        $sqllasxa = "SELECT * FROM fullbooking WHERE uniquenumber='$number'";
     $resultxa=$conn->query($sqllasxa);
    
    
while($rowxa=mysqli_fetch_assoc($resultxa)){
    
    
    $tax=$rowxa['tax'];
    $ttl=$rowxa['total'];
    
}
                        
                        ?>
    
    
    
    
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words: </span>
                            <?php
echo numberTowords("$ttl");?></div>
                            <div class = "fw-bold">Grand Total <br/></div>
                            <div class = "fw-bold"><?php 
                           
                            echo 'AED '. $ttl;
                            ?>
                           
                           </div>
                        </div>
                        
                         <?php
                            
                                    echo '<small style="float:right;">VAT 5% Applicable</small>';
                                
                            ?>
                    </div>
    <?php
    }
        else if($_SESSION['hotelcheck']=='t')
    {?>
    
    
    
   <?php
       
    }
        else if($_SESSION['hotelcheck']=='r')
    {?>
    
    
    
    
    
   <?php
        
    }
    
    ?>                
                    
                    
                    
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















           <!-- <div class = "invo-bottom mt-3">
                <form class = "invo-pay">
                    <div class = "row mx-0">
                        <div class = "col-md-6 col-lg-4 px-0 pe-3">
                            <div class = "col-left py-4 px-3 h-100">
                                <p class = "fw-bold">Select a payment method</p>
                                <div class = "mb-3">
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Pay from my Account</span>
                                </div>
                                <div class="mb-3">
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Pay Later (Bank Transfer)</span>
                                </div>
                                <div>
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Credit Card</span>
                                </div>
                            </div>
                        </div>
                        <div class = "col-md-6 col-lg-8 px-0 ps-3">
                            <div class = "col-right h-100">
                                <p class = "fw-bold px-3 py-2 text-white">Select a payment method</p>
                                <div class = "px-4 pb-3">
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Available Balance:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Transaction Amount:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Balance after Payment:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "form-check mt-3">
                                        <input type = "checkbox" class = "form-check-input"> 
                                        <label class="form-check-label" for="">I agree to pay from my Account</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class = "invo-policy my-5">
                    <h6 class = "mb-4">Cancellation Policy</h6>
                    <div class = "policy-item mb-4">
                        <p class = "fw-bold policy-item-title">1.1 Orders cancellation fee - Standard fee</p>
                        <ul class = "list-unstyled">
                            <li>1.1.1 Cancelling 45 days or more before departure: the customer is charged a service fee of AUD 20.</li>
                            <li>1.1.2 Cancelling between 44 and 21 days before departure: the customer is charged a service fee of AUD 40. </li>
                        </ul>
                    </div>
                    <div class = "policy-item mb-4">
                        <p class = "fw-bold policy-item-title">1.2 Orders cancellation fee - Orders with the Timetravels flexible cancellation fee</p>
                        <p>If you have selected the Timetravels flexible cancellation fee when booking the trip, the cancellation fees are:</p>
                        <ul class = "list-unstyled">
                            <li>1.2.1 Cancelling 45 days or more before departure: the customer is charged a discounted service fee of AUD12.</li>
                            <li>1.2.2 Cancelling between 44 and 21 days before departure: the customer is charged a discounted service fee of AUD12. </li>
                            <li>1.2.3 Cancelling between 20 and 7 days before departure: the customer is charged a service fee of 40% of the total order value.</li>
                            <li>1.2.4a Cancelling between 6 and 3 days before departure: the customer is charged a service fee of 75% of the total order value.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="">I Confirm I have read the Cancellation Policy.</label>
            </div>
            
            
            -->
            
            
            
            <br/>
            
        </div>
         <a onclick="convert()" href = "#" style='margin-right:100px; float:right; width:200px;' class = "btn theme_btn active btn-secondary">Print Invoice</a>
       <!-- <form action='bookingconfirmed.php' method='POST'>
        <input type='submit' name='submit' style='margin-right:100px; float:right; width:200px;' class = "btn theme_btn active btn-secondary" value='Continue'>
        </form>-->
       <br/><br/><br/>
    </section>


    
    
    
    
    <?php
    include 'footer.php';
    ?>


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
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>

</body>
</html>