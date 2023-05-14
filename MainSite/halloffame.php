<!DOCTYPE HTML>
<html>
<head>
<?php 
	include"nuHeader.php"
?>
<body>
	<div class="main">
			<div class ="Section">
				<div class = "headerSection">
				<der>Hall Of Fame </der>
				
				</div>
				<div class="readPanel full">
					<der>The XSS Hall Of Fame </der><br>
					The <a href="http://www.starshiplad.com/proof.php">C# Hacktool</a> I create required a unprotected page to test XSS attacks.
					The page <a href="http://www.starshiplad.com/input.php">input</a> uses PHP to store data in a format that can be read on the 
					page <a href="http://www.starshiplad.com/input.php">output</a>. Occasionaly people put some very entertaining/intereting XSS 
					attacks in, and before I clean the output page, I will log my favourite examples here.
					
				</div>
			</div>	
			<div class ="Section">
				<div class = "headerSection">
				<der>~2018 - Inital XSS</der>
				
				</div>
				<div class="readPanel full">
					Using a closing tag of the div containign the password-protected element, unprotected text can be displayed
					<br>
					<img alt="Xss1" src="Content/Xss1.png">
				</div>
			</div>
			<div class ="Section">
				<div class = "headerSection">
				<der>~2020 - Large  font text</der>
				
				</div>
				<div class="readPanel full">
					Using a closing tag of the div containing the password-protected element,followed by a 'h1' tag. 
					<br>
					<img alt="Xss1" src="Content/Xss2.png">
				</div>
			</div>
			<div class ="Section">
				<div class = "headerSection">
				<der>09/07/2020 - Autoply Rickroll Iframe</der>
				
				</div>
				<div class="readPanel full">
					Using a 'iframe' element that had an autopaly feature, the output page now had a rickroll
					that played as soon as a user entered the website.
					<br>
					<img alt="Xss3" src="Content/Xss3.png">
				</div>
			</div>
			<div class ="Section">
				<div class = "headerSection">
				<der>~2020 - The Entire Markiplier Heist Series</der>
				
				</div>
				<div class="readPanel full">
					Using the same 'iframe' trick, someone uploaded all 31 videos in <a src="https://www.youtube.com/playlist?list=PL2fp012QCvpyYpHTLbMeggaR_Jdbknzyj">Markiplier's heist series </a>
					<br>
					<img alt="Xss1" src="Content/Xss3.png">
				</div>
			</div>
			<div class ="Section">
				<div class = "headerSection">
				<der>~2021 - My Little Pony Animated GIF Spam</der>
				
				</div>
				<div class="readPanel full">
					This one was particularly entertaining. By hovering over 'XSS Attack' in the main menu, starshiplad.com becomes covered in <br>
					'My Little Pony' animated gifs. If someone wants to own up, I'd be very interested in how you did it x'D. 
					<br>
					<img alt="Xss4" src="Content/Xss4.png">
				</div>
			</div>
		</div>
	</body>
<header>

