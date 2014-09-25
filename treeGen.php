<?php 
		

		function startTags($parentID)
		{
			
			echo "<div class='tree'>"; 
			echo "<ul>";

			// $host = "localhost";
			// $username="root"; 
			// $password=""; 
			// $db="familytree";
			include 'connectionInfo.php'; 
 
			createDesc($host, $username, $password, $db, $parentID);
		}

		function endTags()
		{
			echo "</ul>"; 
			echo "</div>"; 
		}

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
			mysqli_close($con); 
		}

	?>
