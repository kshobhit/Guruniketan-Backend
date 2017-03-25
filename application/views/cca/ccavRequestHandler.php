
	<html>
	<head>
	<title> Custom Form Kit </title>
	</head>
	<body>
	<center>

	<?php include('assets/cca/Crypto.php')?>
	<?php 

		error_reporting(0);
		
		$merchant_data='121336';
		$working_key='1CE3DB411145DAFBAF434381B00C21C8';//Shared by CCAVENUES
		$access_code='AVTI68EA79BH53ITHB';//Shared by CCAVENUES
		
		foreach ($_POST as $key => $value){
			$merchant_data.=$key.'='.urlencode($value).'&';
		}

		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

	?>
	<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	<?php
	echo "<input type=hidden name=encRequest value=$encrypted_data>";
	echo "<input type=hidden name=access_code value=$access_code>";
	?>
	</form>
	</center>
	<script language='javascript'>document.redirect.submit();</script>
	</body>
	</html>
	
