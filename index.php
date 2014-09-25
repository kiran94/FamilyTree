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

		<!-- DESKTOP VERSION -->
		<div class='col-sm-12 hidden-xs'>
			<?php include 'treeGen.php'; 
				starttags(9); 
				endtags(); 


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



	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
</body>
</html>