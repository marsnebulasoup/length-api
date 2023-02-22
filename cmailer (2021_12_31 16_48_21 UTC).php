<?php
include 'layout.php';

$RECAPCHA_SECRET = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

// function chkFrm(){ 

	// $illChar = "FK"; 
	// var doc = document['oFrm']; 

	// if(doc['say'].value.toUpperCase().indexOf(illChar,0) != -1){ 
		// alert(illChar + " is prohibited!"); 
		// return false; 
	// } 
// } 

function sendEmail($to,$emaildata)
{

	$subject = 'Your inquiry';
	$from = 'customersupport@lengthapi.win';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers.= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	$message = $emaildata;
	if (mail($to, $subject, $message, $headers))
	{

		return true;
		
	}
	else
	{
		echo ('<h2 align="center" style="padding-top:15%;font-family:Franklin Gothic Book;" >Please check your email address. You entered: ' . $to . '</h2>');
		return false;
	}
}
function checkCaptcha() 
{
if (isset($_POST["g-recaptcha-response"]))
{
	$resp = $_POST["g-recaptcha-response"];
	$jcode =  file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $RECAPCHA_SECRET . '&response='.$resp);
	$jsonCode = json_decode($jcode, true);
	$jout = $jsonCode['success'];
	if ($jout == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
	

}
}

function doit()
{
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]))
	{

		$name = $_POST["name"];
		$email = $_POST["email"];
		$msg = $_POST["message"];
	}
	$emaildata = ('
	<h1 style="font-family:Franklin Gothic Book;">Thank you, ' . $name . ' for choosing LengthAPI.win.</h1>
    <p style="font-family:Franklin Gothic Book;">We hope you will find our service suitable to your needs.</p>
    <p style="font-family:Franklin Gothic Book;">We are prossesing your request and will get back to you in 3-5 buisness days</p>
    <p style="font-family:Franklin Gothic Book;">Our api can be accesed at <a href="http://www.lengthapi.win">lengthapi.win</a>. More info at <a href="http://www.lengthapi.win/docs">lengthapi.win/docs</a>.</p>
	<p style="font-family:Franklin Gothic Book;">Thanks,<br>Customer Support, customersupport@lengthapi.win<br>Online at <a href="https://www.lengthapi.win/">LengthAPI.win</a><br></p>
	<img src="https://www.lengthapi.win/favicon.ico" alt="LengthAPI" width="100px" height="100px" />

	');
	$other = ('
	<h1 style="font-family:Franklin Gothic Book;">A customer has an inquiry</h1>
	<pre>Name - '.$name.'<br></pre>
	<pre>Email - '.$email.'<br></pre>
	<pre>Message - </pre>
	<pre>'.$msg.'</pre>

	');
	if(sendEmail($email,$emaildata))
	{
		sendEmail('customersupport@lengthapi.win',$other);
		echo '<h1 align="center" style="padding-top:15%;font-family:verdana">Thank you for your inquiry</h1><h3 align="center">If you do not recive an email, check your Spam/Junk folder.</h3>';

	}
}

if (isset($_POST['submit']))
{
	if(checkCaptcha())
	{

		doit();

	}
	
	
}
?>