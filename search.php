<!doctype html>
<html>

<?php include "database.php";
session_start();
IsNotUser();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>

	<link rel="icon" type="image/png" href="../pay_plane/src/images/favicon.png">
	<title>planesforever.com -
		<?php
		echo ScriptName(); ?>
	</title>
</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
		<?php NavBar(); ?>

		<div class="container m-auto flex-col">
			<?php
			$conn = ConnectToDatabase();

			$checkStmt = $conn->prepare("SELECT * FROM airplane_table");
			$checkStmt->execute();
			$airplanes = $checkStmt->fetchAll(PDO::FETCH_OBJ);
			$shown_planes = 0;

			$rows = ceil(count($airplanes) / 3);

			for ($i = 0; $i < $rows; $i++) {
				echo '<div class="w-full flex flex-col md:flex-row gap-2 px-8 justify-center">';

				for ($j = 0; $j < 3; $j++) {
					if ($shown_planes >= count($airplanes)) {
						break;
					}
					$airplane = $airplanes[$shown_planes];
					$airplane_id = $airplane->airplane_id;

					$icon = "steering.png";
					if (str_contains($airplane->airplane_state, "broken")) {
						$icon = "broken.png";
					}


					echo "<a href='item.php?id=$airplane_id' class='bg-white border rounded-lg shadow-sm w-full md:w-1/4 mt-4 hover:border-blue-300'>
            <div class='h-36 flex'>
                <img src='../pay_plane/src/images/airplane_high.webp' class='w-full object-cover  h-36 m-auto rounded-lg'>
                <div class='bg-white rounded-full w-9 h-9 absolute flex opacity-60'>
                    <img src='../pay_plane/src/images/$icon' class='w-6 m-auto'>
                </div>
            </div>

            <h1 class='p-2'>$airplane->airplane_model</h1>
            <p class='font-bold p-2'>$airplane->airplane_price$</p>

            <div class='flex justify-between'>
                <p class='text-gray-600 p-2'>$airplane->airplane_mileage km</p>
                <p class='text-gray-600 p-2'>$airplane->airplane_year</p>
            </div>
        </a>";

					$shown_planes++;
				}

				echo '</div>';
			}


			?>


		</div>
		<?php Footer(); ?>
	</div>





	</div>

</body>

</html>