<?php
session_start();
include 'db_connection.php';


 $countvenues=$_SESSION['counting'];
 $venues=$_SESSION['venues'];
 
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];      


if(isset($_POST['next']))
{
      
$babzq=intval($_SESSION['counting'])+1;
    
   
  if(count($venues)>$babzq) 
  {
      $_SESSION['counting']=intval($_SESSION['counting'])+1;
      echo "<script>location.replace('uploadorfp.php');</script>"; 
  }
  else{
      $_SESSION['counting']='0';
      echo "<script>location.replace('addplanner3.php');</script>"; 
  }
   
}
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<script>
    var switcher=document.getElementsByClassName('btn-switcher');
    
    for(let i=0; i<switcher.length; i++)
    {
        switcher[i].remove();
    }
    
    
</script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>





<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js">
    </script>

	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,300i,400,400i" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="style.min.css" />
		<meta name="viewport" content="width=device-width" />

 <h4 align='center'>Floor Plan for <?php echo $venues[$countvenues];?></h4>
 
 
 <div>
	    	        
			<!--	<input onclick='dga()' type="radio" class="btn-check" name="options" style='max-width:100px;' id="option1" autocomplete="off" checked>
<label class="btn btn-secondary" for="option1">Move</label>

<input onclick='rotater()' type="radio" class="btn-check" name="options" style='max-width:100px;' id="option2" autocomplete="off">
<label class="btn btn-secondary" for="option2">Rotate</label>-->
<button style='float:right;' class='btn btn-warning'  id="foo">Download Floor Plan</button>
<button style='float:right;' class='btn btn-warning'  id="savemenext">Save / Next</button>


	<img id='image' src=''>		
	    	</div>
	    	



























 
    
	
	
	
	
	







	<img id='image' src=''>		
	    	</div>
	    	
	    
	    	<select onchange='swap()' id='shape' class='form-control' >
	  <option>Floor</option>
      <option>Chairs</option>
      <option>Doors</option>
      <option>Stairs</option>
      <option>Text</option>
      <option>Safety</option>
      </select>







	<div class="main">
					
		
			
			
			
				<h6 style='color:red;'>Double Click Objects to Delete or to Set Size</h6>
			
			
			  
			
			<div class="demo-container fade-content">
		
								   
			
				<section id='enterthedragondownload' class="demo">
				    
				    
				    		 
					<div style='position:relative;'  id="box" class="box">
					   
                         <canvas width='100%' height='100%' style='padding:15px; z-index:900; position:absolute;' id='canvas'></canvas>      
	
					  
						<div class="shadowboard">
						    
						</div>
						<div class="clipboard">
						     
						 
						      
						
						
						</div>
						
					
 
 <div  id='enterthedragon' class="resize-container handles"></div>
				   
	


<script>
    var tg=document.getElementsByTagName('canvas');
    for(let a =0; a<tg.length; a++)
    {
        tg[a].style.width='1000px';
    }
</script>
                 
				 
   	   
						     <nonsense id='widthsizelabel' style='z-index:999; color:#1F45FC; margin-left:3%;'>0 ft</nonsense><br/>
       <img style='z-index:999; margin-left:30px; width:60px' src='hoarrow.svg'><br/>
       
          <nonsense style='z-index:999; color:#1F45FC;' id='heightsizelabel'>0 ft</nonsense>  
          <img style='z-index:999; height:60px' src='verarrow.png'>
       
  
					
					</div>
						
					
					
				
		
    <img style="display: none;" src=
"https://media.geeksforgeeks.org/wp-content/uploads/20200327230544/g4gicon.png"
                id="my-image" alt="">
                
                
                
                
                
                
                
                
					<div class="custom-notice">
						<div>
							<span class="touchy"></span> to add points<br>to
							custom polygon.
						</div>
					</div>
				</section>
			</div>
			<section class="dark-panel custom">
				<h2>Custom shape</h2>
				<button class="finish"></button>
			</section>
			<section class="dark-panel inset">
				<div class="flex">
					<h2>Round edges</h2>
					<input value="5% 20% 0 10%" class="inset-round" type="text" />
				</div>
	
			</section>
			<section id="flickity" class="shapes horizontal gallery">
				<ul></ul>
			</section>
			<section style='display:none;' class="clip-path" tabindex="-1">
				<div class="css-code code fade-content">
					<!--
					<code class="webkit block"
						>-webkit-clip-path:
						<span class="functions"></span>;</code
					>
					-->
					<code class="unprefixed block show">clip-path: <span class="functions"></span>;</code>
				</div>
				<!-- <button class="edit-in-codepen code"></button> -->
			</section>
		</div>














