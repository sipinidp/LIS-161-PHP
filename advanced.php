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
					<a href="index.php" class="nav">HOME</a> &emsp; | &emsp;
					<a id="current">ADVANCED SEARCH</a> &emsp; | &emsp;
					<a href="help.html" class="nav">HELP</a> &emsp; | &emsp;
					<a href="login.php" class="nav">ADMIN LOGIN</a> &emsp; &emsp;
				</nav>
			</div>
			<br><br><br><br><br><br><br><center>
			<div>
				<form name="search" method="post" action="advancedSearch.php">
					<table width="80%">
						<tr>
							<th style="border: 0; border-bottom: 1px solid black;"> Search Field </th>
							<th style="border: 0; border-bottom: 1px solid black;"> Search Expression </th>
							<th style="border: 0; border-bottom: 1px solid black;"> Operator </th>
						</tr>
						<tr>
							<th style="border:0;">
								<select name="firstField">
									<option value="author">Author</option>
									<option value="aNumber">Accession No</option>
									<option value="cNumber">Call No</option>
									<option value="sNumber">ISBN/ISSN</option>
									<option value="publisher">Publisher</option>
									<option value="subject">Subject</option>
									<option value="title" selected="selected">Title</option>
								</select>
							</th>
							<td style="border:0;">
								<input type="text" name="firstQuery" style="width:100%">
							</td>
							<th style="border:0;">
								<select name="firstOperator">
									<option value="and">AND</option>
									<option value="or">OR</option>
								</select>
							</th>
						</tr>
						<tr>
							<th style="border:0;">
								<select name="secondField">
									<option value="author" selected="selected">Author</option>
									<option value="aNumber">Accession No</option>
									<option value="cNumber">Call No</option>
									<option value="sNumber">ISBN/ISSN</option>
									<option value="publisher">Publisher</option>
									<option value="subject">Subject</option>
									<option value="title">Title</option>
								</select>
							</th>
							<td style="border:0;">
								<input type="text" name="secondQuery" style="width:100%">
							</td>
							<th style="border:0;">
								<select name="secondOperator">
									<option value="and">AND</option>
									<option value="or">OR</option>
								</select>
							</th>
						</tr>
						<tr>
							<th style="border:0;">
								<select name="thirdField">
									<option value="author">Author</option>
									<option value="aNumber">Accession No</option>
									<option value="cNumber">Call No</option>
									<option value="sNumber">ISBN/ISSN</option>
									<option value="publisher">Publisher</option>
									<option value="subject" selected="selected">Subject</option>
									<option value="title">Title</option>
								</select>
							</th>
							<td style="border:0;">
								<input type="text" name="thirdQuery" style="width:100%" >
							</td>
							<td style="border:0;">
							</td>
						</tr>
						<tr>
							<th colspan="3" style="border: 0; border-top: 1px solid black;">
								<input type="submit" name="submit">
								<input type="reset" name="reset">
							</th>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>