<!--Stolen from https://www.codexworld.com/upload-store-image-file-in-database-using-php-mysql/ enctype="multipart/form-data" -->
<!DOCTYPE HTML>
<html>
<head>
<?php
 include "nuHeader.php";
?>
</head>
<body>
	<div id="main">
		<div class ="Section">
			<div class = "headerSection">
			<der>Create Unit</der>
			
			</div>
			<div class="readPanel half">
			Hey gang! You can uplaod a 50x50 PNG or JPG file here, with x and y co-ordinates(Please less than 300 :*) and the said unit will appear on my RPG program! </div>
			<div class="readPanel half">
				<form action="uploadFilePhpCommand.php" method="post" enctype="multipart/form-data">
				   
					X:
					<input type="text" name="xp">
					<br>
					Y:
					<input type="text" name="yp">
					<br>
					Name:
					<input type="text" name="cn">
					<br>
					Select Image File to Upload:
					<input type="file" name="file">
					<br>
					<input type="submit" name="submit" value="Upload">
				</form>
			</div>
		</div>
	</div>
</body>
</html>