function isNumeric(elem, helperMsg){
	var numericExpression = /^\d+\.\d+$/;      //check if the number is float
	var numericExpression1 = /^\d+$/;		   //check if the number is integer
	if(elem.value.match(numericExpression)){
		return true;
	}else if(elem.value.match(numericExpression1)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();		
		return false;		
	}
}
