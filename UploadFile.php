//Stolen from https://www.codexworld.com/upload-store-image-file-in-database-using-php-mysql/
<!DOCTYPE = HTML>
<html>
<head>
<?php
 include "header.php";
?>
</head>
<body>
<div class="readPanel">Hey gang! YOu can uplaod a 50x50 PNG or JPG file here, with x and y co-ordinates(Please less than 300 :*) and the said unit will appear on my RPG program! </div>
<div class="readPanel">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
	<br>
	X:
	<input type="text" name="X-Position">
	<br>
	Y:
	<input type="text" name="Y-Position">
	<br>
	Name:
	<input type="text" name="Character Name">
    <input type="submit" name="submit" value="Upload">
</form>
</div>
</body>
</html>