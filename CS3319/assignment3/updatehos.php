
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
</div>
<div class="boxed">
	<?php	
		include "connectdb.php";
	?>
	<h1>You Have Updated hospital bed!</h1>
	
	<?php
		$hoscode = $_POST["Hospital"];
		$bednum = $_POST["bednum"];
		
		$query = "UPDATE hospital SET numofbed='$bednum' WHERE hospital.hoscode='$hoscode'"; 
		if(mysqli_query($connection, $query)){
			echo "Update Successfull";
		}
	?>
	
</div>
	<br>
	<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form>

</body>

