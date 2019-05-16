<!--submit.php-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="register.css">
		<title>Conference Registration - Thank You!</title>
	</head>
	<body>
		<h1>Canadian Celebration of Women in Computing event</h1>
	<?php
		$first_name = $_POST["fname"];
		$last_name = $_POST["lname"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$who = $_POST["typeSP"];
		$studentType = $_POST["student"];
		$session = $_POST["session"];
		$transportation = $_POST["transportation"];
		$accomodation = $_POST["request"];
		$cost = 0;
		
		//upload and store photo
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  	$upload_dir = "images/";
		   	if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
		      	if (!is_dir($upload_dir)){
		      		mkdir($upload_dir);
		      	}
		      	$name = 'photo'.$first_name.'.jpg';
		      	$path = $upload_dir.$name;
		      	move_uploaded_file($_FILES['photo']['tmp_name'], $path);
		      	echo "<img src='$path' alt='uploaded photo' >";
		   		}
		   	else {
		     	echo "<h4>Error uploading the image: no photo was uploaded or photo file was to big.</h4>";
		   	}
		}
		
		//calculating total cost
		if ($_POST["transportation"]){
  			$cost = $cost + 20;
		}
		else{
			$transportation = "N/A";
		}

		if ($_POST["request"] == "yes"){
  			$cost = $cost + 80;
		}
		
		if ($_POST["typeSP"] == "Student") {
  			$cost = $cost + 60;
		}
		elseif ($_POST["typeSP"] == "Professional") {
  			$cost = $cost + 100;
		}
		echo "<h2>Your Summary</h2>";
		echo "<p><b>Name:</b> $first_name $last_name<br>
			<b>Address:</b> $address<br>
			<b>Email:</b> $email<br>
			<b>Student or Professional:</b> $who<br>
			<b>Type of Student:</b> $studentType<br>
			<b>Transportation:</b> $transportation<br>
			<b>Accomodation:</b> $accomodation<br>
		</p>";

		echo "<p>Your <b>total cost</b> will be $$cost</p>";
		
		try{
			$dbh = new PDO ('mysql:host=localhost;dbname=conference', 'root', '282mysql');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "insert registrants values ('$email', '$first_name', '$last_name', '$address', '$who', '$transportation', '$accomodation', '$cost')";
			
			$dbh->exec($sql);
			
			if ($_POST["typeSP"] == "Student"){
				$sql = "INSERT INTO studenttype (tid, type) VALUES ('$email', '$studentType')";
				$dbh->exec($sql);
			}
			
			//check checkbox sessions
			if (isset($_POST["session1"])){
				$sql = "INSERT INTO choice (cid, sid) VALUES ('$email', 1)";
				$dbh->exec($sql);
			}
			if (isset($_POST["session2"])){
				$sql = "INSERT INTO choice (cid, sid) VALUES ('$email', 2)";
				$dbh->exec($sql);
			}
			if (isset($_POST["session3"])){
				$sql = "INSERT INTO choice (cid, sid) VALUES ('$email', 3)";
				$dbh->exec($sql);
			}
			if (isset($_POST["session4"])){
				$sql = "INSERT INTO choice (cid, sid) VALUES ('$email', 4)";
				$dbh->exec($sql);
			}
			if (isset($_POST["session5"])){
				$sql = "INSERT INTO choice (cid, sid) VALUES ('$email', 5)";
				$dbh->exec($sql);
			}
			
					
		}catch (PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}//end try
		$dbh = null;
	?>
		<h3>Thank you for signing up!</h3>
		<p><button><a href="registrantInfo.html">Conference Database</a></button></p>
	</body>
</html>
