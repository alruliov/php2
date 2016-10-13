<?php

require_once __DIR__ . '/autoload.php';

$news = new \App\Model\Articles();

$articles = $news->getAllByLimit(3);

include __DIR__ . '/App/Template/article.php';



