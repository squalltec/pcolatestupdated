<?php
session_start();
require_once('db_connection.php');

$venue = $_GET['venue'];

$hotel = $_GET['hotel'];

$country = $_GET['country'];

$city = $_GET['city'];


if (isset($_POST['submit'])) {

   
   


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

   // $welcomecarpet = $_POST['welcomecarpet'];

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
    $ampitheatre = $_POST['Ampitheatre'];






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






$tableType=$_POST['tableType'];
$tableType=implode(',',$tableType);
$tableSize=$_POST['tableSize'];
$tableSize=implode(',',$tableSize);
$tableClothType=$_POST['tableClothType'];
$tableClothType=implode(',',$tableClothType);
$tableClothAmount=$_POST['tableClothAmount'];
$tableClothAmount=implode(',',$tableClothAmount);
$tableClothSize=$_POST['tableClothSize'];
$tableClothSize=implode(',',$tableClothSize);
$chairType=$_POST['chairType'];
$chairType=implode(',',$chairType);
$chairAmount=$_POST['chairAmount'];
$chairAmount=implode(',',$chairAmount);
$chairSize=$_POST['chairSize'];
$chairSize=implode(',',$chairSize);
$runnerType=$_POST['runnerType'];
$runnerType=implode(',',$runnerType);
$runnerAmount=$_POST['runnerAmount'];
$runnerAmount=implode(',',$runnerAmount);
$runnerSize=$_POST['runnerSize'];
$runnerSize=implode(',',$runnerSize);
$centerpieceType=$_POST['centerpieceType'];
$centerpieceType=implode(',',$centerpieceType);
$centerpieceAmount=$_POST['centerpieceAmount'];
$centerpieceAmount=implode(',',$centerpieceAmount);
$centerpieceSize=$_POST['centerpieceSize'];
$centerpieceSize=implode(',',$centerpieceSize);
$carpetsType=$_POST['carpetsType'];
$carpetsType=implode(',',$carpetsType);
$carpetsAmount=$_POST['carpetsAmount'];
$carpetsAmount=implode(',',$carpetsAmount);
$carpetsSize=$_POST['carpetsSize'];
$carpetsSize=implode(',',$carpetsSize);
$stageType=$_POST['stageType'];
$stageType=implode(',',$stageType);
$stageAmount=$_POST['stageAmount'];
$stageAmount=implode(',',$stageAmount);
$stageSize=$_POST['stageSize'];
$stageSize=implode(',',$stageSize);


$skirtingtype = $_POST['skirtingType'];
$skirtingtype=implode(',',$skirtingtype);
$skirtingsize = $_POST['skirtingSize'];
$skirtingsize=implode(',',$skirtingsize);
$skirtingpodium = $_POST['skirtingPodium'];
$skirtingpodium=implode(',',$skirtingpodium);

$skirtingType2 = $_POST['skirtingType'];






$tableType2=$_POST['tableType'];

$tableClothType2=$_POST['tableClothType'];

$chairType2=$_POST['chairType'];

$runnerType2=$_POST['runnerType'];

$centerpieceType2=$_POST['centerpieceType'];

$carpetsType2=$_POST['carpetsType'];

$stageType2=$_POST['stageType'];








//tabletypes images


$ttn=0;

foreach($tableType2 as $tt)
{

    mkdir("../Venue Table Types Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Table Types Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['tableImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['tableImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['tableImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','table','$tt')");


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


$ttn=$ttn+1;

}













//tablecloths images


$ttn=0;
foreach($tableClothType2 as $tt)
{

    mkdir("../Venue Table Cloths Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Table Cloths Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['tableClothImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['tableClothImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['tableClothImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','tablecloth','$tt')");


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


$ttn=$ttn+1;

}














//chairs images


$ttn=0;
foreach($chairType2 as $tt)
{

    mkdir("../Venue Chair Types Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Chair Types Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['chairImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['chairImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['chairImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','chairs','$tt')");


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


$ttn=$ttn+1;

}















//runner images


$ttn=0;
foreach($runnerType2 as $tt)
{

    mkdir("../Venue Runners Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Runners Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['runnerImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['runnerImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['runnerImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','runner','$tt')");


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


$ttn=$ttn+1;

}







//centerpiece images


$ttn=0;
foreach($centerpieceType2 as $tt)
{

    mkdir("../Venue Centerpieces Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Centerpieces Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['centerpieceImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['centerpieceImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['centerpieceImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','centerpiece','$tt')");


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


$ttn=$ttn+1;

}



//Carpets images


$ttn=0;
foreach($carpetsType2 as $tt)
{

    mkdir("../Venue Carpets Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Carpets Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['carpetsImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['carpetsImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['carpetsImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','carpet','$tt')");


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


$ttn=$ttn+1;

}








//Stage images


$ttn=0;
foreach($stageType2 as $tt)
{

    mkdir("../Venue Stage Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Stage Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['stageImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['stageImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['stageImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','stage','$tt')");


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


$ttn=$ttn+1;

}


















//Stage images


$ttn=0;
foreach($skirtingType2 as $tt)
{

    mkdir("../Venue Skirting Images/" . $hotel . "/" . $venue. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Skirting Images/" . $hotel . "/" . $venue. "/" . $tt . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['skirtingImage'.$ttn]['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['skirtingImage'.$ttn]['name'][$id];
            $tempLocation    = $_FILES['skirtingImage'.$ttn]['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venue','$fileName','skirting','$tt')");


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


$ttn=$ttn+1;

}


    $workpermit = '';



    if (!empty($_FILES['workpermit']['name'])) {

        mkdir("../Venues Work Permits/" . $hotel . "/" . $venue, 0755, true);

        $filename2 = $_FILES['workpermit']['name'];
        $destination2 = "../Venues Work Permits/" . $hotel . "/" . $venue . "/" . $filename2;
        $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
        $file2 = $_FILES['workpermit']['tmp_name'];
        $workpermit = $filename2;

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {
        }
    }







    $sql = "UPDATE meetingbanquetplanner SET venueinfo='$venueinfo',gettinghere='$gettinghere',glance='$glance',naturaldaylight='$naturaldaylight',ceilingheight='$ceilingheight',doorwidthheight='$doorwidthheight', carlaunch='$carlaunch', vehiclewidthheight='$vehiclewidthheight', venueaddress='$venueaddress', lastrenovated='$lastrenovated',outdoorindoor='$outdoorindoor',pastevents='$pastevents',vinclusions='$vinclusions',ampitheatre='$ampitheatre',theater='$theater',classroom='$classroom',cabaret='$cabaret',boardroom='$boardroom',ushape='$ushape',banquetdinner='$banquet',cocktailreception='$cocktailreception',smoking='$smoking',socialdistance='$socialdistance',hangingpoints='$hangingpoints', numberofhanging='$numberofhanging', locationhp='$locationhp', hpaccessiblethrough='$hpaccessiblethrough', hpchargedincluded='$hpchargedincluded', availablepower='$availablepower', distancedb='$distancedb', stage='$stage', stageblocks='$stageblocks', venueavailabilityprior='$venueavailabilityprior', accessibilitytimming='$accessibilitytimming', conferencepackaginginclusions='$conferencepackaginginclusions', mixer='$mixer', mic='$mic', mictype='$mictype', chargedfreemic='$chargedfreemic', projector='$projector', projectortype='$projectortype', projectorlumens='$projectorlumens', mobilemounted='$mobilemounted', backfront='$backfront', speakers='$speakers', speakertype='$speakertype', decibels='$decibels', dancefloor='$dancefloor', dancefloorsize='$dancefloorsize', dancefloormaterial='$dancefloormaterial', dancefloorcost='$dancefloorcost',skirtingtype='$skirtingtype',skirtingpodium='$skirtingpodium',skirtingsize='$skirtingsize',workpermit='$workpermit' ,tableType='$tableType',tableSize='$tableSize',tableClothType='$tableClothType',tableClothAmount='$tableClothAmount',tableClothSize='$tableClothSize',chairType='$chairType',chairAmount='$chairAmount',chairSize='$chairSize',runnerType='$runnerType',runnerAmount='$runnerAmount',runnerSize='$runnerSize',centerpieceType='$centerpieceType',centerpieceAmount='$centerpieceAmount',centerpieceSize='$centerpieceSize',carpetsType='$carpetsType',carpetsAmount='$carpetsAmount',carpetsSize='$carpetsSize',stageType='$stageType',stageAmount='$stageAmount',stageSize='$stageSize' WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue'";

    $result = $conn->query($sql);


    if ($result === TRUE) {
        $_SESSION['alertme'] = 1;


        // echo "<script>location.replace('managehotel.php');</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }





    mkdir("../Venue Original Images/" . $hotel . "/" . $venue, 0755, true);


    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','theater')");


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



































//Ampitheatreimages





    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
    //$allowedFileType = array('jpg','png','jpeg');

    $img = array();

    $imgs = $_FILES['Ampitheatreimages']['name'];

    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

        // Loop through file items
        foreach ($imgs as $id => $val) {
            // Get files upload path
            $fileName        = $_FILES['Ampitheatreimages']['name'][$id];
            $tempLocation    = $_FILES['Ampitheatreimages']['tmp_name'][$id];
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','ampitheatre')");


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































    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','classroom')");


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







    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','cabaret')");


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












    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','boardroom')");


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









    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','ushape')");


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


    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','banquet')");


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

    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venue . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venue','$fileName','cocktail')");


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

 
}





?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Base Page Included
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
    input,
    select {
        padding: 10px 10px !important;
    }


    input[type="number"] {
        -moz-appearance: textfield !important;
    }

    input[type="number"]:hover,
    input[type="number"]:focus {
        -moz-appearance: number-input !important;
    }

    .signup-form {
        padding: 40px 40px 40px;
    }

    label.error:after {
        display: inline-block;
        position: absolute;
        content: '';
        background-image: url("data:image/svg+xml,<svg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z' clip-rule='evenodd'/></svg>");
        background-repeat: no-repeat;
        right: 20px;
        top: 40px;
        font-size: 13px;
        color: #ff1212;
    }

    input.valid {
        border: 1px solid lightgray;
    }

    .br-1 {
        border-right: 1px solid lightgray !important;
    }

    title {
        width: 110px !important;
        height: 110px !important;
    }

    h3 {
        display: block;
        text-align: center;
        padding: 20px 20px;
        font-size: 15px;
        border: 1px solid #ce3435;
    }

    h3:hover {
        background: #ce3435;
        color: white;
        cursor: pointer;
        border: 1px solid black;
    }

    .activeH3 {
        display: block;
        text-align: center;
        background: #ce3435;
        padding: 20px 20px;
        color: white;
        font-size: 15px;

    }

    .activeH3:hover {
        border: 1px solid black;
    }

    .DisableDiv {
        cursor: not-allowed !important;
    }

    
    .form-check-input {
        padding: 0px !important;
    }

    .form-check-input:checked {
        background-color: #ce3435 !important;
        border-color: #ce3435 !important;
    }

    .btn-danger {
        background-color: #ce3435 !important;
    }

    .btn-danger:hover {
        transform: scale(1.1);
    }

    .card {
        height: 100%;
    }

    .card-title {
        margin-bottom: 0.5rem;
        background: #ce3435;
        padding: 10px 8px;
        color: white;
        border-radius: 5px;
        font-size: 15px;
    }

    .card-body {
        position: relative;
        padding-bottom: 35px;
    }

    .addMoreButtom {
        padding: 0px !important;
        float: right;
        position: absolute;
        bottom: 5px;
        right: 18px;
        height: 25px;
        width: 25px;
    }

    /* .selectAllRow{
	float:right;

	} */
    .selectAllRow {
        display: flex;
        justify-content: end;
    }

    .selectAllRow .form-check .form-check-label {
        font-weight: bold !important;
        color: black;
    }

    .signup-form {
        padding: 40px 40px 40px;
    }

    fieldset {
        border: none;
        margin: 0;
        padding: 0;
    }

    .form-container {
        width: 100%;
        position: relative;
        margin: 0 auto;
        background: #fff;
        box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
        -moz-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
        -webkit-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
        -o-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
        -ms-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
        border-radius: 0px 0px 10px 10px;
        -moz-border-radius: 0px 0px 10px 10px;
        -webkit-border-radius: 0px 0px 10px 10px;
        -o-border-radius: 0px 0px 10px 10px;
        -ms-border-radius: 0px 0px 10px 10px;
        padding-bottom: 70px !important;
        padding-top: 20px !important;
    }

    legend {
        width: 100%;
        margin: 0;
        margin-bottom: 0px;
        padding: 0;
        font-size: 17px !important;
        margin-bottom: 20px;
    }

    @media (min-width: 1200px) {
        legend {
            font-size: 1.5rem;
        }

        legend {
            float: left;
            width: 100%;
            padding: 0;
            margin-bottom: .5rem;
            font-size: calc(1.275rem + .3vw);
            line-height: inherit;
        }
    }

    .icon {
        font-size: 29px;
    }


    .step-heading {
        color: rgb(206, 52, 53);
        float: left;
    }

    .step-number {
        float: right;
    }

    input,
    select,
    textarea {
        outline: none;
        appearance: unset !important;
        -moz-appearance: unset !important;
        -webkit-appearance: unset !important;
        -o-appearance: unset !important;
        -ms-appearance: unset !important;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        appearance: none !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        -o-appearance: none !important;
        -ms-appearance: none !important;
        margin: 0;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        box-shadow: none !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        -o-box-shadow: none !important;
        -ms-box-shadow: none !important;
    }

    /* input[type=checkbox] {
        appearance: checkbox !important;
        -moz-appearance: checkbox !important;
        -webkit-appearance: checkbox !important;
        -o-appearance: checkbox !important;
        -ms-appearance: checkbox !important;
    } */

    input[type=radio] {
        appearance: radio !important;
        -moz-appearance: radio !important;
        -webkit-appearance: radio !important;
        -o-appearance: radio !important;
        -ms-appearance: radio !important;
    }

    input,
    select,
    textarea {
        box-sizing: border-box;
        display: block;
        width: 100%;
        border: 1px solid lightgray;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        font-family: Roboto, sans-serif !important;
        font-size: 13px;
        padding: 10px 10px;
        background-color: white;
    }

    input:focus {
        border: 1px solid #666;
    }

    input.valid {
        border: 1px solid #666;
    }
</style>
<style>
    .Contentbodies {
        display: none;
        position: relative;
    }

    .pointerNone {
        pointer-events: none;
    }

    .activeCB {
        display: block;
    }
</style>
<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>










<?php


$sql ="SELECT * FROM meetingbanquetplanner WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      $area= $row['area'];
      $dimension= $row['dimension'];
      $location= $row['location'];
      $ampitheatre= $row['ampitheatre'];
      $theater= $row['theater'];
      $classroom= $row['classroom'];
      $cabaret= $row['cabaret'];
      $boardroom= $row['boardroom'];
      $ushape= $row['ushape'];
      $banquetdinner= $row['banquetdinner'];
      
      
      
  $cocktailreception=$row['cocktailreception'];    $venueinfo=$row['venueinfo'];    $gettinghere=$row['gettinghere'];    $glance=$row['glance'];    $naturaldaylight=$row['naturaldaylight'];    $ceilingheight=$row['ceilingheight'];    $doorwidthheight=$row['doorwidthheight'];    $carlaunch=$row['carlaunch'];    $vehiclewidthheight=$row['vehiclewidthheight'];    $venueaddress=$row['venueaddress'];    $lastrenovated=$row['lastrenovated'];    $venuerating=$row['venuerating'];    $outdoorindoor=$row['outdoorindoor'];    $pastevents=$row['pastevents'];    $vinclusions=$row['vinclusions'];    $numberofmeetingrooms=$row['numberofmeetingrooms'];    $numberofbanquet=$row['numberofbanquet'];    $numberofbreakout=$row['numberofbreakout'];    $mnames=$row['mnames'];    $mdescriptions=$row['mdescriptions'];    $bnames=$row['bnames'];    $bdescriptions=$row['bdescriptions'];    $brnames=$row['brnames'];    $brlocations=$row['brlocations'];    $brsizes=$row['brsizes'];    $smoking=$row['smoking'];    $socialdistance=$row['socialdistance'];    $type=$row['type'];    $hangingpoints=$row['hangingpoints'];    $numberofhanging=$row['numberofhanging'];    $locationhp=$row['locationhp'];    $hpaccessiblethrough=$row['hpaccessiblethrough'];    $hpchargedincluded=$row['hpchargedincluded'];    $availablepower=$row['availablepower'];    $distancedb=$row['distancedb'];    $stage=$row['stage'];    $stageblocks=$row['stageblocks'];    $venueavailabilityprior=$row['venueavailabilityprior'];    $accessibilitytimming=$row['accessibilitytimming'];    $conferencepackaginginclusions=$row['conferencepackaginginclusions'];    $mixer=$row['mixer'];    $mic=$row['mic'];    $mictype=$row['mictype'];    $chargedfreemic=$row['chargedfreemic'];    $projector=$row['projector'];    $projectortype=$row['projectortype'];    $projectorlumens=$row['projectorlumens'];    $mobilemounted=$row['mobilemounted'];    $backfront=$row['backfront'];    $speakers=$row['speakers'];    $speakertype=$row['speakertype'];    $decibels=$row['decibels'];    $welcomecarpet=$row['welcomecarpet'];    $dancefloor=$row['dancefloor'];    $dancefloorsize=$row['dancefloorsize'];    $dancefloormaterial=$row['dancefloormaterial'];    $dancefloorcost=$row['dancefloorcost'];    $workpermit=$row['workpermit'];    $skirtingtype=$row['skirtingtype'];    $skirtingsize=$row['skirtingsize'];    $skirtingpodium=$row['skirtingpodium'];    $tableType=$row['tableType'];    $tableSize=$row['tableSize'];    $tableClothType=$row['tableClothType'];    $tableClothAmount=$row['tableClothAmount'];    $tableClothSize=$row['tableClothSize'];    $chairType=$row['chairType'];    $chairAmount=$row['chairAmount'];    $chairSize=$row['chairSize'];    $runnerType=$row['runnerType'];    $runnerAmount=$row['runnerAmount'];    $runnerSize=$row['runnerSize'];    $centerpieceType=$row['centerpieceType'];    $centerpieceAmount=$row['centerpieceAmount'];    $centerpieceSize=$row['centerpieceSize'];    $carpetsType=$row['carpetsType'];    $carpetsAmount=$row['carpetsAmount'];    $carpetsSize=$row['carpetsSize'];    $stageType=$row['stageType'];    $stageAmount=$row['stageAmount'];    $stageSize=$row['stageSize'];
      
      
  }
}


?>




















<form action="#" method="post" enctype="multipart/form-data">
    <h4><?php echo $venue;?></h4>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead activeH3" id="step1Head" onclick="ChangeFormStep('step1')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 1</span>
        </h3>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step2Head" onclick="ChangeFormStep('step2')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 2</span>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step3Head" onclick="ChangeFormStep('step3')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 3</span>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step4Head" onclick="ChangeFormStep('step4')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 4</span>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step5Head" onclick="ChangeFormStep('step5')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 5</span>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step6Head" onclick="ChangeFormStep('step6')">
            <span class="icon pointerNone"><i class="bi bi-chevron-double-right"></i></span><br />
            <span class="title_text pointerNone">Step 6</span>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg">
        <h3 class="StepHead" id="step7Head" onclick="ChangeFormStep('step7')">
            <span class="icon pointerNone"><i class="bi bi-check-square"></i></span><br />
            <span class="title_text pointerNone">Step 7</span>
        </h3>
    </div>


</div>

<div class="row Contentbodies form-container pe-0 activeCB" id="ContentBody1">
    <h5>General Venue Info</h5>


    <div class='row'>
        <div class='col-md-4'>
            <label>Natural Daylight</label>
            <select name='naturaldaylight'>
                <?php
                if($naturaldaylight=='Yes')
                {
                    echo '
                    <option>Yes</option>
                <option>No</option>
                    
                    ';
                }
                else{
                      echo '
                    <option>No</option>
                <option>Yes</option>
                    
                    ';
                }
                ?>
                
            </select>

        </div>
        <div class='col-md-4'>
            <label>Ceiling Height</label>
            <input placeholder='Ceiling Height' value='<?php echo $ceilingheight;?>' name='ceilingheight'>
        </div>
        <div class='col-md-4'>
              <label>Door Width Height</label>
            <input placeholder='Door Width Height' value='<?php echo $doorwidthheight;?>' name='doorwidthheight'>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
             <label>Smoking / Non Smoking</label>
            <select name='smoking'>
                
               <?php if($smoking=='Smoking')
               {
                   echo '
                   <option>Smoking</option>
                <option>Non Smoking</option>
                   
                   ';
               }
               else
               {
                   echo '
                   <option>Non Smoking</option>
                <option>Smoking</option>
                ';
               }
               ?>
                
            </select>
        </div>
        <div class="col-md-4">
             <label>Outdoor / Indoor</label>
            <select class='' name=' outdoorindoor'>
                <?php
                if($outdoorindoor=='Outdoor')
                {
                    echo '<option>Outdoor</option>
                <option>Indoor</option>';
                }
                else{
                      echo '<option>Indoor</option>
                      <option>Outdoor</option>
                ';
                }
                ?>
                
            </select>
        </div>
        <div class="col-md-4">
             <label>Venue Rating</label>
            <input placeholder='Venue Rating' value='<?php echo $venuerating;?>' name='venuerating'>
        </div>
    </div>

    <div class="row mt-2">
         <label>Last Renovation Date</label>
        <div class="col-md-4">
            <input type='date' value='<?php echo $lastrenovated;?>' name='lastrenovated'>
        </div>
        <div class="col-md-4">
            <input list='avails' placeholder='Venue Availability Prior to Event' value='<?php echo $venueavailabilityprior;?>' name='venueavailabilityprior'>
            <datalist id='avails'>
                <option>1 Hour</option>
                <option>2 Hours</option>
                <option>1 Day</option>
            </datalist>
        </div>
        <div class="col-md-4">
            <input class='form-control' placeholder='Accessibility Timing' value='<?php echo $accessibilitytimming;?>'  name='accessibilitytimming'>
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <textarea placeholder='Venue Info (Description)' name='venueinfo'><?php echo $venueinfo;?></textarea>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <textarea placeholder='Getting Here' name='gettinghere'><?php echo $gettinghere;?></textarea>
        </div>
        <div class="col-md-6">
            <textarea placeholder='At a glance info' name='glance'><?php echo $glance;?></textarea>
        </div>
    </div>

    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <!-- <div class="btn btn-danger "><i class="bi bi-arrow-left"></i> Back</div> -->
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step2')"><i class="bi bi-chevron-right"></i> </div>
        </div>
    </div>
</div>



<div class="row Contentbodies form-container pe-0" id="ContentBody2">
    <h5>Past Events</h5>

    <div class="row">
        <nonsense id='addnc'>
            <?php
            $pastevents=explode(',',$pastevents);
            foreach($pastevents as $pe)
            {
                ?>
               <input name="cards[]" placeholder="Past Event Name" value="<?php echo $pe;?>" class="mt-2"> 
            <?php    
            }
            ?>
            
        </nonsense>
        <div class="col-md-12 mt-2 d-flex justify-content-end">
            <input type='button' id='pds' class='btn btn-danger col-sm-2' onclick='addcardnew()' value='+ Add More'>
        </div>

    </div>
    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger" onclick="ChangeFormStep('step1')"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step3')"><i class="bi bi-chevron-right"></i></div>
        </div>
    </div>
</div>


<div class="row Contentbodies form-container pe-0" id="ContentBody3">
    <h5>Furnitures</h5>


    <p>Table Types</p>
    <div id="TableTypesDiv">
        
         <?php
            $tableType=explode(',',$tableType);
            $tableSize=explode(',',$tableSize);
            
            ?>
            <input style='display:none;' id='countmefortables' value='<?php echo count($tableType);?>'>
            <?php
            $incret=0;
            foreach($tableType as $tt)
            {
                ?>
        
        <div class="row">
            <div class="col-md-3">
                <input type="text" placeholder='Table Type' name='tableType[]' value="<?php echo $tableType[$incret];?>">
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Table Size' name='tableSize[]' value="<?php echo $tableSize[$incret];?>">
            </div>
          
           <div class="col-md-3">
               <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='table' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Table Types Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Table Image' multiple name='tableImage<?php echo $incret;?>[]'>
            </div>
            
        </div>
        <?php
        $incret=$incret+1;
            }
            ?>
       
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsTTD()">+</span>
        </div>
    </div>
    <p>Table Cloths</p>

    <div id="TableClothsDiv">
        
        
        <?php
            $tableClothType=explode(',',$tableClothType);
            $tableClothAmount=explode(',',$tableClothAmount);
            $tableClothSize=explode(',',$tableClothSize);
            ?>
            <input style='display:none;' id='countmefortablescloths' value='<?php echo count($tableClothType);?>'>
            <?php
            $incret=0;
            foreach($tableClothType as $tt)
            {
                ?>
        
        
        
        
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='tableClothType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $tableClothAmount[$incret];?>' name='tableClothAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $tableClothSize[$incret];?>' name='tableClothSize[]'>
            </div>
            <div class="col-md-3">
                
                  <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='tablecloth' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Table Cloths Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
                
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='tableClothImage<?php echo $incret;?>[]'>
            </div>
        </div>
        <?php
        $incret=$incret+1;
            }
        ?>
        
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsTCD()">+</span>
        </div>
    </div>

    <p>Chair Types</p>

    <div id="ChairTypesDiv">
        
        
         <?php
     
            $chairType=explode(',',$chairType);
          
            $chairAmount=explode(',',$chairAmount);
            $chairSize=explode(',',$chairSize);
            ?>
            <input style='display:none;' id='countmeforchairs' value='<?php echo count($chairType);?>'>
            <?php
            $incret=0;
            foreach($chairType as $tt)
            {
              
                ?>
        
        
        
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='chairType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $chairAmount[$incret];?>' name='chairAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $chairSize[$incret];?>' name='chairSize[]'>
            </div>
            <div class="col-md-3">
                 <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='chairs' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Chair Types Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='chairImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        <?php
        $incret=$incret+1;
            }
            ?>
        
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCTD()">+</span>
        </div>
    </div>
    <p>Runners</p>

    <div id="RunnersDiv">
        
        
           <?php
     
            $runnerType=explode(',',$runnerType);
          
            $runnerAmount=explode(',',$runnerAmount);
            $runnerSize=explode(',',$runnerSize);
            ?>
            <input style='display:none;' id='countmeforrunners' value='<?php echo count($runnerType);?>'>
            <?php
            $incret=0;
            foreach($runnerType as $tt)
            {
              
                ?>
        
        
        
        
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='runnerType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $runnerAmount[$incret];?>' name='runnerAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $runnerSize[$incret];?>' name='runnerSize[]'>
            </div>
            <div class="col-md-3">
                 <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='runner' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Runners Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='runnerImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        
        <?php
        $incret=$incret+1;
            }
            ?>
        
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsRD()">+</span>
        </div>
    </div>


    <p>Center Pieces</p>
    <div id="CenterPiecesDiv">
        
          <?php
     
            $centerpieceType=explode(',',$centerpieceType);
          
            $centerpieceAmount=explode(',',$centerpieceAmount);
            $centerpieceSize=explode(',',$centerpieceSize);
            ?>
            <input style='display:none;' id='countmeforcenterpiece' value='<?php echo count($centerpieceType);?>'>
            <?php
            $incret=0;
            foreach($centerpieceType as $tt)
            {
              
                ?>
        
        
        
        
        
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='centerpieceType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $centerpieceAmount[$incret];?>' name='centerpieceAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $centerpieceSize[$incret];?>' name='centerpieceSize[]'>
            </div>
             <div class="col-md-3">
                 
               <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='centerpiece' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Centerpieces Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
                
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='centerpieceImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        
        
        <?php
        $incret=$incret+1;
            }
        ?>
    </div>

    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCPD()">+</span>
        </div>
    </div>

    <p>Carpets</p>
    <div id="CarpetsDiv">
        
          <?php
     
            $carpetsType=explode(',',$carpetsType);
          
            $carpetsAmount=explode(',',$carpetsAmount);
            $carpetsSize=explode(',',$carpetsSize);
            ?>
            <input style='display:none;' id='countmeforcarpets' value='<?php echo count($carpetsType);?>'>
            <?php
            $incret=0;
            foreach($carpetsType as $tt)
            {
              
                ?>
        
        
        
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='carpetsType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $carpetsAmount[$incret];?>' name='carpetsAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $carpetsSize[$incret];?>' name='carpetsSize[]'>
            </div>
                  <div class="col-md-3">
              
                         <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='carpet' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Carpets Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?>
        
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='carpetsImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        <?php
        $incret=$incret+1;
            }
        ?>
        
        
        
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCRPD()">+</span>
        </div>
    </div>

    <p>Stage</p>
    <div id="StageDiv">
        
          <?php
     
            $stageType=explode(',',$stageType);
          
            $stageAmount=explode(',',$stageAmount);
            $stageSize=explode(',',$stageSize);
            ?>
            <input style='display:none;' id='countmeforstage' value='<?php echo count($stageType);?>'>
            <?php
            $incret=0;
            foreach($stageType as $tt)
            {
              
                ?>
                
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $tt;?>' name='stageType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Amount' value='<?php echo $stageAmount[$incret];?>' name='stageAmount[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $stageSize[$incret];?>' name='stageSize[]'>
            </div>
             <div class="col-md-3">
                                 <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='stage' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Stage Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='stageImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        <?php
        
        $incret=$incret+1;
            }
            ?>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsSTGD()">+</span>
        </div>
    </div>
    
    
    
    
    
     <p>Skirting</p>
    <div id="SkirtingDiv">
         
          <?php
     
            $skirtingtype=explode(',',$skirtingtype);
          
            $skirtingpodium=explode(',',$skirtingpodium);
            $skirtingsize=explode(',',$skirtingsize);
            ?>
            <input style='display:none;' id='countmeforskirting' value='<?php echo count($skirtingtype);?>'>
            <?php
            $incret=0;
            foreach($skirtingtype as $tt)
            {
              
                ?>
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder='Name' value='<?php echo $skirtingtype[$incret];?>' name='skirtingType[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Podium' value='<?php echo $skirtingpodium[$incret];?>' name='skirtingPodium[]' >
            </div>
            <div class="col-md-2">
                <input type="text" placeholder='Size' value='<?php echo $skirtingsize[$incret];?>' name='skirtingSize[]'>
            </div>
            
            
             <div class="col-md-3">
               
               
                <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='skirting' && category='$tt'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Skirting Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $tt;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
               
               
            </div>
                                         
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='skirtingImage<?php echo $incret;?>[]'>
            </div>
        </div>
        
        <?php
        $incret=$incret+1;
            }
            ?>
        
        
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsSKTGD()">+</span>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger" onclick="ChangeFormStep('step2')"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step4')"><i class="bi bi-chevron-right"></i></div>
        </div>
    </div>
</div>


<div class="row Contentbodies form-container pe-0" id="ContentBody4">
    <h5>AVR (Audio Visual)</h5>
    <div class="row">
        
         <div class="col-sm">
             <label>Available Power</label>
            <select name='availablepower'>
                <?php 
                if($availablepower=='32AMPS 3PHASE')
                {
                  echo '<option>32AMPS 3PHASE</option> <option>63AMPS 3PHASE</option>
                <option>120AMPS 3PHASE</option>';  
                }
                else if($availablepower=='63AMPS 3PHASE'){
                     echo '<option>63AMPS 3PHASE</option> <option>32AMPS 3PHASE</option>
                <option>120AMPS 3PHASE</option>';  
                }
                else if($availablepower=='120AMPS 3PHASE'){
                     echo '<option>120AMPS 3PHASE</option> <option>32AMPS 3PHASE</option>
                <option>63AMPS 3PHASE</option>';  
                }
                else{
                      echo '<option>32AMPS 3PHASE</option> <option>63AMPS 3PHASE</option>
                <option>120AMPS 3PHASE</option>';  
                }
                ?>
                
              
                
            </select>
        </div>
        
        
        <div class="col-sm">
            <label>Mixer</label>
            <select name='mixer'>
               <?php
               if($mixer=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?>
               
                
            </select>
        </div>
        <div class="col-sm">
            <label>Distance from DB</label>
            <input placeholder='Distance from DB in Meters' value='<?php echo $distancedb;?>' name='distancedb'>
        </div>
        <div class='col-sm'>
            <label>Stage</label>
            <select id='stage' name='stage'>
                <?php
               if($stage=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?>
               
            </select>
        </div>


        <div id='stg' style='display:block;' class='col-sm'>
            <label>Stage Blocks</label>
            <input placeholder='How Many Blocks?' value='<?php echo $stageblocks;?>' id='sb' name='stageblocks'>
            <small style='color:red;'>Standard: (1.2m x 2.4m)</small>

        </div>
    </div>
    <div class='row'>
        <label>Mic</label>

        <div class='col-sm'>
            <select id='mic' name='mic'>
                <?php
               if($mic=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?>
            </select>
        </div>

        <div id='mictype' style='display:block;' class='col-sm'>
            
            <input id='mctpe' value='<?php echo $mictype;?>' placeholder='Mic Type' name='mictype'>
        </div>
        <div id='chargedfreemic' style='display:block;' class='col-sm'>
            <select name='chargedfreemic'>
                <?php if($chargedfreemic=='Charged')
                {
                    echo '
                    <option>Charged</option>
                <option>Free</option>
                    ';
                }
                elseif($chargedfreemic=='Free'){
                   echo '
                   <option>Free</option>
                   <option>Charged</option>
                '; 
                }
                else{
                    echo '
                    <option>Charged/Free</option>
                     <option>Charged</option>
                <option>Free</option>
                    
                    ';
                }
                
                ?>
                
            </select>
        </div>
    </div>
    <div class='row'>
        <label>Projector</label>

        <div class='col-sm'>
            <select id='projector' name='projector'>
                <?php
               if($projector=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?>
            </select>
        </div>

        <div id='projectortype' style='display:block;' class='col-sm'>
            <input id='projectortpe' value='<?php echo $projectortype;?>' placeholder='Projector Type' name='projectortype'>
        </div>
        <div id='projectorlumens' style='display:block;' class='col-sm'>
            <input id='projectorlmns' value='<?php echo $projectorlumens;?>' placeholder='Lumens' name='projectorlumens'>
        </div>
        <div id='mobilemounted' style='display:block;' class='col-sm'>
            <select name='mobilemounted'>
                   <?php
               if($mobilemounted=='Mobile'){
                   echo '<option>Mobile</option>
                <option>Mounted</option>';
               }
               elseif($mobilemounted=='Mounted'){
                   
                   echo '<option>Mounted</option>
                <option>Mobile</option>';
               
               }
               else{
                    echo '<option>Mobile/Mounted?</option> <option>Mounted</option>
                <option>Mobile</option>';
               }
               ?>
            </select>
        </div>


        <div id='backfront' style='display:block;' class='col-sm'>
            <select name='backfront'>
                <?php
               if($backfront=='Back'){
                   echo '<option>Back</option>
                <option>Front</option>';
               }
               elseif($backfront=='Front'){
                   
                   echo ' <option>Front</option>
                   <option>Back</option>';
               
               }
               else{
                    echo '<option selected disabled>Back/Front Projection?</option> <option>Back</option>
                <option>Front</option>';
               }
               ?>
                
                
            </select>
        </div>


    </div>
    <div class='row'>
        <label>Speakers</label>

        <div class='col-sm'>
            <select id='speakers' name='speakers'>
                  <?php
               if($speakers=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?>
              
            </select>
        </div>

        <div id='speakertype' style='display:block;' class='col-sm'>
            
            <input id='sptpe' placeholder='Speaker Type' value='<?php echo $speakertype;?>' name='speakertype'>
        </div>
        <div id='decibels' style='display:block;' class='col-sm'>
            <input id='dcbls' placeholder='Decibels' value='<?php echo $decibels;?>' name='decibels'>
        </div>
    </div>
    <div class='row'>
        <label>Dance Floor</label>
        <div class='col-sm'>
            <select id='dancefloor' name='dancefloor'>
               
                  <?php
               if($dancefloor=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?> 
            </select>
        </div>
        <div id='dancefloorsize' style='display:block;'  class='col-sm'>
            <input id='dancesize' placeholder='Size' value='<?php echo $dancefloorsize;?>' name='dancefloorsize'>
        </div>
        <div id='dancefloormaterial' style='display:block;' class='col-sm'>
            <input id='dancematerial' placeholder='Material'value='<?php echo $dancefloormaterial;?>'  name='dancefloormaterial'>
        </div>
        <datalist id='mtrl'>
            <option>Wooden</option>
            <option>LED</option>
        </datalist>
        <div id='dancefloorcost' style='display:block;' class='col-sm'>
            <input id='dancecost' placeholder='Cost' value='<?php echo $dancefloorcost;?>' name='dancefloorcost'>
        </div>
    </div>
    <div class='row mt-2'>
        <label>Hanging Points</label>
        <div class='col-sm'>
            <select id='hp' name='hangingpoints'>
               
                <?php
               if($hangingpoints=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?> 
               
            </select>

        </div>
        <div style='display:block;' id='nh' class='col-sm'>
            <input id='nhh' placeholder='# of Hanging Points' value='<?php echo $numberofhanging;?>' name='numberofhanging'>
        </div>
        <datalist id='atss' style='display:none;'>
            <option>Scaffolding</option>
            <option>Fork Lift</option>
            <option>Genie Lift</option>
        </datalist>
    </div>

    <nonsense id='hangingpointtable' class="row">
        
        <?php 
        $l1=0;
        
        $locationhp=explode(',',$locationhp);
        
        $hpaccessiblethrough=explode(',',$hpaccessiblethrough);
        
        $hpchargedincluded=explode(',',$hpchargedincluded);
        
        
        foreach($locationhp as $lh)
        {
            
        ?>
<div class="container">
    <div class="row mt-2">
        <div class="col-sm">
            <input placeholder="Location of Hanging Point" value='<?php echo $locationhp[$l1];?>' name="locationhp[]"></div>
            
            <div class="col-sm"><input placeholder="Accessible Through" list="atss" value='<?php echo $hpaccessiblethrough[$l1];?>' name="hpaccessiblethrough[]"></div>
            
            <div class="col-sm"><select name="hpchargedincluded[]">
                
                <?php
                if($hpchargedincluded[$l1]=='Charged')
                {
                   echo '  <option>Charged</option><option>Included</option>'; 
                }
                else if($hpchargedincluded[$l1]=='Included')
                {
                    echo '<option>Included</option><option>Charged</option>';
                }
                else{
                      echo '<option>Charged/Included</option><option>Charged</option><option>Included</option>';  
                }
                ?>
              
                
                
                
                </select></div>
            
            </div></div>

<?php
$l1=$l1+1;
}
?>

    </nonsense>




    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger" onclick="ChangeFormStep('step3')"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step5')"><i class="bi bi-chevron-right"></i></div>
        </div>
    </div>

</div>
<div class="row Contentbodies form-container pe-0" id="ContentBody5">
    <h5>Seating Styles</h5>

    <div class='row'>
        <label>Theater Style</label>
        <div class='col-sm'>
            <input name='theater' type='number'  value='<?php echo $theater ;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='theater'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='timages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Classroom Style</label>
        <div class='col-sm'>
            <input name='classroom' type='number'  value='<?php echo $classroom ;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='classroom'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='crimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Cabaret Style</label>
        <div class='col-sm'>
            <input name='cabaret' type='number'  value='<?php echo $cabaret ;?>' placeholder='Max Pax'>
        </div>
        
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='cabaret'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='cabimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Boardroom Style</label>
        <div class='col-sm'>
            <input name='boardroom' type='number'  value='<?php echo $boardroom ;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='boardroom'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='boimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>U-Shape Style</label>
        <div class='col-sm'>
            <input name='ushape' type='number'  value='<?php echo $ushape ;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='ushape'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='uimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Banquet Style</label>
        <div class='col-sm'>
            <input name='banquet' type='number'  value='<?php echo $banquetdinner;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='banquet'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='banimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Cocktail Reception Style</b></label>
        <div class='col-sm'>
            <input name='cocktailreception' type='number' value='<?php echo $cocktailreception ;?>'  placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='cocktail'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='cocktailimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Ampitheatre Style</label>
        <div class='col-sm'>
            <input name='Ampitheatre' type='number'  value='<?php echo $ampitheatre ;?>' placeholder='Max Pax'>
        </div>
<div class='col-sm'>
    
    <?php
                 $sql2 = "SELECT * FROM meetingplannerimages WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venue' && type='ampitheatre'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                ?>
                <img src='../Venue Original Images/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $row2["image"];?>' style='width:30px; height:30px;'>
                
           <?php
            }
        }
        ?> 
        
</div>
        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='Ampitheatreimages[]'>
        </div>
    </div>




    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger" onclick="ChangeFormStep('step4')"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step6')"><i class="bi bi-chevron-right"></i></div>
        </div>
    </div>
</div>
<div class="row Contentbodies form-container pe-0" id="ContentBody6">
    <h5>Car Launches</h5>

    <div class='row'>
        <div class='col-sm'>
            <select name='carlaunch'>
               
                <?php
               if($carlaunch=='Yes'){
                   echo '<option>Yes</option>
                <option>No</option>';
               }
               else{
                   
                   echo '<option>No</option>
                <option>Yes</option>';
               
               }
               ?> 
                
            </select>
            <small style='color:red;'>*Vehicles can be displayed in Ballroom / Foyer*</small>
        </div>

        <div class='col-sm'>
            <input placeholder='Max Vehicle Size' value='<?php echo $vehiclewidthheight;?>' name='vehiclewidthheight'>

        </div>
    </div>
    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger" onclick="ChangeFormStep('step5')"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <div class="btn btn-danger" onclick="ChangeFormStep('step7')"><i class="bi bi-chevron-right"></i></div>
        </div>
    </div>
</div>
<div class="row Contentbodies form-container pe-0" id="ContentBody7">
    <h5>Standard AVR Inclusions for meetings</h5>
    <label>Conference packaging inclusions</label><br />


    <div class='row'>
        <?php
        $sqlv = "SELECT * FROM venueconferencepackaginginclusions";
        $resultv = $conn->query($sqlv);

        if ($resultv->num_rows > 0) {
            // output data of each row
            while ($rowv = $resultv->fetch_assoc()) {
        ?>

        
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-md-1" style="padding-top:1px;">
                            <?php
                            if(strpos($conferencepackaginginclusions, $rowv['name']) !==false)
                            {
                                ?>
                             <input name="conferencepackaginginclusions[]" checked type="checkbox" class="form-check-input" value="<?php echo $rowv['name']; ?>">
                           
                         <?php
                            }
                         else{
                             ?>
                              <input name="conferencepackaginginclusions[]" type="checkbox" class="form-check-input" value="<?php echo $rowv['name']; ?>">
                             <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-11">
                            <label for="<?php echo $rowv['name']; ?>"><?php echo $rowv['name']; ?></label>
                        </div>
                    </div>
                    
                    
                    
                </div>
        <?php
            }
        }
        ?>

        <nonsense id='addnc2' class="row mt-2">

        </nonsense>
    </div>
    
    
   
    
    <div class="row d-flex justify-content-end">
        <input type='submit' id='pds2' class='btn btn-danger col-md-1' onclick='addcardnew2()' value='+'>
    </div>
    
     <div>
        <br/>
        <label>Upload Work Permit</label>
        <input type='file'  accept="application/pdf" name='workpermit'>
        <br/>
        
        <a class='btn btn-warning' download href='../Venues Work Permits/<?php echo $hotel;?>/<?php echo $venue;?>/<?php echo $workpermit;?>'>Download</a>
        <br/>
    </div>
    
    <div class="row" style='position:absolute; bottom:10px;'>
        <div class="col-lg-6 d-flex justify-content-start">
            <div class="btn btn-danger"><i class="bi bi-chevron-left"></i></div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end pe-0">
            <button type="submit" name="submit" class="btn btn-danger"><i class="bi bi-check"></i> Finish & Next</button>
        </div>
    </div>
</div>
</div>
</form>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
    $(document).ready(function() {
        document.getElementById("pds").addEventListener("click", function(event) {
            event.preventDefault()
        });


        document.getElementById("pds2").addEventListener("click", function(event) {
            event.preventDefault()
        });
    });

    function ChangeFormStep(step) {
        // console.log(step);
        $('.StepHead').removeClass('activeH3');
        $target = $('#' + step + 'Head');
        // console.log($target);
        $target.addClass('activeH3');

        $('.Contentbodies').hide();
        if (step == 'step1') {
            $('#ContentBody1').slideDown();
        } else if (step == 'step2') {
            $('#ContentBody2').slideDown();
        } else if (step == 'step3') {
            $('#ContentBody3').slideDown();
        } else if (step == 'step4') {
            $('#ContentBody4').slideDown();
        } else if (step == 'step5') {
            $('#ContentBody5').slideDown();
        } else if (step == 'step6') {
            $('#ContentBody6').slideDown();
        } else if (step == 'step7') {
            $('#ContentBody7').slideDown();
        }
    }

    function addcardnew() {
        var parent = document.getElementById("addnc");

        var inpt = document.createElement('INPUT');
        inpt.setAttribute('name', 'cards[]');
        inpt.setAttribute('placeholder', 'Past Event Name');
        inpt.classList.add('mt-2');

        parent.appendChild(inpt);

    }

    function addcardnew2() {
        
        var mainDiv = document.createElement('div');
        var parent = document.getElementById("addnc2");
        mainDiv.classList.add('col-md-3');
        mainDiv.classList.add('mt-2');

        var inpt = document.createElement('INPUT');
        inpt.setAttribute('name', 'conferencepackaginginclusions[]');
        inpt.setAttribute('placeholder', 'Conference Packaging Inclusion');

         mainDiv.appendChild(inpt);
        parent.appendChild(mainDiv);
    }

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
            dr.classList.add('mt-2');
            var d1 = document.createElement('div');
            d1.classList.add('col-sm');

            var d2 = document.createElement('div');
            d2.classList.add('col-sm');

            var d3 = document.createElement('div');
            d3.classList.add('col-sm');

            var loc = document.createElement('INPUT');
            loc.setAttribute('placeholder', 'Location of Hanging Point');
            loc.setAttribute('name', 'locationhp[]');
            d1.appendChild(loc);



            var at = document.createElement('INPUT');
            at.setAttribute('placeholder', 'Accessible Through');
            at.setAttribute('list', 'atss');
            at.setAttribute('name', 'hpaccessiblethrough[]');
            d2.appendChild(at);




            var ci = document.createElement('SELECT');
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
var tableimageindex=document.getElementById('countmefortables').value;
    function AddMoreFieldsTTD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-4">
                <input type="text" placeholder='Table Type' name='tableType[]'>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder='Table Size' name='tableSize[]'>
            </div>
            <div class="col-md-4">
                <input type="file" placeholder='Table Image' multiple name='tableImage`+tableimageindex+`[]'>
            </div>
        </div>`;
        $('#TableTypesDiv').append(eHtml);
        tableimageindex=tableimageindex+1;
    }
var tableclothimageindex=document.getElementById('countmefortablescloths').value;

    function AddMoreFieldsTCD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='tableClothType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='tableClothAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='tableClothSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='tableClothImage`+tableclothimageindex+`[]'>
            </div>
        </div>`;
        $('#TableClothsDiv').append(eHtml);
        
        tableclothimageindex=tableclothimageindex+1;
    }

var chairImageindex=document.getElementById('countmeforchairs').value;
    function AddMoreFieldsCTD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='chairType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='chairAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='chairSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='chairImage`+chairImageindex+`[]'>
            </div>
        </div>`;
        $('#ChairTypesDiv').append(eHtml);
        chairImageindex=chairImageindex+1;
    }

var runnerImageindex=document.getElementById('countmeforrunners').value;
    function AddMoreFieldsRD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='runnerType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='runnerAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='runnerSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='runnerImage`+runnerImageindex+`[]'>
            </div>
        </div>`;
        $('#RunnersDiv').append(eHtml);
        runnerImageindex=runnerImageindex+1;
    }


var centerpieceImageindex=document.getElementById('countmeforcenterpiece').value;
    function AddMoreFieldsCPD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='centerpieceType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='centerpieceAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='centerpieceSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='centerpieceImage`+centerpieceImageindex+`[]'>
            </div>
        </div>`;
        $('#CenterPiecesDiv').append(eHtml);
        centerpieceImageindex=centerpieceImageindex+1;
    }
var carpetsImageindex=document.getElementById('countmeforcarpets').value;
    function AddMoreFieldsCRPD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='carpetsType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='carpetsAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='carpetsSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='carpetsImage`+carpetsImageindex+`[]'>
            </div>
        </div>`;
        $('#CarpetsDiv').append(eHtml);
        carpetsImageindex=carpetsImageindex+1;
    }

var stageImageindex=document.getElementById('countmeforstage').value;
    function AddMoreFieldsSTGD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='stageType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Amount' name='stageAmount[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='stageSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='stageImage`+stageImageindex+`[]'>
            </div>
        </div>`;
        $('#StageDiv').append(eHtml);
        stageImageindex=stageImageindex+1;
    }



    

var skirtingImageindex=document.getElementById('countmeforskirting').value;
    function AddMoreFieldsSKTGD(){
       var eHtml = `<div class="row mt-2">
            <div class="col-md-3">
                <input type="text" placeholder='Name' name='skirtingType[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Podium' name='skirtingPodium[]' >
            </div>
            <div class="col-md-3">
                <input type="text" placeholder='Size' name='skirtingSize[]'>
            </div>
            <div class="col-md-3">
                <input type="file" placeholder='Image' multiple name='skirtingImage`+skirtingImageindex+`[]'>
            </div>
        </div>`;
        $('#SkirtingDiv').append(eHtml);
        skirtingImageindex=skirtingImageindex+1;
    }

    



   
</script>


<?php endblock(); ?>