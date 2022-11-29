<?php
     	include "connectdb.php";

        $query = "SELECT hoscode, hosname FROM hospital";
        $result=mysqli_query($connection,$query);
         if (!$result) {
                 die("databases query failed.");
         }

	while ($row = mysqli_fetch_assoc($result)) {
                $hoscode = $row["hoscode"];
                echo "<option value='". $hoscode . "'>" . $row["hosname"] . '</option>';
        }
	mysqli_free_result($result);
?>
