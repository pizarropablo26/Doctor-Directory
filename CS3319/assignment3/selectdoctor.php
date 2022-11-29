<?php
     	include "connectdb.php";

        $query = "SELECT licensenum, firstname, lastname FROM doctor";
        $result=mysqli_query($connection,$query);
         if (!$result) {
                 die("databases query failed.");
         }

	while ($row = mysqli_fetch_assoc($result)) {
                $licnum = $row["licensenum"];
                echo "<option value='". $licnum . "'>" . $row["firstname"] . " " . $row["lastname"] . '</option>';
        }
	mysqli_free_result($result);
?>
