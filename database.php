<?php
$servername = "localhost:3307";
$username = "root";
$password = "123";
$dbname = "pay_plane";



function ConnectToDatabase()
{
	global $servername, $dbname, $password, $username;
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}



function ExecuteSQL($sql)
{
	$conn = ConnectToDatabase();

	return $conn->query($sql);
}

function CheckUserExist()
{
	ConnectToDatabase();

	$conn = ConnectToDatabase();
	$userId = $_SESSION['user_id'];
	#echo  $userId;

	$stmt = $conn->prepare("SELECT COUNT(*) FROM user_table WHERE user_id = :userId");
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();

	if ($stmt->columnCount() > 0) {
		return true;
	}
	return false;
}


function CheckUser()
{
	if (isset($_SESSION["user_logout"])) {
		if ($_SESSION["user_logout"]) {

			$_SESSION["user_logout"] = false;
			header("Location: index.php");
			die();
		}
	}

	// echo "user_validated: " . $_SESSION['user_validated'] . "<br>";
	// echo "user_role: " . $_SESSION['user_role'] . "<br>";
	if (isset($_SESSION["user_role"])) {
		if ($_SESSION["user_role"] == "admin" && basename($_SERVER['PHP_SELF']) != "admin.php") {
			header("Location: admin.php");
			die();
		}
	}

	if (isset($_SESSION["user_validated"])) {
		if ($_SESSION["user_validated"] == 0 && basename($_SERVER['PHP_SELF']) != "login.php") {
			header("Location: login.php");
			die();
		}


		// if (
		// 	$_SESSION["user_validated"] == 1 && $_SESSION["user_role"] == "user"
		// 	&& basename($_SERVER['PHP_SELF']) != "search.php"
		// ) {
		// 	header("Location: search.php");
		// 	die();
		// }
		if (
			$_SESSION["user_validated"] == 1 && $_SESSION["user_role"] == "admin"
			&& basename($_SERVER['PHP_SELF']) != "admin.php"
		) {
			header("Location: admin.php");
			die();
		}
	}

	if (isset($_SESSION["user_validated"])) {
		if (
			$_SESSION["user_role"] == "user" &&
			basename($_SERVER['PHP_SELF']) != "search.php" &&
			basename($_SERVER['PHP_SELF']) != "item.php"
		) {
			header("Location: search.php");
			die();
		}
	}

	// if (
	// 	isset($_SESSION["user_role"])
	// 	&& isset($_SESSION["user_validated"])
	// ) {
	// 	if (
	// 		$_SESSION["user_role"] == "user" &&
	// 		$_SESSION["user_validated"] == 1 &&
	// 		basename($_SERVER['PHP_SELF']) == "login.php"
	// 	) {
	// 		header("Location: search.php");
	// 		die();
	// 	}
	// }

	if (basename($_SERVER['PHP_SELF']) != "login.php" && !isset($_SESSION["user_role"])) {
		header("Location: login.php");
		die();
	}
}


function ClearSessions($values)
{
	foreach ($values as &$value) {
		$_SESSION[$value] = "";
	}
}
