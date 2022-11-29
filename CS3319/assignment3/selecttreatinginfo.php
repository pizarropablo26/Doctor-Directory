<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Doctor Directory</title>
    <link rel="stylesheet" type="text/css" href="font.css">
    <link href="https://fonts.googleapis.com/css?family=Open Sans"
          rel="stylesheet">
    <img src = "https://www.cihi.ca/sites/default/files/image/prems-home-pg-banner%20_0.jpg" width = "1680", height = "300", alt="doctor background">
    <form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
     </form>
</head>
<body>
	<div class="boxed">
		<?php
   			include "connectdb.php";
		?>
	<h1> Doctor Directory </h1>
	<table border ="3"> <!-- making a table to store rows in an organized way -->
	<tr>
	<th>OHIP Number</th>
	<th>First name</th>
	<th>Last name</th>
	</tr>
	<?php
		$licensenum = $_POST["doctor"];
		$query = "SELECT patient.firstname, patient.lastname, patient.ohipnum
			  FROM patient JOIN looksafter ON patient.ohipnum = looksafter.ohipnum
			  JOIN doctor ON doctor.licensenum = looksafter.licensenum 
			  WHERE doctor.licensenum = '$licensenum'";

		$query2 = "SELECT patient.firstname, patient.lastname, patient.ohipnum FROM patient, doctor, looksafter WHERE patient.ohipnum = looksafter.ohipnum AND doctor.licensenum = looksafter.licensenum AND doctor.licensenum = '$licnum'";
		$result=mysqli_query($connection,$query);
		if (!$result) {
			die("databases query failed.");
		}
		
		// get the resulting table and print all results
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row["ohipnum"] . "</td>";
			echo "<td>" . $row["firstname"] . "</td>";
			echo "<td>" . $row["lastname"] . "</td>";
			echo "</tr>";
		}
	?>
	</table>
	<br><br>
	<form action="medcare.php" method="post">
        	<input type="submit" name="goback" value="Go Back"/>
        </form>


	</div>
</body>

