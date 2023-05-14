<!DOCTYPE HTML>
<html>
<header>
<?php
	include "nuHeader.php";
?>
</header>
<body>
<div id="main">
		<div class ="Section">
			<div class = "headerSection">
				<der>Email Return Data</der>
			</div>
			<div class="readPanel full">

				<?php

				if(strlen($Name)<1 || strlen($Message)<1){
					
					echo "Message Needs a valid name and data sorry :( ";
				}else{
					mail("Admin@Starshiplad.com",$Name . " Sent A message from Index.php",$Message);
					echo "Message sent successfully!<br>Name: " . $_POST["Name"] . "<br>Important Information:" . $_POST["Message"];
				}
				?>
			</div>
		</div>
</div>
</body>
<footer>
<?php
include "footer.php:";
?>
</footer>
</html>