<?php

namespace App\Controllers;



class News
{

    public function getAll()
    {

        $articles = \App\Model\Article::findAllByLimit(3);
        include __DIR__ . '/../Template/article.php';

    }

    public function getOne(int $id)
    {
        $article= \App\Model\Article::findById($id);
        include __DIR__ . '/../Template/articleOne.php';

    }

}