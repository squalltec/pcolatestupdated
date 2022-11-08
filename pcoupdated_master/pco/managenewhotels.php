<?php
require_once('db_connection.php');


include('header.php');



if (isset($_POST['submit'])) {
	
$name=$_POST['name'];	

$description =$_POST['description'];

$doors=$_POST['doors'];

$type=$_POST['type'];

$maximum=$_POST['maximum'];

$luggages=$_POST['luggages'];

$capacity=$_POST['capacity'];

$price=$_POST['price'];


	mkdir("Vehicle Images/".$name);	
	

		
		
		
		
	  $filename = $_FILES['myfile']['name'];
	  $destination = 'Vehicle Images/'. $name . '/' . $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['myfile']['tmp_name'];


 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {




$sql ="INSERT INTO vehicles (name, description,doors,type,maximum,luggages,capacity,price,image) VALUES ('$name', '$description', '$doors', '$type', '$maximum', '$luggages', '$capacity', '$price', '$filename')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



		}
}

 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">




<div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Hotels</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     


<?php


$sqlla ="SELECT * FROM loginforhotels";
		$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	
?>

 
                     <a href='hotels2/redirecter.php?hotel=<?php echo $rowwa['name']?>&country=<?php echo $rowwa['country']?>&city=<?php echo $rowwa['city']?>&star=<?php echo $rowwa['star']?>'> <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#collapse<?php echo $a;?>' aria-expanded="false" aria-controls="collapseTwo">
<?php echo $rowwa['name']; ?>

  </button>
                        </h2>
                      </div>
                      </a>
                      
                     <?php
  }
}
?>                      
                      
                      
                      
          </div><!--end row-->
		  
                    </div>
          </div><!--end row-->
		    </div>
          </div><!--end row-->
		    </div>
          </div><!--end row-->
		         




</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

