<?php
require "database.php";
session_start();
IsNotAdmin();

UpdateUser();
function UpdateUser()
{
	$validated = 1;

	$conn = ConnectToDatabase();

	$stmt = $conn->prepare("UPDATE user_table SET user_name = :name, user_email = :email,
	user_password = :password, user_role=:role ,user_validated=:validated WHERE user_id = :userId");
	$stmt->bindParam(':name', $_POST["username"]);
	$stmt->bindParam(':email', $_POST["email"]);
	$stmt->bindParam(':password', $_POST["password"]);
	$stmt->bindParam(':role', $_POST['roles']);
	$stmt->bindParam(':validated', $validated);
	$stmt->bindParam(':userId', $_SESSION['user_id']);
	$stmt->execute();


	if ($stmt->rowCount() > 0) {
		echo "User updated successfully";
	} else {
		echo "No rows updated";
	}


	header('Location: admin.php');
}
