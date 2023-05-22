<html>

<style>
	
</style>

<head>

<body>
Welcome to the new and improved starcoin page! <br>
<button onclick="testAlert()"> Test JS</button>
<script  type="text/javascript"  src="V2Workspace/cryptoJavascriptV2.js" > </script>
<?php 
	include('V2Workspace/Passwords.php');
	echo "Below will be a list of all available user hashes";
	$conn = new mysqli($serverName, $userName, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
		echo "Error connecting to mock network database" . $conn -> connect_error;
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	unset($serverName);
	unset($userName);
	unset($password);
	$query = "SELECT * FROM User_Hashes";
	if($result = $conn -> query($query) ){
		echo "<table>";
		while($row = mysqli_fetch_row($result)) {
			echo "<tr>";
			foreach($row as $_column) {
				echo "<td>{$_column}</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	$conn -> close();
	
?>
<div id="mainForm">
	<form method= "V2Workspace/SendUser.php" action = "post">
	
	</form>
</div>

</body>

</html>