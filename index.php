<?php 
session_start();
 ?>
<html>
	<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Registration and Login</title>
		<style type="text/css">
		* {font-family: sans-serif;}
		.error{color: red;}
		</style>
	</head>
	<body>

	<?php



		if(isset($_SESSION['errors'])) // if there's ANYTHING inside $_SESSION['errors'] i want you to do something..
		{
			foreach ($_SESSION['errors'] as $error) // im not using the full $KEY => $VALUE pair because i have all the information i need in the $VALUE
			{  
				echo "<p class='error'>{$error} </p>";
				// echo "{$error}"; // <--- without styling
			}
			unset($_SESSION['errors']); // unsetting the 'errors' as soon as the code is executed, dont' want errors to linger.
		}
		
		// notice that we used the html on this side and not processing side - its just less data to transfer and allows me to have more styling control on this page


		if(isset($_SESSION['success_message'])) // If successfully registered - display this message //
		{
			echo "<p class='success_message'>{$_SESSION['success_message']} </p>";
			unset($_SESSION['success_message']);
		}



	?>


		<h2>Register</h2>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register">
				First Name: <input type="text" name="first_name"><br>
				Last Name: <input type="text" name="last_name"><br>
				Email Address:  <input type="text" name="email"><br>
				Password: <input type="password" name="password"><br>
				Confirm Password: <input type="password" name="confirm_password"><br>
			<input type="submit" value="register">
		</form>
		<h2>Login</h2>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="login">
				Email Address: <input type="text" name="email"><br>
				Password: <input type="password" name="password"><br>
			<input type="submit" value="login">
		</form>
	</body>
</html>

