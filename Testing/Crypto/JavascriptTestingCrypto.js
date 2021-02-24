function HashString(input){
	let s = input.split('');
	
	for(var i=0 ;i<s.length;i++){
		//console.log("Characer code was "+s[i].charCodeAt(0) );

		s[i] = String.fromCharCode(3 + s[i].charCodeAt(0));
	}
	for(var i=0 ;i<s.length;i++){
		s[i] = String.fromCharCode(6 + s[i].charCodeAt(0) );
			//console.log("Character code is now "+s[i].charCodeAt(0) );

	}
	return s.join("");
}
function Unhash(input){
	let s = input.split('');
	
	for(var i=0 ;i<s.length;i++){
				//console.log("Characer code \'"+s[i]+"\' was "+s[i].charCodeAt(0) );

		s[i] = String.fromCharCode(-9 + s[i].charCodeAt(0) );
			//console.log("Character code \'"+s[i]+"\'is now "+s[i].charCodeAt(0) );

	}
	return s.join("");
}
class Block{
	constructor(index,priorHash,timeStamp,data){
		this.index=index;
		this.priorHash=priorHash;
		this.timeStamp=timeStamp;
		this.data=data;
		this.hash=this.HashFunction(this.index,this.timeStamp,this.data,this.priorHash);
		
	}
	HashFunction(index,timestamp,data,priorHash){
		console.log("Starting with index "+index);
		return HashString(index+timestamp+data+priorHash);
	}
}
console.log("Starting");
let block1 = new Block(0,'',"24/02/2021","give 3");
console.log("Made Block 1");
console.log("Block1 has hash "+block1.hash);
console.log("Block1 has the following data" +block1.index+" "+block1.timeStamp+" "+block1.data+" "+block1.priorHash);
let block2 = new Block(1,block1.hash,"24/02/2021","give 10");
console.log("Made Block 2");
console.log("Block2 has the following data" +block2.index+" "+block2.timeStamp+" "+block2.data+" "+block2.priorHash);

console.log("Block2 has priorhash "+block2.priorHash);
console.log("Block2 has hash "+block2.hash);
console.log("AFter unhash that is")
console.log("Block2 has unhashed hash value of  "+Unhash(block2.hash));