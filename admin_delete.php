<?php
require "database.php";

session_start();
ValidateUser();


function ValidateUser()
{
	$conn = ConnectToDatabase();

	$checkStmt = $conn->prepare("DELETE FROM user_table WHERE user_id = :id");
	$checkStmt->bindParam(':id', $_POST['cart_airplane_id']);
	$checkStmt->execute();

	header('Location: admin.php');
}
