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

    $row = mysqli_fetch_row($result);
    if ($row[2] == 0){
    	echo '<script>
                  if (confirm("You do not have administrative privileges")) {
                  window.location.href = "rearFacing.php";
                  } else {
                  window.location.href = "rearFacing.php";
                  }
             </script>';
    }

    $aQry="SELECT * FROM credentials";
	$aResult = mysqli_query($link, $aQry);
	$count = mysqli_num_fields($result);
    if($aResult){
    	if(mysqli_num_rows($result) == 1) {    		
    		echo "<center> <br> <br> <br> <br> <br> <br> <br>";
    		echo "<table border=1 style='width:60%; background-color:#EEEEEE;'>";
    		echo "<tr>
    			  <th> Username </th>
    			  <th> Admin? </th>
    			  </tr>";
    		while($row = mysqli_fetch_array($aResult)) {
        		echo "<tr>";
    			echo "<td width = '25%'>";
    			echo $row[0];
    			echo "</td>";
    			echo "<td width = '25%'>";
    			if ($row[2] != 0) {
    				echo "YES";
    			}
    			else {
    				echo "NO";
    			}
    			echo "</td>";
        		echo "</tr>";
			}
			echo "</table>";
        }
		else {
			echo "<h1><center>No accounts(?)</center></h1>";
 		}
    }
    else {
    	echo "Query Failed";
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
					<a id="current">ACCOUNT MANAGEMENT</a> &emsp; | &emsp;
					<a href="collections.php" class="nav">COLLECTION MANAGEMENT</a> &emsp; | &emsp;
					<a href="login.php" class="nav">LOG OUT</a> &emsp; &emsp;
				</nav>
			</div>
			<div>
				<br><hr><br>
				<form name="manageAccounts" method="post" action="manageAccounts.php">
					<table width="60%">
						<tr>
							<th style="border:0;">
								USERNAME
							</th>
							<td style="border:0;">
								<input type="text" name="uName" style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								PASSWORD
							</th>
							<td style="border:0;">
								<input type="text" name="pWord" style="width:100%">
							</td>
						</tr>
						<tr>
							<th style="border:0;">
								ADMIN?
							</th>
							<th style="border:0;">
								<select name="aPriv">
									<option value=1>YES</option>
									<option value=0>NO</option>
								</select>
							</th>
						</tr>
						<tr>
							<th colspan="2" style="border: 0; border-top: 1px solid black;">
								<button type="submit" name="create" formaction="createNew.php">Create Account</button>
								<button type="submit" name="changeAdmin" formaction="changeAdmin.php">Admin Priv</button>
								<button type="submit" name="delete" formaction="delete.php">Delete Account</button>
								<input type="reset" name="reset">
							</th>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>