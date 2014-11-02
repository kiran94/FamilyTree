<?php
	
	include 'connectioninfo.php'; 

	$con = mysqli_connect($host, $username, $password, $db);

	$fName = $_POST['fName']; 
	$lName = $_POST['lName']; 
	$sex = $_POST['sex']; 
	$YOB = $_POST['year']; 
	$POB = $_POST['place']; 
	$spouse = $_POST['Spouse']; 
	$parentID = $_POST['parentID']; 

	$query = "INSERT INTO relation(fName, lName, sex, YearOfBirth, PlaceOfBirth, Spouse, parentID) VALUES ('$fName', '$lName', '$sex', '$YOB', '$POB', '$spouse', '$parentID')"; 

	mysqli_query($con, $query); 
	mysqli_close($con); 

	echo "Added"; 

	header('Location: index.php'); 


?>