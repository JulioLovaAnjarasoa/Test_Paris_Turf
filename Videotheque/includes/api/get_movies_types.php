<?php
$curl_handle = curl_init();
$url = "https://api.themoviedb.org/3/movie/550?api_key=" . $apiKey;
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// $apikey = '0148008b28889bb0bb68b0c050c4306b';
// curl_setopt($curl_handle, CURLOPT_USERPWD, $apiKey . ":");
$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);
$response_data = json_decode($curl_data);
print_r($response_data);
// echo 'here again';
