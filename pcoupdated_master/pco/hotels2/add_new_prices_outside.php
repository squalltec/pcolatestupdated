<?php
session_start();
require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

if (isset($_POST['submit'])) {

    $newsdate = $_POST['sdate'];
    $newedate = $_POST['edate'];
    $mars = 0;
    foreach ($newsdate as $maer) {
        $sdate = $newsdate[$mars];
        $edate = $newedate[$mars];
        $tt2 = $_POST['taxes'];
        $tt = implode(",", $tt2);
        $room = $_POST['room'];
        $number = $_POST['number'];
        $release = $_POST['release'];
        $minimumstay = $_POST['minimumstay'];
        $single = $_POST['single'];
        $double = $_POST['double'];
        $commisionable = $_POST['commisionable'];
        $commision = $_POST['commision'];
        $class = 'FIT';
        $n = 0;
        foreach ($number as $value) {
            if ($value == '') {
            } else {


                $date = date('Y-m-d');
                $newdate = date('Y-m-d', strtotime($date . ' + ' . $release[$n] . 'days'));


                $samerand = rand(10000, 100000000000);

                $sql2 = "INSERT INTO setprices (hotel,country,location,name,sellprice,dblsellprice,sdate,edate,class,releasedays,dates,commisionable,commision,including,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$single[$n]','$double[$n]','$sdate','$edate','$class','$release[$n]','$newdate','$commisionable[$n]','$commision[$n]','$tt','$samerand')";

                $resulta2 = $conn->query($sql2);


                if ($resulta2 === TRUE) {
                }



                $sql2 = "INSERT INTO roomnumbers (hotel,country,location,name,number,actualnumber,releasedate,dates,sdate,edate,minimumstay,class,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$number[$n]','$number[$n]','$release[$n]','$newdate','$sdate','$edate','$minimumstay[$n]','$class','$samerand')";

                $resulta2 = $conn->query($sql2);


                if ($resulta2 === TRUE) {

                    $_SESSION['alertme'] = '1';

                    $_SESSION['decision'] = '1';
                }





                $n = $n + 1;
            }
        }




        $mars = $mars + 1;
    }
}










if (isset($_POST['submitt'])) {

    $tt2 = $_POST['taxes'];
    $tt = implode(",", $tt2);
    $room = $_POST['room'];
    $number = $_POST['number'];
    $release = $_POST['release'];
    $minimumstay = $_POST['minimumstay'];
    $single = $_POST['single'];
    $double = $_POST['double'];
    $commisionable = $_POST['commisionable'];
    $commision = $_POST['commision'];
    $class = 'TOY';
    $n = 0;
    foreach ($number as $value) {
        if ($value == '') {
        } else {





            $samerand = rand(10000, 100000000000);

            $sql2 = "INSERT INTO setprices (hotel,country,location,name,sellprice,dblsellprice,class,commisionable,commision,including,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$single[$n]','$double[$n]','$class','$commisionable[$n]','$commision[$n]','$tt','$samerand')";

            $resulta2 = $conn->query($sql2);


            if ($resulta2 === TRUE) {
            }

            $date = date('Y-m-d');
            $newdate = date('Y-m-d', strtotime($date . ' + ' . $release[$n] . 'days'));


            $sql2 = "INSERT INTO roomnumbers (hotel,country,location,name,number,actualnumber,releasedate,dates,sdate,edate,minimumstay,class,sameid)
           VALUES ('$hotel','$country','$city','$room[$n]','$number[$n]','$number[$n]','$release[$n]','$newdate','$sdate','$edate','$minimumstay[$n]','$class','$samerand')";

            $resulta2 = $conn->query($sql2);


            if ($resulta2 === TRUE) {

                $_SESSION['alertme'] = '1';

                $_SESSION['decision'] = '1';
            }
        }


        $n = $n + 1;
    }
}










?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connet || Add New Prices
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;

    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 2px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .PositionRelative {
        position: relative;
    }

    .PositionTopRight {
        position: absolute;
        right: 0;
        top: 0;
    }
