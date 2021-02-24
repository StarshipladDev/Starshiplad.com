
<!DOCTYPE html>
<html>
  <head>
    <?php 
    include "AirAToBHeader.php";
   ?>
   <div id="databaseFlights" >
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
				$attempt="SELECT * from Flights";
				$result= $conn->query($attempt);
				while($row = $result->fetch_assoc()){
						$attempt="SELECT Lat,Lon from FlightLocations WHERE LocationID = " . $row['DestID'];
						$dest1=$conn->query($attempt);
						$dest=$dest1->fetch_assoc();
						$destination=($dest['Lat'] . "," . $dest['Lon']);
						$attempt="SELECT Lat,Lon from FlightLocations WHERE LocationID = " . $row['TakeOffID'];
						$take1=$conn->query($attempt);
						$take=$take1->fetch_assoc();
						$takeOff=($take['Lat'] . "," . $take['Lon']);
						echo($row['FlightID'] . "," . $takeOff . "," . $destination . "," );
				}
				$conn->close();
				
		?>
	</div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Flight Locations">
	<button type="button" class="MapButton" id="Dest">Destination Only</button>
	<button type="button" class="MapButton" id="Take">Take Off Only</button>
	<button type="button" class="MapButton" id="Both">Both</button>
    <div id="map"></div>
	<div id="twat"></div>
    <script>
	document.getElementById("Dest").onclick=function(){Types(1)};
	document.getElementById("Take").onclick=function(){Types(2)};
	document.getElementById("Both").onclick=function(){Types(0)};
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
	var indi=0;
	var Markers=[];
	var sqlMarkers=[];
	var map;
	function initMap() {
		
		map = new google.maps.Map(document.getElementById('map'), {center: {lat: -41.285, lng: 174.776},zoom: 4});
		// Create the search box and link it to the UI element.
		var input = document.getElementById('pac-input');
		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
		map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('Dest'));
		map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('Both'));
		map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('Take'));

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
		searchBox.setBounds(map.getBounds());
		});
		// Listen for the event fired when the user selects a prediction and retrieve
		// more details for that place.
		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
			return;
			}

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				if (!place.geometry) {
				  console.log("Returned place contains no geometry");
				  return;
				}
				if (place.geometry.viewport) {
				  // Only geocodes have viewport.
				  bounds.union(place.geometry.viewport);
				} else {
				  bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
        });
		
		/*
		*Get SQL Markers
		*/
		var i=0;
		var number=0
		let sqlFlights=document.getElementById("databaseFlights").innerHTML.split(",");
		var loop=1;
		
		while(i<sqlFlights.length){
			//Id,takeoff,dest
			var id,destlat,destlong,takelat,takelong;
			if(loop==1){
				id=sqlFlights[i];
			}
			else if(loop==2){
				takelat=sqlFlights[i];
				
			}
			else if(loop==3){
				takelong=sqlFlights[i];
				
			}
			else if(loop==4){
				destlat=sqlFlights[i];
				
			}
			else{
				destlong=sqlFlights[i];
				var uralMountain=("http://www.starshiplad.com/Flight.php?flight="+id);
				sqlMarkers[number]= new google.maps.Marker({ position:new google.maps.LatLng(takelat,takelong),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url : uralMountain});
				google.maps.event.addListener(sqlMarkers[number], 'click',
					function() {
						window.location.href = this.url;
					}
				);
				uralMountain=("http://www.starshiplad.com/Flight.php?flight="+id);
				sqlMarkers[number+1]=new google.maps.Marker({ position:new google.maps.LatLng(destlat,destlong),icon: "http://www.starshiplad.com/PlaneDesc.png",title: 'Here is an Aeroplane',map: map,url : uralMountain});
				google.maps.event.addListener(sqlMarkers[number+1], 'click',
					function() {
						window.location.href = this.url;
					}
				);
				number++;
				loop=0;
			}
			loop++;
			i++;
		}
		/*
		*End get SQL markers
		*/	
		/*
		*ADD MARKERS TO MAP
		*/
		for(i=0;i<Markers.length;i++){
			Markers[i].setMap(map);
		}
		i=0;
		for(i=0;i<sqlMarkers.length;i++){
			sqlMarkers[i].setMap(map);
		}
      }
	  
	  
	/* 
	
	
	
	FILTER FLIGHTS
	
	
	*/
	function Types(indicator) {
		indi=indicator;
		document.getElementById("twat").innerHTML=("Hey gang" + indi);
		/*
		*Get SQL Markers
		*/
		var i=0;
		i=0;
		for(i=0;i<sqlMarkers.length;i++){
			document.getElementById("twat").innerHTML+=("<br> Setting "+ i + " as null");
			sqlMarkers[i].setMap(null);
		}
		i=0;
		sqlMarkers=[];
		var number=0
		let sqlFlights=document.getElementById("databaseFlights").innerHTML.split(",");
		var loop=1;
		while(i<sqlFlights.length){
			document.getElementById("twat").innerHTML+=("<br> doing "+ i + " now");
			//Id,takeoff,dest
			var id,destlat,destlong,takelat,takelong;
			if(loop==1){
				id=sqlFlights[i];
			}
			else if(loop==2){
				takelat=sqlFlights[i];
				
			}
			else if(loop==3){
				takelong=sqlFlights[i];
				
			}
			else if(loop==4){
				destlat=sqlFlights[i];
				
			}
			else{
				var uralMountain;
				destlong=sqlFlights[i];
				if(indi==0 || indi==2){
					document.getElementById("twat").innerHTML+=("<br> Doing takeoff");
					uralMountain=("http://www.starshiplad.com/Flight.php?flight="+id);
					sqlMarkers[number]= new google.maps.Marker({ position:new google.maps.LatLng(takelat,takelong),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url : uralMountain});
					google.maps.event.addListener(sqlMarkers[number], 'click',
						function() {
							window.location.href = this.url;
						}
					);
					if(indi==0){
						number+=1;
					}
					
				}
				
				if(indi == 0 || indi == 1){
					document.getElementById("twat").innerHTML+=("<br> Doing destination");
					uralMountain=("http://www.starshiplad.com/Flight.php?flight="+id);
					sqlMarkers[number]=new google.maps.Marker({ position:new google.maps.LatLng(destlat,destlong),icon: "http://www.starshiplad.com/PlaneDesc.png",title: 'Here is an Aeroplane',map: map,url : uralMountain});
					google.maps.event.addListener(sqlMarkers[number], 'click',
						function() {
							window.location.href = this.url;
						}
					);
				}
				
				number++;
				loop=0;
			}
			loop++;
			i++;
		}
		/*
		*End get SQL markers
		*/	
		/*
		*ADD MARKERS TO MAP
		*/
		i=0;
		for(i=0;i<sqlMarkers.length;i++){
			sqlMarkers[i].setMap(map);
		}
	}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAajYfAvnI1N_8CkYZl99j-7iAXcxNSkhY&libraries=places&callback=initMap" async defer></script>
  </body>
</html>
</html>
