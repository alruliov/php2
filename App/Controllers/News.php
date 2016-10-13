<?php

namespace App\Controllers;



class News
{

    public function getAll()
    {


        $articles = \App\Model\News::findAllByLimit(3);
        include __DIR__ . '/../Template/article.php';

    }

    public function getOne($id)
    {
        $article= \App\Model\News::findById($id);
        include __DIR__ . '/../Template/articleOne.php';

    }

}