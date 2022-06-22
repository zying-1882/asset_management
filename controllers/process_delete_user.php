<?php 
session_start();
require_once 'helpers.php';
$id = $_GET['id'];
$users = get_users();

array_splice($users, $id, 1);

file_put_contents('../data/users.json', json_encode($users, JSON_PRETTY_PRINT));

header('Location: /');
?>