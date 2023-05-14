<!DOCTYPE HTML>
<html>
<head>
<?php
	include "nuHeader.php";
	include ("Passwords.php");
?>
</head>
<body>
<div id="main">
	<!--  Php SQ Lconnection code taken from https://www.w3schools.com/php/php_mysql_connect.asp -->
	<!-- Echo inside a .css format will display text in that style -->
	<div class="readPanel full">
		<?php
		unset($servername);
		unset($username);
		unset($password);
		unset($dbname);
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		$conn->close();
		?>
		<form action="sendDataToSecureDbCommand.php" method="get">

		Name: <input type="text" name="name"><br>
		Important information: <input type="text" name="info"><br>

		<input type="submit">
		</form>
		Use the below button to create a table(It will just run a create table command, you won't see anything :P)
		<form action="createtable.php" method="get">
		<input type="submit" butto>
		</form>
	</div>
</div>
</body>

</html>