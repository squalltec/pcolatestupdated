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

  border: 1px solid black;
  
  
}






</style>


<body style='overflow-y: scroll; overflow-x: scroll;'>




<input id='width' placeholder='Width' class='form-control'>
<input id='height' placeholder='Height' class='form-control'>

<input onclick='changesize()' type='submit' value='Set Canvas'>
  
  <select onchange='swap()' id='shape' class='form-control' >
      <option>Chairs</option>
      <option>Doors</option>
      <option>Stairs</option>
      </select>
    <div class='row'>
      
        
        
        <div style='height:800px; overflow-y: scroll; background-color:#000044;' id='chairsall' class='col-sm-2'>
              <img onclick='enterimage(this)' style='width:40%;' data-id='2chair' src='floorsimages/2chair.png'>
             <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='4chair' src='floorsimages/4chair.png'>
             <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='6chair' src='floorsimages/6chair.png'>
              <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='8chair' src='floorsimages/8chair.png'>
              <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='10chair' src='floorsimages/10chair.png'>
             
            
            
        </div>
        
        
            <div style='height:800px; overflow-y: scroll; background-color:#000044; display:none;'  id='doorsall' class='col-sm-2'>
              <img onclick='enterimage(this)' style='width:40%;' data-id='doorleft' src='floorsimages/doorleft.png'>
             <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='rightdoor' src='floorsimages/rightdoor.png'>
           <br/>
             <img onclick='enterimage(this)' style='width:40%;' data-id='revolvingdoor' src='floorsimages/revolvingdoor.png'>
           
             
            
            
        </div>
        
         <div class='col-sm'>
             <h6 style='float:right; color:red;'>Double Click object to Delete</h6>
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
        }
        
        
              
        if(val=='Chairs')
        {
            document.getElementById('doorsall').style.display='none';
            
            document.getElementById('chairsall').style.display='block';
        }
        
        
    }
    
</script>






<button onclick='rotater()'>active rotate</button>


<button onclick='dga()'>active drag</button>








<script>
    function changesize()
    {
        
        
        var w=document.getElementById('width').value;
        var h=document.getElementById('height').value;
        
        
        
        
        
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


<script>

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
            
            im.setAttribute('id','im'+nari);
            
            
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
            d3.appendChild(dbtn);
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

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

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

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

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

    // update transform style on dragmove
    element.style.transform = 'rotate(' + angle + 'rad' + ')';
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













