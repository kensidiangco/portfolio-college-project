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
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
	<nav class="navigation">
		<ul class="nav-ul">
			<li><a class="nav-link" href="home.php">Home</a></li>
			<li><a class="nav-link" href="diary.php">Diary</a></li>
		</ul>
		<ul class="nav-login">
			<li><a class="nav-link" href="diary-entry.php">Post diary</a></li>
			<li><a class="nav-link" href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<div class="waves">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFDAB9" fill-opacity="1" d="M0,0L48,32C96,64,192,128,288,138.7C384,149,480,107,576,85.3C672,64,768,64,864,90.7C960,117,1056,171,1152,165.3C1248,160,1344,96,1392,64L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
		<h1>Hi i'm Annalyn Balaqui</h1>
		<p>I am ambitious and driven. I thrive on challenge and constantly set goals for myself, so I have something to strive toward. I'm not comfortable with settling, and I'm always looking for an opportunity to do better and achieve greatness.</p>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFDAB9" fill-opacity="1" d="M0,128L24,117.3C48,107,96,85,144,117.3C192,149,240,235,288,240C336,245,384,171,432,144C480,117,528,139,576,144C624,149,672,139,720,117.3C768,96,816,64,864,69.3C912,75,960,117,1008,122.7C1056,128,1104,96,1152,106.7C1200,117,1248,171,1296,213.3C1344,256,1392,288,1416,304L1440,320L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>

	</div>

	<div class="container-gallery">
		<h2>My gallery</h2>
		<div class="card-container">
			<div class="card">
				<div class="card-body">
					<img src="./images/p1.jpg">
				</div>
				<div class="card-description">
					<p>My first selfie.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<img src="./images/p2.jpg">
				</div>
				<div class="card-description">
					<p>My selfie.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<img src="./images/p3.jpg">
				</div>
				<div class="card-description">
					<p>My selfie.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<img src="./images/bday.jpg">
				</div>
				<div class="card-description">
					<p>My birthday photo.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<img src="./images/p4.jpg">
				</div>
				<div class="card-description">
					<p>My selfie.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<img src="./images/p5.jpg">
				</div>
				<div class="card-description">
					<p>Groupie with friends.</p>
			</div>

		</div>
			<audio src="/audio/BacktoDecemberTaylorSwift.mp3" autoplay hidden controls></audio>

	</div>

	<svg class="footer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"><path fill="#FFDAB9" fill-opacity="1" d="M0,0L24,0C48,0,96,0,144,16C192,32,240,64,288,112C336,160,384,224,432,234.7C480,245,528,203,576,165.3C624,128,672,96,720,69.3C768,43,816,21,864,32C912,43,960,85,1008,101.3C1056,117,1104,107,1152,101.3C1200,96,1248,96,1296,90.7C1344,85,1392,75,1416,69.3L1440,64L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>
</body>
</html>