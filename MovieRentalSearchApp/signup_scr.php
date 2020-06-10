<?php
require_once 'include/inc_initialize.php';

if (!empty($_POST)) {
	if ($_POST['submit'] == "submit") {
		$fullname = trim($_POST["fullname"]);
		$email = trim($_POST["email"]);
		$newsletter = isset($_POST["newsletter"]) ? 1 : 0;
		$alert = isset($_POST["newsflash"]) ? 1 : 0;

		addMember($fullname, $email, $newsletter, $alert, $db);
		
	}
}


function addMember($fullname, $email, $newsletter, $alert, $conn)
{
	$sql = "INSERT INTO users (name, email, getsNewsletter, getsAlert) VALUES 
	('$fullname', '$email', '$newsletter', '$alert')";
	
	if ($conn->query($sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//	header("Location: allmembers.php");
	header('Refresh: 2; URL =signupdone.php');
}
