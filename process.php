<?php 
session_start();

require_once('connection.php');


if(isset($_POST['action']) && $_POST['action'] == 'register')
{
	// var_dump($_POST);
		 //  'action' => string 'register' <-- this is how if(isset($_POST['action']) && $_POST['action'] == 'register') is working
		 //  'first_name' => string 'jason' 
		 //  'last_name' => string 'grote' 
		 //  'email' => string 'jgrote111@gmail.com' 
		 //  'password' => string 'Genesis11' 
		 //  'confirm_password' => string 'Genesis11' 


	// call to function
	register_user($_POST); // use the ACTUAL POST
}

if(isset($_POST['action']) && $_POST['action'] == 'login')
{
	// var_dump($_POST);
		 //  'action' => string 'login' <-- this is how if(isset($_POST['action']) && $_POST['action'] == 'login') is working
		 //  'email' => string 'jgrote111@gmail.com'
		 //  'password' => string 'Genesis11'
	// call to function
	login_user($_POST); // use the ACTUAL POST
}


// now just making a function to pass my $_POST data through here
function register_user() // just a parameter call post to remind myself what im trying to do with the funciton
{
require_once('connection.php');
// ................. begin validation checks ................. //


	 // so here we are just making a variable in the $_SESSION table, that is actually an array
	 // (to hold multiple possible values we might want to execute in future depending on some if statements)
	 // so i am actually SETTING these 'errors' arrays below within if statements

	$_SESSION['errors'] = array();




	if(empty($post['first_name']))
	{
		$_SESSION['errors'][] = "first name can't be blank bro!";

		// added a NEW ARRAY VALUE to the 'errors' ARRAY WITHIN $_SESSION - which is why we called it
		// $_SESSION['errors'].. and then appended [] to it.. this set whatever we put it "equal to" (=) to go in that new ARRAY --> []
	}




	if(empty($post['last_name']))
	{
		$_SESSION['errors'][] = "last name can't be blank bro!";
	}





	if(empty($post['password']))
	{
		$_SESSION['errors'][] = "password can't be blank bro!";
	}





	if($post['password'] !== $post['confirm_password'])
	{
		$_SESSION['errors'][] = "passwords must match!";
	}





	if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['errors'][] = "hah, that's totally not a valid email";
	}



// ................. end of validation checks ................. //




	if(count($_SESSION['errors']) > 0) // if I have ANY errors at all....
	{

		// header('location: index.php');  // ....it directs them to here. (IF ERRORS are > than 0)
		// die();
		echo "you didn't validate correctly brosef"; // <-- echo before setting the $_SESSION ERRORS to ensure validation

	}
	else // now you need to INSERT the DATA into the DATABASE //
	{

		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
				  VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['email']}', '{$post['password']}',
				  NOW(), NOW())"; // <--- created at, updated at

		// echo $query; // <-- echo my queries and copy paste them into mysql to catch errors
		// die();

		// global $connection;
		mysqli_query($connection, $query); // The mysql_query() function executes a query on a MySQL database.
		

		
		$_SESSION['success_message'] = 'Wow. User created. Much Success.'; // the message to the front end user

		header('location: index.php');
		die();


	}

}


// // now just making a function to pass my $_POST data through here
// function login_user($post) // just a parameter call post to remind myself what im trying to do with the funciton
// {
// 	$query = "SELECT * FROM users WHERE users.password = '{$post['password']}'
// 			AND users.email = '{$post['email']}'";
			
// 	$user = fetch_all($query); // go and attempt to grab user with above credentials.

// 	if(count($user) > 0)
// 	{
// 		$_SESSION['user_id'] = $user[0]['id'];
// 		$_SESSION['first_name'] = $user[0]['first_name'];
// 		$_SESSION['logged_in'] = TRUE;
// 		header('location: success.php');
// 	}
// 	else
// 	{
// 		$_SESSION['errors'][] = "Cant find user with those credentials";
// 		header('location.php');
// 		die();
// 	}
// }



?>