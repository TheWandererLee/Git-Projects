<?php
header('Content-type: application/json');

$user_id = '1285162506'; //Replace with your user_id
$access_token = '1285162506.3ba6126.aab49354623d495580c9c2a4a0efbef1'; //Replace with your access_token
$number_photos = '8';

$api_url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $access_token . '&count=' . $number_photos;

function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}

$result = fetchData($api_url);
$result = json_encode($result);

echo $result;

?>