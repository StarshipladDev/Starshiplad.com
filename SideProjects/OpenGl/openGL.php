<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include "header.php";
		?>
	<script id="vertex" type="x-shader">
	
	<!--Draw points -->
	attribute vec2 aVertexPosition;

	void main() {
		<!--
		top left is -1,-1, bottom right is 1,1
		x,y,depth (>0,1>),a thingy that should always be 1
		-->
		gl_Position = vec4(aVertexPosition, 0.0, 1.0);
	}
	</script>
	<script id="fragment" type="x-shader">
	
		<!-- Set precision -->
		#ifdef GL_ES
			precision highp float;
		#endif
		<!-- set a uniform color for shape , 0-1 not 0-255 -->
		uniform vec4 uColor;
		<!-- Set graphics color to given uniform color -->
		void main() {
			gl_FragColor = uColor;
		}
	</script>	
	<script src="https://Starshiplad.com/cards.js"> </script>
	</head>
	<body onload="runGL()">
		<div id="main">
			<div class="readPanel">
				<canvas id="glCanvas" width="640" height="480"></canvas>
			</div>
		</div>
	</body>
</html>