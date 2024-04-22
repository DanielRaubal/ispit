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


		



		<div class="gap-y-4 flex flex-col m-auto">

			<div class="bg-white border shadow-sm rounded-lg container py-6 m-auto flex  p-4">
				<form action="admin_add_methods.php" method="post">
					<div class="border-red-500 px-4">
						<h1 class="font-bold text-gray-400 pb-2 text-3xl">Add New Aircraft</h1>

						<?php if (isset($_SESSION['airplane_created'])) {
							echo $_SESSION["airplane_created"];
						} ?>

						<label for="model">Aircraft model name</label>
						<input class="border-b w-full py-2" type="text" placeholder="model" name="model" value="Model XYZ" required>

						<label for="manufacturer">Manufacturer name</label>
						<input class="border-b w-full py-2" type="text" placeholder="manufacturer" name="manufacturer" value="ABC Aircrafts" required>

						<label for="mileage">Mileage</label>
						<input class="border-b w-full py-2" type="text" placeholder="mileage" name="mileage" value="5000" required>

						<label for="year">Manufacturing year</label>
						<input class="border-b w-full py-2" type="text" placeholder="year" name="year" value="2022" required>

						<label for="motors">Motors</label>
						<input class="border-b w-full py-2" type="text" placeholder="motors" name="motors" value="2" required>

						<label for="price">Price</label>
						<input class="border-b w-full py-2" type="text" placeholder="price" name="price" value="100000" required>

						<label for="about">About</label>
						<input class="border-b w-full py-2" type="text" placeholder="about" name="about" value="This aircraft is designed for XYZ purpose." required>

						<label for="length">Length</label>
						<input class="border-b w-full py-2" type="text" placeholder="length" name="length" value="50 ft" required>

						<label for="wingspan">Wingspan</label>
						<input class="border-b w-full py-2" type="text" placeholder="wingspan" name="wingspan" value="60 ft" required>

						<label for="range">Range</label>
						<input class="border-b w-full py-2" type="text" placeholder="range" name="range" value="2000 miles" required>

						<label for="seats">Seats</label>
						<input class="border-b w-full py-2" type="text" placeholder="seats" name="seats" value="6" required>

						<div class="bg-white border mt-4 rounded-lg p-6 flex flex-col">
							<label for="state">State</label>
							<select name="state" id="state" class="px-2 bg-white border rounded-sm p-2" required>
								<option value="new">New</option>
								<option value="used">Used</option>
								<option value="broken or for parts">Broken or for parts</option>
							</select>
						</div>

						<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white">
							<p class="font-bold px-6 py-2 text-xl m-auto">Add New Aircraft</p>
						</button>
					</div>
				</form>
			</div>









		</div>

		<footer class="border container   mx-auto bg-white rounded-lg shadow m-4 dark:bg-gray-800 flex flex-col justify-between min-h-footer">
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