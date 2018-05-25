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
    //end

	//Assign queries
	$uName = $_POST['uName'];
	$pWord = $_POST['pWord'];
	$aPriv = $_POST['aPriv'];

	//Check Queries
	if ($uName == ''){
		echo '<script>
                  if (confirm("Please enter username.")) {
                  window.location.href = "accounts.php";
                  } else {
                  window.location.href = "accounts.php";
                  }
             </script>';
	}

	if ($pWord == ''){
		echo '<script>
                  if (confirm("Please enter password.")) {
                  window.location.href = "accounts.php";
                  } else {
                  window.location.href = "accounts.php";
                  }
             </script>';
	}
	//END Check

	$checkQry="SELECT * FROM credentials WHERE username='$uName'";
    $check=mysqli_query($link, $checkQry);

    if($check) {
      if(mysqli_num_rows($check) != 1) {
      	echo '<script>
                  if (confirm("Username does not exist")) {
                  window.location.href = "accounts.php";
                  } else {
                  window.location.href = "accounts.php";
                  }
             </script>';
         }
       else {
        $checkRow = mysqli_fetch_row($check);
        if (($checkRow[1] != $pWord) || ($checkRow[2] != $aPriv)){
          echo '<script>
                  if (confirm("Account does not exist")) {
                  window.location.href = "accounts.php";
                  } else {
                  window.location.href = "accounts.php";
                  }
             </script>';
        }
        if ($checkRow[2] != 0) {
       	  $change="UPDATE credentials SET admin = 0 WHERE username='$uName';";
        }
        else {
          $change="UPDATE credentials SET admin = 1 WHERE username='$uName';";
        }
       	echo $change;
      	$changeResult = mysqli_query($link, $change);
      	echo '<script>
                    if (confirm("SUCCESS!")) {
                    window.location.href = "accounts.php";
                    } else {
                    window.location.href = "accounts.php";
                    }
               </script>';
       }
  	}
      else {
             die("Query failed");
    }
	//END
	
	
	//Start Query population	
	
?>
</div>	
</body>