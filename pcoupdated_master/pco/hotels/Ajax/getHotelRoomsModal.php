<?php

require_once('../db_connection.php');
if (isset($_GET['hotel']) && isset($_GET['country'])) {
    $delid = $_GET['hotelID'];
    $typeName = $_GET['roomType'];
    $hotel = $_GET['hotel'];
    $country =$_GET['country'];
    $city = $_GET['city'];
    // var_dump($_GET);
    // die();
} else {
    echo "<h2>Invalid Data</h2>";
    die();
}

?>

<style>
    .accordion-header{
        padding: 10px !important;
    }
    .accordion-header > button{
       box-shadow: none !important;
    }
    .accordion-header:hover{
        padding: 10px !important;
        border:1px solid #ce3435;
    }
    .accordion-header:active{
        padding: 10px !important;
        border:1px solid #ce3435;
    }
    .accordion-body{
        border: 1px solid lightgray !important;
        padding: 10px !important;
        margin-bottom: 10px !important;
    }
</style>
<div class="closeIcon " style="position: absolute; top:10px; right:10px; z-index:999;">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <!-- <button type="button" class="btn btn-danger btn-close" style="padding: 0px 4px 0px 0px; z-index:999;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
          </button> -->
</div>
<div id="accordionExample">
    <?php

    $n = 0;

    $sqll = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' && type='$typeName'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {
        // output data of each row
        while ($roww = $resultt->fetch_assoc()) {
            $delid = $roww['id'];
            $tpname = $roww['type'];
            
    ?>
            <form action="#" method="post" enctype="multipart/form-data">

                <input style='display:none;' name='iad' value='<?php echo $roww['id']; ?>'>


                <div class="p-3" style="padding-bottom: 30px !important; ">
                    <label>Room:&nbsp; </label><br />
                    <input class='form-control' readonly value='<?php echo $roww['type']; ?>' id='type' name='type'>
                    <div class='container  p-0 '>
                        <div class='row p-0 mt-2 mb-2'>
                            <div class='col-sm'>

                                <label>No. of Rooms:</label>
                                <input type='number' value='<?php echo $roww['numberofrooms']; ?>' required min='0' class='form-control' id='numbs' name='numbs'>

                            </div>


                            <?php

                            $sqllra = "SELECT * FROM disabletwin WHERE hotel='$hotel' && country='$country' && location='$city'  && roomtype='$typeName' Limit 1";
                           
                            $resulttra2 = $conn->query($sqllra);

                            if ($resulttra2->num_rows > 0) {
                                // output data of each row
                                while ($rowwra = $resulttra2->fetch_assoc()) {
                                    $twin = $rowwra['twin'];
                                    $convertible = $rowwra['convertible'];
                                    $disablefriendly = $rowwra['disablefriendly'];
                                }
                            }
                            ?>


                            <div class='col-sm'>

                                <label>Total Twin Rooms:</label>
                                <input type='number' value='<?php echo $twin; ?>' required min='0' class='form-control' id='' name='twin'>

                            </div>

                            <div class='col-sm'>

                                <label>Convertible to Twin:</label>
                                <input type='number' value='<?php echo $convertible; ?>' required min='0' class='form-control' id='' name='convertible'>

                            </div>

                            <div class='col-sm'>

                                <label>Disable Friendly:</label>
                                <input type='number' value='<?php echo $disablefriendly; ?>' required min='0' class='form-control' id='' name='disablefriendly'>

                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <?php
                                    if ($roww['suite'] != 'on') {
                                    ?> <label>Single </label><br />
                                    <?php
                                    } else {
                                    ?>
                                        <label>Details</label>
                                    <?php
                                    }
                                    ?>

                                </button>
                            </h2>
                            <div id="collapseal<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample22">
                                <div class="accordion-body">
                                   
                                        <label>Room Description:</label>
                                        <textarea required class='form-control' id='des' name='singledes'><?php echo $roww['singledescription']; ?></textarea>
                                   
                                  

                                        <div class='row'>
                                            <div class="col-sm">
                                                <label>Maximum Occupancy</label><br />
                                                <label>Adults:</label>
                                                <input class='form-control' type='number' required name='singleadults' value='<?php echo $roww['singleadultoccupancy']; ?>' placeholder='Adults'>
                                            </div>

                                            <div class="col-sm">
                                                <label style='color:white;'>Maximum Occupancy</label><br />
                                                <label>Children:</label>

                                                <input class='form-control' type='number' name='singlechildren' value='<?php echo $roww['singlechildoccupancy']; ?>' placeholder='Children'>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if ($roww['suite'] != 'on') {
                            ?>

                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                        <label>Double</label><br />

                                    </button>
                                </h2>
                                <div id="collapseal2<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample222">
                                    <div class="accordion-body">

                                        <label>Room Description:</label>
                                        <textarea required class='form-control' id='des' name='doubledes'><?php echo $roww['doubledescription']; ?></textarea>
                                       
                                            <div class='row'>
                                                <div class="col-sm">
                                                    <label>Maximum Occupancy</label><br />
                                                    <label>Adults:</label>
                                                    <input class='form-control' type='number' required name='doubleadults' value='<?php echo $roww['doubleadultoccupancy']; ?>' placeholder='Adults'>
                                                </div>

                                                <div class="col-sm">
                                                    <label style='color:white;'>Maximum Occupancy</label><br />
                                                    <label>Children:</label>

                                                    <input class='form-control' type='number' name='doublechildren' value='<?php echo $roww['doublechildoccupancy']; ?>' placeholder='Children'>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal23<?php echo $n; ?>" aria-expanded="false" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Disable Friendly Rooms</label><br />

                                </button>
                            </h2>

                            <div id="collapseal23<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample222">
                                <div class="accordion-body">

                                    <?php

                                    $sqllraza = "SELECT * FROM disabletwindetail WHERE hotel='$hotel' && country='$country' && city='$city'  && roomtype='$tpname'";
                                    $resulttraza = $conn->query($sqllraza);

                                    if ($resulttraza->num_rows > 0) {
                                    ?>
                                        <div class='row'>
                                            <div class='col-sm'>
                                                <label>
                                                    Room Number
                                                </label>
                                            </div>
                                            <div class='col-sm'>
                                                <label>
                                                    Accessibility
                                                </label>
                                            </div>
                                            <div class='col-sm'>
                                                <label>
                                                    Location
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        // output data of each row
                                        while ($rowwraza = $resulttraza->fetch_assoc()) {
                                        ?>
                                            <div class='row'>
                                                <div class='col-sm'>
                                                    <input class='form-control' name='rn[]' value='<?php echo $rowwraza['roomnumber']; ?>'>

                                                </div>
                                                <div class='col-sm'>
                                                    <input class='form-control' name='accessibility[]' value='<?php echo $rowwraza['accessibility']; ?>'>
                                                </div>
                                                <div class='col-sm'>
                                                    <input class='form-control' name='location[]' value='<?php echo $rowwraza['location']; ?>'>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>




                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--  //extras end-->

                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal22<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Amenities</label><br />

                                </button>
                            </h2>
                            <div id="collapseal22<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                                <div class="accordion-body">

                                    <div class="row px-2">
                                        <h5>In Room Facilities</h5>
                                    </div>
                                    <div>
                                        <div id='cardslist' class="container">
                                            <div class='row'>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-between">
                                                            <label for='all'>Select All</label>
                                                            <input id='all' name='all' type='checkbox' class="form-check-input">
                                                        </div>
                                                        <?php
                                                        $string = $roww['inroomfacilities'];
                                                        $str_arr = preg_split("/\,/", $string);
                                                        $sqlv = "SELECT * FROM hotelsdatabaseinroomfacilities";
                                                        $resultv = $conn->query($sqlv);
                                                        if ($resultv->num_rows > 0) {
                                                            // output data of each row
                                                            while ($rowv = $resultv->fetch_assoc()) {
                                                                $nmcr = $rowv['name'];
                                                                if (strpos($string, $nmcr) !== false) {
                                                        ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input checked id="alertcard" name='cards[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input id="alertcard" name='cards[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>

                                                                </div>

                                                                <?php
                                                                }

                                                                ?>





                                                        <?php



                                                            }
                                                        } ?>



                                                        <nonsense id='addnc'>

                                                        </nonsense>

                                                        <div class="row d-flex justify-content-end mt-2 pe-0">
                                                            <input type='submit' class="btn btn-danger col-sm-2" id='pds' onclick='addcardnew()' value='+'>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br />




                                        <div class="row px-2">
                                            <h5>Kitchen Facilities</h5>
                                        </div>
                                        <div id='cardslist' class="container">
                                            <div class='row'>

                                                <div class="col-sm">
                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-between">
                                                            <label for='all2'>Select All</label>
                                                            <input id='all2' name='all' type='checkbox' class="form-check-input">
                                                        </div>
                                                        <?php
                                                        $string = $roww['kitchenfacilities'];
                                                        $str_arr = preg_split("/\,/", $string);
                                                        $sqlv = "SELECT * FROM hotelsdatabasekitchenfacilities";
                                                        $resultv = $conn->query($sqlv);
                                                        if ($resultv->num_rows > 0) {
                                                            // output data of each row
                                                            while ($rowv = $resultv->fetch_assoc()) {
                                                                $nmcr = $rowv['name'];
                                                                if (strpos($string, $nmcr) !== false) {

                                                        ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input checked id="alertcard2" name='cards2[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input id="alertcard2" name='cards2[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>
                                                                <?php
                                                                }

                                                                ?>





                                                        <?php



                                                            }
                                                        } ?>






                                                        <nonsense id='addnc2'>

                                                        </nonsense>

                                                        <div class="row d-flex justify-content-end mt-2 pe-0">
                                                            <input type='submit' class="btn btn-danger col-sm-2" id='pds2' onclick='addcardnew2()' value='+'>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row px-2">
                                            <h5>Private Bathroom Facilities</h5>
                                        </div>
                                        <div id='cardslist' class="container">
                                            <div class='row'>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-between">
                                                            <label for='all3'>Select All</label>
                                                            <input id='all3' name='all' type='checkbox' class="form-check-input">
                                                        </div>
                                                        <?php
                                                        $string = $roww['privatebathroomfacilities'];
                                                        $str_arr = preg_split("/\,/", $string);


                                                        $sqlv = "SELECT * FROM hotelsdatabaseprivatebathroomfacilities";
                                                        $resultv = $conn->query($sqlv);

                                                        if ($resultv->num_rows > 0) {
                                                            // output data of each row
                                                            while ($rowv = $resultv->fetch_assoc()) {

                                                                $nmcr = $rowv['name'];



                                                                if (strpos($string, $nmcr) !== false) {

                                                        ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input checked id="alertcard3" name='cards3[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input id="alertcard3" name='cards3[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>



                                                                <?php
                                                                }

                                                                ?>





                                                        <?php



                                                            }
                                                        } ?>





                                                        <nonsense id='addnc3'>

                                                        </nonsense>

                                                        <div class="row d-flex justify-content-end mt-2 pe-0">
                                                            <input type='submit' class="btn btn-danger col-sm-2" id='pds3' onclick='addcardnew3()' value='+'>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <br />


                                      








                                        <div class="row px-2">
                                            <h5>Complimentary Facilities</h5>
                                        </div>
                                        <div id='cardslist' class="container">
                                            <div class='row'>

                                                <div class="col-sm">

                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-between">
                                                            <label for='all5'>Select All</label>
                                                            <input id='all5' name='all' type='checkbox' class="form-check-input">
                                                        </div>



                                                        <?php
                                                        $string = $roww['complimentaryfacilities'];
                                                        $str_arr = preg_split("/\,/", $string);


                                                        $sqlv = "SELECT * FROM hotelsdatabasecomplimentaryfacilities";
                                                        $resultv = $conn->query($sqlv);

                                                        if ($resultv->num_rows > 0) {
                                                            // output data of each row
                                                            while ($rowv = $resultv->fetch_assoc()) {

                                                                $nmcr = $rowv['name'];



                                                                if (strpos($string, $nmcr) !== false) {

                                                        ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input checked id="alertcard5" name='cards5[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>    

                                                                <?php
                                                                } else {
                                                                ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input id="alertcard5" name='cards5[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>

                                                                </div>

                                                                <?php
                                                                }

                                                                ?>

                                                        <?php
                                                            }
                                                        } ?>
                                                        <nonsense id='addnc5'>
                                                        </nonsense>
                                                        <div class="row d-flex justify-content-end mt-2 pe-0">
                                                            <input type='submit' id='pds5' class="btn btn-danger mt-2 col-sm-2" onclick='addcardnew5()' value='+'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                          <div class="row px-2">
                                            <h5>Accessibility</h5>
                                        </div>
                                        <div id='cardslist' class="container">
                                            <div class='row'>

                                                <div class="col-sm">

                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-between">
                                                            <label for='all6'>Select All</label>
                                                            <input id='all6' name='all' type='checkbox' class="form-check-input">
                                                        </div>



                                                        <?php
                                                        $string = $roww['accessibilityfacilities'];
                                                        $str_arr = preg_split("/\,/", $string);


                                                        $sqlv = "SELECT * FROM hotelsdatabaseaccessibilityfacilities";
                                                        $resultv = $conn->query($sqlv);

                                                        if ($resultv->num_rows > 0) {
                                                            // output data of each row
                                                            while ($rowv = $resultv->fetch_assoc()) {

                                                                $nmcr = $rowv['name'];



                                                                if (strpos($string, $nmcr) !== false) {

                                                        ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input checked id="alertcard6" name='cards6[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                                                                </div>    

                                                                <?php
                                                                } else {
                                                                ?>
                                                                <div class="col-md-6 d-flex justify-content-between">
                                                                    <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                                    <input id="alertcard6" name='cards6[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>

                                                                </div>

                                                                <?php
                                                                }

                                                                ?>

                                                        <?php
                                                            }
                                                        } ?>
                                                        <nonsense id='addnc6'>
                                                        </nonsense>
                                                        <div class="row d-flex justify-content-end mt-2 pe-0">
                                                            <input type='submit' id='pds6' class="btn btn-danger mt-2 col-sm-2" onclick='addcardnew6()' value='+'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br /><br />
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--Cancellation Policies-->
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2o2<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Cancellation Policy</label><br />

                                </button>
                            </h2>
                            <div id="collapseal2o2<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                                <div class="accordion-body">

                                    <?php

                                    $priordays = $roww['cancellationdays'];
                                    $deductionprice = $roww['cancellationpercentage'];



                                    $names = explode('_@_', $roww['cancellationpoliciesnames']);
                                    $policies = explode('_@_', $roww['cancellationpolicy']);
                                    $o = 0;
                                    ?>
                                    <label>Cancellation Prior Days</label>
                                    <input name='priordays' class='form-control' value='<?php echo $priordays; ?>'>
                                    <label>Cancellation Percentage Deduction</label>
                                    <input name='deductionprice' class='form-control' value='<?php echo $deductionprice; ?>'>
                                    <?php
                                    foreach ($names as $n2) {
                                    ?>
                                        <label><?php echo $n2; ?></label>
                                        <textarea class='form-control' name='policies[]' placeholder='Cancellation Policy'><?php echo $policies[$o]; ?></textarea>
                                    <?php
                                        $o = $o + 1;
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--Cancellation Policies-->
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseChild<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Child Policy</label><br />

                                </button>
                            </h2>
                            <div id="collapseChild<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#collapseChild<?php echo $n; ?>">
                                <div class="accordion-body">
                                    <?php
                                    $priordays = $roww['cancellationdays'];
                                    $deductionprice = $roww['cancellationpercentage'];



                                    $names = explode('_@_', $roww['cancellationpoliciesnames']);
                                    $policies = explode('_@_', $roww['cancellationpolicy']);
                                    $o = 0;
                                    ?>
                                    <label>Cancellation Prior Days</label>
                                    <input name='priordays' class='form-control' value='<?php echo $priordays; ?>'>
                                    <label>Cancellation Percentage Deduction</label>
                                    <input name='deductionprice' class='form-control' value='<?php echo $deductionprice; ?>'>
                                    <?php
                                    foreach ($names as $n3) {
                                    ?>
                                        <label><?php echo $n3; ?></label>
                                        <textarea class='form-control' name='policies[]' placeholder='Cancellation Policy'><?php echo $policies[$o]; ?></textarea>
                                    <?php
                                        $o = $o + 1;
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--Cancellation Policies-->
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2o222<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Supplements</label><br />

                                </button>
                            </h2>
                            <div id="collapseal2o222<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Breackfast">
                                        <label class="form-check-label" for="Breackfast">Breackfast</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Lunch">
                                        <label class="form-check-label" for="Lunch">Lunch</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Dinner">
                                        <label class="form-check-label" for="Dinner">Dinner</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Extra bed">
                                        <label class="form-check-label" for="Extra bed">Extra bed</label>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--Cancellation Policies-->
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2o2222<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                    <label>Child Supplements</label><br />

                                </button>
                            </h2>
                            <div id="collapseal2o2222<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Breackfast">
                                        <label class="form-check-label" for="Breackfast">Breackfast</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Lunch">
                                        <label class="form-check-label" for="Lunch">Lunch</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Dinner">
                                        <label class="form-check-label" for="Dinner">Dinner</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="FoodSuppliments[]" type="checkbox" value="Extra bed">
                                        <label class="form-check-label" for="Extra bed">Extra bed</label>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>
                    </div>




                    <br />

                    <label>Room Images:</label><br />
                    <div class="row">
                    <?php

                    $tpe = $roww['type'];

                    $sqllv = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$tpe'";
                    $resulttv = $conn->query($sqllv);

                    if ($resulttv->num_rows > 0) {
                        // output data of each row
                        while ($rowwv = $resulttv->fetch_assoc()) {
                            $aid = $rowwv['id'];

                    ?>
                            <div class="col-sm-2" style="position:relative;">
                                <a href='del.php?tbl=hotelsInventoryImagesdatabase&aid=<?php echo $aid; ?>'><b>
                                    <span style='font-size:2em; position:absolute; z-index:1; color:red; left:20px;'>&times;</span></b> 
                                </a>
                                <img style="object-fit:cover; width:100%; height:100%;" class="rounded" src='../Room Uploads/<?php echo $hotel; ?>/<?php echo $tpe; ?>/<?php echo $rowwv['image']; ?>'>
                            </div>
                    <?php

                        }
                    }
                    ?>
                    </div>
                    <br /><br />

                    <label>Add More Images:</label><br />

                    <input type="file" multiple='true' class="form-control" name="files[]">






                    <div class="form-group">
                        <br /><br />
                        <a href='del.php?tbl=hotelsInventorydatabase&aid=<?php echo $delid; ?>'><button style="float:left;" class="btn btn-danger">Delete</button></a>


                        <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Update</button>
                    </div>
                    <br />


                </div>




            </form>


    <?php
            $n = $n + 1;
        }
    }
    ?>
    <input style='display:none;' name='counter' value='<?php echo $n; ?>'>

</div>

<script>
    document.getElementById("pds").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew() {
      var parent = document.getElementById("addnc");





      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards[]');


      parent.appendChild(inpt);

    }

    $("#all").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>





  <!--kitchen-->




  <script>
    document.getElementById("pds2").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew2() {
      var parent = document.getElementById("addnc2");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards2[]');


      parent.appendChild(inpt);

    }

    $("#all2").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard2']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>
















  <!--bathroom-->




  <script>
    document.getElementById("pds3").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew3() {
      var parent = document.getElementById("addnc3");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards3[]');


      parent.appendChild(inpt);

    }

    $("#all3").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard3']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>






  <!--discounted-->




  <script>
    document.getElementById("pds4").addEventListener("click", function(event) {
      event.preventDefault()
    });


    /*
    function addcardnew4(){
       var parent=document.getElementById("addnc4");
       
       var inpt=document.createElement('INPUT');
       inpt.setAttribute('name','cards4[]');
       
       
       parent.appendChild(inpt);
        
    }*/

    $("#all4").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard4']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>










  <!--Complimentary-->




  <script>
    document.getElementById("pds5").addEventListener("click", function(event) {
      event.preventDefault()
    });
 document.getElementById("pds6").addEventListener("click", function(event) {
      event.preventDefault()
    });


 function addcardnew6() {
      var parent = document.getElementById("addnc6");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards6[]');


      parent.appendChild(inpt);

    }
    
    
        $("#all6").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard6']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
    
    
    
    function addcardnew5() {
      var parent = document.getElementById("addnc5");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards5[]');


      parent.appendChild(inpt);

    }

    $("#all5").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard5']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>