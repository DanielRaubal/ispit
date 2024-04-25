<?php
require "database.php";
session_start();
IsNotAdmin();

DeleteUser();

function DeleteUser()
{
	$conn = ConnectToDatabase();

	$checkStmt = $conn->prepare("DELETE FROM user_table WHERE user_id = :id");
	$checkStmt->bindParam(':id', $_POST['user_selected_id']);
	$checkStmt->execute();

	header('Location: admin.php');
}
