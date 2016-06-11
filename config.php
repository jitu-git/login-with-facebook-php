<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$baseUrl = "http://minmarks.com/demo/login-with-facebook-php/";

$fb = new Facebook\Facebook([
    'app_id' => '478065662390866',
    'app_secret' => 'f5b37501caca45a952890f4b860da50b',
    'default_graph_version' => 'v2.5',
]);