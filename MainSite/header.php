<link rel="stylesheet" href="https://www.starshiplad.com/MainSite/ModularLook.css">
<link rel="icon" type="image/png" href="https://www.starshiplad.com/Content/WebElements/favicon.png"/>
<meta name="content" content="The Home of Starshiplad">
<Title> "Starshiplad's Home"</Title>
</head>
<body>
<div id="headSpace">
<div id="ZimaBlue">
	<div id="Image">
		<a href= "/index.php">  <img src="../Content/WebElements/LogoFull.png" alt="Starshiplad.Com" height="128" width="128"></a>
	</div>
<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/index.php">Home</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/projects.php">Projects</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/input.php">Input Info</a></div>
<div class="hiddenOver menuitem" ><a href="http://www.starshiplad.com/MainSite/output.php">Output Info</a>
	<div class="hiddenUnder">
		<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/search.php">Search Names</a> </div> 
		<br>
		<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/halloffame.php">XSS Hall Of Fame</a> </div>
	</div>
</div>
<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/proof.php">Hack Proof</a></div>
<div class="menuitem"><a href="http://www.starshiplad.com/MainSite/roleplayinggames.php">RPGs</a></div>


<div class="menuitem" onClick="paint()" style="padding:10px%;"><img class="menuImage" src="https://www.starshiplad.com/Content/paint.png" alt="Change CSS"></div>
</div>
<script>
function paint(){
	var listOfPossibleColors=["red","blue","orange","green"];
	var twoAxisArrayOfClassNamesToRepaint=[
		["readPanel","menuitem"],
		["hiddenUnder"]
	
	];
	for(var indexOfArray in twoAxisArrayOfClassNamesToRepaint){
		for(var indexOfClassName in twoAxisArrayOfClassNamesToRepaint[indexOfArray]){
			var className = twoAxisArrayOfClassNamesToRepaint[indexOfArray][indexOfClassName];
			var elements = document.getElementsByClassName(className);
			var colorString = listOfPossibleColors[Math.floor(Math.random()*listOfPossibleColors.length)];
			for(var elementIndex in elements){
				if(elements[elementIndex].style != null){
					elements[elementIndex].style.backgroundColor=colorString;
				}
			}
		}
	}
}

</script>
</div>