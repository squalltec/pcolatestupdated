
     <style>
                        
    
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #DC3545; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
                    </style>

<style>
    body{
       
      margin:0 auto 0 0 !important;
    }
    .Gx5Zad {
       left:0 !important; 
    }
</style>

<?php





session_start();


$country=$_GET['country'];

$city=$_GET['city'];

$hotel=$_GET['hotel'];



include 'db_connection.php';


	include "simple_html_dom.php";
	
	
	
	
	
	
$sqlall2="SELECT * FROM hotelsdatabase WHERE name='$hotel' && country='$country' && city='$city'";
	
		$resultall2 = $conn->query($sqlall2);

if ($resultall2->num_rows > 0) {
  // output data of each row
  while($rowall2 = $resultall2->fetch_assoc()) {
      
     
      
      $gpsvalue=$rowall2['gps'];
      
  }
}

$gpsarray=explode(",",$gpsvalue);

$lat=$gpsarray[0];
$long=$gpsarray[1];
	
	
	

	$postFieldsmap = array(
		
		"lat" => $lat,
		"long" => $long
		
	);




	$chmap = curl_init();
	curl_setopt($chmap, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getmaps.php");
	curl_setopt($chmap, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($chmap, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($chmap, CURLOPT_POST, 1);
	curl_setopt($chmap, CURLOPT_POSTFIELDS, http_build_query($postFieldsmap));
	curl_setopt($chmap, CURLOPT_COOKIEJAR, "cookie.txt");
	$responsemap = curl_exec($chmap);
    //echo $response;
	curl_close($chmap);
	


echo $responsemap;


?>
<script>
   document.body.style.marginLeft = "-30px";
   document.body.style.paddingLeft = "0px";
  
</script>

