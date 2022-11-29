<?php
	include "connectdb.php";
	
	$query = "SELECT DISTINCT speciality FROM doctor";
	$result=mysqli_query($connection,$query);
  	 if (!$result) {
       		 die("databases query failed.");
  	 }
	
	while ($row = mysqli_fetch_assoc($result)) {
		$speciality = $row["speciality"];
		echo "<option value='". $speciality . "'>" . $speciality . '</option>';
	}
   	mysqli_free_result($result);
?>
