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
	$query = "INSERT INTO User_Hashes(User_Hash,DataAdded) VALUES (" . $POST["hash"] . ",GetDate())"l;
	echo($query);
	echo("POST('hash') is " . $POST["hash"]);
	if ($result = mysqli_query($con, $query)) {
	  echo "Returned rows are: " . mysqli_num_rows($result);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "id: " . $row["Id"]. " - Hash: " . $row["User_Hash"]. " Date Added " . $row["Date_Added"]. "<br>";
			}
		} 
	  // Free result set
	  mysqli_free_result($result);
	}
	else{
          echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>