<?php

session_start();

$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$stars = $_SESSION['star'];


$numbers = array();
$releasedays = array();
$sdate = array();
$edate = array();


$srates = array();
$breakfastincl = array();
$lunchincl = array();
$dinnerincl = array();
$drates = array();
$sdatefromrates = array();
$edatefromrates = array();
$eventname= array();

include 'db_connection.php';
$sql = "SELECT * FROM basiccharges WHERE hotel='$hotel' && country='$country' && location='$city'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $breakfast = $row['breakfast'];

        $lunch = $row['lunch'];

        $dinner = $row['dinner'];

        $extrabed = $row['extrabed'];

        $childbed = $row['childbed'];

        $babycot = $row['babycot'];
    }
}


$sql = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && class=''";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


array_push($eventname, array($row['name'] => $row['event']));

        if ($row['sellprice'] == '') {
            array_push($srates, array($row['name'] => '-'));
        } else {
            array_push($srates, array($row['name'] => $row['sellprice']));
        }



        if ($row['breakfast'] == '') {
            array_push($breakfastincl, array($row['name'] => '-'));
        } else {
            array_push($breakfastincl, array($row['name'] => $row['breakfast']));
        }


        if ($row['lunch'] == '') {
            array_push($lunchincl, array($row['name'] => '-'));
        } else {
            array_push($lunchincl, array($row['name'] => $row['lunch']));
        }

        if ($row['dinner'] == '') {
            array_push($dinnerincl, array($row['name'] => '-'));
        } else {
            array_push($dinnerincl, array($row['name'] => $row['dinner']));
        }






        if ($row['dblsellprice'] == '') {
            array_push($drates, array($row['name'] => '-'));
        } else {
            array_push($drates, array($row['name'] => $row['dblsellprice']));
        }


        if ($row['sdate'] == '') {
            array_push($sdatefromrates, array($row['name'] => '-'));
        } else {
            array_push($sdatefromrates, array($row['name'] => $row['sdate']));
        }




        if ($row['edate'] == '') {
            array_push($edatefromrates, array($row['name'] => '-'));
        } else {
            array_push($edatefromrates, array($row['name'] => $row['edate']));
        }
    }
}









































$sql = "SELECT * FROM logos WHERE hotel='$hotel' && country='$country' && city='$city' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        $logo = $row['image'];
    }
}


$sql = "SELECT * FROM roomnumbers WHERE hotel='$hotel' && country='$country' && location='$city'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        if ($row['number'] == '') {
            array_push($numbers, array($row['name'] => '-'));
        } else {
            array_push($numbers, array($row['name'] => $row['number']));
        }


        if ($row['releasedate'] == '') {
            array_push($releasedays, array($row['name'] => '-'));
        } else {
            array_push($releasedays, array($row['name'] => $row['releasedate']));
        }


        if ($row['sdate'] == '') {
            array_push($sdate, array($row['name'] => '-'));
        } else {
            array_push($sdate, array($row['name'] => $row['sdate']));
        }


        if ($row['edate'] == '') {
            array_push($edate, array($row['name'] => '-'));
        } else {
            array_push($edate, array($row['name'] => $row['edate']));
        }
    }
}




$sql = "SELECT * FROM hotelsdatabase WHERE name='$hotel' && country='$country' && city='$city' && star='$stars'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        $address = $row['address'];
        $telephone = $row['telephone'];
        $email = $row['email'];
    }
}




$types = array();
$views = array();
$sao = array();
$sco = array();

$dao = array();
$dco = array();

$cancellationpolicyname = array();
$cancellationpolicy = array();

$cancellationdays = array();
$cancellationpercentage = array();





$childages=array();
$childpercentages=array();
$childdescriptions=array();
$cancellationdescriptions=array();









