



<nonsense id='displa'></nonsense>

<script>


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
</script>
