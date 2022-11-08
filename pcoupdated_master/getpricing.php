<?php

session_start();




$saner= $_SESSION['sameider'];



if(count($saner)>=3)
{
    $_SESSION['sameider']=array();

}







$dates2=array();

$datee2=array();

$abc='qqq';


$idza='';

$dates=array();

$datee=array();

$subtractid=array();

$subtractnumber=array();



include 'db_connection.php';
$numberofdaysforprice=array();
$pricefordays=array();

$totalprice=0;

$country=$_SESSION['country'];
$city=$_SESSION['city'];
$hotel=$_SESSION['hotel'];

$roomtype=$_POST['roomtype'];

$adult=$_POST['adult'];

$children=$_POST['children'];

$sdate=$_POST['sdate'];

$edate=$_POST['edate'];

$rooms='1';

$getnumberzero=$_SESSION['getnumberzero'];

$getnumber=$_POST['getnumber'];



//$rooms='1';

//$roomtype='Deluxe';

//$adult='1';

//$children='0';

//$sdate='2022-9-15';

//$edate='2022-9-16';


$singleprices=array();


$singlepricesarray=array();








$_SESSION[$roomtype.'singleprices']=array();








$taxnametax='';
$percentagetax='';
$choicetax='';










 $sql3 = "SELECT * FROM basiccharges WHERE hotel='$hotel' && country='$country' && location='$city'";
 
 
 $result3=$conn->query($sql3);
 

 
while($row3=mysqli_fetch_assoc($result3)){
    $extrabedcost=$row3['extrabed'];
}


















 $sql2 = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
 
 
 $result2=$conn->query($sql2);
 

 
while($row2=mysqli_fetch_assoc($result2)){
    
$sa=$row2['singleadultoccupancy'];
$sc=$row2['singlechildoccupancy'];
$seb=$row2['singleextrabedsallowed'];

$da=$row2['doubleadultoccupancy'];
$dc=$row2['doublechildoccupancy'];
$deb=$row2['doubleextrabedsallowed'];



}




$max=intval($adult)+intval($children);

$singlemax=intval($sa)+intval($sc);

$doublemax=intval($da)+intval($dc);

$singlemaxwithextrabed=intval($singlemax)+intval($seb);

$doublemaxwithextrabed=intval($doublemax)+intval($deb);


				
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);

$_SESSION['totaldays']=$numberDays;



$pr=array();
$pr2=array();


$prtoy='';



$nn=0;
$nn2=0;

 $sqllas = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$roomtype' && class=''";
 
 
 $result=$conn->query($sqllas);
 

 
while($row=mysqli_fetch_assoc($result)){
  
    
     
    
        
    if($row['class']==''){
    
        
        
        
$fi=0;
$tt2=200000000000000000000000000000000000;



$sql3zz = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$roomtype' && (class='FIT' || class='')";
 
 
 $result3zz=$conn->query($sql3zz);
 


while($row3zz=mysqli_fetch_assoc($result3zz)){
    
    
    $st=$_SESSION['sendcategory'].' '.'star';
$sqltax = "SELECT * FROM taxnames WHERE country='$country' && city='$city' && star='$st' ";
 
 
 
 $resulttax=$conn->query($sqltax);
 

 
while($rowtax=mysqli_fetch_assoc($resulttax)){
    
    $taxnametax=explode(",",$rowtax['taxname']);
    $percentagetax=explode(",",$rowtax['percentage']);
    $choicetax=explode(",",$rowtax['choice']);
    
}




$_SESSION[$roomtype.'taxnametax']=$taxnametax;
$_SESSION[$roomtype.'percentagetax']=$percentagetax;
$_SESSION[$roomtype.'choicetax']=$choicetax;



    
  
    
    if($row3zz['class']=='')
    {
        $fi=$fi+1;

        $daterz = date('Y-m-d');


$startTimeStampz = strtotime($daterz);
			$endTimeStampz = strtotime($row3zz['dates']);
			
			
			
$timeDiffz = abs($endTimeStampz - $startTimeStampz);

$numberDaysz = $timeDiffz/86400;  // 86400 seconds in one day

if(intval($numberDaysz)<$tt2)
{
$tt2=intval($numberDaysz);
$fiz=$fi;

}

    
    
    }
    
}














 $nn2=$nn2+1;
        
        
        
        
        
       if($nn2==$fi)
        
        {




     $period = new DatePeriod(new DateTime($row['sdate']), new DateInterval('P1D'), new DateTime($row['edate']));
     
    
     
     $period2 = new DatePeriod(new DateTime($sdate), new DateInterval('P1D'), new DateTime($edate));
     
     
     
     
     
     
     foreach ($period as $date) {
        $dt=$date->format("Y-m-d");
        
   
    foreach ($period2 as $date2) {
      $dt2=$date2->format("Y-m-d");
      
       if($dt2==$dt)
   {
       
    
       
       array_push($dates,$dt2);
       array_push($datee,$row['edate']);
       
       if($max<=$singlemaxwithextrabed){
           
           if($max>$singlemax)
           {
            
            $abashi= $row['sellprice'];
               
               if($abashi=='')
               {
                   $pprr= intval($row['dblsellprice'])+intval($extrabedcost); 
               }
          else{
               $pprr= intval($row['sellprice'])+intval($extrabedcost);
          }
           
                 
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    

    
           //echo $pprr;   
           
           array_push($singlepricesarray,$pprr);
           array_push($pr,$pprr);   
           array_push($_SESSION[$roomtype.'singleprices'],$pprr);
           
          $idza=$row['sameid'];
           
               
           }
           else{
               
               $abashi= $row['sellprice'];
               
               if($abashi=='')
               {
                   $pprr=$row['dblsellprice'];
               }
               else{
                   $pprr=$row['sellprice'];
               }
               
               
            
            
            
              
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
                  
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
            
            
            
            
            
           //thissssssss
           
           //echo $pprr;    
       array_push($pr,$pprr);
       array_push($singlepricesarray,$pprr);
      array_push($_SESSION[$roomtype.'singleprices'],$pprr);
      $idza=$row['sameid'];
       
       
       
       
       
       
           }
       
       }
    else if($max<=$doublemaxwithextrabed){
        
        if($max>$doublemax)
           {
               
           $pprr= intval($row['dblsellprice'])+intval($extrabedcost);
           
           
           
            
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
           
           
          //echo $pprr;   
           
           array_push($pr,$pprr);   
           array_push($singlepricesarray,$pprr);
           array_push($_SESSION[$roomtype.'singleprices'],$pprr);
          $idza=$row['sameid'];   
           }
        else{
            
         $pprr= $row['dblsellprice'];
            
            
            
            
             
            
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
                $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
            
            
            
            
            
            
            
            
            
            
            
       array_push($pr,$pprr);
       array_push($singlepricesarray,$pprr);
       array_push($_SESSION[$roomtype.'singleprices'],$pprr);
      $idza=$row['sameid'];
        }
       }
   } 
    }
     }
        }
    }
     
    
   
   
  
  
  
   
      
}



















 $sqllas = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$roomtype' && class='FIT'";
 
 
 $result=$conn->query($sqllas);
 

 
