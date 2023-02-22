<?php
include 'layout.php';
include 'connect.php';

function getReqCount2($EMAIL)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Requests FROM Data WHERE Email='".$EMAIL."'";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	$result = $result['Requests'];
	if(isset($result))
	{
		return $result;
	}
	else
	{
		return false;
	}
}

function sendEmail($to,$emaildata)
{

	$subject = 'Your API Key';
	$from = 'no-reply@lengthapi.win';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers.= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	$message = $emaildata;
	if (mail($to, $subject, $message, $headers))
	{

		echo '<h1 align="center" style="padding-top:15%;font-family:Verdana;color:black" >Thank you. Please check your email. Your API key is enclosed.</h1><h3 align="center">If you do not recive an email, check your Spam/Junk folder.</h3>';
		return true;
		
	}
	else
	{

		echo ('<h2 align="center" style="padding-top:15%;font-family:Franklin Gothic Book;color:black" >Unable to send email. Please check your email address. You entered: ' . $to . '</h2>');
		return false;
	}
}


function sendMaill()
{

	if (isset($_POST["name"]) && isset($_POST["email"]))
	{

		$name = $_POST["name"];
		$email = $_POST["email"];
	}

	
	if(getKey($email))
	{
		$resp = getReqCount2($email);

		if($resp === false)
		{
			passthru;
		}
		else
		{
			$numofreq = $resp;
		}		

		$key = $GLOBALS['GID'];
		$emaildata = ('
				<head>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
				</head>
                <h1 style="font-family:Franklin Gothic Book;color:black">Thank you, ' . $name . ' for choosing LengthAPI.win.</h1>
                <h3 style="font-family:Franklin Gothic Book;color:black">We hope you will find our service suitable to your needs.</h3>
                <br />
                <h3 style="font-family:Franklin Gothic Book;color:black">Our records show that you have previously requested an API key from us with this email address.</h3>
                <h3 style="font-family:Franklin Gothic Book;color:black">Here is your API key:</h3>
                <h2 align="center" style="font-family:courier">' . $key . '</h1>
				<h4 style="font-family:Franklin Gothic Book;color:black">You have '.$numofreq.' requests remaining today.</h4>
                <h3 style="font-family:Franklin Gothic Book;color:black">If you would like to request a new API key, go to <a href="lengthapi.win/lostapikey.php">lengthapi.win/lostapikey.php</a></h3>
                <h4 style="font-family:Franklin Gothic Book;color:black">Our api can be accesed at <a href="http://www.lengthapi.win">lengthapi.win</a>. More info at <a href="http://www.lengthapi.win/docs">lengthapi.win/docs</a>.</h4>
                ');
		sendEmail($email,$emaildata);
	}
	else
	{

		$GUID = getGUID();
		
	    
		$emaildata = ('
                <h1 style="font-family:Franklin Gothic Book;color:black">Thank you, ' . $name . ' for choosing LengthAPI.win.</h1>
                <h3 style="font-family:Franklin Gothic Book;color:black">We hope you will find our service suitable to your needs.</h3>
                <br />
                <h3 style="font-family:Franklin Gothic Book;color:black">Here is your API key:</h3>
                <h2 align="center" style="font-family:courier">' . $GUID . '</h1>
                <h4 style="font-family:Franklin Gothic Book;color:black">You have 500 requests remaining today.</h4>
                <h4 style="font-family:Franklin Gothic Book;color:black">Our api can be accesed at <a href="http://www.lengthapi.win">lengthapi.win</a>. More info at <a href="http://www.lengthapi.win/docs">lengthapi.win/docs</a>.</h4>
                ');
		

		if(sendEmail($email,$emaildata))
		{
			addUser($name,$email,$GUID,'500');
			
		}
	}
	
	
}	

function reqnewkey()
{
	if (isset($_POST["name"]) && isset($_POST["email"]))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
	}
	$resp = getReqCount2($email);

	if($resp === false)
	{
		passthru;
	}
	else
	{
		$numofreq = $resp;
	}
	
	$GUID2 = getGUID();  
	

	$emaildata = ('
        <h1 style="font-family:Franklin Gothic Book;color:black">Thank you, ' . $name . ' for choosing LengthAPI.win.</h1>
        <h3 style="font-family:Franklin Gothic Book;color:black">We hope you will find our service suitable to your needs.</h3>
        <br />
        <h3 style="font-family:Franklin Gothic Book;color:black">Here is your API key:</h3>
        <h2 align="center" style="font-family:courier">' . $GUID2 . '</h1>
        <h4 style="font-family:Franklin Gothic Book;color:black">You have '.$numofreq.' requests remaining today.</h4>
        <h4 style="font-family:Franklin Gothic Book;color:black">Our api can be accesed at <a href="http://www.lengthapi.win">lengthapi.win</a>. More info at <a href="http://www.lengthapi.win/docs">lengthapi.win/docs</a>.</h4>
        ');
	if (sendEmail($email,$emaildata))
	{
		if(updateNewKey($email,$GUID2))
		{
			echo '<br><br><h3 align="center" style="font-family:verdana;color:black">Successfully changed key</h3>';
		}
		else
		{
			echo '<br><br><h3 align="center" style="font-family:verdana;color:black">Error changing key. Please try again</h3>';
		}
}
}
function checkCaptcha() 
{
if (isset($_POST["g-recaptcha-response"]))
{
	$resp = $_POST["g-recaptcha-response"];
	$jcode =  file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LfeTGQUAAAAAHLNVzgKi22XST7U7nZcTf3o_kYs&response='.$resp);
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

if (isset($_POST['submit']))
{
	if(checkCaptcha())
	{

		sendMaill();

	}
	
	
}

if (isset($_POST['reqnewkey']))
{
	
	if(checkCaptcha())
	{
		reqnewkey();
	}
	
}	

?>