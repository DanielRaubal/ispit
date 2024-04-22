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
		$currentPage = $_SERVER['SCRIPT_NAME'];
		echo basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>
	</title>

	<?php

	include "database.php";
	session_start();

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO user_table (user_name, user_email, user_password,user_role)
  VALUES ('Daniel', 'Raubal', 'john@example.com','user')";
		// use exec() because no results are returned
		// $conn->exec($sql);
		echo "New record created successfully";
	} catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;



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
							<a href="logout.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>




		<div class="gap-y-4 flex flex-col">

			<div class="bg-white border shadow-sm rounded-lg w-2/3 py-6 m-auto p-4">

				<table>
					<tr>
						<th>[id]</th>
						<th>model</th>
						<th>manufacturer</th>
						<th>price</th>
						<th>created</th>
						<th>year</th>
						<th>state</th>
						<th colspan="3"></th>

					</tr>

					<!-- <tr>
					<td>1</td>
					<td>Maria Anders</td>
					<td>Germany@gmail.com</td>
					<td>123413</td>
					<td>admin</td>
					<td class="border-2 border-red-600 text-center text-red-600">Yes</td>
					<td class="border-2 border-black bg-blue-600 text-center text-white"><button>Validate</button></td>
				</tr> -->

					<?php

					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						// set the PDO error mode to exception
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$sql = "SELECT * FROM airplane_table";
						$result = $conn->query($sql);
						$oh_no = false;
						if ($result !== false && $result->rowCount() > 0) {
							// Output data of each row
							$rowIndex = 0; // Initialize row index


							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<tr>";
								echo "<td>$row[airplane_id]</td>";
								echo "<td>$row[airplane_model]</td>";
								echo "<td>$row[airplane_manufacturer]</td>";
								echo "<td class='font-bold'>$row[airplane_price]$</td>";
								echo "<td class='font-bold'>$row[airplane_created]</td>";
								echo "<td class='font-bold'>$row[airplane_year]</td>";
								echo "<td class='font-bold'>$row[airplane_state]</td>";





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


								// if($row["user_id"] == )
								// {

								// }




								echo "</tr>";

								$rowIndex++; // Increment row index
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







	</div>
</body>

</html>