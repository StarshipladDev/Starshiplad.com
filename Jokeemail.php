<html>
<header>
</header>
<div class="readPanel">
<link rel="stylesheet" href="Joke.css">
<link rel="icon" type="image/png" href="http://www.starshiplad.com/favicon.png"/>
<meta name="content" content="100% Quality Maps">
<Title> "Request sent. Total cost: $10,000"</Title>
<?php
$servername = "localhost";
$username = "u963414567_sld";
$password = "g1thub";
$dbname = "u963414567_db1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Message = $_POST["Message"];
$Name= $_POST["Name"];

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
if(strlen($Name)<1 || strlen($Message)<1){
	
	echo "Message Needs a valid name and data sorry :( ";
}else{
	mail("Admin@Starshiplad.com",$Name . " Sent A message from Joke.php",$Message);
	echo "Message sent successfully!<br>Name: " . $_POST["Name"] . "<br>Important Information:" . $_POST["Message"];
}
$conn->close();
?>
</div>
</body>
</html>