<div class="side">
		
		
		
			
		
		
				
			
			
		
		
		
		
			<section class="dark-panel inset">
				<div class="flex">
					<h2>Round edges</h2>
					<input value="5% 20% 0 10%" class="inset-round" type="text" />
				</div>
			
			</section>
		
		
			<section class="dark-panel custom">
				<h2>Custom shape</h2>
				<button class="finish"></button>
			</section>
			<section id='floorsall' class="shapes vertical" tabindex="-1">
			    		<div class="grid panel flex fade-content">
					<h2>Size</h2>
					<input id="demo_width" onkeyup='sz()' value="280" type="number" />
					<h2>&times;</h2>
					<input id="demo_height" onkeyup='sz()'value="280" type="number" />
				</div>
			
				<ul></ul>
			</section>
			
			
	<script>
	    function sz(){
	        document.getElementById('widthsizelabel').innerHTML=document.getElementById('demo_width').value+' ft';
	        document.getElementById('heightsizelabel').innerHTML=document.getElementById('demo_height').value+' ft';
	    }
	</script>
		

			
					  <div style='display:none; ' id='chairsall'>
			      
			   
			    <img onclick='enterimage(this)' style='max-height:50px;' data-id='1chair' src='floorsimages/1chair.png'>   
			    <img onclick='enterimage(this)' style='max-height:50px;' data-id='1table' src='floorsimages/1table.png'>
			      
              <img onclick='enterimage(this)' style='max-height:50px;' data-id='2chair' src='floorsimages/2chair.png'>
           
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='4chair' src='floorsimages/4chair.png'>
            
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='6chair' src='floorsimages/6chair.png'>
              
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='8chair' src='floorsimages/8chair.png'>
            
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='10chair' src='floorsimages/10chair.png'>
             
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='12chair' src='floorsimages/12chair.png'>
              
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='8straight' src='floorsimages/8straight.png'>
             
        
            
            
        </div>
		
		
		
		
		
		
		 <div style='display:none; ' id='safetyall'>
			      
			      
			      
              <img onclick='enterimage(this)' style='max-height:50px;' data-id='fire' src='floorsimages/fire.png'>
           
            
            
            
        </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div style='display:none' id='textsall'>
		    
		    
		    	<label onclick='enterimage(this)' data-id='text' style='max-height:50px;' contenteditable="true">
Add Text
</label>
		    
		</div>
		
		
		
		
		
		
		
		
		
		     <div style='display:none;'  id='doorsall' >
              <img onclick='enterimage(this)' style='max-height:50px;' data-id='doorleft' src='floorsimages/doorleft.png'>
          
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='rightdoor' src='floorsimages/rightdoor.png'>
          
             <img onclick='enterimage(this)' style='max-height:50px;' data-id='revolvingdoor' src='floorsimages/revolvingdoor.png'>
           
              
              
              </div>
              
              
              
              
              
              
              
              
              
              
                 <div style='display:none;'  id='stairsall' >
              <img onclick='enterimage(this)' style='max-height:50px;' data-id='st1' src='floorsimages/st1.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st2' src='floorsimages/st2.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st3' src='floorsimages/st3.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st4' src='floorsimages/st4.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st5' src='floorsimages/st5.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st6' src='floorsimages/st6.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st7' src='floorsimages/st7.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st8' src='floorsimages/st8.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st9' src='floorsimages/st9.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st10' src='floorsimages/st10.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st11' src='floorsimages/st11.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st12' src='floorsimages/st12.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st13' src='floorsimages/st13.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st14' src='floorsimages/st14.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st15' src='floorsimages/st15.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st16' src='floorsimages/st16.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st17' src='floorsimages/st17.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st18' src='floorsimages/st18.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st19' src='floorsimages/st19.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st20' src='floorsimages/st20.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st21' src='floorsimages/st21.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st22' src='floorsimages/st22.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st23' src='floorsimages/st23.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st24' src='floorsimages/st24.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st25' src='floorsimages/st25.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st26' src='floorsimages/st26.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st27' src='floorsimages/st27.png'>
             
            <img onclick='enterimage(this)' style='max-height:50px;' data-id='st28' src='floorsimages/st28.png'>
             
            
             
            
        </div>
     
		
		</div>
		


<form action='#' method='POST'>
		    <input style='display:none;' id='nexta' name='next' type='submit'>
		</form>
		




		<script src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="draggabilly.min.js"></script>
		<script src="dev/flickity.pkgd.min.js"></script>
		<script src="dev/clip.js"></script>
		<script src="clip.min.js"></script>






