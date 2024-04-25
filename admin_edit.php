<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>


	<link rel="icon" type="image/png" href="../pay_plane/src/images/favicon.png">
	<title>planesforever.com -
		<?php
		include "database.php";
		echo ScriptName(); ?>
	</title>

	<?php
	session_start();
	IsNotAdmin();

	$conn = ConnectToDatabase();

	$userId = $_POST['user_id'];
	$_SESSION['user_id'] = $userId;

	$stmt = $conn->prepare("SELECT * FROM user_table WHERE user_id = :userId");
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		$username = $user['user_name'];
		$email = $user['user_email'];
		$password = $user['user_password'];
		$role = $user['user_role'];
		$validated = $user['user_validated'];
	} else {
		echo "User not found";
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

		<div class="gap-y-4 flex flex-col">

			<div class="bg-white border shadow-sm rounded-lg w-2/3 py-6 m-auto p-4">
				<form action="admin_edit_methods.php " method="post">
					<div class="border-red-500 px-4">
						<h1 class="font-bold text-gray-400 pb-2 text-3xl">Edit account</h1>


						<div class="bg-white border rounded-lg p-2 mb-2 font-bold">
							<label name="id">ID: <?php echo $userId; ?> </label>
						</div>

						<div class="bg-white border rounded-lg p-6">
							<label for="username">Username</label>
							<input class="border-b w-full py-2" type="text" placeholder="username" name="username" value="<?php echo $username; ?>">
						</div>

						<div class="bg-white border mt-4 rounded-lg p-6">
							<label for="email">Email Adress</label>
							<input class="border-b w-full py-2" type="text" placeholder="example@gmail.com" name="email" value="<?php echo $email; ?>">
						</div>

						<div class="bg-white border mt-4 rounded-lg p-6">
							<label for="password">Password</label>
							<input class="border-b w-full py-2" type="text" placeholder="" name="password" value="<?php echo $password; ?>">
						</div>

						<div class="bg-white border mt-4 rounded-lg p-6 flex flex-col">
							<label for="roles">Role</label>
							<select name="roles" id="roles" class="px-2 bg-white border rounded-sm p-2">
								<option value="user" <?php if ($role === 'user')
															echo 'selected="selected"'; ?>>user</option>
								<option value="admin" <?php if ($role === 'admin')
															echo 'selected="selected"'; ?>>admin</option>
							</select>
						</div>

						<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white">
							<p class="font-bold px-6 py-2 text-xl m-auto ">Make Changes To Account</p>
						</button>

					</div>
				</form>
				<form action="admin_delete.php ">
					<div class="border-red-500 px-4">
						<button class="bg-red-500 border mt-2 rounded-lg px-6 w-full  text-white hover:bg-red-600">
							<p class="font-bold px-6 py-1 text-xl m-auto ">Delete Account</p>
						</button>
					</div>
				</form>
			</div>

		</div>

		<?php Footer(); ?>

	</div>
	</div>
</body>

</html>