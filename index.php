<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/customStyle.css" />
	<link rel="stylesheet" type="text/css" href="styles/tree.css" />
</head>
<body>

	<div class='container'>

		
			<div class='col-xs-12'>
				<h1 id='title'>Family Tree</h1>

				<div id='nav'>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Stats</a></li>
						<li><a href="#">About</a></li>
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

					echo "<div class='family-starts'>"; 
						echo "<ul>"; 

							for($i=0; $i<sizeof($indexes); $i++)
							{

								$host = "localhost";
								$username="root"; 
								$password=""; 
								$db="familytree";

								$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
								mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

								$query = "SELECT fName FROM relation WHERE relationID=" . $indexes[$i]; 
								$set = mysqli_query($con, $query); 

								$row = mysqli_fetch_array($set); 

								$currentIndex = $i + 1; 

								echo "<li class='line-start' id='" . $currentIndex . "' >" . $row['fName'] ."</li>"; 

								mysqli_close($con);
							}
						echo "</ul>"; 
					echo "</div>"; 


					for($i=0; $i<sizeof($indexes); $i++)
					{
						$currentTree = $i + 1; 

						if($currentTree==1)
						{
							echo "<div class='family-line current-shown' id='tree_" . $currentTree . "'>"; 
						}
						else
						{
							echo "<div class='family-line' id='tree_" . $currentTree . "'>"; 
						}

						startTags($indexes[$i]); 
						endTags(); 	
						echo "</div>"; 
								
					}


				?>

		


			</div>

			<!-- MOBILE SUPPORT -->
			<div class='visible-xs'>
				<h3>Currently no mobile support on this application. Sorry! </h3>
			</div>

		

		
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