<?php
	/*
		Class provides a central means for application to connect to the database. 
	*/
	class connectdb
	{
		public function make_connection()
		{
			//Retrieve connection information. 
			include "connectioninfo.php";

			//Create connection
			$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
			//Set database. 
			mysqli_select_db($con, $db) or die("Cannot connect to the database");
			//Return connection. 
			return $con; 
		}

	
	}
?>