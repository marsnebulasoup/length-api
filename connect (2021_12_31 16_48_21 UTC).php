<?php
function addUser($NAME, $EMAIL, $GUID, $REQUESTS)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "INSERT INTO Data (Name, Email, Guid, Requests)
	VALUES ('".$NAME."', '".$EMAIL."', '".$GUID."','".$REQUESTS."')";


	if ($conn->query($sql) === TRUE) {
		return true;
	} else {
		return false;
	}

	$conn->close();
}

function updateNewKey($EMAIL, $GUID)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "UPDATE Data SET Guid='".$GUID."' WHERE Email='".$EMAIL."'";

	if (mysqli_query($conn, $sql)) {
		return true;
	} else {
		return false;
	}

	$conn->close();
	
}

function getKey($EMAIL)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT Email, Guid FROM Data";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row['Email'] == $EMAIL)
			{
				$GLOBALS['GID'] = $row['Guid'];
				return true;
			}
		}
	} else {
		return false;
	}
	$conn->close();	
	
}

function deleteUser($EMAIL)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// sql to delete a record
	$sql = "DELETE FROM Data WHERE EMAIL='".$EMAIL."'";

	if ($conn->query($sql) === TRUE) {
		return true;
	} else {
		return false;
	}

	$conn->close();
}

function oneReqGone($GUID)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT Guid, Requests FROM Data";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row['Guid'] == $GUID)
			{
				$req = $row['Requests'];
				$req = $req - 1;
				$GLOBALS['REQ'] = $row['Requests'];

			}
		}
	} else {
		return false;
	}
	$sql = "UPDATE Data SET Requests='".$req."' WHERE Guid='".$GUID."'";

	if (mysqli_query($conn, $sql)) {
		return true;
	} else {
		return false;
	}	
	$conn->close();	
}	

function checkKey($GUID)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Guid FROM Data WHERE Guid='".$GUID."'";
	$result = $conn->query($sql);
	$it = $result->fetch_assoc();
	$it = $it['Guid'];
	if ($it == $GUID)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function getGUID()
{
	if (function_exists('com_create_guid'))
	{
		$charid = strtoupper(md5(uniqid(rand() , true)));
		$uuid = chr(123) // ""
		 . substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12) . chr(125); // ""
		return $uuid;
	}
	else
	{
		$charid = strtoupper(md5(uniqid(rand() , true)));
		$uuid = chr(123) // ""
		 . substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12) . chr(125); // ""
		return $uuid;
	}
}

function getReqCount($EMAIL)
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

function getReqCountFromKey($GUID)
{
	$host_name = '';
	$database = '';
	$user_name = '';
	$password = '';
	$conn = mysqli_connect($host_name, $user_name, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT Requests FROM Data WHERE Guid='".$GUID."'";
	$result = $conn->query($sql);
	$thing = $result->fetch_assoc();
	$thing = $thing['Requests'];
	if($thing != '0')
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>
