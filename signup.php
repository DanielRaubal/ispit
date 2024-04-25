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
	?>

</head>

<body>
	<div class="justify-between flex flex-col absolute inset-0 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">

		<?php NavBar(); ?>

		<div class="bg-white border shadow-sm md:w-96 rounded-lg w-1/2 py-6 m-auto">
			<form action="signup_methods.php " method="post">
				<div class="border-red-500 px-4">
					<h1 class="font-bold text-gray-400 pb-2 text-3xl">Create account</h1>


					<div class="bg-white border rounded-lg p-6">
						<label for="username">Username</label>
						<input class="border-b w-full py-2" type="text" placeholder="username" id="username" name="username" required><?php if (isset($_POST["username"])) ?></input>
					</div>

					<div class="bg-white border mt-4 rounded-lg p-6">
						<label for="email">Email Adress</label>
						<input class="border-b w-full py-2" type="email" placeholder="example@gmail.com" id="email" name="email" required>
					</div>

					<div class="bg-white border mt-4 rounded-lg p-6">
						<label for="password">Password</label>
						<input class="border-b w-full py-2" type="password" placeholder="" id="password" name="password" required>
					</div>

					<div class="bg-white border mt-4 rounded-lg p-6">
						<label for="password_repeat">Repeat Password</label>
						<input class="border-b w-full py-2" type="password" placeholder="" id="password_repeat" name="password_repeat" required>
					</div>

					<button class="bg-white border mt-4 rounded-lg px-6 w-full hover:bg-blue-500 hover:text-white">
						<p class="font-bold px-6 py-2 text-xl m-auto ">Create Account</p>
					</button>
					<div class="flex flex-row justify-between px-4 mt-4">
						<a href="#" class="hover:text-blue-500 cursor-pointer">No account? Signup</a>

						<a href="#" class="hover:text-blue-500 cursor-pointer">Forgot password?</a>
					</div>
				</div>
			</form>
			<h1 class="font-bold text-blue-500 pb-2 text-1xl text-center mt-8">
				<?php
				if (isset($_SESSION['user_created'])) {
					echo $_SESSION['user_created'];
					$_SESSION['user_created'] = "";
				}
				?></h1>

		</div>

		<?php Footer(); ?>

	</div>

	</div>
</body>

</html>