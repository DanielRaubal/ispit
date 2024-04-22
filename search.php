<!doctype html>
<html>

<?php include "database.php";
session_start();
CheckUser();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="../pay_plane/src/global.css">

	<link rel="icon" type="image/png" href="../pay_plane/src/images/favicon.png">
	<title>planesforever.com - Home</title>



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
						<li class="flex justify-center">
							<a href="login.php" class="m-auto block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Login</a>
						</li>
						<li class="flex justify-center">
							<a href="signup.php" class="m-auto block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">SignUp</a>
						</li>

						<li class="flex justify-center">
							<a href="logout.php" class="m-auto block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
						</li>

						<li class="rounded-full w-8 h-8 bg-white border flex justify-center">
							<p class="m-auto">RD</p>
						</li>
					</ul>
				</div>
			</div>
		</nav>



		<div>









			<div class="w-full  mt-4">

				<div class="w-full px-8">

					<div class="w-full bg-white border shadow-sm rounded-lg p-8 mb-8 text-gray-500">


						<div class="flex flex-row gap-5 h-10">

							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Manufacturer</option>
								<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
							</select>


							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Model</option>
								<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
							</select>

							<button class="bg-blue-500  rounded-sm px-6 w-1/3 hover:bg-blue-400 text-white">
								<p class="font-bold text-xl ">Search</p>
							</button>

						</div>



						<div class="flex flex-row gap-5 mt-4 h-10">

							<input class="border-b bg-white" type="text" placeholder="price from $" required>

							<input class="border-b bg-white" type="text" placeholder="price to $" required>



							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Year from</option>
								<?php
								for ($i = date("Y"); $i >= 1903; $i--) {
									$year = $i;
									echo '<option value="' . $year . '">' . $year . '</option>';
								}
								?>
							</select>

							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Year to</option>
								<?php
								for ($i = date("Y"); $i >= 1903; $i--) {
									$year = $i;
									echo '<option value="' . $year . '">' . $year . '</option>';
								}
								?>
							</select>

							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Role</option>
								<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
							</select>

						</div>


						<div class="flex flex-row gap-5 mt-4 h-10">



							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Type of Fuel</option>
								<option value="saab">ATF</option>
								<option value="opel">kerosene</option>
								<option value="opel">electric</option>
								<option value="opel">biofuel</option>
							</select>

							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Region</option>
								<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
							</select>

							<select name="cars" id="cars" class="w-1/3 px-2 bg-white border rounded-sm">
								<option value="volvo">Weight</option>

							</select>

						</div>


						<div class="flex flex-row gap-5 mt-4 h-10">

							<div class="w-1/3">
								<input type="checkbox" id="scales" name="scales" />
								<label for="scales">Credit</label>
							</div>

							<div class="w-1/3">
								<input type="checkbox" id="Leasing" name="Leasing" />
								<label for="Leasing">Leasing</label>
							</div>

							<div class="w-1/3">
								<a href="" class="text-blue-500"><b class="text-red-500 ">%</b> With Discount</a>
							</div>

						</div>



					</div>


					<?php
					#echo '<div class="w-full flex  flex-col md:flex-row gap-2 px-8 justify-center ">';

					// for ($i = 0; $i < 5; $i++) {

					$conn = ConnectToDatabase();

					$checkStmt = $conn->prepare("SELECT * FROM airplane_table");
					$checkStmt->execute();
					$airplanes = $checkStmt->fetchAll(PDO::FETCH_OBJ);
					$shown_planes = 0;

					// Calculate the number of rows needed based on the number of airplanes and display them in groups of 3
					$rows = ceil(count($airplanes) / 3);

					for ($i = 0; $i < $rows; $i++) {
						echo '<div class="w-full flex flex-col md:flex-row gap-2 px-8 justify-center">';

						for ($j = 0; $j < 3; $j++) {
							// Check if there are more airplanes to display
							if ($shown_planes >= count($airplanes)) {
								break; // Exit the inner loop if there are no more airplanes
							}
							$airplane = $airplanes[$shown_planes];
							$airplane_id = $airplane->airplane_id;
							// Display airplane information
							echo "<a href='item.php?id=$airplane_id' class='bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300'>
            <div class='h-36 flex'>
                <img src='../pay_plane/src/images/747.webp' class='w-1/2w md:w-full opacity-95 h-36 m-auto rounded-lg'>
                <div class='bg-white rounded-full w-9 h-9 absolute flex opacity-60'>
                    <img src='../pay_plane/src/images/steering.png' class='w-6 m-auto'>
                </div>
            </div>

            <h1 class='p-2'>$airplane->airplane_model</h1>
            <p class='font-bold p-2'>$airplane->airplane_price$</p>

            <div class='flex justify-between'>
                <p class='text-gray-600 p-2'>$airplane->airplane_mileage km</p>
                <p class='text-gray-600 p-2'>$airplane->airplane_year</p>
            </div>
        </a>";

							$shown_planes++; // Increment the counter for displayed airplanes
						}

						echo '</div>';
					}


					// for ($i = 0; $i < count($airplanes); $i++) {
					// 	echo  '<a href="item.php" class="bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300 ">
					// 	<div class="h-36 flex">
					// 		<img src="../pay_plane/src/images/747.webp" class="w-1/2w md:w-full opacity-95 h-36 m-auto rounded-lg">
					// 		<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
					// 			<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
					// 		</div>';
					// }

					/*
					while ($row = $checkStmt->fetch(PDO::FETCH_OBJ)) {
						// $row now contains the current row as an object
						#echo "Airplane ID: $row->airplane_id, Model: $row->airplane_model<br>";

						echo "<a href='item.php?id=$row->airplane_id'  class='bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300 '>
						<div class='h-36 flex'>
							<img src='../pay_plane/src/images/747.webp' class='w-1/2w md:w-full opacity-95 h-36 m-auto rounded-lg'>
							<div class='bg-white rounded-full w-9 h-9 absolute flex opacity-60'>
								<img src='../pay_plane/src/images/steering.png' class='w-6 m-auto '>
							</div>
						</div>

						<h1 class=' p-2'>$row->airplane_model</h1>
						<p class='font-bold p-2'> $row->airplane_price$ </p>

						<div class='flex justify-between'>
							<p class='text-gray-600 p-2'>$row->airplane_mileage km</p>
							<p class='text-gray-600 p-2'>$row->airplane_manufacturer</p>
						</div>
					</a>";
					}
*/
					#echo '</div>';




					// if ($checkStmt->rowCount() > 0) {
					// 	$_SESSION['user_connected'] = "User is connected!";

					// 	$userData = $checkStmt->fetch(PDO::FETCH_ASSOC);
					// 	// $_SESSION['user_id'] = $userData['user_id'];
					// 	// $_SESSION['user_role'] = $userData['user_role'];
					// 	// $_SESSION['user_name'] = $userData['user_name'];
					// 	// $_SESSION['user_email'] = $userData['user_email'];
					// 	// $_SESSION['user_validated'] = $userData['user_validated'];


					// echo '<a href="item.php" class="bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300 ">
					// 	<div class="h-36 flex">
					// 		<img src="../pay_plane/src/images/747.webp" class="w-1/2w md:w-full opacity-95 h-36 m-auto rounded-lg">
					// 		<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
					// 			<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
					// 		</div>
					// 	</div>

					// 	<h1 class=" p-2">Boeing 747-8 Cargo</h1>
					// 	<p class="font-bold p-2">450000$</p>

					// 	<div class="flex justify-between">
					// 		<p class="text-gray-600 p-2">15000 km</p>
					// 		<p class="text-gray-600 p-2">ATF</p>
					// 	</div>

					// </a>';

					// }
					// }



					// for ($i = 0; $i < 5; $i++) {
					// 	echo '<div class="w-full flex  flex-col md:flex-row gap-2 px-8 justify-center ">';

					// 	for ($j = 0; $j < 4; $j++) {
					// 		echo '<a href="item.php" class="bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300 ">
					// 	<div class="h-36 flex">
					// 		<img src="../pay_plane/src/images/747.webp" class="w-1/2w md:w-full opacity-95 h-36 m-auto rounded-lg">
					// 		<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
					// 			<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
					// 		</div>
					// 	</div>

					// 	<h1 class=" p-2">Boeing 747-8 Cargo</h1>
					// 	<p class="font-bold p-2">450000$</p>

					// 	<div class="flex justify-between">
					// 		<p class="text-gray-600 p-2">15000 km</p>
					// 		<p class="text-gray-600 p-2">ATF</p>
					// 	</div>

					// </a>';
					// 	}

					// 	echo '</div>';
					// }

					?>







				</div>











			</div>


			<!-- <nav aria-label="Page navigation example" class="mt-14 mb-20  flex justify-center">
				<ul class="inline-flex -space-x-px text-sm">
					<li>
						<a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
					</li>
					<li>
						<a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">0</a>
					</li>

					<li>
						<a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
					</li>

					<li>
						<a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">99</a>
					</li>
					<li>
						<a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
					</li>
				</ul>
			</nav> -->



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