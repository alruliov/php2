<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$parts = explode('/', $url);

$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';

$actionRequest = !empty($parts[2]) ? $parts[2] : 'Default';



$controller = New \App\Controller();

$controller->action($ctrlRequest, $actionRequest);



$url = $_SERVER['REQUEST_URI'];

$parts = explode('/', $url);

$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';

$actionRequest = !empty($parts[2]) ? $parts[2] : 'Default';




