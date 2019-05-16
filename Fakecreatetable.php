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
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$attempt="CREATE TABLE ImportantInfo2 (
    ID int NOT NULL AUTO_INCREMENT,
    Name varchar(255) NOT NULL,
    Info varchar(1000),
    PRIMARY KEY (ID)
)";
if($conn->query($attempt)=== TRUE){
	echo "Table created successfully";
}else{
	echo"Hahah it's broken";
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