<!doctype html>
<html>

<?php
session_start();
$_SESSION["user_logout"] = false;
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
						<li>
							<a href="login.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Login</a>
						</li>

						<li>
							<a href="signup.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">SignUp</a>
						</li>

						<li>
							<a href="search.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Search Aircraft's</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>



		<div>

			<div class="flex flex-row">

				<div class="flex flex-col ">
					<h1 class="text-6xl font-bold text-blue-400 px-8 my-auto w-1/2 color_changer">
						planesforever.com
					</h1>
					<p class=" flex px-8 text-blue-600">Take Flight, Make Profits: Sell Your Aircraft Hassle-Free!</p>
				</div>



				<img src="../pay_plane/src/images/suhoi.png" class="w-1/3 opacity-95 m-auto ">

			</div>




			<div class="w-full  mt-24">
				<p class=" flex px-8 mb-8 text-blue-800">Most viewed aircrafts by users.</p>

				<div class="w-full flex flex-row gap-2 px-8 justify-center ">


					<div class="bg-white border rounded-lg shadow-sm w-1/4 hover:border-gray-300 ">
						<div class="h-36 flex">
							<img src="../pay_plane/src/images/747.webp" class="w-full opacity-95 h-36 m-auto rounded-lg">
							<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
								<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
							</div>
						</div>

						<h1 class=" p-2">Boeing 747-8 Cargo</h1>
						<p class="font-bold p-2">450000$</p>
						<p class="text-gray-600 p-2">Someone Someone</p>
					</div>

					<div class="bg-white border rounded-lg shadow-sm w-1/4 hover:border-gray-300 ">
						<div class="h-36  flex">
							<img src="../pay_plane/src/images/f84g.jpg" class="w-full opacity-95 h-36 m-auto rounded-lg">
							<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
								<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
							</div>
						</div>
						<h1 class=" p-2">F-84G</h1>
						<p class="font-bold p-2">450000$</p>
						<p class="text-gray-600 p-2">Someone Someone</p>
					</div>

					<div class="bg-white border rounded-lg shadow-sm w-1/4 hover:border-gray-300 ">
						<div class="h-36  flex relative">
							<img src="../pay_plane/src/images/mig.webp" class="w-full opacity-95 h-36 m-auto rounded-lg">
							<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
								<img src="../pay_plane/src/images/steering.png" class="w-6 m-auto ">
							</div>
						</div>
						<h1 class=" p-2">MIG-23</h1>
						<p class="font-bold p-2">1.500.000$</p>
						<p class="text-gray-600 p-2">Someone Someone</p>
					</div>

					<div class="bg-white border rounded-lg shadow-sm hover:border-gray-300 w-1/4  ">
						<div class="h-36  flex relative">
							<img src="../pay_plane/src/images/plane_parts.webp" class="w-full opacity-95 h-36 m-auto rounded-lg">
							<div class="bg-white rounded-full w-9 h-9 absolute flex opacity-60">
								<img src="../pay_plane/src/images/wrench.png" class="w-4 m-auto ">
							</div>
						</div>

						<h1 class=" p-2">Unknown plane</h1>
						<p class="font-bold p-2">450000$</p>
						<p class="text-gray-600 p-2">Someone Someone</p>
					</div>

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