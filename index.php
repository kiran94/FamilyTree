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

		<!-- treeGen Class -->
		<?php include 'treeGen.php'; ?>

		<!-- desktop -->
		<div class='col-sm-12 hidden-xs'>

			<?php 
				//Indexes to splice tree by. 
				$indexes=array(10, 37, 52, 70, 74); 

				//Import the indexing class. 
				require_once "indexing.php"; 
				//Create a new indexing object. 
				$indexObj = new indexing();
				//Print Indexes out.
				$indexObj->echoIndexes($indexes); 
				
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
			<!-- end desktop -->

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