$sql = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        array_push($types, $row['type']);

        if ($row['view'] == '') {
            array_push($views, '-');
        } else {
            array_push($views, $row['view']);
        }


        if ($row['singleadultoccupancy'] == '') {
            array_push($sao, '-');
        } else {
            array_push($sao, $row['singleadultoccupancy']);
        }


        if ($row['singlechildoccupancy'] == '') {
            array_push($sco, '-');
        } else {
            array_push($sco, $row['singlechildoccupancy']);
        }












        if ($row['doubleadultoccupancy'] == '') {
            array_push($dao, '-');
        } else {
            array_push($dao, $row['doubleadultoccupancy']);
        }


        if ($row['doublechildoccupancy'] == '') {
            array_push($dco, '-');
        } else {
            array_push($dco, $row['doublechildoccupancy']);
        }













if ($row['childage'] == '') {
            array_push($childages, '-');
        } else {
            array_push($childages, $row['childage']);
        }



if ($row['childpercentage'] == '') {
            array_push($childpercentages, '-');
        } else {
            array_push($childpercentages, $row['childpercentage']);
        }




if ($row['childdescription'] == '') {
            array_push($childdescriptions, '-');
        } else {
            array_push($childdescriptions, $row['childdescription']);
        }





if ($row['cancellationdescription'] == '') {
            array_push($cancellationdescriptions, '-');
        } else {
            array_push($cancellationdescriptions, $row['cancellationdescription']);
        }










        if ($row['cancellationpoliciesnames'] == '') {
            array_push($cancellationpolicyname, '-');
        } else {
            array_push($cancellationpolicyname, $row['cancellationpoliciesnames']);
        }

        if ($row['cancellationpolicy'] == '') {
            array_push($cancellationpolicy, '-');
        } else {
            array_push($cancellationpolicy, $row['cancellationpolicy']);
        }

        if ($row['cancellationdays'] == '') {
            array_push($cancellationdays, '-');
        } else {
            array_push($cancellationdays, $row['cancellationdays']);
        }

        if ($row['cancellationpercentage'] == '') {
            array_push($cancellationpercentage, '-');
        } else {
            array_push($cancellationpercentage, $row['cancellationpercentage']);
        }
    }
}




//increase logo row span as much as entries of rows of release from and to increase for example if there are population of 2 rows by sql database for it... 2 rowspans in logo will increase as well

?>



















<?php

$keys = array();
$sdatesall = array();
$edatesall = array();
$sratesall = array();
$eventnameall = array();

//$edatesall=array();






$a = 0;
foreach ($sdatefromrates as $sd) {


    $b = 0;

    $ed = $edatefromrates[$a];
     $en = $eventname[$a];
    $sr = $srates[$a];
    $dr = $drates[$a];

    foreach ($sd as $key => $s) {

        foreach ($ed as $key2 => $e) {
        
        foreach($en as $key99 => $enn)
{

        

            foreach ($sr as $key3 => $srr) {

                foreach ($dr as $key4 => $drr) {

                    if ($key2 == $key && $key3 == $key && $key4 == $key) {

                        array_push($sratesall, $srr);
                        array_push($dratesall, $drr);

                        array_push($keys, $key);

                        array_push($sdatesall, $s);
                        
                        array_push($eventnameall, $enn);
                        
                        array_push($edatesall, $e);
                    }
                    
                }
                }
            }
        }








        $b = $b + 1;
    }
    $a = $a + 1;
}



















$allinone = array();
foreach ($types as $t) {

    $kkk = 0;
    foreach ($keys as $k) {

        if ($k == $t) {
            array_push($allinone, array($t => '' . $kkk));
        }
        $kkk = $kkk + 1;
    }
}










$strarray = array();
$keyvaluee = '';
$actualkeyvalue = '';
$actualval = '';
$str = '';
$checkerd = 0;

array_push($allinone, array(aa => 'asdfaefs'));

foreach ($allinone as $aa) {
    foreach ($aa as $keyv => $a) {



        if ($keyv !== $keyvaluee) {



            $keyvaluee = $keyv;


            if ($checkerd != 0) {


                array_push($strarray, $str);
                $str = '';
            } else {
                $str = '';
            }



            $checkerd = $checkerd + 1;
        }



        if ($str == '') {
            $str = '' . $a;
        } else {
            $str = $str . ',' . $a;
        }
    }
}

