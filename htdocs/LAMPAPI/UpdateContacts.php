<<<<<<< Updated upstream
=======
<<<<<<< HEAD
<?php

	$inData = getRequestInfo();
	$name = $inData["name"];
	$userId = $inData["userId"];
	$contactId = $inData["contactId"];
	$email = $inData["email"];
	$phone = $inData["phone"];

	$conn = new mysqli("localhost", "TheBeast", "WeLoveCOP4331", "contact_manager");
	if ($conn->connect_error)
	{
        	returnWithError($conn->connect_error);
	}

	//check if the name entered is in the contact table
	$stmt = $conn->prepare("SELECT * FROM contact WHERE ID = ? and UserID = ?");
	$stmt->bind_param("ss", $contactId, $userId);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();

	if($row === null)
	{
        	returnWithError("Contact does not exist");
	}

	$stmt->close();

	//Update the contact that we just checked existed
	$stmt = $conn->prepare("UPDATE contact SET Name = ?, Email = ?, Phone = ? WHERE ID = ?");
	$stmt->bind_param("ssss", $name, $email, $phone, $contactId);
	$stmt->execute();
	$updated = $stmt->affected_rows;

	$stmt->close();

	// This line is an unneccessary error.
	// if($updated === 0)
	// {
    //     	returnWithError("Error occured when updating this Contact");
	// }

	//now we need to return the updated info
	$stmt = $conn->prepare("SELECT Name, Email, Phone FROM contact WHERE ID = ?");
	$stmt->bind_param("s", $contactId);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();
	$info = '{"ID": "' . $row["ID"] . '", "name": "' . $row["Name"] . '", "phone": "' . $row["Phone"]  . '", "email": "' . $row["Email"] . '"}';

	$stmt->close();
	$conn->close();
	returnWithInfo($info);

	function getRequestInfo()
	{
        	return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson($obj)
	{
        	header('Content-type: application/json');
        	echo $obj;
	}

	function returnWithError($err)
	{
        	$returnValue = sprintf('{"Error message": "%s"}', $err);
        	sendResultInfoAsJson($returnValue);
        	exit;
	}

	function returnWithInfo($obj)
	{
        	$returnValue = '{"updated info":[' . $obj . '],"error":""}';
        	sendResultInfoAsJson($returnValue);
	}
?>
=======
>>>>>>> Stashed changes
<?php

	$inData = getRequestInfo();
	$name = $inData["name"];
	$userId = $inData["userId"];
	$contactId = $inData["contactId"];
	$email = $inData["email"];
	$phone = $inData["phone"];

	$conn = new mysqli("localhost", "TheBeast", "WeLoveCOP4331", "contact_manager");
	if ($conn->connect_error)
	{
        	returnWithError($conn->connect_error);
	}

	//check if the name entered is in the contact table
	$stmt = $conn->prepare("SELECT * FROM contact WHERE ID = ? and UserID = ?");
	$stmt->bind_param("ss", $contactId, $userId);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();

	if($row === null)
	{
        	returnWithError("Contact does not exist");
	}

	$stmt->close();

	//Update the contact that we just checked existed
	$stmt = $conn->prepare("UPDATE contact SET Name = ?, Email = ?, Phone = ? WHERE ID = ?");
	$stmt->bind_param("ssss", $name, $email, $phone, $contactId);
	$stmt->execute();
	$updated = $stmt->affected_rows;

	$stmt->close();

	// This line is an unneccessary error.
	// if($updated === 0)
	// {
    //     	returnWithError("Error occured when updating this Contact");
	// }

	//now we need to return the updated info
	$stmt = $conn->prepare("SELECT Name, Email, Phone FROM contact WHERE ID = ?");
	$stmt->bind_param("s", $contactId);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();
	$info = '{"ID": "' . $row["ID"] . '", "name": "' . $row["Name"] . '", "phone": "' . $row["Phone"]  . '", "email": "' . $row["Email"] . '"}';

	$stmt->close();
	$conn->close();
	returnWithInfo($info);

	function getRequestInfo()
	{
        	return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson($obj)
	{
        	header('Content-type: application/json');
        	echo $obj;
	}

	function returnWithError($err)
	{
        	$returnValue = sprintf('{"Error message": "%s"}', $err);
        	sendResultInfoAsJson($returnValue);
        	exit;
	}

	function returnWithInfo($obj)
	{
        	$returnValue = '{"updated info":[' . $obj . '],"error":""}';
        	sendResultInfoAsJson($returnValue);
	}
?>
<<<<<<< Updated upstream
=======
>>>>>>> bf04c4bbe183a8f45d5b099536b53b5f1b3d744e
>>>>>>> Stashed changes
