<?php
session_start();

include 'db_connection.php';



if (isset($_POST['submit'])) {

    $_SESSION['checkflow'] = 'yes';




    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['event'] = $_POST['event'];
    $_SESSION['hotel'] = $_POST['hotel'];
    $_SESSION['sdate'] = $_POST['sdate'];
    $_SESSION['edate'] = $_POST['edate'];

    $_SESSION['sendroomnumbers'] = $_POST['rooms'];

    $_SESSION['counter'] = 1;

    $_SESSION['sendcategory'] = $_POST['star'];




    if (isset($_POST['adults'])) {
        $_SESSION['adults'] = $_POST['adults'];
    } else {
        $_SESSION['adults'] = '0';
    }




    if (isset($_POST['children'])) {
        $_SESSION['children'] = $_POST['children'];
    } else {
        $_SESSION['children'] = '0';
    }






    $_SESSION['roomnmb'] = $_POST['rooms'];






    if (isset($_POST['adults1'])) {
        $_SESSION['adults1'] = $_POST['adults1'];
    } else {
        $_SESSION['adults1'] = '0';
    }




    if (isset($_POST['children1'])) {
        $_SESSION['children1'] = $_POST['children1'];
    } else {
        $_SESSION['children1'] = '0';
    }






    if (isset($_POST['adults2'])) {
        $_SESSION['adults2'] = $_POST['adults2'];
    } else {
        $_SESSION['adults2'] = '0';
    }




    if (isset($_POST['children2'])) {
        $_SESSION['children2'] = $_POST['children2'];
    } else {
        $_SESSION['children2'] = '0';
    }







    if (isset($_POST['adults3'])) {
        $_SESSION['adults3'] = $_POST['adults3'];
    } else {
        $_SESSION['adults3'] = '0';
    }




    if (isset($_POST['children3'])) {
        $_SESSION['children3'] = $_POST['children3'];
    } else {
        $_SESSION['children3'] = '0';
    }








    if (isset($_POST['adults4'])) {
        $_SESSION['adults4'] = $_POST['adults4'];
    } else {
        $_SESSION['adults4'] = '0';
    }




    if (isset($_POST['children4'])) {
        $_SESSION['children4'] = $_POST['children4'];
    } else {
        $_SESSION['children4'] = '0';
    }








    if (isset($_POST['adults5'])) {
        $_SESSION['adults5'] = $_POST['adults5'];
    } else {
        $_SESSION['adults5'] = '0';
    }




    if (isset($_POST['children5'])) {
        $_SESSION['children5'] = $_POST['children5'];
    } else {
        $_SESSION['children5'] = '0';
    }












    if (isset($_POST['adults6'])) {
        $_SESSION['adults6'] = $_POST['adults6'];
    } else {
        $_SESSION['adults6'] = '0';
    }




    if (isset($_POST['children6'])) {
        $_SESSION['children6'] = $_POST['children6'];
    } else {
        $_SESSION['children6'] = '0';
    }








    if (isset($_POST['adults7'])) {
        $_SESSION['adults7'] = $_POST['adults7'];
    } else {
        $_SESSION['adults7'] = '0';
    }




    if (isset($_POST['children7'])) {
        $_SESSION['children7'] = $_POST['children7'];
    } else {
        $_SESSION['children7'] = '0';
    }








    if (isset($_POST['adults8'])) {
        $_SESSION['adults8'] = $_POST['adults8'];
    } else {
        $_SESSION['adults8'] = '0';
    }




    if (isset($_POST['children8'])) {
        $_SESSION['children8'] = $_POST['children8'];
    } else {
        $_SESSION['children8'] = '0';
    }










    if (isset($_POST['adults9'])) {
        $_SESSION['adults9'] = $_POST['adults9'];
    } else {
        $_SESSION['adults9'] = '0';
    }




    if (isset($_POST['children9'])) {
        $_SESSION['children9'] = $_POST['children9'];
    } else {
        $_SESSION['children9'] = '0';
    }





    /*

	
	$_SESSION['adult1']=$_POST['adults1'];
	$_SESSION['children1']=$_POST['children1'];
	
	$_SESSION['adult2']=$_POST['adults2'];
	$_SESSION['children2']=$_POST['children2'];
	
	$_SESSION['adult3']=$_POST['adults3'];
	$_SESSION['children3']=$_POST['children3'];
	
	$_SESSION['adult4']=$_POST['adults4'];
	$_SESSION['children4']=$_POST['children4'];
	
	$_SESSION['adult5']=$_POST['adults5'];
	$_SESSION['children5']=$_POST['children5'];
	
	$_SESSION['adult6']=$_POST['adults6'];
	$_SESSION['children6']=$_POST['children6'];
	
	$_SESSION['adult7']=$_POST['adults7'];
	$_SESSION['children7']=$_POST['children7'];
	
	$_SESSION['adult8']=$_POST['adults8'];
	$_SESSION['children8']=$_POST['children8'];
	
	$_SESSION['adult9']=$_POST['adults9'];
	$_SESSION['children9']=$_POST['children9'];
	
	
	*/














    echo "<script>location.replace('hotelsearch.php');</script>";
}






















?>





<!DOCTYPE html>
<html lang="en">

<head>
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











    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript, 
if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
        }
    </style>



    <!--<div style='' class="se-pre-con"> <center><img style='width:150px; margin-top:300px;' src='hotelloader.gif'></center> </div>-->




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>









    <title>PCO Connect</title>
</head>

