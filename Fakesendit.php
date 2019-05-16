<html>
<header>
<?php
	include "header.php";
?>
</header>
<body>
<div class="readPanel">

<?php
$servername = "Fake";
$username = "Fake";
$password = "Fake";
$dbname = "Fake";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";
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
echo $attempt. "<br>";
if($conn->query($attempt) === TRUE){
	echo "Information added successfully!<br>Name: " . $_GET["name"] . "<br>Important Information:" . $_GET["info"];
}else{
	echo"Error submitting data";
}	
if(strpos($info, "'") === false)
{
    echo"<br>furthermore, there is no comma in input";// not found provides a boolean false so you NEED the ===
}
if(strpos($name, "'") === false)
{
    echo"<br>furthermore, there is no comma in name";// not found provides a boolean false so you NEED the ===
}
$conn->close();
?>
</div>
</body>
<footer>
<?php
include "footer.php:";
?>
</footer>
</html>