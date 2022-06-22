<?php 

function get_users(){
	$data= file_get_contents("../data/users.json");
	$users= json_decode($data);
	return $users;
}

function get_assets($url){
		$data = file_get_contents($url);
		$assets = json_decode($data);
		return $assets;
	}

function get_requests(){
	$data= file_get_contents("../data/requests.json");
	$requests= json_decode($data);
	return $requests;
}

function get_returns(){
	$data= file_get_contents("../data/returns.json");
	$returns= json_decode($data);
	return $returns;
}








 ?>