<body>

    <style>
        .theme_btn_sm {
            position: absolute;
            right: 0 !important;


        }

        .theme_btn_sm:hover {
            color: black !important;

        }
    </style>
    <style>
        *:not(.stylenotneeded) {
            font-family: "Poppins", sans-serif !important;

            font-weight: normal !important;
        }
    </style>

    <style>
        .col-md-1 {
            font-weight: bold !important;
        }

        .col-md-1 label {

            margin-top: 6px;
        }
    </style>

    <!--<button data-toggle="modal" data-target="#exampleModalCenter3"  style='' class='whatsappp2 theme_btn btn btn-outline-primary'>Login</button> -->
    <style>
        .whatsappp2 {


            position: fixed;
            bottom: 10px;
            left: 0;
            z-index: 1;

            margin-left: 20px;
        }
    </style>
    <style>
        .whatsappp {

            position: fixed;
            bottom: 35px;
            right: 0;
            z-index: 1;
            padding-right: 10px;
        }
    </style>

    <a href='https://wa.me/+971506509976'> <img src='img/webp/whatsappicon.webp' style='max-width:80px;' class='whatsappp'></a>



    <div class="main-holder">

        <style>

        </style>

        <div id="changehead" style=' margin-top:-20px; width:100%; background-color:#dc3545; background-image: linear-gradient(45deg, #dc3545 0%, black 100%);'>
            <div style='height:50px;'>













                <script>
                    var chooseLang = function() {
                        $('.selectpicker').selectpicker();
                    };

                    chooseLang();
                </script>




                <style>
                    .VIpgJd-suEOdc {
                        display: none !important;

                    }

                    .goog-logo-link {
                        display: none !important;
                    }

                    .goog-te-gadget {
                        color: transparent !important;
                    }

                    .goog-te-banner-frame.skiptranslate {
                        display: none !important;

                    }

                    body {
                        top: 0px !important;
                    }

                    .goog-te-combo {

                        background-color: white;
                        color: black;

                    }


                    .goog-te-combo option {
                        color: black;
                    }

                    .goog-te-combo select {
                        color: black;
                    }
                </style>








                <script>
                    function changeFunc() {
                        var selectBox = document.getElementById("selectBox");
                        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                        changeLanguage(selectedValue);

                    }
                </script>



                <script>
                    function googleTranslateInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en',
                            includedLanguages: 'en,ar,ru,de,sv',
                            layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT
                        }, 'google_translate');
                    }

                    /**
                     * This will fire the event on target element
                     * @param element
                     * @param event
                     * @returns {boolean}
                     */
                    function fireEvent(element, event) {
                        console.log("in Fire Event");
                        if (document.createEventObject) {
                            // dispatch for IE
                            //console.log("in IE FireEvent");
                            var evt = document.createEventObject();
                            return element.fireEvent('on' + event, evt)
                        } else {
                            // dispatch for firefox + others
                            //console.log("In HTML5 dispatchEvent");
                            var evt = document.createEvent("HTMLEvents");
                            evt.initEvent(event, true, true); // event type,bubbling,cancelable
                            return !element.dispatchEvent(evt);
                        }
                    }

                    /**
                     * This will set the language and fire the event
                     * @param lang
                     * e.g onclick="changeLanguage('bn')"
                     */
                    function changeLanguage(lang) {
                        var jObj = $('.goog-te-combo');
                        var db = jObj.get(0);
                        jObj.val(lang);
                        fireEvent(db, 'change');
                    }
                </script>


                <!--GOOGLE TRANSLATE-->

                <div style="display:none" align="center" id="google_translate_element"></div>

                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                                pageLanguage: '',
                                includedLanguages: 'en,ar,ru,de,sv'
                            },
                            'google_translate_element'
                        );
                    }
                </script>

                <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">

                </script>



                <!--GOOGLE TRANSLATE END-->


                <style>
                    #langimg {
                        filter: drop-shadow(1px 0 0 white) drop-shadow(0 1px 0 white) drop-shadow(-1px 0 0 white) drop-shadow(0 -1px 0 white);
                    }

                    #cur {
                        color: white;
                    }
                </style>


                <img id='langimg' data-toggle="modal" data-target="#exampleModalCenter" style=' max-width:30px; margin-left:20px; margin-top:10px;  float:left; ' src='img/webp/flags/united-kingdom.webp'>




                <h6 id='cur' data-toggle="modal" data-target="#exampleModalCenter2" style=' margin-left:20px; margin-top:16px;  font-size:2vh; float:left; '>AED</h6>


                </p>

                <style>
                    #ach {
                        color: white;

                    }

                    #ach:hover {
                        color: white;

                    }
                </style>


                <h6 style='font-weight:100 !important; color:white; margin-right:20px; margin-top:16px;   float:right; font-size:2vh; '><a id='ach' href="retrieve.php">My Booking </a>| <nonsense data-toggle="modal" data-target="#exampleModalCenterreward">Agent Login </nonsense>|<nonsense data-toggle="modal" data-target="#exampleModalCenter3"> VIP Login</nonsense>
                </h6>

            </div>
        </div>

        <header>



            <nav style='display:block;' class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="container">

                    <script>
                        setInterval(function() {
                            document.getElementsByClassName("daterangepicker")[0].classList.remove('notranslate');
                            document.getElementsByClassName("daterangepicker")[0].classList.add('notranslate');

                        }, 1000);
                    </script>








                    <a class="navbar-brand" href="index.php">
                        <img src="img/webp/logo.webp" />
                    </a>


                    <button style='right:0;' class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                    <div style='position: relative; z-index:2;' class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mx-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>


                            <!--  <li class="nav-item">
                        <a class="nav-link" href="retrieve.php">Retrieve Booking</a>
                    </li>-->







                        </ul>



                        <img id='googleplayy2' style=' width:50%;' src='img/webp/downbtn.webp'>


















                        <!-- <div class = "navbar-contact-info">
                   <a href='tel:+971507142748'> <img src = "img/header-contact-img.png"></a>
                  </div>-->


                    </div>

                    <style>
                        @media screen and (min-width: 1000px) {
                            #googleplayy2 {
                                display: none;
                            }
                        }

                        @media screen and (max-width: 1000px) {
                            #googleplayy {
                                display: none;
                            }

                            #googleplayy2 {
                                display: block;
                            }
                        }
                    </style>

                    <img id='googleplayy' style=' width:20%;' src='img/webp/downbtn.webp'>




                </div>
            </nav>
        </header>














        <style>
            .containerr {
                position: relative;
                text-align: center;
                color: white;

            }

            .bottom-left {
                position: absolute;
                bottom: 8px;
                left: 16px;
            }

            .top-left {
                position: absolute;
                top: 8px;
                left: 16px;
            }

            .top-right {
                position: absolute;
                top: 8px;
                right: 16px;
            }

            .bottom-right {
                position: absolute;
                bottom: 8px;
                right: 16px;
            }

            .centered {
                position: absolute;
                margin-top: 20%;
                margin-left: 10%;
                transform: translate(-10%, -50%);

                color: white;
                text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;

            }






            .typewriter2 h1 {
                overflow: hidden;
                /* Ensures the content is not revealed until the animation */
                /* The typwriter cursor */
                white-space: nowrap;
                /* Keeps the content on a single line */
                /* Gives that scrolling effect as the typing happens */
                /* Adjust as needed */
                animation:
                    typing 3.5s steps(40, end);
                animation-delay: 3s;
                -webkit-animation: cssAnimation 3s forwards;
                animation: cssAnimation 3s forwards;

            }












            .typewriter h1 {
                overflow: hidden;
                /* Ensures the content is not revealed until the animation */
                /* The typwriter cursor */
                white-space: nowrap;
                /* Keeps the content on a single line */
                /* Gives that scrolling effect as the typing happens */
                /* Adjust as needed */
                animation:
                    typing 1s steps(100, end);

            }

            /* The typing effect */
            @keyframes typing {
                from {
                    width: 0
                }

                to {
                    width: 100%
                }

                width:100%;
            }

            @keyframes cssAnimation {
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }

            @-webkit-keyframes cssAnimation {
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }

            /* The typewriter cursor effect */
        </style>





        <style>
            @media screen and (max-width: 1000px) {
                .hideMe {

                    font-size: 3em !important;
                    margin-left: 30px !important;


                }

                .hideMe2 {

                    font-size: 3em !important;

                }
            }
        </style>









        <form autocomplete='off' class='' action='#' method='POST'>



            <section style=' margin-top:-1px; margin-bottom:-560px;' class='notranslate  banner'>

                <div class="container">

                    <div style='z-index:1;' class="inner_content">


                        <div class='form'>




                            <div >
                                <select class="form-select" id='country' name='country' aria-label="Default select example">
                                    <!--<option value="0" disabled selected>Select Country</option>-->

                                    <!--			
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua">Antigua</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijani">Azerbaijani</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Netherlands">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia-Hercegovina">Bosnia-Hercegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British IOT">British IOT</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Rep">Central African Rep</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Faeroe Islands">Faeroe Islands</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern">French Southern</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard">Heard</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Ivory Coast">Ivory Coast</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="MNP">MNP</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="NER">NER</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Neutral Zone">Neutral Zone</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre">Saint Pierre</option>
                                        <option value="Saint Vincent">Saint Vincent</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Scotland">Scotland</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovak Republic">Slovak Republic</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somali Democratic">Somali Democratic</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
                                        <option value="STP">STP</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="TCA">TCA</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Toga">Toga</option>
                                        <option value="Togolese">Togolese</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tongo">Tongo</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>-->
                                    <option selected value="United Arab Emirates">United Arab Emirates</option>

                                    <!--
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Upper Volta">Upper Volta</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="USSR(Former)">USSR(Former)</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City">Vatican City</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="VI, British">VI, British</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, USA">Virgin Islands, USA</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="WLF">WLF</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Yugoslavia">Yugoslavia</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    -->

                                </select>
                            </div>

                            <div>
                                <select class="form-select" id='city' aria-label="Default select example">
                                    <option selected>Select Event City</option>
                                    <?php


                                        $country="United Arab Emirates";
                                                
                                        $sqllas = "SELECT * FROM newevents WHERE country='$country' GROUP BY city";
                                                                                

                                        $result=$conn->query($sqllas);
                                        $data = array();
                                        while($row=mysqli_fetch_assoc($result)){
                                            
                                            echo "<option>".$row['city']."</option><br>";
                                        }


                                        ?>
                                </select>
                            </div>
                            <div>
                                <select id='event' name='event' class="form-select" aria-label="Default select example">
                                    <option selected>Select Event</option>
                                    <?php
                                        $country="United Arab Emirates";

                                        
                                         $sqllas = "SELECT * FROM newevents WHERE country='$country'";
                                         
                                         $result=$conn->query($sqllas);
                                         $data = array();
                                         
                                        while($row=mysqli_fetch_assoc($result)){
                                            
                                             echo "<option>".$row['name']."</option>";
                                        }
                                        
                                    
                                    ?>

                                </select>
                            </div>


                        </div>

                    </div>
                </div>
            </section>


            <div id='hdm1' class="adban adh typewriter centered">
                <h1 class='hideMe2' style='text-shadow: 2px 2px 2px black !important; align:left; font-family:inter,sans-serif; font-size:4em; text-shadow: 2px 2px 2px black !important;'>Life is an event.</h1>

            </div>

            <div id='hdm2' class="adban adh typewriter2 centered">
                <br /> <br /> <br /> <br /> <br /> <br /> <br />
                <h1 id='hideMe' class='hideMe' style='text-shadow: 2px 2px 2px black !important; text-shadow: 2px 2px 2px black !important;margin-left:200px; font-family: inter,sans-serif; font-size:4em;'> Make it Memorable.</h1>
            </div>




            <style>
                .card-img-top {}
            </style>



            <style>
                @media (max-width:1000px) {
                    #vidbanner {
                        margin-bottom: -350px;
                    }

                }

                @media (min-width:1000px) and (max-width:1600px) {
                    #vidbanner {
                        margin-bottom: -60px;
                    }

                }


                @media (min-width:1600px) {
                    .banner {
                        margin-bottom: 180px;
                    }

                }
            </style>




            <style>
                @media (max-width:1000px) {
                    .adban {
                        margin-top: 250px;

                    }

                    .adh {
                        margin-top: 350px;
                        font-size: 0.3em !important;
                    }

                }
                .video-container{
                    width: 100vw;
                    height: 60vh;
                }
                .mainvideoIframe{ 
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 100vw;
                    height: 100vh;
                    transform: translate(-50%, -50%);
                }
                @media (min-aspect-ratio: 16/9) {
                    .video-container iframe {
                        /* height = 100 * (9 / 16) = 56.25 */
                        height: 56.25vw;
                    }
                }
                        
                @media (max-aspect-ratio: 16/9) {
                    .video-container iframe {
                        /* width = 100 / (9 / 16) = 177.777777 */
                        width: 177.78vh;
                    }
                }
            </style>

           

            <section style='display:block;' class="adban banner" id='vidbanner'>
                    <!-- <div class="video-container" style='display:block;'>
                        <iframe class="mainvideoIframe" src="https://www.youtube.com/embed/NyM33bRWKYE&autoplay=1&mute=1&playsinline=1"></iframe>
                    </div> -->
                    <!-- <div style="z-index: -99; width: 100%; height: 100%">
                        <iframe
                            frameborder="0"
                            height="100%"
                            width="100%"
                            src="https://youtube.com/embed/NyM33bRWKYE?showinfo=0&modestbranding=1&autohide=1&controls=0&autoplay=1&mute=1&playsinline=1$loop=1"
                        >
                        </iframe>
                    </div> -->
                <div style="width:100%;height:0px;position:relative;padding-bottom:36.364%;">
                    <iframe src="https://streamable.com/e/3oifki?autoplay=1&nocontrols=1" frameborder="0" width="100%" height="100%" allowfullscreen allow="autoplay" style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden; pointer-events: none;"></iframe>
                </div>

                <!-- <video preload="metadata" style=' pointer-events: none;' loop="true" autoplay loop muted width="100%" height="auto">
                    <source src="https://streamable.com/1q5tdh" type="video/webm">
                    <source src="https://streamable.com/3oifki" type="video/mp4">
                    <source src="https://streamable.com/ueow5o" type="video/ogg">
                </video> -->

            </section>

            <style>
                /* Container holding the image and the text */
                .containerd {
                    position: relative;
                    text-align: center;
                    color: white;
                }


                /* Top left text */
                .top-leftd {
                    position: absolute;
                    top: 40%;
                    left: 5%;
                }
            </style>




            <!--checking Slider-->


            <div id='slid' style='z-index:1; display:none;'>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="adban carousel-inner">
                        <div style='transition: transform 1s ease; max-height:600px;' class="containerd carousel-item active">
                            <img class="d-block w-100" src="img/webp/africa event images/afr3.webp" alt="First slide">
                            <div class='top-leftd'>

                                <h2 align='left'>See Africa in All Her Beautiful </h2>
                                <h2 align='left'>& Unique Expressions</h2>
                                <h4 align='left'>27th - 29th Oct 2022</h4>
                                <h4 align='left'>Dubai, UAE, Burj Park By Emar</h4>
                            </div>
                        </div>
                        <div style='transition: transform 1s ease; max-height:600px;' class="containerd carousel-item">
                            <img class="d-block w-100" src="img/webp/africa event images/afr1.webp" alt="Second slide">
                            <div class='top-leftd'>

                                <h2 align='left'>Live Performances</h2>
                                <h4 align='left'>From Local and International Artists</h4>
                            </div>
                        </div>
                        <div style='max-height:600px;' class="containerd carousel-item">
                            <img class="d-block w-100" src="img/webp/africa event images/afr4.webp" alt="Third slide">
                        </div>
                    </div>

                    <!--
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  
  -->
                </div>


            </div>


            <!-- END -->










            <!--
<div  style='z-index:1; display:none;' class = "featured-block featured-slider owl-carousel owl-theme">
              
              
              
                  <div class = "adban featured-item">
                 
                    <div style='max-height:500px;' class = "containerd featured-item-img mb-2">
                        <img src = "pco/africa event images/afr3.jpg" alt = "" class = "img-fluid">
                        
                        
                        
                         <div class='top-leftd'>
                            
                            <h2 align='left'>See Africa in All Her Beautiful </h2>
                            <h2 align='left'>& Unique Expressions</h2>
                            <h4 align='left'>27th - 29th Oct 2022</h4>
                            <h4 align='left'>Dubai, UAE, Burj Park By Emar</h4>
                        </div>
                        
                        
                        
                    </div>
                    
                   
                </div>
              
                <div class = "adban featured-item">
                 
                    <div style='max-height:550px;' class = "containerd featured-item-img mb-2">
                        <img src = "pco/africa event images/afr1.jpg" alt = "" class = "img-fluid">
                        <div class='top-leftd'>
                            
                            <h2 align='left'>Live Performances</h2>
                            <h4 align='left'>From Local and International Artists</h4>
                        </div>
                        
                        
                        
                    </div>
                    
                   
                </div>
            
         
            
     
            
             <div class = "adban featured-item">
                 
                    <div style='max-height:500px;' class = "containerd featured-item-img mb-2">
                        <img src = "pco/africa event images/afr4.png" alt = "" class = "img-fluid">
                        
                      
                        
                    </div>
                    
                   
                </div>
            
            </div>
      
        -->


            <!-- <section class="adban containerr banner" id='bg-banner' style="max-width:100%; height:auto; display:block; background: url('pcojp.jpg') center/cover no-repeat;" >
        -->
            <section id='bbbane' style='display:none;' class="adban containerr" style="z-index:-10; height:100%; margin-bottom:-10px;">


                <img id='bg-banner' style='display:none; width:100%; height:auto;' src='img/webp/pcojp.webp'>




            </section>



            <!--
      
