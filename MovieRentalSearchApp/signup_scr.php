<?php
require_once 'include/inc_initialize.php';

if (!empty($_POST)) {
	if ($_POST['submit'] == "submit") {
		$fullname = trim($_POST["fullname"]);
		$email = trim($_POST["email"]);
		$newsletter = 1; //true placeholder
		$alert = 1; //true placeholder

		addMember($fullname, $email, $newsletter, $alert, $db);
		// if($fullname==""){ // check whether name is empty
		// 	echo "<h1>Invalid Name</h1>";
		// 	echo "<a href='signup.php'><button  class='btn btn-secondary'>Go back</button></a>"; 
		// }else if($email==""){ // check whether mail is empty
		// 	echo("Enter Email");
		// }else{
		// 		$mailSplit=explode("@",$email);


		// 	if(sizeof($mailSplit)==2){


		// 		if(strpos($mailSplit[1], '.')){ // check domain has . 
		// 			$domainSplit=explode(".",$mailSplit[1]);
		// 			$last= sizeof($domainSplit);
		// 			$domain=$domainSplit[$last-1 ];

		// 			$name=	str_replace("'","''",$name);
		// 				if($domain=="au"){
		// 					if($domainSplit[$last-2]=="com"){
		// 						addMember($fullname,$email,$db);
		// 					}else{
		// 						echo "<h1>Invalid Email</h1>";
		// 						echo "<a href='signup.php'><button  class='btn btn-secondary'>Go back</button></a>"; 
		// 					}

		// 				}else if($domain=="com"||$domain=="net"){
		// 			addMember($name,$email,$db);
		// 			}else{
		// 				echo "<h1>Invalid Email</h1>";
		// 				echo "<a href='signup.php'><button  class='btn btn-secondary'>Go back</button></a>"; 
		// 			}
		// 		}else{
		// 			echo "<h1>Invalid Email</h1>";
		// 			echo "<a href='signup.php'><button  class='btn btn-secondary'>Go back</button></a>"; 
		// 		}




		// 	}else{
		// 		echo "<h1>Invalid Email</h1>";
		// 		echo "<a href='signup'><button  class='btn btn-secondary'>Go back</button></a>"; 
		// 	}
		// }


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
