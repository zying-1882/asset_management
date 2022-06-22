<?php
session_start();
require_once 'helpers.php';
$id = $_GET['id'];
$assets = get_assets("../data/assets.json");


array_splice($assets, $id, 1);

file_put_contents('../data/assets.json', json_encode($assets, JSON_PRETTY_PRINT));

$_SESSION['class'] = "danger";
$_SESSION['message'] = "Product was successfully deleted";

header('Location: /');
?>