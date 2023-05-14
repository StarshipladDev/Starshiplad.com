<!DOCTYPE html>
<html>
<head>
<style>
<!--
body {
  background-color: linen;
}
-->
body{
	background-color:#;
}
.area{
	text-align: center;
	text-align: center;
	background-color:#7F92FF;
	margin:2%;
	
}
#TitlePage{
	text-align:center;
	background-color:##ff6666;
	min-height:10%;
	font-size:300%;
	
}
.description{
	background-color:#BFC8FF;
}
.hiddenEl{
		visibility:hidden;
		
}
table{
	display:in-line;
}
table,tr,td{
	border:3px solid black;
	
}
img{
	display:inline-block;
	max-width:50%;
	max-height:50%;
}
</style>
</head>
<body>
<script>
</script>
<div class="area" id="TitlePage">  Dungeons And Dragons Character Creator</div>

		<div class="area" id="questions"> Character added successfully!</div>
		<div class="area" id="questions"> <a href="dandd.php"> Press here to go again! </a> </div>
		<div class="area" id="questions"> 
<?php
include("Passwords.php");
#Create an array of data to input
echo "<br>".$query;
$values =htmlspecialchars ($_POST["submitValuesText"] );
$valuesClean = explode("^",$values);
$Attributes = array("Name","Race", "Strength", "Dexterity", "Constitution", "Charisma", "Intelligence", "Wisdom","Weapon","Gear");
$AttributesValues=array( $valuesClean[0],$valuesClean[10],$valuesClean[1],$valuesClean[2],$valuesClean[3],$valuesClean[4],$valuesClean[5],$valuesClean[6],$valuesClean[8],$valuesClean[9]);
$query = "INSERT INTO dandd(Name,Strength,Dexterity,Constitution,Charisma,Intelligence,Wisdom,Description,Weapon,Gear,Race) VALUES ('".$valuesClean[0]."',".$valuesClean[1].",".$valuesClean[2].",".$valuesClean[3].",".$valuesClean[4].",".$valuesClean[5].",".$valuesClean[6].",'".$valuesClean[7]."','".$valuesClean[8]."','".$valuesClean[9]."','".$valuesClean[10]."')";
$conn = new mysqli($hostname, $userName, $passWord ,$databaseName);
	unset($hostname);
	unset($databaseName);
	unset($userName);
	unset($passWord);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

if ($conn->query($query) === TRUE) {
  echo "New record created successfully!";
  echo"<table>";
  for($i=0;$i<count($Attributes);$i++){
	  echo("<tr>");
	  echo("<td>".$Attributes[$i]. " </td>");
	  echo("<td>".$AttributesValues[$i]. " </td>");
	  echo("</tr>");
	  
  }
  echo"</table>";
  if($AttributesValues[1]==="Human"){
	  echo "<img src=' https://www.aidedd.org/assets/regles/races/humain.jpg' alt=\"A Human\">";
  }
  if($AttributesValues[1]==="Elf"){
	  echo "<img src= 'https://i.pinimg.com/originals/91/39/89/913989640134c7b14fd7210349f0cd3f.png ' alt=\"An Elf\">";
  }
  if($AttributesValues[1]==="Dwarf"){
	  echo "<img src='https://cdna.artstation.com/p/assets/images/images/013/185/354/large/john-paul-balmet-446fdc97-b723-467b-8b07-ac8d9e997013.jpg?1538463980 ' alt=\"A Dwarf\">";
  }
  if($AttributesValues[1]==="Half-Dragon"){
	  echo "<img src=\"https://i.redd.it/a5akqwu2o4201.jpg\" alt=\"A Half-Dragon\">";
  }
  if($AttributesValues[1]==="Halfling"){
	  echo "<img src='https://i.redd.it/y1yhvifu4pq21.png' alt=\"A Halfling\">";
  }
  if($AttributesValues[1]==="Human"){
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
</div>
</body>
</html>