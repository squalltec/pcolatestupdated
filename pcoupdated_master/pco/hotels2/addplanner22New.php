<?php
session_start();
require_once('db_connection.php');
$countvenues = $_SESSION['counting'];
$venues = $_SESSION['venues'];

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];


if (isset($_POST['submit'])) {

   
   $breakoutroomsquantity=$_POST['breakoutroomsquantity'];


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

    mkdir("../Venue Table Types Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Table Types Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','table','$tt')");


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

    mkdir("../Venue Table Cloths Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Table Cloths Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','tablecloth','$tt')");


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

    mkdir("../Venue Chair Types Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Chair Types Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','chairs','$tt')");


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

    mkdir("../Venue Runners Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Runners Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','runner','$tt')");


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

    mkdir("../Venue Centerpieces Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Centerpieces Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','centerpiece','$tt')");


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

    mkdir("../Venue Carpets Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Carpets Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','carpet','$tt')");


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

    mkdir("../Venue Stage Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Stage Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','stage','$tt')");


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

    mkdir("../Venue Skirting Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt, 0755, true);


    $uploadsDir = "../Venue Skirting Images/" . $hotel . "/" . $venues[$countvenues]. "/" . $tt . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type,category) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','skirting','$tt')");


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
























    $sql = "UPDATE meetingbanquetplanner SET breakoutroomsquantity='$breakoutroomsquantity',venueinfo='$venueinfo',gettinghere='$gettinghere',glance='$glance',naturaldaylight='$naturaldaylight',ceilingheight='$ceilingheight',doorwidthheight='$doorwidthheight', carlaunch='$carlaunch', vehiclewidthheight='$vehiclewidthheight', venueaddress='$venueaddress', lastrenovated='$lastrenovated',outdoorindoor='$outdoorindoor',pastevents='$pastevents',vinclusions='$vinclusions',ampitheatre='$ampitheatre',theater='$theater',classroom='$classroom',cabaret='$cabaret',boardroom='$boardroom',ushape='$ushape',banquetdinner='$banquet',cocktailreception='$cocktailreception',smoking='$smoking',socialdistance='$socialdistance',hangingpoints='$hangingpoints', numberofhanging='$numberofhanging', locationhp='$locationhp', hpaccessiblethrough='$hpaccessiblethrough', hpchargedincluded='$hpchargedincluded', availablepower='$availablepower', distancedb='$distancedb', stage='$stage', stageblocks='$stageblocks', venueavailabilityprior='$venueavailabilityprior', accessibilitytimming='$accessibilitytimming', conferencepackaginginclusions='$conferencepackaginginclusions', mixer='$mixer', mic='$mic', mictype='$mictype', chargedfreemic='$chargedfreemic', projector='$projector', projectortype='$projectortype', projectorlumens='$projectorlumens', mobilemounted='$mobilemounted', backfront='$backfront', speakers='$speakers', speakertype='$speakertype', decibels='$decibels', dancefloor='$dancefloor', dancefloorsize='$dancefloorsize', dancefloormaterial='$dancefloormaterial', dancefloorcost='$dancefloorcost',skirtingtype='$skirtingtype',skirtingpodium='$skirtingpodium',skirtingsize='$skirtingsize',workpermit='$workpermit' ,tableType='$tableType',tableSize='$tableSize',tableClothType='$tableClothType',tableClothAmount='$tableClothAmount',tableClothSize='$tableClothSize',chairType='$chairType',chairAmount='$chairAmount',chairSize='$chairSize',runnerType='$runnerType',runnerAmount='$runnerAmount',runnerSize='$runnerSize',centerpieceType='$centerpieceType',centerpieceAmount='$centerpieceAmount',centerpieceSize='$centerpieceSize',carpetsType='$carpetsType',carpetsAmount='$carpetsAmount',carpetsSize='$carpetsSize',stageType='$stageType',stageAmount='$stageAmount',stageSize='$stageSize' WHERE hotel='$hotel' && country='$country' && city='$city' && venue='$venues[$countvenues]'";

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



































//Ampitheatreimages





    $uploadsDir = "../Venue Original Images/" . $hotel . "/" . $venues[$countvenues] . "/";
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
                $insert = $conn->query("INSERT INTO meetingplannerimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','ampitheatre')");


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
        echo "<script>location.replace('addplanner22New.php');</script>";
    } else {
        $_SESSION['counting'] = '0';
        echo "<script>location.replace('uploadorfp.php');</script>";
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

<form action="#" method="post" enctype="multipart/form-data">
    <h4><?php echo $venues[$countvenues];?></h4>
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
            <select name='naturaldaylight'>
                <option selected disabled>Natural Daylight?</option>
                <option>Yes</option>
                <option>No</option>
            </select>

        </div>
        <div class='col-md-4'>
            <input placeholder='Ceiling Height' name='ceilingheight'>
        </div>
        <div class='col-md-4'>
            <input placeholder='Door Width Height' name='doorwidthheight'>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <select name='smoking'>
                <option selected disabled>Smoking / Non Smoking?</option>
                <option>Non Smoking</option>
                <option>Smoking</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class='' name=' outdoorindoor'>
                <option selected disabled>Outdoor / Indoor Venue?</option>
                <option>Outdoor</option>
                <option>Indoor</option>
            </select>
        </div>
        <div class="col-md-4">
            <input placeholder='Venue Rating' name='venuerating'>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <input type='date' name='lastrenovated'>
        </div>
        <div class="col-md-4">
            <input list='avails' placeholder='Venue Availability Prior to Event' name='venueavailabilityprior'>
            <datalist id='avails'>
                <option>1 Hour</option>
                <option>2 Hours</option>
                <option>1 Day</option>
            </datalist>
        </div>
        <div class="col-md-4">
            <input class='form-control' placeholder='Accessibility Timing' name='accessibilitytimming'>
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <textarea placeholder='Venue Info (Description)' name='venueinfo'></textarea>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <textarea placeholder='Getting Here' name='gettinghere'></textarea>
        </div>
        <div class="col-md-6">
            <textarea placeholder='At a glance info' name='glance'></textarea>
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
            <input name="cards[]" placeholder="Past Event Name" class="mt-2">
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
        <div class="row mt-2">
            <div class="col-md-4">
                <input type="text" placeholder='Table Type' name='tableType[]' value="Round Table">
            </div>
            <div class="col-md-4">
                <input type="text" placeholder='Table Size' name='tableSize[]'>
            </div>
            <div class="col-md-4">
                <input type="file" placeholder='Table Image' multiple name='tableImage0[]'>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <input type="text" placeholder='Table Type' name='tableType[]' value="Class Table">
            </div>
            <div class="col-md-4">
                <input type="text" placeholder='Table Size' name='tableSize[]'>
            </div>
            <div class="col-md-4">
                <input type="file" placeholder='Table Image' multiple name='tableImage1[]'>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <input type="text" placeholder='Table Type' name='tableType[]' value="Cocktail Table">
            </div>
            <div class="col-md-4">
                <input type="text" placeholder='Table Size' name='tableSize[]'>
            </div>
            <div class="col-md-4">
                <input type="file" placeholder='Table Image' multiple name='tableImage2[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsTTD()">+</span>
        </div>
    </div>
    <p>Table Cloths</p>

    <div id="TableClothsDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='tableClothImage0[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsTCD()">+</span>
        </div>
    </div>

    <p>Chair Types</p>

    <div id="ChairTypesDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='chairImage0[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCTD()">+</span>
        </div>
    </div>
    <p>Runners</p>

    <div id="RunnersDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='runnerImage0[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsRD()">+</span>
        </div>
    </div>


    <p>Center Pieces</p>
    <div id="CenterPiecesDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='centerpieceImage0[]'>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCPD()">+</span>
        </div>
    </div>

    <p>Carpets</p>
    <div id="CarpetsDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='carpetsImage0[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsCRPD()">+</span>
        </div>
    </div>

    <p>Stage</p>
    <div id="StageDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='stageImage0[]'>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-2 pe-0">
        <div class="col-md-1 pe-0">
            <span class="btn btn-danger col-md-12" onclick="AddMoreFieldsSTGD()">+</span>
        </div>
    </div>
    
    
    
    
    
     <p>Skirting</p>
    <div id="SkirtingDiv">
        <div class="row">
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
                <input type="file" placeholder='Image' multiple name='skirtingImage0[]'>
            </div>
        </div>
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
            <select name='availablepower'>
                <option selected disabled>Available Power?</option>
                <option>32AMPS 3PHASE</option>
                <option>63AMPS 3PHASE</option>
                <option>120AMPS 3PHASE</option>
                
            </select>
        </div>
        
        
        <div class="col-sm">
            <select name='mixer'>
                <option selected disabled>Mixer?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
          <div class="col-sm">
            <input placeholder='Breakout Rooms' name='breakoutroomsquantity'>
        </div>
        <div class="col-sm">
            <input placeholder='Distance from DB in Meters' name='distancedb'>
        </div>
        <div class='col-sm'>
            <select id='stage' name='stage'>
                <option selected disabled>Stage Available?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>


        <div id='stg' style='display:none;' class='col-sm'>
            <input placeholder='How Many Blocks?' id='sb' name='stageblocks'>
            <small style='color:red;'>Standard: (1.2m x 2.4m)</small>

        </div>
    </div>
    <div class='row'>
        <label>Mic</label>

        <div class='col-sm'>
            <select id='mic' name='mic'>
                <option selected disabled>Mic?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div id='mictype' style='display:none;' class='col-sm'>
            <input id='mctpe' placeholder='Mic Type' name='mictype'>
        </div>
        <div id='chargedfreemic' style='display:none;' class='col-sm'>
            <select name='chargedfreemic'>
                <option selected disabled>Charged/Free?</option>
                <option>Charged</option>
                <option>Free</option>
            </select>
        </div>
    </div>
    <div class='row'>
        <label>Projector</label>

        <div class='col-sm'>
            <select id='projector' name='projector'>
                <option selected disabled>Projector?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div id='projectortype' style='display:none;' class='col-sm'>
            <input id='projectortpe' placeholder='Projector Type' name='projectortype'>
        </div>
        <div id='projectorlumens' style='display:none;' class='col-sm'>
            <input id='projectorlmns' placeholder='Lumens' name='projectorlumens'>
        </div>
        <div id='mobilemounted' style='display:none;' class='col-sm'>
            <select name='mobilemounted'>
                <option selected disabled>Mobile/Mounted?</option>
                <option>Mobile</option>
                <option>Mounted</option>
            </select>
        </div>


        <div id='backfront' style='display:none;' class='col-sm'>
            <select name='backfront'>
                <option selected disabled>Back/Front Projection?</option>
                <option>Back</option>
                <option>Front</option>
            </select>
        </div>


    </div>
    <div class='row'>
        <label>Speakers</label>

        <div class='col-sm'>
            <select id='speakers' name='speakers'>
                <option selected disabled>Speakers?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div id='speakertype' style='display:none;' class='col-sm'>
            <input id='sptpe' placeholder='Speaker Type' name='speakertype'>
        </div>
        <div id='decibels' style='display:none;' class='col-sm'>
            <input id='dcbls' placeholder='Decibels' name='decibels'>
        </div>
    </div>
    <div class='row'>
        <label>Dance Floor</label>
        <div class='col-sm'>
            <select id='dancefloor' name='dancefloor'>
                <option selected disabled>Dance Floor?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div id='dancefloorsize' style='display:none;' class='col-sm'>
            <input id='dancesize' placeholder='Size' name='dancefloorsize'>
        </div>
        <div id='dancefloormaterial' style='display:none;' class='col-sm'>
            <input id='dancematerial' placeholder='Material' name='dancefloormaterial'>
        </div>
        <datalist id='mtrl'>
            <option>Wooden</option>
            <option>LED</option>
        </datalist>
        <div id='dancefloorcost' style='display:none;' class='col-sm'>
            <input id='dancecost' placeholder='Cost' name='dancefloorcost'>
        </div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm'>
            <select id='hp' name='hangingpoints'>
                <option selected disabled>Hanging Points?</option>
                <option>Yes</option>
                <option>No</option>
            </select>

        </div>
        <div style='display:none;' id='nh' class='col-sm'>
            <input id='nhh' placeholder='# of Hanging Points' name='numberofhanging'>
        </div>
        <datalist id='atss' style='display:none;'>
            <option>Scaffolding</option>
            <option>Fork Lift</option>
            <option>Genie Lift</option>
        </datalist>
    </div>

    <nonsense id='hangingpointtable' class="row">

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
            <input name='theater' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='timages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Classroom Style</label>
        <div class='col-sm'>
            <input name='classroom' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='crimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Cabaret Style</label>
        <div class='col-sm'>
            <input name='cabaret' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='cabimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Boardroom Style</label>
        <div class='col-sm'>
            <input name='boardroom' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='boimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>U-Shape Style</label>
        <div class='col-sm'>
            <input name='ushape' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='uimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Banquet Style</label>
        <div class='col-sm'>
            <input name='banquet' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='banimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Cocktail Reception Style</b></label>
        <div class='col-sm'>
            <input name='cocktailreception' type='number' placeholder='Max Pax'>
        </div>

        <div class='col-sm'>
            <input type='file' accept="image/*" multiple name='cocktailimages[]'>
        </div>
    </div>

    <div class='row'>
        <label>Ampitheatre Style</label>
        <div class='col-sm'>
            <input name='Ampitheatre' type='number' placeholder='Max Pax'>
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
                <option selected disabled>Car Launch Possible?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <small style='color:red;'>*Vehicles can be displayed in Ballroom / Foyer*</small>
        </div>

        <div class='col-sm'>
            <input placeholder='Max Vehicle Size' name='vehiclewidthheight'>

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
                            <input name="conferencepackaginginclusions[]" type="checkbox" class="form-check-input" value="<?php echo $rowv['name']; ?>">
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
var tableimageindex=3;
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
var tableclothimageindex=1;
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

var chairImageindex=1;
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

var runnerImageindex=1;
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

var centerpieceImageindex=1;
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
var carpetsImageindex=1;
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

var stageImageindex=1;
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



    

var skirtingImageindex=1;
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