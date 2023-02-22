<?php
include 'connect.php';
include ("allcalc.php");

$data = 'nothing';
header('Content-Type: application/json');
$from = $_GET['from'];
$amt = $_GET['amount'];
$to = $_GET['to'];
$key = $_GET['api_key'];
$too = 'to' . $to;

if (!isset($key))
{
	$error = ('{
	"response": "error",
	"error": "Missing api key. Append it to the url and try again",
	"help_msg": "An example would be lengthapi.win/convert.php?api-key={YOUR_API_KEY_GOES_HERE}&from=Inches&amount=10&to=Centimeters", 
	"requests_left": "unknown",
	"convert_from": "' . $from . '", 
	"convert_amt": "' . $amt . '", 
	"convert_to": "' . $to . '", 
	"output": "error"
}');
	echo $error;
}
else
{
	if (checkKey($key))
	{
		
		if(!getReqCountFromKey($key))
		{
				$error = ('{
	"response": "error",
	"error": "No more requests allowed ",
	"help_msg": "You have used up all your requests",  
	"requests_left": "0",
	"convert_from": "' . $from . '", 
	"convert_amt": "' . $amt . '", 
	"convert_to": "' . $to . '", 
	"output": "error"
}');
	echo $error;
			
		}
		else
		{
			
		
		
			if (!$value = @call_user_func(array(
				$from,
				$too
			) , $amt))
			{
		$error = ('{        
	"response": "error",
	"error": "Invalid input. Check the URL to make sure that the parameters are formatted correctly, and the units are capitalized.",
	"help_msg": "An example would be lengthapi.win/convert.php?from=Inches&amount=10&to=Centimeters. More help at lengthapi.win/errors.php", 
	"requests_left": "unknown",	
	"convert_from": "' . $from . '", 
	"convert_amt": "' . $amt . '", 
	"convert_to": "' . $to . '", 
	"output": "error"
}');
				echo $error;
			}
			else
			{
				oneReqGone($key);
		$data = ('{
	"response": "success",
	"error": "None",
	"help_msg": "None",
	"requests_left": "' . $GLOBALS['REQ'] . '",
	"convert_from": "' . $from . '", 
	"convert_amt": "' . $amt . '", 
	"convert_to": "' . $to . '", 
	"output": "' . $value . '" 
		
}');
				echo ($data);
			}
		}
	}
	else
	{
	$error = ('{        
	"response": "error",
	"error": "Invalid API Key. Check your api key.",
	"help_msg": "To request a new api key go to lengthapi.win/lostapikey.php",
	"requests_left": "unknown",
	"convert_from": "' . $from . '", 
	"convert_amt": "' . $amt . '", 
	"convert_to": "' . $to . '", 
	"output": "error"
}');
             echo $error;
	}
}

?>