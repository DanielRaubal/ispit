<!doctype html>
<html>

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