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

	//admin privileges
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
    //end

	//Assign queries
  $qTitle = $_POST['qTitle'];
  $qAuthor = $_POST['qAuthor'];
  $qANumber = $_POST['qANumber'];
  $qCNumber = $_POST['qCNumber'];
  $qSNumber = $_POST['qSNumber'];
  $qPublisher = $_POST['qPublisher'];
  $qSubject = $_POST['qSubject'];

	//Check Queries
	if (($qTitle == '') || ($qAuthor == '') || ($qANumber == '') || ($qCNumber == '') || ($qSNumber == '') || ($qPublisher == '') || ($qSubject == '')) {
    echo '<script>
        if (confirm("Please complete the fields")) {
        window.location.href = "collections.php";
        } else {
        window.location.href = "collections.php";
        }
        </script>';
  }
	//END Check
  $create="INSERT INTO resources VALUES ('$qTitle', '$qAuthor', '$qANumber', '$qCNumber', '$qSNumber', '$qPublisher', '$qSubject');";
  echo $create;
	$createResult = mysqli_query($link, $create);
  if($createResult) {
	echo '<script>
        if (confirm("SUCCESS!")) {
        window.location.href = "collections.php";
        } else {
        window.location.href = "collections.php";
        }
        </script>';
  }
  else {
         die("Query failed");
  }
	//END
	
	
	//Start Query population	
	
?>
</div>	
</body>