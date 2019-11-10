<title> Currency calculator</title>
<script type="text/javascript" src="valid.js"></script>
<script type="text/javascript" src="input.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<div align="center">
<div id="calc">
<h1 align='center'>Currency calculator</h1>

<!-- THE FORM WITH BASE,TARGET AND AMOUNT VALUES -->

<form action='?action=convert' method='post'>                 

	<div style="width:450px;">
	
		<!-- Base Currency -->
		<div style="width:450px;padding-top:10px;">
			<b>Base Currency</b>:
			<select name="currency" id='currency'>					
			<option value="Euro">Euro</option>
			<option value="US Dollar">US Dollar</option>
			<option value="Swiss Franc">Swiss Franc</option>
			<option value="British Pound">British Pound</option>
			<option value="JPY">JPY</option>
			<option value="CAD">CAD</option>
			</select>
		</div>
		
		<!-- Target Currency -->
		<div style="width:450px;padding-top:10px;">
			<b>Target Currency</b>:
			<select name="currencyto" id='currencyto'>
			<option value="Euro">Euro</option>
			<option value="US Dollar" selected>US Dollar</option>
			<option value="Swiss Franc">Swiss Franc</option>
			<option value="British Pound">British Pound</option>
			<option value="JPY">JPY</option>
			<option value="CAD">CAD</option>
			</select>
		</div>
		
		<!-- Amount -->
		<div style="width:450px;padding-top:10px;">
			<b>Enter Amount</b>:<input type='text' name='amount' id='amount' onclick="changeColor()">
			<input type='submit' name='submit' value='Convert Now' onclick="isNumeric(document.getElementById('amount'), 'Numbers Only Please')">
			
		</div>	
	</div>

</form>

<?php
$curTo = '';							
if(isset($_POST['submit'])){				//CHECK IF FORM SUBMITTED	
	$curTo =($_POST['currencyto']);	
}
require 'convert.php';
?></div></div>	