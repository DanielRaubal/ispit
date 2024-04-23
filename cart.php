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

		td tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>

</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
		<?php NavBar(); ?>

		<div class="gap-y-4 flex flex-col">

			<div class="bg-white border shadow-sm rounded-lg container py-6 m-auto p-4">

				<table>
					<tr>
						<th>[id]</th>
						<th>airplane unique id</th>
						<th>model</th>
						<th>price</th>


					</tr>

					<?php
					$price = 0;
					$index = 0;
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						// set the PDO error mode to exception
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						// Assuming $_SESSION['user_id'] contains the user's ID
						$user_id = $_SESSION['user_id'];
						$sql = "SELECT * FROM cart_table WHERE cart_user_id = :user_id";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
						$stmt->execute();
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

						$oh_no = false;
						if ($result !== false && count($result) > 0) {
							echo "<table>"; // Start table
							echo "<tr><th>Index</th><th>Cart Airplane ID</th><th>Airplane Model</th><th>Airplane Price</th><th>Action</th></tr>"; // Table headers

							foreach ($result as $row) {
								$cart_airplane_id = $row["cart_airplane_id"];

								// Fetch airplane details
								$airplaneQuery = "SELECT * FROM airplane_table WHERE airplane_id = :cart_airplane_id";
								$airplaneStmt = $conn->prepare($airplaneQuery);
								$airplaneStmt->bindParam(':cart_airplane_id', $cart_airplane_id, PDO::PARAM_INT);
								$airplaneStmt->execute();
								$airplane = $airplaneStmt->fetch(PDO::FETCH_ASSOC);

								if ($airplane) {
									echo "<tr>";
									echo "<td>$index</td>";
									echo "<td>$cart_airplane_id</td>";
									echo "<td><a href='item.php?id=$cart_airplane_id' class='text-blue-500 underline'>{$airplane['airplane_model']}</a></td>";
									echo "<td>{$airplane['airplane_price']}$</td>";
									$price += $airplane["airplane_price"];
									$index++;

									echo "<td class='bg-red-500 hover:bg-red-600'>
                    <form method='post' action='cart_delete_methods.php'>
                        <input class='w-full' type='hidden' name='cart_id' value='{$row['cart_id']}'>
                        <button type='submit' name='execute' value='edit' class='text-white'>🗑️</button>
                    </form>
                </td>";

									echo "</tr>";
								}
							}

							echo "</table>"; // End table
						} else {
							echo "No rows found in cart_table.";
						}

						echo "<p class='text-2xl mt-4'>Total Price: $price$</p>";
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
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