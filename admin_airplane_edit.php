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
		$currentPage = $_SERVER['SCRIPT_NAME'];
		echo basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>
	</title>

	<?php

	include "database.php";



	session_start();

	$conn = ConnectToDatabase();

	$airplane_id = $_POST['airplane_id']; // Assuming you're getting user_id from the form submission
	$_SESSION['airplane_id'] = $airplane_id;


	$stmt = $conn->prepare("SELECT * FROM airplane_table WHERE airplane_id = :airplane_id");
	$stmt->bindParam(':airplane_id', $airplane_id);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		// User found, fetch the data
		$airplane = $stmt->fetch(PDO::FETCH_ASSOC);


		$manufacturer = $airplane["airplane_manufacturer"];
		$model = $airplane["airplane_model"];
		$mileage = $airplane["airplane_mileage"];
		$about = $airplane["airplane_about"];
		$motors = $airplane["airplane_motors"];
		$seats = $airplane["airplane_seats"];
		$year = $airplane["airplane_year"];
		$range = $airplane["airplane_range"];
		$wingspan = $airplane["airplane_wingspan"];
		$length = $airplane["airplane_length"];
		$price = $airplane["airplane_price"];
		$state = $airplane["airplane_state"];

		// Do something with the user data

	} else {
		// User not found
		echo "Airplane not found";
	}

	#echo $result->errorInfo();
	if ($result) {
		echo "Query executed successfully!";
	} else {
		echo "Error executing query.";
	}


	?>

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			text-align: center;

		}

		td {
			padding: 4px;
		}



		td:nth-last-child(2) {
			/* Your styles here */
			border: 2px solid;

		}

		td tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>


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

					</ul>
				</div>
			</div>
		</nav>




		<div class="gap-y-4 flex flex-col">



			<div class="bg-white border shadow-sm rounded-lg w-2/3 py-6 m-auto p-4">
				<form action="admin_airplane_edit_methods.php" method="post">
					<div class="border-red-500 px-4">
						<h1 class="font-bold text-gray-400 pb-2 text-3xl">Add New Aircraft</h1>

						<?php if (isset($_SESSION['airplane_created'])) {
							echo $_SESSION["airplane_created"];
						} ?>

						<label for="model">Aircraft model name</label>
						<input class="border-b w-full py-2" type="text" placeholder="model" name="model" value="<?php echo $model; ?>" required>

						<label for="manufacturer">Manufacturer name</label>
						<input class="border-b w-full py-2" type="text" placeholder="manufacturer" name="manufacturer" value="<?php echo $manufacturer; ?>" required>

						<label for="mileage">Mileage</label>
						<input class="border-b w-full py-2" type="text" placeholder="mileage" name="mileage" value="<?php echo $mileage; ?>" required>

						<label for="year">Manufacturing year</label>
						<input class="border-b w-full py-2" type="text" placeholder="year" name="year" value="<?php echo $year; ?>" required>

						<label for="motors">Motors</label>
						<input class="border-b w-full py-2" type="text" placeholder="motors" name="motors" value="<?php echo $motors; ?>" required>

						<label for="price">Price</label>
						<input class="border-b w-full py-2" type="text" placeholder="price" name="price" value="<?php echo $price; ?>" required>

						<label for="about">About</label>
						<input class="border-b w-full py-2" type="text" placeholder="about" name="about" value="<?php echo $about; ?>" required>

						<label for="length">Length</label>
						<input class="border-b w-full py-2" type="text" placeholder="length" name="length" value="<?php echo $length; ?>" required>

						<label for="wingspan">Wingspan</label>
						<input class="border-b w-full py-2" type="text" placeholder="wingspan" name="wingspan" value="<?php echo $wingspan; ?>" required>

						<label for="range">Range</label>
						<input class="border-b w-full py-2" type="text" placeholder="range" name="range" value="<?php echo $range; ?>" required>

						<label for="seats">Seats</label>
						<input class="border-b w-full py-2" type="text" placeholder="seats" name="seats" value="<?php echo $seats; ?>" required>

						<div class="bg-white border mt-4 rounded-lg p-6 flex flex-col">
							<label for="state">State</label>
							<select name="state" id="state" class="px-2 bg-white border rounded-sm p-2" required>
								<option value="new">New</option>
								<option value="used">Used</option>
								<option value="broken or for parts">Broken or for parts</option>
							</select>
						</div>

						<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white">
							<p class="font-bold px-6 py-2 text-xl m-auto">Edit Aircraft</p>
						</button>
					</div>
				</form>
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







	</div>
</body>

</html>