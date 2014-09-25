<!DOCTYPE html> 
<html lang='en'>
<head>
	<title>Stats | Family Tree | Developed By Kiran Patel</title>

	<!-- META -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- END META -->

	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/customStyle.css" />
	<!-- <link rel="stylesheet" type="text/css" href="styles/tree.css" /> -->
	<!-- END STYLE -->
</head>
<body>

	<div class='container'>

		
			<div class='col-xs-12'>
				<h1 id='title'>Family Tree</h1>

				<div id='nav'>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="stats.php">Stats</a></li>
						<li><a href="about.php">About</a></li>
					</ul>
				</div>

			</div>
		

		<hr class='page-break'/>

		
			<!-- DESKTOP VERSION -->
			<div class='col-sm-12 '>
				
				<?php 

					//GET CONNECTION INFO. 
					include 'connectionInfo.php'; 


					//Create connection and set database. 
					$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
					mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

					//Total number of people
					$query = "SELECT COUNT(*) AS total FROM relation"; 
					$set = mysqli_query($con, $query); 
					$row = mysqli_fetch_array($set); 
					$total = $row['total']; 


					echo " <h2>Statistics</h2>";
					echo " <p>This part of the application analyses the members stored in the database and breaks down certain attributes such as gender, place of birth etc. There are currently <strong>" . $total . "</strong> family members registered on the database. </p>"; 
					 
				
					mysqli_close($con); 
				 ?>

				
				
				


				<hr class='page-break'/>
				<h3>Gender</h3>

				<?php 
					$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
					mysqli_select_db($con, $db) or die("Cannot connect to the database"); 

					$query = "SELECT sex, COUNT(*) AS num FROM relation GROUP BY sex"; 
					$set = mysqli_query($con, $query); 

					while($row = mysqli_fetch_array($set))
					{
						$proportion = ($row['num']/$total)*100; 

						echo "<div class='stat_group'>"; 
							echo "<h4>" . $row['sex']  . "</h4>" . "<h5>" . round($proportion, 2) . "%<h5>";
							echo "<div class='prop' style='width:". round($proportion) ."%;'>value</div>";  
						echo "</div>"; 
					}

					mysqli_close($con); 





				?>


				<hr class='page-break'/>
				<h3>Place Of Birth</h3>

				<hr class='page-break'/>
				<h3>Time Scale</h3>

				<?php 

					$con = mysqli_connect($host, $username, $password) or die("Cannot connect"); 
					mysqli_select_db($con, $db) or die("Cannot connect to the database"); 


					$query = "SELECT MIN(YearOfBirth) AS min, MAX(YearOfBirth) AS max FROM relation WHERE YearOfBirth<>0"; 

					$set = mysqli_query($con, $query); 

					$row = mysqli_fetch_array($set);

					echo "<p>The time line varies from " . $row['min']  .  " to " . $row['max'] . "</p> "; 

				?>

				





			</div>
			<!-- END DESKTOP -->



			

		
			<div class='col-xs-12'>
				<hr class='page-break'/>
				<h4>Developed By Kiran Patel</h4>

			</div>
		

	<!-- END CONTAINER -->
	</div>


	<script type="text/javascript" src='scripts/jquery.js'></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src='scripts/customTrans.js'></script> --> 
</body>
</html>