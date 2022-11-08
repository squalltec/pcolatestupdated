
<?php

include 'header.php';
?>

      <main class="page-content">   

    
<input name='city' id='city' class='form-control' type='text'>
<br/>
<input type='submit' id='btme' onclick='sendreq();' class='btn btn-danger'>


<nonsense id='bnb'>
    
</nonsense>
<br/><br/>



<div style='display:none;' id='fetc' class="alert alert-success" role="alert">
  <h4 class="alert-heading">Fetching Events</h4>
  <p>Fetching <nonsense id='increas'>1</nonsense></p>
  <hr>
  <p class="mb-0">Out of 50 Pages.</p>
  <div class="progress">
  <div class="progress-bar progress-bar-striped bg-danger" id='prog' role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  
</div>


<input value='1' style='display:none;' readonly type='number' class='form-control' id='startnumber'>
</main>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  
   
    function sendreq(){
         var city= document.getElementById('city').value;
         
         
         if(city=='')
         {
             swal.fire('Please Enter City Name');
             
         }
         else{
        
        document.getElementById('btme').style.display='none';
        var start =document.getElementById('startnumber').value;
        
        
        document.getElementById('increas').innerHTML=start;
        document.getElementById('prog').style.width=parseInt(start)*2+'%';
        
        
        
        
        
       
     
               
               
        document.getElementById('fetc').style.display='block';
               
                
               
               
               
               
               
               
               
         
 $.ajax({
              type:'POST',
              url:'fetcheventsajax.php',
              data:{'city':city,'start':start},
             
              success:function(result){
                  
                  var st=document.getElementById('startnumber').value;
                 
                
                    if(st=='50')
                    {
                        
        document.getElementById('fetc').style.display='none';
        
        document.getElementById('btme').style.display='block';
        Swal.fire(
  'Fetching Done'
 
)

        
                    }
                    else{
                        document.getElementById('startnumber').value=parseInt(st)+1;
                        sendreq();
                    }
                 
                 
              }
                
              });
              
              
             
              
              
        }
        
    }
        
</script>


<script>
           $("#city").keyup(function() {   
         
        
         var city= document.getElementById('city').value;
         
 $.ajax({
              type:'POST',
              url:'checkiffetched.php',
              data:{'city':city},
             
              success:function(result){
                  
                  if(result.includes("exist"))
                  {
                      swal.fire('Already Fetched for this city');
                      document.getElementById('city').value='';
                  }
                  
                  //alert(result);
              }
              
              });
              
           });
</script>
 
 
 