<?php
	//Connection class. 
	require_once 'connectdb.php';

	class indexing
	{
		//Function uses functions in this class to echo indexes. 
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

		//Function generates the query. 
		private function genQuery($indexes)
		{
			//Base Query
			$query = "SELECT fName FROM relation WHERE relationID=";
			//Variable to hold rest of query.  
			$end = ""; 

			//If only one index in the array then set index. 
			if(sizeof($indexes) == 1) { $end = $indexes[$i]; }
			else
			{	
				//For all the indexes. 
				for($j=0; $j<sizeof($indexes); $j++)
				{	
					//Append appropaite query. 
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

			//Return concat of final query. 
			return $query . $end; 
		}


		//Function prints the results into HTML. 
		private function echoResults($set)
		{	
			//Set current index to 1. 
			$currentIndex = 1; 

			//For all the records in the row. 
			while($row = mysqli_fetch_array($set))
			{
				//Create a list of the current index, with the first one having a current-line class. 
				if($currentIndex==1)
				{
					echo "<li class='line-start current-line' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 
				}
				else
				{
					echo "<li class='line-start' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 
				}
				//Increment current index. 
				$currentIndex++;  
			}
		}
	







	}
?>