//echo $str;


//var_dump($strarray);





$pricesarray = array();

foreach ($strarray as $std) {


    $temparray = array();
    $im = explode(',', $std);


    foreach ($im as $i) {

        //echo $i;

        //echo $sratesall[$i];
        array_push($temparray, $sratesall[$i]);
    }

    array_push($pricesarray, $temparray);
}







$sdatesarray = array();

foreach ($strarray as $std) {


    $temparray = array();
    $im = explode(',', $std);


    foreach ($im as $i) {

        //echo $i;

        //echo $sratesall[$i];
        array_push($temparray, $sdatesall[$i]);
    }

    array_push($sdatesarray, $temparray);
}





$edatesarray = array();

foreach ($strarray as $std) {


    $temparray = array();
    $im = explode(',', $std);


    foreach ($im as $i) {

        //echo $i;

        //echo $sratesall[$i];
        array_push($temparray, $edatesall[$i]);
    }

    array_push($edatesarray, $temparray);
}





//var_dump($pricesarray);




foreach ($pricesarray as $pa) {



    // Unique values
    $unique = array_unique($pa);
    // Duplicates
    $duplicates = array_diff_assoc($pa, $unique);
    // Unique values
    $result = array_diff($unique, $duplicates);
    // Get the unique keys
    $unique_keys = array_keys($result);
    // Get duplicate keys
    $duplicate_keys = array_keys(array_intersect($pa, $duplicates));
}










$allsamechabis = array();
$kk = 0;
foreach ($keys as $k) {





    $kk = $kk + 1;
}














