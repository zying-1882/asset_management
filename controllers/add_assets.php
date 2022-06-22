<?php
session_start();
require_once 'helpers.php';
$assets = get_assets('../data/assets.json');

$asset_name = htmlspecialchars($_POST['asset_name']);
$category = htmlspecialchars($_POST['category']);
$quantity = htmlspecialchars($_POST['quantity']);

$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmpname = $_FILES['image']['tmp_name'];
$img_type = pathinfo($img_name, PATHINFO_EXTENSION);

$is_img = false;
$has_details = false;

if($img_type == "jpg" || $img_type == "png" || $img_type == "jpeg" || $img_type == "svg" || $img_type == "gif"){
	$is_img = true;
} else{
	echo "Please upload an image file";
}

if(strlen($asset_name) > 0 && intval($quantity) > 0 && strlen($category) > 0){
	$has_details = true;
}

if($has_details && $is_img && $img_size > 0){
	$asset = new stdClass();
	$asset->name = $asset_name;
	$asset->quantity = $quantity;
	$asset->category = $category;
	$asset->image = "/assets/img/".$img_name;
	$asset->isActive = true;

	move_uploaded_file($img_tmpname, '../assets/img/'.$img_name);

	$assets[] = $asset;

	file_put_contents('../data/assets.json', json_encode($assets, JSON_PRETTY_PRINT));
}

$_SESSION['class'] = "primary";
$_SESSION['message'] = "Product was successfully added";

header('Location: /');

?>