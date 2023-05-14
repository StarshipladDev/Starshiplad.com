<<<<<<< HEAD
<link rel="stylesheet" href="https://www.starshiplad.com/ModularLook.css">
<link rel="icon" type="image/png" href="https://www.starshiplad.com/favicon.png"/>
<meta name="content" content="The Home of Starshiplad">
<Title> "Starshiplad's Home"</Title>
</head>
<body>
<div style="visibility:hidden;" id="colorJam">0</div>
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
	
	console.log("Running changeColor");
	var colorAt = parseInt(document.getElementById("colorJam").innerHTML);
	
	console.log("changeColor Value is "+colorAt);
	
	var oldlink = document.getElementsByTagName("link")[0];
	var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", "https://www.starshiplad.com/ModularLookOrange.css");
    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
	
	// NEW IMPLEMENTATION 2/04/2021
	var readPanel = document.getElementsByClassName("readPanel");
	
	var menuItem = document.getElementsByClassName("menuitem");
	var colors = ["red","blue","purple","green","beige","fuchsia","hotpink","lightpink","lightorange","mediumvioletred"];
	var cc =colors[Math.floor((Math.random() * colors.length))];
	var ccc =colors[Math.floor((Math.random() * colors.length))];
	
	console.log("cc is " +cc +" ccc is "+ccc );
	for(var i =0; i<readPanel.length;i++){
		readPanel[i].style.backgroundColor = cc;
	}
	
	for(var i =0; i<menuItem.length;i++){
		menuItem[i].style.backgroundColor = ccc;
	}
	document.getElementsByTagName("body")[0].style.backgroundColor=ccc;
	colorAt = colorAt+1;
	colorAt = colorAt.toString();
	document.getElementById("colorJam").innerHTML = colorAt;
}

</script>
=======
<link rel="stylesheet" href="https://www.starshiplad.com/ModularLook.css">
<link rel="icon" type="image/png" href="https://www.starshiplad.com/favicon.png"/>
<meta name="content" content="The Home of Starshiplad">
<Title> "Starshiplad's Home"</Title>
</head>
<body>
<div style="visibility:hidden;" id="colorJam">0</div>
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
	
	console.log("Running changeColor");
	var colorAt = parseInt(document.getElementById("colorJam").innerHTML);
	
	console.log("changeColor Value is "+colorAt);
	
	var oldlink = document.getElementsByTagName("link")[0];
	var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", "https://www.starshiplad.com/ModularLookOrange.css");
    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
	
	// NEW IMPLEMENTATION 2/04/2021
	var readPanel = document.getElementsByClassName("readPanel");
	
	var menuItem = document.getElementsByClassName("menuitem");
	var colors = ["red","blue","purple","green","beige","fuchsia","hotpink","lightpink","lightorange","mediumvioletred"];
	var cc =colors[Math.floor((Math.random() * colors.length))];
	var ccc =colors[Math.floor((Math.random() * colors.length))];
	
	console.log("cc is " +cc +" ccc is "+ccc );
	for(var i =0; i<readPanel.length;i++){
		readPanel[i].style.backgroundColor = cc;
	}
	
	for(var i =0; i<menuItem.length;i++){
		menuItem[i].style.backgroundColor = ccc;
	}
	document.getElementsByTagName("body")[0].style.backgroundColor=ccc;
	colorAt = colorAt+1;
	colorAt = colorAt.toString();
	document.getElementById("colorJam").innerHTML = colorAt;
}

</script>
>>>>>>> 389bdf055ecab5d4dc36b1f7aada098678657aa5
</div>