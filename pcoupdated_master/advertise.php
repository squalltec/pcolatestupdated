<?php

session_start();
include 'db_connection.php';

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/app.css">
  <title>PCO Connect || Advertising With Us</title>
  <style>
    .right_conatct_social_icon{
      background-image: linear-gradient(120deg, #dc3545 0%, black 100%);
}
.contact_us{
    background-color: #f1f1f1;
    padding: 120px 0px;
}

.contact_inner{
    background-color: #fff;
    position: relative;
    box-shadow: 20px 22px 44px #cccc;
    border-radius: 25px;
}
.contact_field{
    padding: 60px 210px 90px 100px;
}
.right_conatct_social_icon{
    height: 100%;
}

.contact_field h3{
   color: #000;
    font-size: 40px;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 10px
}
.contact_field p{
    color: #000;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 1px;
    margin-bottom: 35px;
}
.contact_field .form-control{
    border-radius: 0px;
    border: none;
    border-bottom: 1px solid #ccc;
}
.contact_field .form-control:focus{
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #1325e8;
}
.contact_field .form-control::placeholder{
    font-size: 13px;
    letter-spacing: 1px;
}

.contact_info_sec {
    position: absolute;
    background-color: #2d2d2d;
    right: 1px;
    top: 18%;
    height: 340px;
    width: 340px;
    padding: 40px;
    border-radius: 25px 0 0 25px;
    background-image: linear-gradient(45deg, #dc3545 0%, black 100%);
color: white;
}
.contact_info_sec h4{
    letter-spacing: 1px;
    padding-bottom: 15px;
}

.info_single{
    margin: 30px 0px;
}
.info_single i{
    margin-right: 15px;
}
.info_single span{
    font-size: 14px;
    letter-spacing: 1px;
}

button.contact_form_submit {
  background: linear-gradient(45deg, #dc3545 0%, black 100%);
    border: none;
    color: #fff;
    padding: 10px 15px;
    width: 100%;
    margin-top: 25px;
    border-radius: 35px;
    cursor: pointer;
    font-size: 14px;
    letter-spacing: 2px;
}
button.contact_form_submit:hover{
  background: linear-gradient(90deg, #dc3545 0%, black 100%);
box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .5), -4px -4px 6px 0 rgba(116, 125, 136, .2), inset -4px -4px 6px 0 rgba(255, 255, 255, .5), inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
color: #fff;
}
.socil_item_inner li{
    list-style: none;
}
.socil_item_inner li a{
    color: #fff;
    margin: 0px 15px;
    font-size: 14px;
}
.socil_item_inner{
    padding-bottom: 10px;
}
.bgImageMain{
  background-image: url('./img/eventsInDubai.webp');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: bottom;
}
.cmButton:hover{
  color:#ce3435;
}

  </style>
</head>

<body>
  <div class="position-relative bgImageMain overflow-hidden p-3 p-md-5 m-md-3 mt-0 text-center" style="margin: 0px !important;">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal text-light">Media & Advertising Strategies</h1>
      <p class="lead font-weight-normal text-light">We help bridge the marketing needs of Brands, Airlines, Agencies, Hotels, DMC’s and more to target active travellers on & off PCO channels</p>
      <a class="btn btn-outline-light cmButton" href="#">Contact Us</a>
    </div>
  </div>

    <section class="contact_us mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact_inner">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="contact_form_inner">
                                    <div class="contact_field">
                                        <h3>Join Us</h3>
                                        <div class="row px-0">
                                          <div class="col-md-6 px-0">
                                            <input type="text" class="form-control form-group" placeholder="First Name" />
                                          </div>
                                          <div class="col-md-6 px-0">
                                            <input type="text" class="form-control form-group" placeholder="Last Name" />
                                          </div>
                                        </div>
                                        <div class="row px-0">
                                          <div class="col-md-6 px-0">
                                            <input type="text" class="form-control form-group" placeholder="Job Title" />
                                          </div>
                                          <div class="col-md-6 px-0">
                                            <input type="text" class="form-control form-group" placeholder="Company Name" />
                                          </div>
                                        </div>
                                        
                                        
                                        <input type="text" class="form-control form-group" placeholder="Country/Region" />
                                        <textarea class="form-control form-group" placeholder="Request Details"></textarea>
                                        <button class="contact_form_submit">Send</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="right_conatct_social_icon d-flex align-items-end">
                                   <div class="socil_item_inner d-flex">
                                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_sec">
                            <h4>Contact Info</h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset"></i>
                                <span>+91 8009 054294</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>info@flightmantra.com</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>1000+ Travel partners and 65+ Service city across India, USA, Canada & UAE</span>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
  

  <?php
  include 'footer.php';
  ?>
</body>

</html>