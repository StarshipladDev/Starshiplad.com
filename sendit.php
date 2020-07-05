<!DOCTYPE HTML>
<html>
<header>
<?php
	include "nuHeader.php";
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
				$servername = "";
						$username = "";
						$password = "";
						$dbname = "";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
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
					$attempt= "INSERT INTO ImportantInfo(Name,Info) VALUES('".$_GET["name"]."','".$_GET["info"]."')";
					if($conn->query($attempt) === TRUE ){
						echo "Information added successfully!<br>Name: ".$name."<br>Important Information:".$info;
					}else{
						echo"Error submitting data, probably left info blank";
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