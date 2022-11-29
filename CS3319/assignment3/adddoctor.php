<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="font.css">
<meta charset="utf-8">
<img src= "https://som.rowan.edu/images/education/banner-whitecoat-7.jpg", width = "1680", height = "300">
<title>Doctor Directory</title>
</head>
<body>
<div class="boxed">
	<?php	
		include "connectdb.php";
	?>
	<h1> Doctor Directory </h1>
	
	<?php
		$licensenum = $_POST["licensenum"];
		$lastname  = $_POST["lname"];
		$firstname = $_POST["fname"];
		$licensedate = $_POST["licdate"];
		$birthdate = $_POST["bdate"];
                $hosworksat = $_POST["Hospital"];
                $speciality = $_POST["speciality"];

		$query = "INSERT INTO doctor VALUES ('$licensenum','$firstname','$lastname','$licensedate','$birthdate','$hosworksat','$speciality')";
		$result = mysqli_query($connection, $query);
		if ($result) {
			echo "Added doctor with license number " . $licensenum . " to the database!";
		}
		else {
			echo "Duplicate entry!!! OR No current hospital with code " . $hosworksat . " in the database!";
		}
	?>
	<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form>
	
</div>
</body>
