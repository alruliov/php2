<?php

namespace App\Controllers;

class News
{

    public function getAll()
    {

        $news = new \App\Model\Articles();
        $article = $news::findAllByLimit(3);
        include __DIR__ . '/../Template/article.php';

    }

    public function getOne($id)
    {
        $news = new \App\Model\Articles();
        $article = $news::findById($id);
        include __DIR__ . '/../Template/articleOne.php';

    }

}