</style>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add New FIT Prices</div>
</div>
<div class="card">
    <div class="card-body">

        <input style='display:none;' value='<?php echo $_SESSION['decision'] ?>' id='decision'>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class='row'>
                <div class="col-sm">
                    <label>Starting Date</label>
                    <input type='date' required class='form-control' id='sdate' name='sdate[]' value='<?php echo ''; ?>'>
                </div>
                <div class="col-sm">
                    <label>Ending Date</label>
                    <input type='date' required class='form-control' id='edate' name='edate[]' value='<?php echo ''; ?>'>
                </div>
            </div>


            <nonsense id='popler'>

            </nonsense>



            <h1 align='center'><button class='btn btn-danger' id='addact2new' onclick="myFunction2new()">+</button></h1>




            <div class='row'>


                <div class="col-sm">
                    <label>Pricing</label>
                    <table>
                        <tr style="background-color: #ce3435; color:white;">
                            <th>Room Type</th>
                            <th>Allotment</th>
                            <th>Release Days</th>
                            <th>Minimum Stay</th>
                            <th>Single Price</th>
                            <th>Double Price</th>
                            <th>Commisionable?</th>
                            <th style='display:none;' id='cms'>Commision %</th>
                        </tr>

                        <?php
                        $a = 0;
                        $nu = 0;
                        $sqlzl = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY type";
                        $resultzt = $conn->query($sqlzl);

                        if ($resultzt->num_rows > 0) {
                            // output data of each row
                            while ($rowwz = $resultzt->fetch_assoc()) {
                        ?>

                                <tbody id='populateme<?php echo $a; ?>'>

                                    <tr>
                                        <td><input type='text' readonly name='room[]' class='form-control' value='<?php echo $rowwz['type']; ?>'></td>
                                        <td><input type='number' min='0' name='number[]' class='form-control'></td>
                                        <td><input type='number' min='0' name='release[]' class='form-control'></td>
                                        <td><input type='number' min='0' name='minimumstay[]' class='form-control'></td>
                                        <td><input type='number' min='0' name='single[]' class='form-control'></td>
                                        <td><input type='number' min='0' name='double[]' class='form-control'></td>
                                        <td>
                                            <select name='commisionable[]' data-id='<?php echo $a; ?>' onchange='enable(this)' class='coma form-control'>
                                                <option>No</option>
                                                <option>Yes</option>
                                            </select>
                                            
                                        </td>
                                        <td style='display:none;' id='co<?php echo $a; ?>'>
                                            <input type='number' class="form-control" min='0' name='commision[]'  placeholder='Commission' class='form-control'>
                                        </td>
                                        <td>
                                            <span data-id='<?php echo $a; ?>' data-room='<?php echo $rowwz['type']; ?>' class='addact2 btn btn-danger' id='addact2' onclick="myFunction2(this)"><i class="bi bi-plus"></i></span>
                                        </td>

                                    </tr>
                                </tbody>
                        <?php
                                $a = $a + 1;
                                $nu = $nu + 1;
                            }
                        }


                        ?>
                        <input id='nu' style='display:none;' value='<?php echo $nu; ?>'>



                    </table>


                </div>
            </div>
            <div class="pt-3">


            <?php
            $str = $_SESSION['star'] . ' Star';
            $sqltx = "SELECT * FROM taxnames WHERE country = '$country' && city = '$city' && star = '$str'";


            $resulttx = $conn->query($sqltx);


            while ($rowtx = mysqli_fetch_assoc($resulttx)) {

                $taxes = $rowtx['taxname'];
                $values = $rowtx['percentage'];

                $choices = $rowtx['choice'];
            }


            $taxes2 = explode(',', $taxes);
            $values2 = explode(',', $values);
            $choices2 = explode(',', $choices);

            $adi = 0;
            echo 'Above Prices Includes: <br/>';
            foreach ($taxes2 as $tx) {
            ?>


                <label for="tx<?php echo $adi; ?>"><?php echo $tx;
                                                    if ($choices2[$adi] == 'Percentage') {
                                                        echo ' (';
                                                        echo $values2[$adi];
                                                        echo '%)';
                                                    } else {
                                                        echo ' (AED ';
                                                        echo $values2[$adi];
                                                        echo ')';
                                                    }


                                                    ?>
                </label>&nbsp;&nbsp;
            <?php
                echo '<input id="tx' . $adi . '" type="checkbox" name="taxes[]" value="' . $tx . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<br/>';
                $adi = $adi + 1;
            }

            ?>
            </div>
            <div class="form-group">

                <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Submit</button>
            </div>

    </div>

    </form>
    <input style='display:none;' id='contryz' value='<?php echo $_SESSION['country']; ?>'>
    <input style='display:none;' id='ctyz' value='<?php echo $_SESSION['city']; ?>'>
    <input style='display:none;' id='starz' value='<?php echo $_SESSION['star']; ?>'>
    <input style='display:none;' id='abc'>

