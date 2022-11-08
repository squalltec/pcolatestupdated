<?php
require_once('db_connection.php');


include('header.php');

$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	




if (isset($_POST['submit'])) {
    
  
  $name=$_SESSION['hotel'];	
  $country=$_SESSION['country'];	
  $city=$_SESSION['city'];
  $model=$_POST['model'];
  $brand=$_POST['brand'];
  $year=$_POST['year'];
  $price=$_POST['price'];
  $dprice=$_POST['discountedvalue'];
  $discount=$_POST['dprice'];
  $ap=$_POST['type'];
  $sdates=$_POST['sdate'];
  $edates=$_POST['edate'];
  $aidi=$_POST['aidi'];
  
  
  
  
    $n=0;
    
    foreach($sdates as $sd)
    {
        $nn=0;
        foreach($model as $m)
        
        {
            
            if($discount[$nn]=='')
            {
               
            }
           
           else
           { 
    
    
    
    
    $sql2 = "INSERT INTO newrentacarpricesdis (name,country,city,brand,model,year,aidi,dprice,price,discount,ap,sdates,edates) VALUES ('$name','$country','$city','$brand[$nn]','$model[$nn]','$year[$nn]','$aidi[$nn]','$dprice[$nn]','$price[$nn]','$discount[$nn]','$ap[$nn]','$sdates[$n]','$edates[$n]')";


 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}
    
    
    
            
           }
         
         
         
         
         $nn= $nn+1;   
        }
        
        $n= $n+1; 
        
    }
    
    
    
    
    
    
    
  /*
       
$sql ="UPDATE setprices SET sellprice='$slp',dblsellprice='$dlp',previoussingle='$singleprice[$n]',previousdouble='$doubleprice[$n]',approved='approved',approveddate='$today' WHERE id='$id'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

*/
            
            
            
            
            
            
            
        }
        
        
   







 ?>
 
 


          <main class="page-content">
   









  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

			<form action='#' method='POST'>
				
				<h6 style='margin-top:-100px;' class="mb-0 text-uppercase">Add Discounts To Multiple</h6>
				<hr/>
				
				
				
				
		 <div id='popalme' class="container">
		     
                  <div id='popalme' class="row">
               
               <h4 align='center'>Dates</h4>
               <div class="col-sm">
                 
                   <input class='form-control' required name='sdate[]' type='date'>
                   </div>
                   
                    <div class="col-sm">
                       
                   <input class='form-control' required name='edate[]' type='date'>
                   </div>
                   
                   </div>
                   </div>
          <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 
           
           		
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div style='text-align:center;' class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>Brand</th>
										<th>Model</th>
										<th>Year</th>
										<th>Full Price</th>
										<th>Discounted <br/>Price</th>
									
									   <th>Discount</th>
										<th>Amount/<br/>Percentage</th>
									</tr>
								</thead>
								<tbody>
								   
								   <tr style='border:1px red solid;'>
								       <td></td>
								        <td></td>
								         <td></td>
								          <td></td>
								           <td></td>

<td><label for='select-all'>Apply to All</label><br/><input  type='checkbox' name='select-all' id='select-all'></td>

		<td><label>All Discounts</label><br/><input style='border:1px red solid;' type='number' id='markup-all'></td>
								       
								       
		
	
		<td><select id='typer' style='border:1px red solid;' class='form-select'>
									        <option>Amount</option>
									         <option>Percentage</option>
									        </select>
									    </td>						       
								       
								       
								       
								       
								   </tr>
								   <?php
								   $an=0;
$sql ="SELECT * FROM newrentacarprices WHERE name='$hotel' && country='$country' && city='$city' && approved='approved'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
			
			
			
			<input style='display:none;' name='aidi[]' value='<?php echo $row['id'];?>'>
			
			
								    
								<td><input name='brand[]' class='form-control' readonly value="<?php echo $row['brand'];?>"></td>			    
								
								
								
								
			<td><input name='model[]' class='form-control' readonly value="<?php echo $row['model'];?>"></td>			    
				<td><input name='year[]' class='form-control' readonly value="<?php echo $row['year'];?>"></td>			    
	<td><input name='price[]' id='price<?php echo $an;?>' class='form-control' readonly value="<?php echo $row['price'];?>"></td>			    
		<td><input name='discountedvalue[]'  id='discountedvalue<?php echo $an;?>' readonly placeholder='Discounted Price' class='form-control'></td>		
		
		
		<td><input id='approve<?php echo $an;?>' onclick='runapproval(this)' data-app='<?php echo $an;?>' name='approve<?php echo $an;?>' type='checkbox'></td>	    
	
	
		<td><input name='dprice[]' onkeyup="functionab();" id='dprice<?php echo $an;?>' readonly placeholder='Discount' class='markupvalues form-control'></td>							  						  							  				  						
							  
									    <td><select onchange='functionab()' id='type<?php echo $an;?>' name='type[]' class='selecter form-select'>
									        <option>Amount</option>
									         <option>Percentage</option>
									        </select>
									    </td>
									</tr>
								
								<?php
								
								$an=$an+1;
  }
}
?>
<input value='<?php echo $an;?>' style='display:none;' id='cnt'>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		<input type='submit' style='float:right;' class='btn-danger btn' name='submit' value='Submit'>
		
		
		</form>
		
		<br/>
		<br/>
		<br/>
	
	
	
	
	
	
	
		<h6 class="mb-0 text-uppercase">Discounts</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>Starting Date</th>
										<th>Ending Date</th>
										<th>Full Price</th>
										<th>Discounted Price</th>
										<th>Discount</th>
										<th>Amount/ Percentage</th>
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
								   
							
$sql ="SELECT * FROM newrentacarpricesdis WHERE name='$hotel' && country='$country' && city='$city' ORDER BY id DESC";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	 
	?>
								    
									<tr>
									<td><?php echo $row['sdates'];?></td>
										<td><?php echo $row['edates'];?></td>
										<td><?php echo $row['price'];?></td>
										<td><?php echo $row['dprice'];?></td>
										<td><?php echo $row['discount'];?></td>
										<td><?php echo $row['ap'];?></td>
									
									</tr>	
										
