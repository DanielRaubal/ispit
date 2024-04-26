<?php
require "database.php";
session_start();
IsNotAdmin();


UpdateAirplane();
function UpdateAirplane()
{
	$conn = ConnectToDatabase();

	$id = $_SESSION["airplane_id"];
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


	$insertStmt = $conn->prepare("UPDATE airplane_table SET 
    airplane_manufacturer = :airplane_manufacturer, 
    airplane_model = :airplane_model, 
    airplane_mileage = :airplane_mileage, 
    airplane_about = :airplane_about,
    airplane_motors = :airplane_motors,
    airplane_seats = :airplane_seats,
    airplane_year = :airplane_year,
    airplane_range = :airplane_range,
    airplane_wingspan = :airplane_wingspan,
    airplane_length = :airplane_length,
    airplane_price = :airplane_price,
    airplane_state = :airplane_state
    WHERE airplane_id = :airplane_id");


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
	$insertStmt->bindParam(':airplane_id', $id);


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


	header("Location: admin_airplane_edit.php");
	die();
}
