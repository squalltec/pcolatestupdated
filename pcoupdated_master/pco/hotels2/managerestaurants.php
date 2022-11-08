<?php
session_start();

require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

if (isset($_POST['addnew'])) {


  $restaurantsname = $_POST['restaurantsname'];
  $restaurantsdes = $_POST['restaurantsdes'];
  $cuisine = $_POST['cuisine'];


  $n = 0;
  foreach ($restaurantsname as $value) {



    mkdir("../Restaurant Images/" . $hotel . "/" . $value, 0755, true);

    $uploadsDir = "../Restaurant Images/" . $hotel . "/" . $value . "/";
    $allowedFileType = array('jpg', 'png', 'jpeg');

    $img = array();



    $imgs = $_FILES['fileres' . $n]['name'];



    // Velidate if files exist
    if (!empty(array_filter($imgs))) {

      // Loop through file items
      foreach ($imgs as $id => $val) {
        // Get files upload path
        $fileName        = $_FILES['fileres' . $n]['name'][$id];
        $tempLocation    = $_FILES['fileres' . $n]['tmp_name'][$id];
        $targetFilePath  = $uploadsDir . $fileName;
        $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $uploadDate      = date('Y-m-d H:i:s');
        $uploadOk = 1;
        if (in_array($fileType, $allowedFileType)) {
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
          $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");


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

















    $n = $n + 1;
  }
















  //main entry


  $sqlTpl1 = "INSERT INTO hotelsdatabaserestaurants (hotel,country,city,name,description,cuisine) VALUES (%s )";

  $sqlArr1 = array();

  foreach ($restaurantsname as $k => $v)

    $sqlArr1[] = '"' . $hotel . '","' . $country . '","' . $city . '","' . $restaurantsname[$k] . '","' . $restaurantsdes[$k] . '","' . $cuisine[$k] . '"';
  $sqlStr1 = sprintf(
    $sqlTpl1,
    implode(' ) , ( ', $sqlArr1)
  );





  $result1 = $conn->query($sqlStr1);


  if ($result1 === TRUE) {
    // echo "New record created successfully";

    $_SESSION['alertme'] = 1;
  } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
  }




  //end








}




















if (isset($_POST['submit'])) {


  $value = $_POST['type'];

  $cuisine = mysqli_real_escape_string($conn, $_POST['cuisine']);


  $id = $_POST['iad'];


  $des = mysqli_real_escape_string($conn, $_POST['des']);



  mkdir("../Restaurant Images/" . $hotel . "/" . $value, 0755, true);

  $uploadsDir = "../Restaurant Images/" . $hotel . "/" . $value . "/";
  $allowedFileType = array('jpg', 'png', 'jpeg');

  $img = array();



  $imgs = $_FILES['files']['name'];



  // Velidate if files exist
  if (!empty(array_filter($imgs))) {

    // Loop through file items
    foreach ($imgs as $id => $val) {
      // Get files upload path
      $fileName        = $_FILES['files']['name'][$id];
      $tempLocation    = $_FILES['files']['tmp_name'][$id];
      $targetFilePath  = $uploadsDir . $fileName;
      $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
      $uploadDate      = date('Y-m-d H:i:s');
      $uploadOk = 1;
      if (in_array($fileType, $allowedFileType)) {
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
        $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");


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



  $sql = "UPDATE hotelsdatabaserestaurants SET description='$des', cuisine='$cuisine' WHERE id='$id'";

  $result = $conn->query($sql);


  if ($result === TRUE) {
    $_SESSION['alertme'] = 1;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Base Page Included
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Restaurants</div>

  <div class="ms-auto">
    <div class="btn-group">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addRestaurantsModal"><i class="bi bi-plus"></i> Add New</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center">
      <h5 class="mb-0">Contracts</h5>
      <form class="ms-auto position-relative">
        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
        <input class="form-control ps-5" type="text" placeholder="search">
      </form>
    </div>
    <div class="table-responsive mt-3">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cuisine</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>


          <?php

          $n = 0;

          $sqll = "SELECT * FROM hotelsdatabaserestaurants WHERE hotel='$hotel' && country='$country' && city='$city'";
          $resultt = $conn->query($sqll);

          if ($resultt->num_rows > 0) {
            // output data of each row
            while ($roww = $resultt->fetch_assoc()) {

              $delid = $roww['id'];


          ?>
              <tr>
                <td><?php echo $roww['id']; ?></td>
                <td><?php echo $roww['name']; ?></td>
                <td><?php echo $roww['cuisine']; ?></td>
                <td><?php echo substr($roww['description'], 50); ?>...</td>
                <td>
                  <div class="table-actions d-flex align-items-center gap-3 fs-6">
                    <a onclick="EditRestaurant()" class="text-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                    <a href="javascript:;" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
                  </div>
                </td>

              </tr>

          <?php
            }
          }
          ?>


        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="addRestaurantsModal" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Add New Restaurant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="restaurantFormCard">
            <div class="card">
              <div class="card-body" style="position: relative;">
                <i class="bi bi-x-lg" onclick="DelCard(this)" style="position: absolute; top:10px; right:10px;"></i>
                <div class='row p-2'>
                  <div class="col-md-6">
                    <input type='text' placeholder='Restaurant Name' required class="form-control" id='restaurantsname[]' name='restaurantsname[]'>
                  </div>
                  <div class="col-md-6">
                    <input type='text' placeholder='Cuisine' class="form-control" id='cuisine[]' name='cuisine[]'>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder='Restaurant Description' id='restaurantsdes[]' name='restaurantsdes[]'></textarea>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <input type="file" multiple='true' class="form-control" id='fileres[]' name='fileres0[]'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning" id="addact2" onclick="AddMoreFields()"><i class="bi bi-plus"></i> Add More</button>
          <input type='submit' name='submit' value="Save changes" required class='btn btn-danger'>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editRestaurantsModal" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Edit Restaurant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <div class="card">
              <div class="card-body" >
                <div class='row p-2'>
                  <div class="col-md-6">
                    <input type='text' placeholder='Restaurant Name' required class="form-control"  name='restaurantsname'>
                  </div>
                  <div class="col-md-6">
                    <input type='text' placeholder='Cuisine' class="form-control" name='cuisine'>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder='Restaurant Description'  name='restaurantsdes'></textarea>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <input type="file" multiple='true' class="form-control"  name='files'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type='submit' name='edit' value="Update changes" required class='btn btn-danger'>
        </div>
      </form>
    </div>
  </div>
</div>






<?php endblock() ?>

<?php startblock('FooterText') ?>

<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
  function DelCard(el){
		$(el).parent().parent().remove();
	}

  $.ajax({
    type: 'POST',
    url: 'getalertme.php',
    success: function(result) {
      if (result.includes('exists')) {
        Swal.fire('Updated Successfully')
      }
    }
  });

  document.getElementById("addact2").addEventListener("click", function(event) {
			event.preventDefault()
		});

		function AddMoreFields() {
			var NewUserFromHTML = `<div class="card">
              <div class="card-body" style="position: relative;">
                <i class="bi bi-x-lg" onclick="DelCard(this)" style="position: absolute; top:10px; right:10px;"></i>
                <div class='row p-2'>
                  <div class="col-md-6">
                    <input type='text' placeholder='Restaurant Name' required class="form-control" id='restaurantsname[]' name='restaurantsname[]'>
                  </div>
                  <div class="col-md-6">
                    <input type='text' placeholder='Cuisine' class="form-control" id='cuisine[]' name='cuisine[]'>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder='Restaurant Description' id='restaurantsdes[]' name='restaurantsdes[]'></textarea>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col-md-12">
                    <input type="file" multiple='true' class="form-control" id='fileres[]' name='fileres0[]'>
                  </div>
                </div>
              </div>
            </div>`;

					$('#restaurantFormCard').append(NewUserFromHTML);

		}

    function EditRestaurant(){
      $('#editRestaurantsModal').modal('show');
    }
</script>

<?php endblock(); ?>