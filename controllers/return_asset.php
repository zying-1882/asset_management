<?php
	session_start();
	require_once 'helpers.php';
	$returns = get_returns();
	$assets = get_assets('../data/assets.json');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$id = $_POST['id'];
	
	$new_return = new stdClass();
	$new_return->username = $_SESSION['user_details']->username;
	$new_return->quantity = $_POST['quantity'];
	$new_return->quantity_damage = $_POST['quantity_damage'];
	$new_return->name = $assets[$id]->name;
	$new_return->image = $assets[$id]->image;
	$new_return->isPending = false;
	$new_return->date_created = date("Y/m/d h:i:sa");
	array_values($_SESSION['cart']);
	$returns[] = $new_return;
	file_put_contents('../data/returns.json', json_encode($returns, JSON_PRETTY_PRINT));
	
	$_SESSION['class'] = "primary";
	$_SESSION['message'] = "The item is return";
	header('Location: /');
?>


Message Tengku Aliya






















