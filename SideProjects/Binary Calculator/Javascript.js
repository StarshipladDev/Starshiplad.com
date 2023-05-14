//START SECTION ADD VALUES TO RES
/**
* AddtoRes1 is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoRes1 adds a visible '1' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoRes1(){
    document.getElementById("res").innerHTML= document.getElementById("res").innerHTML +"1";
    
}
/**
* AddtoRes0 is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoRes0 adds a visible '0' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoRes0(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"0";
    
}

/**
* AddtoResMinus is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoResMinus adds a visible '-' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoResMinus(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"-";
    
}
/**
* AddtoResMinus is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoResMinus adds a visible '-' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoResPlus(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"+";
}
/**
*RemoveRes clears the 'es' element of all values contained in it.
*/
function RemoveRes(){
    document.getElementById("res").innerHTML="";
}
/**
* AddtoResMultiply is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoResMultiply adds a visible 'X' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoResMultiply(){
        document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"X";

}
/**
* AddtoResDivide is a function called on an elements 'onclick' event Therefore, parameters cannot easily be passed and individual methods are used for each digit.
AddtoResDivide adds a visible '/' text to the 'res' element , which is built up as string before being parsed into a calculation by 'PerformOperation'
*/
function AddtoResDivide(){
        document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"/";

}
//END SECTION ADD VALUES TO RES
//START SECTION RES READER
/**
*PerformOperation is a parser-type function that converts the text in the 'res' element into a binary calculation. There are four seperate binary calculation functions
in the code base, and PerformOperation will chose the right one with the right inputs based on which operator sign is used. More than one operator or an invalid character will
cause an error message to be displayed and no calculations to take place.
*/
function PerformOperation(){
    var inputString = document.getElementById("res").innerHTML;
    var operand = "None";
    var i=0;
    var operandIndex=0;
    var operandFound=0;
    for(i=0; i< inputString.length;i++){
        if(inputString[i]!= '0' && inputString[i]!= '1' && i!=inputString.length-1){
            operand=inputString[i];
            operandFound++;
            if(operandFound==2){
                console.log("Too many operands!!");
                RemoveRes();
                document.getElementById("res").innerHTML = "Too many operands!";
                break;
            }
            operandIndex=i;
            console.log("operand is "+operand);
        }
    }
    if(operandFound>1){
        RemoveRes();
		document.getElementById("res").innerHTML = "Too many operands or bad characters!";
        return;
    }
    else{
        switch(operand){
        case "None":
            break;
        case "+":
            PerformAddition(inputString.substring(0,operandIndex),inputString.substring(operandIndex+1));
            break;
        case "-":
        PerformSubtraction(inputString.substring(0,operandIndex),inputString.substring(operandIndex+1));
                break;
        
        case "X":
        PerformMultiplication(inputString.substring(0,operandIndex),inputString.substring(operandIndex+1));
                break;
        case "/":
        PerformDivision(inputString.substring(0,operandIndex),inputString.substring(operandIndex+1));
                break;
        default:
                document.getElementById("res").innerHTML = "Incorrect operand!"
            
    }
    }
    
}
//END SECTION RESREADER
//START SECTION UTILITY FUNCTIONS
/**
* TrimZeros is a utility function that take a string input and removes any trailing zeroes in the string.
* Param input -> The string of binary characters to be trimmed.
* Returns -> TrimZeros returns the input without any trailing zeros.
* Example -> '0001001' (9) can be written as '1001' (9). The trailign zeros need to be removed to do so.
*/
function TrimZeros(input){
    console.log("got "+input+" to trim");
    input=input.substring(input.indexOf('1'));
    
    if(input.length==0 || input.indexOf('0')==0){
        input= "0";
    }
    console.log("Returning trimmed "+input);
    return input;
}
/**
* Spin rotates a given string. This is used to count up (left to right ) on a bianry string where the lowest value bit would be on the right initally.
* Param input -> The string to be revered.
* Returns -> The reversed String.
*/
function Spin(input){
    var inputArray = input.split("");
    var reversedArray = inputArray.reverse();
    return reversedArray.join("");
}
function TrailingZeroes(input,numberOfZero){
    for(var i=0; i< numberOfZero;i++){
        input="0"+input;
    }
    return input;
}
/**
*
*ConvertBinaryToInt take a binary String, and converts it into an integer value.
* Param binaryString1 - > The string of '1' and '0' characters to be converted. 
* Returns -> The converted int value of the binary string provided.
*NOTE : CANNOT EXCEED 100 DIGITS
*/
function ConvertBinaryToInt(binaryString1){
	var valueback =0;
	var i=0;
	var value=1;
	binaryString1=Spin(binaryString1);
	while(i<binaryString1.length){
		//Break case
        if(i==100){
            break;
        }
        if(binaryString1.charAt(i)=='1'){
			console.log("While converting, 1 found at position "+i+ ", adding "+value);
            valueback+=value;
			
			value = value*2;
        }
		if(binaryString1.charAt(i)=='0'){
			
			value = value*2;
		}
        i++;
        
    }
	console.log("Conversion returning "+valueback);
	return valueback;
}
/**
* Stlen from https://stackoverflow.com/questions/1431094/how-do-i-replace-a-character-at-a-particular-index-in-javascript 29/11/2020
*/
String.prototype.replaceAt = function(index, replacement) {
    return this.substr(0, index) + replacement + this.substr(index + replacement.length);
}
/**
*
*ConvertIntToBinary is a utility function that takes any positive int and returns the binary representation.
* Param input -> The int value to be converted.
* Returns -> The converted int value of input
*/
function ConvertIntToBinary(input){
	console.log("converting "+input);
	if(input<0){
		return "0";
	}
	var i=0;
	var value =1;
	var outputString="";
	//break case
	while(value<input){
		outputString+='0';
		console.log("value is "+value+", less than "+input);
		value = value*2;
		i++;
	}
	while(i>-1){
		console.log("input "+input+" and value  "+value);
		if(input>=value ){
			console.log("input "+input+" had "+value+" minused from it");
			input-=value;
			outputString=outputString.replaceAt(i,"1");
			console.log("input is now "+input+" and , outputstring is now "+outputString);
			
		}
		value=value/2;
		i--;
	}
	return Spin(outputString);
}
//END SECTION UTILITY FUNCTIONS	



			/// !!!!NOTE!!!!

			/*  PERFORMADDITION USES A DIFFERENT FORMAT TO ADD NUMBERS. THIS HAS BEEN KEPT TO SHOW PROGRESS OF DEVELOPMENT AND ALGORITHIMS */

			/// !!!!NOTE!!!


