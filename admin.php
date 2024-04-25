<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
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
			<div class="bg-white border shadow-sm rounded-lg container py-6 m-auto p-4">


				<a href="admin_airplanes.php" class="w-full ">
					<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white my-4">
						<p class="font-bold px-6 py-2 text-xl m-auto">Airplanes panel</p>
					</button>
				</a>

				<table class="w-full">
					<tr>
						<th>[id]</th>
						<th>username</th>
						<th>email</th>
						<th>password</th>
						<th>role</th>
						<th>validated</th>
						<th colspan="3"></th>

					</tr>


					<?php

					try {
						$conn = ConnectToDatabase();

						$sql = "SELECT * FROM user_table";
						$result = $conn->query($sql);
						$oh_no = false;
						if ($result !== false && $result->rowCount() > 0) {
							$rowIndex = 0;


							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr>";
								foreach ($row as $key => $value) {
									if ($key !== 'user_validated') {
										$color = "";
										if ($key == 'user_id' && $value == $_SESSION['user_id']) {
											$color = 'bg-green-500';
										}
										echo "<td class='$color'>$value</td>";
									} else {
										if ($value == 1) {
											echo "<td class='text-green-500 '>True</td>";
										} else {
											echo "<td class='text-red-500'>False</td>";
										}
									}
									if (
										$key == "user_id"
									) {
										if (
											$value !=
											$_SESSION["user_id"]
										) {
											$oh_no = true;
										} else {
										}
									}
								}

								if ($oh_no) {

									echo "<td class='bg-blue-500 hover:bg-blue-600'>
            <form method='post' action='admin_methods.php'>
                <input type='hidden' name='user_id' value='$row[user_id]'>
                <button type='submit' name='execute' value='validate' class='text-white'>Validate</button>
            </form>
        </td>";

									echo "<td class='bg-yellow-500 hover:bg-yellow-600 '>
            <form method='post' action='admin_edit.php'>
                <input type='hidden' name='user_id' value='$row[user_id]'>
                <button type='submit' name='execute' value='edit' class='text-white'>✏️</button>
            </form>
        </td>";

									echo "<td class='bg-red-500 hover:bg-red-600 ' >
            <form method='post' action='admin_delete.php'>
                <input type='hidden' name='user_id' value='$row[user_id]'>
                <button  type='submit' name='execute' value='edit' class='text-white'>🗑️</button>
            </form>
        </td>";

									$oh_no = false;
								} else {
									echo "<td colspan='3'></td>";
								}

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