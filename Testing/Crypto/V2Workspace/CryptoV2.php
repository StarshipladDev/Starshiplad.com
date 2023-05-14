//There 
<html>

<style>
	
</style>

<head>
	<
</head>

<body>
<?php 
	include('Passwords.php');
	$conn = new mysqli($serverName, $userName, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	unset($serverName);
	unset($userName);
	unset($password);
	$query = "SELECT * FROM "
	
?>
<div id="mainForm">
	<form method= "./SendUser.php" action = "post">
	
	</form>
</div>
<script type="text/javascript" src="cryptoJavascriptV2">

</script>

</body>

</html>