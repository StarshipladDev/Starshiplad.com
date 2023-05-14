<!--
Author: StarshipladDev
TODO/ISSUES:
Test 1 :Complete
Test 2 : Complete
Test 3 : Complete
-->
<!DOCTYPE HTML>
<html>
<head>
<!--Import header via php-->
<?php
	include "nuHeader.php";
?>
</head>
<!--Main section of content  -->
<body>

	<div id="main">
	<main>
		<div class ="Section">
		
			<div class="heaerSection"><der> Source Code/ Links </der> </div>
			<div class="readPanel full">
			<!--Dispaly introduction. Contains button to run 'getAPIData'  -->
			<der>Welcome!</der><br>
			I post updates to content reguarly and ake/ action any requests given via comments by followers. <br>
			Check out the source code and my socials below: <br>
			Hit the paitn buttn in the top right to change some colors up! <br>
			
			<a href="https://github.com/StarshipladDev/Starshiplad.com/tree/master/Testing/APITesting">Source Code Of This Website </a><br>
			<a href="https://twitter.com/StarshipladDevp"> Twitter</a><br>
			<a href="https://discord.gg/PyDbCktsmT">Discord</a><br>
			<a href="https://www.instagram.com/starshipladdev"> Instagram</a><br>
			<a href="https://www.tiktok.com/@starshipladdev"> Tik Tok</a><br>
			</div>
		</div>


		<div class ="Section">
			<div class="readPanel full">
			<!--Dispaly introduction. Contains button to run 'getAPIData'  -->
			<der></der><br>
			Welcome to the API testing page!<br>
			The API endpoint beign tested is can be found <a href="https://api.tmsandbox.co.nz/v1/Categories/6328/Details.json?catalogue=false"> here </a><br>
			Press the below button to begin an API test call that asserts the following:<br>
			<br>*Name = "Badges"
			<br>*CanListClassifieds = false
			<br>*The Charities element with Description = "Plunket" has a Tagline that contains the text "well child health services"
			<br> Furthermore, the development log PDF can be found <a href="https://Starshiplad.com/APIDoco.pdf">here. </a><br>
			<button id="startButton">Start API test </button>
			</div>
		</div>
		
		<div class ="Section">
			<!--Container of 'results'-->
		<div class="readPanel">
			Results will be displayed here:<br>
			<!--DOM object to be changed via .innerHTML when displaying results-->
			<table id="results">
				<tr>
					<td>
						Target
					</td>
					<td>
						Source
					</td>
					<td>
						Property
					</td>
					<td>
						comparison
					</td>
					<td>
						Result
					</td>
				</tr>
			</table>
			</div>
		</div>
		<div class ="Section">
			<!--Container of 'results'-->
			<div class="readPanel">
				Starshiplad API test:<br>
				<button id="starshipButton">API call</button>
				<br>
				<div id="TestStarshiplad"> </div>
			</div>
		</div>
		<!--
		
		
		
		Section for testing PHP , implemented 27/04/2021
		
		
		-->
		<div class ="Section">
			<!--Container of 'results'-->
			<div class="readPanel">
				Starshiplad API PHP test(done live on TikTok (@starshipladdev)):<br>
				This gets the 'Name' and 'job' values from a simple PHP JSON API at <a href ="https://www.starshiplad.com/Testing/API"> starshiplad.com/Testing/API </a> <br>
				
				<button id="starshipButtonPHP">PHP API Call</button>
				<br>
				
				<div id="testStarshipladPhp"> </div>
			</div>
		</div>

	</main>

	</div>

</body>

<script>
//Prevents double running 'getAPIData'
var run=false;
/*
* drawResults adds a table column in the html 'results' object, filling it with specified data and a colored success string
* param target- The target data to read/ the goal data
* param source- The location of the tested data
* param present- The acctual data present at source
* param comparison - The comparison between target & present
* param result- The boolean result of whether comparison between target & source was true
*/
function drawResult(target,source,present,comparison,result){
	var newLine="<tr><td>"+target+"</td><td>"+source+"</td><td>"+present+"</td><td>"+comparison+"</td>";
	if(result===false){
		newLine+=("<td style=\"color:#ff0000\">Fail</td></tr>");
	}else{
		newLine+=("<td style=\"color:#33cc33\">Success</td></tr>");
	}
	document.getElementById("results").innerHTML+=newLine;
	
}
/*
* searchCharity searches a JSON file to return the tagline at the first element to have the description 'plunket' for further comparison
* param jsonFile- The target json file to search through for 'plunket'
* return - returns the tagline fo the 'plunket' element, or "null" if no plunket element is found
*/
function searchCharity(jsonFile){
	var counter=0;
	while(counter<jsonFile.Charities.length){
		if(jsonFile.Charities[counter].Description=="Plunket"){
			return jsonFile.Charities[counter].Tagline;
		}
		counter++;
	}
	return "null";
}
/*
* getAPIData asserts 3 specified attributes of a given JSON API endpoint file, writing results to the 'results' element
* param urlToCall- The url for the API end point JSON file to check

*/
function getAPIData(urlToCall){
	if(run==true){
		return;
	}
	run=true;
    var request = new XMLHttpRequest();
    request.open("GET",urlToCall,false);
    request.send(null);
    var jsonPlain = request.responseText;
	var jsonFile = JSON.parse(jsonPlain);
	//Simple implementation that works
	drawResult("Badges","Name",jsonFile.Name,"Equals",(jsonFile.Name=="Badges"));
	drawResult("false","CanListClassifieds",jsonFile.CanListClassifieds,"Equals",(jsonFile.CanListClassifieds==false));
	var result=searchCharity(jsonFile);
	drawResult("well child health services","Charities",result,"Contains",result.includes("well child health services"));
		
}

function testStarshipladData(){
	var obj = new XMLHttpRequest();
	obj.open("GET","https://www.starshiplad.com/Testing/API/GetNotes.json",false);
	obj.send(null);
	var jsonFile = obj.responseText;
	console.log("Pure JSON is : "+jsonFile);
	jsonFile = JSON.parse(jsonFile);
	document.getElementById("TestStarshiplad").innerHTML = jsonFile.updates[0].area;
}
/*

TestStarshipladPhp is used to call a PHP JSON API, read its values rom a HTML request, and 
edit the values of the div 'testStarshipladPhp' with the first returned 'name' and 'job' elements

*/
function TestStarshipladPhp (){
	var xmlhttpRequest = new XMLHttpRequest();
	xmlhttpRequest.open ("GET","https://www.starshiplad.com/Testing/API/",false);
	xmlhttpRequest.send(null);
	var returnedJSON = xmlhttpRequest.responseText;
	var returnedJSONPure = JSON.parse(returnedJSON);
	document.getElementById("testStarshipladPhp").innerHTML=("Name: "+returnedJSONPure.name + " // Job: "+returnedJSONPure.job );
}
//Set button to call API asserts on click
document.getElementById("startButton").onclick=function(){
	getAPIData("https://api.tmsandbox.co.nz/v1/Categories/6328/Details.json?catalogue=false");
}
document.getElementById("starshipButton").onclick=function(){
	testStarshipladData();
}
document.getElementById("starshipButtonPHP").onclick= function(){
	TestStarshipladPhp();
}

</script>
</html>
