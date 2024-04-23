<?php
require "database.php";
session_start();
IsNotUser();

AddToCart();
function AddToCart()
{

	$airplane_id = $_GET["id"];

	$conn = ConnectToDatabase();

	// Insert the user into the database
	$insertStmt = $conn->prepare("INSERT INTO cart_table (cart_airplane_id,cart_user_id) 
	VALUES (:cart_airplane_id, :cart_user_id)");

	$insertStmt->bindParam(':cart_airplane_id', $airplane_id);
	$insertStmt->bindParam(':cart_user_id', $_SESSION["user_id"]);



	try {
		$result = $insertStmt->execute();

		if ($result) {
			$_SESSION['cart_message'] = "Airplane added to cart successfully!";
		} else {
			$_SESSION['cart_message'] = "Error adding to cart.";
		}
	} catch (PDOException $e) {
		$_SESSION['cart_message'] = "Error: " . $e->getMessage();
	}

	echo $_SESSION['cart_message'];
	header("Location: item.php?id=$airplane_id");
	die();
}
