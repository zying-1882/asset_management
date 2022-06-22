<?php
	session_start();
	require_once 'helpers.php';
	$assets = get_assets('../data/assets.json');

	$id = intval($_POST['id']);
	$name = htmlspecialchars($_POST['asset_name']);
	$quantity = intval($_POST['quantity']);
	$category = htmlspecialchars($_POST['category']);
	$current_image = htmlspecialchars($_POST['current_image']);

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$img_tmpname = $_FILES['image']['tmp_name'];
	$img_type = pathinfo($img_name, PATHINFO_EXTENSION);

	$is_img = false;
	$has_details = false;

	$updated_asset = $assets[$id];
	$updated_asset->name = $name;
	$updated_asset->quantity = $quantity;
	$updated_asset->category = $category;

	 if($quantity == 0){
	 	$has_details = true;
	 	$assets[$id]->isActive = false;
	 }

	if(strlen($name) > 0 && $quantity > 0 && strlen($category)> 0){
		$has_details = true;
	}

	if($_FILES && $_FILES['image']['error'] == 0){
		if($img_type == "jpg" || $img_type == "png" || $img_type == "jpeg" || $img_type == "svg" || $img_type == "gif"){
			$is_img = true;
		} else{
			echo "Please upload an image file";
		}
		if($img_size > 0 && $is_img){
			move_uploaded_file($img_tmpname, '../assets/img/'.$img_name);
		}
		$updated_asset->image = "/assets/img/".$img_name;
	} else {
		$updated_asset->image = $current_image;
	}

	if($has_details){
		$assets[$id] = $updated_asset;
		file_put_contents('../data/assets.json', json_encode($assets, JSON_PRETTY_PRINT));
		$_SESSION['class'] = "primary";
		$_SESSION['message'] = "Product has been updated successfully";
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>




































