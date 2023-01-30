<?php

include 'api/get_movies_types.php';
require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV['API_KEY'];

print_r($apiKey);
