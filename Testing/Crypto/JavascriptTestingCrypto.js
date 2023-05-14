<<<<<<< HEAD
=======
<<<<<<< HEAD

>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85

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

<<<<<<< HEAD
Format 000000(6)[Index]000000(6)[hashCount]00000000(20)[Username]000000(6)[Instruction]00000000(20)[Username]
-A command is 58 characters
*/
function Write( message , tag="Default"){
	var print = false;
	if(print || tag=="Default" || tag=="Block->HashFunction"){
		var date = new Date();
		console.log( date.getUTCHours() + ":" + date.getUTCMinutes() + ":" + date.getUTCSeconds() + ":" + date.getUTCMilliseconds() + "->"+tag+"->"+message);

	}
}

function HashString(input){
=======

*/
function Write(message,tag="default"){
	var date = new Date();
	console.log(date.getUTCHours()+":"+date.getUTCMinutes()+":"+date.getUTCSeconds()+":"+date.getUTCMilliseconds()+"->"+tag+"->"+message);
}

function HashString(input){
	
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	var s = input.split('');
	var returnString="";
	for(var i=0 ;i<s.length;i++){
		returnString+=HashEquation(s[i].charCodeAt(0)-32);
	}
	if(returnString==""){
		returnString  = " ";
	}
<<<<<<< HEAD
=======
	Write("HH--"+returnString+"--");
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	return returnString;
	
}

function HashEquation(inputKey,times=3){
	var tag= "HashEquation"
	Write("\n inputKey is "+inputKey+"("+String.fromCharCode(inputKey+32)+")"+" times is "+times,"HashEquation");
	var mod=92;
	
	Write("Pre hash inputKey is "+inputKey,"HashEquation");
	var inp = inputKey;
	inputKey= inputKey*times+24+7-6;
	var rounds=   Math.floor(inputKey/mod);
	if(rounds>9){
		rounds=(String.fromCharCode((rounds%mod)+32));
		if(rounds=='<'){
		Write("since rounds code is <, swapping < for "+ String.fromCharCode(parseInt(93) +32) ,tag);
		rounds = String.fromCharCode(32+93);
		}
		if(rounds=='>'){
			Write("since rounds code is >, swapping > for "+ String.fromCharCode(parseInt(94) +32),tag );
			rounds = String.fromCharCode(32+94);
		}
	}
	Write("After hash inputKey is "+inputKey+" & rounds are "+rounds+". inputKey %"+mod+" is "+(inputKey%mod),"HashEquation");
	var letterCode=inputKey % mod;
	Write("rounds/letterCode was "+rounds +"/" +letterCode,"HashEquation");
	if(letterCode<10){
		letterCode="0"+letterCode;
	}
	if(letterCode==28){
		Write("since letter code is <, swapping < for "+ String.fromCharCode(parseInt(93) +32) ,tag);
		letterCode = 93;
	}
	if(letterCode==30){
		Write("since letter code is >, swapping > for "+ String.fromCharCode(parseInt(94) +32),tag );
		letterCode = 94;
	}
	letterCode=String.fromCharCode(parseInt(letterCode) +32);
	
	Write("rounds/letterCode is "+rounds +"/" +letterCode,"HashEquation");
	return ""+rounds+letterCode;
	
}


function Unhash(input){
	var s = input.split('');
	var returnString="";
	for(var i=0 ;i<s.length-1;i+=2){
		returnString+=UnHashEquation(s[i]+s[i+1]);
		Write("UnhashedString is "+returnString.charAt(i)+" the end of "+returnString,"UnHashOverall");
	}
<<<<<<< HEAD
=======
	Write("UH|"+returnString+"|");
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	return returnString;
}
function UnHashEquation(inputKey,mod=92){
	var tag="UnHashEquation";
<<<<<<< HEAD
	Write("\n inputKey is "+inputKey,"unHashEquation");
=======
	Write("\n inputKey is "+inputKey);
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	var rounds = inputKey.split("")[0];
	var number = inputKey.split("")[1].charCodeAt(0) -32;
	if(number==93){
		number="<".charCodeAt(0) -32;
		Write("Since number = "+String.fromCharCode(93+32)+" changing number to <",tag);
	}
	if(number==94){
		Write("Since number = "+String.fromCharCode(94+32)+" changing number to >",tag);
		number=">".charCodeAt(0) -32;
	}
	Write("Step 0) Number is " +number+" and mod is "+mod+" and rounds are "+rounds,tag);
	number = number + (mod * rounds);
	Write("Step 1) - Add mod*rounds Number is " +number,tag);
	number = number-24-7+6;
	Write("Step 2)-Perform simple Addition Number is " +number,tag);
	number = number/3;
	Write("Step 3)-Divide number by 3 Number is " +number +" /// "+String.fromCharCode(number+32) ,tag);
	if(number=="<".charCodeAt(0) -32){
		Write("Changed nubmer as it is <",tag);
		number=93;
	}
	if(number==">".charCodeAt(0) -32){
			Write("Changed nubmer as it is >",tag);
		number=94;
	}
	
	return String.fromCharCode(32+(number));
	
}

function GetPublicUsernameButton(){
	
	var username = document.getElementById('inputTextUsername').value;
	var password = document.getElementById("inputTextPassword").value;
	document.getElementById('publicUsernameDisplay').innerHTML=GetPublicUsername(password,username);
}

function GetPublicUsername(password,username){
	var tag="GetPublicUserName()";
	var mod=0;
	var publicUsername = "";
	var tempUserName ="          ".split(""); //10 char
	for(var i=0 ; i< password.length;i++){
		mod+=password.charCodeAt(0);
	}
	
	Write("temp username and user name are now "+tempUserName +" & "+username,tag);
	for(var f=0; f<tempUserName.length;f++){
		if(f<username.length){
			tempUserName[f]=String.fromCharCode(username.charCodeAt(f));
		}
		//Write("temp username and user name are now "+tempUserName +" & "+username,tag);

	}
	for(var f=tempUserName.length; f<username.length-tempUserName.length;f++){
		tempUserName[f%tempUserName.length]=String.fromCharCode((((username.charCodeAt(f%tempUserName.length)+username.charCodeAt(f))/2)+32)%95);
		
			//Write("temp username and user name are now "+tempUserName +" & "+username,tag);

	}
	username=tempUserName.join("");
	Write("temp username and user name are now "+tempUserName +" & "+username,tag);

	for(var i=0 ;i<username.length;i++){
		publicUsername+=HashEquation(username[i].charCodeAt(0)-32,mod);
	}
	Write("post Hash Username is "+publicUsername,tag);
	for(var i=0; i< publicUsername.length;i++){
		Write("Key is "+publicUsername.charAt(i)+" // "+publicUsername.charCodeAt(i),tag);
	}
	Write("PublicUsername is "+publicUsername,tag);
	return publicUsername;
}



function AddTransactionButton(){
	var to = document.getElementById('inputTextTo').value;
	var ammount = document.getElementById('inputTextAmmount').value;
	var username = document.getElementById('inputTextUsername').value;
	var password = document.getElementById("inputTextPassword").value;
	if(to.length!=20){
		document.getElementById("title").innerHTML="'To' must be 20 characers long";
	}
	else{
		AddTransaction(to,ammount,username,password);
	}
	
}
function AddTransaction(to,ammount,username,password){
	var username = document.getElementById('inputTextUsername').value;
	var password = document.getElementById("inputTextPassword").value;
	var pubUsername=GetPublicUsername(password,username);
	var id= parseInt(document.getElementById('indexHidden').innerHTML);
	var date = new Date();
	var day = date.getUTCDay();
	if(day<10){
		day="0"+day;
	}
	var month =date.getUTCMonth();
	if(month<10){
		month="0"+month;
	}
	var timeStamp = day+"/"+month+"/"+date.getUTCFullYear();
	var priorHash = document.getElementById('dataHidden').innerHTML;
	var data = pubUsername+"Give"+ammount+to;
	
<<<<<<< HEAD
	var newBlock = new Block(id,priorHash,timeStamp,data);
=======
	let newBlock = new Block(id,priorHash,timeStamp,data);
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	document.getElementById('indexHidden').innerHTML = "";
	if(id<9){
		document.getElementById('indexHidden').innerHTML += "0";
	}
	if(id<99){
		document.getElementById('indexHidden').innerHTML += "0";
	}
	document.getElementById('indexHidden').innerHTML +=(id+1);
	document.getElementById('dataHidden').innerHTML = newBlock.hash;
	
}


function hashSample(){
	var input =document.getElementById('inputText').value;
	var output = document.getElementById('outputText').innerHTML;
	Write("hashSampleHit with "+input +" and "+output);
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
		Write("unhashSample with "+input +" and "+output);
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
function ShowCryptoButton(){
	if(parseInt(document.getElementById('indexHidden').innerHTML)>0){
		var title = document.getElementById('title');
		title.style.fontSize="100%";
		title.innerHTML=document.getElementById('dataHidden').innerHTML;
		document.getElementById('unhashedHidden').innerHTML=document.getElementById('indexHidden').innerHTML;
	}
	
}
function UnhashCryptoButton(){
	var title = document.getElementById('title');
	var unhashed;
	var overallCount =parseInt(document.getElementById('indexHidden').innerHTML);
	var unhashedCount =parseInt(document.getElementById('unhashedHidden').innerHTML);
	
	if(unhashedCount>0){
		if(unhashedCount ==overallCount){
			title.innerHTML="";
		}
		var writtenText=document.getElementById('dataHidden').innerHTML;
<<<<<<< HEAD
		//20 per username (x2), 6 per index,6 per hashCount, 10 per timestamp,instruction (6) 58
=======
		//20 per username, 3 per index, 10 per timestamp, give 4 , ammoun 1 58
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
		for(var i=0;i<(overallCount-unhashedCount)+1;i++){
			writtenText=Unhash(writtenText.substr((i)*58))
		}
		title.innerHTML+=((unhashedCount))+")<a style='color:#b30000'> \< Transaction # ||</a>"+writtenText.substr(0,60)+" \< <a style='color:#b30000'> Data Block ||</a>"+writtenText.substr(60)+"<a style='color:#b30000'>|| \< Prior Blocks (Enrypted)</a><br> <br>";
		document.getElementById('unhashedHidden').innerHTML = unhashedCount-1;
	}
}
<<<<<<< HEAD
function AlternativeHash(input){
	var s = input.split('');
	var returnString="";
	for(var i=0 ;i<s.length;i++){
		returnString+=String.fromCharCode((((s[i].charCodeAt(0)-32)+1)%92)+32);
	}
	if(returnString==""){
		returnString  = " ";
	}
	return returnString;
	
}
function AlternativeUnHash(input){
	var s = input.substr(12).split('');
	var returnString="";
	for(var i=0 ;i<s.length;i++){
		returnString+=String.fromCharCode((((s[i].charCodeAt(0)-32)-1)%92)+32);
	}
	if(returnString==""){
		returnString  = " ";
	}
	return returnString;
	
}
function runTest(){
	//Jacob,Jacob m1m_ucI{qa0909090909
	// Oscar / Oscar  2&pZ+v#@l?0909090909
	document.getElementById("test").innerHTML="Check Browser Console";
	document.getElementById("test").style.color="red";
	var block1 = new Block(0,'',"24/02/2021","0SystemSystemSystem0"+"give03"+"2&pZ+v#@l?0909090909");
	Write("Made Block 1");
	Write("Block1 has the following data:" +block1.ToString());

	Write("----------------------");

	var block2 = new Block(1,block1.hash,"24/02/2021","2&pZ+v#@l?0909090909"+"give03"+"m1m_ucI{qa0909090909");
	Write("Made Block 2");
	Write("Block2 has the following data:" +block2.ToString());
=======

function runTest(){
	document.getElementById("test").innerHTML="Check Browser Console";
	document.getElementById("test").style.color="red";
	var block1 = new Block(0,'',"24/02/2021","give 3");
	Write("Made Block 1");
	Write("Block1 has the following data" +block1.index+" "+block1.timeStamp+" "+block1.data+" "+block1.priorHash);
	Write("Block1 has hash "+block1.hash);
	Write("Block1 unhashed is  "+ Unhash(block1.hash));

	Write("----------------------");

	var block2 = new Block(1,block1.hash,"24/02/2021","give 10");
	Write("Made Block 2");
	Write("Block2 has the following data" +block2.index+" "+block2.timeStamp+" "+block2.data+" "+block2.priorHash);
	Write("Block2 has priorhash "+block2.priorHash);
	Write("Block2 has hash "+block2.hash);
	Write("Block2 has unhashed hash value of  "+Unhash(block2.hash));
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
	
Write("Block2's prior block has an unhash of "+Unhash(block2.priorHash));
}

for(var i=0; i<96;i++){
	Write("Character "+i+"("+(i+32)+")"+ " is "+String.fromCharCode(i+32));
}
Write("Starting");
hashSample();

class Block{
<<<<<<< HEAD
	constructor(index,priorHash,timeStamp,data,onesNeeded=0,hashCount=0){
		this.index=index.toString().padStart(6, "0");
=======
	constructor(index,priorHash,timeStamp,data,onesNeeded=0){
		this.index=index;
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
		this.priorHash=priorHash;
		this.timeStamp=timeStamp;
		this.onesNeeded=onesNeeded;
		this.data=data;
<<<<<<< HEAD
		this.hashCount=hashCount.toString().padStart(6, "0");
		this.hash=this.HashFunction(this.index,this.hashCount,this.timeStamp,this.data,this.priorHash,this.onesNeeded);
		
	}
	HashFunction(index,timestamp,data,priorHash,onesNeeded=0){
		var tag="Block->HashFunction";
		var count = parseInt(this.hashCount);
		Write("Starting with index "+index);
		count++;
		var attemptedHash=AlternativeHash(data+priorHash);
		while( ! (count.toString()).includes("6") || ! (count.toString()).includes("9") ){
			//Write("looping.\n HashCount is :"+this.hashCount +"\n attemptedHash length is :"+attemptedHash.length+" \n input Hash is :"+attemptedHash,tag);
			count++;
			attemptedHash=AlternativeHash(attemptedHash);
			
		}
		this.hashCount = count.toString().padStart(6, "0");
		var fullReturn=HashString(index+this.hashCount+timestamp+attemptedHash);
		Write("HH--"+fullReturn+"--",tag);
		return fullReturn;
	}
	GetHashCount(input){
		return parseInt(Unhash(input).substr(6,6));
	}
	ToString(){
		return  " \n Index:" +this.index+"\n Repeat Hashes:"+this.hashCount+"\n Timestamp :"+this.timeStamp+" \n Data:"+this.data+" \n Prior Hash: "+this.priorHash +"\n Curent Hash:"+this.hash+
				"\n UnHashFunction On Own Hash:"+this.UnHashBlock();
	}
	UnHashBlock(){
		var tag = "Block->UnHash"
		var startBlock=Unhash(this.hash);
		var unhashCount=parseInt(startBlock.substr(6,6));
		unhashCount--;
		Write("Unhash count "+unhashCount);
		var attemptedHash=AlternativeUnHash(startBlock.substr(12));
		while( ! (unhashCount.toString()).includes("6") || ! (unhashCount.toString()).includes("9") ||  unhashCount>0 ){
			//Write("looping.\n HashCount is :"+this.hashCount +"\n attemptedHash length is :"+attemptedHash.length+" \n input Hash is :"+attemptedHash,tag);
			unhashCount--;
			attemptedHash=AlternativeUnHash(startBlock.substr(12));
			Write("Unhash count "+unhashCount+" with attemptedHash"+attemptedHash);
			
		}
		var fullReturn=startBlock.substr(0,22)+attemptedHash;
		Write("UH--"+fullReturn+"--",tag);
		return fullReturn;
	}
}
=======
		this.hash=this.HashFunction(this.index,this.timeStamp,this.data,this.priorHash,this.onesNeeded);
		
	}
	HashFunction(index,timestamp,data,priorHash,onesNeeded=0){
		Write("Starting with index "+index);
		return HashString(index+timestamp+data+priorHash);
	}
}
=======
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
>>>>>>> 245dd29f0106855205e3dcb434ed4e06f8ec0e18
>>>>>>> 00bd7b02a711796abada03ab1e14d9ee62ebdf85
