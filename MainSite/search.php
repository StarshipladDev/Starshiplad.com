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
					<der>Search Function</der>
				</div>
				<div class="readPanel full">
					Enter a value to search for names in 'Information':
					<form action="search.php" method="get">
						Name: <input type="text" name="testsearch">
						<input type="submit" text="Seach for Name">
					</form>
					<table class="displayTable">
						<tr>
						<th>ID</th>
						<th>Name</th> 
						<th>Info</th>
						</tr>
					<?php
					$servername = "localhost";
					$username = "u963414567_sld";
					$password = "g1thub";
					$dbname = "u963414567_db1";


					$conn= new mysqli($servername,$username,$password,$dbname);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$name = $_GET["testsearch"];

					if(empty($name)==FALSE){
					$retreive = "SELECT ID,Name,Info FROM ImportantInfo  WHERE '$name' IN (Name)";
					$result= $conn->query($retreive);
						while($row = $result->fetch_assoc()){
							echo"<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"]. "</td> <td><input class=\"password\" type=\"password\" value=\"". $row["Info"]. "\"readonly> </td></tr>";
							
						}
						
					}
					$conn->close();
					?>

					</table>
				</div>
			</div>
		</div>
	</body>

</html>