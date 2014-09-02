<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert Relation| Family Tree</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

	<div class="header">
		<h1 class="title">Family Tree</h1>
		<li><a href="index.php">Home |</a></li>
		<li><a href="stat.php">Stats |</a></li>
		<li><a href="about.php">About |</a></li>
	</div>

	<div class="tree">

		<?php
			include 'connection.php'; 
			$query = "SELECT * FROM relation WHERE parentID=0 ";
			$set = mysqli_query($con, $query); 

			if(!$set)
			{
				echo "Nothing found.";
			}
			else
			{
				while($row = mysqli_fetch_array($set))
				{
					echo "<div class='node'>" . $row['fName'] . "</div>"; 
				}
			}

			

		?>




	</div>

	


</body>
</html>