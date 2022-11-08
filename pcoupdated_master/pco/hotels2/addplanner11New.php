<?php
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
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
	echo "<script>location.replace('addplanner22New.php');</script>";
}

?>
<?php include './BaseFiles/base.php' ?>
<?php startblock('PageTitle') ?>
PCO Connect || Add Planner
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
<h3>Ball & Meeting Rooms Dimension/ Capacities</h3>
<p>Ball & Meeting Rooms Dimension/ Capacities</p>
<form action="#" method="post" enctype="multipart/form-data">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					# of Meeting Rooms
					<input class='form-control' id='mr' min="0" type='number' placeholder='# of Meeting Rooms'>
				</div>
				<div class="col-md-6">
					# of Breakout Rooms
					<input class='form-control' id='br' min="0" type='number' placeholder='# of Breakout Rooms'>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<table id="example2" class="table table-striped table-bordered">
				<h6>Meeting Rooms</h6>
				<thead>
					<tr>
						<th>Venue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>Area SQ. M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>Dimension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					</tr>
				</thead>
				<tbody id="populateme">
				</tbody>
			</table>

		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<h6>Breakout Rooms</h6>
					<thead>
						<tr>
							<th>Venue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Area SQ. M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Dimension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						</tr>
					</thead>
					<tbody id="populatemeb">
					</tbody>
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

<?php endblock() ?>

<?php startblock('scriptBottom') ?>
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