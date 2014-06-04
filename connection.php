<?php 
//define constants for db_host, db_user, db_pass, and db_database
//adjust the values below to match your database settings
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root'); //set DB_PASS as 'root' if you're using MAMP
define('DB_DATABASE', 'mydb');

//connect to database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

// check connection
if (mysqli_connect_errno())
{
	echo "error connecting to database:<br>";
	echo mysqli_connect_errno();
	exit();
}
 ?>


