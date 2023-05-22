<?php
/*Credentials */
include("passwords.php")
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check connection


$sql = "SELECT Id FROM Cards ORDER BY Id DESC LIMIT 1";
$result = $conn->query($sql);
$highestValue = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		$highestValue= $row['Id'];
		
		echo "Succeded Getting Id!, Highest Row Is " . $highestValue . "<br>";
	}
} else {
 echo "0 results Getting Id"  ;
}

$target_dir = "CardImages/";
$highestValue = $highestValue +1;
echo "After Update, Highest Row Is " . $highestValue . "<br>";

$target_file = $target_dir . $highestValue . ".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
  
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
} 
if($imageFileType != "PNG" && $imageFileType != "png") {
  echo "Sorry, only PNG files are allowed.";
  $uploadOk = 0;
} 

$check = getimagesize($_FILES["imageFile"]["tmp_name"]);
if($check[0] != 150 || $check[1] != 100) {
	
  //list($width,$height,$type, $attr) = getimagesize($_FILES["fileImage"]["tmp_name"]);
  $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
  //echo "Sorry, Image Must Be 150px x 100px ,it is currently " . $check[0] . " X " . $check[1] ;
  echo "width is ". $_FILES["imageFile"]["width"] . "<br>";
  echo "height is ". $_FILES["imageFile"]["height"] . "<br>";
  $uploadOk = 1;
} 

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
	
    echo "The file will be called " . $target_dir . $highestValue . ".png";
  if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)){
    echo "The file " . htmlspecialchars(basename( $_FILES["imageFile"]["name"])) . " has been uploaded as " . $target_dir . $highestValue . ".png";
  } 
  else {
    echo "Sorry, there was an error uploading your file.";
  }
}



//

//	DATA

//
$sql = "INSERT INTO Cards(Name,ReleaseId,CardType) VALUES ('";
$sql .= $_POST['name'] . "'," . $_POST['release'] . ",'";
$sql .= $_POST['type'] . "')";
// echo $_GET['id'] . 
//echo $_GET['id'] . "0 results" . ;
if ($conn->query($sql) === TRUE) {
  // output data of each row
	echo "Succeded! Using script " . $sql;
	$sql="UPDATE Cards SET Id = " . $highestValue 
	. " WHERE Id IN " . "(SELECT Id FROM Cards WHERE Id > " 
	. $highestValue . ")";
	if ($conn->query($sql) === TRUE) {
  // output data of each row
		echo "Succeded! Using script " . $sql;
	} 
	else {
		echo "Did Not Update, using script " . $sql  ;
	}
} else {
 echo "0 results, using script " . $sql  ;
}

?>