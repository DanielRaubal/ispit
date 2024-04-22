<?php
require "database.php";



session_start();
#ValidateUser();
ValidateUser();
function ValidateUser()
{
	$conn = ConnectToDatabase();

	$checkStmt = $conn->prepare("DELETE FROM cart_table WHERE cart_id = :id");
	$checkStmt->bindParam(':id', $_POST['cart_id']);
	$checkStmt->execute();

	header('Location: cart.php');
}
