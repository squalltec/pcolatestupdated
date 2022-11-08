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
  <title>PCO Connect || Privacy Policy</title>
  <style>
    .accordion .accordion-item {
      border-bottom: 1px solid #e5e5e5;
      padding: 10px;
    }

    .accordion .accordion-item button[aria-expanded='true'] {
      border-bottom: 1px solid #ce3435;
    }

    .accordion button {
      position: relative;
      display: block;
      text-align: left;
      width: 100%;
      padding: 1em 0;
      color: #7288a2;
      font-size: 1.15rem;
      font-weight: 400;
      border: none;
      background: none;
      outline: none;
    }

    .accordion button:hover,
    .accordion button:focus {
      cursor: pointer;
      color: #ce3435;
    }

    .accordion button:hover::after,
    .accordion button:focus::after {
      cursor: pointer;
      color: #ce3435;
      border: 1px solid #ce3435;
    }

    .accordion button .accordion-title {
      padding: 1em 1.5em 1em 0;
    }

    .accordion button .icon {
      display: inline-block;
      position: absolute;
      top: 18px;
      right: 0;
      width: 22px;
      height: 22px;
      border: 1px solid;
      border-radius: 22px;
    }

    .accordion button .icon::before {
      display: block;
      position: absolute;
      content: '';
      top: 9px;
      left: 5px;
      width: 10px;
      height: 2px;
      background: currentColor;
    }

    .accordion button .icon::after {
      display: block;
      position: absolute;
      content: '';
      top: 5px;
      left: 9px;
      width: 2px;
      height: 10px;
      background: currentColor;
    }

    .accordion button[aria-expanded='true'] {
      color: #ce3435;
    }

    .accordion button[aria-expanded='true'] .icon::after {
      width: 0;
    }

    .accordion button[aria-expanded='true']+.accordion-content {
      opacity: 1;
      max-height: 9em;
      transition: all 200ms linear;
      will-change: opacity, max-height;
    }

    .accordion .accordion-content {
      opacity: 0;
      max-height: 0;
      overflow: hidden;
      transition: opacity 200ms linear, max-height 200ms linear;
      will-change: opacity, max-height;
    }

    .accordion .accordion-content p {
      font-size: 1rem;
      font-weight: 300;
      margin: 2em 0;
    }
  </style>
</head>

<body>
  <div class="main-holder retrieve-pg">

    <section class="retrieve my-5 py-1">
      <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion">
          <div class="accordion-item">
            <button id="accordion-button-1" aria-expanded="false">
              <span class="accordion-title">Why is the moon sometimes out during the day?</span>
              <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                Ut tortor pretium viverra suspendisse potenti.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <button id="accordion-button-2" aria-expanded="false">
              <span class="accordion-title">Why is the sky blue?</span>
              <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                Ut tortor pretium viverra suspendisse potenti.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <button id="accordion-button-3" aria-expanded="false">
              <span class="accordion-title">Will we ever discover aliens?</span>
              <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                Ut tortor pretium viverra suspendisse potenti.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <button id="accordion-button-4" aria-expanded="false">
              <span class="accordion-title">How much does the Earth weigh?</span>
              <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                Ut tortor pretium viverra suspendisse potenti.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <button id="accordion-button-5" aria-expanded="false">
              <span class="accordion-title">How do airplanes stay up?</span>
              <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
                Ut tortor pretium viverra suspendisse potenti.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>







    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      const items = document.querySelectorAll('.accordion button');

      function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
          items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
          this.setAttribute('aria-expanded', 'true');
        }
      }

      items.forEach((item) => item.addEventListener('click', toggleAccordion));




      function abc() {
        var ema = document.getElementById('ema').value;
        var retrieve = document.getElementById('retrieve').value;




        if (ema == '' && retrieve == '') {
          Swal.fire({
            icon: 'error',
            title: 'Please Enter Details...',
            text: 'Please provied details!'
          })
        } else if (ema == '' && retrieve != '') {
          Swal.fire({
            icon: 'error',
            title: 'Please Enter Email...',
            text: 'Please provied Email!'
          })
        } else if (ema != '' && retrieve == '') {
          Swal.fire({
            icon: 'error',
            title: 'Please Enter Booking Number...',
            text: 'Please provied booking number!'
          })
        } else {

          //alert(ema);
          //alert(retrieve);

          $.ajax({
            type: 'POST',
            url: 'rta.php',
            data: {
              'ema': ema,
              'retrieve': retrieve
            },

            success: function(result) {



              if (result.includes('no')) {


                Swal.fire({
                  icon: 'error',
                  title: 'Wrong Details Entered...',
                  text: 'Please provied correct details!'
                })
                document.getElementById('ema').value = '';
                document.getElementById('retrieve').value = '';

              }






              if (result.includes('yes')) {

                window.location.replace('invoice2.php');

              }







            }


          });

        }

      }
    </script>


















  </div>

  <?php
  include 'footer.php';
  ?>
</body>

</html>