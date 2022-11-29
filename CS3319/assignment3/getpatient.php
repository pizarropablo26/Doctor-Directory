<?php
     	include "connectdb.php";

        $query = "SELECT firstname, lastname, ohipnum FROM patient";
        $result=mysqli_query($connection,$query);
         if (!$result) {
                 die("databases query failed.");
         }

	while ($row = mysqli_fetch_assoc($result)) {
                $ohipnum = $row["ohipnum"];
                echo "<option value='". $ohipnum . "'>" . $row["firstname"] ." ". $row["lastname"] . '</option>';
        }
	mysqli_free_result($result);
?>

