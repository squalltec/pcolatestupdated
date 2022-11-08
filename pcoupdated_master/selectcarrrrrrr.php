<?php

session_start();

include 'db_connection.php';
include 'header.php';


if (isset($_POST['modify'])) {

$tt= $_POST['triptype'];

if($tt=='round')
{

    $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
      $_SESSION['arrivaldate']=$_POST['arrivaldate'];
       $_SESSION['departuredate']=$_POST['departuredate'];
        $_SESSION['fromlocation1']=$_POST['fromlocation1'];
       $_SESSION['tolocation1']=$_POST['tolocation1'];
       $_SESSION['fromlocation2']=$_POST['fromlocation2'];
       $_SESSION['tolocation2']=$_POST['tolocation2'];
        $_SESSION['type1']=$_POST['type1'];
       $_SESSION['type2']=$_POST['type2'];
      $_SESSION['triptype']=$_POST['triptype']; 
}
    if($tt=='From Hotel to Airport')
{
    
    
     $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
     
       $_SESSION['departuredate']=$_POST['departuredate'];
        
       $_SESSION['fromlocation2']=$_POST['fromlocation2'];
       $_SESSION['tolocation2']=$_POST['tolocation2'];
        
       $_SESSION['type2']=$_POST['type2'];
      $_SESSION['triptype']=$_POST['triptype']; 
    
    
    
}

    if($tt=='From Airport to Hotel')
{
     $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
      $_SESSION['arrivaldate']=$_POST['arrivaldate'];
      
        $_SESSION['fromlocation1']=$_POST['fromlocation1'];
       $_SESSION['tolocation1']=$_POST['tolocation1'];
      
        $_SESSION['type1']=$_POST['type1'];
    
      $_SESSION['triptype']=$_POST['triptype']; 
}




header("Location: selectcar.php");

    
}


if (isset($_POST['submit'])) {

$tt= $_POST['triptype'];

if($tt=='round')
{

    $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
      $_SESSION['arrivaldate']=$_POST['arrivaldate'];
       $_SESSION['departuredate']=$_POST['departuredate'];
        $_SESSION['fromlocation1']=$_POST['fromlocation1'];
       $_SESSION['tolocation1']=$_POST['tolocation1'];
       $_SESSION['fromlocation2']=$_POST['fromlocation2'];
       $_SESSION['tolocation2']=$_POST['tolocation2'];
        $_SESSION['type1']=$_POST['type1'];
       $_SESSION['type2']=$_POST['type2'];
      $_SESSION['triptype']=$_POST['triptype']; 
      
      $_SESSION['car1']=$_POST['car1']; 
      $_SESSION['car2']=$_POST['car2']; 
      
      
      
      
}
    if($tt=='From Hotel to Airport')
{
    
    
     $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
     
       $_SESSION['departuredate']=$_POST['departuredate'];
        
       $_SESSION['fromlocation2']=$_POST['fromlocation2'];
       $_SESSION['tolocation2']=$_POST['tolocation2'];
        
       $_SESSION['type2']=$_POST['type2'];
      $_SESSION['triptype']=$_POST['triptype']; 
      
      
      $_SESSION['car2']=$_POST['car2']; 
    
    
    
}

    if($tt=='From Airport to Hotel')
{
     $_SESSION['country']=$_POST['country']; 
    $_SESSION['city']=$_POST['city'];
     $_SESSION['pax']=$_POST['pax'];
      $_SESSION['arrivaldate']=$_POST['arrivaldate'];
      
        $_SESSION['fromlocation1']=$_POST['fromlocation1'];
       $_SESSION['tolocation1']=$_POST['tolocation1'];
      
        $_SESSION['type1']=$_POST['type1'];
    
      $_SESSION['triptype']=$_POST['triptype']; 
      
      $_SESSION['car1']=$_POST['car1']; 
}




}















?>




     <link rel="icon" type="image/x-icon" href="img/logo.png">
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/appp.css">
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">    
    
    




 <link rel="stylesheet" 
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
                  
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
    
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">


    
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>


















<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select Language</h5>
       <button style='display:none;' id='clme' type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span id='clickclose' aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="notranslate modal-body">
          <div class='container'>
              <div class='row'>
                 <div data-val='en' onclick='selectl(this)' class='col-sm'>
        <img src='flags/united-kingdom.png' style='max-width:50px;'>
        <p>English</p>
        </div>
        
        
          <div data-val='ar' onclick='selectl(this)' class='col-sm'>
        <img src='flags/united-arab-emirates.png' style='max-width:50px;'>
        <p>Arabic</p>
        </div>
        
        
          <div data-val='de' onclick='selectl(this)' class='col-sm'>
        <img src='flags/germany.png' style='max-width:50px;'>
        <p>German</p>
        </div>
        
         <div data-val='ru' onclick='selectl(this)' class='col-sm'>
        <img src='flags/russia.png' style='margin-left:5px; max-width:50px;'>
        <p>Russian</p>
        </div>
        
           <div data-val='sv' onclick='selectl(this)' class='col-sm'>
        <img src='flags/sweden.png' style='margin-left:5px; max-width:50px;'>
        <p>Swedish</p>
        </div>
      
        </div>
        </div>
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
               
           
           
           
           
           
           
           
           
           
           
           
           
    
           
         
           
           
           
 
           
           
           
           
           
           
           
               
               
               
               
               
               
    
<!-- Modal2 -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select Currency</h5>
      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
          <span id='clickclose' aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="notranslate modal-body">
          <div class='container'>
              <div class='row'>
                 <div data-val='AED' onclick='selectl2(this)' class='col-sm'>
        
        <button class='form-control'>AED</button>
        </div>
        
       
      
        </div>
        </div>
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>







  <label style='display:none;' id='warnmeok' data-toggle="modal" data-target="#exampleModalCenterwarn">Warn</label>         
    
<!-- Modal2 -->
<div class="modal fade" id="exampleModalCenterwarn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div style='background-color:#dc3545;' class="modal-header">
        <h5 style='color:white;' class="modal-title" id="exampleModalLongTitle">Notice</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span id='clickcloseme' aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="notranslate modal-body">
          <div class='container'>
              <div class='row'>
                 
        <p align='center'>Should you require more than 5 rooms at a time. <br/>Please register as a corporate account to avail special discounts and add ons.</p>
        
        
       
       
      
        </div>
        </div>
      </div>
      <div style='max-height:50px;' class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="button" style='max-width:150px;' class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>


















  
