<?php

require_once __DIR__ . '/autoload.php';

$admin = new \App\Controllers\Admin();

$admin->delete($_GET['id']);
