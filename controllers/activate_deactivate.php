<?php 
session_start();
require_once "helpers.php";
$assets= get_assets("../data/assets.json");
$id= $_GET["id"];

if($assets[$id]->isActive){
	$assets[$id]->isActive= false;
}else if($quantity== 0){
	$assets[$id]->isActive= false;
}else{
	$assets[$id]->isActive=true;
}

file_put_contents("../data/assets.json", json_encode($assets, JSON_PRETTY_PRINT));

$_SESSION["class"]=$assets[$id]->isActive ?"info" : "warning";
$_SESSION["message"]=$assets[$id]->isActive ?"Item activated" : "Item deactivated";


header('Location: ' . $_SERVER['HTTP_REFERER']);




 ?>