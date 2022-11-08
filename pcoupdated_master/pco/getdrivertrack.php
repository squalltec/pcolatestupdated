
  
         
       <nonsense id='displa'></nonsense>  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


setInterval(function () {
    

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }


function showPosition(position) {
    var d=document.getElementById('displa');
var lat=position.coords.latitude;
var long= position.coords.longitude;
d.innerHTML='LAT:'+lat+'LONG'+long;

}

        
}, 1000);    
        
   
</script>