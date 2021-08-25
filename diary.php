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
	<link rel="stylesheet" type="text/css" href="./css/diary.css">
    <title>Diary</title>
</head>
<body>
	<svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"><path fill="#ffdab9" fill-opacity="1" d="M0,288L34.3,266.7C68.6,245,137,203,206,181.3C274.3,160,343,160,411,181.3C480,203,549,245,617,250.7C685.7,256,754,224,823,197.3C891.4,171,960,149,1029,160C1097.1,171,1166,213,1234,234.7C1302.9,256,1371,256,1406,256L1440,256L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

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
    <div class="container">
		<h2>My Diary</h2>
	</div>
	<?php 
		// Include config file
		require_once "config.php";

		if($link2 === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM posts ORDER BY -id";

		if($result = mysqli_query($link2, $sql)){
			if(mysqli_num_rows($result) > 0){
	        echo "<div style='display: grid; grid-template-columns: auto auto auto; justify-content: center; padding: 3rem; grid-gap: 3em; margin-left: auto; margin-right: auto;'>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<div style='padding: 1em; display: grid; grid-gap: .6em; background-color: #FFFEFC; border-radius: .4rem; width: 15rem; color: #242E3C; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>";
		                echo "<small style='font-weight: bold; font-style: italic; color: #242E3C;'>" . $row['category'] . "<span style='font-weight: normal; font-size: 10px; float: right; padding: 1em;	'>" . $row['created_at'] . "</span>" . "</small>";
		                echo "<div style=' color: #242E3C;'>" . $row['topic'] . "</div>";
		                echo "<div style=' color: #242E3C;'>" . $row['text'] . "</div>";
	 	        echo "</div>";
	        }
	        echo "</div>";

	        echo "</table>";
	        // Free result set
	        mysqli_free_result($result);
		    } 
		    else{
		        echo "No records matching your query were found.";
		    }
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	 
		// Close connection
		mysqli_close($link);
	?>
	<svg xmlns="http://www.w3.org/2000/svg" class="footer" viewBox="0 0 1440 320"><path fill="#ffdab9" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

</body>
</html>