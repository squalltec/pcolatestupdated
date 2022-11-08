

<?php

include 'header.php';

include 'db_connection.php';
session_start();

?>


<main class='page-content'>
    
    
    
    <?php
    
    
 $sqllas = "SELECT * FROM allfetchedevents GROUP BY city";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
 echo '<a href="updateevents.php?city='.$row['city'].'">'.$row['city'].'</a><br>';
}
    
    
    ?>
    
    
   
    
</main>