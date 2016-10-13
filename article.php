<?php

require_once __DIR__ . '/autoload.php';

$news = new \App\Model\Articles();

$article = $news->getOne($_GET['id']);

include __DIR__ . '/App/Template/articleOne.php';

