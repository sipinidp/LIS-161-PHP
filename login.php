<?php   
    require("config.php");
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['username'] = null;
?>

<html>
	<head>
		<title>Web OPAC | Municipality of Rodriguez, Rizal</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">	
	</head>
	<body>		
		<div class="parent">
			<div id="topbar">
				<br>
				<h1 class="toptext">Web OPAC</h1>
				<p class="toptext">Municipality of Rodriguez, Rizal</p>
			</div>
			<div id="navbar">
				<nav>
					<a href="index.php" class="nav">HOME</a> &emsp; | &emsp;
					<a href="advanced.php" class="nav">ADVANCED SEARCH</a> &emsp; | &emsp;
					<a href="help.html" class="nav">HELP</a> &emsp; | &emsp;
					<a id="current">ADMIN LOGIN</a> &emsp; &emsp;
				</nav>
			</div>
			<div>
				<form name="login" method="post" action="login-exec.php">
					<input type="text" name='login' id="login" placeholder="Username">
					<input type="password" name='password' id="login" placeholder="Password">	
					<input type="submit" name="submit" id="search" value="GO">
				</form>
			</div>
		</div>
	</body>
</html>