<div id='hdm1' class="typewriter centered"><h1 class='hideMe2' style='text-shadow: 2px 2px 2px black !important; align:left; font-family: Brush Script MT, Brush Script Std, cursive; font-size:4em; text-shadow: 2px 2px 2px black !important;'>Life is an event.</h1>
         
        </div>
     
         <div id='hdm2' class=" typewriter2 centered">
             <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
         <h1 id='hideMe' class='hideMe' style='text-shadow: 2px 2px 2px black !important; text-shadow: 2px 2px 2px black !important;margin-left:200px; font-family: Brush Script MT, Brush Script Std, cursive; font-size:4em;'> Make it Memorable.</h1></div>
     -->














            <section style='margin-top:50px; margin-bottom:-100px;' class='nomm' >
                <div class='container formContainer' >
                    <div class='roundme row' style="width: 100%;">
                        <style>
                            .lbxx {
                                border-radius: 25px;
                            }

                            .roundme {
                                border-radius: 25px;
                                
                                padding: 20px 20px;
                                z-index: 1;
                                width: 100%;


                                top: 100px;

                                box-shadow: 0px 15px 39px 0px rgba(165, 9, 25, 40%) !important;
                            }

                            @media screen and (max-width: 576) {
                                .formContainer {
                                    margin-left: -12px;
                                }
                            }



                            .roundme2 {
                                border-radius: 25px;

                                padding: 25px 0px;
                                z-index: 10;
                                width: 100%;


                                top: 100px;

                                outline-style: outset;
                                outline-color: rgba(220, 53, 69, 10%);
                            }
                        </style>

                        <style>
                            .nomm:before,
                            .nomm:after {
                                box-sizing: border-box;
                                border-radius: 25px;
                            }

                            .nomm .iinput {
                                position: absolute;
                                opacity: 0;
                            }

                            .radio_wrap {

                                padding: 0 !important;
                                position: relative;
                                overflow: hidden;
                                z-index: 0;
                                --i: -1;
                            }

                            .radio_wrap:before {
                                border-radius: 25px;
                                content: "";
                                position: absolute;
                                /* position: relative; */
                                z-index: -1;
                                width: calc(100% / 3);
                                min-width: 150px;
                                top: 1px;
                                left: calc(var(--i) * (100% / 3));
                                height: 58px;
                                background: #dc3545;
                                transition: .3s ease-in-out;
                            }

                            .nomm .llabel {
                                min-width: calc(100% / 3);
                                position: relative;
                                z-index: 2;
                                float: left;
                                text-align: center;
                                text-shadow: none;
                                padding: 20px;
                                /*border: 1px solid #dfe0e4;*/
                                color: #dc3545;
                                font-size: 14px;
                                height: 58px;
                                position: relative;
                                transition: color .3s ease-in-out;
                            }

                            .nomm input:checked+label {
                                color: white !important;
                            }

                            .activea {
                                color: white !important;
                                
                            }
                        </style>




                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <div onclick='changecol()' class=" radio_wrap" style="background-color:black;">
                            
                            <input type="radio" class='iinput' id="radio1" name="radio1">
                            <label data-id='1' id='l1' onclick='icn(this)' for="radio1" id='lbz' class='llabel lbxx activea' data-i="0"><i id='icn1' style='color:white;' class="stylenotneeded fas fa-hotel"></i>&nbsp;Hotels</label>
                            <input type="radio" onclick='clickedmeee()' class='iinput' id="radio2" name="radio1">
                            <label data-id='2' id='l2' onclick='icn(this)' for="radio2" class='llabel lbxx' data-i="1"><i id='icn2' style='color:#dc3545;' class="stylenotneeded fas fa-car-side"></i>&nbsp;Transport</label>

                            <input type="radio" onclick='clickedmeee2()' class='iinput' id="radio3" name="radio1">
                            <label data-id='3' id='l3' onclick='icn(this)' for="radio3" class='llabel lbxx' data-i="2"><i id='icn3' style='color:#dc3545;' class="stylenotneeded fas fa-car"></i>&nbsp;Rent a Car</label>


                                <!--
  
                                <input type="radio" class='iinput' id="radio4" name="radio1">
                                <label  data-id='4' id='l4' onclick='icn(this)' for="radio4" class='llabel lbxx' data-i="3"><i  id='icn4' style='color:#dc3545;' class="stylenotneeded fas fa-icons"></i>&nbsp;Experiences</label>
                                
                                
                                
                                <input type="radio" class='iinput' id="radio5" name="radio1">
                                <label data-id='5' id='l5' onclick='icn(this)' for="radio5" class='llabel lbxx' data-i="4"><i id='icn5' style='color:#dc3545;' class="stylenotneeded fas fa-utensils"></i>&nbsp;Restaurants</label>
                                
                                
                                <input type="radio" class='iinput' id="radio6" name="radio1">
                                <label data-id='6' id='l6'  onclick='icn(this)' for="radio6" class='llabel lbxx' data-i="5"><i id='icn6' style='color:#dc3545;' class="stylenotneeded fas fa-globe"></i>&nbsp;Other Services</label>
                                -->
                        </div>

                        <script>
                            document.getElementById('l1').click();
                            $('.radio_wrap').attr('style', '--i:0');


                            $('label').click(function() {
                                $('.radio_wrap').attr('style', '--i:' + $(this).data('i'));
                            })


                            function changecol() {
                                document.getElementById('lbz').classList.remove('activea');
                            }
                        </script>








                        <script>
                            function clickedmeee() {
                               
                                document.getElementById('l1').setAttribute('style','color:#dc3545 !important;');
                                
                                window.location.replace('transfer.php');
                            }

                            function clickedmeee2() {
                                window.location.replace('rentacar.php');
                            }
                        </script>


                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


                            }

                            .col-sm {
                                text-align: left !important;
                            }
                        </style>

                        <div style='color:#828282; margin-top:20px; padding:20px;' class='notranslate  input-iconszz roundme2 '>



                            <div class='row'>

                                <div style='text-align:center;' class='col-sm'>
                                    <!--  <label >City</label>-->
                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-city iconzz"></i>
                                    <select style='text-align:center;' id="city2" name='city' class="form-select">
                                      
                                        <?php
                                            $country='United Arab Emirates';
            
                                            $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$country' GROUP BY city";
                                            
                                            
                                            
                                        
                                            $result=$conn->query($sqllas);
                                            $data = array();
                                        
                                        echo "<option selected disabled value='0'>Select City</option><br>";
                                          
                                        while($row=mysqli_fetch_assoc($result)){
                                            
                                                echo "<option>".$row['city']."</option><br>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div style='text-align:center;' class='col-sm'>
                                    <!-- <label >Star Rating</label>-->
                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-star iconzz"></i>
                                    <select style='text-align:center;' id="star" name='star' class="form-select">
                                        <option disabled selected>Hotel Star rating</option>
                                        <option value=''>All</option>

                                        <option>5</option>
                                        <option>4</option>
                                        <option>3</option>
                                        <option>2</option>
                                        <option>1</option>

                                    </select>
                                </div>


                                <div style='text-align:center;' class='col-sm'>
                                    <!--  <label >Hotel</label>-->

                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-luggage-cart iconzz"></i>

                                    <select style='text-align:center;' id="hotels" name='hotel' class="form-select">
                                        <option disabled selected>Hotel Name</option>

                                    </select>
                                </div>





                            </div>

                            <div class='row'>


                                <div style='text-align:center;' class='col-sm'>








                                <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

                                    <!--<label >Check In - Check Out</label>-->
                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-calendar iconzz "></i>
                                    <input onload="dateswaper();" id='datessy' style='text-align:center;' class='form-control' type="text" placeholder='Check In - Check Out' name="datefilter" value="" />






                                    <script>
                                        $(function() {
                                            $('input[name="datefilter"]').daterangepicker({
                                                opens: 'left',
                                                  format: 'DD/MM/YYYY',
                                                    cancelLabel: 'Clear'
                                            }, function(start, end, label) {
                                                //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                            });
                                        });
                                    </script>


                                    <script type="text/javascript">
                                        $(function() {



                                          
                                          
                                          
                                          
                                          
                                          

                                            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {




                                                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));



                                                document.getElementById('sdate').value = picker.startDate.format('DD-MM-YYYY');
                                                document.getElementById('edate').value = picker.endDate.format('DD-MM-YYYY');
                                                // document.getElementById("sdate").value = "2014-02-09";



                                                // alert(picker.startDate.format('DD-MM-YYYY'));
                                                //alert(picker.endDate.format('DD-MM-YYYY'));

                                                $.ajax({

                                                    type: 'POST',
                                                    url: 'calculatedays.php',
                                                    data: {
                                                        'sdt': picker.startDate.format('DD-MM-YYYY'),
                                                        'edt': picker.endDate.format('DD-MM-YYYY')
                                                    },

                                                    success: function(result) {
                                                        // alert(result);
                                                        document.getElementById('nights').value = result;

                                                    }

                                                });








                                            });

                                            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                                                $(this).val('');
                                            });

  



                                        });
                                    </script>


 




                                </div>




                                <style>
                                    .drp-selected {
                                        float: left;

                                    }

                                    .month {
                                        background-color: #dc3545;
                                        color: white;
                                    }

                                    .start-date {
                                        background-color: #dc3545 !important;
                                    }

                                    .end-date {
                                        background-color: #dc3545 !important;
                                    }
                                </style>

                                <div style='display:none; text-align:center;' class='col-sm'>

                                    <label>Check In</label>

                                    <input id="sdate" type='date' name='sdate' class="form-control">
                                </div>

                                <div style='display:none; text-align:center;' class='col-sm'>
                                    <label>Check Out</label>
                                    <input id="edate" type='date' name='edate' class="form-control">
                                </div>






                                <div style='text-align:center;' class='col-sm'>
                                    <!-- <label >Rooms</label>-->
                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fas fa-bed iconzz"></i>
                                    <select id="rooms" style='text-align:center;' name='rooms' class="form-select">
                                        <option disabled selected>Rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>

                                    </select>
                                </div>





                                <div style='text-align:center;' class='col-sm'>
                                    <!-- <label >Nights</label>-->
                                    <i style='opacity:50%; margin-left:40px; padding-top:5px; ' class="stylenotneeded "><p style="margin-left:40px; padding-top:5px; ">Nights</p></i>
                                    <i style='opacity:50%; color:#dc3545;' class="stylenotneeded far fa-calendar-check iconzz "></i>
                                    <input style='text-align:center;' type='number' id="nights" placeholder='Nights' min='1' value='1' name='nights' class="form-select">

                                </div>

                                <script>
                                    $("#datessy").on('click', function() {

                                        document.getElementById('datessy').value = '';
                                        const collection = document.getElementsByClassName("drp-selected");

                                        collection[0].classList.add("btn");
                                        collection[0].classList.add("btn-sm");
                                        collection[0].classList.add("btn-default");

                                    });
                                </script>

                                <style>
                                    #rowa0 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa1 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa2 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa3 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa4 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa5 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa6 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa7 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa8 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa9 {
                                        padding-bottom: 5px;
                                    }

                                    #rowa10 {
                                        padding-bottom: 5px;
                                    }
                                </style>




                            </div>




                            <div class='row'>
                                <style>
                                    .applyBtn {
                                        background-color: #dc3545 !important;
                                    }
                                </style>




                            </div>





                            <div class='row'>




                                <div id='populatemeplease'>


                                    <div class='row' id='rowa0'>


                                        <label style='text-align:right; display:none;' id='dob0'>D.O.B</label>
                                        <div class='col-md-1'>
                                            <label style='color:black; font-weight:bold;'>Room 1:</label>
                                        </div>
                                        <div class='col-sm'>
                                            <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-male iconzz"></i>
                                            <input class='form-control' style='text-align:center;' min='0' max='8' name='adults' placeholder='Adults' type='number'>
                                        </div>
                                        <div class='col-sm'>

                                            <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-child iconzz"></i>
                                            <input class='form-control' style='text-align:center;' min='0' onchange='ages(this)' max='4' data-id='0' name='children' placeholder='Children' type='number'>
                                        </div>

                                    </div>


                                </div>

<script>
  
  $( document ).ready(function() {
      
      var today = new Date();
    
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;


 $('input[name="datefilter"]').val(today+' - '+today);
        
    
});
   
