<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>
<!--
body {
  background-color: linen;
}
-->
body{
	background-color:#;
}
#TitlePage{
	text-align:center;
	background-color:##ff6666;
	min-height:10%;
	font-size:300%;;
	
}
.area{
	text-align: center;
	background-color:#7F92FF;
	margin:2%;
	
}
.description{
	background-color:#BFC8FF;
}
.hiddenEl{
		visibility:hidden;
		
}
</style>
</head>
<body>
<div ng-app="StatsApp" ng-controller="stats">
	<div class="area" id="TitlePage">  Dungeons And Dragons Character Creator</div>

		<div class="area" id="questions"> This is the questions area
		<!-- 6 stats , each answer will give up to 4 'points' towards and attribute -->
		<!-- 0-Strength 1-Dex 2-Constitution 3-Charisma  4-Inteligence 5-WIsdom --->
		<!-- Question -->
		<div class="description">
			Your character sees an old lady elf who has dropped an apple. <p></p>
			What would they do?
		</div>
		<select name="q1" ng-model="q1data" class="q" id="q1id">
		  <option value="0">You crush the apple below your powerful boot </option>
		  <option value="1">Without breaking stride, your character throws the apple back to her </option>
		  <option value="2">You grab and eat the apple as it is healthy for you </option>
		  <option value="3">You kindly pick up the apple for her</option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
		<div class="description">
			Your Character Gets into a bar fight.
			What make-do weapon do they use?
		</div>
		<select name="q2" ng-model="q2data" class="q" id="q2id">
		  <option value="1">Throw A Knife </option>
		  <option value="2">Just take the hits </option>
		  <option value="3">Bro, I'll just talk them down</option>
		  <option value="4">I don't drink, so I wouldn't be at a bar, I'd be learning spells</option>
		</select>
		<p></p>
		<div class="description">
			Your character Comes from a ....
		</div>
		<select name="q3" ng-model="q3data" class="q" id="q3id">
		  <option value="2">Rugged Hill Outside Of Civilization </option>
		  <option value="3">Merchant Town </option>
		  <option value="4">City</option>
		  <option value="5">Wizard School</option>
		</select>
		<p></p>
		<div class="description">
			Your Character's favourite animal is a ....
		</div>
		<select name="q4" ng-model="q4data" class="q" id="q4id">
		  <option value="3">Eye-catching Bird </option>
		  <option value="4">Smart Rodent </option>
		  <option value="5">Wise Owl</option>
		  <option value="0">Anything With Bite</option>
		</select>
		<p></p>
		<!-- Question -->
		<div class="description">
			Your character Grew Up....
		</div>
		<select name="q5" ng-model="q5data" class="q" id="q5id">
		  <option value="4">Peddling Their Inventions </option>
		  <option value="5">Stealing Books For A Cult</option>
		  <option value="0">Beating On The Other Kids </option>
		  <option value="1">Running Across Rooftops</option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
		<!-- Question -->
		<div class="description">
			Your Character's Most Hated Enemies Are ....
		</div>
		<select name="q6" ng-model="q6data" class="q" id="q6id">
		  <option value="5">Fools </option>
		  <option value="0">Poison Darters </option>
		  <option value="1">Net Throwers </option>
		  <option value="2">Archers </option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
		<!-- Question -->
		<div class="description">
			Your Character Owes Loyalty To Their ...
		</div>
		<select name="q7" ng-model="q7data" class="q" id="q7id">
		  <option value="3">Money </option>
		  <option value="1">Adventure  </option>
		  <option value="2">No One </option>
		  <option value="0">Themselves </option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
		<!-- 0-Strength 1-Dex 2-Constitution 3-Charisma  4-Inteligence 5-WIsdom --->
		<!-- Question -->
		<div class="description">
			Your Character Fights With...
		</div>
		<select name="q8" ng-model="q8data" class="q" id="q8id">
		  <option value="4">Their Wits (And Fireballs) </option>
		  <option value="2">Their Fists </option>
		  <option value="3">Their Sword/Mace/Axe</option>
		  <option value="1">Their Bow</option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
		<!-- Question -->
		<div class="description">
			Your Character Always Carrys An Extra ....
		</div>
		<select name="q9" ng-model="q9data" class="9" id="q9id">
		  <option value="5">Bag Of Gold </option>
		  <option value="3">Fine Cloak </option>
		  <option value="4">Hiking Pack  </option>
		  <option value="2">Couple Of Healing Potions</option>
		</select>
		<p></p>
		<!-- END OF QUESTION -->
	</div>

	<div class="area"> 
	This is the description area

		<p></p>
		Character Name : <input type="text" ng-model="name" id="namedesc"> </input>
		<p></p>
		Description Of Character : <input type="text" ng-model="desc" id="descr"> </input>
		<p></p>
		Character Race : <select name="race" ng-model="race" id="race">
		  <option value="Human" selected >Human </option>
		  <option value="Elf" selected >Elf </option>
		  <option value="Half-Dragon" selected >Half-Dragon </option>
		  <option value="Dwarf" selected >Dwarf </option>
		  <option value="Halfling" selected >Halfling </option>
		</select>
	</div>
	<div class="area" id="stats"> 
		This is the stats result area
		<p></p>
		Name: <a ng-bind="name"></a>
		<p></p>
		Description: <a ng-bind="desc"></a>
		<!--<div ng-repeat="x in attributesIndex" >{{attributes[x]}}   {{attributes[x*1]}} </div> -->

	</div>
	<div class="hiddenEl">
	<form name="dataForm"  action="dandsubmit.php" id="actionForm" method="post">
	<div id= "submitValues">  </div>
	<input type="text" name= "submitValuesText" id="submitValuesText"> 
	<input type="submit" value="Submit" id="submitButton">
	</form>
	
	</div>
	<div class="area" id= "submit"> 
		<button onclick="clickfunc()">Submit</button> 
	
	</div>