?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || View Inventory
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style type="text/css">
    body,
    div,
    table,
    thead,
    tbody,
    tfoot,
    tr,
    th,
    td,
    p {}

    a.comment-indicator:hover+comment {
        background: #ffd;
        position: absolute;
        display: block;
        border: 1px solid black;
        padding: 0.5em;
    }

    a.comment-indicator {
        background: red;
        display: inline-block;
        border: 1px solid black;
        width: 0.5em;
        height: 0.5em;
    }

    comment {
        display: none;
    }
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div style='overflow-x: scroll;' id="bookingsTable">

    <table class='table table-bordered'>
        <tbody id="">
            <tr>
                <td rowspan="10" colspan="7"> <br /><br /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../Hotel Logos/<?php echo $hotel; ?>/<?php echo $logo; ?>' style='max-width:200px; max-height:100px;'> </td>
                <td><b>Hotel</b></td>
                <td colspan="4"><?php echo $hotel; ?></td>
                <td></td>
                <td><b>Telephone</b></td>
                <td colspan="4"><?php echo $telephone; ?></td>
                <td></td>
                <td><b>Gen Tel</b></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td><b>Stars</b></td>
                <td colspan="4"><?php echo $stars; ?></td>
                <td></td>
                <td><b>HCT Staff</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Gen Fax</b></td>
                <td colspan="7"></td>

            </tr>
            <tr>
                <td><b>Address</b></td>
                <td colspan="4"><?php echo $address; ?></td>
                <td></td>
                <td><b>Created</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Gen Email</b></td>
                <td colspan="7"><?php echo $email; ?></td>


            </tr>
            <tr>
                <td><b>PO Box</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Updated</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Res Tel</b></td>
                <td colspan="7"></td>



            </tr>



            <tr>


                <td><b>City</b></td>
                <td colspan="4"><?php echo $city; ?></td>
                <td></td>
                <td><b>City Code</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Res Fax</b></td>
                <td colspan="7"></td>



            </tr>
            <tr>


                <td><b>Website</b></td>
                <td colspan="4"></td>
                <td></td>
                <td><b>Country</b></td>
                <td colspan="4"><?php echo $country; ?></td>
                <td></td>
                <td><b>Res Email</b></td>
                <td colspan="7"></td>



            </tr>
            <tr>




                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>



            </tr>


        </tbody>
    </table>


    <?php
    $arraymerged = array();
    $man = 0;
    foreach ($sdatesall as $sda) {


        array_push($arraymerged, $sdatesall[$man] . '_@_' . $edatesall[$man]);

        $man = $man + 1;
    }


    $resultmerged = array_unique($arraymerged);
    //


    $startdates = array();
    $enddates = array();


    foreach ($resultmerged as $mm) {

        $full = explode('_@_', $mm);
        array_push($startdates, $full[0]);
        array_push($enddates, $full[1]);
    }
    //var_dump($startdates);

    ?>






    <table class='table table-bordered'>






        <tr style='background-color:black; color:white;'>


            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td colspan='2000'>Date Bands</td>





        </tr>


        <tr style='background-color:gold; color:black;'>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>


            <?php
            $mama = 0;
            foreach ($startdates as $sda) {

            ?>
                <td><b>Per</b></td>
                <td><b>From</b></td>
                <td><b>To</b></td>

                <td><b>Event Name</b></td>


            <?php

                $mama = $mama + 1;
            }
            ?>





        </tr>


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <?php
            $mama = 0;
            foreach ($startdates as $sda) {

            ?>
                <td>Unit</td>
                <td><?php echo $startdates[$mama]; ?></td>
                <td><?php echo $enddates[$mama]; ?></td>
                <td><?php echo $eventnameall[$mama]; ?></td>




            <?php

                $mama = $mama + 1;
            }
            ?>


        </tr>

        <tr>




            <td style='background-color:gold;' rowspan='2' colspan='2'>Room Type</td>
            <td style='background-color:gold;' rowspan='2'>View</td>
            <td style='background-color:gold;' colspan='3'> Occupancy</td>
            <td style='background-color:gold;' rowspan='2'>Allocation</td>





        </tr>
        <tr style='background-color:gold;'>





            <td>Adult</td>
            <td>Children</td>
            <td>&nbsp;&nbsp;&nbsp;Max&nbsp;&nbsp;&nbsp;</td>


            <?php
            $mama = 0;
            foreach ($startdates as $sda) {

            ?>
                <td>Release</td>
                <td colspan='2'>Rate</td>
                <td>Basis</td>

            <?php

                $mama = $mama + 1;
            }
            ?>

        </tr>


        <?php
        $n = 0;
        foreach ($types as $type) {
        ?>
            <tr>
                <td rowspan='2' colspan='2'><?php echo $type; ?></td>
                <td rowspan='2'><?php echo $views[$n]; ?></td>
                <td><?php echo $sao[$n]; ?></td>
                <td><?php echo $sco[$n]; ?></td>
                <td><?php echo $sao[$n] . ' + ' . $sco[$n]; ?></td>
                <td rowspan="2">



                    <?php
                    $actualnumbersall = 0;
                    $sql = "SELECT * FROM roomnumbers WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            $actualnumbersall = $actualnumbersall + intval($row['actualnumber']);
                        }
                    }

                    echo $actualnumbersall;
                    ?>


                </td>



                <?php
                $mama = 0;
                foreach ($startdates as $sda) {

                ?>

                    <td rowspan='2'>




                        <?php
                        $releases = 0;
                        $sql = "SELECT * FROM roomnumbers WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type' && sdate='$startdates[$mama]' && edate='$enddates[$mama]'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $releases = intval($row['releasedate']);
                            }
                        }

                        echo $releases;
                        ?>



                    </td>
                    <td colspan='2'>




                        <?php
                        $singleratea = 0;
                        $sql = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type' && class='' && sdate='$startdates[$mama]' && edate='$enddates[$mama]'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $singleratea = intval($row['sellprice']);
                            }
                        }

                        if ($singleratea == 0) {
                            echo '-';
                        } else {
                            echo $singleratea;
                        }
                        ?>




                    </td>
                    <td>

                        <?php
                        $bf = '';
                        $ln = '';
                        $din = '';

                        $sql = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type' && sdate='$startdates[$mama]' && edate='$enddates[$mama]'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $bf = $row['breakfast'];
                                $ln = $row['lunch'];
                                $din = $row['dinner'];
                            }
                        }


                        if ($bf == 'included' && $ln == 'included' && $din == 'included') {
                            echo 'Full Board';
                        } else if ($bf == 'included' && $ln == 'included' && $din == '') {
                            echo 'Half Board';
                        } else if ($bf == 'included' && $ln == '' && $din == '') {
                            echo 'BB';
                        } else if ($bf == '' && $ln == '' && $din == '') {
                            echo 'RO';
                        }
                        ?>





                    </td>
                <?php
                    $mama = $mama + 1;
                }
                ?>
            </tr>



            <tr>

                <td><?php echo $dao[$n]; ?></td>
                <td><?php echo $dco[$n]; ?></td>
                <td><?php
                    if ($dao[$n] == '-' && $dco[$n] == '-') {
                        echo '-';
                    } else {
                        echo $dao[$n] . ' + ' . $dco[$n];
                    }

                    ?></td>


                <?php
                $mama = 0;
                foreach ($startdates as $sda) {

                ?>

                    <td colspan='2'>


                        <?php
                        $doubleratea = 0;
                        $sql = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type' && sdate='$startdates[$mama]' && edate='$enddates[$mama]'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $doubleratea = intval($row['dblsellprice']);
                            }
                        }

                        if ($doubleratea == 0) {
                            echo '-';
                        } else {
                            echo $doubleratea;
                        }
                        ?>



                    </td>
                    <td>


                        <?php
                        $bf = '';
                        $ln = '';
                        $din = '';

                        $sql = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$type' && sdate='$startdates[$mama]' && edate='$enddates[$mama]'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $bf = $row['breakfast'];
                                $ln = $row['lunch'];
                                $din = $row['dinner'];
                            }
                        }


                        if ($bf == 'included' && $ln == 'included' && $din == 'included') {
                            echo 'Full Board';
                        } else if ($bf == 'included' && $ln == 'included' && $din == '') {
                            echo 'Half Board';
                        } else if ($bf == 'included' && $ln == '' && $din == '') {
                            echo 'BB';
                        } else if ($bf == '' && $ln == '' && $din == '') {
                            echo 'RO';
                        }
                        ?>




                    </td>
                <?php
                    $mama = $mama + 1;
                }
                ?>
            </tr>




        <?php
            $n = $n + 1;
        }
        ?>



    </table>















    <div style='padding-top:0;' class='row'>
        <div style='padding-right:0;' class='col-sm'>
            <table class='table table-bordered'>

                <tr>
                    <td style='background-color:gold;' rowspan='2' colspan='3'><b>
                            Promotions / Supplements
                        </b>
                    </td>
                    <td style='background-color:gold;' colspan='2'><b>
                            Dates
                        </b>
                    </td>
                    <td style='background-color:gold;' rowspan='2'><b>
                            Rates / % / P & S
                        </b>
                    </td>
                    <td style='background-color:gold;' rowspan='2'><b>
                            Offer
                        </b>
                    </td>




                </tr>

                <tr>


                    <td style='background-color:gold;'><b>From</b></td>
                    <td style='background-color:gold;'><b>To</b></td>



                </tr>

                <tr>
                    <td>
                    </td>

                    <td colspan='2'></td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>


                <tr>
                    <td align='center' style='color:white; background-color:black;' colspan='7'><b>
                            Notes
                        </b>
                    </td>
                </tr>

                <tr>
                    <td>1</td>

                    <td colspan='6'></td>
                </tr>



            </table>
        </div>


        <div style='padding-left:0;' class='col-sm'>
            <table class='table table-bordered'>

                <tr style='color:white; background-color:black;'>
                    <td><b>Room Type</b></td>
                    <td colspan='17'><b>
                            Policies
                        </b>
                    </td>
                    <td>
                        <b>
                            Prior Days
                        </b>
                    </td>

                    <td>
                        <b>
                            Deduction
                        </b>
                    </td>

                   
  <td>
                        <b> 
 Child Age upto
 </b>
                    </td>
  <td>
       <b>
