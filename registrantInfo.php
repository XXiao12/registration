<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="register.css">
		<title>Conference Registration - Thank You!</title>
	</head>
	<body>
		<h1>Canadian Celebration of Women in Computing event</h1>
		<h2>Database Result(s)</h2>
	<?php
		$searchLocation = $_POST["searchL"];
		$searchFN = $_POST["searchFN"];
		$searchLN = $_POST["searchLN"];
		$searchE = $_POST["searchE"];
		
		try{
			$dbh = new PDO ('mysql:host=localhost;dbname=conference', 'root', '282mysql');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($_POST["queryL"]){
				echo "<h3>Search by Transportation location</h3>";
				echo "<div class=border>";
				echo "<p>Location: ".$searchLocation."</p>";
				echo "<p>Name(s): "."<br>";
				$rows = $dbh->query("select fname, lname, transp from registrants where transp = '$searchLocation'"); /*run query and pass back results*/
				foreach ($rows as $row) {
					echo $row["fname"]." ".$row["lname"]."<br>";
				}//end foreach
				echo "</p>";
				echo "</div>";
			}//end if
			
			if ($_POST["queryAll"]){
				echo "<h3>All Registrants</h3>";
				echo "<div class=border>";
				$rows = $dbh->query("select id, fname, lname from registrants");
				echo "<p><b>Name and Emails of registrants: "."</b><br>";
				foreach ($rows as $row) {
					echo "<p>";
					echo $row["fname"]." ".$row["lname"]."<br>";
					echo "Email: ".$row["id"];
					echo "</p>";
				}//end foreach
				echo "</p>";
				echo "</div>";
			}//end if
			
			if($_POST["queryTC"]){
				echo "<h3>Total Cost</h3>";
				echo "<div class=border>";
				$rows = $dbh->query("select totalcost from registrants");
				$total = 0;
				foreach ($rows as $row) {
					$total = $total + $row["totalcost"];
				}//end foreach
				echo "<p>Total cost of registrants = $".$total."</p>";
				echo "</div>";
			}//end if
			
			if($_POST["queryS1"] || $_POST["queryS2"] || $_POST["queryS3"] || $_POST["queryS4"] || $_POST["queryS5"]){
				echo "<h3>Session Information</h3>";
			
				if($_POST["queryS1"]){
					echo "<div class=border>";
					$rows = $dbh->query("select id, title, speaker,location, maxattend from sessioninfo where id = 1");
					foreach ($rows as $row) {
						echo "<p><b>Session 1: ".$row["title"]."</b></p>";
						echo "Location: ".$row["location"]."<br>";
						echo "Speaker: ".$row["speaker"]."<br>";
						echo "Maximun Attendents: ".$row["maxattend"]."<br>";
					}//end foreach
					echo "<p><b>Attendee(s) for Session 1:</b><br>";
					$rows = $dbh->query("select cid, sid, id, fname, lname from choice, registrants where sid = 1 and cid = id");
					foreach ($rows as $row) {
						echo "<p>";
						echo $row["fname"]." ".$row["lname"]."<br>";
						echo "Email: ".$row["id"];
						echo "</p>";
					}//end foreach
					echo "</p>";
					echo "</div>";
				}//end if
			
				if($_POST["queryS2"]){
					echo "<div class=border>";
					$rows = $dbh->query("select id, title, speaker,location, maxattend from sessioninfo where id = 2");
					foreach ($rows as $row) {
						echo "<p><b>Session 2: ".$row["title"]."</b></p>";
						echo "Location: ".$row["location"]."<br>";
						echo "Speaker: ".$row["speaker"]."<br>";
						echo "Maximun Attendents: ".$row["maxattend"]."<br>";
					}//end foreach
					
					echo "<p><b>Attendee(s) for Session 2:</b><br>";
					$rows = $dbh->query("select cid, sid, id, fname, lname from choice, registrants where sid = 2 and cid = id");
					foreach ($rows as $row) {
						echo "<p>";
						echo $row["fname"]." ".$row["lname"]."<br>";
						echo "Email: ".$row["id"];
						echo "</p>";
					}//end foreach
					echo "</p>";
					echo "</div>";
				}//end if
			
				if($_POST["queryS3"]){
					echo "<div class=border>";
					$rows = $dbh->query("select id, title, speaker,location, maxattend from sessioninfo where id = 3");
					foreach ($rows as $row) {
						echo "<p><b>Session 3: ".$row["title"]."</b></p>";
						echo "Location: ".$row["location"]."<br>";
						echo "Speaker: ".$row["speaker"]."<br>";
						echo "Maximun Attendents: ".$row["maxattend"]."<br>";
					}//end foreach
					
					echo "<p><b>Attendee(s) for Session 3:</b><br>";
					$rows = $dbh->query("select cid, sid, id, fname, lname from choice, registrants where sid = 3 and cid = id");
					foreach ($rows as $row) {
						echo "<p>";
						echo $row["fname"]." ".$row["lname"]."<br>";
						echo "Email: ".$row["id"];
						echo "</p>";
					}//end foreach
					echo "</p>";
					echo "</div>";
				}//end if
			
				if($_POST["queryS4"]){
					echo "<div class=border>";
					$rows = $dbh->query("select id, title, speaker,location, maxattend from sessioninfo where id = 4");
					foreach ($rows as $row) {
						echo "<p><b>Session 4: ".$row["title"]."</b></p>";
						echo "Location: ".$row["location"]."<br>";
						echo "Speaker: ".$row["speaker"]."<br>";
						echo "Maximun Attendents: ".$row["maxattend"]."<br>";
					}//end foreach
					
					echo "<p><b>Attendee(s) for Session 4:</b><br>";
					$rows = $dbh->query("select cid, sid, id, fname, lname from choice, registrants where sid = 4 and cid = id");
					foreach ($rows as $row) {
						echo "<p>";
						echo $row["fname"]." ".$row["lname"]."<br>";
						echo "Email: ".$row["id"];
						echo "</p>";
					}//end foreach
					echo "</p>";
					echo "</div>";
				}//end if
			
				if($_POST["queryS5"]){
					echo "<div class=border>";
					$rows = $dbh->query("select id, title, speaker,location, maxattend from sessioninfo where id = 5");
					foreach ($rows as $row) {
						echo "<p><b>Session 5: ".$row["title"]."</b></p>";
						echo "Location: ".$row["location"]."<br>";
						echo "Speaker: ".$row["speaker"]."<br>";
						echo "Maximun Attendents: ".$row["maxattend"]."<br>";
					}//end foreach
					
					echo "<p><b>Attendee(s) for Session 5:</b><br>";
					$rows = $dbh->query("select cid, sid, id, fname, lname from choice, registrants where sid = 5 and cid = id");
					foreach ($rows as $row) {
						echo "<p>";
						echo $row["fname"]." ".$row["lname"]."<br>";
						echo "Email: ".$row["id"];
						echo "</p>";
					}//end foreach
					echo "</p>";
					echo "</div>";
				}//end if
			}//end if
					
		}catch (PDOException $e){
			echo $e->getMessage();
			die();
		}//end try
		$dbh = null;
	?>
</body>
</html>