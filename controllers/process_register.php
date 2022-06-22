<?php
session_start(); 
require_once "helpers.php";


$fullname= $_POST["fullname"];
$department= $_POST["department"];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if(isset($_FILES["image"]["name"])){
	$img_name= $_FILES["image"]["name"];
}
if(isset($_FILES["image"]["size"])){
	$img_size= $_FILES["image"]["size"];
}
if(isset($_FILES["image"]["tmp_name"])){
	$img_tmpname= $_FILES["image"]["tmp_name"];
}

$img_type= pathinfo($img_name, PATHINFO_EXTENSION);
$users = get_users();
$is_img= false;

$errors=0;
$existing= false;

if($img_type == "jpg" || $img_type == "png" || $img_type == "jpeg" || $img_type == "svg" || $img_type == "gif"){
	$is_img= true;
}else{
	echo "Please upload an image file";
}

if(strlen($username) <8){
	$errors++;
	echo "Username should be atleast 8 characters";
}

if(strlen($department) <2){
	$errors++;
	echo "Department should be atleast 2 characters";
}

if($password != $password2){
	$errors++;
	echo "Passwords do not match";
}

if(strlen($password) <8 || strlen($password2)<8 ){
	$errors++;
	echo "Password should be atleast 8 characters";
}

foreach($users as $indiv_user){
	if($indiv_user->username == $username){
		$existing= true;
	}
}

if($existing){
	$errors++;
	echo "Username already exists";
}

if(strlen($fullname)<2){
	$errors++;
	echo "Fullname must be greater than 2 characters";
}

if($errors == 0 || $is_img && $img_size >0){
	$user= new stdClass();
	$user->fullname= $fullname;
	$user->department= $department;
	$user->username= $username;
	$user->image= "/assets/img/".$img_name;
	$user->password= password_hash($password,PASSWORD_DEFAULT);
	$user->isAdmin= false;

	move_uploaded_file($img_tmpname, "../assets/img/".$img_name);


	$users[]= $user;

	file_put_contents("../data/users.json", json_encode($users,JSON_PRETTY_PRINT));

	header("Location: /");
}
?>