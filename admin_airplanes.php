<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="/src/global.css">
	<link rel="stylesheet" href="tables.css">

	<link rel="icon" type="image/png" href="../pay_plane/src/images/favicon.png">
	<title>planesforever.com -
		<?php
		include "database.php";
		echo ScriptName(); ?>
	</title>

	<?php
	session_start();
	IsNotAdmin();
	?>


</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">

		<?php NavBar(); ?>

		<div class="gap-y-4 flex flex-col">

			<div class="bg-white border shadow-sm rounded-lg  py-6 m-auto p-4 container ">

				<div class="flex flex-row">

					<a href="admin.php" class="w-full ">
						<button class="mt-4 rounded-lg px-6 w-full bg-gray-200 border my-4">
							<p class="font-bold px-6 py-2 text-xl m-auto">Admin panel</p>
						</button>
					</a>
					<a href="admin_add.php" class="w-full ">
						<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white mt-4">
							<p class="font-bold px-6 py-2 text-xl m-auto">Add New Airplane</p>
						</button>
					</a>
				</div>

				<table class="overflow-auto w-full">
					<tr>
						<th>[id]</th>
						<th>manufacturer</th>
						<th>model</th>
						<th>mileage</th>
						<th>created product</th>
						<th>motors</th>
						<th>price</th>
						<th>lenght</th>
						<th>wingspan</th>
						<th>range</th>
						<th>seats</th>
						<th>state</th>
						<th>year</th>

						<th colspan="3">Actions</th>

					</tr>

					<?php

					try {
						$conn = ConnectToDatabase();

						$sql = "SELECT * FROM airplane_table";
						$result = $conn->query($sql);
						$oh_no = false;
						if ($result !== false && $result->rowCount() > 0) {
							$rowIndex = 0;
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr>";
								echo "<td>$row[airplane_id]</td>";
								echo "<td>$row[airplane_manufacturer]</td>";
								echo "<td>$row[airplane_model]</td>";
								echo "<td class=''>$row[airplane_mileage]km</td>";
								echo "<td class=''>$row[airplane_created]</td>";
								echo "<td class=''>$row[airplane_motors]</td>";
								echo "<td class='font-bold'>$row[airplane_price]$</td>";
								echo "<td class=''>$row[airplane_length]m</td>";
								echo "<td class=''>$row[airplane_wingspan]m</td>";
								echo "<td class=''>$row[airplane_range]km</td>";
								echo "<td class=''>$row[airplane_seats]</td>";
								echo "<td class='font-bold'>$row[airplane_state]</td>";
								echo "<td class='font-bold'>$row[airplane_year]</td>";


								echo "<td class='bg-yellow-500 hover:bg-yellow-600 '>
            <form method='post' action='admin_airplane_edit.php'>
                <input type='hidden' name='airplane_id' value='$row[airplane_id]'>
                <button type='submit' name='execute' value='edit' class='text-white'>✏️</button>
            </form>
        </td>";

								echo "<td class='bg-red-500 hover:bg-red-600 ' >
            <form method='post' action='admin_airplanes_delete_methods.php'>
                <input type='hidden' name='airplane_id' value='$row[airplane_id]'>
                <button  type='submit' name='execute' value='edit' class='text-white'>🗑️</button>
            </form>
        </td>";

								echo "</tr>";
								$rowIndex++;
							}
						}
						#echo "Query executed successfully";
					} catch (PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}
					$conn = null;
					?>
				</table>
			</div>
		</div>
		<?php Footer(); ?>
	</div>

	</div>
</body>

</html>