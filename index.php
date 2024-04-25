<!doctype html>
<html>

<?php
include "database.php";
session_start();
IsLoggedIn();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>

	<link rel="icon" type="image/png" href="src/images/favicon.png">
	<title>planesforever.com -
		<?php
		echo ScriptName(); ?>
	</title>

	<script>
		function toggleNavbar() {
			var navbar = document.getElementById('navbar-default');
			if (navbar.hasAttribute('hidden')) {
				navbar.removeAttribute('hidden');
			} else {
				navbar.setAttribute('hidden', '');
			}
		}
	</script>
</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] overflow-x-hidden">
		<?php NavBar(); ?>
		<div class="flex flex-col m-auto justify-center container">
			<div class="flex flex-col md:flex-row ">

				<div class="flex flex-col  my-auto">
					<h1 class="text-5xl md:text-6xl font-bold text-blue-400 px-8 text-center  color_changer ">
						planesforever.com
					</h1>
					<p class=" flex px-8 text-blue-400 text-center justify-center font-semibold">Take Flight, Make Profits: Sell Your Aircraft Hassle-Free!</p>
				</div>

				<img src="src/images/suhoi.png" class="w-4/5 opacity-95 m-auto ">
			</div>
		</div>
		<?php
		Footer();
		?>
	</div>
</body>

</html>