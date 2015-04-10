<?php
	//Connection class. 
	require_once 'connectdb.php';

	class indexing
	{

		public function echoIndexes($indexes)
		{
			//Container for list of start nodes. 
			echo "<div class='family-starts'>"; 
				echo "<p>Click the family line you want to view..</p>"; 
				echo "<ul>"; 

					//Create new connection object. 
					$connect = new connectdb();

					//Return connection object. 
					$con = $connect->make_connection(); 

					//Generate the query using the indexes. 
					$query = $this->genQuery($indexes); 
					
					//Execute Query. 
					$set = mysqli_query($con, $query); 
					
					//Print the result set. 
					$this->echoResults($set); 

					//Close connection. 
					mysqli_close($con);

				//end list
				echo "</ul>"; 
			//end current block 
			echo "</div>"; 
		}

		private function genQuery($indexes)
		{
			//Get the name of the person at the split. 
			$query = "SELECT fName FROM relation WHERE relationID="; 
			$end = ""; 

			if(sizeof($indexes) == 1)
			{
				$end = $indexes[$i];
			}
			else
			{
				for($j=0; $j<sizeof($indexes); $j++)
				{
					if($j!=sizeof($indexes)-1)
					{
						$end .= $indexes[$j] . " OR relationID=";
					}
					else
					{
						$end .= $indexes[$j]; 
					}
				}
			}

			return $query . $end; 
		}

		private function echoResults($set)
		{
			$currentIndex = 1; 

			while($row = mysqli_fetch_array($set))
			{
				//Create a list of the current index. 
				if($currentIndex==1)
				{
					echo "<li class='line-start current-line' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 
				}
				else
				{
					echo "<li class='line-start' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 
				}
				$currentIndex++;  
			}
		}
	







	}
?>