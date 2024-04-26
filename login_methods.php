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

	if ($checkStmt->rowCount() > 0) {

		$userData = $checkStmt->fetch(PDO::FETCH_ASSOC);
		echo $checkStmt->rowCount();
		echo $userData['user_name'];
		echo "<br>";

		
		$_SESSION['user_connected'] = "User is not validated!";

		if ($userData['user_validated'] == 1) {
			$_SESSION['user_id'] = $userData['user_id'];
			$_SESSION['user_role'] = $userData['user_role'];
			$_SESSION['user_name'] = $userData['user_name'];
			$_SESSION['user_email'] = $userData['user_email'];
			$_SESSION['user_validated'] = $userData['user_validated'];

			$_SESSION['user_connected'] = "User is connected!";
			header("Location: search.php");
			die();
		}

	} else {
		$_SESSION['user_connected'] = "Password or email incorrect.";

	}
	#$_SESSION['user_connected'] = "User is not connecte";

	header("Location: login.php");
	die();

	echo $_SESSION['user_connected'];
}
