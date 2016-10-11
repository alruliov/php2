<?php

require_once __DIR__ . '/autoload.php';

$articles = new \App\Model\Articles();
$articles->getArticles();


?>
