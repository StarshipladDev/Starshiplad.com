
function AddtoRes1(){
    document.getElementById("res").innerHTML= document.getElementById("res").innerHTML +"1";
    
}

function AddtoRes0(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"0";
    
}
function AddtoResMinus(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"-";
    
}
function AddtoResPlus(){
    document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"+";
}
function RemoveRes(){
    document.getElementById("res").innerHTML="";
}
function AddtoResMultiply(){
        document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"X";

}
function AddtoResDivide(){
        document.getElementById("res").innerHTML=document.getElementById("res").innerHTML+"/";

}
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
                
                console.log("Too many operands!");
                RemoveRes();
                break;
            }
            operandIndex=i;
            console.log("operand is "+operand);
        }
    }
    if(operandFound>1){
        RemoveRes();
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
function TrimZeros(input){
    console.log("got "+input+" to trim");
    input=input.substring(input.indexOf('1'));
    
    if(input.length==0 || input.indexOf('0')==0){
        input= "0";
    }
    console.log("Returning trimmed "+input);
    return input;
}
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
// START DIVISION
/**
*
*
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
    console.log("preswitch: "+input1+" and "+input2);

    input1=Spin(input1);
    input2=Spin(input2);
    console.log("Converting "+input1+" and "+input2);
    /* Combine both arrays */
    var value=1;
    var input1value=0;
    var input2value=0;
    while(i<input1.length && i<input2.length){
        if(i==100){
            break;
        }
        if(input1[i]=="1"){
            input1value+=value;
        }
        if(input2[i]=="1"){
            input2value+=value;
        }
        value = value*2;
        i++;
        
    }
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("divided they are "+(input1value/input2value));
    var outputValue=parseInt(input1value/input2value);
    
    console.log("divided as an int they are "+outputValue);
    var outputString="";
    i=input1.length-1; /* Same as input2 length due to trailing zeros */
    while(i>-1){
        
        value=value/2;
        console.log("outputValue :"+outputValue+" value : "+value+". Performing calc.");
        if(outputValue>=value){
            console.log("outputValue "+outputValue+" is dividing by  "+value);
            outputString+="1";
            outputValue=outputValue/value;
        }else{
            
            console.log("0 added");
            outputString+="0";
        }
        
        console.log("outputValue binary is "+outputString);
        i--;
        
    }
    
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;


}
//END DIVISION

//START SUBTRACTION
function PerformSubtraction(input1 ,input2){
    document.getElementById("res").innerHTML ="combining "+input1+" and "+input2;
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
    console.log("Converting "+input1+" and "+input2);
    /* Combine both arrays */
    var value=1;
    var input1value=0;
    var input2value=0;
    while(i<input1.length && i<input2.length){
        if(i==100){
            break;
        }
        if(input1[i]=="1"){
            input1value+=value;
        }
        if(input2[i]=="1"){
            input2value+=value;
        }
        value = value*2;
        i++;
        
    }
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("Subtracted they are "+(input1value-input2value));
    var outputValue=input1value-input2value;
    var outputString="";
    i=input1.length-1; /* Same as input2 length due to trailing zeros */
    
    while(i>-1){
        
        value=value/2;
        console.log("outputValue :"+outputValue+" value : "+value+". Performing calc.");
        if(outputValue>=value){
            console.log("outputValue "+outputValue+" is minusing "+value+" from it");
            outputString+="1";
            outputValue-=value;
        }else{
            
            console.log("0 added");
            outputString+="0";
        }
        
        console.log("outputValue binary is "+outputString);
        i--;
        
    }
    
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;


}
function PerformMultiplication(input1 ,input2){
    document.getElementById("res").innerHTML ="combining "+input1+" and "+input2;
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
    console.log("Converting "+input1+" and "+input2);
    /* Combine both arrays */
    var value=1;
    var input1value=0;
    var input2value=0;
    while(i<input1.length && i<input2.length){
        if(i==100){
            break;
        }
        if(input1[i]=="1"){
            input1value+=value;
        }
        if(input2[i]=="1"){
            input2value+=value;
        }
        value = value*2;
        i++;
        
    }
    console.log("Converted values are "+input1value+" and "+input2value);
    console.log("multiplied they are "+(input1value*input2value));
    var outputValue=input1value*input2value;
    var outputString="";
    i=0; /* Same as input2 length due to trailing zeros */
    var stop =0;
    
        value= (value*value);
    while(stop==0){
        if(i==100){
            break;
        }
        console.log("outputValue :"+outputValue+" value : "+value+". Performing calc.");
        if(outputValue>=value){
            console.log("outputValue "+outputValue+" is minusing "+value+" from it");
            outputString+="1";
            outputValue-=value;
        }else{
            
            console.log("0 added");
            outputString+="0";
        }
        if(value==1){
            stop=1;
        }
        value=value/2;
        console.log("outputValue binary is "+outputString);
        i++;
        
    }
    outputString=TrimZeros(outputString);
    document.getElementById("res").innerHTML=outputString;


}
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
document.getElementById("btn1").onclick=AddtoRes1;
document.getElementById("btn0").onclick=AddtoRes0;

document.getElementById("btnMul").onclick=AddtoResMultiply;

document.getElementById("btnDiv").onclick=AddtoResDivide;
document.getElementById("btnSum").onclick=AddtoResPlus;
document.getElementById("btnSub").onclick=AddtoResMinus;
document.getElementById("btnClr").onclick=RemoveRes;
document.getElementById("btnEql").onclick=PerformOperation;
