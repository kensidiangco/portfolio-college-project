<?php
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: index.php");
		exit;
	}

	// Include config file
	require_once "config.php";

	$topic = $category = $text = "";
	$topic_err = $category_err = $text_err = "";

	if($_SERVER["REQUEST_METHOD"] === "POST"){

		// Validate all input
		if(empty(trim($_POST["topic"]))){
        	$topic_err = "Please input a topic.";
    	}
		else{
			$topic = trim($_POST["topic"]);
		}

		if(empty(trim($_POST["topic"]))){
			$category_err = "Please input topic.";
		}else{
			$category = trim($_POST["topic"]);
		}

		if(empty(trim($_POST["category"]))){
			$category_err = "Please input category.";
		}else{
			$category = trim($_POST["category"]);
		}

		if(empty(trim($_POST["text"]))){
			$text_err = "Please input text.";
		}else{
			$text = trim($_POST["text"]);
		}

		if(empty($topic_err) && empty($category_err) && empty($text_err)){
			$sql = "INSERT INTO posts (topic, category, text) VALUES (?, ?, ?)";

			if($stmt = mysqli_prepare($link2, $sql)){
				mysqli_stmt_bind_param($stmt, "sss", $param_topic, $param_category, $param_text);

				$param_topic = $topic;
				$param_category = $category;
				$param_text = $text;

				if(mysqli_stmt_execute($stmt)){
					$topic = "";
					$category = "";
					$text = "";
					header("location: diary.php");
				}else{
					echo "Oops somethin went wrong. Please try again later.";
				}

				mysqli_stmt_close($stmt);
			}
		}

		mysqli_close($link2);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/diary-entry.css">
    <title>Diary</title>
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
	<svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"><path fill="#ffdab9" fill-opacity="1" d="M0,288L34.3,266.7C68.6,245,137,203,206,181.3C274.3,160,343,160,411,181.3C480,203,549,245,617,250.7C685.7,256,754,224,823,197.3C891.4,171,960,149,1029,160C1097.1,171,1166,213,1234,234.7C1302.9,256,1371,256,1406,256L1440,256L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

	<div class="container">
		<div class="card">
			<div class="card-title">
				<h3>Share your story today.</h3>
			</div>
			<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <select name="category" <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>>
                	<option hidden value="" class="default-option">Category...</option>
                	<option value="Home">Home</option>
                	<option value="Personal">Personal</option>
                	<option value="School">School</option>
                	<option value="Peers">Peers</option>
                </select>
                <small class="invalid-feedback"><?php echo $category_err; ?></small>

				<input type="text" name="topic" placeholder="Topic" <?php echo (!empty($topic_err)) ? 'is-invalid' : ''; ?> 
					value="<?php echo $topic; ?>">
                <small class="invalid-feedback"><?php echo $topic_err; ?></small>

                <textarea name="text" rows="10" cols="30" placeholder="Your story..." 
                	<?php echo (!empty($text_err)) ? 'is-invalid' : ''; ?> value="<?php echo $text; ?>"></textarea>
                <small class="invalid-feedback"><?php echo $text_err; ?></small>



				<input type="submit" value="Post"/>
			</form>
		</div>

	</div>
	<svg xmlns="http://www.w3.org/2000/svg" class="footer" viewBox="0 0 1440 320"><path fill="#ffdab9" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>
</html>