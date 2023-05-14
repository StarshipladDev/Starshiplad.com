<!DOCTYPE html>
<html>
  <head>
   <?php 
    include "AirAToBHeader.php";
	include ("Passwords.php");
   ?>
   <!--style="visibility: hidden;" -->
	<div id="databaseFlights" class="ReadArea" >
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
	<div class= "ReadArea">
		<div id="InputText">
			Input CSV values of flight locations:
			<br>
			<form action="http://www.starshiplad.com/AirAToB.php" method="get">
				<input type="text" name="values">
				<input type="submit" text="Submit Values" name="submit">
			</form>
		</div>
	</div>
	
	<div class= "ReadArea">	
		MVP (map driven like Uber/Airbnb)... 
		<br>
		<br>
		<b>Client user: as a human I want to...</b><br>
		- say where I’m leaving from<br>
		- say where I’m going to (option for via) <br>
		- say what day/date <br>
		- say how many ppl coming <br>
		- say how long I need to stay <br>
		- press view trip<br>
		- see summary and price <br>
		- review/view/edit trip <br>
<br><br>
		<b>Result:</b><br>
		- see how many planes avail <br>
		- see how many pilots avail <br>
		- click submit (?) <br>
		- see that my trip is being worked on (live, which pilots is working on it?) <br>
<br><br>
		<b>User 2: As a pilot I want to... </b><br>
		- show I’m available or not (by day maybe)<br>
		- get pinged when a client requests needing a flight <br>
		- confirm if I can make the trip <br>