<?php										
												
}
}

?>

								</tbody>
								
							</table>
						</div>
					</div>
				</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<br/>
		<br/>
		<br/>
		
	
	
	
	
	
<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



var n=1;

function myFunction2() {

var popalme=document.getElementById('popalme');

var divr=document.createElement('div');
divr.classList.add('row');

var divc1=document.createElement('div');
divc1.classList.add('col-sm');

var divc2=document.createElement('div');
divc2.classList.add('col-sm');


var s=document.createElement('INPUT');
s.classList.add('form-control');
s.setAttribute('type','date');
s.setAttribute('name','sdate[]');
s.setAttribute('required','true');


var e=document.createElement('INPUT');
e.classList.add('form-control');
e.setAttribute('type','date');
e.setAttribute('name','edate[]');
e.setAttribute('required','true');


var del=document.createElement('BUTTON');
del.innerHTML='X';
del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
del.setAttribute('style','right:100px; position:absolute; width:50px;')



divc1.appendChild(s);
divc2.appendChild(e);

divr.appendChild(divc1);
divr.appendChild(divc2);
divr.appendChild(del);

popalme.appendChild(divr);





 n=n+1;
 
}

</script>


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
		
		
		<script>
		    function functionab()
		    {
		       
		        
		       
		  var nmb= document.getElementById('cnt').value; 
		  
		    for(let i=0; i<nmb; i++)
       {
          var ch=document.getElementById('approve'+i); 
          var dprice=document.getElementById('dprice'+i);
          
          
          if(dprice.value!='')
          {
            if(ch.checked==true)
           {
               
               
             var tp=document.getElementById('type'+i).value;   
               
               if(tp=='Amount')
               {
                  
                   var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   if(parseFloat(price)-parseFloat(dprice.value)>=0)
                   {
                   discountedprice.value=parseFloat(price)-parseFloat(dprice.value);
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
                    
               }
               
                   
               else if(tp=='Percentage')
               {
                       var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   var ttt= parseFloat(price)-((parseFloat(price)/100)*parseFloat(dprice.value));
                   
                   
                   if(ttt>=0)
                   {
                   discountedprice.value=ttt;
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
               }
               
           }
          }
          
          else{
              
             var discountedprice=document.getElementById('discountedvalue'+i).value='';  
              
              
          }
       }
       
       
       
       
       
        
		    }
		</script>
	
		
	<script>
	    
	   function runapproval($this)
	   {
	       
	       var ad= $this.getAttribute('data-app');
	       
	       var dprice=document.getElementById('dprice'+ad);
	       var dis=document.getElementById('discountedvalue'+ad);
	       
	       
	      if($this.checked==true)
	   {
	     $('#dprice'+ad).removeAttr('readonly');
	   }
	   else{
	       $('#dprice'+ad).attr('readonly', 'true');
               dprice.value=''; 
               dis.value='';
	   }
	       
	       
	       
	   }
	    
	    
	</script>	
<script>
    $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
        
        
        
            var all= document.getElementById('markup-all').value; 
     
     var nmb= document.getElementById('cnt').value; 
       
       for(let i=0; i<nmb; i++)
       {
          
           
           var ch=document.getElementById('approve'+i);
           var dprice=document.getElementById('dprice'+i);
           if(ch.checked==true)
           {
               $('#dprice'+i).removeAttr('readonly');
               dprice.value=all;
           }
           
           
           
           
       }
    
        
        
        
        
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
        
     var nmb= document.getElementById('cnt').value; 
       
       for(let i=0; i<nmb; i++)
       {
          
           
          
           var dprice=document.getElementById('dprice'+i);
          $('#dprice'+i).attr('readonly', 'true');
               dprice.value='';
           
           
           
           
           
       }
    
        
        
        
        
        
        
    }
    
    
    
    
    
    
  
    
    
    
    
    
    
    
          
		  var nmb= document.getElementById('cnt').value; 
		  
		    for(let i=0; i<nmb; i++)
       {
          var ch=document.getElementById('approve'+i); 
          var dprice=document.getElementById('dprice'+i);
          
          
          if(dprice.value!='')
          {
            if(ch.checked==true)
           {
               
               
             var tp=document.getElementById('type'+i).value;   
               
               if(tp=='Amount')
               {
                  
                   var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   if(parseFloat(price)-parseFloat(dprice.value)>=0)
                   {
                   discountedprice.value=parseFloat(price)-parseFloat(dprice.value);
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
                    
               }
               
                   
               else if(tp=='Percentage')
               {
                     var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   var ttt= parseFloat(price)-((parseFloat(price)/100)*parseFloat(dprice.value));
                   
                   
                   if(ttt>=0)
                   {
                   discountedprice.value=ttt;
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
               }
               
           }
          }
          
          else{
              
             var discountedprice=document.getElementById('discountedvalue'+i).value='';  
              
              
          }
       }
       
    
    
    
    
    
}); 
</script>	


		

<script>
    
    $("#typer").on("change", function(){
        
        var sel=document.getElementById("typer");
        
        
        
         var elements = document.querySelectorAll('.selecter');
    elements.forEach(function(element){
        element.selectedIndex = sel.selectedIndex;
    });
    
    
     
      
      
      
      
      
      
      
      
      
      
     
		  var nmb= document.getElementById('cnt').value; 
		  
		    for(let i=0; i<nmb; i++)
       {
          var ch=document.getElementById('approve'+i); 
          var dprice=document.getElementById('dprice'+i);
          
          
          if(dprice.value!='')
          {
            if(ch.checked==true)
           {
               
               
             var tp=document.getElementById('type'+i).value;   
               
               if(tp=='Amount')
               {
                  
                   var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   if(parseFloat(price)-parseFloat(dprice.value)>=0)
                   {
                   discountedprice.value=parseFloat(price)-parseFloat(dprice.value);
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
                    
               }
               
                   
               else if(tp=='Percentage')
               {
                     var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   var ttt= parseFloat(price)-((parseFloat(price)/100)*parseFloat(dprice.value));
                   
                   
                   if(ttt>=0)
                   {
                   discountedprice.value=ttt;
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
               }
               
           }
          }
          
          else{
              
             var discountedprice=document.getElementById('discountedvalue'+i).value='';  
              
              
          }
       }
       
       
        
      
      
      
      
      
      
      
      
      
      
        
       
        
    })
    
    
    
    
    $("#markup-all").on("keyup", function(){
        
             var all= document.getElementById('markup-all').value; 
     
     var nmb= document.getElementById('cnt').value; 
       
       for(let i=0; i<nmb; i++)
       {
          
           
           var ch=document.getElementById('approve'+i);
           var dprice=document.getElementById('dprice'+i);
           if(ch.checked==true)
           {
               dprice.value=all;
           }
           
           
           
           
       }
        
     

   /* var mk=document.getElementById('markup-all').value;
    
    
    var elements = document.querySelectorAll('.markupvalues');
    elements.forEach(function(element){
        element.value = mk;
        
        
        */
       
       
       
       
       
             
		  var nmb= document.getElementById('cnt').value; 
		  
		    for(let i=0; i<nmb; i++)
       {
          var ch=document.getElementById('approve'+i); 
          var dprice=document.getElementById('dprice'+i);
          
          
          if(dprice.value!='')
          {
            if(ch.checked==true)
           {
               
               
             var tp=document.getElementById('type'+i).value;   
               
               if(tp=='Amount')
               {
                  
                   var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   if(parseFloat(price)-parseFloat(dprice.value)>=0)
                   {
                   discountedprice.value=parseFloat(price)-parseFloat(dprice.value);
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
                    
               }
               
                   
               else if(tp=='Percentage')
               {
                     var price=document.getElementById('price'+i).value; 
                    var discountedprice=document.getElementById('discountedvalue'+i); 
                   
                   var ttt= parseFloat(price)-((parseFloat(price)/100)*parseFloat(dprice.value));
                   
                   
                   if(ttt>=0)
                   {
                   discountedprice.value=ttt;
                   }
                   else{
                       alert('Discount Price is increased than the actual price!!');
                       discountedprice.value='';
                       dprice.value='';
                   }
               }
               
           }
          }
          
          else{
              
             var discountedprice=document.getElementById('discountedvalue'+i).value='';  
              
              
          }
       }
       
       
       
       
       
       
       
         
		 
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
        
        
    });

    
    
    
    
    
    
</script>
  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
 











</main>

