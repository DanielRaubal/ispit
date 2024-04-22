<?php
require "database.php";

session_start();

var_dump($_SESSION);

if (isset($_SESSION["user_validated"])) {
	// Your PHP script code goes here
	#CreateUser();
	if ($_SESSION["user_role"] == "user" && $_SESSION["user_validated"] == 1) {
		header("Location: search.php");
		die();
	}
} else {
	header("Location: login.php");
	die();
}



CreateAircraft();
function CreateAircraft()
{
	$manufacturer = $_POST["manufacturer"];
	$model = $_POST["model"];
	$mileage = $_POST["mileage"];
	$about = $_POST["about"];
	$motors = $_POST["motors"];
	$seats = $_POST["seats"];
	$year = $_POST["year"];
	$range = $_POST["range"];
	$wingspan = $_POST["wingspan"];
	$length = $_POST["length"];
	$price = $_POST["price"];
	$state = $_POST["state"];

	$conn = ConnectToDatabase();

	// Insert the user into the database
	$insertStmt = $conn->prepare("INSERT INTO airplane_table (airplane_manufacturer,airplane_model,airplane_mileage,airplane_about
	,airplane_motors,airplane_seats,airplane_year,airplane_range,airplane_wingspan,airplane_length,airplane_price,airplane_state) 
	
	VALUES (:airplane_manufacturer, :airplane_model, :airplane_mileage, :airplane_about,
	:airplane_motors,:airplane_seats,:airplane_year,:airplane_range,:airplane_wingspan,:airplane_length
	,:airplane_price,:airplane_state)");

	$insertStmt->bindParam(':airplane_manufacturer', $manufacturer);
	$insertStmt->bindParam(':airplane_model', $model);
	$insertStmt->bindParam(':airplane_mileage', $mileage);
	$insertStmt->bindParam(':airplane_about', $about);
	$insertStmt->bindParam(':airplane_motors', $motors);
	$insertStmt->bindParam(':airplane_seats', $seats);
	$insertStmt->bindParam(':airplane_year', $year);
	$insertStmt->bindParam(':airplane_range', $range);
	$insertStmt->bindParam(':airplane_wingspan', $wingspan);
	$insertStmt->bindParam(':airplane_length', $length);
	$insertStmt->bindParam(':airplane_price', $price);
	$insertStmt->bindParam(':airplane_state', $state);


	try {
		$result = $insertStmt->execute();

		if ($result) {
			$_SESSION['airplane_created'] = "Airplane created successfully!";
		} else {
			$_SESSION['airplane_created'] = "Error creating airplane.";
		}
	} catch (PDOException $e) {
		$_SESSION['airplane_created'] = "Error: " . $e->getMessage();
	}


	header("Location: admin_add.php");
	die();
}
