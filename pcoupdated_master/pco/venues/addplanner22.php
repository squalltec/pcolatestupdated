<?php
session_start();
require_once('db_connection.php');

$countvenues = $_SESSION['counting'];
$venues = $_SESSION['venues'];






$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

$roler = $_SESSION['roler'];

if (isset($_POST['submit'])) {


    $skirtingsize = $_POST['skirtingsize'];
    $skirtingpodium = $_POST['skirtingpodium'];


    $hangingpoints = $_POST['hangingpoints'];


    if ($hangingpoints == 'Yes') {
        $numberofhanging = $_POST['numberofhanging'];


        if ($numberofhanging == '' || $numberofhanging == '0') {
            $locationhp = '';
            $hpaccessiblethrough = '';
            $hpchargedincluded = '';
        } else {
            $locationhp = $_POST['locationhp'];
            $locationhp = implode(",", $locationhp);

            $hpaccessiblethrough = $_POST['hpaccessiblethrough'];
            $hpaccessiblethrough = implode(",", $hpaccessiblethrough);

            $hpchargedincluded = $_POST['hpchargedincluded'];
            $hpchargedincluded = implode(",", $hpchargedincluded);
        }
    } else {

        $locationhp = '';
        $hpaccessiblethrough = '';
        $hpchargedincluded = '';
        $numberofhanging = '';
    }



    $availablepower = $_POST['availablepower'];

    $distancedb = $_POST['distancedb'];

    $stage = $_POST['stage'];

    if ($stage == 'Yes') {
        $stageblocks = $_POST['stageblocks'];
    } else {
        $stageblocks = '';
    }


    $carpets = $_POST['carpets'];

    if ($carpets == 'Yes') {
        $carpetcolors = $_POST['carpetcolors'];
        $carpetcolors = implode(",", $carpetcolors);
    } else {
        $carpetcolors = '';
    }



    $classroomtablesize = $_POST['classroomtablesize'];
    $classroomtablesize = implode(",", $classroomtablesize);

    $cocktailtablesize = $_POST['cocktailtablesize'];
    $cocktailtablesize = implode(",", $cocktailtablesize);


    $roundtablesize = $_POST['roundtablesize'];
    $roundtablesize = implode(",", $roundtablesize);


    $chairssize = $_POST['chairssize'];
    $chairssize = implode(",", $chairssize);

    $tableclothsize = $_POST['tableclothsize'];
    $tableclothsize = implode(",", $tableclothsize);

    $tableclothcolors = $_POST['tableclothcolors'];
    $tableclothcolors = implode(",", $tableclothcolors);


    $runnersize = $_POST['runnersize'];
    $runnersize = implode(",", $runnersize);

    $runnercolors = $_POST['runnercolors'];
    $runnercolors = implode(",", $runnercolors);


    $centerpieces = $_POST['centerpieces'];

    if ($centerpieces == 'Yes') {
        $centerpiecetypes = $_POST['centerpiecetypes'];
        $centerpiecetypes = implode(",", $centerpiecetypes);

        $centerpiecesizes = $_POST['centerpiecesizes'];
        $centerpiecesizes = implode(",", $centerpiecesizes);
    } else {
        $centerpiecetypes = '';
        $centerpiecesizes = '';
    }


    $venueavailabilityprior = $_POST['venueavailabilityprior'];

    $accessibilitytimming = $_POST['accessibilitytimming'];







    if (isset($_POST['conferencepackaginginclusions'])) {
        $conferencepackaginginclusions = $_POST['conferencepackaginginclusions'];
    } else {
        $conferencepackaginginclusions = [];
    }





    foreach ($conferencepackaginginclusions as $value) {


        $sql1 = "SELECT * FROM venueconferencepackaginginclusions WHERE name='$value'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
        } else {



            $sqlbb = "INSERT INTO venueconferencepackaginginclusions (name) VALUES ('$value')";

            $resultbb = $conn->query($sqlbb);


            if ($resultbb === TRUE) {
                //echo "Category created successfully";
            } else {
                echo "Error: " . $sqlbb . "<br>" . $conn->error;
            }
        }
    }





    if (isset($_POST['conferencepackaginginclusions'])) {
        $conferencepackaginginclusions = implode(", ", $_POST['conferencepackaginginclusions']);
    } else {
        $conferencepackaginginclusions = '';
    }




    $mixer = $_POST['mixer'];

    $mic = $_POST['mic'];

    $mictype = $_POST['mictype'];

    $chargedfreemic = $_POST['chargedfreemic'];

    $projector = $_POST['projector'];

    $projectortype = $_POST['projectortype'];

    $projectorlumens = $_POST['projectorlumens'];

    $mobilemounted = $_POST['mobilemounted'];

    $backfront = $_POST['backfront'];

    $speakers = $_POST['speakers'];

    $speakertype = $_POST['speakertype'];

    $decibels = $_POST['decibels'];

    $welcomecarpet = $_POST['welcomecarpet'];

    $dancefloor = $_POST['dancefloor'];

    $dancefloorsize = $_POST['dancefloorsize'];

    $dancefloormaterial = $_POST['dancefloormaterial'];

    $dancefloorcost = $_POST['dancefloorcost'];





    $theater = $_POST['theater'];
    $classroom = $_POST['classroom'];
    $cabaret = $_POST['cabaret'];
    $boardroom = $_POST['boardroom'];
    $ushape = $_POST['ushape'];
    $banquet = $_POST['banquet'];
    $cocktailreception = $_POST['cocktailreception'];







    if (isset($_POST['socialdistance'])) {
        $socialdistance = mysqli_real_escape_string($conn, $_POST['socialdistance']);
    } else {
        $socialdistance = '';
    }



    if (isset($_POST['smoking'])) {
        $smoking = mysqli_real_escape_string($conn, $_POST['smoking']);
    } else {
        $smoking = '';
    }







    if (isset($_POST['venueinfo'])) {
        $venueinfo = mysqli_real_escape_string($conn, $_POST['venueinfo']);
    } else {
        $venueinfo = '';
    }
    if (isset($_POST['gettinghere'])) {
        $gettinghere = mysqli_real_escape_string($conn, $_POST['gettinghere']);
    } else {
        $gettinghere = '';
    }
    if (isset($_POST['glance'])) {
        $glance = mysqli_real_escape_string($conn, $_POST['glance']);
    } else {
        $glance = '';
    }
    if (isset($_POST['naturaldaylight'])) {
        $naturaldaylight = $_POST['naturaldaylight'];
    } else {
        $naturaldaylight = '';
    }
    if (isset($_POST['ceilingheight'])) {
        $ceilingheight = mysqli_real_escape_string($conn, $_POST['ceilingheight']);
    } else {
        $ceilingheight = '';
    }
    if (isset($_POST['doorwidthheight'])) {
        $doorwidthheight = mysqli_real_escape_string($conn, $_POST['doorwidthheight']);
    } else {
        $doorwidthheight = '';
    }
    if (isset($_POST['carlaunch'])) {
        $carlaunch = $_POST['carlaunch'];
    } else {
        $carlaunch = '';
    }
    if (isset($_POST['vehiclewidthheight'])) {
        $vehiclewidthheight = mysqli_real_escape_string($conn, $_POST['vehiclewidthheight']);
    } else {
        $vehiclewidthheight = '';
    }
    if (isset($_POST['venueaddress'])) {
        $venueaddress = mysqli_real_escape_string($conn, $_POST['venueaddress']);
    } else {
        $venueaddress = '';
    }
    if (isset($_POST['lastrenovated'])) {
        $lastrenovated = $_POST['lastrenovated'];
    } else {
        $lastrenovated = '';
    }
    if (isset($_POST['venuerating'])) {
        $venuerating = $_POST['venuerating'];
    } else {
        $venuerating = '';
    }
    if (isset($_POST['outdoorindoor'])) {
        $outdoorindoor = $_POST['outdoorindoor'];
    } else {
        $outdoorindoor = '';
    }
    if (isset($_POST['numberofmeetingrooms'])) {
        $numberofmeetingrooms = $_POST['numberofmeetingrooms'];
    } else {
        $numberofmeetingrooms = '';
    }
    if (isset($_POST['numberofbanquet'])) {
        $numberofbanquet = $_POST['numberofbanquet'];
    } else {
        $numberofbanquet = '';
    }
    if (isset($_POST['numberofbreakout'])) {
        $numberofbreakout = $_POST['numberofbreakout'];
    } else {
        $numberofbreakout = '';
    }










    if (isset($_POST['cards'])) {
        $pastevents = implode(", ", $_POST['cards']);
    } else {
        $pastevents = '';
    }


    $vinclusions = implode(", ", $_POST['vinclusions']);


    $arraycards = $_POST['vinclusions'];



    foreach ($arraycards as $value) {


        $sql1 = "SELECT * FROM venueinclusions WHERE name='$value'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
        } else {



            $sqlbb = "INSERT INTO venueinclusions (name) VALUES ('$value')";

            $resultbb = $conn->query($sqlbb);


            if ($resultbb === TRUE) {
                //echo "Category created successfully";
            } else {
                echo "Error: " . $sqlbb . "<br>" . $conn->error;
            }
        }
    }
















    $workpermit = '';



    if (!empty($_FILES['workpermit']['name'])) {

        mkdir("../Venues Work Permits/" . $hotel . "/" . $venues[$countvenues], 0755, true);

        $filename2 = $_FILES['workpermit']['name'];
        $destination2 = "../Venues Work Permits/" . $hotel . "/" . $venues[$countvenues] . "/" . $filename2;
        $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
        $file2 = $_FILES['workpermit']['tmp_name'];
        $workpermit = $filename2;

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {
        }
    }
























    $sql = "UPDATE meetingbanquetplanner SET venueinfo='$venueinfo',gettinghere='$gettinghere',glance='$glance',naturaldaylight='$naturaldaylight',ceilingheight='$ceilingheight',doorwidthheight='$doorwidthheight', carlaunch='$carlaunch', vehiclewidthheight='$vehiclewidthheight', venueaddress='$venueaddress', lastrenovated='$lastrenovated',outdoorindoor='$outdoorindoor',pastevents='$pastevents',vinclusions='$vinclusions',theater='$theater',classroom='$classroom',cabaret='$cabaret',boardroom='$boardroom',ushape='$ushape',banquetdinner='$banquet',cocktailreception='$cocktailreception',smoking='$smoking',socialdistance='$socialdistance',hangingpoints='$hangingpoints', numberofhanging='$numberofhanging', locationhp='$locationhp', hpaccessiblethrough='$hpaccessiblethrough', hpchargedincluded='$hpchargedincluded', availablepower='$availablepower', distancedb='$distancedb', stage='$stage', stageblocks='$stageblocks', carpets='$carpets', carpetcolors='$carpetcolors', classroomtablesize='$classroomtablesize', cocktailtablesize='$cocktailtablesize', roundtablesize='$roundtablesize', chairssize='$chairssize', tableclothsize='$tableclothsize', tableclothcolors='$tableclothcolors', runnersize='$runnersize', runnercolors='$runnercolors', centerpieces='$centerpieces', centerpiecetypes='$centerpiecetypes', centerpiecesizes='$centerpiecesizes', venueavailabilityprior='$venueavailabilityprior', accessibilitytimming='$accessibilitytimming', conferencepackaginginclusions='$conferencepackaginginclusions', mixer='$mixer', mic='$mic', mictype='$mictype', chargedfreemic='$chargedfreemic', projector='$projector', projectortype='$projectortype', projectorlumens='$projectorlumens', mobilemounted='$mobilemounted', backfront='$backfront', speakers='$speakers', speakertype='$speakertype', decibels='$decibels', welcomecarpet='$welcomecarpet', dancefloor='$dancefloor', dancefloorsize='$dancefloorsize', dancefloormaterial='$dancefloormaterial', dancefloorcost='$dancefloorcost',skirtingpodium='$skirtingpodium',skirtingsize='$skirtingsize',workpermit='$workpermit' WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venues[$countvenues]'";

    $result = $conn->query($sql);


    if ($result === TRUE) {
        $_SESSION['alertme'] = 1;


        // echo "<script>location.replace('managehotel.php');</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }









    mkdir("../Venue Original Images/" . $hotel . "/" . $venues[$countvenues], 0755, true);


    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['timages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['timages']['name'][$id];
            $tempLocation    = $_FILES['timages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','theater')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }










    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['crimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['crimages']['name'][$id];
            $tempLocation    = $_FILES['crimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','classroom')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }







    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['cabimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['cabimages']['name'][$id];
            $tempLocation    = $_FILES['cabimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','cabaret')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }












    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['boimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['boimages']['name'][$id];
            $tempLocation    = $_FILES['boimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','boardroom')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }









    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['uimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['uimages']['name'][$id];
            $tempLocation    = $_FILES['uimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','ushape')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }










    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['banimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['banimages']['name'][$id];
            $tempLocation    = $_FILES['banimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','banquet')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }











    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['cocktailimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['cocktailimages']['name'][$id];
            $tempLocation    = $_FILES['cocktailimages']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if (true) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if (!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','cocktail')");


                if ($insert) {


                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }


    $babzq = intval($_SESSION['counting']) + 1;


    if (count($venues) > $babzq) {
        $_SESSION['counting'] = intval($_SESSION['counting']) + 1;
        echo "<script>location.replace('addplanner22.php');</script>";
    } else {
        $_SESSION['counting'] = '0';
        echo "<script>location.replace('uploadorfp.php');</script>";
    }
}





?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Planner
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<h1 align='center'>Info for <?php echo $venues[$_SESSION['counting']]; ?></h1>
<form action="#" method="post" enctype="multipart/form-data">



    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <textarea class='form-control' placeholder='Venue Info (Description)' name='venueinfo'></textarea>
            </div>
        </div>
    </div>
    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <textarea class='form-control' placeholder='Getting Here' name='gettinghere'></textarea>

            </div>
            <div class='col-sm'>
                <textarea class='form-control' placeholder='At a glance info' name='glance'></textarea>
            </div>
        </div>
    </div>










    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select id='hp' class='form-select' name='hangingpoints'>
                    <option selected disabled>Hanging Points?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>

            </div>
            <div style='display:none;' id='nh' class='col-sm'>
                <input class='form-control' id='nhh' placeholder='# of Hanging Points' name='numberofhanging'>
            </div>
            <datalist id='atss' style='display:none;'>
                <option>Scaffolding</option>
                <option>Fork Lift</option>
                <option>Genie Lift</option>
            </datalist>



        </div>
    </div>

    <br />
    <nonsense id='hangingpointtable'>

    </nonsense>











    <script>
        $("#hp").change(function() {

            var hp = document.getElementById('hp').value;

            if (hp == 'Yes') {
                document.getElementById('nhh').value = '';

                document.getElementById('nh').style.display = 'block';

            } else {

                document.getElementById('hangingpointtable').innerHTML = '';
                document.getElementById('nhh').value = '';

                document.getElementById('nh').style.display = 'none';


            }

        });



        $("#nhh").keyup(function() {


            var val = document.getElementById('nhh').value;
            var hangingpoints = document.getElementById('hangingpointtable');
            hangingpoints.innerHTML = '';


            for (let i = 0; i < val; i++) {
                var hangingpoints = document.getElementById('hangingpointtable');

                var dc = document.createElement('div');
                dc.classList.add('container');


                var dr = document.createElement('div');
                dr.classList.add('row');


                var d1 = document.createElement('div');
                d1.classList.add('col-sm');

                var d2 = document.createElement('div');
                d2.classList.add('col-sm');

                var d3 = document.createElement('div');
                d3.classList.add('col-sm');





                var loc = document.createElement('INPUT');
                loc.classList.add('form-control');
                loc.setAttribute('placeholder', 'Location of Hanging Point');
                loc.setAttribute('name', 'locationhp[]');
                d1.appendChild(loc);



                var at = document.createElement('INPUT');
                at.classList.add('form-control');
                at.setAttribute('placeholder', 'Accessible Through');
                at.setAttribute('list', 'atss');
                at.setAttribute('name', 'hpaccessiblethrough[]');
                d2.appendChild(at);




                var ci = document.createElement('SELECT');
                ci.classList.add('form-control');
                ci.setAttribute('name', 'hpchargedincluded[]');


                var o1 = document.createElement('OPTION');
                o1.innerHTML = 'Charged';
                var o2 = document.createElement('OPTION');
                o2.innerHTML = 'Included';

                ci.appendChild(o1);
                ci.appendChild(o2);



                d3.appendChild(ci);




                dr.appendChild(d1);
                dr.appendChild(d2);
                dr.appendChild(d3);

                dc.appendChild(dr);
                hangingpoints.appendChild(dc);

            }


        });
    </script>
































    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select id='ap' class='form-select' name='availablepower'>
                    <option selected disabled>Available Power?</option>
                    <option>32AMPS 3PHASE</option>
                    <option>63AMPS 3PHASE</option>
                    <option>120AMPS 3PHASE</option>
                </select>

            </div>
            <div class='col-sm'>
                <input class='form-control' placeholder='Distance from DB in Meters' name='distancedb'>
            </div>

            <div class='col-sm'>
                <select class='form-control' id='stage' name='stage'>
                    <option selected disabled>Stage Available?</option>
                    <option>Yes</option>
                    <option>No</option>

                </select>
            </div>


            <div id='stg' style='display:none;' class='col-sm'>
                <input class='form-control' placeholder='How Many Blocks?' id='sb' name='stageblocks'>
                <small style='color:red;'>Standard: (1.2m x 2.4m)</small>

            </div>


        </div>
    </div>




    <script>
        $("#stage").change(function() {

            var stage = document.getElementById('stage').value;

            if (stage == 'Yes') {

                document.getElementById('sb').value = '';

                document.getElementById('stg').style.display = 'block';


            } else {
                document.getElementById('sb').value = '';

                document.getElementById('stg').style.display = 'none';
            }

        });
    </script>






















    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select style='height:47px;' class='form-select' id='carpets' name='carpets'>
                    <option selected disabled>Carpets?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>


            <div class='col-sm' style='display:none;' id='carpetcolors'>

                <select class='form-control' id="choices-multiple-remove-button" name='carpetcolors[]' placeholder="Select Colors" multiple>
                    <option value='#FFFF99'>Canary</option>
                    <option value='#FFFDD0'>Cream</option>
                    <option value='#FFFAF0'>Floral white</option>
                    <option value='#FFF8E7'>Cosmic latte</option>
                    <option value='#FFF8DC'>Cornsilk</option>
                    <option value='#FFEF00'>Canary yellow</option>
                    <option value='#FFEBCD'>Blanched almond</option>
                    <option value='#FFE4C4'>Bisque</option>
                    <option value='#FFD300'>Cyber yellow</option>
                    <option value='#FFC680'>Buff</option>
                    <option value='#FFBF00'>Amber</option>
                    <option value='#FFBCD9'>Cotton candy</option>
                    <option value='#FFB200'>Chinese yellow</option>
                    <option value='#FFB7C5'>Cherry blossom pink</option>
                    <option value='#FFAA1D'>Bright yellow (Crayola)</option>
                    <option value='#FFA6C9'>Carnation pink</option>
                    <option value='#FF9966'>Atomic tangerine</option>
                    <option value='#FF9933'>Deep saffron</option>
                    <option value='#FF5470'>Fiery rose</option>
                    <option value='#FF3800'>Coquelicot</option>
                    <option value='#FF1493'>Deep pink</option>
                    <option value='#FF91AF'>Baker-Miller pink</option>
                    <option value='#FF8C00'>Dark orange</option>
                    <option value='#FF7F50'>Coral</option>
                    <option value='#FF00FF'>Fuchsia</option>
                    <option value='#FEFEFA'>Baby powder</option>
                    <option value='#FDEE00'>Aureolin</option>
                    <option value='#FD6C9E'>French pink</option>
                    <option value='#FD3F92'>French fuchsia</option>
                    <option value='#FBEC5D'>Corn</option>
                    <option value='#FBCEB1'>Apricot</option>
                    <option value='#FAEBD7'>Antique white</option>
                    <option value='#FAE7B5'>Banana Mania</option>
                    <option value='#FAD6A5'>Deep champagne</option>
                    <option value='#F88379'>Congo pink</option>
                    <option value='#F88379'>Coral pink</option>
                    <option value='#F56FA1'>Cyclamen</option>
                    <option value='#F19CBB'>Amaranth pink</option>
                    <option value='#F7E7CE'>Champagne</option>
                    <option value='#F5F5F5'>Cultured</option>
                    <option value='#F5F5DC'>Beige</option>
                    <option value='#F4C2C2'>Baby pink</option>
                    <option value='#F1DDCF'>Champagne pink</option>
                    <option value='#F0FFFF'>Azure (X11/web color)</option>
                    <option value='#F0F8FF'>Alice blue</option>
                    <option value='#F0EAD6'>Eggshell</option>
                    <option value='#EFDFBB'>Dutch white</option>
                    <option value='#EFDECD'>Almond</option>
                    <option value='#EFBBCC'>Cameo pink</option>
                    <option value='#EEDC82'>Flax</option>
                    <option value='#EDC9AF'>Desert sand</option>
                    <option value='#ED9121'>Carrot orange</option>
                    <option value='#ED872D'>Cadmium orange</option>
                    <option value='#E97451'>Burnt sienna</option>
                    <option value='#E48400'>Fulvous</option>
                    <option value='#E34234'>Cinnabar</option>
                    <option value='#E25822'>Flame</option>
                    <option value='#E9967A'>Dark salmon</option>
                    <option value='#E4717A'>Candy pink</option>
                    <option value='#E936A7'>Frostbite</option>
                    <option value='#E68FAC'>Charm pink</option>
                    <option value='#E23D28'>Chili red</option>
                    <option value='#E9D66B'>Arylide yellow</option>
                    <option value='#E5AA70'>Fawn</option>
                    <option value='#E4D00A'>Citrine</option>
                    <option value='#E3DAC9'>Bone</option>
                    <option value='#DEB887'>Burlywood</option>
                    <option value='#DE5285'>Fandango pink</option>
                    <option value='#DE3163'>Cerise</option>
                    <option value='#DE6FA1'>China pink</option>
                    <option value='#DE5D83'>Blush</option>
                    <option value='#DC143C'>Crimson</option>
                    <option value='#DB2D43'>Alizarin</option>
                    <option value='#DA3287'>Deep cerise</option>
                    <option value='#DA8A67'>Copper (Crayola)</option>
                    <option value='#D70040'>Carmine (M&P)</option>
                    <option value='#D2691E'>Chocolate (web)</option>
                    <option value='#D891EF'>Bright lilac</option>
                    <option value='#D473D4'>French mauve</option>
                    <option value='#D0FF14'>Arctic lime</option>
                    <option value='#CE2029'>Fire engine red</option>
                    <option value='#CD9575'>Antique brass</option>
                    <option value='#CD607E'>Cinnamon Satin</option>
                    <option value='#CD7F32'>Bronze</option>
                    <option value='#CCFF00'>Electric lime</option>
                    <option value='#CC5500'>Burnt orange</option>
                    <option value='#CC474B'>English vermillion</option>
                    <option value='#CB4154'>Brick red</option>
                    <option value='#CB6D51'>Copper red</option>
                    <option value='#CAE00D'>Bitter lemon</option>
                    <option value='#C46210'>Alloy orange</option>
                    <option value='#C32148'>Bright maroon</option>
                    <option value='#C154C1'>Fuchsia (Crayola)</option>
                    <option value='#C95A49'>Cedar Chest</option>
                    <option value='#C72C48'>French raspberry</option>
                    <option value='#C41E3A'>Cardinal</option>
                    <option value='#C19A6B'>Camel</option>
                    <option value='#C19A6B'>Desert</option>
                    <option value='#C19A6B'>Fallow</option>
                    <option value='#C2B280'>Ecru</option>
                    <option value='#BFAFB2'>Black Shadows</option>
                    <option value='#BF00FF'>Electric purple</option>
                    <option value='#BDB76B'>Dark khaki</option>
                    <option value='#BD33A4'>Byzantine</option>
                    <option value='#BCD4E6'>Beau blue</option>
                    <option value='#B87333'>Copper</option>
                    <option value='#B53389'>Fandango</option>
                    <option value='#B48395'>English lavender</option>
                    <option value='#B22222'>Firebrick</option>
                    <option value='#B8860B'>Dark goldenrod</option>
                    <option value='#B284BE'>African violet</option>
                    <option value='#B94E48'>Deep chestnut</option>
                    <option value='#B31B1B'>Carnelian</option>
                    <option value='#B9D9EB'>Columbia Blue</option>
                    <option value='#B2FFFF'>Celeste</option>
                    <option value='#B2BEB5'>Ash gray</option>
                    <option value='#B0BF1A'>Acid green</option>
                    <option value='#AF6E4D'>Brown sugar</option>
                    <option value='#AD6F69'>Copper penny</option>
                    <option value='#ACE5EE'>Blizzard blue</option>
                    <option value='#ACE1AF'>Celadon</option>
                    <option value='#AB274F'>Amaranth purple</option>
                    <option value='#AB4B52'>English red</option>
                    <option value='#AA381E'>Chinese red</option>
                    <option value='#A57164'>Blast-off bronze</option>
                    <option value='#A2006D'>Flirt</option>
                    <option value='#A67B5B'>Café au lait</option>
                    <option value='#A67B5B'>French beige</option>
                    <option value='#A17A74'>Burnished brown</option>
                    <option value='#A3C1AD'>Cambridge blue</option>
                    <option value='#A2A2D0'>Blue bell</option>
                    <option value='#A1CAF1'>Baby blue eyes</option>
                    <option value='#996666'>Copper rose</option>
                    <option value='#967117'>Bistre brown</option>
                    <option value='#967117'>Drab</option>
                    <option value='#960018'>Carmine</option>
                    <option value='#954535'>Chestnut</option>
                    <option value='#856088'>Chinese violet</option>
                    <option value='#848482'>Battleship grey</option>
                    <option value='#801818'>Falu red</option>
                    <option value='#800020'>Burgundy</option>
                    <option value='#703642'>Catawba</option>
                    <option value='#702963'>Byzantium</option>
                    <option value='#696969'>Dim gray</option>
                    <option value='#683068'>Finn</option>
                    <option value='#660000'>Blood red</option>
                    <option value='#654321'>Dark brown</option>
                    <option value='#614051'>Eggplant</option>
                    <option value='#555555'>Davy's grey</option>
                    <option value='#536878'>Dark electric blue</option>
                    <option value='#333399'>Blue (pigment)</option>
                    <option value='#301934'>Dark purple</option>
                    <option value='#177245'>Dark spring green</option>
                    <option value='#126180'>Blue sapphire</option>
                    <option value='#98817B'>Cinereous</option>
                    <option value='#87421F'>Fuzzy Wuzzy</option>
                    <option value='#86608E'>French lilac</option>
                    <option value='#81613C'>Coyote brown</option>
                    <option value='#79443B'>Bole</option>
                    <option value='#58427C'>Cyber grape</option>
                    <option value='#54626F'>Black coral</option>
                    <option value='#36454F'>Charcoal</option>
                    <option value='#9966CC'>Amethyst</option>
                    <option value='#9932CC'>Dark orchid</option>
                    <option value='#9400D3'>Dark violet</option>
                    <option value='#8806CE'>French violet</option>
                    <option value='#6699CC'>Blue-gray (Crayola)</option>
                    <option value='#6495ED'>Cornflower blue</option>
                    <option value='#006400'>Dark green (X11)</option>
                    <option value='#5072A7'>Blue yonder</option>
                    <option value='#2243B6'>Denim blue</option>
                    <option value='#1560BD'>Denim</option>
                    <option value='#915C83'>Antique fuchsia</option>
                    <option value='#893F45'>Cordovan</option>
                    <option value='#856D4D'>French bistre</option>
                    <option value='#841B2D'>Antique ruby</option>
                    <option value='#665D1E'>Antique bronze</option>
                    <option value='#563C5C'>English violet</option>
                    <option value='#556B2F'>Dark olive green</option>
                    <option value='#555D50'>Ebony</option>
                    <option value='#543D37'>Dark liver (horses)</option>
                    <option value='#483D8B'>Dark slate blue</option>
                    <option value='#483C32'>Dark lava</option>
                    <option value='#318CE7'>Bleu de France</option>
                    <option value='#228B22'>Forest green (web)</option>
                    <option value='#96C8A2'>Eton blue</option>
                    <option value='#0093AF'>Blue (Munsell)</option>
                    <option value='#91A3B0'>Cadet grey</option>
                    <option value='#89CFF0'>Baby blue</option>
                    <option value='#0087BD'>Blue (NCS)</option>
                    <option value='#80FF00'>Chartreuse (web)</option>
                    <option value='#77B5FE'>French sky blue</option>
                    <option value='#0072BB'>French blue</option>
                    <option value='#72A0C1'>Air superiority blue</option>
                    <option value='#56A0D3'>Carolina blue</option>
                    <option value='#50C878'>Emerald</option>
                    <option value='#0048BA'>Absolute Zero</option>
                    <option value='#0018A8'>Blue (Pantone)</option>
                    <option value='#9FA91F'>Citron</option>
                    <option value='#9F8170'>Beaver</option>
                    <option value='#9F2B68'>Amaranth deep purple</option>
                    <option value='#9EFD38'>French lime</option>
                    <option value='#9E1B32'>Crimson (UA)</option>
                    <option value='#9C2542'>Big dip o’ruby</option>
                    <option value='#00009C'>Duke blue</option>
                    <option value='#8FBC8F'>Dark sea green</option>
                    <option value='#8F00FF'>Electric violet</option>
                    <option value='#8CBED6'>Dark sky blue</option>
                    <option value='#8C92AC'>Cool grey</option>
                    <option value='#008B8B'>Dark cyan</option>
                    <option value='#8B008B'>Dark magenta</option>
                    <option value='#8B0000'>Dark red</option>
                    <option value='#8A3324'>Burnt umber</option>
                    <option value='#8A2BE2'>Blue-violet</option>
                    <option value='#7FFFD4'>Aquamarine</option>
                    <option value='#007FFF'>Azure</option>
                    <option value='#7F1734'>Claret</option>
                    <option value='#7E5E60'>Deep taupe</option>
                    <option value='#7CB9E8'>Aero</option>
                    <option value='#7C0A02'>Barn red</option>
                    <option value='#7BB661'>Bud green</option>
                    <option value='#007BA7'>Cerulean</option>
                    <option value='#7B3F00'>Chocolate (traditional)</option>
                    <option value='#6F4E37'>Coffee</option>
                    <option value='#6D9BC3'>Cerulean frost</option>
                    <option value='#6C3082'>Eminence</option>
                    <option value='#6C541E'>Field drab</option>
                    <option value='#006B3C'>Cadmium green</option>
                    <option value='#5F9EA0'>Cadet blue</option>
                    <option value='#5DADEC'>Blue jeans</option>
                    <option value='#5D3954'>Dark byzantium</option>
                    <option value='#4F7942'>Fern green</option>
                    <option value='#4B3621'>Café noir</option>
                    <option value='#004B49'>Deep jungle green</option>
                    <option value='#4B6F44'>Artichoke green</option>
                    <option value='#4A646C'>Deep Space Sparkle</option>
                    <option value='#4A412A'>Drab dark brown</option>
                    <option value='#3DDC84'>Android green</option>
                    <option value='#3D2B1F'>Bistre</option>
                    <option value='#3D0C02'>Black bean</option>
                    <option value='#3C1414'>Dark sienna</option>
                    <option value='#3C69E7'>Bluetiful</option>
                    <option value='#3B7A57'>Amazon</option>
                    <option value='#3B3C36'>Black olive</option>
                    <option value='#2F4F4F'>Dark slate gray</option>
                    <option value='#2E5894'>B'dazzled blue</option>
                    <option value='#2E2D88'>Cosmic cobalt</option>
                    <option value='#2A52BE'>Cerulean blue</option>
                    <option value='#1F75FE'>Blue (Crayola)</option>
                    <option value='#1E90FF'>Dodger blue</option>
                    <option value='#1DACD6'>Cerulean (Crayola)</option>
                    <option value='#1B1B1B'>Eerie black</option>
                    <option value='#1A2421'>Dark jungle green</option>
                    <option value='#00FFFF'>Aqua</option>
                    <option value='#00FFFF'>Cyan</option>
                    <option value='#00FF40'>Erin</option>
                    <option value='#0000FF'>Blue</option>
                    <option value='#00CED1'>Dark turquoise</option>
                    <option value='#00CC99'>Caribbean green</option>
                    <option value='#00BFFF'>Capri</option>
                    <option value='#00BFFF'>Deep sky blue</option>
                    <option value='#00B7EB'>Cyan (process)</option>
                    <option value='#000000'>Black</option>

                </select>
            </div>

        </div>
    </div>




    <script>
        $("#carpets").change(function() {

            var carpets = document.getElementById('carpets').value;

            if (carpets == 'Yes') {

                document.getElementById('choices-multiple-remove-button').value = '';

                document.getElementById('carpetcolors').style.display = 'block';


            } else {
                document.getElementById('choices-multiple-remove-button').value = '';

                document.getElementById('carpetcolors').style.display = 'none';
            }

        });
    </script>












    <br />
    <div class='container'>
        <div class='row'>
            <h6 align='center'>Tables Sizes</h6>
            <div class='col-sm'>
                <input name='classroomtablesize[]' id='crts' class='form-control' placeholder='Classroom Table Size'>
            </div>

            <div class='col-sm'>
                <input name='cocktailtablesize[]' id='cots' class='form-control' placeholder='Cocktail Table Size'>
            </div>

            <div class='col-sm'>
                <input name='roundtablesize[]' id='rts' class='form-control' placeholder='Round Table Size'>
            </div>

        </div>
    </div>



    <br />
    <div class='container'>
        <div id='chai' class='row'>
            <h6 align='center'>Chair Sizes</h6>

            <div class='col-sm'>
                <input name='chairssize[]' id='cs' class='form-control' placeholder='Chairs Size'>
            </div>


        </div>
    </div>









    <br />
    <div class='container'>
        <div class='row'>
            <h6 align='center'>Table Cloth</h6>

            <div class='col-sm'>
                <input class='form-control' id='tcs' style='height:47px;' placeholder='Table Cloth Sizes' name='tableclothsize[]'>
            </div>


            <div class='col-sm'>
                <select class='form-control' id="choices-multiple-remove-buttonn" name='tableclothcolors[]' placeholder="Select Colors" multiple>
                    <option value='#FFFF99'>Canary</option>
                    <option value='#FFFDD0'>Cream</option>
                    <option value='#FFFAF0'>Floral white</option>
                    <option value='#FFF8E7'>Cosmic latte</option>
                    <option value='#FFF8DC'>Cornsilk</option>
                    <option value='#FFEF00'>Canary yellow</option>
                    <option value='#FFEBCD'>Blanched almond</option>
                    <option value='#FFE4C4'>Bisque</option>
                    <option value='#FFD300'>Cyber yellow</option>
                    <option value='#FFC680'>Buff</option>
                    <option value='#FFBF00'>Amber</option>
                    <option value='#FFBCD9'>Cotton candy</option>
                    <option value='#FFB200'>Chinese yellow</option>
                    <option value='#FFB7C5'>Cherry blossom pink</option>
                    <option value='#FFAA1D'>Bright yellow (Crayola)</option>
                    <option value='#FFA6C9'>Carnation pink</option>
                    <option value='#FF9966'>Atomic tangerine</option>
                    <option value='#FF9933'>Deep saffron</option>
                    <option value='#FF5470'>Fiery rose</option>
                    <option value='#FF3800'>Coquelicot</option>
                    <option value='#FF1493'>Deep pink</option>
                    <option value='#FF91AF'>Baker-Miller pink</option>
                    <option value='#FF8C00'>Dark orange</option>
                    <option value='#FF7F50'>Coral</option>
                    <option value='#FF00FF'>Fuchsia</option>
                    <option value='#FEFEFA'>Baby powder</option>
                    <option value='#FDEE00'>Aureolin</option>
                    <option value='#FD6C9E'>French pink</option>
                    <option value='#FD3F92'>French fuchsia</option>
                    <option value='#FBEC5D'>Corn</option>
                    <option value='#FBCEB1'>Apricot</option>
                    <option value='#FAEBD7'>Antique white</option>
                    <option value='#FAE7B5'>Banana Mania</option>
                    <option value='#FAD6A5'>Deep champagne</option>
                    <option value='#F88379'>Congo pink</option>
                    <option value='#F88379'>Coral pink</option>
                    <option value='#F56FA1'>Cyclamen</option>
                    <option value='#F19CBB'>Amaranth pink</option>
                    <option value='#F7E7CE'>Champagne</option>
                    <option value='#F5F5F5'>Cultured</option>
                    <option value='#F5F5DC'>Beige</option>
                    <option value='#F4C2C2'>Baby pink</option>
                    <option value='#F1DDCF'>Champagne pink</option>
                    <option value='#F0FFFF'>Azure (X11/web color)</option>
                    <option value='#F0F8FF'>Alice blue</option>
                    <option value='#F0EAD6'>Eggshell</option>
                    <option value='#EFDFBB'>Dutch white</option>
                    <option value='#EFDECD'>Almond</option>
                    <option value='#EFBBCC'>Cameo pink</option>
                    <option value='#EEDC82'>Flax</option>
                    <option value='#EDC9AF'>Desert sand</option>
                    <option value='#ED9121'>Carrot orange</option>
                    <option value='#ED872D'>Cadmium orange</option>
                    <option value='#E97451'>Burnt sienna</option>
                    <option value='#E48400'>Fulvous</option>
                    <option value='#E34234'>Cinnabar</option>
                    <option value='#E25822'>Flame</option>
                    <option value='#E9967A'>Dark salmon</option>
                    <option value='#E4717A'>Candy pink</option>
                    <option value='#E936A7'>Frostbite</option>
                    <option value='#E68FAC'>Charm pink</option>
                    <option value='#E23D28'>Chili red</option>
                    <option value='#E9D66B'>Arylide yellow</option>
                    <option value='#E5AA70'>Fawn</option>
                    <option value='#E4D00A'>Citrine</option>
                    <option value='#E3DAC9'>Bone</option>
                    <option value='#DEB887'>Burlywood</option>
                    <option value='#DE5285'>Fandango pink</option>
                    <option value='#DE3163'>Cerise</option>
                    <option value='#DE6FA1'>China pink</option>
                    <option value='#DE5D83'>Blush</option>
                    <option value='#DC143C'>Crimson</option>
                    <option value='#DB2D43'>Alizarin</option>
                    <option value='#DA3287'>Deep cerise</option>
                    <option value='#DA8A67'>Copper (Crayola)</option>
                    <option value='#D70040'>Carmine (M&P)</option>
                    <option value='#D2691E'>Chocolate (web)</option>
                    <option value='#D891EF'>Bright lilac</option>
                    <option value='#D473D4'>French mauve</option>
                    <option value='#D0FF14'>Arctic lime</option>
                    <option value='#CE2029'>Fire engine red</option>
                    <option value='#CD9575'>Antique brass</option>
                    <option value='#CD607E'>Cinnamon Satin</option>
                    <option value='#CD7F32'>Bronze</option>
                    <option value='#CCFF00'>Electric lime</option>
                    <option value='#CC5500'>Burnt orange</option>
                    <option value='#CC474B'>English vermillion</option>
                    <option value='#CB4154'>Brick red</option>
                    <option value='#CB6D51'>Copper red</option>
                    <option value='#CAE00D'>Bitter lemon</option>
                    <option value='#C46210'>Alloy orange</option>
                    <option value='#C32148'>Bright maroon</option>
                    <option value='#C154C1'>Fuchsia (Crayola)</option>
                    <option value='#C95A49'>Cedar Chest</option>
                    <option value='#C72C48'>French raspberry</option>
                    <option value='#C41E3A'>Cardinal</option>
                    <option value='#C19A6B'>Camel</option>
                    <option value='#C19A6B'>Desert</option>
                    <option value='#C19A6B'>Fallow</option>
                    <option value='#C2B280'>Ecru</option>
                    <option value='#BFAFB2'>Black Shadows</option>
                    <option value='#BF00FF'>Electric purple</option>
                    <option value='#BDB76B'>Dark khaki</option>
                    <option value='#BD33A4'>Byzantine</option>
                    <option value='#BCD4E6'>Beau blue</option>
                    <option value='#B87333'>Copper</option>
                    <option value='#B53389'>Fandango</option>
                    <option value='#B48395'>English lavender</option>
                    <option value='#B22222'>Firebrick</option>
                    <option value='#B8860B'>Dark goldenrod</option>
                    <option value='#B284BE'>African violet</option>
                    <option value='#B94E48'>Deep chestnut</option>
                    <option value='#B31B1B'>Carnelian</option>
                    <option value='#B9D9EB'>Columbia Blue</option>
                    <option value='#B2FFFF'>Celeste</option>
                    <option value='#B2BEB5'>Ash gray</option>
                    <option value='#B0BF1A'>Acid green</option>
                    <option value='#AF6E4D'>Brown sugar</option>
                    <option value='#AD6F69'>Copper penny</option>
                    <option value='#ACE5EE'>Blizzard blue</option>
                    <option value='#ACE1AF'>Celadon</option>
                    <option value='#AB274F'>Amaranth purple</option>
                    <option value='#AB4B52'>English red</option>
                    <option value='#AA381E'>Chinese red</option>
                    <option value='#A57164'>Blast-off bronze</option>
                    <option value='#A2006D'>Flirt</option>
                    <option value='#A67B5B'>Café au lait</option>
                    <option value='#A67B5B'>French beige</option>
                    <option value='#A17A74'>Burnished brown</option>
                    <option value='#A3C1AD'>Cambridge blue</option>
                    <option value='#A2A2D0'>Blue bell</option>
                    <option value='#A1CAF1'>Baby blue eyes</option>
                    <option value='#996666'>Copper rose</option>
                    <option value='#967117'>Bistre brown</option>
                    <option value='#967117'>Drab</option>
                    <option value='#960018'>Carmine</option>
                    <option value='#954535'>Chestnut</option>
                    <option value='#856088'>Chinese violet</option>
                    <option value='#848482'>Battleship grey</option>
                    <option value='#801818'>Falu red</option>
                    <option value='#800020'>Burgundy</option>
                    <option value='#703642'>Catawba</option>
                    <option value='#702963'>Byzantium</option>
                    <option value='#696969'>Dim gray</option>
                    <option value='#683068'>Finn</option>
                    <option value='#660000'>Blood red</option>
                    <option value='#654321'>Dark brown</option>
                    <option value='#614051'>Eggplant</option>
                    <option value='#555555'>Davy's grey</option>
                    <option value='#536878'>Dark electric blue</option>
                    <option value='#333399'>Blue (pigment)</option>
                    <option value='#301934'>Dark purple</option>
                    <option value='#177245'>Dark spring green</option>
                    <option value='#126180'>Blue sapphire</option>
                    <option value='#98817B'>Cinereous</option>
                    <option value='#87421F'>Fuzzy Wuzzy</option>
                    <option value='#86608E'>French lilac</option>
                    <option value='#81613C'>Coyote brown</option>
                    <option value='#79443B'>Bole</option>
                    <option value='#58427C'>Cyber grape</option>
                    <option value='#54626F'>Black coral</option>
                    <option value='#36454F'>Charcoal</option>
                    <option value='#9966CC'>Amethyst</option>
                    <option value='#9932CC'>Dark orchid</option>
                    <option value='#9400D3'>Dark violet</option>
                    <option value='#8806CE'>French violet</option>
                    <option value='#6699CC'>Blue-gray (Crayola)</option>
                    <option value='#6495ED'>Cornflower blue</option>
                    <option value='#006400'>Dark green (X11)</option>
                    <option value='#5072A7'>Blue yonder</option>
                    <option value='#2243B6'>Denim blue</option>
                    <option value='#1560BD'>Denim</option>
                    <option value='#915C83'>Antique fuchsia</option>
                    <option value='#893F45'>Cordovan</option>
                    <option value='#856D4D'>French bistre</option>
                    <option value='#841B2D'>Antique ruby</option>
                    <option value='#665D1E'>Antique bronze</option>
                    <option value='#563C5C'>English violet</option>
                    <option value='#556B2F'>Dark olive green</option>
                    <option value='#555D50'>Ebony</option>
                    <option value='#543D37'>Dark liver (horses)</option>
                    <option value='#483D8B'>Dark slate blue</option>
                    <option value='#483C32'>Dark lava</option>
                    <option value='#318CE7'>Bleu de France</option>
                    <option value='#228B22'>Forest green (web)</option>
                    <option value='#96C8A2'>Eton blue</option>
                    <option value='#0093AF'>Blue (Munsell)</option>
                    <option value='#91A3B0'>Cadet grey</option>
                    <option value='#89CFF0'>Baby blue</option>
                    <option value='#0087BD'>Blue (NCS)</option>
                    <option value='#80FF00'>Chartreuse (web)</option>
                    <option value='#77B5FE'>French sky blue</option>
                    <option value='#0072BB'>French blue</option>
                    <option value='#72A0C1'>Air superiority blue</option>
                    <option value='#56A0D3'>Carolina blue</option>
                    <option value='#50C878'>Emerald</option>
                    <option value='#0048BA'>Absolute Zero</option>
                    <option value='#0018A8'>Blue (Pantone)</option>
                    <option value='#9FA91F'>Citron</option>
                    <option value='#9F8170'>Beaver</option>
                    <option value='#9F2B68'>Amaranth deep purple</option>
                    <option value='#9EFD38'>French lime</option>
                    <option value='#9E1B32'>Crimson (UA)</option>
                    <option value='#9C2542'>Big dip o’ruby</option>
                    <option value='#00009C'>Duke blue</option>
                    <option value='#8FBC8F'>Dark sea green</option>
                    <option value='#8F00FF'>Electric violet</option>
                    <option value='#8CBED6'>Dark sky blue</option>
                    <option value='#8C92AC'>Cool grey</option>
                    <option value='#008B8B'>Dark cyan</option>
                    <option value='#8B008B'>Dark magenta</option>
                    <option value='#8B0000'>Dark red</option>
                    <option value='#8A3324'>Burnt umber</option>
                    <option value='#8A2BE2'>Blue-violet</option>
                    <option value='#7FFFD4'>Aquamarine</option>
                    <option value='#007FFF'>Azure</option>
                    <option value='#7F1734'>Claret</option>
                    <option value='#7E5E60'>Deep taupe</option>
                    <option value='#7CB9E8'>Aero</option>
                    <option value='#7C0A02'>Barn red</option>
                    <option value='#7BB661'>Bud green</option>
                    <option value='#007BA7'>Cerulean</option>
                    <option value='#7B3F00'>Chocolate (traditional)</option>
                    <option value='#6F4E37'>Coffee</option>
                    <option value='#6D9BC3'>Cerulean frost</option>
                    <option value='#6C3082'>Eminence</option>
                    <option value='#6C541E'>Field drab</option>
                    <option value='#006B3C'>Cadmium green</option>
                    <option value='#5F9EA0'>Cadet blue</option>
                    <option value='#5DADEC'>Blue jeans</option>
                    <option value='#5D3954'>Dark byzantium</option>
                    <option value='#4F7942'>Fern green</option>
                    <option value='#4B3621'>Café noir</option>
                    <option value='#004B49'>Deep jungle green</option>
                    <option value='#4B6F44'>Artichoke green</option>
                    <option value='#4A646C'>Deep Space Sparkle</option>
                    <option value='#4A412A'>Drab dark brown</option>
                    <option value='#3DDC84'>Android green</option>
                    <option value='#3D2B1F'>Bistre</option>
                    <option value='#3D0C02'>Black bean</option>
                    <option value='#3C1414'>Dark sienna</option>
                    <option value='#3C69E7'>Bluetiful</option>
                    <option value='#3B7A57'>Amazon</option>
                    <option value='#3B3C36'>Black olive</option>
                    <option value='#2F4F4F'>Dark slate gray</option>
                    <option value='#2E5894'>B'dazzled blue</option>
                    <option value='#2E2D88'>Cosmic cobalt</option>
                    <option value='#2A52BE'>Cerulean blue</option>
                    <option value='#1F75FE'>Blue (Crayola)</option>
                    <option value='#1E90FF'>Dodger blue</option>
                    <option value='#1DACD6'>Cerulean (Crayola)</option>
                    <option value='#1B1B1B'>Eerie black</option>
                    <option value='#1A2421'>Dark jungle green</option>
                    <option value='#00FFFF'>Aqua</option>
                    <option value='#00FFFF'>Cyan</option>
                    <option value='#00FF40'>Erin</option>
                    <option value='#0000FF'>Blue</option>
                    <option value='#00CED1'>Dark turquoise</option>
                    <option value='#00CC99'>Caribbean green</option>
                    <option value='#00BFFF'>Capri</option>
                    <option value='#00BFFF'>Deep sky blue</option>
                    <option value='#00B7EB'>Cyan (process)</option>
                    <option value='#000000'>Black</option>

                </select>
            </div>


        </div>
    </div>




















    <br />
    <div class='container'>
        <div class='row'>
            <h6 align='center'>Runners</h6>

            <div class='col-sm'>
                <input class='form-control' id='rs' style='height:47px;' placeholder='Runner Sizes' name='runnersize[]'>
            </div>


            <div class='col-sm'>
                <select class='form-control' id="choices-multiple-remove-buttonn" name='runnercolors[]' placeholder="Select Colors" multiple>
                    <option value='#FFFF99'>Canary</option>
                    <option value='#FFFDD0'>Cream</option>
                    <option value='#FFFAF0'>Floral white</option>
                    <option value='#FFF8E7'>Cosmic latte</option>
                    <option value='#FFF8DC'>Cornsilk</option>
                    <option value='#FFEF00'>Canary yellow</option>
                    <option value='#FFEBCD'>Blanched almond</option>
                    <option value='#FFE4C4'>Bisque</option>
                    <option value='#FFD300'>Cyber yellow</option>
                    <option value='#FFC680'>Buff</option>
                    <option value='#FFBF00'>Amber</option>
                    <option value='#FFBCD9'>Cotton candy</option>
                    <option value='#FFB200'>Chinese yellow</option>
                    <option value='#FFB7C5'>Cherry blossom pink</option>
                    <option value='#FFAA1D'>Bright yellow (Crayola)</option>
                    <option value='#FFA6C9'>Carnation pink</option>
                    <option value='#FF9966'>Atomic tangerine</option>
                    <option value='#FF9933'>Deep saffron</option>
                    <option value='#FF5470'>Fiery rose</option>
                    <option value='#FF3800'>Coquelicot</option>
                    <option value='#FF1493'>Deep pink</option>
                    <option value='#FF91AF'>Baker-Miller pink</option>
                    <option value='#FF8C00'>Dark orange</option>
                    <option value='#FF7F50'>Coral</option>
                    <option value='#FF00FF'>Fuchsia</option>
                    <option value='#FEFEFA'>Baby powder</option>
                    <option value='#FDEE00'>Aureolin</option>
                    <option value='#FD6C9E'>French pink</option>
                    <option value='#FD3F92'>French fuchsia</option>
                    <option value='#FBEC5D'>Corn</option>
                    <option value='#FBCEB1'>Apricot</option>
                    <option value='#FAEBD7'>Antique white</option>
                    <option value='#FAE7B5'>Banana Mania</option>
                    <option value='#FAD6A5'>Deep champagne</option>
                    <option value='#F88379'>Congo pink</option>
                    <option value='#F88379'>Coral pink</option>
                    <option value='#F56FA1'>Cyclamen</option>
                    <option value='#F19CBB'>Amaranth pink</option>
                    <option value='#F7E7CE'>Champagne</option>
                    <option value='#F5F5F5'>Cultured</option>
                    <option value='#F5F5DC'>Beige</option>
                    <option value='#F4C2C2'>Baby pink</option>
                    <option value='#F1DDCF'>Champagne pink</option>
                    <option value='#F0FFFF'>Azure (X11/web color)</option>
                    <option value='#F0F8FF'>Alice blue</option>
                    <option value='#F0EAD6'>Eggshell</option>
                    <option value='#EFDFBB'>Dutch white</option>
                    <option value='#EFDECD'>Almond</option>
                    <option value='#EFBBCC'>Cameo pink</option>
                    <option value='#EEDC82'>Flax</option>
                    <option value='#EDC9AF'>Desert sand</option>
                    <option value='#ED9121'>Carrot orange</option>
                    <option value='#ED872D'>Cadmium orange</option>
                    <option value='#E97451'>Burnt sienna</option>
                    <option value='#E48400'>Fulvous</option>
                    <option value='#E34234'>Cinnabar</option>
                    <option value='#E25822'>Flame</option>
                    <option value='#E9967A'>Dark salmon</option>
                    <option value='#E4717A'>Candy pink</option>
                    <option value='#E936A7'>Frostbite</option>
                    <option value='#E68FAC'>Charm pink</option>
                    <option value='#E23D28'>Chili red</option>
                    <option value='#E9D66B'>Arylide yellow</option>
                    <option value='#E5AA70'>Fawn</option>
                    <option value='#E4D00A'>Citrine</option>
                    <option value='#E3DAC9'>Bone</option>
                    <option value='#DEB887'>Burlywood</option>
                    <option value='#DE5285'>Fandango pink</option>
                    <option value='#DE3163'>Cerise</option>
                    <option value='#DE6FA1'>China pink</option>
                    <option value='#DE5D83'>Blush</option>
                    <option value='#DC143C'>Crimson</option>
                    <option value='#DB2D43'>Alizarin</option>
                    <option value='#DA3287'>Deep cerise</option>
                    <option value='#DA8A67'>Copper (Crayola)</option>
                    <option value='#D70040'>Carmine (M&P)</option>
                    <option value='#D2691E'>Chocolate (web)</option>
                    <option value='#D891EF'>Bright lilac</option>
                    <option value='#D473D4'>French mauve</option>
                    <option value='#D0FF14'>Arctic lime</option>
                    <option value='#CE2029'>Fire engine red</option>
                    <option value='#CD9575'>Antique brass</option>
                    <option value='#CD607E'>Cinnamon Satin</option>
                    <option value='#CD7F32'>Bronze</option>
                    <option value='#CCFF00'>Electric lime</option>
                    <option value='#CC5500'>Burnt orange</option>
                    <option value='#CC474B'>English vermillion</option>
                    <option value='#CB4154'>Brick red</option>
                    <option value='#CB6D51'>Copper red</option>
                    <option value='#CAE00D'>Bitter lemon</option>
                    <option value='#C46210'>Alloy orange</option>
                    <option value='#C32148'>Bright maroon</option>
                    <option value='#C154C1'>Fuchsia (Crayola)</option>
                    <option value='#C95A49'>Cedar Chest</option>
                    <option value='#C72C48'>French raspberry</option>
                    <option value='#C41E3A'>Cardinal</option>
                    <option value='#C19A6B'>Camel</option>
                    <option value='#C19A6B'>Desert</option>
                    <option value='#C19A6B'>Fallow</option>
                    <option value='#C2B280'>Ecru</option>
                    <option value='#BFAFB2'>Black Shadows</option>
                    <option value='#BF00FF'>Electric purple</option>
                    <option value='#BDB76B'>Dark khaki</option>
                    <option value='#BD33A4'>Byzantine</option>
                    <option value='#BCD4E6'>Beau blue</option>
                    <option value='#B87333'>Copper</option>
                    <option value='#B53389'>Fandango</option>
                    <option value='#B48395'>English lavender</option>
                    <option value='#B22222'>Firebrick</option>
                    <option value='#B8860B'>Dark goldenrod</option>
                    <option value='#B284BE'>African violet</option>
                    <option value='#B94E48'>Deep chestnut</option>
                    <option value='#B31B1B'>Carnelian</option>
                    <option value='#B9D9EB'>Columbia Blue</option>
                    <option value='#B2FFFF'>Celeste</option>
                    <option value='#B2BEB5'>Ash gray</option>
                    <option value='#B0BF1A'>Acid green</option>
                    <option value='#AF6E4D'>Brown sugar</option>
                    <option value='#AD6F69'>Copper penny</option>
                    <option value='#ACE5EE'>Blizzard blue</option>
                    <option value='#ACE1AF'>Celadon</option>
                    <option value='#AB274F'>Amaranth purple</option>
                    <option value='#AB4B52'>English red</option>
                    <option value='#AA381E'>Chinese red</option>
                    <option value='#A57164'>Blast-off bronze</option>
                    <option value='#A2006D'>Flirt</option>
                    <option value='#A67B5B'>Café au lait</option>
                    <option value='#A67B5B'>French beige</option>
                    <option value='#A17A74'>Burnished brown</option>
                    <option value='#A3C1AD'>Cambridge blue</option>
                    <option value='#A2A2D0'>Blue bell</option>
                    <option value='#A1CAF1'>Baby blue eyes</option>
                    <option value='#996666'>Copper rose</option>
                    <option value='#967117'>Bistre brown</option>
                    <option value='#967117'>Drab</option>
                    <option value='#960018'>Carmine</option>
                    <option value='#954535'>Chestnut</option>
                    <option value='#856088'>Chinese violet</option>
                    <option value='#848482'>Battleship grey</option>
                    <option value='#801818'>Falu red</option>
                    <option value='#800020'>Burgundy</option>
                    <option value='#703642'>Catawba</option>
                    <option value='#702963'>Byzantium</option>
                    <option value='#696969'>Dim gray</option>
                    <option value='#683068'>Finn</option>
                    <option value='#660000'>Blood red</option>
                    <option value='#654321'>Dark brown</option>
                    <option value='#614051'>Eggplant</option>
                    <option value='#555555'>Davy's grey</option>
                    <option value='#536878'>Dark electric blue</option>
                    <option value='#333399'>Blue (pigment)</option>
                    <option value='#301934'>Dark purple</option>
                    <option value='#177245'>Dark spring green</option>
                    <option value='#126180'>Blue sapphire</option>
                    <option value='#98817B'>Cinereous</option>
                    <option value='#87421F'>Fuzzy Wuzzy</option>
                    <option value='#86608E'>French lilac</option>
                    <option value='#81613C'>Coyote brown</option>
                    <option value='#79443B'>Bole</option>
                    <option value='#58427C'>Cyber grape</option>
                    <option value='#54626F'>Black coral</option>
                    <option value='#36454F'>Charcoal</option>
                    <option value='#9966CC'>Amethyst</option>
                    <option value='#9932CC'>Dark orchid</option>
                    <option value='#9400D3'>Dark violet</option>
                    <option value='#8806CE'>French violet</option>
                    <option value='#6699CC'>Blue-gray (Crayola)</option>
                    <option value='#6495ED'>Cornflower blue</option>
                    <option value='#006400'>Dark green (X11)</option>
                    <option value='#5072A7'>Blue yonder</option>
                    <option value='#2243B6'>Denim blue</option>
                    <option value='#1560BD'>Denim</option>
                    <option value='#915C83'>Antique fuchsia</option>
                    <option value='#893F45'>Cordovan</option>
                    <option value='#856D4D'>French bistre</option>
                    <option value='#841B2D'>Antique ruby</option>
                    <option value='#665D1E'>Antique bronze</option>
                    <option value='#563C5C'>English violet</option>
                    <option value='#556B2F'>Dark olive green</option>
                    <option value='#555D50'>Ebony</option>
                    <option value='#543D37'>Dark liver (horses)</option>
                    <option value='#483D8B'>Dark slate blue</option>
                    <option value='#483C32'>Dark lava</option>
                    <option value='#318CE7'>Bleu de France</option>
                    <option value='#228B22'>Forest green (web)</option>
                    <option value='#96C8A2'>Eton blue</option>
                    <option value='#0093AF'>Blue (Munsell)</option>
                    <option value='#91A3B0'>Cadet grey</option>
                    <option value='#89CFF0'>Baby blue</option>
                    <option value='#0087BD'>Blue (NCS)</option>
                    <option value='#80FF00'>Chartreuse (web)</option>
                    <option value='#77B5FE'>French sky blue</option>
                    <option value='#0072BB'>French blue</option>
                    <option value='#72A0C1'>Air superiority blue</option>
                    <option value='#56A0D3'>Carolina blue</option>
                    <option value='#50C878'>Emerald</option>
                    <option value='#0048BA'>Absolute Zero</option>
                    <option value='#0018A8'>Blue (Pantone)</option>
                    <option value='#9FA91F'>Citron</option>
                    <option value='#9F8170'>Beaver</option>
                    <option value='#9F2B68'>Amaranth deep purple</option>
                    <option value='#9EFD38'>French lime</option>
                    <option value='#9E1B32'>Crimson (UA)</option>
                    <option value='#9C2542'>Big dip o’ruby</option>
                    <option value='#00009C'>Duke blue</option>
                    <option value='#8FBC8F'>Dark sea green</option>
                    <option value='#8F00FF'>Electric violet</option>
                    <option value='#8CBED6'>Dark sky blue</option>
                    <option value='#8C92AC'>Cool grey</option>
                    <option value='#008B8B'>Dark cyan</option>
                    <option value='#8B008B'>Dark magenta</option>
                    <option value='#8B0000'>Dark red</option>
                    <option value='#8A3324'>Burnt umber</option>
                    <option value='#8A2BE2'>Blue-violet</option>
                    <option value='#7FFFD4'>Aquamarine</option>
                    <option value='#007FFF'>Azure</option>
                    <option value='#7F1734'>Claret</option>
                    <option value='#7E5E60'>Deep taupe</option>
                    <option value='#7CB9E8'>Aero</option>
                    <option value='#7C0A02'>Barn red</option>
                    <option value='#7BB661'>Bud green</option>
                    <option value='#007BA7'>Cerulean</option>
                    <option value='#7B3F00'>Chocolate (traditional)</option>
                    <option value='#6F4E37'>Coffee</option>
                    <option value='#6D9BC3'>Cerulean frost</option>
                    <option value='#6C3082'>Eminence</option>
                    <option value='#6C541E'>Field drab</option>
                    <option value='#006B3C'>Cadmium green</option>
                    <option value='#5F9EA0'>Cadet blue</option>
                    <option value='#5DADEC'>Blue jeans</option>
                    <option value='#5D3954'>Dark byzantium</option>
                    <option value='#4F7942'>Fern green</option>
                    <option value='#4B3621'>Café noir</option>
                    <option value='#004B49'>Deep jungle green</option>
                    <option value='#4B6F44'>Artichoke green</option>
                    <option value='#4A646C'>Deep Space Sparkle</option>
                    <option value='#4A412A'>Drab dark brown</option>
                    <option value='#3DDC84'>Android green</option>
                    <option value='#3D2B1F'>Bistre</option>
                    <option value='#3D0C02'>Black bean</option>
                    <option value='#3C1414'>Dark sienna</option>
                    <option value='#3C69E7'>Bluetiful</option>
                    <option value='#3B7A57'>Amazon</option>
                    <option value='#3B3C36'>Black olive</option>
                    <option value='#2F4F4F'>Dark slate gray</option>
                    <option value='#2E5894'>B'dazzled blue</option>
                    <option value='#2E2D88'>Cosmic cobalt</option>
                    <option value='#2A52BE'>Cerulean blue</option>
                    <option value='#1F75FE'>Blue (Crayola)</option>
                    <option value='#1E90FF'>Dodger blue</option>
                    <option value='#1DACD6'>Cerulean (Crayola)</option>
                    <option value='#1B1B1B'>Eerie black</option>
                    <option value='#1A2421'>Dark jungle green</option>
                    <option value='#00FFFF'>Aqua</option>
                    <option value='#00FFFF'>Cyan</option>
                    <option value='#00FF40'>Erin</option>
                    <option value='#0000FF'>Blue</option>
                    <option value='#00CED1'>Dark turquoise</option>
                    <option value='#00CC99'>Caribbean green</option>
                    <option value='#00BFFF'>Capri</option>
                    <option value='#00BFFF'>Deep sky blue</option>
                    <option value='#00B7EB'>Cyan (process)</option>
                    <option value='#000000'>Black</option>

                </select>
            </div>


        </div>
    </div>

















    <br />
    <div class='container'>
        <div class='row'>
            <h6 align='center'>Center Pieces</h6>
            <div class='col-sm'>
                <select style='height:47px;' class='form-select' id='centerpieces' name='centerpieces'>
                    <option selected disabled>Center Pieces Available?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>

            </div>
            <div style='display:none;' id='cptypes' class='col-sm'>
                <input class='form-control' id='choices-multiple-remove-buttonbn' placeholder='Center Piece Types' name='centerpiecetypes[]'>
            </div>
            <div style='display:none;' id='cpsizes' class='col-sm'>
                <input class='form-control' id='choices-multiple-remove-buttonbnb' placeholder='Center Piece Sizes' name='centerpiecesizes[]'>
            </div>
        </div>
    </div>



    <script>
        $("#centerpieces").change(function() {

            var cps = document.getElementById('centerpieces').value;


            if (cps == 'Yes') {

                document.getElementById('choices-multiple-remove-buttonbn').value = '';
                document.getElementById('choices-multiple-remove-buttonbnb').value = '';
                document.getElementById('cptypes').style.display = 'block';
                document.getElementById('cpsizes').style.display = 'block';

            } else {

                document.getElementById('choices-multiple-remove-buttonbn').value = '';
                document.getElementById('choices-multiple-remove-buttonbnb').value = '';
                //document.getElementById('cptypes').style.display='none';
                //document.getElementById('cpsizes').style.display='none';

            }




        });
    </script>




    <br />
    <div class='container'>
        <div class='row'>

            <div class='col-sm'>
                <input class='form-control' list='avails' placeholder='Venue Availability Prior to Event' name='venueavailabilityprior'>
            </div>
            <datalist id='avails'>
                <option>1 Hour</option>
                <option>2 Hours</option>
                <option>1 Day</option>
            </datalist>
            <div class='col-sm'>
                <input class='form-control' placeholder='Accessibility Timing' name='accessibilitytimming'>
            </div>
        </div>
    </div>






    <br />
    <div class='container'>
        <div class='row'>

            <div class="form-group">
                <label>Conference packaging inclusions</label><br />




                <?php
                $sqlv = "SELECT * FROM venueconferencepackaginginclusions";
                $resultv = $conn->query($sqlv);

                if ($resultv->num_rows > 0) {
                    // output data of each row
                    while ($rowv = $resultv->fetch_assoc()) {
                ?>
                        <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                        <input name='conferencepackaginginclusions[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                        &nbsp;&nbsp; &nbsp;&nbsp;

                <?php
                    }
                }
                ?>







                <nonsense id='addnc2'>

                </nonsense>


                <input type='submit' id='pds2' class='btn btn-danger' onclick='addcardnew2()' value='+'>

            </div>



        </div>
    </div>











    <br />
    <div class='container'>
        <div class='row'>
            <label>AVR Inclusions</label>



            <div class='col-sm'>
                <select class='form-select' name='mixer'>
                    <option selected disabled>Mixer?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

        </div>
    </div>



    <br />
    <div class='container'>
        <div class='row'>
            <label>Mic</label>

            <div class='col-sm'>
                <select id='mic' class='form-select' name='mic'>
                    <option selected disabled>Mic?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <div id='mictype' style='display:none;' class='col-sm'>
                <input class='form-control' id='mctpe' placeholder='Mic Type' name='mictype'>
            </div>
            <div id='chargedfreemic' style='display:none;' class='col-sm'>
                <select class='form-select' name='chargedfreemic'>
                    <option selected disabled>Charged/Free?</option>
                    <option>Charged</option>
                    <option>Free</option>
                </select>
            </div>
        </div>
    </div>







    <script>
        $("#mic").change(function() {

            var mic = document.getElementById('mic').value;


            if (mic == 'Yes') {
                document.getElementById('mictype').style.display = 'block';
                document.getElementById('chargedfreemic').style.display = 'block';
            } else {
                document.getElementById('mictype').style.display = 'none';
                document.getElementById('chargedfreemic').style.display = 'none';
                document.getElementById('mctpe').value = '';

            }


        });
    </script>











    <br />
    <div class='container'>
        <div class='row'>
            <label>Projector</label>

            <div class='col-sm'>
                <select id='projector' class='form-select' name='projector'>
                    <option selected disabled>Projector?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <div id='projectortype' style='display:none;' class='col-sm'>
                <input class='form-control' id='projectortpe' placeholder='Projector Type' name='projectortype'>
            </div>
            <div id='projectorlumens' style='display:none;' class='col-sm'>
                <input class='form-control' id='projectorlmns' placeholder='Lumens' name='projectorlumens'>
            </div>
            <div id='mobilemounted' style='display:none;' class='col-sm'>
                <select class='form-select' name='mobilemounted'>
                    <option selected disabled>Mobile/Mounted?</option>
                    <option>Mobile</option>
                    <option>Mounted</option>
                </select>
            </div>


            <div id='backfront' style='display:none;' class='col-sm'>
                <select class='form-select' name='backfront'>
                    <option selected disabled>Back/Front Projection?</option>
                    <option>Back Projection</option>
                    <option>Front Projection</option>
                </select>
            </div>


        </div>
    </div>







    <script>
        $("#projector").change(function() {

            var mic = document.getElementById('projector').value;


            if (mic == 'Yes') {
                document.getElementById('projectortype').style.display = 'block';
                document.getElementById('projectorlumens').style.display = 'block';
                document.getElementById('mobilemounted').style.display = 'block';
                document.getElementById('backfront').style.display = 'block';
            } else {
                document.getElementById('projectortype').style.display = 'none';
                document.getElementById('projectorlumens').style.display = 'none';
                document.getElementById('mobilemounted').style.display = 'none';
                document.getElementById('backfront').style.display = 'none';
                document.getElementById('projectorlmns').value = '';
                document.getElementById('projectortpe').value = '';

            }


        });
    </script>























    <br />
    <div class='container'>
        <div class='row'>
            <label>Speakers</label>

            <div class='col-sm'>
                <select id='speakers' class='form-select' name='speakers'>
                    <option selected disabled>Speakers?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <div id='speakertype' style='display:none;' class='col-sm'>
                <input class='form-control' id='sptpe' placeholder='Speaker Type' name='speakertype'>
            </div>
            <div id='decibels' style='display:none;' class='col-sm'>
                <input class='form-control' id='dcbls' placeholder='Decibels' name='decibels'>
            </div>
        </div>
    </div>







    <script>
        $("#speakers").change(function() {

            var mic = document.getElementById('speakers').value;


            if (mic == 'Yes') {
                document.getElementById('speakertype').style.display = 'block';
                document.getElementById('decibels').style.display = 'block';
            } else {
                document.getElementById('speakertype').style.display = 'none';
                document.getElementById('decibels').style.display = 'none';
                document.getElementById('sptpe').value = '';
                document.getElementById('dcbls').value = '';

            }


        });
    </script>








    <br />
    <div class='container'>
        <div class='row'>
            <label>Welcome Carpet</label>

            <div class='col-sm'>
                <select id='welcomecarpet' class='form-select' name='welcomecarpet'>
                    <option selected disabled>Welcome Carpet?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>


        </div>
    </div>








    <br />
    <div class='container'>
        <div class='row'>
            <label>Dance Floor</label>

            <div class='col-sm'>
                <select id='dancefloor' class='form-select' name='dancefloor'>
                    <option selected disabled>Dance Floor?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <div id='dancefloorsize' style='display:none;' class='col-sm'>
                <input class='form-control' id='dancesize' placeholder='Size' name='dancefloorsize'>
            </div>

            <div id='dancefloormaterial' style='display:none;' class='col-sm'>
                <input class='form-control' id='dancematerial' placeholder='Material' name='dancefloormaterial'>
            </div>
            <datalist id='mtrl'>
                <option>Wooden</option>
                <option>LED</option>
            </datalist>

            <div id='dancefloorcost' style='display:none;' class='col-sm'>
                <input class='form-control' id='dancecost' placeholder='Cost' name='dancefloorcost'>
            </div>


        </div>
    </div>






    <script>
        $("#dancefloor").change(function() {

            var dancefloor = document.getElementById('dancefloor').value;


            if (dancefloor == 'Yes') {
                document.getElementById('dancefloorsize').style.display = 'block';
                document.getElementById('dancefloormaterial').style.display = 'block';
                document.getElementById('dancefloorcost').style.display = 'block';
                document.getElementById('sktng').style.display = 'block';



            } else {
                document.getElementById('dancefloorsize').style.display = 'none';
                document.getElementById('dancefloormaterial').style.display = 'none';
                document.getElementById('dancefloorcost').style.display = 'none';
                document.getElementById('sktng').style.display = 'none';
                document.getElementById('dancematerial').value = '';
                document.getElementById('dancesize').value = '';
                document.getElementById('dancecost').value = '';


            }


        });
    </script>





    <br />
    <div id='sktng' style='display:none;' class='container'>
        <div class='row'>
            <label>Skirting</label>

            <div class='col-sm'>
                <select id='skirting' class='form-select' name='skirting'>
                    <option selected disabled>Skirting?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <div id='skirtingsize' style='display:none;' class='col-sm'>
                <input class='form-control' id='skirtingsize' placeholder='Size' name='skirtingsize'>
            </div>

            <div id='skirtingpodium' style='display:none;' class='col-sm'>
                <input class='form-control' id='podium' placeholder='Podium' name='skirtingpodium'>
            </div>



        </div>
    </div>






    <script>
        $("#skirting").change(function() {

            var skirting = document.getElementById('skirting').value;


            if (skirting == 'Yes') {
                document.getElementById('skirtingsize').style.display = 'block';
                document.getElementById('skirtingpodium').style.display = 'block';
            } else {
                document.getElementById('skirtingsize').style.display = 'none';
                document.getElementById('skirtingpodium').style.display = 'none';
                document.getElementById('podium').value = '';
                document.getElementById('skirtingsize').value = '';


            }


        });
    </script>








    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select class='form-select' name='naturaldaylight'>
                    <option selected disabled>Natural Daylight?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>

            </div>
            <div class='col-sm'>
                <input class='form-control' placeholder='Ceiling Height' name='ceilingheight'>
            </div>
            <div class='col-sm'>
                <input class='form-control' placeholder='Door Width Height' name='doorwidthheight'>
            </div>
        </div>
    </div>

    <br />








    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select class='form-select' name='carlaunch'>
                    <option selected disabled>Car Launch Possible?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
                <small style='color:red;'>*Vehicles can be displayed in Ballroom / Foyer*</small>
            </div>

            <div class='col-sm'>
                <input class='form-control' placeholder='Max Vehicle Size' name='vehiclewidthheight'>

            </div>
        </div>
    </div>








    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <select class='form-select' name='smoking'>
                    <option selected disabled>Smoking / Non Smoking?</option>
                    <option>Non Smoking</option>
                    <option>Smoking</option>
                </select>

            </div>

            <div class='col-sm'>
                <input class='form-control' placeholder='Social Distance' name='socialdistance'>
                <small>Last Renovated On</small>
            </div>
        </div>
    </div>





    <div class='container'>
        <div class='row'>
            <div class='col-sm'>

                <input class='form-control' placeholder='Event Venue Address' name='venueaddress'>
            </div>
            <div class='col-sm'>

                <input class='form-control' type='date' name='lastrenovated'>
            </div>



        </div>
    </div>







    <br />
    <div class='container'>
        <div class='row'>
            <div class='col-sm'>
                <input class='form-control' placeholder='Venue Rating' name='venuerating'>
            </div>
            <div class='col-sm'>
                <select class='form-select' name='outdoorindoor'>
                    <option selected disabled>Outdoor / Indoor Venue?</option>
                    <option>Outdoor</option>
                    <option>Indoor</option>
                </select>
            </div>



        </div>
    </div>


    <br />
    <div class='container'>
        <div class='row'>

            <div class="form-group">
                <label>Past Events</label><br />

                <nonsense id='addnc'>

                </nonsense>


                <input type='submit' id='pds' class='btn btn-danger' onclick='addcardnew()' value='+'>

            </div>



        </div>
    </div>




    <br />
    <div class='container'>
        <div class='row'>




            <div class="form-group">
                <label>Inclusions</label><br />

                <?php
                $sqlv = "SELECT * FROM venueinclusions";
                $resultv = $conn->query($sqlv);

                if ($resultv->num_rows > 0) {
                    // output data of each row
                    while ($rowv = $resultv->fetch_assoc()) {
                ?>
                        <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                        <input id="alertcard" name='vinclusions[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                        &nbsp;&nbsp; &nbsp;&nbsp;

                <?php
                    }
                }
                ?>

                <nonsense id='vaddnc'>

                </nonsense>


                <input type='submit' id='vpds' class='btn btn-danger' onclick='vaddcardnew()' value='+'>

            </div>















        </div>
    </div>


    <br />




    <div class='container'>
        <div class='row'>
            <label><b>Theater Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='theater' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='timages[]'>
            </div>
        </div>
    </div>

    <br />
    <div class='container'>
        <div class='row'>
            <label><b>Classroom Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='classroom' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='crimages[]'>
            </div>
        </div>
    </div>

    <br />
    <div class='container'>
        <div class='row'>
            <label><b>Cabaret Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='cabaret' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='cabimages[]'>
            </div>
        </div>
    </div>
    <br />
    <div class='container'>
        <div class='row'>
            <label><b>Boardroom Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='boardroom' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='boimages[]'>
            </div>
        </div>
    </div>

    <br />
    <div class='container'>
        <div class='row'>
            <label><b>U-Shape Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='ushape' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='uimages[]'>
            </div>
        </div>
    </div>

    <br />
    <div class='container'>
        <div class='row'>
            <label><b>Banquet Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='banquet' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='banimages[]'>
            </div>
        </div>
    </div>


    <br />
    <div class='container'>
        <div class='row'>
            <label><b>Cocktail Reception Style</b></label>
            <div class='col-sm'>
                <input class='form-control' name='cocktailreception' type='number' placeholder='Max Pax'>
            </div>

            <div class='col-sm'>
                <input class='form-control' type='file' accept="image/*" multiple name='cocktailimages[]'>
            </div>
        </div>
    </div>

    <br />



    <div class='container'>
        <div class='row'>
            <label><b>Upload Work Permit</b></label>
            <div class='col-sm'>
                <input class='form-control' accept="application/pdf" name='workpermit' type='file'>
            </div>

        </div>
    </div>

    <br />

























    <!--

            <div class='container'>
                <div class='row'>
                    <div class='col-sm'>
                        <input class='form-control' type='number' onkeyup='addmeetings()' min='0' placeholder='# of Meeting Rooms' id='numberofmeetingrooms' name='numberofmeetingrooms'>
                        
                    </div>
                    <div class='col-sm'>
                        <input class='form-control' type='number'  onkeyup='addbanquets()' min='0' placeholder='# of Banquet' id='numberofbanquet' name='numberofbanquet'>
                    </div>
                    <div class='col-sm'>
                        <input class='form-control' type='number'  onkeyup='addbreakouts()' min='0' placeholder='# of Breakout Rooms' id='numberofbreakout' name='numberofbreakout'>
                    </div>
                </div>
            </div>

            <br/>
            -->

    <nonsense id='meetings'>

    </nonsense>

    <br />
    <nonsense id='banquets'>

    </nonsense>

    <br />
    <nonsense id='breakouts'>

    </nonsense>

    <br />


    <br />
    <br />


    <div class="form-group">
        <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Next</button>
    </div>

    </div>
</form>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById("vpds").addEventListener("click", function(event) {
        event.preventDefault()
    });

    function vaddcardnew() {
        var parent = document.getElementById("vaddnc");

        var inpt = document.createElement('INPUT');
        inpt.setAttribute('name', 'vinclusions[]');
        inpt.setAttribute('placeholder', 'Inclusion');
        inpt.classList.add('form-control');
        parent.appendChild(inpt);

    }
</script>


<script>
    document.getElementById("pds").addEventListener("click", function(event) {
        event.preventDefault()
    });


    document.getElementById("pds2").addEventListener("click", function(event) {
        event.preventDefault()
    });

    function addcardnew() {
        var parent = document.getElementById("addnc");

        var inpt = document.createElement('INPUT');
        inpt.setAttribute('name', 'cards[]');
        inpt.setAttribute('placeholder', 'Past Event');
        inpt.classList.add('form-control');

        parent.appendChild(inpt);

    }






    function addcardnew2() {
        var parent = document.getElementById("addnc2");

        var inpt = document.createElement('INPUT');
        inpt.setAttribute('name', 'conferencepackaginginclusions[]');
        inpt.setAttribute('placeholder', 'Conference Packaging Inclusion');
        inpt.classList.add('form-control');
        parent.appendChild(inpt);

    }
</script>

<script>
    function addmeetings() {
        var n = 0;

        var container = document.getElementById('meetings');


        container.innerHTML = '';

        var rooms = document.getElementById('numberofmeetingrooms').value;



        if (rooms == '' || rooms == '0')

        {
            container.innerHTML = '';
        } else {




            var h1 = document.createElement('h4');
            h1.setAttribute = ('align', 'center');
            h1.innerHTML = 'Meeting Rooms';


            var table = document.createElement('TABLE');
            table.classList.add('table');
            table.classList.add('table-striped');
            table.classList.add('table-bordered');


            var thead = document.createElement('thead');
            var trh = document.createElement('tr');


            var th1 = document.createElement('th');
            th1.innerHTML = 'Name';

            var th2 = document.createElement('th');
            th2.innerHTML = 'Description';

            var th3 = document.createElement('th');
            th3.innerHTML = 'Images';


            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th3);
            thead.appendChild(trh);




            var tbody = document.createElement('tbody');




            for (let i = 0; i < rooms; i++) {
                var trb = document.createElement('tr');
                var trd1 = document.createElement('td');
                var trd2 = document.createElement('td');
                var trd3 = document.createElement('td');






                var in1 = document.createElement('INPUT');

                in1.classList.add('form-control');
                in1.setAttribute('placeholder', 'Name');
                in1.setAttribute('type', 'text');
                in1.setAttribute('name', 'mnames[]');


                var in2 = document.createElement('TEXTAREA');

                in2.classList.add('form-control');
                in2.setAttribute('placeholder', 'Description');
                in2.setAttribute('name', 'mdescriptions[]');

                var in3 = document.createElement('INPUT');

                in3.classList.add('form-control');
                in3.setAttribute('type', 'file');
                in3.setAttribute('multiple', 'true');
                in3.setAttribute('name', 'mimages' + n + '[]');





                trd1.appendChild(in1);
                trd2.appendChild(in2);
                trd3.appendChild(in3);
                trb.appendChild(trd1);
                trb.appendChild(trd2);
                trb.appendChild(trd3);
                tbody.appendChild(trb);
                n = n + 1;
            }




            table.appendChild(thead);
            table.appendChild(tbody);
            container.appendChild(h1);
            container.appendChild(table);

        }

    }
</script>


<script>
    function addbanquets() {
        var n = 0;

        var container = document.getElementById('banquets');


        container.innerHTML = '';

        var rooms = document.getElementById('numberofbanquet').value;



        if (rooms == '' || rooms == '0')

        {
            container.innerHTML = '';
        } else {




            var h1 = document.createElement('h4');
            h1.setAttribute = ('align', 'center');
            h1.innerHTML = 'Banquets';


            var table = document.createElement('TABLE');
            table.classList.add('table');
            table.classList.add('table-striped');
            table.classList.add('table-bordered');


            var thead = document.createElement('thead');
            var trh = document.createElement('tr');


            var th1 = document.createElement('th');
            th1.innerHTML = 'Name';

            var th2 = document.createElement('th');
            th2.innerHTML = 'Description';

            var th3 = document.createElement('th');
            th3.innerHTML = 'Images';


            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th3);
            thead.appendChild(trh);




            var tbody = document.createElement('tbody');




            for (let i = 0; i < rooms; i++) {
                var trb = document.createElement('tr');
                var trd1 = document.createElement('td');
                var trd2 = document.createElement('td');
                var trd3 = document.createElement('td');






                var in1 = document.createElement('INPUT');

                in1.classList.add('form-control');
                in1.setAttribute('placeholder', 'Name');
                in1.setAttribute('type', 'text');
                in1.setAttribute('name', 'bnames[]');


                var in2 = document.createElement('TEXTAREA');

                in2.classList.add('form-control');
                in2.setAttribute('placeholder', 'Description');
                in2.setAttribute('name', 'bdescriptions[]');

                var in3 = document.createElement('INPUT');

                in3.classList.add('form-control');
                in3.setAttribute('type', 'file');
                in3.setAttribute('multiple', 'true');
                in3.setAttribute('name', 'bimages' + n + '[]');





                trd1.appendChild(in1);
                trd2.appendChild(in2);
                trd3.appendChild(in3);
                trb.appendChild(trd1);
                trb.appendChild(trd2);
                trb.appendChild(trd3);
                tbody.appendChild(trb);
                n = n + 1;
            }




            table.appendChild(thead);
            table.appendChild(tbody);
            container.appendChild(h1);
            container.appendChild(table);

        }

    }
