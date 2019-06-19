<html>
<header>
</header>
<div class="readPanel">
<link rel="stylesheet" href="Joke.css">
<link rel="icon" type="image/png" href="http://www.starshiplad.com/favicon.png"/>
<meta name="content" content="100% Quality Maps">
<Title> "Request sent. Total cost: $10,000"</Title>
<?php

if(strlen($Name)<1 || strlen($Message)<1){
	
	echo "Message Needs a valid name and data sorry :( ";
}else{
	mail("Admin@Starshiplad.com",$Name . " Sent A message from Joke.php",$Message);
	echo "Message sent successfully!<br>Name: " . $_POST["Name"] . "<br>Important Information:" . $_POST["Message"];
}
$conn->close();
?>
</div>
</body>
</html>