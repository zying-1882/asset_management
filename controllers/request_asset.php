<?php
	session_start();
	require_once 'helpers.php';
	$requests = get_requests();
	$assets = get_assets('../data/assets.json');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$id = $_POST['id'];
	$quantity = $_POST['quantity'];
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'][$id] = $quantity;
	} else{
		$_SESSION['cart'][$id] += $quantity;
	}
	$new_request = new stdClass();
	$new_request->username = $_SESSION['user_details']->username;
	$new_request->quantity = $_POST['quantity'];
	$new_request->name = $assets[$id]->name;
	$new_request->image = $assets[$id]->image;
	$new_request->isPending = false;
	$new_request->date_created = date("Y/m/d h:i:sa");
	array_values($_SESSION['cart']);
	$requests[] = $new_request;
	file_put_contents('../data/requests.json', json_encode($requests, JSON_PRETTY_PRINT));
	$_SESSION['class'] = "primary";
	$_SESSION['message'] = "$quantity was successfully added to cart";
	header('Location: /');
?>







