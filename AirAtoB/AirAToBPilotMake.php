<!DOCTYPE html>
<html>
  <head>
   <?php 
    include "AirAToBHeader.php";
   ?>
	
	<div class= "ReadArea">	
		Click where your flight will be going from,click accept,then click where your flight will be goign to.Fill out the details of the flight below, and click accept!
		<br>
		<button type="button" id="Accept"> Accept Take Off</button>
	</div>
	
	<div id="map"></div>
	<div class= "ReadArea">	
		<form action="AirAToBMakeFlight.php" method="post">
			<table style="width:100%;border-color:#000000;border-style: solid;border-width: 1px;">
				<tr>
					<td>
					Pilot Name
					</td>
					<td>
					<input type="text" name="Name" value=""/>
					</td>
				</tr>
				<tr>
					<td>
					Take Off  Name
					</td>
					<td>
					<input type="text" name="takeOff" value=""/>
					</td>
				</tr>
				<tr>
					<td>
					Destination Name
					</td>
					<td>
					<input type="text" name="Dest" value=""/>
					</td>
				</tr>
				<tr>
					<td>
					Passengers:
					</td>
					<td>
					<input type="text" name="Passengers" value="2"/>
					</td>
				</tr>
				<tr>
					<td>
					Cost ($):
					</td>
					<td>
					<input id="cost" type="text" name="cost" value="200"/>
					</td>
				</tr>
				<tr>
					<td>
					
					<input type="submit" text="Accept!"/>
					</td>
				</tr>
			</table>
				<input id="PilotId" name="PilotId" type="hidden" value="1"/>
					<input id="lata" name="lata" type="hidden" value=""/>
					<input id="lnga"  name="lnga" type="hidden" value=""/>
					<input id="latb" name="latb" type="hidden" value=""/>
					<input id="lngb" name="lngb" type="hidden" value=""/>
		</form>
	</div>
    <script>
	var takeOffSet =0;
	function accepttakeOff(){
		
		takeOffSet =1;
	}
	document.getElementById("Accept").onclick=function(){accepttakeOff()};
	var map;

	function createMarker(lat,lng,type) {
		if(type==1){
			return new google.maps.Marker({ position:new google.maps.LatLng(lat,lng),icon: "http://www.starshiplad.com/PlaneDesc.png",title: 'Here is an Aeroplane',url :"http://www.starshiplad.com/Flight.php?flight=2"});
		}else{
			return new google.maps.Marker({ position:new google.maps.LatLng(lat,lng),icon: "http://www.starshiplad.com/Plane.png",title: 'Here is an Aeroplane',url :"http://www.starshiplad.com/Flight.php?flight=2"});
		}
		

	}
	
	var newMarker=null;
	var newMarker1=null;
	function newMarkerMake(lat,lng,map) {
		if(takeOffSet==0){
			if(newMarker != null){
			newMarker.setPosition(new google.maps.LatLng(lat,lng))
			}else{
				newMarker=createMarker(lat, lng,0);
				newMarker.setMap(map);
			}
			document.getElementById("lata").value=lat;
			document.getElementById("lnga").value=lng;	
		}else{
			if(newMarker1 != null){
				newMarker1.setPosition(new google.maps.LatLng(lat,lng))
			}else{
				newMarker1=createMarker(lat, lng,1);
				newMarker1.setMap(map);
			}
			document.getElementById("latb").value=lat;
			document.getElementById("lngb").value=lng;	
		}
		
		// Get lat lng coordinates
		// This method returns the position of the click on the map
	}
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {center: {lat: -41.285, lng: 174.776},zoom: 4});
		google.maps.event.addListener(map, "click",function(event){
			var lat = event.latLng.lat().toFixed(6);
			var lng = event.latLng.lng().toFixed(6);
			// Call createMarker() function to create a marker on the map
			newMarkerMake(lat,lng,map);
		});
	}
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAajYfAvnI1N_8CkYZl99j-7iAXcxNSkhY&callback=initMap"async defer>
	</script>
  </body>
</html>