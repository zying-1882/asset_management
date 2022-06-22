<?php 
session_start();
require_once "helpers.php";
$id = $_POST['id'];
$users = get_users();
$username= $_POST["username"];
$user;

if(isset($_POST['new_password'])){
	$new_password= $_POST["new_password"];
}
if(isset($_POST['password_comfirm'])){
	$password_comfirm= $_POST["password_comfirm"];
}

$existing= false;
$errors=0;

foreach((array)$users as $indiv_user){
	if($indiv_user->username == $username){
		$existing= true;
		$user= $indiv_user;
	}


	
	if($new_password != $password_comfirm){
	$errors++;
	echo "Passwords do not match";
}

	if(strlen($new_password) <8 || strlen($password_comfirm)<8 ){
	$errors++;
	echo "Password should be atleast 8 characters";
}

	if($errors == 0){
	//$updated_user= $users[$id];
	//$updated_user->password= password_hash($new_password,PASSWORD_DEFAULT);
	//$updated_user->new_password= $password;

	//$users[$id]= $updated_user;
		//$users[$id]->password= password_hash($new_password,PASSWORD_DEFAULT);
		$indiv_user->password= password_hash($new_password,PASSWORD_DEFAULT);
	

	file_put_contents("../data/users.json", json_encode(array_values($users),JSON_PRETTY_PRINT));

	header("Location: /");
}
}