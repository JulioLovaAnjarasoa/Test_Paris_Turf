<?php

function get_api($url)
{
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $curl_data = curl_exec($curl_handle);

    curl_close($curl_handle);
    $response_data = json_decode($curl_data, true);

    return $response_data;
}
