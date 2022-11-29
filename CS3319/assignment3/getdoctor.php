<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Doctor Directory</title>
    <link rel="stylesheet" type="text/css" href="font.css">
    <link href="https://fonts.googleapis.com/css?family=Open Sans"
          rel="stylesheet">
    <img src = "https://as2.ftcdn.net/v2/jpg/00/68/85/39/1000_F_68853921_P5xTDmjlLF0jecPgrHbPWUJvSnflDcrS.jpg" width = "1680", height = "300", alt="doctor background">
	<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form> 

</head>
<body>
	<div class="boxed">
		<?php
   			include "connectdb.php";
		?>
	<h1> Doctor Directory </h1>
	<table border ="7"> <!-- making a table to store rows in an organized way -->
	<tr>
	<th>License Num</th>
	<th>First name</th>
	<th>Last name</th>
	<th>Licensed Date</th>
	<th>Birth Date</th>
	<th>Hospital they work at</th>
	<th>Speciality</th>
	</tr>
	<?php
		$ordering = $_POST["Order"];
                $sorting = $_POST["Sort"];
		$query = 'SELECT * FROM doctor ORDER BY' . ' ' . $ordering . ' ' . $sorting;
		
		$result=mysqli_query($connection,$query);
		if (!$result) {
			die("databases query failed.");
		}
		// get the resulting table and print all results
		$result = mysqli_query($connection, $query);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['licensenum'] ."</td>";
			echo "<td>" . $row['firstname'] . "</td>";
			echo "<td>" . $row['lastname'] . "</td>";
			echo "<td>" . $row['licensedate'] . "</td>";
			echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['hosworksat'] . "</td>";
                        echo "<td>" . $row['speciality'] . "</td>";
			echo "</tr>";
		}
	?>
	</table>
	<form action="medcare.php" method="post">
        <input type="submit" name="goback" value="Go Back"/>
        </form>

</body>
