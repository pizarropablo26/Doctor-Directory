<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="font.css">
<meta charset="utf-8">
<img src = "https://www.verywellhealth.com/thmb/ONOPBux-S_XmDQLKdpntK0Rq1o8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/types-of-doctors-1736311_FINAL-dc121c4f860b4bbf9b594fc018a481dc.png", width = "1680", height = "500", alt="doctor background">
<title>Doctor Speciality Directory</title>
</head>
<body>
<div class="boxed">
	<h1>Doctor Speciality Directory</h1>
	
	<br><br>
        <form action="medcare.php" method="post">
                <input type="submit" name="goback" value="Go Back"/>
	</form>
	<br>
<div class="boxed">
	<table border ="7"> <!-- making a table to store rows in an organized way -->
	<tr>
	<th>License Num</th>
	<th>First name</th>
	<th>Last name</th>
	<th>Licensed Date</th>
	<th>Birth Date</th>
	<th>Hospital they work at</th>
	<th>Speciality</th>
	</tr>
</div>


	<?php
	include "connectdb.php";
	$spec = $_POST["speciality"];
	$query = "SELECT * FROM doctor WHERE speciality=" . "'" . $spec . "'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("databases query failed.");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
			echo "<td>" . $row['licensenum'] ."</td>";
			echo "<td>" . $row['firstname'] . "</td>";
			echo "<td>" . $row['lastname'] . "</td>";
			echo "<td>" . $row['licensedate'] . "</td>";
			echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['hosworksat'] . "</td>";
                        echo "<td>" . $row['speciality'] . "</td>";
		echo "</tr>";
	}
	mysqli_free_result($result);
	?>
	</table>
	<form action="medcare.php" method="post">
        	<input type="submit" name="goback" value="Go Back"/>
        </form>

	
</div>
</body>

