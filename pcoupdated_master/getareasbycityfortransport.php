<?php

include 'db_connection.php';

$country=$_POST['country'];
$city=$_POST['city'];

//$country='United Arab Emirates';
//$city='Dubai';

$sql="SELECT * FROM countrydata WHERE country='$country'";

 $result=$conn->query($sql);

while($row=mysqli_fetch_assoc($result)){
    
    $acb= explode(',',$row['airports']);
    
    foreach($acb as $val){
        if(strpos($val, $city) !== false || strpos($val, $city) !== false){
        
        echo '<option>'.$val.'</option>';
        }
        
    }
    
    
}







$sql2="SELECT * FROM hotelsdatabase WHERE country='$country' && city='$city'";

 $result2=$conn->query($sql2);

while($row2=mysqli_fetch_assoc($result2)){
    
    
   
        echo '<option value="'.$row2['name'].'">'.$row2['area'].'</option>';
  
    
}








$sql3="SELECT * FROM countries WHERE country='$country'";

 $result3=$conn->query($sql3);

while($row3=mysqli_fetch_assoc($result3)){
    
    $iso=$row3['iso2'];
    
$sql33="SELECT * FROM cities WHERE country_code='$iso'";

 $result33=$conn->query($sql33);

while($row33=mysqli_fetch_assoc($result33)){
    
    if($row33['name']==$city)
    {
        
    }
    else{
    echo '<option>'.$row33['name'].'</option>';
    }
    
    
}
       
  
    
}
















?>