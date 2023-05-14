
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php
	include "nuHeader.php";
?>

<div id="main">
	<div class ="Section">
		<div class = "headerSection">
		<der>React Tic Tac Toe</der>
		
		</div>
		<div class="readPanel full">
			<der>React</der><br>
			This is my tic Tac Toe App in React.js
		</div>
	</div>	
	<div class ="Section">
		<div class = "headerSection">
		<der>The App</der>
		
		</div>
		<div class="readPanel full">
			<div id="app"> </div>
		</div>
	</div>
</div>


 <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script> 
 <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/JSXTransformer.js"></script>
  <!-- Load our React component. -->
  <script src="app.js" type="text/jsx"></script>
</body>

</html>