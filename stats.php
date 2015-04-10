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
	<link rel="stylesheet" type="text/css" href="styles/tree.css" />
	<!-- END STYLE -->
</head>
<body>

	<!-- container -->
	<div class='container'>

		<!-- title and nav -->
		<div class='col-xs-12'>
			<h1 id='title'>Family Tree</h1>
			<div id='nav'>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Stats</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="addmember.php">Add Member</a></li>
				</ul>
			</div>
		</div>
		<!-- end nav -->
		
		<hr class='page-break'/>

		
		<!-- content -->
		<div class='col-sm-12 '>
			<?php 
				//Connection Class. 
				include 'connectdb.php'; 
				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 

				//Total number of people
				$query = "SELECT COUNT(*) AS total FROM relation"; 
				//Execute Query
				$set = mysqli_query($con, $query); 
				//Fetch Array. 
				$row = mysqli_fetch_array($set); 
				//Get total column value. 
				$total = $row['total']; 

				//Print value. 
				echo " <h2>Statistics</h2>";
				echo " <p>This part of the application analyses the members stored in the database and breaks down certain attributes such as gender, place of birth etc.
				 There are currently <strong>" . $total . "</strong> family members registered on the database. </p>"; 
				 
				//Close connection. 
				mysqli_close($con); 
			 ?>

			<hr class='page-break'/>
			<h3>Gender</h3>

			<?php 
				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 

				//Get gender counts. 
				$query = "SELECT sex, COUNT(*) AS num FROM relation GROUP BY sex"; 
				//Execute Query. 
				$set = mysqli_query($con, $query); 	

				//For all the records. 
				while($row = mysqli_fetch_array($set))
				{	
					//Calculate the how proportional the current value is to the whole set. 
					$proportion = ($row['num']/$total)*100; 

					//Print as bar from proportion. 
					echo "<div class='stat_group'>"; 
						echo "<h4>" . $row['sex']  . "</h4>" . "<h5>" . round($proportion, 2) . "%<h5>";
						echo "<div class='prop' style='width:". round($proportion) ."%;'>l</div>";  
					echo "</div>"; 
				}

				//Close Connection. 
				mysqli_close($con); 
			?>


			<hr class='page-break'/>
			<h3>Place Of Birth</h3>
			<?php 
				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 

				//Get the name of the person at the split. 
				$query = "SELECT PlaceOfBirth, COUNT(PlaceOfBirth) AS place FROM relation GROUP BY PlaceOfBirth"; 
				//Query the database. 
				$set = mysqli_query($con, $query); 
				//Get the array.
				while($row = mysqli_fetch_array($set))
				{
					//Calculate the how proportional the current value is to the whole set. 
					$proportion = ($row['place']/$total)*100; 

					//Print as bar from proportion. 
					echo "<div class='stat_group'>"; 
					echo "<h4>" . $row['PlaceOfBirth'] . "</h4>" . "<h5>" . $row['place'] . "%<h5>";
					echo "<div class='prop' style='width:". round($proportion) ."%;'>l</div>";  
					echo "</div>";  
				}

				//Close Connection  			
				mysqli_close($con);
			?>


			<hr class='page-break'/>
			<h3>Time Scale</h3>

			<?php 
				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 

				//Build query to get the maximum and minimum year. 
				$query = "SELECT MIN(YearOfBirth) AS min, MAX(YearOfBirth) AS max FROM relation WHERE YearOfBirth<>0"; 
				//Execute query. 
				$set = mysqli_query($con, $query); 
				//Fetch Array. 
				$row = mysqli_fetch_array($set);

				//Get max and min. 
				$min = $row['min']; 
				$max = $row['max']; 

				//Print 
				echo "<p>The time line varies from " . $min  .  " to " . $max . ". Below are each family members birth year plotted against the time line.</p> ";
				//Close Connection. 
				mysqli_close($con); 

				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 
				//Build query to get all year of births excluding unknowns. 
				$query = "SELECT YearOfBirth AS year FROM relation WHERE YearOfBirth<>0"; 
				//Query database. 
				$set = mysqli_query($con, $query); 

				//Set counter to one, used for identificaiton css. 
				$counter = 1; 

				//For each record. 
				while($row = mysqli_fetch_array($set)) 
				{
					//Get the plot value. 
					$plot = (($row['year'] - $min) / ($max - $min))*97; 
					//Plot onto the graph. 
					echo "<div class='time_plot' id='" . $counter  . "' style='margin-left:" . $plot  . "%;'>" . $row['year'] . "</div>"; 
					//Plot popover. 
					echo "<div class='time_popover' id='popover_" . $counter . "'>" . $row['year'] . "</div>"; 
					//Increment counter. 
					$counter++; 
				}
				//Close connection. 
				mysqli_close($con); 
			?>

			<hr id='time-line' />
			<div id='min-date'><?php echo $min;  ?></div>
			<div id='max-date'><?php echo $max;  ?></div>

			<?php 
				//Create connection object.
				$connection = new connectdb(); 
				//Get the connection. 
				$con = $connection->make_connection(); 

				//Build query to determine number of unknowns. 
				$query = "SELECT COUNT(*) AS num FROM relation WHERE YearOfBirth=0"; 
				//Execute query.
				$set = mysqli_query($con, $query); 
				//Fetch Array. 
				$row = mysqli_fetch_array($set); 
				//Print result. 
				echo "There are " . $row['num'] . " family members with birth years which are unknown."; 
			?>
		</div>
		<!-- end content -->

		<!-- footer -->
		<div class='col-xs-12'>
			<hr class='page-break'/>
			<h4>Developed By Kiran Patel</h4>
		</div>
		<!-- end footer -->
	

	<!-- END CONTAINER -->
	</div>

	<!-- scripts -->
	<script type="text/javascript" src='scripts/jquery.min.js'></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src='scripts/customTrans.js'></script> 
	<!-- scripts -->
</body>
</html>