//START SECTION  DIVISION
/**
* PerformDivision converts two binary-representation strings into ints, divides them, and then displays the output in a binary format in the 'res' element.
* Param input1 - the dividend of the equation. What is to the left of the '/' operator.
* Param input 2 - the divisor , what is to the right of the '/' operator.
*/
function PerformDivision(input1 ,input2){
    document.getElementById("res").innerHTML ="DIVIDING "+input1+" and "+input2;
    var i=0;
    var inputNew= [""];
    /*Add trailigng zeros */
    if(input1.length>input2.length){
        input2=TrailingZeroes(input2,input1.length-input2.length);
    }
    else{
        
        input1=TrailingZeroes(input1,input2.length-input1.length);
    }
    /*END Add trailing zeros */
    var input1value=ConvertBinaryToInt(input1);
    var input2value=ConvertBinaryToInt(input2);
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("divided they are "+(input1value/input2value));
    var outputValue=parseInt(input1value/input2value);
    console.log("divided as an int they are "+outputValue);
	var outputString = ConvertIntToBinary(outputValue);
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;

}
//END SECTION DIVISION

//START SECTION SUBTRACTION
/**
* PerformSubtraction converts two binary-representation strings into ints, subracts on from the other, and then displays the output in a binary format in the 'res' element.
* Param input1 - the value of the equation. What is to the left of the '-' operator.
* Param input 2 - the subtraction , what is to the right of the '-' operator.
*/
function PerformSubtraction(input1 ,input2){
    document.getElementById("res").innerHTML ="SUBTRACTING "+input1+" and "+input2;
    var i=0;
    var inputNew= [""];
    /*Add trailigng zeros */
    if(input1.length>input2.length){
        input2=TrailingZeroes(input2,input1.length-input2.length);
    }
    else{
        
        input1=TrailingZeroes(input1,input2.length-input1.length);
    }
    /*END Add trailing zeros */
    var input1value=ConvertBinaryToInt(input1);
    var input2value=ConvertBinaryToInt(input2);
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("subtracted they are "+(input1value-input2value));
    var outputValue=parseInt(input1value-input2value);
    console.log("subtracted as an int they are "+outputValue);
	var outputString = ConvertIntToBinary(outputValue);
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;


}
//END SECTION SUBRACTION
//START SECTION MULTIPLICATION
/**
* PerformMultiplication converts two binary-representation strings into ints, multiplies them, and then displays the output in a binary format in the 'res' element.
* Param input1 - the value of the equation. What is to the left of the '*' operator.
* Param input 2 - the multiplier , what is to the right of the '*' operator.
*/
function PerformMultiplication(input1 ,input2){
    document.getElementById("res").innerHTML ="MULTIPLYING "+input1+" and "+input2;
    var i=0;
    var inputNew= [""];
    /*Add trailigng zeros */
    if(input1.length>input2.length){
        input2=TrailingZeroes(input2,input1.length-input2.length);
    }
    else{
        
        input1=TrailingZeroes(input1,input2.length-input1.length);
    }
    /*END Add trailing zeros */
    var input1value=ConvertBinaryToInt(input1);
    var input2value=ConvertBinaryToInt(input2);
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("subtracted they are "+(input1value*input2value));
    var outputValue=parseInt(input1value*input2value);
    console.log("subtracted as an int they are "+outputValue);
	var outputString = ConvertIntToBinary(outputValue);
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;
    document.getElementById("res").innerHTML=outputString;


}
//END SECTION MULTIPLICATION