</div>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
    document.getElementById("addact2new").addEventListener("click", function(event) {
      event.preventDefault()
    });


    function myFunction2new() {
      var popler = document.getElementById('popler');

      var row = document.createElement('div');
      row.classList.add('row');
      row.classList.add('mt-2');


      var col1 = document.createElement('div');
      col1.classList.add('col-md-6');

      var col2 = document.createElement('div');
      col2.classList.add('col-md-5');

      var col3 = document.createElement('div');
      col3.classList.add('col-md-1');

      var date1 = document.createElement('INPUT');

      date1.classList.add('form-control');
      date1.setAttribute('name', 'sdate[]');
      date1.setAttribute('type', 'date');

      var date2 = document.createElement('INPUT');

      date2.classList.add('form-control');
      date2.setAttribute('name', 'edate[]');
      date2.setAttribute('type', 'date');


      var cross = document.createElement('span');
        cross.classList.add('btn');
        cross.classList.add('btn-danger');
        cross.innerHTML = 'X';
        // cross.classList.add('PositionTopRight');
        cross.setAttribute('onclick', 'this.parentNode.parentNode.remove(this.parentNode);');


      col1.appendChild(date1);

      col2.appendChild(date2);
      col3.appendChild(cross);





      row.appendChild(col1);
      row.appendChild(col2);
      row.appendChild(col3);

      popler.appendChild(row);


    }
  </script>



  <script>
    function enable($this) {
      var aid = $this.getAttribute('data-id');
      var aval = $this.value;
      var co = document.getElementById('co' + aid);
      var cms = document.getElementById('cms');
      if (aval == 'Yes') {
        cms.style.display = 'block';
        co.style.display = 'block';
      } else {
        co.value = '';

        cms.style.display = 'none';
        co.style.display = 'none';
      }


    }
  </script>

  <script>
    $('.addact2').on('click', function(event) {

      event.preventDefault();

      return false; // Use when no action should be performed

    });











    var n = 1;

    var co = 100;

    function myFunction2($this) {



      var populateme = document.getElementById("populateme" + $this.getAttribute('data-id'));

      var tr = document.createElement("tr");

      var td1 = document.createElement("td");
      var td2 = document.createElement("td");
      var td3 = document.createElement("td");
      var td4 = document.createElement("td");
      var td5 = document.createElement("td");
      var td6 = document.createElement("td");
      var td7 = document.createElement("td");
      var td8 = document.createElement("td");
      var td9 = document.createElement("td");


      var select = document.createElement('SELECT');
      select.setAttribute('class', 'coma form-control');
      select.setAttribute('name', 'commisionable[]');

      select.setAttribute('onchange', 'enable(this)');

      select.setAttribute('data-id', co);


      var opt1 = document.createElement('option');

      var opt2 = document.createElement('option');


      opt1.innerHTML = 'No';

      opt2.innerHTML = 'Yes';


      select.appendChild(opt1);

      select.appendChild(opt2);

      td7.appendChild(select);

      var com = document.createElement('INPUT');
      com.setAttribute('class', 'form-control');
      com.setAttribute('name', 'commision[]');
      com.setAttribute('placeholder', 'Commission');
      td8.setAttribute('id', 'co' + co);
      td8.style.display = 'none';
     

      var yc = document.createElement("INPUT");
      yc.setAttribute("class", "form-control");
      yc.setAttribute("Name", "room[]");
      yc.setAttribute("type", "text");
      yc.setAttribute("value", $this.getAttribute('data-room'));
      yc.setAttribute("placeholder", "Room Name");
      yc.setAttribute("readonly", 'true');

      td1.appendChild(yc);
      //td1.appendChild(ycbtn);






      var yc1 = document.createElement("INPUT");

      yc1.setAttribute("class", "form-control");
      yc1.setAttribute("Name", "number[]");
      yc1.setAttribute("type", "number");
      yc1.setAttribute("placeholder", "Number of Rooms");
      yc1.setAttribute("min", "0");

      td2.appendChild(yc1);


      var yc2 = document.createElement("INPUT");

      yc2.setAttribute("class", "form-control");
      yc2.setAttribute("Name", "release[]");
      yc2.setAttribute("type", "number");
      yc2.setAttribute("placeholder", "Release Days");
      yc2.setAttribute("min", "0");

      td3.appendChild(yc2);

      var yc3 = document.createElement("INPUT");

      yc3.setAttribute("class", "form-control");
      yc3.setAttribute("Name", "minimumstay[]");
      yc3.setAttribute("type", "number");
      yc3.setAttribute("placeholder", "Minimum Stay");
      yc3.setAttribute("min", "0");

      td4.appendChild(yc3);


      var yc4 = document.createElement("INPUT");

      yc4.setAttribute("class", "form-control");
      yc4.setAttribute("Name", "single[]");
      yc4.setAttribute("type", "number");
      yc4.setAttribute("placeholder", "Single Price");
      yc4.setAttribute("min", "0");

      td5.appendChild(yc4);


      var yc5 = document.createElement("INPUT");

      yc5.setAttribute("class", "form-control");
      yc5.setAttribute("Name", "double[]");
      yc5.setAttribute("type", "number");
      yc5.setAttribute("placeholder", "Double Price");
      yc5.setAttribute("min", "0");

      td6.appendChild(yc5);
      var SpanElement = document.createElement('span');
        SpanElement.setAttribute('class','btn btn-danger');
        SpanElement.innerText = 'X';
        SpanElement.setAttribute('onclick', 'this.parentNode.parentNode.remove(this.parentNode);');
        td9.appendChild(SpanElement);
        td8.appendChild(com);







      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);
      tr.appendChild(td4);
      tr.appendChild(td5);
      tr.appendChild(td6);
      tr.appendChild(td7);
      tr.appendChild(td8);
      tr.appendChild(td9);


      populateme.appendChild(tr);






      n = n + 1;
      co = co + 1;

    }
  </script>

<?php endblock(); ?>