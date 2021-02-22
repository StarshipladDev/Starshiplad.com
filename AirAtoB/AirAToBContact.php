
<!DOCTYPE html>
<html>
  <head>
    <?php 
    include "AirAToBHeader.php";
   ?>
	<div class= "ReadArea">
		<div id="InputText">
			Send your message to our team with any queires TODO:Drop down for department
			<form action="AirAToBEmail.php" method="post">

				Message: <textarea id="InputText" rows="3" cols="40" name="Message"></textarea><br>
				Name: <input type="text" name="Name"><br>
				Return Address: <input type="text" name="Email"><br>
				<input type="submit">
			</form>
		</div>
	</div>
  </body>
</html>