<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.6/interact.min.js'></script>












<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







<script>
    
    function swap(){
        
        
        var val=document.getElementById('shape').value;
        
          if(val=='Safety')
        {
            
            document.getElementById('safetyall').style.display='block';  
            document.getElementById('floorsall').style.display='none';
             document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='none';
            
             document.getElementById('stairsall').style.display='none';
              document.getElementById('textsall').style.display='none';
             
        }
        if(val=='Floor')
        {
            
            
            document.getElementById('safetyall').style.display='none';  
            document.getElementById('floorsall').style.display='block';
             document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='none';
            
             document.getElementById('stairsall').style.display='none';
              document.getElementById('textsall').style.display='none';
            
            
        }
        
        
        
        
        if(val=='Doors')
        {
            
            document.getElementById('safetyall').style.display='none';  
            document.getElementById('floorsall').style.display='none';
            document.getElementById('doorsall').style.display='block';
            
            document.getElementById('chairsall').style.display='none';
            
             document.getElementById('stairsall').style.display='none';
              document.getElementById('textsall').style.display='none';
        }
        
        
              
        if(val=='Chairs')
        {
            
            document.getElementById('safetyall').style.display='none';  
             document.getElementById('textsall').style.display='none';
            document.getElementById('floorsall').style.display='none';
            
            
            document.getElementById('chairsall').style.display='block';
            document.getElementById('doorsall').style.display='none';
             document.getElementById('stairsall').style.display='none';
        }
        
           if(val=='Stairs')
        {
            
            document.getElementById('safetyall').style.display='none';  
             document.getElementById('textsall').style.display='none';
            document.getElementById('floorsall').style.display='none';
            document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='none';
            
            
            document.getElementById('stairsall').style.display='block';
        }
        
        
        
               if(val=='Text')
        {
            
            document.getElementById('safetyall').style.display='none';  
             document.getElementById('textsall').style.display='block';
            document.getElementById('floorsall').style.display='none';
            document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='none';
            
            
            document.getElementById('stairsall').style.display='none';
        }
        
        
        
    }
    
</script>






<input style='display:none;' value='0' id='angleval'>





<script>
    function changesize()
    {
        
        
        var w=document.getElementById('width').value;
        var h=document.getElementById('height').value;
        
        
        
        
         document.getElementById('heightsizelabel').innerHTML= h+" ft";
         document.getElementById('widthsizelabel').innerHTML= w+" ft";
         
        document.getElementById('enterthedragon').style.width = w+"px";
        document.getElementById('enterthedragon').style.height = h+"px";
        
        document.getElementById('enterthedragon').innerHTML='';
        
        
        
        
        
        
    }
</script>



<script>
    function remove($this){
        
       
        var mb=document.getElementsByClassName('modal-backdrop');
        
        
        
        for(let a=0; a<mb.length; a++)
        {
            mb[0].remove();
           
        }
        
        document.getElementById('non'+$this.getAttribute('data-id')).remove();
        
        
    }
</script>


<div id='dummy'></div>

<style>
    .modal-backdrop{
        display:none;
    }
</style>
<script src='FileSaver.min.js'></script>
<script src='dom-to-image.min.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





<script>
    
var node = document.getElementById('enterthedragondownload');
var btn = document.getElementById('savemenext');

btn.onclick = function() {



var hans=document.getElementsByClassName('handle');

for(let i=0; i<hans.length; i++)
{
    hans[i].style.display='none';
}

    domtoimage.toBlob(node)
    .then(function (blob) {
        
        
    var urlCreator = window.URL || window.webkitURL;
   var imageUrl = urlCreator.createObjectURL(blob);
  
   
   
   var data = new FormData();
data.append('file', blob);

  $.ajax({  
    type: 'POST',  
    url: 'upload.php', 
   data: data,
    contentType: false,
        processData: false,
    success: function(response) {
       document.getElementById('nexta').click();
    },    
        error: function() {
          alert('error in saving');
        }
});
  
  
  
  
    
      
        
        
          for(let i=0; i<hans.length; i++)
{
    hans[i].style.display='block';
}
        
    });
    
    

    
    
    
    
    
}
</script>





















<script>

var node = document.getElementById('enterthedragondownload');
var btn = document.getElementById('foo');

