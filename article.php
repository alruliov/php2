<?php

require_once __DIR__ . '/autoload.php';

$news = new \App\Controllers\News();

$news->getOne($_GET['id']);
