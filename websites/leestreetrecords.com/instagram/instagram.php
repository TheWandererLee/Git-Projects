<?php
header('Content-type: application/json');

$user_id = '1519210386'; //Replace with your user_id
$access_token = '1519210386.4fd7245.a4fe492862b34111af0ecea2c7589c66'; //Replace with your access_token
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