//START SECTION ADDITION
/**
* PerformAddition converts two binary-representation strings into ints, adds them, and then displays the output in a binary format in the 'res' element.
* Param input1 - the first nubmer to add. What is to the left of the '+' operator.
* Param input 2 - The secnd number to add,  what is to the right of the '+' operator.
*/
function PerformAddition(input1 ,input2){
    document.getElementById("res").innerHTML ="Adding "+input1+" and "+input2;
    var i=0;
    var inputNew= [""];
    /*Add trailign zeros */
    if(input1.length>input2.length){
        input2=TrailingZeroes(input2,input1.length-input2.length);
    }
    else{
        
        input1=TrailingZeroes(input1,input2.length-input1.length);
    }
    /*END Add trailing zeros */
    console.log("preswitch: "+input1+" and "+input2);

    input1=Spin(input1);
    input2=Spin(input2);
    console.log("combining "+input1+" and "+input2);
    /* Add both arrays */
    while(i<input1.length && i<input2.length){
        if(i==100){
            break;
        }
        console.log("i is "+i)
        inputNew[i]=parseInt(parseInt(input1[i])+parseInt(input2[i]));
            console.log("combining "+input1[i]+ " and "+input2[i] + " for " +inputNew[i]);
        i++;
    }
    /*END Add both arrays */
    /* Convert array as required */
    i=0;
    while(i<inputNew.length){
        if(i==100){
            break;
        }
        if(inputNew[i]=="2"){
            inputNew[i]="0";
            if(i==inputNew.length-1){
                inputNew[i+1]="1";
            }
            else{
                inputNew[i+1] = parseInt(inputNew[i+1])+1;
            }
        }
        if(inputNew[i]=="3"){
            inputNew[i]="1";
            if(i==inputNew.length-1){
                inputNew[i+1]="1";
            }
            else{
                inputNew[i+1] = parseInt(inputNew[i+1])+1;
            }
        }
        
        i++;
    }
    /*END Convert Array as required */
    inputNew=Spin(inputNew.join(""));
    inputNew=TrimZeros(inputNew);
    document.getElementById("res").innerHTML=inputNew;
}
//END SECTION ADDITION
//START SECTION ADD LISTENERS
document.getElementById("btn1").onclick=AddtoRes1;
document.getElementById("btn0").onclick=AddtoRes0;

document.getElementById("btnMul").onclick=AddtoResMultiply;

document.getElementById("btnDiv").onclick=AddtoResDivide;
document.getElementById("btnSum").onclick=AddtoResPlus;
document.getElementById("btnSub").onclick=AddtoResMinus;
document.getElementById("btnClr").onclick=RemoveRes;
document.getElementById("btnEql").onclick=PerformOperation;
//END SECTION ADD LISTENERS