<!DOCTYPE = HTML>
<html>
<head>
<?php
	include "header.php";
?>
</head>
<body>
<!--  Php SQ Lconnection code taken from https://www.w3schools.com/php/php_mysql_connect.asp -->
<!-- Echo inside a .css format will display text in that style -->
<div class="readPanel">
<?php
$servername = "Fake";
$username = "Fake";
$password = "Fake";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$conn->close();
?>
<form action="sendit.php" method="get">

Name: <input type="text" name="name"><br>
Important information: <input type="text" name="info"><br>

<input type="submit">
</form>
Use the below button to create a table
<form action="createtable.php" method="get">
<input type="submit" butto>
</form>
</div>

</body>


<footer>
<?php
include "footer.php";
?>
</footer>
</html>