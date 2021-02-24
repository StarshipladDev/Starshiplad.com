<!DOCTYPE HTML>
<html>
</head>
<?php
	include "AirAToBHeader.php"
?>
<div class= "ReadArea">
		Pilot Information:
		<br>
			<table style="width:100%;border-color:#000000;border-style: solid;border-width: 1px;"}>
			<?php
				//Basic parameters
				$servername = "localhost";
				$username = "u963414567_sld";
				$password = "g1thub";
				$dbname = "u963414567_db1";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				//Kill attempt and dispaly error if database invalid
				if ($conn->connect_error) {
					echo("Broke");
					die("Connection failed: " . $conn->connect_error);
				}
				//SQL to get ALL entries in 'ImportantInfo
				echo($_GET['pilot']);
				//$attempt = "SELECT UserName,FlightId FROM PilotTable,Flights WHERE PilotTable.PilID = ". $_GET['pilot'] ." OR Flights.PilID = ". $_GET['pilot'];
				$attempt = "SELECT UserName FROM PilotTable WHERE PilID = ". $_GET['pilot'];
				echo($attempt);
				//Store result in $result
				$result= $conn->query($attempt);
				if(mysqli_num_rows($result)==0){
					echo("<tr><td>No Pilots with this ID</td></tr>");
				}else{
					//Loop through returned data, dispalying all details for that flight
					$Counter=0;
					while($row = $result->fetch_assoc()){
						echo("<tr><td>Pilot UserName</td><td>" . $row["UserName"]. $row["FlightID"]. "</td></tr>");
						//<tr><td>Active Flight</td><td> <a href=\"http://www.starshiplad.com/Flight.php?flight=" . $row["FlightID"] ."\"> Flight " . $row["FlightID"] ."</a></td></tr>
					}
				}
				/*
				*/
				$attempt = "SELECT FlightID FROM Flights WHERE PilID = ". $_GET['pilot'];
				echo($attempt);
				//Store result in $result
				$result= $conn->query($attempt);
				if(mysqli_num_rows($result)==0){
					echo("<tr><td>No Flights with this pilot</td></tr>");
				}else{
					//Loop through returned data, dispalying all details for that flight
					$Counter=0;
					while($row = $result->fetch_assoc()){
						echo("<tr><td>Active Flight</td><td> <a href=\"http://www.starshiplad.com/Flight.php?flight=" . $row["FlightID"] ."\"> Flight " . $row["FlightID"] ."</a></td></tr>");
					}
				}
				$conn->close();
			?>
			</table>
</div>
</body>
</html>