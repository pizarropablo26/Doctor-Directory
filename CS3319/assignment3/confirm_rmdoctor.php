<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="font.css">
<meta charset="utf-8">
<img src="https://media.istockphoto.com/id/897581300/video/seamless-red-warning-alert-word-on-black-screen.jpg?s=640x640&k=20&c=1etkcHq_JSrpPCvVyuiEBCAsbiab-I0Uyy-58NHiOUg=", width = "1680", height = "300">
<title> Doctor Directory </title>
</head>
<body>
<div class="boxed">
	<?php	
		include "connectdb.php";
	?>
	<h1>Are You Sure You Want to Delete A Doctor?</h1>
	
	<?php
		$rmdoctor = $_POST["rmdoctor"];
		echo "Are you sure you want to delete " . $rmdoctor . "?";
		
	?>
	
	<form action="rmdoctor.php" method="post">
	<input type="hidden" name="confrmdoctor" value="<?php echo $rmdoctor;?>">
	<input type="submit" name="deletedoctorconfirm" value="Confirm Delete"/>
	</form>
	<form action="medcare.php" method="post">
        <input type="submit" name="canceldel" value="Cancel"/>
        </form>

</div>
</body>
