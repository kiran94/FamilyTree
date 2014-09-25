<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="tree.css">
</head>
<body>
	<?php 

		error_reporting(E_ERROR | E_PARSE);
		echo "<div class='tree'>"; 
		echo "<ul>";

			//connection to DB 

			//create query of node 

			//While a node 
			//generate there node
			// ul 
			// li for each person in the node
			//Within each li, search for more decendants and create a node for them
			//cycle through the decendants and then return 

			$host = "localhost";
			$username="root"; 
			$password=""; 
			$db="familytree";

			$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
			mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

			$parentID = 0; 

			$query = "SELECT * FROM relation WHERE parentID='$parentID' "; 

			$set = mysqli_query($con, $query); 

			while($masterRow = mysqli_fetch_array($set))
			{
					mysqli_close($con); 

					echo "<li>"; 
						if($row['Spouse']!='')
						{
							echo "<a href='#'>" . $masterRow['fName'] . " / " . $masterRow['Spouse'] . "</a>"; 
						}
						else
						{
							echo "<a href='#'>" . $masterRow['fName'] . "</a>"; 
						}
						$parentID = $masterRow['relationID']; 

						createDesc($host, $username, $password, $db, $parentID); 

					echo "</li>"; 
				
			}
			echo "</ul>"; 

		echo "</div>"; 

		function createDesc($host, $username, $password, $db, $currentParentID)
		{


			$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
			mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

			$query = "SELECT * FROM relation WHERE parentID='$currentParentID'";
			$setChild = mysqli_query($con, $query); 

			echo "<ul>"; 

			while($row = mysqli_fetch_array($setChild))
			{
				mysqli_close($con); 
				
				echo "<li>"; 
					if($row['Spouse']!='')
					{
						echo "<a href='#'>" . $row['fName'] . " / " . $row['Spouse'] . "</a>"; 
					}
					else
					{
						echo "<a href='#'>" . $row['fName'] . "</a>"; 
					}
					
					createDesc($host, $username, $password, $db, $row['relationID']); 
				echo "</li>"; 
			}

			echo "</ul>"; 
		}

	?>

</body>
</html>