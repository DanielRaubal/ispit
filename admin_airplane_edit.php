<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>

	<link rel="icon" type="image/png" href="src/images/favicon.png">
	<title>planesforever.com -
		<?php
		include "database.php";
		echo ScriptName(); ?>
	</title>

	<?php
	session_start();
	IsNotAdmin();

	$conn = ConnectToDatabase();

	if (!isset($_POST['airplane_id'])) {
		header("Location: admin_airplanes.php");
		die();
	}

	$airplane_id = $_POST['airplane_id'];
	echo "AIRCRAFT|||$airplane_id|||| <br><br>";

	$_SESSION['airplane_id'] = $airplane_id;

	$stmt = $conn->prepare("SELECT * FROM airplane_table WHERE airplane_id = :airplane_id");
	$stmt->bindParam(':airplane_id', $airplane_id);
	$stmt->execute();


	if ($stmt->columnCount() > 0) {
		$airplane = $stmt->fetch(PDO::FETCH_ASSOC);

		echo "<pre>";
		print_r($airplane);
		echo "</pre>";

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
	} else {
		echo "Airplane not found";
	}

	if ($result) {
		echo "Query executed successfully!";
	} else {
		echo "Error executing query.";
	}

	?>

</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">

		<?php NavBar(); ?>

		<div class="gap-y-4 flex flex-col m-auto">

			<div class="bg-white border shadow-sm rounded-lg container py-6 m-auto flex  p-4">
				<form action="admin_airplane_edit_methods.php" method="post">
					<div class="border-red-500 px-4">
						<h1 class="font-bold text-gray-400 pb-2 text-3xl">Edit Aircraft</h1>

						<p class="font-bold text-gray-400 pb-2 text-xl">
							<?php if (isset($_SESSION['airplane_created']) && $_SESSION['airplane_created'] != "") {
								echo "Message: $_SESSION[airplane_created]";
								$_SESSION["airplane_created"] = "";
							} ?>
						</p>

						<label for="model">Aircraft model name</label>
						<input class="border-b w-full py-2" type="text" placeholder="model" name="model" value="<?php echo $model; ?>" required>

						<label for="manufacturer">Manufacturer name</label>
						<input class="border-b w-full py-2" type="text" placeholder="manufacturer" name="manufacturer" value="<?php echo $manufacturer; ?>" required>

						<label for="mileage">Mileage (in kilometers)</label>
						<input class="border-b w-full py-2" type="number" placeholder="mileage" name="mileage" value="<?php echo $mileage; ?>" required>

						<label for="year">Manufacturing year</label>
						<input class="border-b w-full py-2" type="number" placeholder="year" name="year" value="<?php echo $year; ?>" required>

						<label for="motors">Motors</label>
						<input class="border-b w-full py-2" type="number" placeholder="motors" name="motors" value="<?php echo $motors; ?>" required>

						<label for="price">Price</label>
						<input class="border-b w-full py-2" type="number" placeholder="price" name="price" value="<?php echo $price; ?>" required>

						<label for="about">About</label>
						<input class="border-b w-full py-2" type="text" placeholder="about" name="about" value="<?php echo $about; ?>" required>

						<label for="length">Length (in meters)</label>
						<input class="border-b w-full py-2" type="number" placeholder="length" name="length" value="<?php echo $length; ?>" required>

						<label for="wingspan">Wingspan (in meters)</label>
						<input class="border-b w-full py-2" type="number" placeholder="wingspan" name="wingspan" value="<?php echo $wingspan; ?>" required>

						<label for="range">Range (in kilometers)</label>
						<input class="border-b w-full py-2" type="number" placeholder="range" name="range" value="<?php echo $range; ?>" required>

						<label for="seats">Seats</label>
						<input class="border-b w-full py-2" type="number" placeholder="seats" name="seats" value="<?php echo $seats; ?>" required>

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
		</div>
		<?php Footer(); ?>

	</div>
</body>

</html>