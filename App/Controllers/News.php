<?php

namespace App\Controllers;


use App\Model\Article;


class News
{

    public function getAll()
    {

        $articles = Article::findAllByLimit(3);
        include __DIR__ . '/../Template/article.php';

    }

    public function getOne(int $id)
    {
        $article = Article::findById($id);
        include __DIR__ . '/../Template/articleOne.php';

    }
   

}