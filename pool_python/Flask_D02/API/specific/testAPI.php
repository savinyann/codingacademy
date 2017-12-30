<?php
	$curl = curl_init();
	$data = [];
	$data['username'] = $argv[1];
	$data['password'] = $argv[2];
	curl_setopt_array($curl, array
	(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'http://localhost:5000/login_api',
		CURLOPT_USERAGENT => 'Codular Sample cURL Request',
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $data
	));
$resp = curl_exec($curl);
curl_close($curl);
var_dump((json_decode($resp)));
?>