</script>




                                <script>
                                    var seaad = document.getElementById('sdate');
                                    var eeaad = document.getElementById('edate');

                                    var todayy = new Date();

                                    var ddd = String(todayy.getDate()).padStart(2, '0');
                                    var mmm = String(todayy.getMonth() + 1).padStart(2, '0'); //January is 0!
                                    var yyyyy = todayy.getFullYear();

                                    todayy = mmm + '-' + ddd + '-' + yyyyy;
                                    todayynew = ddd + '/' + mmm + '/' + yyyyy;

                                    seaad.value = formatDate(todayy);

                                    var todayy2 = new Date();
                                    todayy2.setDate(todayy2.getDate() + 1);
                                    var ddd2 = String(todayy2.getDate()).padStart(2, '0');
                                    var mmm2 = String(todayy2.getMonth() + 1).padStart(2, '0'); //January is 0!
                                    var yyyyy2 = todayy2.getFullYear();

                                    todayy2 = mmm2 + '-' + ddd2 + '-' + yyyyy2;

                                    todayy2new = ddd2 + '/' + mmm2 + '/' + yyyyy2;


                                    eeaad.value = formatDate(todayy2);


                            //document.getElementById('datessy').value='todayynew + ' - ' + todayy2new';








                                    $("#edate").on('change', function() {

                                        var sd = document.getElementById('sdate').value;

                                        var ed = document.getElementById('edate').value;

                                        $.ajax({

                                            type: 'POST',
                                            url: 'calculatedays.php',
                                            data: {
                                                'sdt': sd,
                                                'edt': ed
                                            },

                                            success: function(result) {
                                                document.getElementById('nights').value = result;

                                            }

                                        });


                                    });


                                    $("#sdate").on('change', function() {

                                        var sd = document.getElementById('sdate').value;

                                        var ed = document.getElementById('edate').value;

                                        $.ajax({

                                            type: 'POST',
                                            url: 'calculatedays.php',
                                            data: {
                                                'sdt': sd,
                                                'edt': ed
                                            },

                                            success: function(result) {
                                                document.getElementById('nights').value = result;

                                            }

                                        });


                                    });




                                    function formatDate(date) {
                                        var d = new Date(date),
                                            month = '' + (d.getMonth() + 1),
                                            day = '' + d.getDate(),
                                            year = d.getFullYear();

                                        if (month.length < 2)
                                            month = '0' + month;
                                        if (day.length < 2)
                                            day = '0' + day;

                                        return [year, month, day].join('-');
                                    }





                                    $("#nights").on('change', function() {




                                        var ng = document.getElementById('nights').value;

                                        var sd = document.getElementById('sdate').value;

                                        if (sd == '') {
                                            var today = new Date();
                                            var dd = String(today.getDate()).padStart(2, '0');
                                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                                            var yyyy = today.getFullYear();

                                            today = mm + '-' + dd + '-' + yyyy;

                                            todaynw = dd + '/' + mm + '/' + yyyy;


                                            sd = today;

                                            var ds = document.getElementById('sdate');
                                            ds.value = formatDate(today);
                                        }

                                        var ed = document.getElementById('edate');

                                        const sdd = new Date(sd);


                                        const date = new Date();
                                        date.setDate(sdd.getDate() + parseInt(ng));
                                        ed.value = formatDate(date);




                                        var ddn = String(sdd.getDate()).padStart(2, '0');
                                        var mmn = String(sdd.getMonth() + 1).padStart(2, '0'); //January is 0!
                                        var yyyyn = sdd.getFullYear();
                                        var sddnw = ddn + '/' + mmn + '/' + yyyyn;

                                        var ddnn = String(date.getDate()).padStart(2, '0');
                                        var mmnn = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                                        var yyyynn = date.getFullYear();
                                        var datenw = ddnn + '/' + mmnn + '/' + yyyynn;

                                        
                                        document.getElementById('datessy').value = sddnw + ' - ' + datenw;






                                    });












                                    function ages($this) {



                                        var rowa = $this.getAttribute('data-id');

                                        var enter = document.getElementById('rowa' + rowa);

                                        var value = $this.value;

                                        const bombs = document.getElementById("rowa" + rowa).querySelectorAll(".bomb");


                                        bombs.forEach(bomb => {
                                            bomb.remove();
                                        });

                                        document.getElementById('dob' + rowa).style.display = 'block';

                                        if (value == '0') {
                                            document.getElementById('dob' + rowa).style.display = 'none';
                                        }


                                        for (let i = 0; i < value; i++) {

                                            document.getElementById('dob' + rowa);


                                            diva = document.createElement('div');
                                            diva.setAttribute('class', 'bomb col-sm');

                                            inp = document.createElement('INPUT');
                                            inp.setAttribute('class', 'form-control');
                                            inp.setAttribute('name', 'childrenage[]');
                                            inp.setAttribute('placeholder', 'Age');
                                            inp.setAttribute('type', 'date');

                                            diva.appendChild(inp);
                                            enter.appendChild(diva);


                                        }






                                        //alert($this.value);





                                    }

                                    $("#rooms").on('change', function() {

                                        var rooms = document.getElementById('rooms');

                                        if (rooms.value > 4) {
                                            document.getElementById('warnmeok').click();
                                        }


                                    });


                                    $("#rooms").on('change', function() {

                                        var roomsselected = document.getElementById('rooms').value;

                                        var populatemeplease = document.getElementById('populatemeplease');
                                        populatemeplease.innerHTML = '';

                                        for (let i = 0; i < roomsselected; i++) {
                                            var aa = i + 1;
                                            if (i == 0) {
                                                var a = '';
                                            } else {
                                                var a = i;
                                            }

                                            var div1 = document.createElement('div');
                                            div1.setAttribute('class', 'row');
                                            div1.setAttribute('id', 'rowa' + i);

                                            var div2 = document.createElement('div');
                                            div2.setAttribute('class', 'col-sm');

                                            var div3 = document.createElement('div');
                                            div3.setAttribute('class', 'col-sm');


                                            var div3u = document.createElement('div');
                                            div3u.setAttribute('class', 'col-md-1');

                                            var lbl = document.createElement('LABEL');
                                            lbl.innerHTML = 'Room ' + aa;

                                            div3u.appendChild(lbl);

                                            var lbl2 = document.createElement('LABEL');
                                            lbl2.innerHTML = 'D.O.B';
                                            lbl2.style.display = 'none';
                                            lbl2.style.textAlign = 'right';
                                            lbl2.setAttribute('id', 'dob' + i);



                                            var inputad = document.createElement('INPUT');
                                            inputad.setAttribute('class', 'form-control');
                                            inputad.setAttribute('name', 'adults' + a);
                                            inputad.setAttribute('placeholder', 'Adults');
                                            inputad.setAttribute('min', '0');
                                            inputad.setAttribute('max', '8');
                                            inputad.setAttribute('type', 'number');


                                            var inputch = document.createElement('INPUT');
                                            inputch.setAttribute('class', 'form-control');
                                            inputch.setAttribute('name', 'children' + a);
                                            inputch.setAttribute('placeholder', 'Children');
                                            inputch.setAttribute('min', '0');
                                            inputch.setAttribute('max', '4');
                                            inputch.setAttribute('onchange', 'ages(this)');
                                            inputch.setAttribute('data-id', i);
                                            inputch.setAttribute('type', 'number');



                                            div1.appendChild(lbl2);
                                            div1.appendChild(div3u);
                                            div2.appendChild(inputad);
                                            div3.appendChild(inputch);

                                            div1.appendChild(div2);
                                            div1.appendChild(div3);
                                            populatemeplease.appendChild(div1);



                                        }

                                    });
                                </script>

                                <style>
                                    .btnba {
                                        background: linear-gradient(45deg, #dc3545 0%, black 100%);

                                    }
                                    .col-sm {
                                        margin-bottom: 15px;
                                    }
                                </style>



                                <div class="col-md-2"></div>
                                <div class="col-12 text-center">

                                   <input id="sch" type="submit" name="submit" style="float:right;" class="btn btnba btn-primary btn-lg border-0 " value="Search Hotel">
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />


            </section>

        </form>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">

        <section class="section-services">
            <div  class="">
                <!--<div class="row justify-content-center text-center">
				<div class="col-md-10 col-lg-8">
					<div style='margin-top:-80px;' class="header-section">
						<h2 class="title">Exclusive <span style='color:#dc3545;'>Service</span></h2>
					
					</div>
				</div>
			</div>-->
                <div class="row">
                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service">
                            <div  class="part-1">

                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-hand-holding-usd"></i></h1>
                                <h3 align='center' class="title">Best Price <br />Guaranteed</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service ">
                            <div class="part-1">

                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fa fa-file"></i></h1>
                                <h3 align='center' class="title">Flexible <br />Cancellation</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service">
                            <div class="part-1">
                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fa fa-headset"></i></h1>
                                <h3 style='' align='center' class="title">24/7&nbsp;Customer <br />Service</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service">
                            <div class="part-1">

                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-user-shield"></i></h1>
                                <h3 align='center' class="title">Secure <br />Payment</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->

                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service">
                            <div class="part-1">

                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fab fa-angellist"></i></h1>
                                <h3 align='center' class="title">Easy <br />Transactions</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->

                    <!-- Start Single Service -->
                    <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
                        <div class="single-service">
                            <div class="part-1">

                                <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-dollar-sign"></i></h1>
                                <h3 align='center' class="title">Price <br />Match</h3>
                            </div>
                            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
                        </div>
                    </div>
                    <!-- / End Single Service -->

                </div>
            </div>
        </section>


        <style>
            .section-services {
                /* padding-top: 110px; */
                /* padding-bottom: 20px; */
                margin:50px 0px 50x 0px;
                font-family: "Poppins", sans-serif;
                background-color: #211f24;
                color: #fff;
            }

            .section-services .header-section {
                margin-bottom: 35px;
            }

            .section-services .header-section .title {
                position: relative;
                margin-bottom: 40px;
                padding-bottom: 25px;
                text-transform: uppercase;
                font-weight: 700;
            }

            .section-services .header-section .title:before {
                content: "";
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 140px;
                height: 1px;
                background-color: #dc3545;
            }

            .section-services .header-section .title:after {
                content: "";
                position: absolute;
                bottom: -1px;
                left: 50%;
                transform: translateX(-50%);
                width: 45px;
                height: 3px;
                background-color: #f70037;
            }

            .section-services .header-section .title span {
                color: #f70037;
            }

            .section-services .header-section .description {
                color: #6f6f71;
            }

            .section-services .single-service {
                margin: 15px 0px;
                padding: 8px;
                background-color: #24252a;
                box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
            }

            .section-services .single-service .part-1 {
                /*padding: 40px 40px 25px;*/
                /*border-bottom: 2px solid #1d1e23;*/
            }

            .section-services .single-service .part-1 i {
                /*	margin-bottom: 25px; */
                font-size: 50px;
                color: #f70037;
            }

            .section-services .single-service .part-1 .title {
                font-size: 17px;
                font-weight: 700;
                letter-spacing: 0.02em;
                /*	line-height: 1.8em; */
            }

            .section-services .single-service .part-2 {
                padding: 30px 40px 40px;
            }

            .section-services .single-service .part-2 .description {
                margin-bottom: 22px;
                color: #6f6f71;
                font-size: 14px;
                line-height: 1.8em;
            }

            .section-services .single-service .part-2 a {
                color: #fff;
                font-size: 14px;
                text-decoration: none;
            }

            .section-services .single-service .part-2 a i {
                margin-right: 10px;
                color: #f70037;
            }
        </style>

















        <!--
    
    <section class="termsbox">
       
            <ul style='height:100%;' class="termsgroup">
                <li  class = "w-100">
                    <img src="img/terms/image1.png" alt="">
                    <p>No Booking Fees</p>
                </li>
                <li>
                    <img src="img/terms/image2.png" alt="">
                    <p>Flexible Cancellation Policies</p>
                </li>
                <li>
                    <img src="img/terms/image3.png" alt="">
                    <p>24 Hour Customer Service</p>
                </li>
                <li>
                    <img src="img/terms/image4.png" alt="">
                    <p>Booking Hotel Direct</p>
                </li>
                <li>
                    <img src="img/terms/image5.png" alt="">
                    <p>Privacy and Policy</p>
                </li>
            </ul>
        
    </section>
    
    -->
        <div id='subme'></div>
        <br /><br />
        <section id='' style='display:none;' class="aboutevent">

            <div class="about_inner">

                <div style='' id='' class="about_inner_bg">


                    <h2><span style='color:#bf1e2e;'>About</span> Us</h2>
                    <p>
                        In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000’s. In those days, no one was using 100% web-based software or “cloud based” as we know it today. PCO Connect not only survived the “dot com” burst of the early 2000s but steadily grew, Today, PCO Connect has serves over 100,000 customers and companies.
                    </p>

                </div>


            </div>

        </section>





        <section id='hideee2' style='display:none;' class="aboutevent">

            <div class="about_inner">

                <div style='' id='ei' class="about_inner_bg">


                    <h2><span style='color:#bf1e2e;'>About</span> Us</h2>
                    <p>
                        In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000’s. In those days, no one was using 100% web-based software or “cloud based” as we know it today. PCO Connect not only survived the “dot com” burst of the early 2000s but steadily grew, Today, PCO Connect has serves over 100,000 customers and companies.
                    </p>

                </div>


            </div>

        </section>



        <section id='bann22' style="display:none; height:750px; max-width:100%; background-image: url('pco/africa event images/bann22.png');" class="eventattraction">
            <div class="container">
                <div class="row">

                    <div class="col-1">
                        <div class="event_title">

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style='display:none;' id='ve' class='owl-item'>
            <br /><br />
            <div class='container'>
                <div class='row'>


                    <div class='col-sm'>
                        <br /><br /><br />
                        <h2 style='color:#dc3545;' id='evetitle'>Event Hightlight</h2>
                        <h6 style='color:#828282;' id='evedes'>Live Perfomances from International & Local Artists</h6>

                    </div>

                    <div class='col-sm'>
                        <img id='eveimg' style='width:600px;' src="img/webp/highlights/highlights1.webp" alt="">
                    </div>



                </div>
            </div>
            <br /><br />
        </section>



        <!--
    <section class="upcoming_event heightlights">
        <div class="container px-0">
            <div class="highlightsGroups eventsides owl-carousel">
                
                
                 <?php


                    $sqllx = "SELECT * FROM newevents";
                    $resulttx = $conn->query($sqllx);



                    if ($resulttx->num_rows > 0) {
                        // output data of each row
                        while ($rowwx = $resulttx->fetch_assoc()) {

                    ?>
                
                <div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img style='max-width:550px !important; !important;' class="img-fluid mb-3" src="pco/eventhighlights/<?php echo $rowwx['name']; ?>/<?php echo $rowwx['highimg']; ?>" alt="Upcoming Event">
                        </div>
                        <div class="col-md-6">
                            <div class="hightlight_content">
                                <h2 class = "mt-4">Upcoming Events</h2>
                                <h6><?php echo $rowwx['name']; ?></h6>
                                <h6><?php echo $rowwx['title']; ?></h6>
                                <p><?php echo $rowwx['descr']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
             <?php
                        }
                    }
                ?>
                
                
                
                
                
            </div>
        </div>
    </section>
    -->
        <!--<section class="previous_event">
        <div class="container px-0">
            <h1>Previous Events</h1>
            <ul class="eventcards preeventslides owl-carousel">
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
                <li class="eventcard">
                    <img src="img/highlights/eventcard.png" alt="">
                    <h4>
                        <a href="">From international & Local Artists</a>
                    </h4>
                    <span>Iris Dubai</span>
                </li>
            </ul>
        </div>
    </section>-->






























        <!-- <section id='eh' style='margin-top:-100px;' class="heightlights">
        <div class="container px-0">
            <div class="highlightsGroups highlightside owl-carousel">
                <div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="hightlight_content">
                                <h2>Our Top Selling Hotels</h2>
                                <!--<h6>Live Perfomances from  International & Local Artists</h6>
                                <p>Badlands is the story about dreams and cruel reality, about opportunities and insurmountable obstacles, about love and broken hearts.</p>-->
        <!--   </div>
                        </div>
                        <div style='position:inline;' class="col-md-6">
                           <img style='height:200px;  float:right; width:auto;' src="photosup/6a.png" alt=""> 
                            <img style='height:200px; margin-right:50px; float:right; width:auto;' src="photosup/6a.png" alt=""> 
                           
                           
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section id='ehu' class="upcoming_event heightlights">
        <div class="container px-0">
            <div class="highlightsGroups eventsides owl-carousel">
                <div>
                    <div class="row align-items-center">
                        <div style='position:inline;' class="col-md-6">
                   <img style='height:200px;  float:right; width:auto;' src="photosup/d1.png" alt=""> 
                            <img style='height:200px; margin-right:50px; float:right; width:auto;' src="photosup/c1.png" alt=""> 
                        </div>
                        <div class="col-md-6">
                            <div class="hightlight_content">
                                <h2 class = "mt-4">Most Booked Chauffeur Driven Cars</h2>-->
        <!--    <h6>Live Perfomances from  International & Local Artists</h6>
                                <p>Badlands is the story about dreams and cruel reality, about opportunities and insurmountable obstacles, about love and broken hearts.</p>-->
        <!--  </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>-->


        <!--   <select style='display:none;' class="navbar-contact-info form-control selectpicker notranslate" id="selectBox" onchange="changeFunc();" data-width="fit">
    <option value="en" data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
     <option value="ar" data-content='<span class="flag-icon flag-icon-ae"></span> عربي '>عربي</option>
    <option value="de" data-content='<span class="flag-icon flag-icon-de"></span> German'>German</option>
    <option value="ru" data-content='<span class="flag-icon flag-icon-ru"></span> Russian'>Russian</option>
      <option value="sv" data-content='<span class="flag-icon flag-icon-se"></span> Swedish'>Swedish</option>
  </select>  
  
  -->

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
                                    <img src='img/webp/flags/united-kingdom.webp' style='max-width:50px;'>
                                    <p>English</p>
                                </div>


                                <div data-val='ar' onclick='selectl(this)' class='col-sm'>
                                    <img src='img/webp/flags/united-arab-emirates.webp' style='max-width:50px;'>
                                    <p>Arabic</p>
                                </div>


                                <div data-val='de' onclick='selectl(this)' class='col-sm'>
                                    <img src='img/webp/flags/germany.webp' style='max-width:50px;'>
                                    <p>German</p>
                                </div>

                                <div data-val='ru' onclick='selectl(this)' class='col-sm'>
                                    <img src='img/webp/flags/russia.webp' style='margin-left:5px; max-width:50px;'>
                                    <p>Russian</p>
                                </div>

                                <div data-val='sv' onclick='selectl(this)' class='col-sm'>
                                    <img src='img/webp/flags/sweden.webp' style='margin-left:5px; max-width:50px;'>
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

                                <p align='center'>Should you require more than 5 rooms at a time. <br />Please register as a corporate account to avail special discounts and add ons.</p>





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








        <!-- Modal Rewards -->
        <div class="modal fade" id="exampleModalCenterreward" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!--<div style='max-width:1000px;' class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--  <span id='clickclose' aria-hidden="true">&times;</span>
        </button>
      </div>-->
                    <div style='margin:0 auto;' class="notranslate modal-body">





                        <div class='container'>
                            <h3 align='center'>Agent Registration</h3>

                            <div class='row'>
                                <div class='col-sm'><label>Company Name</label><input required name='company' id='company' class='form-control' placeholder='Company Name'></div>
                                <div class='col-sm'><label>Designation</label><input required name='designation' id='designation' class='form-control' placeholder='Designation'></div>
                            </div>
                            <div class='row'>
                                <div class='col-sm'><label>First Name</label><input required name='fname' id='fname' class='form-control' placeholder='First Name'></div>
                                <div class='col-sm'><label>Last Name</label><input required name='lname' id='lname' class='form-control' placeholder='Last Name'></div>
                                <div class='col-sm'><label>Phone</label><input required name='phone' id='phone' class='form-control' placeholder='Phone'></div>
                            </div>



                            <div class='row'>
                                <div class='col-sm'><label>Email</label><input required name='email' id='email' type='email' class='form-control' placeholder='Email'></div>

                                <div class='col-sm'><label>Password</label><input required type='password' name='password' id='password' class='form-control' placeholder='Password'></div>
                            </div>

                            <div class='row'>
                                <div class='col-sm'><label>Nationality</label><input required name='nationality' id='nationality' class='form-control' placeholder='Nationality'></div>
                                <div class='col-sm'><label>Date of Birth</label><input required type='date' id='dateofbirth' name='dateofbirth' class='form-control'></div>
                            </div>

                            <div class='row'>

                                <div class='col-sm'><label>Company Logo</label><input id='logo' required type='file' name='logo' class='form-control'></div>
                            </div>


                            <button onclick='registeragent()' style='float:right; color:white;' class='btn btnba btn-theme'>Register</button>
                        </div>




                    </div>

                </div>
            </div>
        </div>




        <style>
            .swal2-confirm {

                background-color: #dc3545 !important;

            }
        </style>






        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




        <script>
            function registeragent() {


                var company = $("#company").val();
                var designation = $("#designation").val();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var phone = $("#phone").val();
                var nationality = $("#nationality").val();
                var dateofbirth = $("#dateofbirth").val();
                var logo = $("#logo");


                if (company == '' || designation == '' || fname == '' || lname == '' || email == '' || password == '' || phone == '' || nationality == '' || dateofbirth == '' || logo == '') {
                    swal.fire('Please Fill All Fields!');
                } else {


                    $.ajax({

                        type: 'POST',
                        url: 'registeragent.php',
                        data: {
                            'company': company,
                            'designation': designation,
                            'fname': fname,
                            'lname': lname,
                            'email': email,
                            'password': password,
                            'phone': phone,
                            'nationality': nationality,
                            'dateofbirth': dateofbirth,
                            'logo': logo
                        },
                        mimeType: 'multipart/form-data',

                        success: function(result) {

                            if (result.includes('eexist')) {

                                swal.fire('Email Already Registered!')
                            }


                            if (result.includes('cexist')) {

                                swal.fire('Company Already Registered!')
                            }


                            if (result.includes('success')) {


                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '<h3>Registered Successfully</h3> <br/><br/> <h5> Please Check Your Email Address for Access!<h5>',
                                    showConfirmButton: true,
                                    timer: 6000
                                })


                            }




                        }

                    });


                }



            }
        </script>















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
            function selectl($this) {
                var value = $this.getAttribute('data-val');
                var selectBox = document.getElementById('selectBox');

                if (value == 'en') {
                    document.getElementById('langimg').src = 'flags/united-kingdom.png';
                    document.getElementById('clme').click();
                }

                if (value == 'ar') {
                    document.getElementById('langimg').src = 'flags/united-arab-emirates.png';
                    document.getElementById('clme').click();
                }

                if (value == 'de') {
                    document.getElementById('langimg').src = 'flags/germany.png';
                    document.getElementById('clme').click();
                }

                if (value == 'ru') {
                    document.getElementById('langimg').src = 'flags/russia.png';
                    document.getElementById('clme').click();
                }

                if (value == 'sv') {
                    document.getElementById('langimg').src = 'flags/sweden.png';
                    document.getElementById('clme').click();
                }


                changeLanguage(value);


            }
        </script>







        <!-- <section id='eh2' class="heightlights">
        <div class="container px-0">
            <div class="highlightsGroups highlightside owl-carousel">
                <div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="hightlight_content">
                                <h2>Top Selling Experiences</h2>-->
        <!--<h6>Live Perfomances from  International & Local Artists</h6>
                                <p>Badlands is the story about dreams and cruel reality, about opportunities and insurmountable obstacles, about love and broken hearts.</p>-->
        <!--  </div>
                        </div>
                        <div style='position:inline;' class="col-md-6">
                            <img style='height:200px;  float:right; width:auto;' src="photosup/7a.png" alt=""> 
                            <img style='height:200px; margin-right:50px; float:right; width:auto;' src="photosup/8a.png" alt="">
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section id='ehu2' class="upcoming_event heightlights">
        <div class="container px-0">
            <div class="highlightsGroups eventsides owl-carousel">
                <div>
                    <div class="row align-items-center">
                        <div style='position:inline;' class="col-md-6">
                             <img style='height:200px;  float:right; width:auto;' src="photosup/nc1.png" alt=""> 
                            <img style='height:200px; margin-right:50px; float:right; width:auto;' src="photosup/lx1.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="hightlight_content">
                                <h2 class = "mt-4">Luxury Car Rental</h2>-->
        <!--    <h6>Live Perfomances from  International & Local Artists</h6>
                                <p>Badlands is the story about dreams and cruel reality, about opportunities and insurmountable obstacles, about love and broken hearts.</p>-->
        <!--  </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    -->



        <!--  
    
     <section id='eh3' class="heightlights">
        <div class="container px-0">
            <div class="highlightsGroups highlightside owl-carousel">
                <div>
                    <div class="row align-items-center">
                        <div  class="col-md-6">
                            <div class="hightlight_content">
                                <h2>Restaurants</h2>-->
        <!--<h6>Live Perfomances from  International & Local Artists</h6>
                                <p>Badlands is the story about dreams and cruel reality, about opportunities and insurmountable obstacles, about love and broken hearts.</p>-->
        <!--   </div>
                        </div>
                        <div style='position:inline;' class="col-md-6">
                            <img style='height:200px;  float:right; width:auto;' src="photosup/1a.png" alt=""> 
                            <img style='height:200px; margin-right:50px; float:right; width:auto;' src="photosup/2a.png" alt="">
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
   
    
    
    -->





















        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">



        <style>
            .subscription.bg-white {
                background: none;
            }

            .bg-white {
                background-color: #fff !important;
            }

            .subscription.bg-white .subscription-wrapper {
                background: #fff;
            }


            @media screen and (max-width: 1000px) {
                .subscription-wrapper {
                    margin-left: -20px;
                }
            }



            .subscription-wrapper {
                border-radius: 0% 5% 10% 3%/10% 20% 0% 17%;
                -webkit-transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
                transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
                padding: 70px 50px;
                z-index: 1;
                width: 100%;
                background: linear-gradient(80deg, #0030cc 0%, #00a4db 100%);

                top: 100px;

            }

            .subscription-wrapper {
                box-shadow: 0px 15px 39px 0px rgba(165, 9, 25, 40%) !important;
            }

            .subscription-content {
                -webkit-transform: skewY(-1deg);
                transform: skewY(-1deg);
            }

            h3,
            .h3 {
                font-size: 30px;
            }

            .flex-fill {
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important;
            }

            .subscription.bg-white .form-control {
                border: 1px solid #ebebeb !important;
            }

            .subscription-wrapper .form-control {
                height: 60px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 45px;
            }

            .subscription-wrapper .form-control:focus {
                background: rgba(255, 255, 255, 0.1);
                outline: 0;
                box-shadow: none;
            }

            .btn:not(:disabled):not(.disabled) {
                cursor: pointer;
            }

            .btn-primary {
                border: 0;
                color: #fff;
            }



            .btn:not(.stylenotneeded) {
                font-size: 16px;
                font-family: "Poppins", sans-serif;
                text-transform: capitalize;
                padding: 18px 45px;
                border-radius: 45px;
                font-weight: 500;
                border: 1px solid;
                position: relative;
                z-index: 1;
                transition: .3s ease-in;
                overflow: hidden;
            }

            .btn-primary:after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 102%;
                height: 100%;
                background: linear-gradient(45deg, #dc3545 0%, black 100%);
                z-index: -1;
                transition: ease 0.3s;
            }
        </style>
        <style>
            @media screen and (max-width: 1000px) {
                .sbca {
                    padding-left: 0;
                    margin: 0;
                }
            }

            @media screen and (min-width: 1000px) {
                .sbca {
                    padding-left: 5%;
                    margin: 0 auto;
                }
            }
            .cardTextLimit{
                min-height: 70px;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 3; /* number of lines to show */
                -webkit-box-orient: vertical;
            }

           
           
        </style>



        <div style='text-align:center;' class="jumbotron">
            <div class='new1z'></div>
            <br />
            <h3 class="xc">Save Time & Money!</h3>
            <q class="lead">Enter your email and sign up to "Hugs" and we'll send the best deals to you</q>
            <hr class="my-4">
            <p>Send me a link to get the FREE PCO Connect App!</p>
            <p class="lead">
      <a class="btn btn-lg " id="subr0" href="#subme" style="color:white !important; background: linear-gradient(45deg, #dc3545 0%, black 100%); font-size:1.4vh;" role="button">Subscribe Now</a>
            </p>
        </div>
        <!--TOP HOTELS SECTION START -->
        <section style='margin-top:60px;'>
            <div class='container'>
              
                <div class="tours-search-block-2 py-5 d-flex flex-column">
                    <div class="tours-search-cards row g-5">

                        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-hotel"></i>&nbsp;Our Top Selling Hotels</h2>

                       

                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card ">
                                <img src="/img/webp/newphotos/h11.webp" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column px-4">
                                    <h5 class="card-title mt-3">
                                        JA Palm Tree Court testing
                                    </h5>
                                    <h6 class="card-sub-title">Experience World-class Service</h6>
                                    <p class="card-text flex-fill cardTextLimit">JA Palm Tree Court features a 732 m private beach and is surrounded by lush gardens, peaceful water features and…</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/h22.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">Grand Millenium</h5>
                                    <h6 class="card-sub-title">Business Bay</h6>
                                    <p class="card-text flex-fill cardTextLimit">Grand Millennium Business Bay provides accommodations with a restaurant, free private parking...</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/h33.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">Grand Hyatt</h5>
                                    <h6 class="card-sub-title">At West Corniche district of Abu Dhabi</h6>
                                    <p class="card-text flex-fill cardTextLimit">Grand Hyatt Abu Dhabi Hotel and Residences Emirates Pearl offers luxurious...</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>



                </div>

            </div>
        </section>
        <!--TOP HOTELS SECTION END -->

        <!--TOP CARS SECTION START -->
        <section style='margin-top:-60px;'>

            <div class='container'>
            <div class="tours-search-block-2 py-5 d-flex flex-column">
                    <div class="tours-search-cards row g-5">

                    <h2 align='right'>Most Booked Chaffeur Driven Cars <i style='color:#dc3545;' class="stylenotneeded fas fa-car-side"></i></h2>

                       

                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card ">
                                <img src="/img/webp/newphotos/ctest11.webp" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column px-4">
                                    <p class="card-text flex-fill cardTextLimit">With the right Chauffeur service, even the most difficult of journeys can be conquered. We ensure that your journey is safe and comfortable. All drivers are qualified and offer an efficient service that exceeds client expectations at affordable rates…</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/c22.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    
                                    <p class="card-text flex-fill cardTextLimit">With the right Chauffeur service, even the most difficult of journeys can be conquered. We ensure that your journey is safe and comfortable. All drivers are qualified and offer an efficient service that exceeds client expectations at affordable rates....</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/c33.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <p class="card-text flex-fill cardTextLimit">With the right Chauffeur service, even the most difficult of journeys can be conquered. We ensure that your journey is safe and comfortable. All drivers are qualified and offer an efficient service that exceeds client expectations at affordable rates...</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>



                </div>

            </div>
        </section>
        <!--TOP CARS SECTION END -->

        <!--TOP SELLING EXPERIANCE SECTION START -->
        <section style='margin-top:-60px;'>
            <div class='container'>
                <div class="tours-search-block-2 py-5 d-flex flex-column">
                    <div class="tours-search-cards row g-5">
                        <h2 align='left'><i style='color:#dc3545;' class="stylenotneeded fas fa-icons"></i>&nbsp;Top Selling Experiences</h2>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card ">
                                <img src="/img/webp/newphotos/e22.webp" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column px-4">
                                    <h5 class="card-title mt-3">
                                        Future Meuseum
                                    </h5>
                                    <p class="card-text flex-fill cardTextLimit">The Museum of the Future welcomes people of all ages to see, touch, and shape our shared future…</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/h22.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">Ferrari World</h5>
                                    <p class="card-text flex-fill cardTextLimit">Ferrari World Abu Dhabi is the world’s first Ferrari-branded theme park and the largest attraction of its kind...</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/e33.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">Aquaventure</h5>
                                   
                                    <p class="card-text flex-fill cardTextLimit">Largest Waterpark - the spot to be at! What better way to cool down this summer than at the…</p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--TOP SELLING EXPERIANCE SECTION END -->


        <!--Luxury Car Rental SECTION START -->
        <section style='margin-top:-60px;'>

            <div class='container'>




                <div class="tours-search-block-2 py-5 d-flex flex-column">


                    <div class="tours-search-cards row g-5">

                        <h2 align='right'>Luxury Car Rental&nbsp;<i style='color:#dc3545;' class="stylenotneeded fas fa-car"></i></h2>




                        <div class="col-md-6 col-lg-4">




                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/ferrari1.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-3">Ferrari Portofino Spyder</h5>


                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/merce1.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-3">Mercedes GLC63S</h5>


                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>




                        </div>





                        <div class="col-md-6 col-lg-4">


                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/lamb1.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-3">Lamborghini Huracan</h5>


                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>





                        </div>












                    </div>



                </div>

            </div>
        </section>
        <!--Luxury Car Rental SECTION END -->

        <!--Restaurants SECTION START-->
        <section style='margin-top:-60px;'>
            <div class='container'>
                <div class="tours-search-block-2 py-5 d-flex flex-column">
                    <div class="tours-search-cards row g-5">
                        <h2 align='left'><i style='color:#dc3545;' class="stylenotneeded fas fa-utensils"></i>&nbsp;Restaurants</h2>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card ">
                                <img src="/img/webp/newphotos/r11.webp" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column px-4">
                                    <h5 class="card-title mt-3">
                                        Masti Restaurant
                                    </h5>
                                    <h6 class="card-sub-title">
                                        INDIAN INSPIRED GLOBAL CUISINE
                                    </h6>
                                    <p class="card-text flex-fill cardTextLimit">
                                    Multi award winning Masti, which translates to ‘fun and mischief’ infuses modern with tradition and colour with flavour, creating an…
                                    </p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="/img/webp/newphotos/r22.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">
                                        MODERN GASTROPUB
                                    </h5>
                                    <h6 class="card-sub-title">
                                    MODERN GASTROPUB
                                    </h6>
                                    <p class="card-text flex-fill cardTextLimit">
                                    Soak up the relaxed atmosphere of this friendly neighbourhood gastro pub with an outdoor terrace. Take in the unique design…
                                    </p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tours-card card">
                                <img src="img/webp/newphotos/abcnew.webp" class="card-img-top" alt="...">
                                <div class="card-body px-4 d-flex flex-column">
                                    <h5 class="card-title mt-3">
                                        The Pods Restaurant
                                    </h5>
                                    <h6 class="card-sub-title">
                                        A UNIQUE DINING EXPERIENCE
                                    </h6>
                                    <p class="card-text flex-fill cardTextLimit">
                                    Discover delicious Pan Asian cuisine and cocktails with a flair for the dramatic. Located in the heart of Bluewater’s Island, in close proximity to Ain Dubai...
                                    </p>

                                    <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                                        <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--Restaurants SECTION START-->






        <section>

            <br />

            <style>
                .new1z {
                    border-top: 3px solid #dc3545;
                    max-width: 100px;
                    margin: 0 auto;
                }
            </style>









            <section style='' class="subscription bg-white">
                <div style='width:90%;' class="sbca">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-wrapper">
                                <div class="d-flex subscription-content justify-content-between align-items-center flex-column flex-md-row text-center text-md-left">

                                    <h3 align='left' class="flex-fill">Subscribe to "Hugs" <p style='font-size:2vh;'>Prices Drop, the moment you sign up!</p>
                                    </h3>

                                    <form action="#" class="row flex-fill">
                                        <div class="col-lg-7 my-md-2 my-2">
                                            <input type="email" class="form-control px-4 border-0 w-100 text-center text-md-left" id="email" placeholder="Your Email" name="email">
                                        </div>
                                        <div class="col-lg-5 my-md-2 my-2">
                                            <button id="subr" style="background: linear-gradient(45deg, #dc3545 0%, black 100%);" type="submit" class="btn btn-lg border-0 w-100">Subscribe Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <br />


        </section>







        <?php
        include 'footer.php';
        ?>



    </div>


    <!-- SCRIPTS REMOVED FROM HERE -->

  <script>
  
  function icn($this)
  {
       var di= $this.getAttribute('data-id');
       
       
       for (let i = 1; i < 7; i++) {
            var change=document.getElementById('icn'+i);
         
          
           if(i==di)
           {
                if(screen.width>1000)
                    {
               change.style.color='white';
                    }
                 else{
                        change.style.color='black'; 
                        
                      
                    }
               
               
           }
                 
               
                 
                   
                    
       
           
           else{
       change.style.color='#dc3545';
           }
       }
  
 
  
  }
 
      
  </script>
  
  
    
    <script>
    
    
    
    $("[type='number']").keypress(function (evt) {
    //evt.preventDefault();
});






/*

$("#rooms").on('change', function() {

	var compzy1=$("#rooms").val();
	


	
for(i=1; i<10; i++){
    
	document.getElementById("adults"+i).value="";
	document.getElementById("la"+i).style.display = "none";
	document.getElementById("adults"+i).style.display = "none";
	document.getElementById("lc"+i).style.display = "none";
	document.getElementById("children"+i).style.display = "none";
	document.getElementById("children"+i).value="";
	
	
	
}
		
	
	
	
	for(i=1; i<compzy1; i++){
	    
	  
		
	document.getElementById("la"+i).style.display = "block";
		
	document.getElementById("adults"+i).style.display = "block";
	
	document.getElementById("lc"+i).style.display = "block";
	
	document.getElementById("children"+i).style.display = "block";
	
	
		  
	}
});	
	
    
*/







    
    	 var rooms=document.getElementById("rooms");
    	 rooms.innerHTML='';
	   rooms.innerHTML= rooms.innerHTML+'<option disabled selected>Rooms</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>';
    
    	var st=document.getElementById("star"); 
	st.innerHTML='<option selected disabled>Hotel Star Rating</option><option value="All">All</option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>';
	
		var ht=document.getElementById("hotels"); 
		ht.innerHTML='<option selected disabled>Hotel Name</option>';
	
    
    
	//var country=$("#country").val();
	
	/*
	  $.ajax({
              
			  type:'POST',
              url:'getcities2.php',
              data:{'country':country},
			  
              success:function(result){
                  
				
				$("#city").html(result);
			
				  
                
                 
              }
			  
          }); 
          
          
          
          
          	  $.ajax({
              
			  type:'POST',
              url:'getcities.php',
              data:{'country':country},
			  
              success:function(result){
                  
				
				
				$("#city2").html(result);
				  
                
                 
              }
			  
          }); 
		  
		  
*/



        

$("#country").on('change', function() {
    
    	 var rooms=document.getElementById("rooms");
    	 rooms.innerHTML='';
	   rooms.innerHTML= rooms.innerHTML+'<option disabled selected>Rooms</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>';
    
    	var st=document.getElementById("star"); 
	st.innerHTML='<option selected disabled>Hotel Star Rating</option><option value="All">All</option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>';
	
		var ht=document.getElementById("hotels"); 
		ht.innerHTML='<option selected disabled>Hotel Name</option>';
	
    
    
	var country=$("#country").val();
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getcities2.php',
              data:{'country':country},
			  
              success:function(result){
                  
				
				$("#city").html(result);
			
				  
                
                 
              }
			  
          }); 
          
          
          
          
          	  $.ajax({
              
			  type:'POST',
              url:'getcities.php',
              data:{'country':country},
			  
              success:function(result){
                  
				
				
				$("#city2").html(result);
				  
                
                 
              }
			  
          }); 
		  
		  
		
	
})










