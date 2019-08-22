<!DOCTYPE = HTML>
<html>
<head>
<?php
	include "header.php";
?>
</head>
<body>
<div class="readPanel">
Below is an image dispalying the regular output of the 'output data' page compared to the valeus retreived from my SQL injection tool.
On the left you can see important info is hidden, however using UNION statments in SQL,the  <a href="https://github.com/StarshipladDev/Hack-Tool" >hack tool</a> dispalys this data in
non-password slots, reads them by using Regex to search for a prefix and suffix, and the nconcats nn-hidden data with the passwrod protected data
</div>
<img src="http://www.starshiplad.com/proof.JPG" alt="Proof of hack">
</body>
<footer>
<?php
include "footer.php";
?>
</footer>
</html>