<!DOCTYPE html> 
<html lang='en'>
<head>
	<title>Family Tree | Developed By Kiran Patel</title>

	<!-- meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- end meta -->

	<!-- styles -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/customStyle.css" />
	<link rel="stylesheet" type="text/css" href="styles/tree.css" />
	<!-- end styles -->
</head>
<body>

	<!-- container -->
	<div class='container'>

		<!-- navigation -->
		<div class='col-xs-12'>
			<h1 id='title'>Family Tree</h1>

			<div id='nav'>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="stats.php">Stats</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="addmember.php">Add Member</a></li>
				</ul>
			</div>
		</div>
		<!-- end navigation -->
		

		<hr class='page-break'/>

		<?php include 'treeGen.php'; ?>

		<!-- DESKTOP VERSION -->
		<div class='col-sm-12 hidden-xs'>

			<?php 
				//Indexes used to splice the family tree
				$indexes=array(10, 37, 52, 70, 74); 

				//Container for list of start nodes. 
				echo "<div class='family-starts'>"; 
					echo "<p>Click the family line you want to view..</p>"; 
					echo "<ul>"; 

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

						//Connection class. 
						require_once 'connectdb.php'; 

						//Create new connection object. 
						$connect = new connectdb();

						//Return connection object. 
						$con = $connect->make_connection(); 

						//Get the name of the person at the split. 
						$query = "SELECT fName FROM relation WHERE relationID=" . $end;
						
						$set = mysqli_query($con, $query); 
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

						mysqli_close($con);

					//end list
					echo "</ul>"; 
				//end current block 
				echo "</div>"; 

				//For each node.. 
				for($i=0; $i<sizeof($indexes); $i++)
				{
					//Get the current index.. 
					$currentTree = $i + 1; 

					//If it is the first one then add a current-shown class. 
					if($currentTree==1)
					{
						echo "<div class='family-line current-shown' id='tree_" . $currentTree . "'>"; 
					}
					else
					{
						echo "<div class='family-line' id='tree_" . $currentTree . "'>"; 
					}

					//Create new tree gen object to generate tree. 
					$tree = new treeGen(); 

					//Generate tree.  
					$tree->generateTree($indexes[$i]); 

					echo "</div>"; 			
				}
			?>

			</div>
			<!-- END DESKTOP -->

			<!-- mobile -->
			<div class='visible-xs'><h3>Currently no mobile support on this application. Sorry!</h3></div>
			<!-- end mobile -->

			<!-- footer -->
			<div class='col-xs-12'>
				<hr class='page-break'/>
				<h4>Developed By Kiran Patel</h4>
			</div>
			<!-- end footer -->

	</div> 
	<!-- end container -->

	<!-- scripts -->
	<script type="text/javascript" src='scripts/jquery.min.js'></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src='scripts/customTrans.js'></script>
	<!-- end scripts -->
</body>
</html>