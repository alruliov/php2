<?php

require_once __DIR__ . '/autoload.php';

$article = new \App\Model\Articles();
$article->getOneArticle($_GET['id']);

