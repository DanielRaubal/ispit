<?php
require "database.php";
session_start();
IsNotAdmin();

if (isset($_POST['execute'])) {
	ValidateUser($_POST['user_selected_id']);
}

function ValidateUser($id)
{
	echo "$id \n";

	$conn = ConnectToDatabase();

	$sql = "UPDATE user_table SET user_validated = 1 WHERE user_selected_id = $id";
	$result = $conn->query($sql);
	#echo $result->errorInfo();
	if ($result) {
		echo "Query executed successfully!";
	} else {
		echo "Error executing query.";
	}


	header('Location: admin.php');
}
