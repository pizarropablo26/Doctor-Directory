<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" type="text/css" href="font.css">
	<meta charset="utf-8">
	<img src = "https://policyoptions.irpp.org/wp-content/uploads/sites/2/2021/10/Canada-has-a-health-care-investment-problem.jpg", width = "1680", height = "500", alt="doctor background">
	<title>Hospital Directory</title>
</head>
<body>
<div class="boxed">
	<h1>Welcome to Canadian Hospital Directory</h1>
        
	<br>
	<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form>
	<br>

	<div class="boxed">
		<table border ="8"> <!-- making a table to store rows in an organized way -->
		<tr>
		<th>Hospital Name</th>
		<th>City</th>
		<th>Province</th>
		<th>Number of Beds</th>
		<th>Headdoc first name</th>
		<th>Headdoc last name</th>
		</tr>
	</div>


		<?php
		include "connectdb.php";
		$code = $_POST["Hospital"];
		

		$query = "SELECT hosname,city, prov, numofbed, doctor1.firstname AS headdocFname, doctor1.lastname AS headdocLname FROM hospital, doctor AS doctor1 WHERE doctor1.licensenum = hospital.headdoc AND hoscode = '$code'"; 		
		$result = mysqli_query($connection, $query);
		if (!$result) {
			die("databases query failed.");
		}
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
				echo "<td>" . $row["hosname"] ."</td>";
				echo "<td>" . $row["city"] ."</td>";
				echo "<td>" . $row["prov"] ."</td>";
				echo "<td>" . $row["numofbed"] ."</td>";
				echo "<td>" . $row["headdocFname"] ."</td>";
				echo "<td>" . $row["headdocLname"] ."</td>";
			echo "</tr>";
		}
			mysqli_free_result($result);
			mysqli_close($connection);
		?>
		</table>


	<div class="boxed">
                <table border ="1"> <!-- making a table to store rows in an organized way -->
                <tr>
                <th>Hospital Name</th>
                <th>City</th>
                <th>Province</th>
                <th>Number of Beds</th>
                <th>Doctor first name</th>
                <th>Doctor last name</th>
                </tr>
        </div>
	<br>

                <?php
                include "connectdb.php";


                $code = $_POST["Hospital"];

                $query = "SELECT hosname,city, prov, numofbed, firstname, lastname FROM hospital, doctor WHERE doctor.hosworksat = hoscode AND hoscode = '$code'";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                        die("databases query failed.");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                                echo "<td>" . $row["hosname"] ."</td>";
                                echo "<td>" . $row["city"] ."</td>";
                                echo "<td>" . $row["prov"] ."</td>";
                                echo "<td>" . $row["numofbed"] ."</td>";
                                echo "<td>" . $row["firstname"] ."</td>";
                                echo "<td>" . $row["lastname"] ."</td>";
                        echo "</tr>";
		}
			mysqli_free_result($result);
			mysqli_close($connection);
		?>
		</table>
	
</div>
        <form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form>
</body>
</html>

