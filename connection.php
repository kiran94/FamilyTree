<?php
	$host = "localhost";
	$username="root"; 
	$password=""; 
	$db="familytree";

	$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
	mysqli_select_db($con, $db) or die("Cannot connect to the database"); 


?>