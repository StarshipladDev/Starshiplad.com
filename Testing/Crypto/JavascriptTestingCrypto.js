/*
Let's say the limit is 6.
A =1, B=2, C=3, D=4, E=5 , F=6
After Hash function, it mods each Letter into a double letter.
The first letter is a numerical representation of how many times mods the hash function did.
E.G- 
hashing 'A' above if the hash function added Value +3:
A -> Hashfunction -> 0E
The '0' is due to A('1') + A('1')+3 is 5 ('E'),thus not hitting the end of the possible answers (A - E)

Now compare to if we hash the letter 'E':
E -> Hashfunction -> 2F
The '2' is due to the hasFunction looping through the possible answers twice

To unhash  : (Total Number (First digit * value of second digit)  - equations additions )/(multiplications);


*/

function HashEquation(inputKey,mod=95){
	//console.log("inputKey is "+inputKey);
	inputKey= inputKey*3+24+7-6;
	var rounds=   Math.floor(inputKey/mod);
	var letterCode=inputKey % mod;
	//console.log("rounds/letterCode was "+rounds +"/" +letterCode);
	if(letterCode<10){
		letterCode="0"+letterCode;
	}
	letterCode=String.fromCharCode(letterCode +32);

	//console.log("rounds/letterCode is "+rounds +"/" +letterCode);
	return ""+rounds+letterCode;
	
}

function UnHashEquation(inputKey,mod=95){
	//console.log("inputKey is "+inputKey);
	var rounds = inputKey.split("")[0];
	var number = inputKey.split("")[1].charCodeAt(0) -32;
	//console.log("Step 0) Number is " +number+" and mod is "+mod+" and rounds are "+rounds);
	number = number + (mod * rounds);
	
	//console.log("Step 1) Number is " +number);
	number = number-24-7+6;
	//console.log("Step 2) Number is " +number);
	number = number/3;
	//console.log("Step 3) Number is " +number);
	return String.fromCharCode(32+(number%95));
	
}

function HashString(input){
	
	var s = input.split('');
	var returnString="";
	for(var i=0 ;i<s.length;i++){
		returnString+=HashEquation(s[i].charCodeAt(0)-32);
	}
	if(returnString==""){
		returnString  = " ";
	}
	console.log("HH--"+returnString+"--");
	return returnString;
	
}
function Unhash(input){
	var s = input.split('');
	var returnString="";
	for(var i=0 ;i<s.length-1;i+=2){
		returnString+=UnHashEquation(s[i]+s[i+1]);
	}
	console.log("UH|"+returnString+"|");
	return returnString;
}

function hashSample(){
	var input =document.getElementById('inputText').value;
	var output = document.getElementById('outputText').innerHTML;
	console.log("hashSampleHit with "+input +" and "+output);
	if(output != null && input != null){
		document.getElementById('outputText').innerHTML=HashString(input);
	}
	else{
		document.getElementById('outputText').innerHTML=" ";

	}
	
}
function unhashSample(){
	try{
		var input =document.getElementById('inputTextUnhash').value;
		var output = document.getElementById('outputTextUnhash').innerHTML;
		console.log("unhashSample with "+input +" and "+output);
		if(output != null && input != null){
			var outputText = Unhash(input);
			
			document.getElementById('outputTextUnhash').innerHTML=outputText;
			if(outputText==null || outputText.charCodeAt(0)>(95+32) || outputText.charCodeAt(0)<(32)){
				document.getElementById('outputTextUnhash').innerHTML="Bad Hash";
			}

		}
	}
	catch(er){
		document.getElementById('outputTextUnhash').innerHTML="Bad Hash";
	}
	
	
	
}
class Block{
	constructor(index,priorHash,timeStamp,data,onesNeeded){
		this.index=index;
		this.priorHash=priorHash;
		this.timeStamp=timeStamp;
		this.onesNeeded=0;
		this.data=data;
		this.hash=this.HashFunction(this.index,this.timeStamp,this.data,this.priorHash,this.onesNeeded);
		
	}
	HashFunction(index,timestamp,data,priorHash){
		console.log("Starting with index "+index);
		return HashString(index+timestamp+data+priorHash);
	}
	AddTrasaction(username,password,target){
		
		
	}
}
for(var i=0; i<94;i++){
	//console.log("Character "+i+" is "+String.fromCharCode(i+32));
}

console.log("Starting");

function runTest(){
	document.getElementById("test").innerHTML="Check Browser Console";
	document.getElementById("test").style.color="red";
	var block1 = new Block(0,'',"24/02/2021","give 3");
	console.log("Made Block 1");
	console.log("Block1 has the following data" +block1.index+" "+block1.timeStamp+" "+block1.data+" "+block1.priorHash);
	console.log("Block1 has hash "+block1.hash);
	console.log("Block1 unhashed is  "+ Unhash(block1.hash));

	console.log("----------------------");

	var block2 = new Block(1,block1.hash,"24/02/2021","give 10");
	console.log("Made Block 2");
	console.log("Block2 has the following data" +block2.index+" "+block2.timeStamp+" "+block2.data+" "+block2.priorHash);
	console.log("Block2 has priorhash "+block2.priorHash);
	console.log("Block2 has hash "+block2.hash);
	console.log("Block2 has unhashed hash value of  "+Unhash(block2.hash));
	console.log("Block2's prior block has an unhash of "+Unhash(block2.priorHash));
}

hashSample();