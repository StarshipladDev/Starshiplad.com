<!DOCTYPE html>
<html>
  <head>
    <?php 
    include "AirAToBHeader.php";
   ?>
	<div class= "ReadArea">
		<div id="InputText">
			Below is all the flight information for flight 
			<?php 
				$hi=$_GET['flight'];
				echo($hi)
			?>
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
				$attempt = "SELECT FlightID,Name,Cost,PilID FROM Flights,FlightLocations WHERE FlightID = " . $_GET['flight'] . " AND (LocationID=Flights.DestID OR LocationID=Flights.TakeOffID )";
				//Store result in $result
				$result= $conn->query($attempt);
				if(mysqli_num_rows($result)==0){
					echo("<tr><td>No Flights are going from this location</td> <td></td></tr>");
					
				}else{
					//Loop through returned data, dispalying all details for that flight
					$Counter=0;
					while($row = $result->fetch_assoc()){
						if($Counter>0 && $Counter%2==1){
							echo("<tr><td>Take Off</td><td>" . $row["Name"]. "</td></tr><tr><td>Cost</td><td>" . $row["Cost"]. "</td> </tr>");
						}else{
							echo("<tr><td>Flight Id</td><td>" . $row["FlightID"]. "</td></tr><tr><td>Pilot</td><td><a href=\"http://www.starshiplad.com/AirAToBPilot.php?pilot=" . $row["PilID"]. "\"> Pilot " . $row["PilID"]. "</a></td></tr><tr><td>Destination</td><td>" . $row["Name"]. "</td> </tr>");
						}
						$Counter=$Counter+1;
						
						
					}
				}
				$conn->close();
			?>
			<tr>
			<td> End Of</td>
			<td> Table</td>
			</tr>
			</table>
		</div>
	</div>
	<script>
	/*
	var number=window.location.search
	*/
	</script>
  </body>
</html>