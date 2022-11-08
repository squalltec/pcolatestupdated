<?php require_once 'ti.php' ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="logo-icon.png" type="image/png" />

  <!-- Bootstrap CSS -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/bootstrap-extended.css" rel="stylesheet" />

  <link href="./assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="./assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="./assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="./assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />



  <!-- <link href="./assets/css/icons.css" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!--plugins-->

  <!-- loader-->
  <link href="./assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="./assets/css/dark-theme.css" rel="stylesheet" />
  <link href="./assets/css/light-theme.css" rel="stylesheet" />
  <link href="./assets/css/semi-dark.css" rel="stylesheet" />
  <link href="./assets/css/header-colors.css" rel="stylesheet" />
  <link href="./assets/css/style.css" rel="stylesheet" />
  <style>
    .back-to-top {
      background-color: #ce3435;
      color: white;
      z-index: 9999;
    }

    .back-to-top:hover {
      background-color: white;
      border: 1px solid #ce3435;
      color: #ce3435;
    }

    .card-body {
      background-color: #eeeeee !important;
    }

    div.loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(16, 16, 16, 0.5);
      z-index: 99999;
      display: none;
    }

    @-webkit-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-webkit-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-moz-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-ms-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-moz-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-webkit-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-o-keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes uil-ring-anim {
      0% {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    .uil-ring-css {
      margin: auto;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 200px;
      height: 200px;
    }

    .uil-ring-css>div {
      position: absolute;
      display: block;
      width: 160px;
      height: 160px;
      top: 20px;
      left: 20px;
      border-radius: 80px;
      box-shadow: 0 6px 0 0 #ffffff;
      -ms-animation: uil-ring-anim 1s linear infinite;
      -moz-animation: uil-ring-anim 1s linear infinite;
      -webkit-animation: uil-ring-anim 1s linear infinite;
      -o-animation: uil-ring-anim 1s linear infinite;
      animation: uil-ring-anim 1s linear infinite;
    }
  </style>
  <?php startblock('stylesheethead') ?>
  <?php endblock() ?>


  <title><?php startblock('PageTitle') ?>PCO CONNECT <?php endblock() ?></title>
  <!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
</head>

<body>
  <!--start wrapper-->
  <div class="wrapper">
    <?php startblock('navigation') ?>
    <?php endblock() ?>
    <!--start content-->
    <main class="page-content" style="padding-bottom: 120px;">

      <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-house"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"><?= basename($_SERVER['PHP_SELF']) ?></li>
                </ol>
              </nav>
            </div>
          </div> -->

      <?php emptyblock('PageContent') ?>




    </main>
    <!--start footer-->
    <div class="copyright" style="padding-top: 10px; padding-bottom: 10px; position:fixed; bottom:0; background-color:#000; color:#fff; width:100%;z-index:9999;">
      <div class="container">
        <div class="copylayout" style="height: 15px;display: flex;justify-content: center; align-items: center;">
          <div class="copy_text">Copyright 2022 PCO Connect | Designed and Developed By <img style='width:100px;' src='squlogo.png'></div>
        </div>
      </div>
    </div>
    <!--end footer-->
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--start footer-->
    <!-- <footer class="footer">
        <div class="footer-text" style="text-align: center;">
            <?php startblock('FooterText') ?>PCO CONNECT <?php endblock() ?>
           
        </div>
        </footer> -->
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bi bi-arrow-up-short'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <!-- <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3" checked>
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div> -->
    <!--end switcher-->

  </div>
  <div class="loading">
    <div class='uil-ring-css' style='transform:scale(0.79);'>
      <div>

      </div>
    </div>
  </div>
  <!--end wrapper-->

  <!-- Bootstrap bundle JS -->
  

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!--plugins-->

  <script src="./assets/js/pace.min.js"></script>
  <script src="./assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="./assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="./assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <!-- <script src="./assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script> -->
  <!-- <script src="./assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script> -->
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
        includedLanguages: 'en,ru,ar',
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
          includedLanguages: 'en,ru,ar'
        },
        'google_translate_element'
      );
    }
  </script>

  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>


  <!--app-->
  <script src="./assets/js/app.js"></script>
  <!-- <script src="./assets/js/index.js"></script> -->
  
  

  <script>
    // new PerfectScrollbar(".best-product")
  </script>

  <script>
    $(document).keypress(
      function(event) {
        if (event.which == '13') {
          event.preventDefault();
        }
      });
  </script>
  <?php startblock('scriptBottom') ?><?php endblock() ?>

  
  

  <!--GOOGLE TRANSLATE END-->
</body>

</html>