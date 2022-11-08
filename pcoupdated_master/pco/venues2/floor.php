<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.6/interact.min.js'></script>





















<style>
    .resize-drag {
 transform: rotate(0);
  transform-origin: center center;
  user-select: none;
  touch-action: none;
}

.resize-container {

  border: 1px solid #1F45FC;
  
  
}






</style>


<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body style='overflow-y: scroll; overflow-x: scroll;'>




<input id='width' placeholder='Width' class='form-control'>
<input id='height' placeholder='Height' class='form-control'>

<input onclick='changesize()' type='submit' value='Set Canvas'>

<br/>
<br/>

<h6 align='center'>
<button onclick='rotater()'><i class="fa fa-rotate-right"></i> Rotate</button>


<button onclick='dga()'><i class="icon-move"></i> Move </button>
</h6>
<button style='float:right;' id="foo">Download Floor Plan</button>




<br/>
<br/>
  <div class='row'>
      <div class='col-sm-2'>
            <select onchange='swap()' id='shape' class='form-control' >
      <option>Chairs</option>
      <option>Doors</option>
      <option>Stairs</option>
      </select>
      </div>
      <h6 style='float:right; color:red;'>Double Click object to Change Dimensions or Delete</h6>
      <br/><br/>
  </div>






         
        <div style=' margin: 0px auto;
       
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap; background-color:#D3D3D3; display:block; ' id='chairsall'>
              <img onclick='enterimage(this)' style='max-height:100px;' data-id='2chair' src='floorsimages/2chair.png'>
           
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='4chair' src='floorsimages/4chair.png'>
            
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='6chair' src='floorsimages/6chair.png'>
              
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='8chair' src='floorsimages/8chair.png'>
            
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='10chair' src='floorsimages/10chair.png'>
             
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='12chair' src='floorsimages/12chair.png'>
              
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='8straight' src='floorsimages/8straight.png'>
             
        
            
            
        </div>
        
          <div style=' margin: 0px auto;
       
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap; background-color:#D3D3D3; display:none;'  id='doorsall' >
              <img onclick='enterimage(this)' style='max-height:100px;' data-id='doorleft' src='floorsimages/doorleft.png'>
          
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='rightdoor' src='floorsimages/rightdoor.png'>
          
             <img onclick='enterimage(this)' style='max-height:100px;' data-id='revolvingdoor' src='floorsimages/revolvingdoor.png'>
           
              
              
              </div>
              
              
              
              
              
              
              
              
              
              
                 <div style=' margin: 0px auto;
       
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap; background-color:#D3D3D3; display:none;'  id='stairsall' >
              <img onclick='enterimage(this)' style='max-height:100px;' data-id='st1' src='floorsimages/st1.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st2' src='floorsimages/st2.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st3' src='floorsimages/st3.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st4' src='floorsimages/st4.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st5' src='floorsimages/st5.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st6' src='floorsimages/st6.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st7' src='floorsimages/st7.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st8' src='floorsimages/st8.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st9' src='floorsimages/st9.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st10' src='floorsimages/st10.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st11' src='floorsimages/st11.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st12' src='floorsimages/st12.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st13' src='floorsimages/st13.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st14' src='floorsimages/st14.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st15' src='floorsimages/st15.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st16' src='floorsimages/st16.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st17' src='floorsimages/st17.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st18' src='floorsimages/st18.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st19' src='floorsimages/st19.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st20' src='floorsimages/st20.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st21' src='floorsimages/st21.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st22' src='floorsimages/st22.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st23' src='floorsimages/st23.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st24' src='floorsimages/st24.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st25' src='floorsimages/st25.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st26' src='floorsimages/st26.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st27' src='floorsimages/st27.png'>
             
            <img onclick='enterimage(this)' style='max-height:100px;' data-id='st28' src='floorsimages/st28.png'>
             
            
             
            
        </div>
     
     
     
      <div   id='enterthedragondownload'>
      
       <nonsense id='widthsizelabel' style='color:#1F45FC; margin-left:3%;'>0 ft</nonsense><br/>
       <img style='margin-left:3%; width:3%' src='hoarrow.svg'><br/>
       
          <nonsense style='color:#1F45FC;' id='heightsizelabel'>0 ft</nonsense>  
          <img style='height:5%' src='verarrow.png'>
       
  
    
      
         <div style=' display: flex; justify-content: center;' >
           
           
          
           
           
             
             
<div id='enterthedragon'  class="resize-container">
  
    
 
</div>
             </div>
        
        
  
     


</div>








</body>







