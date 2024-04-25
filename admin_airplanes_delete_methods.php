<?php
require "database.php";
session_start();
IsNotAdmin();

DeleteAirplane();

function DeleteAirplane()
{
	$conn = ConnectToDatabase();

	$checkStmt = $conn->prepare("DELETE FROM airplane_table WHERE airplane_id = :airplane_id");
	$checkStmt->bindParam(':airplane_id', $_POST['airplane_id']);
	$checkStmt->execute();

	header('Location: admin_airplanes.php');
}