Rate Percentage
 </b>
                    </td>


                </tr>

                <?php
                $n2 = 0;
                foreach ($types as $type) {
                ?>

                    <tr>

                        <td><?php echo $type; ?></td>
                        <td colspan='17'>

                            <?php
                            
                            
                            
                            
                            
                            
                            
                                
                            $cod = explode('_@_', $cancellationdescriptions[$n2]);
                            $cohd = explode('_@_', $childdescriptions[$n2]);
                            $nn = 0;
                            foreach ($cod as $name) {
                                 if($name=='-')
                                {}
                                else{
                                echo $name;
                                 echo '</br>';
                                }
                               

                                $nn = $nn + 1;
                            }
                            
                            $nn = 0;
                            foreach ($cohd as $name) {
                                if($name=='-')
                                {}
                                else{
                                echo $name;
                                echo '</br>';
                                }
                                

                                $nn = $nn + 1;
                            }

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            $cn = explode('_@_', $cancellationpolicyname[$n2]);
                            $cp = explode('_@_', $cancellationpolicy[$n2]);

                            $nn = 0;
                            foreach ($cn as $name) {
                                echo '<b>' . $name . ':</b> ';
                                echo $cp[$nn];
                                echo '</br>';

                                $nn = $nn + 1;
                            }
                            ?>

                        </td>

                        <td>
                            <?php $cd=explode(",",$cancellationdays[$n2]); 
                            
                            foreach($cd as $cc)
                            {
                                echo $cc;
                                echo '<br/>';
                            }
                            
                            ?>

                        </td>
                        <td>
                            
                            <?php $cd=explode(",",$cancellationpercentage[$n2]); 
                            
                            foreach($cd as $cc)
                            {
                                
                          
                           echo $cc; 
                           
                           
                            if (ctype_alpha($cc)) {
                                echo '';
                            } else if (strpos($cc, '%') !== false) {
                                echo '';
                            } else {
                                echo '%';
                            }
                            
                                echo '<br/>';
                            }
                            
                            ?>
                            
                            
                            
                            
                        </td>
                        <td>
                            
                             <?php $ca=explode(",",$childages[$n2]); 
                            
                            foreach($ca as $cc)
                            {
                                
                          
                           echo $cc; 
                           
                           
                                echo '<br/>';
                            }
                            
                            ?>
                            
                            
                            
                        </td>
                        
                        
                        <td>
                                
                             <?php $ca=explode(",",$childpercentages[$n2]); 
                            
                            foreach($ca as $cc)
                            {
                                
                          if($cc=='-')
                          {
                              echo $cc;
                          }
                          else{
                           echo $cc.'%'; 
                          }
                           
                                echo '<br/>';
                            }
                            
                            ?>
                            
                        </td>

                    </tr>
                <?php

                    $n2 = $n2 + 1;
                }
                ?>

                <tr>
                    <td style='color:white; background-color:black;' colspan='22'><b>
                            Supplements
                        </b>
                    </td>

                <tr>

                    <td colspan='4'>Breakfast</td>
                    <td colspan='18'><?php echo $breakfast; ?></td>

                </tr>
                <tr>

                    <td colspan='4'>Lunch</td>
                    <td colspan='18'><?php echo $lunch; ?></td>



                </tr>
                <tr>

                    <td colspan='4'>Dinner</td>
                    <td colspan='18'><?php echo $dinner; ?></td>

                </tr>
                <tr>

                    <td colspan='4'>Extra Bed</td>
                    <td colspan='18'><?php echo $extrabed; ?></td>



                </tr>




                <tr>

                    <td colspan='4'>Child Bed</td>
                    <td colspan='18'><?php echo $childbed; ?></td>


                </tr>

                <tr>

                    <td colspan='4'>Baby Cot</td>
                    <td colspan='18'><?php echo $babycot; ?></td>



                </tr>


                </tr>




            </table>
        </div>

    </div>

</div>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
    $(document).ready(function() {
        var tableWidth = $('#bookingsTable').width();
        if (tableWidth > 1190) {
            $(".toggle-icon").click();
        }
    });
</script>

<?php endblock(); ?>