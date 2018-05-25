<html>
	<head>
		<title>iLib - UP Diliman Integrated Library System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">	
	</head>
	<body>
		<div id="parent">
			<div id="topbar">
				<br>
				<h1 class="toptext">Web OPAC</h1>
				<p class="toptext">Municipality of Rodriguez, Rizal</p>
			</div>
			<div id="navbar">
				<nav>
					<a href="index.php" class="nav">HOME</a> &emsp; | &emsp;
					<a href="error.html" class="nav">ADVANCED SEARCH</a> &emsp; | &emsp;
					<a href="help.html" class="nav">HELP</a> &emsp; | &emsp;
					<a href="login.php" class="nav">ADMIN LOGIN</a> &emsp; &emsp;
				</nav>
			</div>
			<div style="position: absolute; top: 20%; left: 20%; width: 60%; padding-bottom: 20px;">
<?PHP	
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'lis161');
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)
	or die ("Error connecting to database");
	session_start();
    $_SESSION['username'] = null;
    $_SESSION['username'] = null;

	$query = $_POST['query'];

	if($query==null){
		echo '<script>
        if (confirm("Please input a query.")) {
        window.location.href = "index.php";
        } else {
        window.location.href = "index.php";
        }
        </script>';
	}

	$qry="SELECT * FROM resources WHERE title='$query' OR author='$query' OR aNumber='$query' OR cNumber='$query' OR sNumber='$query' OR publisher='$query' OR subject='$query'";
	$result = mysqli_query($link, $qry);
	$count = mysqli_num_fields($result);
    if($result){
    	if(mysqli_num_rows($result) == 1) {    		
    		echo "<center>";
    		echo "<h1> RESULTS </h1>";
    		echo "for <i>".$query."</i> <hr>";
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
        	while($row = mysqli_fetch_array($result)) {
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
    echo "<hr><center><input type='button' name='back' id='search' value='Back' onClick='history.back()'>"
?>
</div>	
	</body>