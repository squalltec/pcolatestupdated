<?php
    session_start(); 
    require_once('db_connection.php');

    if ($_SESSION['loggedin'] != '1') {
    header("Location: index.php");
    }
    $hotel = $_SESSION['hotel'];
    $roler = $_SESSION['roler'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if (isset($_POST['changepassword'])) {

        $passwordnew = $_POST['passw'];
        $sql2 = "UPDATE loginforvenues SET password='$passwordnew' WHERE email='$email'";
        $resulta2 = $conn->query($sql2);
        if ($resulta2 === TRUE) {
            $_SESSION['updated'] = '1';
        }
        $sql3 = "UPDATE venueusers SET password='$passwordnew' WHERE email='$email'";
        $resulta3 = $conn->query($sql3);
        if ($resulta3 === TRUE) {
            $_SESSION['updated'] = '1';
        }
    }


?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Venue Dashboard
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<?php endblock() ?>

<?php startblock('FooterText') ?>
    Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>


<?php endblock();?>	
