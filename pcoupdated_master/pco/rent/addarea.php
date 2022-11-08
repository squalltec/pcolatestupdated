<?php
session_start();
require_once('db_connection.php');





$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];





if (isset($_POST['submit'])) {




    $hotel = $_SESSION['hotel'];

    $country = $_SESSION['country'];

    $city = $_SESSION['city'];

    $area = $_POST['facilitiess'];




    $sql = "DELETE FROM rentacarareas WHERE country = '$country' && city = '$city' && company='$hotel'";

    if ($conn->query($sql) === TRUE) {
    }



    $nn = 0;
    foreach ($area as $value) {


        $sql = "INSERT INTO rentacarareas (company,country,city,area)
           VALUES ('$hotel','$country','$city','$value')";

        $resulta = $conn->query($sql);


        if ($resulta === TRUE) {


            $_SESSION['alertme'] = 1;
        }

        $nn = $nn + 1;
    }
}



?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Ads Area
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<h1 align='center'>Drop-Off / Pick Up Areas</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <br />
        <style>
            .delbtn {
                font-size: 10px;
                right: 30px;
                position: absolute;
            }
        </style>
        <div class='container'>

            <div class='row'>
                <div class='col-sm'>
                    <label>Areas</label>
                </div>

            </div>
        </div>

        <br />





        <div class='container'>
            <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
            <div class='row'>



                <div class='col-sm'>
                    <div>

                        <input class='form-control' required name='facilitiess[]' placeholder='Area'>

                    </div>
                </div>







            </div>
        </div>

        <div id='aacctt2'>

        </div>



        <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1>




        <br />



        <?php





        $sqllas3 = "SELECT * FROM rentacarareas WHERE country = '$country' && city = '$city' && company='$hotel'";


        $result3 = $conn->query($sqllas3);


        while ($row3 = mysqli_fetch_assoc($result3)) {


        ?>





            <div class='container'>
                <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
                <div class='row'>



                    <div class='col-sm'>
                        <div>

                            <input class='form-control' required name='facilitiess[]' value='<?php echo $row3['area']; ?>' placeholder='Area'>

                        </div>
                    </div>







                </div>
            </div>

            <br />

        <?php

        }
        ?>









        <br />
        <br />


        <div class="form-group">
            <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Submit</button>
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
        $.ajax({

            type: 'POST',

            url: 'getalertme.php',
            success: function(result) {


                if (result.includes('exists')) {
                    Swal.fire('Updated Successfully')
                }



            }

        });
    </script>













    <script>
        document.getElementById("addact2").addEventListener("click", function(event) {
            event.preventDefault()
        });



        var n = 1;

        function myFunction2() {
            var act = document.getElementById("aacctt2");

            var ybo0 = document.createElement("div");
            var ybo1 = document.createElement("div");
            var ybo2 = document.createElement("div");


            ybo0.classList.add("container");
            ybo1.classList.add("row");



            ybo2.classList.add("col-sm");






            var ycbtn = document.createElement("BUTTON");
            ycbtn.setAttribute('name', 'delbtn');
            ycbtn.setAttribute('onclick', 'this.parentNode.parentNode.removeChild(this.parentNode);')
            ycbtn.innerHTML = 'X';
            ycbtn.setAttribute('class', 'delbtn');

            ybo0.appendChild(ycbtn);



            var ycx = document.createElement("br");



            var yc = document.createElement("INPUT");

            yc.setAttribute("class", "form-control");
            yc.setAttribute("Name", "facilitiess[]");
            yc.setAttribute("type", "text");
            yc.setAttribute("placeholder", "Area");
            ybo2.appendChild(yc);
















            ybo1.appendChild(ybo2);


            ybo0.appendChild(ybo1)

            act.appendChild(ycx);

            act.appendChild(ybo0);


            n = n + 1;

        }
    </script>



<?php endblock();?>	