btn.onclick = function() {



var hans=document.getElementsByClassName('handle');

for(let i=0; i<hans.length; i++)
{
    hans[i].style.display='none';
}

    domtoimage.toBlob(node)
    .then(function (blob) {
        window.saveAs(blob, 'floorplan.png');
     
        
        
          for(let i=0; i<hans.length; i++)
{
    hans[i].style.display='block';
}
        
    });
    
    

    
    
    
    
    
}






function setwh($this)
{
    
    
    var gid= $this.getAttribute('data-id');
    
    
    var ob=document.getElementById('im'+gid);
    
     var w=document.getElementById('w'+gid).value;
      var h=document.getElementById('h'+gid).value;
    
    
    if(w==''|| h=='' || w=='0' || h=='0')
    {
        alert('please enter valid value');
    }
    else{
    ob.style.width = w+'px';
    ob.style.height = h+'px';
    }
    
}









function popp($this)
{
   document.getElementById('l'+$this.getAttribute('data-aa')).click();

}


var nari=0;

    function enterimage($this)
    {
        
       
      
        
        
        
        var non = document.createElement('nonsense');
        non.setAttribute('id','non'+nari);
       
       
       
       
       if($this.getAttribute('data-id')=='text')
       {
           var im=document.createElement('INPUT');
           
            im.setAttribute('contenteditable','true');
            im.setAttribute('style','color:#1F45FC; background: transparent; border: none;');
            
            
         
            
            
           im.value='Add Text';
          im.classList.add('resize-drag');
            im.classList.add('objss');
            
            im.setAttribute('id','im'+nari);
              im.setAttribute('ondblclick','popp(this)');
             
             im.setAttribute('data-aa',nari);
           
       }
       
       else
       {
       
            var im=document.createElement('img');
            im.setAttribute('src','floorsimages/'+$this.getAttribute('data-id')+'.png');
            im.classList.add('resize-drag');
            im.classList.add('objss');
            
            im.setAttribute('id','im'+nari);
            
            im.setAttribute('style','width:100px; height:100px;');
            
             im.setAttribute('ondblclick','popp(this)');
             
             im.setAttribute('data-aa',nari);
             
             
       }
       
       
       
       
       
       
       
       
          var labelzz =document.createElement('LABEL');
        labelzz.innerHTML='aaaa';
    
       
           labelzz.setAttribute('id','l'+nari);
           labelzz.setAttribute('style','display:none');
           
        labelzz.setAttribute('data-target','.bd-example-modal-sm'+nari);
        labelzz.setAttribute('data-toggle','modal');
       
       
            
            
            
            
            var d1=document.createElement('div');
            var d2=document.createElement('div');
            var d3=document.createElement('div');
              
              
            d1.classList.add('modal');
             d1.classList.add('fade');
              d1.classList.add('bd-example-modal-sm'+nari);
            
            d2.classList.add('modal-dialog');
              d2.classList.add('modal-sm');
            
            d3.classList.add('modal-content');
           
            var dbtn=document.createElement('button'); 
             dbtn.classList.add('btn-danger');
             dbtn.innerHTML='Delete';
             dbtn.setAttribute('onclick','remove(this)');
           
             dbtn.setAttribute('data-id',nari);
          
          
          
           var diw=document.createElement('INPUT'); 
             diw.classList.add('form-control');
             diw.placeholder='Width';
             
             diw.setAttribute('id','w'+nari);
          
          
            var dih=document.createElement('INPUT'); 
             dih.classList.add('form-control');
             dih.placeholder='Height';
             
             dih.setAttribute('id','h'+nari);
          
     var dbtnset=document.createElement('button'); 
             dbtnset.classList.add('btn-success');
             dbtnset.innerHTML='Set';
             dbtnset.setAttribute('onclick','setwh(this)');
             dbtnset.setAttribute('data-id',nari);
          
          
          
          
            d3.appendChild(dbtn);
             d3.appendChild(diw);
              d3.appendChild(dih);
               d3.appendChild(dbtnset);
             
             
            d2.appendChild(d3);
            d1.appendChild(d2);
            
            
            
             non.appendChild(im);
             non.appendChild(d1);
           non.appendChild(labelzz);
             document.getElementById('enterthedragon').appendChild(non);
            
            nari=nari+1;
       
    }
    
    
</script>



 <script>
 
        // Initiate a Canvas instance
        
     
        var canvas = new fabric.Canvas('canvas');
      
        // Get the image element
        var image = document.getElementById('my-image');
 
        // Initiate a Fabric instance
        var fabricImage = new fabric.Image(image);
 
        // Add the image to canvas
        canvas.add(fabricImage);
        
       
      
      
        
       
    </script>
					

