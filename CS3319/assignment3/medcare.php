<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Canadian Health Care Directory</title>
        	<link rel="stylesheet" type="text/css" href="font.css">
        	<link href="https://fonts.googleapis.com/css?family=Serif"
		rel="stylesheet">
		<img src="https://img.pikbest.com/backgrounds/20220119/medical-doctor-blue-minimalist-background_6244083.jpg!bwr800", width = "1680", height = "300", alt="doctor background">
	</head>
<?php
include 'connectdb.php';
?>
<body>
	<!-- this is to view the doctors in the database in sorted order -->
	<div class="boxed">
		<h1><span>Welcome to the Canadian Health Care Directory</span></h1>
	</div>
	<!--this code ask the user to select which ordering they want--> 
	<h2>Find a Doctor</h2>
	<form action="getdoctor.php" method="post">
		<h3> Select Option Below <h3>
		    <h4>Choose the field<h4>
			<input type="radio" name="Order" value="lastname">
			    <label for="lastname">Last Name of Doctors</label><br>
			<input type="radio" name="Order" value="birthdate">
			    <label for="birthdate">Birthday of Doctors</label><br>
		    <h4>Choose the order<h4>
			<input type="radio" name="Sort" value="ASC">
			    <label for="ASC">ascending order</label><br>
			<input type="radio" name="Sort" value="DESC">
			    <label for="DESC">descending order</label><br>
        		<input type="submit" value="Submit">

	</form>

<!-- THIS IS TO GET THE SPECIALTY OF THE DOCTOR -->
<form action="getspecialty.php" method="post">
   <h2> Get doctor Speciality:</h2>
	<label>Select a Speciality:
	<select name="speciality" /></label>
	   <?php
  	   include 'selectspecialty.php';
	   ?>
	</select>
   <input type="submit" name="get specialty"/>
</form>

<!--THIS IS TO ADD A NEW DOCTOR-->
<h2> ADD A NEW DOCTOR:</h2>
	<form action="adddoctor.php" method="post" enctype="multipart/form-data">
	CPSO number : <input type="text" name="licensenum"><br>
	Doctor's Last Name: <input type="text" name="lname"><br>
	Doctor's first Name: <input type="text" name="fname"><br>
	Doctor's licensed date (YYYY-MM-DD format) : <input type="text" name="licdate"><br>
	Doctor's birthday (YYYY-MM-DD format) : <input type="text" name="bdate"><br>
	<label>Choose a Hospital:
		<input list="Hospital" name="Hospital" /></label>
		<datalist id="Hospital">
    			<?php
				include 'selecthospital.php';
    			?>
		</datalist><br>
	<label>Select a Speciality:
		<input list="speciality" name="speciality" /></label>
		<datalist id="speciality">
     			<?php
           			include 'selectspecialty.php';
     			?>
		</datalist><br>
	<input type="submit" value="Add New Doctor">
</form>

<!-- this is to see the doctor's patient -->
<h2> View a Doctor's Patient:</h2>
<p>The select element is used to create a drop-down list.</p>

<form action="selecttreatinginfo.php" method="post">
  <label>Select a Doctor:
        <select name="doctor" id="doctor"></label>
           <?php
           include 'selectdoctor.php';
           ?>
	</select> 
 <br><br>
  <input type="submit" value="Submit">
</form>

<!-- Assign Patient -->
<h2> Assign Patient:</h2>

<form action="assigndoctor.php" method="post" enctype="multipart/form-data">
  <label for="doctor"> Select a doctor:</label>
  <select name="doctor" id="doctor">
    <?php  
        include 'selectdoctor.php';
    ?>
  </select> <br>
  <label for="patient"> Select a patient:</label>
  <select name="patient" id="patient">
    <?php
	include 'getpatient.php';
    ?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

<!-- THIS IS TO DELETE DOCTOR -->
<h2> Delete Doctor: </h2>
<form action="confirm_rmdoctor.php" method="post" enctype="multipart/form-data">
  <label>input doctor's CPSO number or doctor's name:
  <input list="rmdoctor" name="rmdoctor" /></label>
  <datalist id="rmdoctor">
      <?php
	  include 'selectdoctor.php';
      ?>
  </datalist><br>
  <br>
  <input type="submit" value="Submit">  
</form>

<h2> View Hospital: </h2>
<form action="gethospital.php" method="post">
<label>Choose a Hospital:
<input list="Hospital" name="Hospital" /></label>
<datalist id="Hospital">
    <?php
        include 'selecthospital.php';
    ?>
</datalist><br>
<input type="submit" value="Submit">
</form>

<!-- this code is to update hospital bed -->
<h2> Update Hospital Bed: </h2>
<form action="updatehos.php" method="post">
   <label>Choose a Hospital:
   <input list="Hospital" name="Hospital" /></label>
   <datalist id="Hospital">
    	<?php
        	include 'selecthospital.php';
    	?>
   </datalist><br>
   New number of Beds : <input type="text" name="bednum"><br>
   <input type="submit" value="Submit">
</form>

<?php
	mysqli_close($connection);
?>
</body>
</html>
