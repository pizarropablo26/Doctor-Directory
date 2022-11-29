<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="font.css">
<meta charset="utf-8">
<title>Doctor Directory</title>
</head>
<body>
<div class="boxed">
	<?php	
		include "connectdb.php";
	?>
	<h1>You Have Deleted a Doctor!</h1>
	
	<?php
		$deldoctor = $_POST["confrmdoctor"];	
		$query = "DELETE FROM doctor WHERE licensenum=" . "'" . $deldoctor . "'";
		
		if (mysqli_query($connection, $query)) {
			echo "Successfully deleted " . $deldoctor . " from the database.";
		}
		else {
			echo "Failed to delete doctor with licensenum " . $deldoctor . "!";	// this should never happen
		}
	?>
	<form action="medcare.php" method="post">
        	<input type="submit" name="canceldel" value="Goback"/>
        </form>
</div>
</body>
