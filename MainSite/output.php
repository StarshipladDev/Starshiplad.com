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
	<div class ="Section">
				<div class = "headerSection">
				<der>Hall Of Fame </der>
				
				</div>
				<div class="readPanel full">
					<der>The XSS Hall Of Fame </der><br>
					The <a href="http://www.starshiplad.com/proof.php">C# Hacktool</a> I create required a unprotected page to test XSS attacks.
					The page <a href="http://www.starshiplad.com/input.php">input</a> uses PHP to store data in a format that can be read on the 
					page <a href="http://www.starshiplad.com/input.php">output</a>. Occasionaly people put some very entertaining/intereting XSS 
					attacks in, and before I clean the output page, I will log my favourite examples <a href="http://www.starshiplad.com/halloffame.php">here</a>.
					
				</div>
			</div>	
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

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						
						unset($servername);
						unset($username);
						unset($password);
						unset($dbname);
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