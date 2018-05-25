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
<?php
      // Save this as login-exec.php
      //Start session      
      define('DB_HOST', 'localhost');
      define('DB_USER', 'root');
      define('DB_PASSWORD', '');
      define('DB_DATABASE', 'lis161');
      $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)
      or die ("Error connecting to database");
      session_start();
      //Include database connection details
      //require_once("config.php");
      require("clean.php");
      //Array to store validation errors
      $errmsg_arr = array();
      //Validation error flag
      $errflag = false;
      //Sanitize the POST values
      $login = clean($_POST['login']);
      $password = clean($_POST['password']);
      //Input Validations
      if($login == '') {
             echo '<script>
                  if (confirm("Please input username")) {
                  window.location.href = "login.php";
                  } else {
                  window.location.href = "error.html";
                  }
             </script>';
             exit();
      }
      if($password == '') {
             echo '<script>
                  if (confirm("Please input password")) {
                  window.location.href = "login.php";
                  } else {
                  window.location.href = "error.html";
                  }
             </script>';
             exit();
      }
      //If there are input validations, redirect back to the login form
      if($errflag) {
             $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
             //session_write_close();
             //header("location: login-form.php");
             exit();
      }
      //Create query
      $qry="SELECT * FROM credentials WHERE username='$login' AND password='$password'";
      $result=mysqli_query($link, $qry);
      //Check whether the query was successful or not
      if($result) {
             if(mysqli_num_rows($result) == 1) {
                  $_SESSION['username'] = $login;
                  $_SESSION['password'] = $password;
                  header("location: rearFacing.php");
             }
             else {
                echo "<br><br><br><br><br><br>";
                echo "<h1><center>Invalid Credentials</h1>";
                echo "<hr><center><input type='button' name='back' id='search' value='Back' onClick='history.back()'>";
             }
      }
      else {
             die("Query failed");
      }
?>
</div>
</div>
</body>
</html>