//Stolen from https://www.codexworld.com/upload-store-image-file-in-database-using-php-mysql/
<!DOCTYPE = HTML>
<html>
<head>
<?php
 include "header.php";
?>
</head>
<body>
<div class="readPanel">
<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$statusMsg = '';
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into peiceInfo (name,xpos,ypos,Date_Added) VALUES ('".$fileName."','".POST["Character Name"]."',".$POST["X-Position"].",".$POST["Y-Position"].", NOW())");
            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>

</div>
</body>
</html>