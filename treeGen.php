<?php 
	
	//Class provides application with way to generate the tree. 
	class treeGen
	{
		//Function creates the decendents of the parameter parent id. 
		function createDesc($currentParentID)
		{
			require_once 'connectdb.php'; 

			//Create new connection object. 
			$desc_connection = new connectdb();

			//Return connection object. 
			$con = $desc_connection->make_connection(); 

			//Set query to get all children of current parent. 
			$query = "SELECT * FROM relation WHERE parentID='$currentParentID'";
			//Get result set. 
			$setChild = mysqli_query($con, $query); 

			echo "<ul>"; 

			//For each child.. 
			while($row = mysqli_fetch_array($setChild))
			{
				//Print a new list element and depending on if they have a spouse or not print thier name. 
				echo "<li>"; 
					if($row['Spouse']!='')
					{
						echo "<a href='#'>" . $row['fName'] . " / " . $row['Spouse'] . "</a>"; 
					}
					else
					{
						echo "<a href='#'>" . $row['fName'] . "</a>"; 
					}
					
					//Recusively call createDesc and pass the current relation. 
					$this->createDesc($row['relationID']); 
				echo "</li>"; 
			}

			echo "</ul>"; 
			//Close connection. 
			mysqli_close($con); 
		}

		//Function starts the tree. 
		function startTags($parentID)
		{
			//Print Start tags to create tree. 
			echo "<div class='tree'>"; 
			echo "<ul>";

			//Send parent ID to create all decendants. 
			$this->createDesc($parentID);
		}

		//Function ends the tree. 
		function endTags()
		{
			echo "</ul>"; 
			echo "</div>"; 
		}
	}
?>