$("#city").on('change', function() {
    var country=$("#country").val();
    var city=$("#city").val();
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getevents.php',
              data:{'city':city,'country':country},
			  
              success:function(result){
                  
				
				$("#event").html(result);
				  
                
                 
              }
			  
          }); 
		  
		  
		
	
})










$("#hotels").on('change', function() {
    var country=$("#country").val();
    var city=$("#city2").val();
    var hotel=$("#hotels").val();
	
	 var rooms=document.getElementById("rooms");
	 rooms.innerHTML='';
	 
	  $.ajax({
              
			  type:'POST',
              url:'getroomnumbers.php',
              data:{'city':city,'country':country,'hotel':hotel},
			  
              success:function(result){
                  
				
				if(result>=9){
			    for (let i = 0; i < 9; i++) {
			   
			   var n=i+1;
			   
			   rooms.innerHTML= rooms.innerHTML+'<option>'+n+'</option>'
			    
				}
				
				}
				else{
				    for (let i = 0; i < result; i++) {
			   
			     var n=i+1;
			   
			   rooms.innerHTML= rooms.innerHTML+'<option>'+n+'</option>'
			    
				}  
				}
				  
                
                 
              }
			  
          }); 
		  
		  
		
	
})








$("#city2").on('change', function() {
   var country=$("#country").val();
    var city=$("#city2").val();
    
    
    	 var rooms=document.getElementById("rooms");
    	 rooms.innerHTML='';
	   rooms.innerHTML= rooms.innerHTML+'<option disabled selected>Rooms</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>';
	
	var st=document.getElementById("star"); 
	st.innerHTML='<option selected disabled>Hotel Star Rating</option><option value="All">All</option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>';
	
	  $.ajax({
              
			  type:'POST',
              url:'gethotels.php',
              data:{'city':city,'country':country},
			  
              success:function(result){
                
                 var hotels=document.getElementById("hotels");  
			
			    hotels.innerHTML=result;
				
				  
                
                 
              }
			  
          }); 
		  
    
		
	
})










