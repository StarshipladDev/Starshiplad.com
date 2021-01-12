<link rel="stylesheet" href="https://www.starshiplad.com/ModularLook.css">
<link rel="icon" type="image/png" href="https://www.starshiplad.com/favicon.png"/>
<meta name="content" content="The Home of Starshiplad">
<Title> "Starshiplad's Home"</Title>
</head>
<body>
<div id="headSpace">
<div id="ZimaBlue">
	<div id="Image">
		<a href= "/index.php">  <img src="/LogoFull.png" alt="Starshiplad.Com" height="128" width="128"></a>
	</div>
<div class="menuitem"><a href="http://www.starshiplad.com/index.php">Home</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/projects.php">Projects</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/input.php">Input Info</a></div>
<div class="hiddenOver menuitem" ><a href="http://www.starshiplad.com/output.php">Output Info</a>
	<div class="hiddenUnder">
		<div class="menuitem"><a href="http://www.starshiplad.com/search.php">Search Names</a> </div> 
		<br>
		<div class="menuitem"><a href="http://www.starshiplad.com/halloffame.php">XSS Hall Of Fame</a> </div>
	</div>
</div>
<div class="menuitem"><a href="http://www.starshiplad.com/proof.php">Hack Proof</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/roleplayinggames.php">RPGs</a></div>


<div class="menuitem" onClick="paint()" style="padding:10px%;"><img src="https://www.starshiplad.com/Content/paint.png" alt="Change CSS"></div>
</div>
<script>
function paint(){
	var oldlink = document.getElementsByTagName("link")[0];
	var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", "https://www.starshiplad.com/ModularLookOrange.css");
    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
}

</script>
</div>