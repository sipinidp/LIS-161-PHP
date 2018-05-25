<?php   
    require("config.php");        
    define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'lis161');
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)
	or die ("Error connecting to database");
    session_start();

    $login = $_SESSION['username'];
    $password = $_SESSION['password'];
    $qry="SELECT * FROM credentials WHERE username='$login' AND password='$password'";
    $result=mysqli_query($link, $qry);

    if($result) {
      if(mysqli_num_rows($result) != 1) {
      	echo '<script>
                  if (confirm("Please log in")) {
                  window.location.href = "login.php";
                  } else {
                  window.location.href = "login.php";
                  }
             </script>';      }
  	}
      else {
             die("Query failed");
      }
?>

<html>
	<head>
		<title>[ADMIN] Web OPAC | Municipality of Rodriguez, Rizal</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">	
	</head>
	<body>		
		<div class="parent">
			<div id="topbar" style="background-color: gold;">
				<br>
				<h1 class="toptext" style="color: maroon;">Web OPAC | Admin </h1>
				<p class="toptext" style="color: maroon;">Municipality of Rodriguez, Rizal</p>
			</div>
			<div id="navbar">
				<nav>
					<a href="accounts.php" class="nav">ACCOUNT MANAGEMENT</a> &emsp; | &emsp;
					<a href="collections.php" class="nav">COLLECTION MANAGEMENT</a> &emsp; | &emsp;
					<a href="login.php" class="nav">LOG OUT</a> &emsp; &emsp;
				</nav>
			</div>
		</div>
		<?php
		echo "<br><br><br><br><br><br><hr>
		<h1><center> Welcome ".$login."</h1>";
		?>
	</body>
</html>