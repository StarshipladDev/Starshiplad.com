<html>
<head>
<?php 
	include "header.php";
?>
</head>
<body>
<div class="readPanel">
Enter a value to search Names in 'Information':
<form action="search.php" method="get">
	Name: <input type="text" name="testsearch">
	<input type="submit" text="Seach for Name">
</form>
<table class="displayTable">
	<tr>
    <th>ID</th>
    <th>Name</th> 
    <th>Info</th>
	</tr>
<?php
$servername = "Fake";
$username = "Fake";
$password = "Fake";
$dbname = "Fake";


$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_GET["testsearch"];

if(empty($name)==FALSE){
$retreive = "SELECT ID,Name,Info FROM ImportantInfo  WHERE '$name' IN (Name)";
$result= $conn->query($retreive);
	while($row = $result->fetch_assoc()){
		echo"<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"]. "</td> <td><input class=\"password\" type=\"password\" value=\"". $row["Info"]. "\"readonly> </td></tr>";
		
	}
	
}
$conn->close();
?>

</table>
</div>
</body>
<?php
	include "footer.php:";
?>

</html>