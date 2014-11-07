<?php
	
	include 'connectioninfo.php'; 

	$con = mysqli_connect($host, $username, $password, $db);

	$fName = $_POST['fName']; 
	$fName = mysql_real_escape_string($fName);

	$lName = $_POST['lName']; 
	$lName = mysql_real_escape_string($lName);

	$sex = $_POST['sex']; 
	$sex = mysql_real_escape_string($sex);

	$YOB = $_POST['year']; 
	$YOB = mysql_real_escape_string($YOB);

	$POB = $_POST['place']; 
	$POB = mysql_real_escape_string($POB);

	$spouse = $_POST['Spouse'];
	$spouse = mysql_real_escape_string($spouse);

	$parentID = $_POST['parentID']; 
	$parentID = mysql_real_escape_string($parentID);

	$query = "INSERT INTO relation(fName, lName, sex, YearOfBirth, PlaceOfBirth, Spouse, parentID) VALUES ('$fName', '$lName', '$sex', '$YOB', '$POB', '$spouse', '$parentID')"; 

	mysqli_query($con, $query); 
	mysqli_close($con); 

	echo "Added"; 

	header('Location: index.php'); 


?>