



/**
* Desc: makeTable is a function used whenever the roulette table needs to be drawn to the page.
* Author: Starshipladdev 
* Notes: All table elements are drawn to sub-elements (created in this function) that are 
*	appended to a div with the id "main".
*
*
*/
function maketable(){
	debugAlert("Starting Draw Function");
	//START SECTION DRAW GREEN
	document.getElementById("main").innerHTML="";
	var br =document.createElement("div");
	br.style.width="25%";
	br.style.color="white";
	br.id="0";
	br.style.backgroundColor="green";
	br.innerText="0";
	br.style.width="25%";
	br.style.textAlign = "center"; 
	document.getElementById("main").appendChild(br);
	//END SECTION DRAW GREEN
	//START SECTION MAKE 01-36 LOOP
	var i=0;
	br =document.createElement("div");
	br.style.width="25%";
	br.style.backgroundColor="DarkGray";
	for ( i=0; i<36 ; i++){
		var el = document.createElement("el");
		el.style.color="white";
		el.id=(1+i)+"";
		el.style.marginRight="1%";
		//START SECTION DECIDE COLOUR
		if((i%2)==0){
			el.style.backgroundColor="red";
		}
		else{
		   el.style.backgroundColor="black";
		}
		//END SECTION ADD COLOUR
		if(i<9){
			el.innerHTML=(("0")+(i+1));
		}
		else{
			el.innerHTML=(""+(i+1));
		}
		br.appendChild(el);
		if ((i+1)%6==0){
			//Every 6th tile,append 'br' element to main and create a new 'br', on a new line, to add thenext 6 tiles to.
			document.getElementById("main").appendChild(br);
			br =document.createElement("div");
			br.style.backgroundColor="DarkGray";
			br.style.width="25%";
		}
	}
	//END SECTION MAKE 01-36 LOOP


}

/**
* Desc: changeCash is used whenever the 'cash' text element on the page needs to changed by a discreet int.
* Author: Starshipladdev 
* Param 'value' : The int to change the text dispalyed in the 'cash' div by.
* Notes: All checking that 'value' is valid is assumed to have happened before this is called. 
*	This is due to diffrent ways 'value' can be calculated.
*
*
*/
function changeCash(value){
	document.getElementById("cash").innerHTML = parseInt(document.getElementById("cash").innerHTML) +  value;
}

/**
* Desc: debugAlert is a way to keep debug console alerts limited when un-needed, withou having to change code.
* Author: Starshipladdev 
* Param 'message' : The text to be alerted with if 'debug; is true
* Notes: 'message' is  only displayed if the text within the hidden 'debug' div is '1'
*
*
*/
function debugAlert(message){
	if(parseInt(document.getElementById("debug").innerHTML)==1 || document.getElementById("debug").innerHTML.toLowerCase()=="true"){
		alert("Debug: "+message);
	}
}
/**
* Desc: pickNumber is the function called when a ball is needed to be rolled and the table updated as such.
* Author: Starshipladdev 
* Notes: As of 15/12/2020 , all handling of changes to a player's 'cash' are also run from here.
*
*
*/
function pickNumber(){
		if(parseInt(document.getElementById("bet").value) > 0 && parseInt(document.getElementById("bet").value) < parseInt(document.getElementById("cash").innerHTML)){
				var bet = parseInt(document.getElementById("bet").value);
				//Remove Money and roll
				changeCash(-bet);
				debugAlert("Rolling!");
				var pick = document.getElementById("pick");
				debugAlert("Pick is "+pick.value.toLowerCase());
				//Rebuild table, swapping the number the ball landed on for blue
				maketable();
				var num = Math.floor(Math.random() * 37);
				document.getElementById(""+num).style.backgroundColor="blue";
				//START SECTION HANDLE WINNINGS
				//Color handling
				if(num > 0){
					if(pick.value.toLowerCase() === "black" && num%2==0){
						changeCash(bet*2);
					}
					if(pick.value.toLowerCase() === "red" && num%2==1){
						changeCash(bet*2);
					}
				}
				
				else if(parseInt(document.getElementById("pick").value) >= 0 && parseInt(document.getElementById("pick").value) < 37){
					//Direct nubmer handling
					if (parseInt(pick.value)==num){
						changeCash(bet*36);
					}
				}
				
				
				//END SECTION HANDLE WINNINGS
		}
}


//Run code on page load simialr to 'onLoad' property.
addEventListener('load', function(e) {
	maketable();
	debugAlert("Finished Building");
	document.getElementById("buttonboi").onclick=pickNumber;
});