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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
		                echo "<small style='font-weight: bold; font-style: italic; color: #242E3C;'>" . $row['category'] . '<a style="float: right; color: red;" href="delete.php?id='. $row['id'] . ' title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash" style="color: red; font-size: 14px;"></span></a>' . "</small>";
		                echo "<div style=' color: #242E3C; font-size: 18px;'>" . $row['topic'] . "</div>";
		                echo "<div style=' color: #242E3C; font-size: 16px;'>" . $row['text'] . "</div>";
		                echo "<span style='font-weight: normal; font-size: 10px; float: right; padding: 1em;	'>" . $row['created_at'] . "</span>";
	 	        echo "</div>";
	        }
	        echo "</div>";

	        echo "</table>";
	        // Free result set
	        mysqli_free_result($result);
		    } 
		    else{
		        echo "<p style='text-align: center;'>No posts yet.</p>";
		    }
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link2);
		}
	 
		// Close connection
		mysqli_close($link2);
	?>
</body>
</html>