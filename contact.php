<?php
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/contact.css">
    <title>Contact</title>
</head>
<body>
    <nav class="navigation">
		<ul class="nav-ul">
			<li><a class="nav-link" href="home.php">Home</a></li>
			<li><a class="nav-link" href="about.php">About</a></li>
			<li><a class="nav-link" href="contact.php">Contact</a></li>
		</ul>
		<ul class="nav-login">
			<li><a class="nav-link" href="logout.php">Logout</a></li>
		</ul>
	</nav>
    <div class="container">
		<h2>Contact</h2>
	</div>
</body>
</html>