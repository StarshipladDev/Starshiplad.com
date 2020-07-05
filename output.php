<!DOCTYPE HTML>
<html>
<head>
<?php
	include "nuHeader.php";
?>
</head>
<body>
	<div id="main">
			<div class ="Section">
				<div class = "headerSection">
					<der>Data Output</der>
				</div>
				<div class="readPanel full">
					<table class="displayTable">
						<tr>
						<th>ID</th>
						<th>Name</th> 
						<th>Info</th>
						</tr>
						<?php
						//Basic parameters

						$servername = "";
						$username = "";
						$password = "";
						$dbname = "";
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						//Kill attempt and dispaly error if database invalid
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						//SQL to get ALL entries in 'ImportantInfo
						$attempt = "SELECT ID,Name,Info FROM ImportantInfo";
						//Store result in $result
						$result= $conn->query($attempt);
						//Loop to create a table entry for each 'ID" (must be unique) in 'ImportantInfo'.
						//Set $row as latest result then get each entry at that value
						//Sourced from code foudn at https://www.w3schools.com/php/php_mysql_select.asp
						while($row = $result->fetch_assoc()){
							echo"<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"]. "</td> <td><input class=\"password\" type=\"password\" value=\"". $row["Info"]. "\"readonly> </td></tr>";
							
						}
						$conn->close();
						?>
					</table>
				</div>
			</div>
	</div>
</body>

</html>