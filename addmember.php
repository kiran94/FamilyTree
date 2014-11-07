<!DOCTYPE html>
<html>
<head>
	<title>Add Member</title>
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
						<li><a href="index.php">Home</a></li>
						<li><a href="stats.php">Stats</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="addmember.php">Add Member</a></li>
					</ul>
				</div>

			</div>
			<hr class='page-break'/>
		

		<div class='col-xs-12'>
			<form method='POST' action='add_member_post.php'>

				<table>
					<tr>
						<td>First Name:</td>
						<td><input type='text' name='fName' /></td>
					</tr>

					<tr>
						<td>Second Name:</td>
						<td><input type='text' name='lName' /></td>
					</tr>

					<tr>
						<td>Gender: </td>
						<td><select name='sex'>
								<option value='male'>Male</option>
								<option value='female'>Female</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Year Of Birth: </td>
						<td><input type='text' name='year' /></td>
					</tr>

					<tr>
						<td>Place Of Birth: </td>
						<td><input type='text' name='place' /></td>
					</tr>

					<tr>
						<td>Spouse: </td>
						<td><input type='text' name='spouse' /></td>
					</tr>

					<tr>
						<td>Find the new members parent: </td>
						<td>


							<?php
								include 'connectionInfo.php'; 
								$con = mysqli_connect($host, $username, $password, $db); 
								$query = "SELECT fName, relationID, YearOfBirth FROM relation"; 

								$set = mysqli_query($con, $query); 

								echo "<select name='parentID'>"; 
								echo "<option value='0'>Unknown</option>"; 

								while($row = mysqli_fetch_array($set))
								{
									echo "<option value=" . $row['relationID'] .">" . $row['fName'] . " (" . $row['YearOfBirth'] . ")" . "</option>"; 
								}

								echo "</select>"; 

							?>

						</td>
					</tr>


					
					<tr>
						<td><input type='Submit' value='Submit' /></td>
					</tr>

				</table>

				
				




			</form>
		</div>

		<hr class='page-break'/>

	</div>




</body>
</html>