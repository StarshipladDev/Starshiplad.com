<!DOCTYPE html>
<html>
	<?php 
    include "AirAToBHeader.php";
   ?>
		<div class= "ReadArea">
			<?php
			$Name=$_POST["Name"];
			$Message=$_POST["Message"];
			$Email=$_POST["Email"];
			if(strlen($Name)<1 || strlen($Message)<1){
				
				echo "Message Needs a valid name and data sorry :( ";
			}else{
				mail("Admin@Starshiplad.com",$Name . " Sent A message from AirAToB.php reply to " .$Email,$Message);
				echo "Message sent successfully!<br>Name: " . $_POST["Name"] . "<br>Email Content:" . $_POST["Message"];
			}
			?>
		</div>
	</body>
</html>