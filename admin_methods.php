<?php
require "database.php";

if (isset($_POST['execute'])) {
	// Your PHP script code goes here
	ValidateUser($_POST['user_id']);
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['execute'])) {
// 	$execute_value = $_POST['execute'];
// 	$user_id = $_POST['user_id'];

// 	if ($execute_value == 'validate') {
// 		// The Validate button was clicked
// 		echo "Validate button clicked for user ID: $user_id";
// 	} elseif ($execute_value == 'edit') {
// 		// The Edit button was clicked
// 		echo "Edit button clicked for user ID: $user_id";
// 	} else {
// 		// Handle other cases if needed
// 	}
// }



function ValidateUser($id)
{
	echo "$id \n";

	$conn = ConnectToDatabase();

	$sql = "UPDATE user_table SET user_validated = 1 WHERE user_id = $id";
	$result = $conn->query($sql);
	#echo $result->errorInfo();
	if ($result) {
		echo "Query executed successfully!";
	} else {
		echo "Error executing query.";
	}


	header('Location: admin.php');
}