</script>





<script>
    function addbreakouts() {
        var n = 0;

        var container = document.getElementById('breakouts');


        container.innerHTML = '';

        var rooms = document.getElementById('numberofbreakout').value;



        if (rooms == '' || rooms == '0')

        {
            container.innerHTML = '';
        } else {




            var h1 = document.createElement('h4');
            h1.setAttribute = ('align', 'center');
            h1.innerHTML = 'Breakout Rooms';


            var table = document.createElement('TABLE');
            table.classList.add('table');
            table.classList.add('table-striped');
            table.classList.add('table-bordered');


            var thead = document.createElement('thead');
            var trh = document.createElement('tr');


            var th1 = document.createElement('th');
            th1.innerHTML = 'Name';

            var th2 = document.createElement('th');
            th2.innerHTML = 'Location';

            var th4 = document.createElement('th');
            th4.innerHTML = 'Size';

            var th3 = document.createElement('th');
            th3.innerHTML = 'Images';


            trh.appendChild(th1);
            trh.appendChild(th2);
            trh.appendChild(th4);
            trh.appendChild(th3);
            thead.appendChild(trh);




            var tbody = document.createElement('tbody');




            for (let i = 0; i < rooms; i++) {
                var trb = document.createElement('tr');
                var trd1 = document.createElement('td');
                var trd2 = document.createElement('td');
                var trd3 = document.createElement('td');
                var trd4 = document.createElement('td');






                var in1 = document.createElement('INPUT');

                in1.classList.add('form-control');
                in1.setAttribute('placeholder', 'Name');
                in1.setAttribute('type', 'text');
                in1.setAttribute('name', 'brnames[]');


                var in2 = document.createElement('TEXTAREA');

                in2.classList.add('form-control');
                in2.setAttribute('placeholder', 'Location');
                in2.setAttribute('name', 'brlocations[]');

                var in3 = document.createElement('INPUT');

                in3.classList.add('form-control');
                in3.setAttribute('type', 'file');
                in3.setAttribute('multiple', 'true');
                in3.setAttribute('name', 'brimages' + n + '[]');


                var in4 = document.createElement('INPUT');

                in4.classList.add('form-control');
                in4.setAttribute('type', 'number');
                in4.setAttribute('name', 'brsizes[]');



                trd1.appendChild(in1);
                trd2.appendChild(in2);
                trd3.appendChild(in3);
                trd4.appendChild(in4);
                trb.appendChild(trd1);
                trb.appendChild(trd2);
                trb.appendChild(trd4);
                trb.appendChild(trd3);
                tbody.appendChild(trb);
                n = n + 1;
            }




            table.appendChild(thead);
            table.appendChild(tbody);
            container.appendChild(h1);
            container.appendChild(table);

        }

    }
</script>
<script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-buttonn', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>



    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-buttonbn', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>

    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-buttonbnb', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#rs', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#tcs', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>

    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#cs', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>



    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#rts', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#cots', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#crts', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 100,
                renderChoiceLimit: 100
            });


        });
    </script>


<?php endblock(); ?>