</div>
<script>
let attributesValues = [
        0,0,0,0,0,0
    ];
let attributes = [
        "Strength",
        "Dexiterity",
        "Constitution",
        "Charisma",
        "Inteligence",
        "Wisdom"
    ];
function clickfunc(){
	document.getElementById("submitValues").innerHTML=("");
	/*
	//var q1data = document.getElementById("q1id").value*1;
	alert("hi this is q1data "+q1data);
	alert("hi "+attributesValues[q1data]);
	*/
	for (var i = 1; i < 10; i++){
		var q1data = document.getElementById("q"+i+"id").value;
		attributesValues[(q1data)]+=1;
	}
	document.getElementById("submitValues").innerHTML+=(document.getElementById("namedesc").value+"^");
	for (var i = 0; i < attributesValues.length; i++){
		var value=0;
		for (var f = 0; f < attributesValues[i]+1; f++){
			value += Math.floor((Math.random() * 2) +1);
		}
		value+=3;
		document.getElementById("submitValues").innerHTML+=(value+"^");
	}
	
	document.getElementById("submitValues").innerHTML+=(document.getElementById("descr").value+"^");
	
	switch(document.getElementById("q8id").value ){
		case "4":
			document.getElementById("submitValues").innerHTML+=("Wits");
			break;
		case "2":
			document.getElementById("submitValues").innerHTML+=("Fists");
			break;
		case "3":
			document.getElementById("submitValues").innerHTML+=("Sword");
			break;
		case "1":
			document.getElementById("submitValues").innerHTML+=("Bow");
			break;
	}
	document.getElementById("submitValues").innerHTML+=("^");
	switch(document.getElementById("q9id").value){
		
		case "5":
			document.getElementById("submitValues").innerHTML+=("Gold");
			break;
		case "3":
			document.getElementById("submitValues").innerHTML+=("Cloak");
			break;
		case "4":
			document.getElementById("submitValues").innerHTML+=("Pack");
			break;
		case "2":
			document.getElementById("submitValues").innerHTML+=("Potion");
			break;
	}
	document.getElementById("submitValues").innerHTML+=("^");
	document.getElementById("submitValues").innerHTML+=(document.getElementById("race").value+"^");
	document.getElementById("submitValuesText").value=document.getElementById("submitValues").innerHTML;
	document.getElementById("actionForm").submit();
	
};
var app = angular.module("StatsApp", []);
app.controller("stats", function($scope) {
    $scope.attributes = [
        "Strength",
        "Dexiterity",
        "Constitution",
        "Charisma",
        "Inteligence",
        "Wisdom",
    ];
	$scope.attributesIndex = [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
    ];
	$scope.attributesValue = [
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
    ];
});
</script>
</body>


</html>