<?php
session_start();
require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

$roler = $_SESSION['roler'];


if (isset($_POST['submit'])) {


	$_SESSION['counting'] = 0;

	$venues = $_POST['venue'];
	$area = $_POST['area'];
	$dimension = $_POST['dimension'];

	$location = $_POST['location'];
	$type = $_POST['typee'];





	$_SESSION['venues'] = $_POST['venue'];
	$_SESSION['types'] = $_POST['typee'];







	$nn = 0;

	foreach ($venues as $venue) {

		$sql = "INSERT INTO meetingbanquetplanner (hotel,country,city,venue,area,dimension,location,type) VALUES ('$hotel','$country','$city','$venue','$area[$nn]','$dimension[$nn]','$location[$nn]','$type[$nn]')";




		$resulta = $conn->query($sql);


		if ($resulta === TRUE) {


			$_SESSION['alertme'] = 1;
		}



		$nn = $nn + 1;
	}



	echo "<script>location.replace('addplanner22.php');</script>";
}





?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Planner
<?php endblock() ?>
<?php startblock('stylesheethead') ?>

<style>
		.delbtn {
			font-size: 10px;
			right: 30px;
			position: absolute;
		}
	</style>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<h3>Add Meeting and Banquet Planner</h3>
<p>Ball & Meeting Rooms Dimension/ Capacities</p>
<form action="#" method="post" enctype="multipart/form-data">


	<div class="card">
		<div class="card-body">
			<div class="table-responsive">

				<table class="table table-striped table-bordered">

					<thead style='text-align:center;'>
						<tr>
							<th># of Meeting Rooms </th>
							<th># of Breakout Rooms </th>
						</tr>

					</thead>

					<tbody>

						<tr>
							<td>
								<input class='form-control' id='mr' type='number' min='0' placeholder='# of Meeting Rooms'>
							</td>
							<td>
								<input class='form-control' id='br' type='number' min='0' placeholder='# of Breakout Rooms'>
							</td>


						</tr>
					</tbody>


				</table>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">

				<table id="example2" class="table table-striped table-bordered">
					<h4>Meeting Rooms</h4>
					<thead>
						<tr>


							<th>Venue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Area SQ. M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Dimension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>


							<!--   <th><button class='btn btn-danger' id='addact22' onclick="myFunction22()">+</button></th> -->



						</tr>


					</thead>



					<tbody id="populateme">




					</tbody>

					<!--	<tfoot>
									<tr>
											<th>Venue</th>
										<th>Area SQ. M</th>
										<th>Dimension</th>
										<th>Location</th>
										<th>Theater</th>
										<th>Class Room</th>
											<th>Cabaret</th>
										<th>Board Room</th>
										<th>U Shape</th>
										<th>Banquet Dinner</th>
										<th>Cocktail Reception</th>
										
									</tr>
								</tfoot> -->
				</table>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="table-responsive">

				<table id="example2" class="table table-striped table-bordered">
					<h4>Breakout Rooms</h4>
					<thead>
						<tr>


							<th>Venue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Area SQ. M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Dimension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>


							<!--   <th><button class='btn btn-danger' id='addact22' onclick="myFunction22()">+</button></th> -->



						</tr>


					</thead>



					<tbody id="populatemeb">




					</tbody>

					<!--	<tfoot>
									<tr>
											<th>Venue</th>
										<th>Area SQ. M</th>
										<th>Dimension</th>
										<th>Location</th>
										<th>Theater</th>
										<th>Class Room</th>
											<th>Cabaret</th>
										<th>Board Room</th>
										<th>U Shape</th>
										<th>Banquet Dinner</th>
										<th>Cocktail Reception</th>
										
									</tr>
								</tfoot> -->
				</table>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button style="float:right;" type="submit" name='submit' class="btn btn-danger">Next</button>
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
	var n = 1;


	$("#mr").keyup(function() {

		document.getElementById("populateme").innerHTML = '';
		var mr = document.getElementById('mr').value;
		for (let i = 0; i < parseInt(mr); i++) {



			var act = document.getElementById("populateme");

			var tr = document.createElement("tr");

			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			td5.style.display = 'none';

			var td6 = document.createElement("td");
			var td7 = document.createElement("td");
			var td8 = document.createElement("td");
			var td9 = document.createElement("td");
			var td10 = document.createElement("td");
			var td11 = document.createElement("td");



			var yc1 = document.createElement("INPUT");

			yc1.setAttribute("class", "form-control");
			yc1.setAttribute("Name", "venue[]");
			yc1.setAttribute("type", "text");
			yc1.setAttribute("placeholder", "Venue");



			var yc2 = document.createElement("INPUT");

			yc2.setAttribute("class", "form-control");
			yc2.setAttribute("Name", "area[]");
			yc2.setAttribute("type", "text");
			yc2.setAttribute("placeholder", "Area SQ. M");


			var yc3 = document.createElement("INPUT");

			yc3.setAttribute("class", "form-control");
			yc3.setAttribute("Name", "dimension[]");
			yc3.setAttribute("type", "text");
			yc3.setAttribute("placeholder", "Dimension");

			var yc4 = document.createElement("INPUT");

			yc4.setAttribute("class", "form-control");
			yc4.setAttribute("Name", "location[]");
			yc4.setAttribute("type", "text");
			yc4.setAttribute("placeholder", "Location");



			var yc5 = document.createElement("INPUT");

			yc5.setAttribute("class", "form-control");
			yc5.setAttribute("Name", "typee[]");
			yc5.setAttribute("type", "text");
			yc5.setAttribute("placeholder", "Type");
			yc5.setAttribute("value", "meeting");



			td1.appendChild(yc1);
			td2.appendChild(yc2);
			td3.appendChild(yc3);
			td4.appendChild(yc4);
			td5.appendChild(yc5);





			tr.appendChild(td1);

			tr.appendChild(td2);

			tr.appendChild(td3);

			tr.appendChild(td4);

			tr.appendChild(td5);






			var ycbtn = document.createElement("BUTTON");
			ycbtn.setAttribute('name', 'delbtn');
			ycbtn.setAttribute('onclick', 'this.parentNode.parentNode.removeChild(this.parentNode);')
			ycbtn.innerHTML = 'X';
			ycbtn.setAttribute('class', 'delbtn');


			//tr.appendChild(ycbtn);

			act.appendChild(tr);

			n = n + 1;


		}

	});
