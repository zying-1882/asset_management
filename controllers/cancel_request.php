<?php
session_start();
require_once 'helpers.php';
$requests = get_requests();
$id= $_GET["id"];
//var_dump($id);
//die();
unset($_SESSION['cart'][$_GET['id']]);

	array_splice($requests, $id, 1);
	file_put_contents('../data/requests.json', json_encode($requests, JSON_PRETTY_PRINT));

if(count($_SESSION['cart']) < 1){
	unset($_SESSION['cart']);
}

$_SESSION['class'] = "primary";
$_SESSION['message'] = "The item is cancel";

header('Location: '.$_SERVER['HTTP_REFERER']);
?>