<br><br>
		<b>For this we need per destination:</b> <br>
		- list of planes<br>
		- list pilots <br>
		- live availability of both (?) <br>
		- costs loaded per plane / pilot <br>

		<b>MVP notes</b><br>
		- perhaps we can middle man broker or have trusted aero club people do this (for us to learn) <br>
		- post mvp pilots can add themselves<br>
		<br><br>
	</div>
	<div class= "ReadArea">	
		<b>In the works :</b> <br>
		Pilot User pages, Login pages, Creation Pages<br>
		Flight people counts<br>
		Search function that Auto-catches any locations searched for<br>
		Ability to 'buy' flight from Search<br>
		Ability for pilot to 'pin' their own custom flight base, creating a new location in the database <b>(DONE)</b><br>
	
	</div>
	<div class= "ReadAreaFull">
		See all current flights below:
	</div>
	<div id="map"></div>
	<div class= "ReadArea">
		<div id="DebugText">
			<h1>Debug Info Below </h1>
		</div>
	</div>
    <script>
		document.getElementById("DebugText").innerHTML+=("-----------------Debug Code Below----------------<br>");
		if(window.location.search=== ""){
			
		}else{
			
		document.getElementById("DebugText").innerHTML+=("Running code. Search is "+window.location.search+"<br>");	
		}
	/*  Stolen initally from https://stackoverflow.com/questions/814613/how-to-read-get-data-from-a-url-using-javascript */
	  function parseURLParams(url) {
		document.getElementById("DebugText").innerHTML+="parse";
		if(url.includes("?")=="false"){
			document.getElementById("DebugText").innerHTML+="Dosn't contain question mark<br>";
			return null;
		}
		var queryStart = url.indexOf("?") + 1,
			queryEnd   = url.indexOf("#") + 1 || url.length + 1,
			query = url.slice(queryStart, queryEnd - 1),
			pairs = query.split("&"),
			params = [], i, n, v, nv;
		document.getElementById("DebugText").innerHTML+=("Start "+queryStart+" End: "+queryEnd);
		/*
		for (i = 0; i < pairs.length; i++) {
			nv = pairs[i].split("=",0);
			n = decodeURIComponent(nv[0]);
			v = decodeURIComponent(nv[1]);

			if (!parms.hasOwnProperty(n)) parms[i] = [];
			parms[i].push(v);
		}
		*/
		for (i = 0; i < pairs.length; i++) {
			nv = pairs[i].split("=");
			n =nv[0];
			v =nv[1];

			if (!params.hasOwnProperty(i)) params[i] = "";
			params[i]+=v;
			document.getElementById("DebugText").innerHTML+=("<br>Added "+v +" To "+i+" Instead of "+n);
		}
		document.getElementById("DebugText").innerHTML+=("<br> Done parsing param size" +params[0].length);
		document.getElementById("DebugText").innerHTML+=("Returning "+params[0].toString()+"<br>");
		return params[0];
	  }
	  
	  function getLocations(params){
		  if(params==null){
			  document.getElementById("DebugText").innerHTML+="params is null";
			  return null;
		  }
		  var i=0,returnValues=[];
		  document.getElementById("DebugText").innerHTML+=("<br>calling locations<br>params are "+params.toString() +" length is "+params.length+"<br>");
		  while(i<params.length){
			  document.getElementById("DebugText").innerHTML+="Calling "+i;
			  if(i==0){
				  returnValues[0]=[];
				  returnValues[0].push(params[0]);
			  }
			  else if(i%2==0){
				  returnValues[i/2]=[];
				  returnValues[i/2].push(params[i]);
			  }
			  else{
				  returnValues[(i-1)/2].push(params[i]);
			  }
			  i++;
			  document.getElementById("DebugText").innerHTML+="<br>";
		  }
		  document.getElementById("DebugText").innerHTML+=returnValues.toString();
		  return returnValues;
		  
		  
	  }
	  
	  /*Potentially use window.location.search or hrefs*/
	  var pointers=parseURLParams(window.location.search);
	  pointers=pointers.split("%2C")
	  document.getElementById("DebugText").innerHTML+=("<br>About to call get Locations On"+pointers.toString());
	  var mapPointer=getLocations(pointers);
	  var i=0;
	  while(i<mapPointer.length){
		  document.getElementById("DebugText").innerHTML+=("<br>MapPointer "+i+" is "+mapPointer[i].toString());
		  i++;
	  }
	  document.getElementById("DebugText").innerHTML+=("<br>-----------------End of Debug Code----------------<br>");
      var map;
	  
	  function createMarker(lat,lng) {
		  return new google.maps.Marker({ position:new google.maps.LatLng(lat,lng),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url :"http://www.starshiplad.com/Flight.php?flight=2"});
		  
	  }
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {center: {lat: -41.285, lng: 174.776},zoom: 4});
		var marker = new google.maps.Marker({ position:new google.maps.LatLng(-45.86084669314834,170.36267280578613),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url :"http://www.starshiplad.com/Flight.php?flight=2"});
		var marker1 = new google.maps.Marker({ position:new google.maps.LatLng(-43.4863689848746,172.53684997558594),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url :"http://www.starshiplad.com/Flight.php?flight=1"});
		google.maps.event.addListener(marker, 'click',function() {window.location.href = this.url;});
		google.maps.event.addListener(marker1, 'click',function() {window.location.href = this.url;});
		Markers={};
		/*
		*Get SQL Markers
		*/
		document.getElementById("DebugText").innerHTML+=("<br>-----------------START OF SQL CODE----------------<br>");
		sqlMarkers={};
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
				document.getElementById("DebugText").innerHTML+=("<br> Adding point from SQL: <br> "+id+takelat+takelong+destlat+destlong);
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
		
		i=0;
		/*
		*INITALIZE MARKERS MAP
		*/
		for(i=0;i<mapPointer.length;i++){
			var uralMountain=("http://www.starshiplad.com/Flight.php?flight="+i);
			Markers[i]=new google.maps.Marker({ position:new google.maps.LatLng(mapPointer[i][0],mapPointer[i][1]),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',map: map,url : uralMountain});
			google.maps.event.addListener(Markers[i], 'click',
				function() {
					window.location.href = this.url;
				}
			);
		}
		i=0;
		marker.setMap(map);
		marker1.setMap(map);
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
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASMQ7zyUEA6EZy0bIgkW8i_BMKFIB8okk&callback=initMap"async defer>
	</script>
  </body>
</html>