</script>


<script>
	var nm = 1;


	$("#br").keyup(function() {

		document.getElementById("populatemeb").innerHTML = '';
		var br = document.getElementById('br').value;
		for (let i = 0; i < parseInt(br); i++) {



			var act = document.getElementById("populatemeb");

			var tr = document.createElement("tr");

			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			td5.style.display = 'none';


			var td6 = document.createElement("td");
			var td7 = document.createElement("td");
			var td8 = document.createElement("td");
			var td9 = document.createElement("td");
			var td10 = document.createElement("td");
			var td11 = document.createElement("td");



			var yc1 = document.createElement("INPUT");

			yc1.setAttribute("class", "form-control");
			yc1.setAttribute("Name", "venue[]");
			yc1.setAttribute("type", "text");
			yc1.setAttribute("placeholder", "Venue");



			var yc2 = document.createElement("INPUT");

			yc2.setAttribute("class", "form-control");
			yc2.setAttribute("Name", "area[]");
			yc2.setAttribute("type", "text");
			yc2.setAttribute("placeholder", "Area SQ. M");


			var yc3 = document.createElement("INPUT");

			yc3.setAttribute("class", "form-control");
			yc3.setAttribute("Name", "dimension[]");
			yc3.setAttribute("type", "text");
			yc3.setAttribute("placeholder", "Dimension");

			var yc4 = document.createElement("INPUT");

			yc4.setAttribute("class", "form-control");
			yc4.setAttribute("Name", "location[]");
			yc4.setAttribute("type", "text");
			yc4.setAttribute("placeholder", "Location");


			var yc5 = document.createElement("INPUT");

			yc5.setAttribute("class", "form-control");
			yc5.setAttribute("Name", "typee[]");
			yc5.setAttribute("type", "text");
			yc5.setAttribute("placeholder", "Type");
			yc5.setAttribute("value", "breakout");



			td1.appendChild(yc1);
			td2.appendChild(yc2);
			td3.appendChild(yc3);
			td4.appendChild(yc4);
			td5.appendChild(yc5);





			tr.appendChild(td1);

			tr.appendChild(td2);

			tr.appendChild(td3);

			tr.appendChild(td4);

			tr.appendChild(td5);




			var ycbtn = document.createElement("BUTTON");
			ycbtn.setAttribute('name', 'delbtn');
			ycbtn.setAttribute('onclick', 'this.parentNode.parentNode.removeChild(this.parentNode);')
			ycbtn.innerHTML = 'X';
			ycbtn.setAttribute('class', 'delbtn');


			//tr.appendChild(ycbtn);

			act.appendChild(tr);

			nm = nm + 1;


		}

	});
</script>



<?php endblock(); ?>