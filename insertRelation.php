<?php

	$fName = $_POST['fName']; 
	$lName = $_POST['lName']; 
	$sex = $_POST['sex']; 
	$YearOfBirth = $_POST['YearOfBirth']; 
	$PlaceOfBirth = $_POST['PlaceOfBirth']; 
	$Spouse = $_POST['Spouse']; 
	$parentID = $_POST['parentID']; 


	include 'connection.php'; 

	$query = "INSERT INTO relation(fName, lName, sex, YearOfBirth, PlaceOfBirth, Spouse, parentID) VALUES ('$fName', '$lName', '$sex', '$YearOfBirth', '$PlaceOfBirth', '$Spouse', '$parentID')";
	mysqli_query($con, $$query); 


	mysqli_close($con); 
?>