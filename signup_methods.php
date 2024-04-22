<?php
require "database.php";

session_start();

if (isset($_POST['execute'])) {
	// Your PHP script code goes here
	#CreateUser();
}


$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password != $password_repeat) {
	$_SESSION['user_created'] = "Passwords are not the same!";

	header("Location: signup.php");
	exit;
}




$username = $_POST['username'];
$email = $_POST['email'];





echo "Username: $username <br>";
echo "Email: $email <br>";
echo "PASSWORD: $password <br>";


CreateUser($username, $email, $password);

function CreateUser($name, $email, $password)
{
	$conn = ConnectToDatabase();

	// Check if the email already exists
	$checkStmt = $conn->prepare("SELECT COUNT(*) AS count FROM user_table WHERE user_email = :email");
	$checkStmt->bindParam(':email', $email);
	$checkStmt->execute();
	$count = $checkStmt->fetch(PDO::FETCH_ASSOC)['count'];

	if ($count > 0) {
		$_SESSION['user_created'] = "Email already exists. Cannot create account.";
	} else {
		// Insert the user into the database
		$insertStmt = $conn->prepare("INSERT INTO user_table (user_name, user_email, user_password, user_role) 
                                     VALUES (:name, :email, :password, 'user')");
		$insertStmt->bindParam(':name', $name);
		$insertStmt->bindParam(':email', $email);
		$insertStmt->bindParam(':password', $password);

		$result = $insertStmt->execute();

		if ($result) {
			echo "Account created successfully!";
			$_SESSION['user_created'] = "Account created successfully! Waiting for administrator account approval!";
		} else {
			echo "Error creating account.";
			$_SESSION['user_created'] = "Error creating account.";
		}
	}


	header("Location: signup.php");
}
