<!DOCTYPE html> 
<html lang='en'>
<head>
	<title>Family Tree | Developed By Kiran Patel</title>

	<!-- META -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- END META -->

	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/customStyle.css" />
	<link rel="stylesheet" type="text/css" href="styles/tree.css" />
	<!-- END STYLE -->
</head>
<body>

	<div class='container'>

		
			<div class='col-xs-12'>
				<h1 id='title'>Family Tree</h1>

				<div id='nav'>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="stats.php">Stats</a></li>
						<li><a href="about.php">About</a></li>
					</ul>
				</div>

			</div>
		

		<hr class='page-break'/>

			<?php include 'treeGen.php'; ?>

	
			<!-- DESKTOP VERSION -->
			<div class='col-sm-12 hidden-xs'>

				<?php 
					//Indexes used to splice the family tree
					$indexes=array(10, 37, 52, 70, 74); 

					//Container for list of start nodes. 
					echo "<div class='family-starts'>"; 
						echo "<p>Click the line you want to view..</p>"; 
						echo "<ul>"; 

							//For each starting node.. 
							for($i=0; $i<sizeof($indexes); $i++)
							{
								//GET CONNECTION INFO. 
								include 'connectionInfo.php'; 


								//Create connection and set database. 
								$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
								mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

								//Get the name of the person at the split. 
								$query = "SELECT fName FROM relation WHERE relationID=" . $indexes[$i]; 
								//Query the database. 
								$set = mysqli_query($con, $query); 
								//Get the array.
								$row = mysqli_fetch_array($set); 
								//Get the index of the current iteration. 
								$currentIndex = $i + 1; 
								//Create a list of the current index. 
								echo "<li class='line-start' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 
								//Close connection. 
								mysqli_close($con);
							}
						echo "</ul>"; 
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

						//Geneerate tree for the current index.. 
						startTags($indexes[$i]); 
						endTags(); 	
						echo "</div>"; 
								
					}


				?>

			</div>
			<!-- END DESKTOP -->



			<!-- MOBILE SUPPORT -->
			<div class='visible-xs'>
				<h3>Currently no mobile support on this application. Sorry! </h3>
			</div>
			<!-- END MOBILE -->
		

		
			<div class='col-xs-12'>
				<hr class='page-break'/>
				<h4>Developed By Kiran Patel</h4>

			</div>
		




	<!-- END CONTAINER -->
	</div>


	<script type="text/javascript" src='scripts/jquery.js'></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src='scripts/customTrans.js'></script>
</body>
</html>