<!-- Modal3 -->
<div style='max-width:100%;' class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div style='max-width:1000px;' class="modal-dialog modal-dialog-centered" role="document">
    <div style='max-width:1000px;' class="modal-content">
      <!--<div style='max-width:1000px;' class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--  <span id='clickclose' aria-hidden="true">&times;</span>
        </button>
      </div>-->
      <div style='margin:0 auto;' class="notranslate modal-body">
          
          
          
          
          
          <!--nEW pOPuP-->
          
          
          
          
          
          
          
            <!--nEW eNDS-->
            
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sign Up</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
      
      <button style='border-radius:20px;'><img src='googlelogo.png'>Sign in with Google</button>
      
      
      <input name='email' class='form-control' placeholder='Email'>
      <input name='password' class='form-control' placeholder='Password'>
      
      
      
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
 
</div>
  
  
  <!--end-->
    

          
          
          
          
          
          
          
          
          
      </div>
      
    </div>
  </div>
</div>



    
    
    
    

               
               
               
               
               
               
               
               
               
               
               
               
                  
                 
      <script>
          function selectl($this){
              var value=$this.getAttribute('data-val');
              var selectBox=document.getElementById('selectBox');
              
                if(value=='en')
              {
                document.getElementById('langimg').src='flags/united-kingdom.png';  
                 document.getElementById('clme').click();
              }
              
              if(value=='ar')
              {
                document.getElementById('langimg').src='flags/united-arab-emirates.png';  
                 document.getElementById('clme').click();
              }
              
              if(value=='de')
              {
                document.getElementById('langimg').src='flags/germany.png'; 
                 document.getElementById('clme').click();
              }
              
              if(value=='ru')
              {
                document.getElementById('langimg').src='flags/russia.png';  
                 document.getElementById('clme').click();
              }
              
              if(value=='sv')
              {
                document.getElementById('langimg').src='flags/sweden.png';  
                 document.getElementById('clme').click();
              }
              
              
            changeLanguage(value);
              
              
          }
      </script>           
                 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!--start-->
  
    <div class = "main-holder smry-pg">
 

    
    <main>
	
	
	
        <section class="smry my-5 py-3">
            <div class="">
                
                
                
  
                 <link rel="stylesheet" 
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .input-iconszz i {
            position: absolute;
            
        }
          
        .input-iconszz {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .iconzz {
            padding: 10px;
            margin-top:3px;
         
           
        }
      
      
      
      
      
      
    
    </style>

                     
                      

<datalist id='listedareas'>
    
</datalist>
<datalist id='listedareas2'>
    
</datalist>
                
                <!-- main guest block -->
                <div class = "smry-main-block-1 smry-main-block">
                    
                    
                    <div class = "smry-row row">
                        <div  class = "col-sm-3 px-2">
                            <form autocomplete="off" action='#' method='POST'>
                            <!-- booking total -->
                            <div class = "row">
                                
                                <div class = "col-sm-12 px-0">
                                    <div class = "">
                                        <div style='padding:10px; border-radius:5px; background-color:#b5373e!important;' class = "smry-block-head">
                                            <h6 align='center' style='color:white;' >Modify Search</h6>
                                        </div>
                                        
                                        
                 
        
        <style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: black;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 5px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #dc3545;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
        
        
        
        
        
        
        <input style='display:none;' id='tripptype' name='triptype' value='<?php echo $_SESSION['triptype'];?>'>
        
        
       <br/> 
        
        
        
        
        <div style='text-align:center; margin:0 auto;'>
             One Way
    &nbsp;&nbsp;
<label style='margin:0 auto;' class="switch">
   
   <?php if($_SESSION['triptype']=='round')
   {
   ?>
  <input onchange='changeways(this)' value='round' checked name='' type="checkbox">
  <?php
  
  }
  else
  {
      ?>
  <input onchange='changeways(this)' value='round' name=''  type="checkbox">     
      <?php
      
  }
  ?>
  
  <span class="slider round"></span>
  
</label>
&nbsp;&nbsp;
Round Trip                        
                                        
                                         
           </div>                             
                                        
                                        <div style='margin-top:10px;  border-radius:5px; border:1px grey solid;' class = "p-1">
                                           
                                           <div class='row'>
                                 <div class='col-sm'>             
                                     
                        <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-globe iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Country</i>
                           
                                         <select style='text-align:center; border-radius:5px;' id='country' class='form-select' name='country'>
                                             <option selected >United Arab Emirates</option>
                                             </select>
                                             </div>
                                             </div> 
                                             
                                             
                                             <div class='row'>
                                    
                                             
                              <div class='col-sm'>  
                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-city iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">City</i>
                           
                                         <select style='text-align:center; border-radius:5px;' id='city' class='form-select' name='city'>
                                             <option selected >Select City</option>
                                             </select>               
                                             </div>
                                             
                                           
                                             
                                       <div class='col-sm'>        
                                                           
                                 <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-user iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Pax</i>
                           
                                         <input placeholder='Pax' id='pax' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['pax'];?>' name='pax'>
                                                     
                                </div>               
                                </div>
                                
                               <?php
                               if($_SESSION['triptype']!='round' )
                               {
                               ?> 
                                
                                <div id='onewayselectnew' class='row'>
                                    <div class='col-sm'>
                                       <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Trip</i>
                           
                                     <select style='text-align:center;' id="onewayselect" name='onewayselect' class="form-select">
                                         <?php
                                         if($_SESSION['triptype']=='From Airport to Hotel')
                                         {
                                         ?>
                                        <option selected>From Airport to Hotel</option>
                                        <option>From Hotel to Airport</option>
                                       
                                       <?php
                                       }
                                        else{
                                        ?>
                                        <option >From Airport to Hotel</option>
                                        <option selected>From Hotel to Airport</option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                      </div>
                                </div>
                                <?php
                                
                               }
                               
                               
                               else{
                                   
                                   
                                  ?>
                                  <div  style='display:none; ' id='onewayselectnew' class='row'>
                                    <div class='col-sm'>
                                       <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Trip</i>
                           
                                     <select style='text-align:center;' id="onewayselect" name='onewayselect' class="form-select">
                                       
                                        <option>From Airport to Hotel</option>
                                        <option>From Hotel to Airport</option>
                                       
                                      
                                      </select>
                                      </div>
                                </div>
                                  
                                  
                                  <?php
                                   
                                   
                                   
                                   
                               }
                               ?>
                                
                                
                                
                                
                                
                                
                                  <div class='row'>
                                    
                                     
                                     
                                     
                        <?php             
                                
                                if($_SESSION['triptype']=='round' || $_SESSION['triptype']=='From Airport to Hotel')
                                {
                                
                                
                                ?>             
                              <div  id='arrdate' class='col-sm'>  
                                                             
                                 <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-user iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Arrival Date</i>
                           
                                         <input type='date' value='<?php echo $_SESSION['arrivaldate'];?>' style='text-align:center; border-radius:5px;' class='form-control' name='arrivaldate' id='arrivaldate'>
                                         
                                 </div>   
                                 
                           <?php      
                           
                                }
                                else{
                                    ?>
                                    
                      <div id='arrdate' style='display:none;' class='col-sm'>  
                                                             
                                 <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-user iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Arrival Date</i>
                           
                                         <input type='date' value='<?php echo $_SESSION['arrivaldate'];?>' style='text-align:center; border-radius:5px;' class='form-control' name='arrivaldate' id='arrivaldate'>
                                         
                                 </div>                 
                                    
                                    <?php
                                    
                                    
                                }
                           ?>
                                 
                                 
                                   <?php             
                                
                                if($_SESSION['triptype']=='round' || $_SESSION['triptype']=='From Hotel to Airport')
                                {
                                
                                
                                ?>            
                                 
                                 
                                               <div id='depdate' class='col-sm'>                            
                                 <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-user iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Departure Date</i>
                           
                                         <input type='date' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['departuredate'];?>'  name='departuredate' id='departuredate'>
                                </div>
                                
                                
                                <?php
                                
                                }
                                
                                
                                else{
                                    
                                    ?>
                                     <div id='depdate' style='display:none;' class='col-sm'>                            
                                 <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-user iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Departure Date</i>
                           
                                         <input type='date' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['departuredate'];?>'  name='departuredate' id='departuredate'>
                                </div>
                                    
                                    
                                    <?php
                                    
                                    
                                    
                                }
                                ?>
                                
                                </div>
                                <br/>
                         
                         
                                 
                                        <?php
                                        if($_SESSION['triptype']=='From Airport to Hotel' || $_SESSION['triptype']=='round')
                                        {
                                        ?>
                                              <div id='adetails' class='row'>
                                     <h6 align='center'><label style='color:grey;'>Arrival Details</label></h6>               
                                     
                               
                                             
                              <div class='col-sm'>  
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">From</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['fromlocation1'];?>'  name='fromlocation1' id='fromlocation1' list='listedareas2'>
                                         
                                         </div>
                                         <div class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">To</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['tolocation1'];?>'  name='tolocation1' id='tolocation1' list='listedareas'>
                                         
                                         </div>
                                         </div>
                          
                          <?php
                          
                                        }
                                        else
                                        {
                                        ?>
                                        <div style='display:none;' id='adetails' class='row'>
                                     <h6 align='center'><label style='color:grey;'>Arrival Details</label></h6>               
                                     
                               
                                             
                              <div class='col-sm'>  
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">From</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['fromlocation1'];?>'  name='fromlocation1' id='fromlocation1' list='listedareas2'>
                                         
                                         </div>
                                         <div class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">To</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['tolocation1'];?>'  name='tolocation1' id='tolocation1' list='listedareas'>
                                         
                                         </div>
                                         </div> 
                                        <?php
                                        }
                                        ?>
                          
                          
                          
                          
                          
                                       <?php
                                        if($_SESSION['triptype']=='From Hotel to Airport' || $_SESSION['triptype']=='round')
                                        {
                                        ?> 
                                             
                                             <div id='ddetails' class='row'>
                                    <br/>
                                  <h6 align='center'><label style='color:grey;'>Departure Details</label></h6>               
                                              
                              <div class='col-sm'> 
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">From</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['fromlocation2'];?>'  name='fromlocation2' id='fromlocation2' list='listedareas2'>
                                         
                                      </div>   
                                      
                                             
                              <div class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">To</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['tolocation2'];?>'  name='tolocation2' id='tolocation2' list='listedareas'>
                                         </div>
                                         </div>
                                                 
                                                 
                                                 
                             <br/>
                             <?php
                                        }
                                        else{
                                         ?>
                                         <br/>
                                           <div style='display:none;' id='ddetails' class='row'>
                                    
                                  <h6 align='center'><label style='color:grey;'>Departure Details</label></h6>               
                                              
                              <div class='col-sm'> 
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">From</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['fromlocation2'];?>'  name='fromlocation2' id='fromlocation2' list='listedareas2'>
                                         
                                      </div>   
                                      
                                             
                              <div class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-map-marker-alt iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">To</i>
                           
                                         <input type='text' style='text-align:center; border-radius:5px;' class='form-control' value='<?php echo $_SESSION['tolocation2'];?>'  name='tolocation2' id='tolocation2' list='listedareas'>
                                         </div>
                                         </div>
                                                 
                                                 
                                                 
                             <br/>
                                         
                                         <?php
                                        }
                                        ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                
                                  <div class='row'>
                                   <h6 align='center'><label style='color:grey;'>Vehicle Type</label> </h6>                          
                             
                                 <?php
                    if($_SESSION['triptype']=='From Airport to Hotel' || $_SESSION['triptype']=='round')
                                 {?>
                              <div id='ac' class='col-sm'> 
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Arrival Car</i>
                           
                     <select type='text' style='text-align:center; border-radius:5px;' class='form-select' name='type1' id='type1'>
                        
                         <?php if($_SESSION['type1']=='Economy')
                         {
                         ?>
                         <option selected>
                             Economy
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Economy</option>
                           <?php
                         }
                         ?>
                         
                         
                         
                          <?php if($_SESSION['type1']=='Luxury')
                         {
                         ?>
                         <option selected>
                             Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type1']=='Super Luxury')
                         {
                         ?>
                         <option selected>
                             Super Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Super Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type1']=='Bus')
                         {
                         ?>
                         <option selected>
                             Bus
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Bus</option>
                           <?php
                         }
                         ?>
                         </select>
                                         
                                      </div>   
                                 <?php
                                 }
                                 else
                                 {?>
                                  <div style='display:none;' id='ac' class='col-sm'> 
                                               <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Arrival Car</i>
                           
                     <select type='text' style='text-align:center; border-radius:5px;' class='form-select' name='type1' id='type1'>
                        
                         <?php if($_SESSION['type1']=='Economy')
                         {
                         ?>
                         <option selected>
                             Economy
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Economy</option>
                           <?php
                         }
                         ?>
                         
                         
                         
                          <?php if($_SESSION['type1']=='Luxury')
                         {
                         ?>
                         <option selected>
                             Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type1']=='Super Luxury')
                         {
                         ?>
                         <option selected>
                             Super Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Super Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type1']=='Bus')
                         {
                         ?>
                         <option selected>
                             Bus
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Bus</option>
                           <?php
                         }
                         ?>
                         </select>
                                         
                                      </div>   
                                 
                                 <?php
                                     
                                 }
                                 ?>  
                                 
                                   <?php
                                 if($_SESSION['triptype']=='From Hotel to Airport' || $_SESSION['triptype']=='round'  )
                                 {
                                 ?>
                              <div id='dc' class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Departure Car</i>
                           
                                         <select style='text-align:center; border-radius:5px;' class='form-select' name='type2' id='type2'>
                                          
                                              <?php if($_SESSION['type2']=='Economy')
                         {
                         ?>
                         <option selected>
                             Economy
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Economy</option>
                           <?php
                         }
                         ?>
                         
                         
                         
                          <?php if($_SESSION['type2']=='Luxury')
                         {
                         ?>
                         <option selected>
                             Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type2']=='Super Luxury')
                         {
                         ?>
                         <option selected>
                             Super Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Super Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type2']=='Bus')
                         {
                         ?>
                         <option selected>
                             Bus
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Bus</option>
                           <?php
                         }
                         ?>   
                                             </select>
                                             
                                         
                                
                                                    
                                       
                                         </div>
                                         
                                         <?php
                                 }
                                 else
                                 {?>     
                                       <div style='display:none;' id='dc' class='col-sm'> 
                                              <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-car iconzz"></i>
                           <i style='opacity:50%; color:#dc3545;' class="iconzz2">Departure Car</i>
                           
                                         <select style='text-align:center; border-radius:5px;' class='form-select' name='type2' id='type2'>
                                          
                                              <?php if($_SESSION['type2']=='Economy')
                         {
                         ?>
                         <option selected>
                             Economy
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Economy</option>
                           <?php
                         }
                         ?>
                         
                         
                         
                          <?php if($_SESSION['type2']=='Luxury')
                         {
                         ?>
                         <option selected>
                             Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type2']=='Super Luxury')
                         {
                         ?>
                         <option selected>
                             Super Luxury
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Super Luxury</option>
                           <?php
                         }
                         ?>
                         
                         
                          <?php if($_SESSION['type2']=='Bus')
                         {
                         ?>
                         <option selected>
                             Bus
                         </option>
                         <?php
                         }
                         else{
                           ?>
                           
                           <option>Bus</option>
                           <?php
                         }
                         ?>   
                                             </select>
                                             
                                         
                                
                                                    
                                        
                                         </div>               
                                     <?php
                                     
                                 }
                                 ?>       
                                          <button style='display:none; margin-top:10px; background-color:#b5373e!important; float:right;  ' id='modifybutton' type='submit' name='modify' class="btn btn-primary"><i class="bi bi-search"></i></button>    
                                         </div>
                                          
                                                 
                                                 
                                                 
                                                       
                                         
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                            <!-- end of booking total -->
                            
                            
                            </form>
                            
                            <button style='margin-top:10px; background-color:#b5373e!important; float:right;  ' onclick='pressedme()' class="btn btn-primary"><i class="bi bi-search"></i>&nbsp;Modify</button>    
                        </div>
        
                        <div class = "col-xxl-9 px-2">
               
               
               
        

<style>.content {
 
 
  display: none;
}
#loadMore {
  width: 200px;
 
 
  border-radius: 10px;

 
}



.content {

  animation: blur .7s ease-out ;
 
}

@keyframes blur {
  from {
    text-shadow:0px 0px 10px #fff,
      0px 0px 10px #fff, 
      0px 0px 25px #fff,
      0px 0px 25px #fff,
      0px 0px 25px #fff,
      0px 0px 25px #fff,
      0px 0px 25px #fff,
      0px 0px 25px #fff,
      0px 0px 50px #fff,
      0px 0px 50px #fff,
      0px 0px 50px #7B96B8,
      0px 0px 150px #7B96B8,
      0px 10px 100px #7B96B8,
      0px 10px 100px #7B96B8,
      0px 10px 100px #7B96B8,
      0px 10px 100px #7B96B8,
      0px -10px 100px #7B96B8,
      0px -10px 100px #7B96B8;
  }
}
</style>



<style>
    span{
        font-size:1.8vh;
    }
</style>

<style>
    small{
        font-size:1.5vh;
    }
    p{
       font-size:1.8vh; 
    }
</style>




 <input style='display:none;' id='car1' name='car1'>
                                     
                                     <input style='display:none;' id='car2' name='car2'>









<?php
if($_SESSION['triptype']=='From Airport to Hotel' || $_SESSION['triptype']=='round')
{
?>
<label>Arrival Car Selected: <b id='arrivalcarlabel'></b></label> &nbsp; &nbsp;<?php
}?> 

<?php
if($_SESSION['triptype']=='From Hotel to Airport' || $_SESSION['triptype']=='round')
{
?><label>Departure Car Selected: <b id='departurecarlabel'></b></label>
<?php
}
?>
<br/>
<?php
$cntry=$_SESSION['country'];
$cty=$_SESSION['city'];
$increment=0;
$sqlar="SELECT * FROM vehiclesInventorydatabase WHERE country='$cntry' && city='$cty' ORDER BY id DESC";
 $result=$conn->query($sqlar);
 
while($row=mysqli_fetch_assoc($result)){
    $aval=false;
    
    
   
   $cmpb=  $row['hotel'];
   $brandb=$row['brand'];
   $modelb=$row['model'];
   
   
$sqlar2zpp="SELECT * FROM newvehicleprices WHERE country='$cntry' && city='$cty' && name='$cmpb' && brand='$brandb' && model='$modelb' && approved='approved' && ((area='".$_SESSION['tolocation1']."' || area='".$_SESSION['fromlocation1']."')|| (area='".$_SESSION['tolocation2']."' || area='".$_SESSION['fromlocation2']."'))";
 $result2zpp=$conn->query($sqlar2zpp);
 
while($row2zpp=mysqli_fetch_assoc($result2zpp)){
      $aval=true;
      
}



    
    
    if($aval==true)
    {
?>










             
                  
                <div style='border:1px solid grey; border-radius:10px;' class = "content smry-block-3 smry-block">
                            
                            <div class='row'> 
                             <div class='col-sm-3'>
                                 <h4><?php echo $row['brand'].' '. $row['model'].' ('.$row['year'].')';?></h4>
                                 
                                 <?php
$cmp=$row['hotel'];
$brand=$row['brand'];
$model=$row['model'];
$year=$row['year'];
$sqlar2="SELECT * FROM carsimages WHERE country='$cntry' && city='$cty' && hotel='$cmp' && brand='$brand' && model='$model' && year='$year'";
 $result2=$conn->query($sqlar2);
 
while($row2=mysqli_fetch_assoc($result2)){
    
$img=$row2['image'];
}


?>

<img style='width:100%; border-radius:10px;' src='pco/Car Images/<?php echo $cmp;?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $img;?>'>
                               
                             

                             </div>
                             
                             <div style='padding:10px; border-right:1px solid grey;' class='col-sm-4'>
                                 <br/><br/>
                               <?php
                               if($row['luggages']!='')
                               {
                                   ?>
                                 <i style='color: #dc3545;' class="stylenotneeded fas fa-suitcase"></i> &nbsp; <?php echo $row['luggages'];?> &nbsp;
                                 
                                 <?php
                                 }
                                 ?>
                                   <?php
                               if($row['maximum']!='')
                               {
                                   ?>
                                   <i style='color: #dc3545;'  class="stylenotneeded fas fa-user"></i>&nbsp;4
                                <?php
                               }
                               ?>
                             
                                 <br/><br/>
                                 <?php 
                                 if($row['maximum']!='')
                                 {
                                 ?>
                                 <span class = "me-2"><i style='color: #dc3545;'  class="bi bi-check-circle-fill"></i></span>
                                <span>Maximum <?php echo $row['maximum'];?> Persons Allowed</span>
                               <br/>
                               <?php
                                 }
                               ?>
                                <?php 
                                 if($row['luggages']!='')
                                 {
                                 ?>
                               <span class = "me-2"><i style='color: #dc3545;'  class="bi bi-check-circle-fill"></i></span>
                                <span><?php echo $row['luggages'];?> Luggages Allowed <small>
                                    <?php if($row['small']=='' && $row['large']=='')
                                    {
                                        
                                    }
                                    else{
                                        
                                    ?>
                                    ( 
                                    <?php if($row['large']!='')
                                    {
                                    echo $row['large'].' large';}?>
                                     
                                    
                                    <?php if($row['small']!='')
                                    {
                                    echo $row['small'].' small';}?>
                                    
                                    )
                                    <?php
                                    }
                                    ?>
                                    </small></span>
                               <br/>
                               <?php
                                 }
                                 ?>
                              
                            <?php
                            if($row['seating']!='')
                            {
                            ?> 
                            <span class = "me-2"><i style='color: #dc3545;' class="bi bi-check-circle-fill"></i></span>
                                <span>Seating Capacity: <?php echo $row['seating'];?> Seater</span>
                               <br/>
                               <?php
                            }
                            ?>
                            <br/>
                            
                            Inclusive: <?php echo $row['inclusivefree'];?>
                                 </div>
                                 
                                 <div style='' class='col-sm'>
                                     <br/><br/>
                                     
                                     
                                    
                                     
                              <div class='row'>
                     
                     
         <?php
         $sqlar2z="SELECT * FROM newvehicleprices WHERE country='$cntry' && city='$cty' && name='$cmp' && brand='$brand' && model='$model'";
 $result2z=$conn->query($sqlar2z);
 
while($row2z=mysqli_fetch_assoc($result2z)){
    ?>
                     
                     
                     
                             
                            <?php
                            if($_SESSION['triptype']=='round')
                            {
                            ?>
                              
                                 
                             <?php 
                             if($row2z['area']==$_SESSION['tolocation1'])
                             {
                             ?>    
                                  <div style='text-align:center' class='col-sm'>
                                      <h5>Arrival Rate</h5>
                                <h3 align='center' style='color:#dc3545;' >AED <?php
                                
                                  
                               $banday=$_SESSION['pax'];
                               $allow=$row['maximum'];
                               
                               $need=intval($banday)/intval($allow);
                               
                              if (strpos($need, '.') !=FALSE)
                              {
                              $need=intval($need)+1;
                              }
                              else{
                               $need= intval($need);  
                              }
                              
                              $carprice=intval($row2z['price'])*$need;
                                
                                echo $carprice;
                                
                                
                                
                                ?></h3>
                              </div>
                              <?php
                             }
                             ?>
                               <?php 
                             if($row2z['area']==$_SESSION['tolocation2'])
                             {
                             ?>    
                               <div style='text-align:center' class='col-sm'>
                                     <h5>Departure Rate</h5>
                                <h3 align='center' style='color:#dc3545;' >AED <?php 
                                
                                
                                
                                  
                               $banday=$_SESSION['pax'];
                               $allow=$row['maximum'];
                               
                               $need=intval($banday)/intval($allow);
                               
                              if (strpos($need, '.') !=FALSE)
                              {
                              $need=intval($need)+1;
                              }
                              else{
                               $need= intval($need);  
                              }
                              
                              $carprice2=intval($row2z['price'])*$need;
                                
                                echo $carprice2;
                                
                                
                                ?></h3>
                              </div>
                              
                              <?php
                             }
                             ?>
                             
                                
                                
                                
                                <?php
                            }
                            
                            
                            else{
                                
                              ?>
                              
                              
                              <div class='row'>
                                  
                                  
                                     <?php 
                                      if($_SESSION['triptype']=='From Airport to Hotel')
                            {
                                
                             if($row2z['area']==$_SESSION['tolocation1'])
                             {
                             ?>    
                                  <div style='text-align:center' class='col-sm'>
                                      <h5>Arrival Rate</h5>
                                <h3 align='center' style='color:#dc3545;' >AED <?php 
                                
                                
                               $banday=$_SESSION['pax'];
                               $allow=$row['maximum'];
                               
                               $need=intval($banday)/intval($allow);
                               
                              if (strpos($need, '.') !=FALSE)
                              {
                              $need=intval($need)+1;
                              }
                              else{
                               $need= intval($need);  
                              }
                              
                              $carprice=intval($row2z['price'])*$need;
                                
                                echo $carprice;?></h3>
                                <input style='display:none;' name='carprice' value='<?php echo $carprice;?>'>
                              </div>
                              <?php
                             }
                            }
                             ?>    
                                  
                           
                           
                                       <?php 
                                      if($_SESSION['triptype']=='From Hotel to Airport')
                            {
                                
                            if($row2z['area']==$_SESSION['tolocation2'])
                             {
                             ?>    
                               <div style='text-align:center' class='col-sm'>
                                     <h5>Departure Rate</h5>
                                <h3 align='center' style='color:#dc3545;' >AED <?php 
                                
                                  
                               $banday=$_SESSION['pax'];
                               $allow=$row['maximum'];
                               
                               $need=intval($banday)/intval($allow);
                               
                              if (strpos($need, '.') !=FALSE)
                              {
                              $need=intval($need)+1;
                              }
                              else{
                               $need= intval($need);  
                              }
                              
                              $carprice2=intval($row2z['price'])*$need;
                                
                                echo $carprice2;
                                
                                
                                ?></h3>
                              </div>
                              
                              <?php
                             }
                            }
                             ?>
                                         
                                  
                                  
                              </div>
                              
                              
                              
                              <?php
                                
                                
                                
                                
                            }
                            
                            
                            
                            ?>
                           
                            
                                    
                            <?php
                            
}
                            ?>
                                </div>
                               <h3 align='center'> <i style='color: #dc3545;' class="stylenotneeded fas fa-car"></i><i style='color: #dc3545;' class="stylenotneeded fas fa-car"></i></h3>
                               <h6 align='center'><?php
                               
                               $banday=$_SESSION['pax'];
                               $allow=$row['maximum'];
                               
                               $need3=intval($banday)/intval($allow);
                               
                              if (strpos($need3, '.') !=FALSE)
                              {
                                  $need3=intval($need3)+1;
                               echo intval($need3);
                              }
                              else{
                                  $need3= intval($need3);  
                               echo intval($need3);  
                              }
                               ?> cars Needed for <?php echo $_SESSION['pax'];?> persons</h6>
                               
                                <h6 align='center'>
                                    <button id='<?php echo $row['id'];?>' data-id='<?php echo $row['id'];?>' data-cars-needed='<?php echo $need3;?>' data-price-arrival='<?php echo $carprice;?>' data-car-departure='<?php echo $row['brand'].' '.$row['model'].' '.$row['year'];?>' data-car-arrival='<?php echo $row['brand'].' '.$row['model'].' '.$row['year'];?>' data-price-departure='<?php echo $carprice2;?>' onclick='sendlistvalue(this)' class='changename btn theme_btn btn-secondary active'> Select </button>
                                    </h6>
                                    <button id='pressmepop<?php echo $row['id'];?>' style='display:none;' data-toggle="modal" data-target="#exampleModalCentercar<?php echo $row['id'];?>"> Select </button>
                                 </div>
                                 </div>  
                              
                            </div>
                            
                            
                            
                            
                            
                            
                         

<!-- CAR SELECT-->



<!-- Modal3 -->
<div  class="modal fade" id="exampleModalCentercar<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div style='' class="modal-dialog modal-dialog-centered" role="document">
    <div style='' class="modal-content">
        
        <button style='display:none;' type="button" id='dimissme<?php echo $row['id'];?>' class="close" data-dismiss="modal" aria-label="Close">X</button>
        <h4>Select For:</h4>
        
      
          
          
          
          
          
          
        
<style>
    input[type=radio] {
  display: none;
}
input[type=radio]:not(:checked) + label {
  background-color: white;
  color:black;
}
input[type=radio]:checked + label {
  background-color: #b5373e;
  
}
</style>
<div style='margin:0 auto; position:inline;'>
    <?php
if($_SESSION['triptype']=='From Airport to Hotel' || $_SESSION['triptype']=='round')
{
?>
<input type="radio" data-label='arrival' data-company='<?php echo $row['hotel'];?>' data-brand='<?php echo $row['brand'];?>' data-model='<?php echo $row['model'];?>' data-image='<?php echo $img;?>' data-car='<?php echo $row['brand']." ".$row['model']." ".$row['year'];?>' data-id='<?php echo $row['id'];?>' data-paxcount='<?php echo $_SESSION['pax'];?>' data-carscount='<?php echo $need3;?>' data-pricecounta='<?php echo $carprice;?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment;?>">
<label for="radio_<?php echo $increment;?>" class="btn-lg btn-primary ">Arrival</label>

<?php
}
?>


<?php
if($_SESSION['triptype']=='From Hotel to Airport' || $_SESSION['triptype']=='round')
{
?>
<input type="radio" data-label='departure' data-company='<?php echo $row['hotel'];?>' data-brand='<?php echo $row['brand'];?>' data-model='<?php echo $row['model'];?>' data-image='<?php echo $img;?>' data-id='<?php echo $row['id'];?>' data-car='<?php echo $row['brand']." ".$row['model']." ".$row['year'];?>' data-paxcount='<?php echo $_SESSION['pax'];?>' data-carscount='<?php echo $need3;?>' data-pricecountd='<?php echo $carprice2;?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment+1;?>">
<label for="radio_<?php echo $increment+1;?>" class="btn-lg btn-primary">Departure</label>

<?php
}
?>

<?php
if($_SESSION['triptype']=='round')
{
?>
<input type="radio" data-label='both' data-company='<?php echo $row['hotel'];?>' data-brand='<?php echo $row['brand'];?>' data-model='<?php echo $row['model'];?>' data-image='<?php echo $img;?>' data-car='<?php echo $row['brand']." ".$row['model']." ".$row['year'];?>' data-id='<?php echo $row['id'];?>' data-paxcount='<?php echo $_SESSION['pax'];?>' data-carscount='<?php echo $need3;?>' data-pricecounta='<?php echo $carprice;?>' data-pricecountd='<?php echo $carprice2;?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment+2;?>">


<label for="radio_<?php echo $increment+2;?>" class="btn-lg btn-primary btn-block">Both</label>


<?php
}
?>

<?php $increment= $increment+3;?>
          </div>
          <br/>
          
          
          
          
          
          
          
          
        

</div>  
</div>  
</div>
<!-- CAR SELECT END-->

   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
    <br/>
    
    <?php
}
}
?>
    
    
    
                  
            






<input style="display:none;" name='arrivalcar' id='arrivalcar'>
<input style="display:none;" name='departurecar' id='departurecar'>


<input style="display:none;" name='arrivalcarid' id='arrivalcarid'>
<input style="display:none;" name='departurecarid' id='departurecarid'>




<br/>

   <p align='center'><a href = "#" class='btn btn-secondary theme_btn active text-capitalize' id = "loadMore"> Load More </a></p>


<script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<script>
$(document).ready (function () {
  $(".content").slice(0, 4).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".content:hidden").slice(0, 4).slideDown();
    if ($(".content:hidden").length == 0) {
      $("#loadMore").text("No More").addClass("noContent");
    }
  });
  })
</script>

 



               
               
               
               
               
               
               
               
               
               
               
           <style>
               .swal2-confirm
               {
                   background-color: #b5373e!important;
               }
           </style>    
               
               
               
               
               
               
               
               
                    
                    
                    <br/>
        
           
                  
                  
                        </div> 
                    </div>
                </div>
                <!-- end of main guest block -->
               
               
               
               
               
            </div>
         <!--   <div class = "d-flex align-items-center justify-content-center mt-5">
                <a href = "#" class = "btn theme_btn btn-secondary active">Complete My Booking</a>
            </div>-->
        </section>
    </main>
   
    <?php 
    if($_SESSION['triptype']=='round')
    {
    ?>
    
       <button onclick='navigate()' type='submit' name='submit' style=' max-width:200px; left:0; margin-left:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Continue   </button> 
    <?php
    }
    ?>
    
</div>

<input id='triptypecheck' style='display:none;' value='<?php echo $_SESSION['triptype'];?>'>

<input style='display:none;' id='paxcount'>

<input style='display:none;' id='carscount1'>
<input style='display:none;' id='carscount2'>

<input style='display:none;' id='pricecounta'>
<input style='display:none;' id='pricecountd'>






       
 <script>
 
 
 
 function navigate(){
     
      var ar=document.getElementById('arrivalcar').value;
      var dp=document.getElementById('departurecar').value;
      var tp=document.getElementById('triptypecheck').value;
      var aid=document.getElementById('arrivalcarid').value;
      var did=document.getElementById('departurecarid').value;
      var acarsneeded=document.getElementById('carscount1').value;
      var dcarsneeded=document.getElementById('carscount2').value;
      var pricea=document.getElementById('pricecounta').value;
      var priced=document.getElementById('pricecountd').value;
     
      var car1=document.getElementById('car1').value;
       var car2=document.getElementById('car2').value;
     
     if(tp=='round')
     {
         if(ar=='' || dp=='')
         {
             swal.fire('Please Select Both Cars');
         }
         else{
             
             
                  $.ajax({
              
			  type:'POST',
              url:'submitformtransfer2.php',
              data:{'carida':aid,'carsneededa':acarsneeded,'caridd':did,'carsneededd':dcarsneeded,'pricearrival':pricea,'pricedeparture':priced,'car1':car1,'car2':car2},
			  
              success:function(result){
                  
				location.replace("bookingsummarytransfer.php");
			
				  
                
                 
              }
			  
          }); 
             
             
             
             
         }
     }
     

    
     
 }
 
 
 
 
     function sendlistvalue($this)
     {
         
         var tp=document.getElementById('triptypecheck').value;
         var carid=$this.getAttribute('data-id');
         var carsneeded=$this.getAttribute('data-cars-needed');
         var pricearrival=$this.getAttribute('data-price-arrival');
         var pricedeparture=$this.getAttribute('data-price-departure');
         
        
         
         
         
         
         
         if(tp=='From Hotel to Airport')
         {
              document.getElementById('car2').value=$this.getAttribute('data-car-departure');
             var car2=document.getElementById('car2').value;
             
             
              $.ajax({
              
			  type:'POST',
              url:'submitformtransfer.php',
              data:{'carid':carid,'carsneeded':carsneeded,'pricearrival':pricearrival,'pricedeparture':pricedeparture,'car2':car2},
			  
              success:function(result){
                  
				location.replace("bookingsummarytransfer.php");
			
				  
                
                 
              }
			  
          }); 
         }
          if(tp=='From Airport to Hotel')
         {
             document.getElementById('car1').value=$this.getAttribute('data-car-arrival');
             
             var car1=document.getElementById('car1').value;
             
             
             
               $.ajax({
              
			  type:'POST',
              url:'submitformtransfer.php',
              data:{'carid':carid,'carsneeded':carsneeded,'pricearrival':pricearrival,'pricedeparture':pricedeparture,'car1':car1},
			  
              success:function(result){
                  
				location.replace("bookingsummarytransfer.php");
			
				  
                
                 
              }
			  
          }); 
         }
           if(tp=='round')
         {
            document.getElementById('pressmepop'+carid).click(); 
         }
         //alert($this.getAttribute('data-id'));
     }
     
     
     
     
     
     function selectedcar($this){
         
         var label=$this.getAttribute('data-label');
         var id=$this.getAttribute('data-id');
        
         var carinfo=$this.getAttribute('data-car');
          var company=$this.getAttribute('data-company');
           var model=$this.getAttribute('data-model');
            var brand=$this.getAttribute('data-brand');
             var image=$this.getAttribute('data-image');
         
         var paxcount=$this.getAttribute('data-paxcount');
         var carscount=$this.getAttribute('data-carscount');
         var pricecounta=$this.getAttribute('data-pricecounta');
         var pricecountd=$this.getAttribute('data-pricecountd');
         
         
         
         
         
         if(label=='arrival')
         {
             
             
             
             
             document.getElementById('paxcount').value=paxcount;
         document.getElementById('carscount1').value=carscount;
          document.getElementById('pricecounta').value=pricecounta;
         
             
             
             
             
             document.getElementById('arrivalcar').value=carinfo;
             
             document.getElementById('arrivalcarlabel').innerHTML=carinfo;
             
             document.getElementById('car1').value=carinfo;
             
              document.getElementById('arrivalcarid').value=id;
              
              
              
              
              
              
              
           document.getElementById('dimissme'+id).click();
              
              
              
         
         Swal.fire({
  title: 'Selected Car for Arrival',
  icon: 'info',
  html:
    carinfo+ '<br/><img style="max-width:200px;" src="pco/Car Images/'+company+'/'+brand+'/'+model+'/'+image+'">' ,
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!'
})


              
              
              
              
              
              
              
              
              
              
              
              
              
             
         }
         
         else if(label=='departure')
         {
             
             
             document.getElementById('paxcount').value=paxcount;
         document.getElementById('carscount2').value=carscount;
         document.getElementById('pricecountd').value=pricecountd;
             
             
             
             document.getElementById('departurecar').value=carinfo;
              document.getElementById('departurecarlabel').innerHTML=carinfo;
              document.getElementById('departurecarid').value=id;
              
               document.getElementById('car2').value=carinfo;
              
              
              document.getElementById('dimissme'+id).click();
              
         
         Swal.fire({
  title: 'Selected Car for Departure',
  icon: 'info',
  html:
    carinfo+ '<br/><img style="max-width:200px;" src="pco/Car Images/'+company+'/'+brand+'/'+model+'/'+image+'">' ,
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!'
})


              
              
              
              
         }
         else if(label=='both')
         {
             
             document.getElementById('paxcount').value=paxcount;
         document.getElementById('carscount1').value=carscount;
         
         document.getElementById('carscount2').value=carscount;
         
          document.getElementById('pricecounta').value=pricecounta;
         document.getElementById('pricecountd').value=pricecountd;
         
         
             document.getElementById('arrivalcar').value=carinfo;
              document.getElementById('arrivalcarlabel').innerHTML=carinfo;
              document.getElementById('arrivalcarid').value=id;
             document.getElementById('departurecar').value=carinfo;
              document.getElementById('departurecarlabel').innerHTML=carinfo;
              document.getElementById('departurecarid').value=id;
              
               document.getElementById('car1').value=carinfo;
                document.getElementById('car2').value=carinfo;
              
              
              document.getElementById('dimissme'+id).click();
              
              
              
         
         Swal.fire({
  title: 'Selected Car for Round Trip',
  icon: 'info',
  html:
    carinfo+ '<br/><img style="max-width:200px;" src="pco/Car Images/'+company+'/'+brand+'/'+model+'/'+image+'">' ,
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!'
})


         }
         
         
         
     }
 </script>  
 
 
               
               
               
               
               

<script>



function changeways($this)
{
    
    if($this.value=='round')
    {
        
        
       var gett= document.getElementById('tripptype').value;
       if(gett=='round')
       {
           
           document.getElementById('tripptype').value=document.getElementById('onewayselect').value;
           document.getElementById('onewayselectnew').style.display='block';
           
           var vala=document.getElementById('onewayselect').value;
           
           
          if(vala=='From Airport to Hotel')
           {
               document.getElementById('depdate').style.display='none';
                document.getElementById('arrdate').style.display='block'; 
                
          document.getElementById('dc').style.display='none';
          document.getElementById('ac').style.display='block';  
           document.getElementById('adetails').style.display='block';
          document.getElementById('ddetails').style.display='none';  
           }
           if(vala=='From Hotel to Airport')
           {
               document.getElementById('depdate').style.display='block';
               
                document.getElementById('arrdate').style.display='none'; 
                
                
          document.getElementById('dc').style.display='block';
          document.getElementById('ac').style.display='none';  
           document.getElementById('adetails').style.display='none';
          document.getElementById('ddetails').style.display='block';  
                
                
           }
           
       }
       else{
              document.getElementById('tripptype').value='round';
              document.getElementById('onewayselectnew').style.display='none';
              
            document.getElementById('depdate').style.display='block';
          document.getElementById('arrdate').style.display='block';  
         
          document.getElementById('dc').style.display='block';
          document.getElementById('ac').style.display='block';  
           document.getElementById('adetails').style.display='block';
          document.getElementById('ddetails').style.display='block';  
              
              
              
       }
    }
    
 
    
}






$("#onewayselect").on('change', function() {
    
    
    var va=document.getElementById('onewayselect').value;
    document.getElementById('tripptype').value=va;
    
    if(va=='From Hotel to Airport')
    {
         document.getElementById('depdate').style.display='block';
               
                document.getElementById('arrdate').style.display='none'; 
                
                
        document.getElementById('ddetails').style.display='block';
               
        document.getElementById('adetails').style.display='none'; 
        
        document.getElementById('dc').style.display='block';
               
        document.getElementById('ac').style.display='none'; 
                        
                
                
    }
    if(va=='From Airport to Hotel')
    
    {
        document.getElementById('depdate').style.display='none';
                document.getElementById('arrdate').style.display='block';  
                
                   document.getElementById('ddetails').style.display='none';
               
        document.getElementById('adetails').style.display='block'; 
        
        document.getElementById('dc').style.display='none';
               
        document.getElementById('ac').style.display='block'; 
                
                
                
    }
    
    
    
});
   
</script>


 
  <script>
      
      function pressedme(){
          
        var value  =document.getElementById('tripptype').value;
        
        var country = document.getElementById('country').value;
        
        var city = document.getElementById('city').value;   
        var pax = document.getElementById('pax').value;
        var arrivaldate = document.getElementById('arrivaldate').value;
        var departuredate = document.getElementById('departuredate').value;
        var fromlocation1 = document.getElementById('fromlocation1').value;
        var tolocation1 = document.getElementById('tolocation1').value;
        var fromlocation2 = document.getElementById('fromlocation2').value;
        var tolocation2 = document.getElementById('tolocation2').value;
        var type1  =document.getElementById('type1').value;
        var type2 = document.getElementById('type2').value;
        
       
        
        
          if(value=='round')
          {
              if(country=='' || city=='All' || pax=='' || arrivaldate=='' || departuredate=='' || fromlocation1=='' || tolocation1=='' || fromlocation2=='' || tolocation2=='' || type1=='' || type2=='')
              {
             swal.fire('Please Fill All Information');
              }
              else{
                  document.getElementById('modifybutton').click();
              }
          }
         
        
        
          else if(value=='From Airport to Hotel')
          {
              if(country=='' || city=='All' || pax=='' || arrivaldate=='' || fromlocation1=='' || tolocation1=='' || type1=='')
              {
             swal.fire('Please Fill All Information');
              }
              else{
                  document.getElementById('modifybutton').click();
              }
          }
        
        
        
        
          
          else if(value=='From Hotel to Airport')
          {
              if(country=='' || city=='All' || pax=='' || departuredate=='' || fromlocation2=='' || tolocation2=='' || type2=='')
              {
             swal.fire('Please Fill All Information');
              }
              else{
                  document.getElementById('modifybutton').click();
              }
          }
          
          
          
      }
      
      
  </script>
  
  
  
  



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>

  
  
  
  
  
  
  <!--end-->
  
  
  
  <script>
      
      var country= document.getElementById('country').value;
      
	  $.ajax({
              
			  type:'POST',
              url:'getcityforsearchoftransfer.php',
              data:{'country':country},
			  
              success:function(result){
                  
				
				$("#city").html(result);
			
				  
                
                 
              }
			  
          }); 
          
          </script>
  
  
  
  
  <script>
  
  
  
$("#city").on('change', function() {
    
    
      var country= document.getElementById('country').value;
       var city= document.getElementById('city').value;
          
            $.ajax({
              
			  type:'POST',
              url:'getareasbycityfortransport.php',
              data:{'country':country,'city':city},
			  
              success:function(result){
                  
				
				$("#listedareas").html(result);
			
				  
                
                 
              }
			  
          }); 
      
      
      $.ajax({
              
			  type:'POST',
              url:'getareasbycityfortransport2.php',
              data:{'country':country,'city':city},
			  
              success:function(result){
                  
				
				$("#listedareas2").html(result);
			
				  
                
                 
              }
			  
          }); 
      
    
});
      
      $(document).ready(function() {
          
      var country= "<?php echo $_SESSION['country'];?>";
       var city= "<?php echo $_SESSION['city'];?>";
          
            $.ajax({
              
			  type:'POST',
              url:'getareasbycityfortransport.php',
              data:{'country':country,'city':city},
			  
              success:function(result){
                  
				
				$("#listedareas").html(result);
			
				  
                
                 
              }
			  
          }); 
      
      
      $.ajax({
              
			  type:'POST',
              url:'getareasbycityfortransport2.php',
              data:{'country':country,'city':city},
			  
              success:function(result){
                  
				
				$("#listedareas2").html(result);
			
				  
                
                 
              }
			  
          }); 
      
      });
  </script>
 
  
  
  
  <?php
  include 'footer.php';
  ?>