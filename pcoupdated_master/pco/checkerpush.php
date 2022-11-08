

<label onclick='aa()' >aaaaaaa</label>
<div id='a'>
  aisudiuasdiuad  
    
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
<h1>The XMLHttpRequest Object</h1>

<button type="button" onclick="loadDoc()">Request data</button>

<p id="demo"></p>


<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "https://risebs.com/checkajax.php", true);
  xhttp.send();
}
</script>

	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	  <script>
	  

function aa(){
    var a= document.getElementById("a");







 $.ajax({
    
    
              type:'POST',
              url:'https://risebs.com/checkajax.php',
			 success:function(result){
               
               a.innerHTML=result;
                      
                  }
                 
                 
          }); 

}
	
	  </script>