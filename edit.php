<?php

require_once __DIR__ . '/autoload.php';


$admin = new \App\Controllers\Admin();

if (isset($_GET['id'])){
    $admin->edit($_GET['id']);
}else{
    $admin->createNews();
}




