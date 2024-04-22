<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="../pay_plane/src/global.css">

	<link rel="icon" type="image/png" href="../pay_plane/src/images/favicon.png">
	<title>planesforever.com -
		<?php
		#include "database.php";


		// $currentPage = $_SERVER['SCRIPT_NAME'];
		// echo basename($_SERVER["SCRIPT_FILENAME"], '.php');

		session_start();
		#CheckUser();
		if (
			!isset($_SESSION["user_role"])
			|| $_SESSION["user_role"] == "admin"
		) {
			header("Location: login.php");
			die();
		}


		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			if (isset($id)) {
				include "database.php";
				$conn = ConnectToDatabase();

				// Check if the email already exists
				$checkStmt = $conn->prepare("SELECT * FROM airplane_table WHERE airplane_id = :id");
				$checkStmt->bindParam(':id', $id);
				$checkStmt->execute();

				if ($checkStmt->columnCount() > 0) {

					$airplaneData = $checkStmt->fetch(PDO::FETCH_ASSOC);
					$id = $airplaneData["airplane_id"];

					$manufacturer = $airplaneData["airplane_manufacturer"];
					$model = $airplaneData["airplane_model"];
					$mileage = $airplaneData["airplane_mileage"];
					$about = $airplaneData["airplane_about"];
					$motors = $airplaneData["airplane_motors"];
					$seats = $airplaneData["airplane_seats"];
					$year = $airplaneData["airplane_year"];
					$date = $airplaneData["airplane_created"];
					$range = $airplaneData["airplane_range"];
					$wingspan = $airplaneData["airplane_wingspan"];
					$length = $airplaneData["airplane_length"];
					$price = $airplaneData["airplane_price"];
					$state = $airplaneData["airplane_state"];
					#$price = $airplaneData["airplane_"];
				}
			}


			// Now you can use $nigValue in your code
		} else {
			// Parameter not set, handle the case accordingly
		}


		?>


	</title>
</head>

<body>




	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">

		<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b mb-10">
			<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
				<a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
					<img src="../pay_plane/src/images/favicon.png" class="h-8 opacity-60 hover:animate-pulse" alt="Flowbite Logo" />
					<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
				</a>
				<button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
					<span class="sr-only">Open main menu</span>
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
					</svg>
				</button>
				<div class="hidden w-full md:block md:w-auto" id="navbar-default">
					<ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
						<li>
							<a href="login.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Login</a>
						</li>
						<li>
							<a href="signup.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">SignUp</a>
						</li>
						<li>
							<a href="logout.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
						</li>
						<li>
							<a href="cart.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cart <?php ?></a>
						</li>

					</ul>
				</div>
			</div>
		</nav>


		<div>

			<div class="w-2/3 flex justify-center mx-auto shadow-sm  border mb-16 bg-white">
				<div class="w-full justify-between h-96 flex">
					<!-- <button class="h-full bg-white  text-bold text-3xl rounded-sm w-1/12 hover:bg-gray-50">L</button> -->
					<img src="../pay_plane/src/images/747.webp" class="w-4/5 opacity-95 h-4/5 m-auto ">
					<!-- <button class="h-full bg-white text-bold text-3xl rounded-sm w-1/12 hover:bg-gray-50">R</button> -->
				</div>
			</div>




			<div class="justify-center flex mb-4">
				<div class="bg-white border rounded-lg shadow-sm w-2/3  p-4">

					<a href="cart_add_method.php?<?php echo "id=$_GET[id]"; ?>">
						<button class="bg-blue-500 hover:bg-blue-600 text-white w-full py-4 my-4 rounded-lg">Add to invoice</button>
						<?php if (isset($_SESSION['cart_message'])) {
							echo "<p class='text-center my-2 mb-4 text-blue-500'>$_SESSION[cart_message]</p>";
							$_SESSION["cart_message"] = "";
						} ?>
					</a>


					<div class=' flex justify-center text-blue-500 text-3xl font-bold px-4 py-1'>
						<p class=""><?php echo "$price$ (USD)"; ?></p>

					</div>


					<p>General informations </p>
					<?php



					?>

					<div class='mt-8'>


						<div class='border-b flex justify-between px-4 py-1'>
							<p>State of veichle: </p>

							<p><?php echo $state;  ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Manufacturer: </p>
							<p><?php echo $manufacturer; ?></p>
						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Model: </p>
							<p><?php echo $model; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Manufacturing Date: </p>
							<p><?php echo $year; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Aircraft published: </p>
							<p class="font-bold"><?php echo $date; ?></p>

						</div>




						<div class='border-b flex justify-between px-4 py-1 mt-8'>
							<p>Mileage: </p>
							<p><?php echo $mileage; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Range: </p>
							<p><?php echo $range; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Wingspan: </p>
							<p><?php echo $wingspan; ?></p>
						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Length: </p>
							<p><?php echo $length; ?></p>
						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Number of seats: </p>
							<p><?php echo $seats; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1'>
							<p>Number of motors: </p>
							<p><?php echo $motors; ?></p>

						</div>

						<div class='border-b flex justify-between px-4 py-1 mt-8'>
							<p>ID of plane:</p>
							<p><?php echo $id; ?></p>

						</div>

					</div>

				</div>
			</div>



			<div class="justify-center flex">
				<div class="bg-white border rounded-lg shadow-sm w-2/3  p-4">
					<p>About</p>
					<p class=" break-words"><?php echo $about; ?></p>
				</div>
			</div>

		</div>





		<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 flex flex-col justify-between min-h-footer">
			<div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
				<span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© <?php echo date("Y"); ?> <a href="#" class="hover:underline">planesforever.com</a></span>
				<ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
					<!-- <li>
						<a href="#" class="hover:underline me-4 md:me-6">Home</a>
					</li>

					<li>
						<a href="#" class="hover:underline">Contact</a>
					</li> -->
				</ul>
			</div>
		</footer>
	</div>
</body>

</html>