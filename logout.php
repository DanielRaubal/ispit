<?php
require "database.php";
session_start();
#
header("Location: login.php");

$defined_vars = get_defined_vars();

$_SESSION["user_role"] = "";

echo "userExist: " . CheckUserExist() . "<br><br>";


foreach ($defined_vars as $var_name => $var_value) {
	echo "Variable Name: $var_name, Value: ";
	if (is_array($var_value) || is_object($var_value)) {
		echo "<pre>" . print_r($var_value, true) . "</pre>";
	} else {
		echo "$var_value";
	}
	echo "<br>";
}

session_unset();


$_SESSION["user_logout"] = true;
die();

//    [created_user] => 
//     [user_created] => 
//     [user_connected] => 
//     [user_role] => admin
//     [user_name] => admin
//     [user_email] => admin@gmail.com
//     [user_validated] => 1
//     [id] => 10
//     [role] => user
//     [role2] => admin
//     [user_id] => 12
