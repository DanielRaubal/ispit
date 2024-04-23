<?php
require "database.php";
session_start();


$email = $_POST['email'];
$password = $_POST['password'];

echo "Email: $email <br>";
echo "PASSWORD: $password <br>";

$_POST['created_user'] = "kica";

Login($email, $password);

function Login($email, $password)
{
	$conn = ConnectToDatabase();

	// Check if the email already exists
	$checkStmt = $conn->prepare("SELECT * FROM user_table WHERE user_password = :password AND user_email = :email");
	$checkStmt->bindParam(':password', $password);
	$checkStmt->bindParam(':email', $email);
	$checkStmt->execute();

	if ($checkStmt->columnCount() > 0) {
		$_SESSION['user_connected'] = "User is connected!";

		$userData = $checkStmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user_id'] = $userData['user_id'];
		$_SESSION['user_role'] = $userData['user_role'];
		$_SESSION['user_name'] = $userData['user_name'];
		$_SESSION['user_email'] = $userData['user_email'];
		$_SESSION['user_validated'] = $userData['user_validated'];

		if ($userData == 0) {
			$_SESSION['user_connected'] = "User is not validated!";
		}


		header("Location: search.php");
	} else {
		$_SESSION['user_connected'] = "Password or email incorrect.";
		header("Location: login.php");
	}
	#$_SESSION['user_connected'] = "User is not connecte";


	echo $_SESSION['user_connected'];
}