$("#star").on('change', function() {
   var country=$("#country").val();
    var city=$("#city2").val();
     var star=$("#star").val();
     
     
	
	 
	 if(star=='All')
	 {
	    
    
    	 var rooms=document.getElementById("rooms");
    	 rooms.innerHTML='';
	   rooms.innerHTML= rooms.innerHTML+'<option disabled selected>Rooms</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>';
	

	  $.ajax({
              
			  type:'POST',
              url:'gethotels.php',
              data:{'city':city,'country':country},
			  
              success:function(result){
                
                 var hotels=document.getElementById("hotels");  
			
			    hotels.innerHTML=result;
				
				  
                
                 
              }
			  
          }); 
		  
	 }
	 else{
	     
	     	 var rooms=document.getElementById("rooms");
     	  rooms.innerHTML='';
	   rooms.innerHTML= rooms.innerHTML+'<option disabled selected>Rooms</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>';
	   
	  $.ajax({
              
			  type:'POST',
              url:'gethotels2.php',
              data:{'city':city,'country':country,'star':star},
			  
              success:function(result){
                
                 var hotels=document.getElementById("hotels");  
			
			    hotels.innerHTML=result;
				
				  
                
                 
              }
			  
          }); 
		  
	 }
		
	
})
















$("#event").on('change', function() {
    
    var event=$("#event").val();
    
    

   var evn=document.getElementById("ve");
   
  
   
   
    var ban2=document.getElementById("bg-banner");
    ban2.src="";
    
    if(event=='0')
    {
    
  
        
        
        
        //start
        
        
             
var head= document.getElementById('changehead');
var sch= document.getElementById('sch');

var headinng= document.getElementById('headinng');

var footr= document.getElementById('footr');

var subr= document.getElementById('subr');

var subr0= document.getElementById('subr0');


var avea= document.getElementById('evetitle');

 

var colosa= document.getElementsByClassName('stylenotneeded');

var btna=document.getElementsByClassName('btn-outline-secondary');

var new1z= document.getElementsByClassName('new1z');

var dots= document.getElementsByClassName('owl-dot');



for (var taz = 0; ta < dots.length; taz++) {
   
 dots.item(taz).setAttribute('style', 'border-color:#dc3545 !important; color:#dc3545 !important; background-color:#dc3545 !important;'); 
}



for (var ta = 0; ta < new1z.length; ta++) {
   
 new1z.item(ta).setAttribute('style', 'border-color:#dc3545 !important; color:#dc3545 !important; background-color:#dc3545 !important;'); 
}


var tags= document.getElementById('l1');
/*
var tagsh2= document.getElementsByTagName('h2');


for (var t = 0; t < tagsh2.length; t++) {
   
 tagsh2.item(t).setAttribute('style', 'color:#dc3545 !important;'); 
}
*/


var tagsh2= document.getElementsByClassName('cme');


for (var t = 0; t < tagsh2.length; t++) {
   
 tagsh2.item(t).setAttribute('style', 'color:#dc3545 !important;'); 
}













   
 tags.setAttribute('style', 'background-color:#dc3545 !important; color:white !important;'); 





for (var ia = 0; ia < btna.length; ia++) {
   
 btna.item(ia).setAttribute('style', 'border-color:#dc3545 !important;'); 
}




for (var i = 0; i < colosa.length; i++) {
    
 colosa.item(i).setAttribute('style', 'color:#dc3545;'); 
}




avea.setAttribute('style', 'color:#dc3545;');


  //headinng.setAttribute('style', 'color:#dc3545;');     
  
  
  
  
  
  
  
   footr.setAttribute('style', 'color:white; background-image: linear-gradient(45deg, #dc3545 0%, black 100%);');  
  
  
  
 head.setAttribute('style', 'color:white; margin-top:-20px; width:100%; background-image: linear-gradient(45deg,#dc3545 0%, black 100%);');    
  sch.setAttribute('style', 'color:white; float:right; background-image: linear-gradient(45deg, #dc3545 0%, black 100%);');      
  
  subr.setAttribute('style', 'color:white; background: linear-gradient(45deg, #dc3545 0%, black 100%) !important;');   
  
 subr0.setAttribute('style', 'font-size:1.4vh; color:white; background: linear-gradient(45deg, #dc3545 0%, black 100%) !important;');    
  
  
  
  
  
  
  	

var bnaz= document.getElementsByClassName('theme_btn_sm');


for (var tbnaz = 0; tbnaz < bnaz.length; tbnaz++) {			

			
		bnaz.item(tbnaz).setAttribute('style', 'color:black !important; border-color:#dc3545 !important;'); 	 
		



}	
		
    
    
 var icn1col=document.getElementById('icn1');
  
  icn1col.style.color='white';
 
 
   var icn2col=document.getElementById('icn2');
  
  icn2col.style.color='#dc3545';
  
   var icn3col=document.getElementById('icn3');
  
  icn3col.style.color='#dc3545'; 
    
    
    	
    


    
    
    
    
    //end here
    
        
        
        
        
        
        
        var bm=document.getElementById("bann22");
        
        bm.style.display='none';
        
        	//var hideee=document.getElementById("hideee");
			//	hideee.style.display='block';
				var hideee2=document.getElementById("hideee2");
				hideee2.style.display='none';
				
				
				
        evn.style.display='none';
        
   
        
        
        
        var ban2=document.getElementById("bg-banner");
        
        var vidban2=document.getElementById("vidbanner");
        vidban2.style.display='block';
				ban2.src="";
				
			ban2.style.display='none';
			document.getElementById('bbbane').style.display='none';
			
		
		var slid=document.getElementById("slid");		
				slid.style.display='none';
				
		var sda=document.getElementById("sdate");
		var eda=document.getElementById("edate");
		sda.value='';
		eda.value='';
				
       var hdm1=document.getElementById('hdm1').style.display='block';
    
    var hdm2=document.getElementById('hdm2').style.display='block';  
    
    
    
    
    
    
    
    
    
    
    }
    
    
    
    else
    {
        
        
        
        //var hideee=document.getElementById("hideee");
			//	hideee.style.display='none';
				var hideee2=document.getElementById("hideee2");
				hideee2.style.display='block';
        
        
        
        
    
   
   
   
   
    	var slid=document.getElementById("slid");		
				slid.style.display='none';
    
    var hdm1=document.getElementById('hdm1').style.display='none';
    
    var hdm2=document.getElementById('hdm2').style.display='none';
    
    var vidban2=document.getElementById("vidbanner");
        vidban2.style.display='none';
    
   var ban2=document.getElementById("bg-banner");
        ban2.style.display='none';
        document.getElementById('bbbane').style.display='none';
   
    if(event==='All Africa Festival'){
        	var slidz=document.getElementById("slid");		
				slidz.style.display='block';
    }
    else{
         var ban2=document.getElementById("bg-banner");
        ban2.style.display='block';
        document.getElementById('bbbane').style.display='block';
    
    }
    
    
    
    
    
    
    
    var sdate='';
    var edate='';
    
    
var hg=document.getElementById("ve");

hg.style.display='block';





	if(event.includes('Africa Festival'))
	
	{ 
	    //var ban2=document.getElementById("bg-banner");
			    
		var bann22=document.getElementById("bann22");	
		bann22.style.display='block';	
		
		
				//ban2.style.backgroundImage="url('pco/africa event images/afr3.jpg')";
				
				
				
				
			
				
				
				
				
					var ei=document.getElementById("ei");
			    	ei.innerHTML="<h3 id='headinng' align='center' style='color:#bf1e2e;'>ABOUT "+event+"</h3><br/>Africa has many sides to her story and we want to share these with you. Come and experience a 3 day event starting from 1300 - 2200hrs daily ( 27-29 October'2022 ) at the Burj Park.<br/><br/>An Event not to be missed, showcasing the best of Africa - Live performances from local and international artists, Dance expressions, fashion shows, unique attractions, kiddies are, food and beverage stands. There is something for everyone.<br/><br/><b>Come see Africa in all her splendor.</b>";
			    	
			    	
			    	
			    const evetitle=document.getElementById('evetitle');
				 const evedes=document.getElementById('evedes');
				 const eveimg=document.getElementById('eveimg');
			    	
			    	evetitle.innerHTML='Stalls';
			    	evedes.innerHTML='This will be three (3) days of fun and excitement.Starting from 13:00 - 22:00 daily, this an event not to be missed. Your safety comes first. In line with government and Emaar requirements, strict COVID 19 protocols will be followed.';
			    	eveimg.src='pco/eventbanners/All Africa Festival/africabanner.jpg';
			    	
			    	
			    	
			    	
		
		
		
		
		
		
 $.ajax({
              
			  
	
	
			  type:'POST',
              url:'getbanner.php',
              dataType:'json', /*most important**/ 
              data:{'compy1':event},
			  
              success:function(result){
                  
                  
var head= document.getElementById('changehead');
var sch= document.getElementById('sch');

var headinng= document.getElementById('headinng');

var footr= document.getElementById('footr');

var subr= document.getElementById('subr');

var subr0= document.getElementById('subr0');


var avea= document.getElementById('evetitle');



var colosa= document.getElementsByClassName('stylenotneeded');

var btna=document.getElementsByClassName('btn-outline-secondary');

var new1z= document.getElementsByClassName('new1z');

var dots= document.getElementsByClassName('owl-dot');



for (var taz = 0; ta < dots.length; taz++) {
   
 dots.item(taz).setAttribute('style', 'border-color:'+result.backcolor+' !important; color:'+result.backcolor+' !important; background-color:'+result.backcolor+' !important;'); 
}



for (var ta = 0; ta < new1z.length; ta++) {
   
 new1z.item(ta).setAttribute('style', 'border-color:'+result.backcolor+' !important; color:'+result.backcolor+' !important; background-color:'+result.backcolor+' !important;'); 
}


var tags= document.getElementById('l1');
/*
var tagsh2= document.getElementsByTagName('h2');


for (var t = 0; t < tagsh2.length; t++) {
   
 tagsh2.item(t).setAttribute('style', 'color:'+result.backcolor+' !important;'); 
}
*/


var tagsh2= document.getElementsByClassName('cme');


for (var t = 0; t < tagsh2.length; t++) {
   
 tagsh2.item(t).setAttribute('style', 'color:'+result.backcolor+' !important;'); 
}














   
 tags.setAttribute('style', 'background-color:'+result.backcolor+' !important; color:'+result.color+' !important;'); 





for (var ia = 0; ia < btna.length; ia++) {
   
 btna.item(ia).setAttribute('style', 'border-color:'+result.backcolor+' !important;'); 
}




for (var i = 0; i < colosa.length; i++) {
    
 colosa.item(i).setAttribute('style', 'color:'+result.backcolor+';'); 
}





avea.setAttribute('style', 'color:'+result.backcolor+';');


  headinng.setAttribute('style', 'color:'+result.backcolor+';');     
  
   footr.setAttribute('style', 'color:'+result.color+'; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');  
  
  
  
 head.setAttribute('style', 'color:'+result.color+'; margin-top:-20px; width:100%; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');    
  sch.setAttribute('style', 'color:'+result.color+'; float:right; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');      
  
  subr.setAttribute('style', 'color:'+result.color+'; background: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%) !important;');   
  
  
 subr0.setAttribute('style', 'font-size:1.4vh; color:'+result.color+'; background: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%) !important;');    
  
  
  
  
  
  
  	

var bnaz= document.getElementsByClassName('theme_btn_sm');


for (var tbnaz = 0; tbnaz < bnaz.length; tbnaz++) {			
		
		
		 
if((result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white') && (result.color!='#FFFFFF' ||result.color!='#ffffff' || result.color!='white') )
{
	
bnaz.item(tbnaz).setAttribute('style', 'color:'+result.color+' !important; border-color:black !important;');

}


else if((result.backcolor!='#FFFFFF' ||result.backcolor!='#ffffff' || result.backcolor!='white') && (result.color=='#FFFFFF' ||result.color=='#ffffff' || result.color=='white') )
{
 bnaz.item(tbnaz).setAttribute('style', 'color:black !important; border-color:'+result.backcolor+' !important;');    
}


else if((result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white') && (result.color=='#FFFFFF' ||result.color=='#ffffff' || result.color=='white') )
{
 bnaz.item(tbnaz).setAttribute('style', 'color:black !important; border-color:black !important;');    
}



else{
			
		bnaz.item(tbnaz).setAttribute('style', 'color:'+result.color+' !important; border-color:'+result.backcolor+' !important;'); 	 
		
}



}	
			



 var icn1col=document.getElementById('icn1');
  
  icn1col.style.color=result.color;
  
   var icn2col=document.getElementById('icn2');
  
  icn2col.style.color=result.backcolor;
  
   var icn3col=document.getElementById('icn3');
  
  icn3col.style.color=result.backcolor;
		    
		 lbxx.item(ba).setAttribute('style', 'color:'+result.backcolor+'!important;'); 

    
         
     
	
    
    
  
              }
 });
		
		
		
		
		
		
		
		
			
	    
	}
	
	else{
	    
//var ec=document.getElementById("bg-banner");
//ec.style.display='block';

 // var et=document.getElementById("slider");
//et.style.display='none';

var bc=document.getElementById("bann22");
bc.style.display='none';


	 $.ajax({
              
			  
	
	
			  type:'POST',
              url:'getbanner.php',
              dataType:'json', /*most important**/ 
              data:{'compy1':event},
			  
              success:function(result){
                        
                  
				 const evetitle=document.getElementById('evetitle');
				 const evedes=document.getElementById('evedes');
				 const eveimg=document.getElementById('eveimg');
				evetitle.innerHTML='';
				 
				 
		evetitle.innerHTML=result.title;
		
		evedes.innerHTML=result.descriptionn;
	    eveimg.src = result.highimg;
	
				
			var ee=document.getElementById("bg-banner");
				var ei=document.getElementById("ei");
			    
		//	alert(result.banner);
				ee.src=result.banner;
				//ee.style.backgroundImage="url('flags/germany.png')";
				//ee.style.display='block';
				ei.innerHTML="<h3 id='hea' align='center' style='color:#bf1e2e;'>About "+event+"</h3><br/>"+result.descriptionn;
				
			
			
			
			
			
			
			
			
			
			
	
                  
                
                  
var head= document.getElementById('changehead');
var sch= document.getElementById('sch');

//var headinng= document.getElementById('headinng');

var footr= document.getElementById('footr');

var subr= document.getElementById('subr');

var subr0= document.getElementById('subr0');

var avea= document.getElementById('evetitle');



var colosa= document.getElementsByClassName('stylenotneeded');

var btna=document.getElementsByClassName('btn-outline-secondary');

var new1z= document.getElementsByClassName('new1z');

var dots= document.getElementsByClassName('owl-dot');



for (var taz = 0; ta < dots.length; taz++) {
   
 dots.item(taz).setAttribute('style', 'border-color:'+result.backcolor+' !important; color:'+result.backcolor+' !important; background-color:'+result.backcolor+' !important;'); 
}



for (var ta = 0; ta < new1z.length; ta++) {
   
 new1z.item(ta).setAttribute('style', 'border-color:'+result.backcolor+' !important; color:'+result.backcolor+' !important; background-color:'+result.backcolor+' !important;'); 
}


var tags= document.getElementById('l1');

/*var tagsh2= document.getElementsByTagName('h2');


for (var t = 0; t < tagsh2.length; t++) {
   
 //tagsh2.item(t).setAttribute('style', 'color:'+result.backcolor+' !important;'); 
}*/

   
 tags.setAttribute('style', 'background-color:'+result.backcolor+' !important; color:'+result.color+' !important;'); 





for (var ia = 0; ia < btna.length; ia++) {
   
 btna.item(ia).setAttribute('style', 'border-color:'+result.backcolor+' !important;'); 
}




for (var i = 0; i < colosa.length; i++) {
    
 colosa.item(i).setAttribute('style', 'color:'+result.backcolor+';'); 
}





  //headinng.setAttribute('style', 'color:'+result.backcolor+';');     
  
   footr.setAttribute('style', 'color:'+result.color+'; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');  
  
  
  
 head.setAttribute('style', 'color:'+result.color+'; margin-top:-20px; width:100%; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');    
  sch.setAttribute('style', 'color:'+result.color+'; float:right; background-image: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%);');      
  
  subr.setAttribute('style', 'color:'+result.color+'; background: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%) !important;');   
  
 subr0.setAttribute('style', 'font-size:1.4vh; color:'+result.color+'; background: linear-gradient(45deg,' +result.backcolor+ ' 0%, black 100%) !important;');    



if(result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white')
{
    avea.setAttribute('style', 'color:black;');
}
else{
avea.setAttribute('style', 'color:'+result.backcolor+';');
}

	
	var hea= document.getElementById('hea');
	
	hea.setAttribute('style', 'color:'+result.backcolor+';');     
			

var tagsh2= document.getElementsByClassName('cme');


for (var t = 0; t < tagsh2.length; t++) {
  
if(result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white')
{
     tagsh2.item(t).setAttribute('style', 'color: black!important;'); 
}
else{
    
 tagsh2.item(t).setAttribute('style', 'color:'+result.backcolor+' !important;'); 
}
}

			
			
			

var bnaz= document.getElementsByClassName('theme_btn_sm');


for (var tbnaz = 0; tbnaz < bnaz.length; tbnaz++) {			
		
		
		 
if((result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white') && (result.color!='#FFFFFF' ||result.color!='#ffffff' || result.color!='white') )
{
	
bnaz.item(tbnaz).setAttribute('style', 'color:'+result.color+' !important; border-color:black !important;');

}


else if((result.backcolor!='#FFFFFF' ||result.backcolor!='#ffffff' || result.backcolor!='white') && (result.color=='#FFFFFF' ||result.color=='#ffffff' || result.color=='white') )
{
 bnaz.item(tbnaz).setAttribute('style', 'color:black !important; border-color:'+result.backcolor+' !important;');    
}


else if((result.backcolor=='#FFFFFF' ||result.backcolor=='#ffffff' || result.backcolor=='white') && (result.color=='#FFFFFF' ||result.color=='#ffffff' || result.color=='white') )
{
 bnaz.item(tbnaz).setAttribute('style', 'color:black !important; border-color:black !important;');    
}



else{
			
		bnaz.item(tbnaz).setAttribute('style', 'color:'+result.color+' !important; border-color:'+result.backcolor+' !important;'); 	 
		
}



}



			
        var icn1col=document.getElementById('icn1');
  
  icn1col.style.color=result.color;
  
   var icn2col=document.getElementById('icn2');
  
  icn2col.style.color=result.backcolor;
  
   var icn3col=document.getElementById('icn3');
  
  icn3col.style.color=result.backcolor;
		       
         
         
   


                 
              }
			  
          }); 
	
	
	}
	
	













    $.ajax({
              
			  type:'POST',
              url:'getdates.php',
              data:{'compy1':event},
			  
              success:function(result){
				  
				  
				  
				  
				  if(result.length>0)
				  {
					  
				result = jQuery.parseJSON(result);
				
				
				for(i=0; i<result.length; i++){

					sdate=result[i].sdate;
					edate=result[i].edate;
					
				
					
					

				}
			
			
			$("#sdate").val(sdate);
				$("#edate").val(edate);
				
				
			
		
		
var sdp=new Date(sdate);   
var edp=new Date(edate);   
        
var ddn = String(sdp.getDate()).padStart(2, '0');
var mmn = String(sdp.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyyn = sdp.getFullYear();
var sdpnw = ddn + '/' + mmn + '/' + yyyyn;        
  
var sdpnw2 = mmn + '/' + ddn + '/' + yyyyn;        


  
  
        
var ddnn = String(edp.getDate()).padStart(2, '0');
var mmnn = String(edp.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyynn = edp.getFullYear();

var edpnw = ddnn + '/' + mmnn + '/' + yyyynn;        
  
  var edpnw2 = mmnn + '/' + ddnn + '/' + yyyynn;        
  
    document.getElementById('datessy').value=sdpnw + ' - ' + edpnw;
    
    $('input[name="datefilter"]').val(sdpnw + ' - ' + edpnw);   
          
          		
			
		


    $.ajax({
              
			  type:'POST',
              url:'calculatedays.php',
              data:{'sdt':sdate,'edt':edate},
			  
              success:function(result){
				 document.getElementById('nights').value=result;
				  
              }
              
    });
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
			
				
		//	$('#daterange').data('daterangepicker').setStartDate(sad.format('dd/mm/yyyy'));
		//	$('#daterange').data('daterangepicker').setEndDate(sad.format('dd/mm/yyyy'));
			
				  }
              }
				
				  });








		  
		  
}


	
})

    </script>
    
    
    
    
    
     
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
   <script>
                    if(screen.width<1000)
                    {
                         var dc=document.getElementsByClassName("radio_wrap")[0];
                     
                      dc.classList.remove('radio_wrap');
                       
                    }
                </script>
    
  
    <script>
$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        //$('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'getLocation.php',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
              // $("#location").html(msg);
            }else{
                //$("#location").html('Not Available');
            }
        }
    });
}
</script>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
</body>

</html>