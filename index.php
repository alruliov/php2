<?php

require_once __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);

$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';

$ctrlClassName = '\App\Controllers\\' . $ctrlRequest;

$ctrl = new $ctrlClassName;

$actRequest = !empty($parts[2]) ? $parts[2] : 'Default';

$actMethodName = 'action' . $actRequest;


try {

    $ctrl->action($actMethodName);
} catch (\App\CustomException $e) {

    $errorPage = new \App\Controllers\Index();
    $errorPage->action404($e->getMessage());


} catch (\App\MultiException $e) {

    echo 'Errors: ';

    foreach ($e as $error) {

        echo $error->getMessage();
    }
} catch (Exception $e) {

    $errorPage = new \App\Controllers\Index();
    $errorPage->actionError();
}





