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

    $cQry="SELECT * FROM resources;";
	$cResult = mysqli_query($link, $cQry);
	$count = mysqli_num_fields($cResult);
    if($cResult){
    	if(mysqli_num_rows($cResult) != 0) {    		
    		echo "<center> <br> <br> <br> <br> <br> <br> <br>";
    		echo "<table border=1>";
    		echo "<tr>
    			  <th> Title </th>
    			  <th> Author </th>
    			  <th> Accession No. </th>
    			  <th> Call No. </th>
    			  <th> ISBN/ISSN </th>
    			  <th> Publisher </th>
    			  <th> Subject Keyword </th>
    			  </tr>";
        	while($row = mysqli_fetch_array($cResult)) {
        		$i=0;
        		echo "<tr>";
        		while($i<$count){
        			echo "<td width = '14.285%'>";
        			echo $row[$i];
        			echo "</td>";
        			$i = $i+1;
        		}
        		echo "</tr>";			
			}
			echo "</table>";
        }
		else {
			echo "<h1><center>No results</center></h1>";
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
					<a href="accounts.php" class="nav">ACCOUNT MANAGEMENT</a> &emsp; | &emsp;
					<a id="current">COLLECTION MANAGEMENT</a> &emsp; | &emsp;
					<a href="login.php" class="nav">LOG OUT</a> &emsp; &emsp;
				</nav>
			</div>
			<div>
				<br><hr><br>
				<form name="createRec" method="post" action="createRec.php">
					<table width="60%">
						<tr>
							<th style="border:0;">
								TITLE
							</th>
							<td style="border:0;">
								<input type="text" name='qTitle' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								AUTHOR
							</th>
							<td style="border:0;">
								<input type="text" name='qAuthor' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								ACCESSION NUMBER
							</th>
							<td style="border:0;">
								<input type="text" name='qANumber' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								CALL NUMBER
							</th>
							<td style="border:0;">
								<input type="text" name='qCNumber' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								ISBN/ISSN
							</th>
							<td style="border:0;">
								<input type="text" name='qSNumber' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								PUBLISHER
							</th>
							<td style="border:0;">
								<input type="text" name='qPublisher' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th style="border:0;">
								SUBJECT KEYWORD
							</th>
							<td style="border:0;">
								<input type="text" name='qSubject' style="width:100%">
							</td>							
						</tr>
						<tr>
							<th colspan="2" style="border: 0; border-top: 1px solid black;">
								<button type="submit" name="create" formaction="createRec.php">Create Record</button>
								<button type="submit" name="delete" formaction="deleteRec.php">Delete Record</button>
								<input type="reset" name="reset">
							</th>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>