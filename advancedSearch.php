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


	//Assign queries
	$firstField = $_POST["firstField"];

	if (isset($_POST["firstQuery"])) {
		$firstQuery = $_POST["firstQuery"];
	}
	else {
		$firstQuery = null;
	}

	$firstOperator = $_POST["firstOperator"];
	
	$secondField = $_POST["secondField"];
	
	if (isset($_POST["secondQuery"])) {
		$secondQuery = $_POST["secondQuery"];
	}
	else {
		$secondQuery = null;
	}
	
	$secondOperator = $_POST["secondOperator"];
	
	$thirdField = $_POST["thirdField"];
	
	if (isset($_POST["thirdQuery"])) {
		$thirdQuery = $_POST["thirdQuery"];
	}
	else {
		$thirdQuery = null;
	}
	//END
	//Check Queries
	if (($firstQuery == null) && ($secondQuery == null) && ($thirdQuery == null)){
		echo "<h1> <center> ERROR NO INPUT! </center> </h1>";
		echo "<hr> <center> <input type='button' name='back' id='search' value='Back' onClick='history.back()'>";
		exit();
	}
	//END Check
	
	//Start Query population	
	$query = "";
	if (($firstQuery != null) && ($secondQuery != null) && ($thirdQuery != null)) {
		$query = "SELECT * FROM resources WHERE $firstField='$firstQuery' $firstOperator $secondField='$secondQuery' $secondOperator $thirdField='$thirdQuery'";
	}

	else if (($firstQuery != null) && ($secondQuery != null) && ($thirdQuery == null)) {
		$query = "SELECT * FROM resources WHERE $firstField='$firstQuery' $firstOperator $secondField='$secondQuery'";
	}

	else if (($firstQuery != null) && ($secondQuery == null) && ($thirdQuery != null)) {
		$query = "SELECT * FROM resources WHERE $firstField='$firstQuery' $firstOperator $thirdField='$thirdQuery'";
	}

	else if (($firstQuery == null) && ($secondQuery != null) && ($thirdQuery != null)) {
		$query = "SELECT * FROM resources WHERE $secondField='$secondQuery' $secondOperator $thirdField='$thirdQuery'";
	}

	else if (($firstQuery != null) && ($secondQuery == null) && ($thirdQuery == null)) {
		$query = "SELECT * FROM resources WHERE $firstField='$firstQuery'";
	}

	else if (($firstQuery == null) && ($secondQuery != null) && ($thirdQuery == null)) {
		$query = "SELECT * FROM resources WHERE $secondField='$secondQuery'";
	}

	else if (($firstQuery == null) && ($secondQuery == null) && ($thirdQuery != null)) {
		$query = "SELECT * FROM resources WHERE $thirdField='$thirdQuery'";
	}
	else {
		echo "";
	}
	//End of query building
	//echo $query; //checker
	$result = mysqli_query($link, $query);
	$count = mysqli_num_fields($result);
    if($result){
    	if(mysqli_num_rows($result) != 0) {    		
    		echo "<center>";
    		echo "<h1> RESULTS </h1>";
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
			echo "No results";
 		}
    }
    else {
    	echo "Error in Connection";
    }
    echo "<hr><center><input type='button' name='back' id='search' value='Back' onClick='history.back()'>"
?>
</div>	
</body>