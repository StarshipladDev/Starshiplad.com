<!DOCTYPE HTML>
<html>
<header>
<?php
	include "nuHeader.php";	
	include ("Passwords.php");
?>
</header>
<body>
	<div id="main">
		<div class ="Section">
			<div class = "headerSection">
			<der>Send Status</der>
			
			</div>
			<div class="readPanel full">

				<?php

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				unset($servername);
				unset($username);
				unset($password);
				unset($dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				$name = $_GET["name"];
				$info= $_GET["info"];
				/*
				REMOVED DUE TO REMOVING CONCAT FUNCTIONS
				if(empty($name) || empty($info)){
					echo"<br>Null values entered";
				}

				if(strlen($name)<3){
					echo"<br>Name not long enough";
				}
				else if(strlen($info)<5){
					echo"<br>Information not long enough";
				}

				else{
					*/
				if(empty($info)===FALSE && ( ctype_space($info)===FALSE)){
					$attempt= "INSERT INTO ImportantInfo(Name,Info,Date) VALUES('".$_GET["name"]."','".$_GET["info"]."','" . date("Y-m-d H:i:s") . "')";
					if($conn->query($attempt) === TRUE ){
						echo "Information added successfully!<br>Name: ".$name."<br>Important Information:".$info;
					}else{
						echo"Error submitting data, probably left info blank";
						echo"Attempt was" . $attempt;
					}	
				}else{
						echo"Error submitting data, probably left info blank";
					}	

				/*
				if(strpos($info, "'") === false)
				{
					echo"<br>furthermore, there is no comma in input";// not found provides a boolean false so you NEED the ===
				}
				if(strpos($name, "'") === false)
				{
					echo"<br>furthermore, there is no comma in name";// not found provides a boolean false so you NEED the ===
				}
				*/
				$conn->close();
				?>
			</div>
		</div>
	</div>
</body>
</html>