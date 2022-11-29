<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="font.css">
<meta charset="utf-8">
<img src=https://advantagecaredtc.org/wp-content/uploads/2019/01/medical-check-up0TH.jpg, width = "1680", height = "300", alt="doctor background">
<title>Canadian Health Care Directory</title>
<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
</form>

</head>
<body>
<div class="boxed">
	<h1>Medcare Directory</h1>
	<?php
             	include "connectdb.php";
		$licensenum = $_POST["doctor"];
		$ohipnum = $_POST["patient"];
		$query = "INSERT INTO looksafter VALUES('" . $licensenum . "','" . $ohipnum . "')";
		
		$result = mysqli_query($connection, $query);
		if ($result) {
			echo "Added your new entry to the database.";
		}
		else {
			echo "Patient already assigned to this doctor";
		}
		mysqli_close($connection);
	?>
	 <form action="medcare.php" method="post">
                <input type="submit" name="goback" value="Go Back"/>
	</form>	
</div>
</body>
