<?php   
    require("config.php");
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['username'] = null;
?>

<html>
	<head>
		<title>Web OPAC | Municipality of Rodriguez, Rizalm</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">	
	</head>
	<body id="search">
		<script src="forward.js"></script> 
		<div class="parent">
			<div id="topbar">
				<br>
				<h1 class="toptext">Web OPAC</h1>
				<p class="toptext">Municipality of Rodriguez, Rizal</p>
			</div>
			<div id="navbar">
				<nav>
					<a id="current">HOME</a> &emsp; | &emsp;
					<a href="advanced.php" class="nav">ADVANCED SEARCH</a> &emsp; | &emsp;
					<a href="help.html" class="nav">HELP</a> &emsp; | &emsp;
					<a href="login.php" class="nav">ADMIN LOGIN</a> &emsp; &emsp;
				</nav>
			</div>
			<div>
				<form name="search" method="post" action="search.php">
					<input type="text" name="query" id="searchInput" placeholder="Search..">	
					<input type="submit" name="submit" id="search" value="GO">
				</form>
			</div>
		</div>
	</body>
</html>