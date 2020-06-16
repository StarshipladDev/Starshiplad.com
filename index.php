
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--Import header via php-->
<?php
	include "nuHeader.php";
?>

<div id="main">
	<div class ="Section">
		<div class = "headerSection">
		<der>Introduction</der>
		
		</div>
		<div class="readPanel half">
			<der>Welcome!</der><br>
			Welcome to Starshiplad.com! This webpage is designed primarily to show off CSS, PHP,SQL and HTML design and code learning that I do while developing
			projects throughout the year. You can check out my <a href="https://github.com/StarshipladDev">github </a> for more info.<br> 
			This front page is to guide users through the website. To input data into a database stored on the server go to the "Input data" tab, where unimportant details
			can be entered into a database's SQL table called "importantThings". This data will be password protected, but accessible via my <a href="https://github.com/StarshipladDev/Hack-Tool">hack tool </a> I developed.
		</div>
		<div class="readPanel half">
			<der>Hi Twitter </der><br>
			If you came to check the website out from my twitter, thank you very much! Any ideas for stuff I should try to learn to code or any advice, don't hesitate to 
			DM me! Always cool to talk to other programmers out there :)
			<br>
			<div class="twitter-feed">
				<a class="twitter-timeline"  data-height="500" data-width="330" data-theme="dark" href="https://twitter.com/StarshipladDevp">Tweets by StarshipladDevp</a>
			</div>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8">

			</script>
			

		</div>
	</div>	
	<div class ="Section">
		<div class = "headerSection">
		<der>Using The Hack Tool</der>
		
		</div>
		<div class="readPanel full">
			<der>Important Info Search </der><br>
			The <a href="http://www.starshiplad.com/search.php">'Search Names' </a> tab can be used to search the database created with 'input info. This will return a table of matching 
			data entries. It is also the primary penetration point with my hack tool
			<br><br>Filler text to fill up the last panel to see how good it looks<p>
		</div>
	</div>
	<div class ="Section">
		<div class = "headerSection">
		<der>Sales Pitch</der>
		
		</div>
		<div class="readPanel half">
		<der>Contact </der><br>
		<!--I am a practically driven, group-oriented computer science major looking to further develop my technical skills in a professional capacity. 
		#I have a record of striving to understand more complex aspects of the roles I have undertaken, and the skills required to succeed in the other positions within an organization's system. I take pride in knowing how my work affects the big picture and tailoring my efforts based on this.
		#My ideal position would be a role that allows me to achieve practical solutions to open ended problems with technical skills, by being able to co-design solutions with other members of the organization. An environment of open communication that allows the learning and development of further skills would be my preferred setting.
		-->
		Send me a message through the below form to get in contact about anything!
		<form action="email.php" method="post">

		Message: <textarea id="InputText" rows="3" cols="40" name="Message"></textarea><br>
		Name: <input type="text" name="Name"><br>

		<input type="submit">
		</form>
		</div>


		<div class="readPanel half">
			<der>Current Projects </der><br>
			I am constantly finding new programming solutions to try out. <br>
			If there are any cool ideas you'd like to see tried out, feel free to message me with the contact box above.<br>
			Current projects include:<br>
			<a href="https://github.com/StarshipladDev/FiveMoveMurder">A C#/SQL RPG Managment Tool </a><br>
			<a href="https://Starshiplad.com/AirAToB.php">A javascript / Google API /PHP Mapping Website </a><br>
			<a href="https://github.com/StarshipladDev/MTGHealthCounter">A Java/XML Android companion app for MTG</a><br>
			<a href="https://github.com/StarshipladDev/LIC">A javascript/HTML Google Chrome Extension</a><br>
			<a href="https://github.com/StarshipladDev/Hack-Tool">A .NET / MySQL database and automated SQLi tool to interact with it</a><br>
			
		</div>
	</div>
	<div class ="Section">
		<div class = "headerSection">
		<der>Introduction</der>
		
		</div>
		<div class="readPanel full">
		<der>Planned Future Projects </der><br>
		I'm hoping to do get the following projects up on my Github:<br>
		<ul>
		<li>More professional documentation for current projects</li>
		<li>A simple MTG life counter android app  <i>Currenty in progress , the APK can be downloaded <a href="https://Starshiplad.com/MTGApp.apk"> here </a> </i></li>
		<li>An openGL card Game <i>Currenty in progress, see <a href="https://Starshiplad.com/openGL.php"   >https://Starshiplad.com/openGL.php </a></i></li>
		<li>A Angular.js applet</li>
		<li>More design-oriented C# froms/WPF <i>Currenty in progress </i></li>
		</ul>
		</div>

	</div>
</div>


<script>
	 jQuery('.twitter-feed').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {
  //function call to override the base twitter styles
  customizeTweetMedia();
 });

 var customizeTweetMedia = function() {

  //overrides font styles and removes the profile picture and media from twitter feed
  jQuery('.twitter-feed').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('font-szie', '12px');
  alert("changed!");
  //also call the function on dynamic updates in addition to page load
  jQuery('.twitter-feed').find('.twitter-timeline').contents().find('.timeline-TweetList').bind('DOMSubtreeModified propertychange', function() {});
	}
	</script>
</body>

</html>