<script>
    
    function swap(){
        
        
        var val=document.getElementById('shape').value;
        
        
        if(val=='Doors')
        {
            document.getElementById('doorsall').style.display='block';
            
            document.getElementById('chairsall').style.display='none';
            
             document.getElementById('stairsall').style.display='none';
        }
        
        
              
        if(val=='Chairs')
        {
            document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='block';
             document.getElementById('stairsall').style.display='none';
        }
        
           if(val=='Stairs')
        {
            document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='none';
            
            
            document.getElementById('stairsall').style.display='block';
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


<script src='FileSaver.min.js'></script>
<script src='dom-to-image.min.js'></script>

<script>



var node = document.getElementById('enterthedragondownload');
var btn = document.getElementById('foo');

btn.onclick = function() {



    domtoimage.toBlob(node)
    .then(function (blob) {
        window.saveAs(blob, 'floorplan.png');
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
       
            var im=document.createElement('img');
            im.setAttribute('src','floorsimages/'+$this.getAttribute('data-id')+'.png');
            im.classList.add('resize-drag');
            im.classList.add('objss');
            
            im.setAttribute('id','im'+nari);
            
            im.setAttribute('style','width:100px; height:100px;');
            
             im.setAttribute('ondblclick','popp(this)');
             
             im.setAttribute('data-aa',nari);
             
             
             
       
       
       
       
       
       
       
       
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

    interact('.resize-drag')
  .draggable({
    onmove: window.dragMoveListener
  })
  .resizable({
    preserveAspectRatio: false,
    edges: { left: true, right: true, bottom: true, top: true }
  })
  .on('resizemove', function (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0),
        y = (parseFloat(target.getAttribute('data-y')) || 0);

    // update the element's style
    target.style.width  = event.rect.width + 'px';
    target.style.height = event.rect.height + 'px';

    // translate when resizing from top or left edges
    x += event.deltaRect.left;
    y += event.deltaRect.top;

    target.style.webkitTransform = target.style.transform =
        'translate(' + x + 'px,' + y + 'px)';

    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
    target.textContent = event.rect.width + '×' + event.rect.height;
  });

function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;


  
  
  var angleval=document.getElementById('angleval').value;
  
  
    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)' +'rotate(' + angleval + 'rad' + ')';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }
  

</script>




<script>
    function dga(){




   interact('.resize-drag')
  .draggable({
    onmove: window.dragMoveListener
  })
  .resizable({
    preserveAspectRatio: false,
    edges: { left: true, right: true, bottom: true, top: true }
  })
  .on('resizemove', function (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0),
        y = (parseFloat(target.getAttribute('data-y')) || 0);

    // update the element's style
    target.style.width  = event.rect.width + 'px';
    target.style.height = event.rect.height + 'px';

    // translate when resizing from top or left edges
    x += event.deltaRect.left;
    y += event.deltaRect.top;

    target.style.webkitTransform = target.style.transform = 
        'translate(' + x + 'px,' + y + 'px)';

    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
    target.textContent = event.rect.width + '×' + event.rect.height;
  });

function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;




      var angleval=document.getElementById('angleval').value;
  
  
    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)' +'rotate(' + angleval + 'rad' + ')';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }
  

}
</script>



















<script>
    //for rotation
    
    
    function rotater(){

    
    
   interact('.resize-drag')
  .draggable({
  onstart: function (event) {
    const element = event.target;
    const rect = element.getBoundingClientRect();

    // store the center as the element has css `transform-origin: center center`
    element.dataset.centerX = rect.left + rect.width / 2;
    element.dataset.centerY = rect.top + rect.height / 2;
    // get the angle of the element when the drag starts
    element.dataset.angle = getDragAngle(event);
  },
  onmove: function (event) {
    var element = event.target;
    var center = {
      x: parseFloat(element.dataset.centerX) || 0,
      y: parseFloat(element.dataset.centerY) || 0,
    };
    var angle = getDragAngle(event);




 

    // update the posiion attributes
    var xx=element.getAttribute('data-x');
var yy=element.getAttribute('data-y');



    // update transform style on dragmove
    element.style.transform = 'translate(' + xx + 'px, ' + yy + 'px)'+'rotate(' + angle + 'rad' + ')';
    
    document.getElementById('angleval').value=angle;
    
    
    
    
    
    
  },
  onend: function (event) {
    const element = event.target;

    // save the angle on dragend
    element.dataset.angle = getDragAngle(event);
  },
})

function getDragAngle(event) {
  var element = event.target;
  var startAngle = parseFloat(element.dataset.angle) || 0;
  var center = {
    x: parseFloat(element.dataset.centerX) || 0,
    y: parseFloat(element.dataset.centerY) || 0,
  };
  
 
  
  var angle = Math.atan2(center.y - event.clientY,
                         center.x - event.clientX);

  return angle - startAngle;
}
    
    }
    
    
    
    
</script>













