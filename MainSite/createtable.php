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
			<div class="Section">
				<div class="readPanel full">
					<?php

					// Create connection
					$conn = new mysqli($servername, $username, $password,$dbname);
					unset($servername);
					unset($username);
					unset($password);
					unset($dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					$attempt="CREATE TABLE AImportantInfo2 (
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
			</div>
		</div>
	</body>
</html>