while($row=mysqli_fetch_assoc($result)){
   
    


   
        
    
      
  
  
  if($row['class']=='FIT')
    {
        
       
         
$fitnumnb=-1;
$tt=200000000000000000000000000000000000;
 $sql3z = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$roomtype' && class='FIT'";
 
 
 
 $result3z=$conn->query($sql3z);
 

while($row3z=mysqli_fetch_assoc($result3z)){
    
  
    
    if($row3z['class']=='FIT')
    {
       
 
        $fitnumnb=$fitnumnb+1;

        $dater = date('Y-m-d');


$startTimeStamp = strtotime($dater);
			$endTimeStamp = strtotime($row3z['dates']);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

if(intval($numberDays)<$tt)
{
$tt=intval($numberDays);
$fitn=$fitnumnb;


}

    
    
    }
    
  


        
        
     
        
        
        
        
        
        
        
       // echo $row3z['sdate'];
        

        
       if($nn==$fitnumnb)
        
        {
           
    
        
       $period = new DatePeriod(new DateTime($row3z['sdate']), new DateInterval('P1D'), new DateTime($row3z['edate']));
     
     $period2 = new DatePeriod(new DateTime($sdate), new DateInterval('P1D'), new DateTime($edate));
     
     foreach ($period as $date) {
        $dt=$date->format("Y-m-d");
        
       //echo $dt;
    
  
    foreach ($period2 as $date2) {
      $dt2=$date2->format("Y-m-d");
       
       
       if($dt2==$dt && !in_array($dt2, $dates))
   {
       
      array_push($dates2,$dt2);
      
      
       if($max<=$singlemaxwithextrabed){
           
           if($max>$singlemax)
           {
               
                 $abashi= $row['sellprice'];
               
               if($abashi=='')
               {
                   $pprr= intval($row['dblsellprice'])+intval($extrabedcost);
               }
               else
               {
           $pprr= intval($row['sellprice'])+intval($extrabedcost);
               }
           
             
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
           
           
           
           
           array_push($pr2,$pprr);   
                array_push($singlepricesarray,$pprr);
                array_push($_SESSION[$roomtype.'singleprices'],$pprr);
                $idza=$row['sameid'];
           }
           else{
                 $abashi= $row['sellprice'];
               
               if($abashi=='')
               {
                 $pprr=$row['dblsellprice'];  
               }
               
               else{
                   $pprr=$row['sellprice'];
               }
               
                
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
                $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
               
       array_push($pr2,$pprr);
        array_push($singlepricesarray,$pprr);
        array_push($_SESSION[$roomtype.'singleprices'],$pprr);
        $idza=$row['sameid'];
           }
       
       }
    else if($max<=$doublemaxwithextrabed){
        
        if($max>$doublemax)
           {
           $pprr= intval($row['dblsellprice'])+intval($extrabedcost);
           
           
           
             
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
                $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
           
           
           
           
           
           array_push($pr2,$pprr);  
           
           array_push($_SESSION[$roomtype.'singleprices'],$pprr);
           
            array_push($singlepricesarray,$pprr);
           $idza=$row['sameid'];
              
           }
        else{
            
            
            $pprr=$row['dblsellprice'];
            
            
             
$string=$row['including'];

    
        for($i=0;$i<count($taxnametax); $i++)
           {
                $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pprr/100*intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pprr=$pprr+$abc;
               }
               }
           } 
           }
    
            
            
       array_push($pr2,$pprr);
       
       
       array_push($_SESSION[$roomtype.'singleprices'],$pprr);
           
           
        array_push($singlepricesarray,$pprr);
        $idza=$row['sameid'];
        }
       }
      
     
      
      
       
   }
   
   
    }
     }
     
        }
     
     
     $nn=$nn+1;
       
}
    }
    
    
    
    
}
    
    
    
    
    

































$eventdays=count($dates);

$fitdays=count($dates2);



$total=0;
for($a=0; $a<count($dates); $a++)
{
   $total=$total+ intval($pr[$a]);
}


for($a=0; $a<count($dates2); $a++)
{
   $total=$total+ intval($pr2[$a]);
}






array_push($_SESSION['sameider'],$idza);




echo $total;









//echo $totalprice;














?>