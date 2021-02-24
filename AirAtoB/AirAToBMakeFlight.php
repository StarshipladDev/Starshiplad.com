<!DOCTYPE HTML>
<html>
<head>
<?php
	include "AirAToBHeader.php"
?>
<div class= "ReadArea">
		<br>
			
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
				//Insert the posted data into the flights database
				$attempt = "INSERT INTO FlightLocations(Lat,Lon,Name) VALUES (". $_POST['lata'] . "," . $_POST['lnga'] . ",'" . $_POST['takeOff'] . "')";
				$result= $conn->query($attempt);
				$attempt = "INSERT INTO FlightLocations(Lat,Lon,Name) VALUES (". $_POST['latb'] . "," . $_POST['lngb'] . ",'" . $_POST['Dest'] . "')";
				$result= $conn->query($attempt);
				$attempt="SELECT * from FlightLocations ORDER BY LocationID DESC LIMIT 2";
				$result= $conn->query($attempt);
				$dest=0;
				$take=0;
				$Counter=0;
				while($row = $result->fetch_assoc()){
						if($Counter==0){
							$dest=$row["LocationID"];
						}else{
							$take=$row["LocationID"];
						}
						$Counter=$Counter+1;
				}
				$attempt = "INSERT INTO Flights(DestID,TakeOffID,PilID,Cost) VALUES (" . $dest . "," . $take . "," . $_POST['PilotId'] . "," . $_POST['cost'] . ")";
				echo($attempt);
				//Store result in $result
				$result= $conn->query($attempt);
				echo("Flight Inserted Successfully!");
				$conn->close();
			?>
</div>
</body>
</html>