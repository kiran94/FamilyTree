<!DOCTYPE html>
<html lang="en">
<head>
	<title>Family Tree</title>
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

	<div class="form_relation">
		<form method="POST" action="insertRelation.php">

			<table>
				<tr>
					<th>First Name:</th>
					<td><input type="text" name="fName" /><br/></td>
				</tr>

				<tr>
					<th>Last Name:</th>
					<td><input type="text" name="lName" /></td>
				</tr>

				<tr>
					<th>Sex:</th>
					<td><input type="text" name="sex" /></td>
				</tr>

				<tr>
					<th>Year Of Birth:</th>
					<td><input type="text" name="YearOfBirth" /></td>
				</tr>

				<tr>
					<th>Place Of Birth:</th>
					<td><input type="text" name="PlaceOfBirth" /></td>
				</tr>

				<tr>
					<th>Spouse:</th>
					<td><input type="text" name="Spouse" /></td>
				</tr>

				<!-- SELECT DROPDOWN -->
				<tr>
					<th>Parent</th>
					<td>
						<select name="parentID">
							<option value="NULL">Unknown</option>
						</select>
					</td>
				</tr>

				<tr>
					<td><input type="submit" value="Submit" /></td>
				</tr>
			</table>

		</form>
	</div>


</body>
</html>