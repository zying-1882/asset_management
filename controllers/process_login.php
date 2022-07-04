<?php
require_once "helpers.php"; 
$users = get_users();
$username= $_POST["username"];
$department= $_POST["department"];
$password= $_POST["password"];

$data= file_get_contents("../data/users.json");
$users= json_decode($data);

foreach((array)$users as $indiv_user) {
	if($indiv_user->username == $username && $indiv_user->department == $department  && password_verify($password, $indiv_user->password)) {
		session_start();
		$_SESSION["user_details"]=$indiv_user;
		header("Location:/");
	}
}
echo "No user found / Wrong credentials";
echo "<br>";
echo "<a href='/views/forms/register.php'>Go to register</a>";

 ?>
