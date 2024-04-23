<?php
require "database.php";
session_start();

IsNotUser();


#ValidateUser();
CartDelete();
function CartDelete()
{
	$conn = ConnectToDatabase();

	$checkStmt = $conn->prepare("DELETE FROM cart_table WHERE cart_id = :id");
	$checkStmt->bindParam(':id', $_POST['cart_id']);
	$checkStmt->execute();

	header('Location: cart.php');
}
