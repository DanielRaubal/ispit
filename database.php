<?php
$db_servername = "localhost:3306";
$db_username = "root";
$db_password = "123";
$dbname = "pay_plane";

if (!isset($_SESSION["user_logout"])) {
	$_SESSION["user_logout"] = false;
}


function ConnectToDatabase()
{
	global $db_servername, $dbname, $db_password, $db_username;
	$conn = new PDO("mysql:host=$db_servername;dbname=$dbname", $db_username, $db_password);
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


function IsNotAdmin()
{
	if (isset($_SESSION["user_role"])) {
		if (
			$_SESSION["user_role"] == "user"
		) {
			header("Location: search.php");
			die();
		}
	} else {
		header("Location: login.php");
		die();
	}
}


function IsNotUser()
{
	if (isset($_SESSION["user_role"])) {
		if (
			$_SESSION["user_role"] == "admin"
		) {
			header("Location: admin.php");
			die();
		}
	} else {
		header("Location: login.php");
		die();
	}
}






function IsLoggedIn()
{
	if (isset($_SESSION["user_role"])) {
		if ($_SESSION["user_role"] == "admin") {
			header("Location: admin.php");
			die();
		}
		header("Location: search.php");
		die();
	}

/*
	if (basename($_SERVER['PHP_SELF']) != "login.php") {
		header("Location: login.php");
		die();
	}*/
}



function ScriptName()
{
	$currentPage = $_SERVER['SCRIPT_NAME'];
	return basename($_SERVER["SCRIPT_FILENAME"], '.php');
}



function ClearSessions($values)
{
	foreach ($values as &$value) {
		$_SESSION[$value] = "";
	}
}



function Footer()
{
	$current_date = date("Y");
	echo "<footer class='border container mx-auto bg-white rounded-lg shadow m-4 dark:bg-gray-800 flex flex-col justify-between min-h-footer'>
    <div class='w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between'>
        <span class='text-sm text-gray-500 sm:text-center dark:text-gray-400'>©$current_date <a href='#' class='hover:underline'>planesforever.com</a></span>
        <ul class='flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0'>
        
        </ul>
    </div>
</footer>
";
}


function NavBar()
{
	$cart = "";
	$login = "";
	$default = "";
	$logout = "";


	if (isset($_SESSION['user_role'])) {

		$default = "<li>
                    <a href='admin.php' class='block py-2 px-3 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'>Admin Panel</a>
                </li>";
		
		if ($_SESSION['user_role'] == "user") {
			$cart = " <li>
                    <a href='cart.php' class='block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'>Cart</a>
                </li>";

			$default = "<li>
                    <a href='search.php' class='block py-2 px-3 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'>Search Page</a>
                </li>";
		}
		
	}

	if (!isset($_SESSION['user_role'])) {
		$login = "  <li>
                    <a href='login.php' class='block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500' aria-current='page'>Login</a>
                </li>";
	}


	if (isset($_SESSION['user_role'])) {
		$logout = "<li>
                    <a href='logout.php' class='block py-2 px-3 text-red-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'>Logout</a>
                </li>";
	}



	echo "
	<nav class='bg-white border-gray-200 dark:bg-gray-900 border-b mb-10'>
    <div class='max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4'>
        <a href='index.php' class='flex items-center space-x-3 rtl:space-x-reverse'>
            <img src='src/images/favicon.png' class='h-8 opacity-60 hover:animate-pulse' alt='Flowbite Logo' />
            <span class='self-center text-2xl font-semibold whitespace-nowrap dark:text-white'></span>
        </a>
        <button data-collapse-toggle='navbar-default' type='button' class='inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600' aria-controls='navbar-default' aria-expanded='false'>
            <span class='sr-only'>Open main menu</span>
            <svg class='w-5 h-5' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 17 14'>
                <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M1 1h15M1 7h15M1 13h15' />
            </svg>
        </button>
        <div class='hidden w-full md:block md:w-auto' id='navbar-default'>
            <ul class='font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700'>
              	$login
				$default
                <li>
                    <a href='signup.php' class='block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'>SignUp</a>
                </li>
				$cart
              	$logout

            </ul>
        </div>
    </div>
</nav>
";
}