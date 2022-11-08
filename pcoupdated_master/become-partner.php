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
</head>
<style>
  .themeColorRed {
    color: #ce3435;
  }
</style>

<body>
  <div class="main-holder retrieve-pg">

    <section class="retrieve my-5 py-1">
      <div class="container col-md-8" style=" padding: 20px; padding-bottom: 74px; border-radius: 12px; ">
        <div class="container text-center">
          <h1>Become a Partner</h1>

        </div>
        <h5 class="themeColorRed">Promote the development of partners</h5>
        <p>All year long, we promote your connected hotels to a significant tourist audience globally. </p>
        <h5 class="themeColorRed">Partnership Benefits</h5>
        <p>Utilizing our Partner Program, expands your brand into new markets, as well as pushes more sales via our global network.</p>

        <h5 class="themeColorRed">Support with Action</h5>

        <p>We're available to provide feedback and guidance as you integrate with our APIs.</p>

        <h5 class="themeColorRed">
          How it functions
        </h5>
        <br/>
        <div class="pl-sm-5 ">
          <h6 class="themeColorRed">
            1. Provide your information
          </h6>

          <p>Please complete our online form so that we can determine whether you meet the criteria to become a PCO Connect's Partner.</p>

          <h6 class="themeColorRed">
            2. Signing an NDA (Non-Disclosure Agreement)
          </h6>

          <p>
            All of the information about our partners needs to be secure and private.
          </p>


          <h6 class="themeColorRed">
            3. Utilize our API’s for integration
          </h6>

          <p>You can start developing your integration as soon as we’ve activated your account and created test API calls for you. On the approach, we’ll assist you with support and guidance.</p>


          <h6 class="themeColorRed">
            4. Integrity testing
          </h6>

          <p>We'll check your integration's specifics to make sure it meets our criteria before you go public. The ideal experience is what we desire for every connected property.</p>


          <h6 class="themeColorRed">
            5. Payment Gateway
          </h6>

          <p>We will integrate your payment gateway thereby assuring you of immediate and secure transactions directly to your own accounts. We will charge a nominal transaction fee and a one-time payment gateway connection.</p>
        </div>


      </div>
    </section>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>







    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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