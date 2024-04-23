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
		include "database.php";
		echo ScriptName(); ?>
	</title>
	<?php
	session_start();

	IsNotUser();


	// $currentPage = $_SERVER['SCRIPT_NAME'];
	// echo basename($_SERVER["SCRIPT_FILENAME"], '.php');

	#CheckUser();
	// if (
	// 	!isset($_SESSION["user_role"])
	// 	|| $_SESSION["user_role"] == "admin"
	// ) {
	// 	header("Location: login.php");
	// 	die();
	// }


	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		if (isset($id)) {
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




	<div class=justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">

		<?php NavBar(); ?>


		<div class="container flex flex-col justify-center m-auto px-4 mb-2 ">

			<div class="w-full flex justify-center mx-auto shadow-lg border-2  rounded-lg mb-14 ">
				<img src="../pay_plane/src/images/airplane_high.webp" class="w-full rounded-lg h-full m-auto object-cover">
			</div>




			<div class="justify-center flex  ">
				<div class="bg-white border rounded-lg shadow-sm w-full  p-4 ">

					<a href="cart_add_method.php?<?php echo "id=$_GET[id]"; ?>">
						<button class="bg-blue-500 hover:bg-blue-600 text-white w-full font-bold py-4 my-4 text-2xl rounded-lg">Add to Cart</button>
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




						<div class='border-b flex justify-between px-4 py-1 mt-4'>
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



			<div class="justify-center flex mt-4 mb-16">
				<div class="bg-white border rounded-lg shadow-sm w-full  p-4">
					<p>About</p>
					<p class=" break-words"><?php echo $about; ?></p>
				</div>
			</div>

			<?php Footer(); ?>


		</div>






	</div>
</body>

</html>