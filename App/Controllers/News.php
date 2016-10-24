<?php

namespace App\Controllers;


use App\Model\Article;
use App\View;


class News
{

    public function getLimit()
    {
        $view = new View();
        $view->articles = Article::findAllByLimit(3);
        $view->display(__DIR__ . '/../Template/article.php');
    }

    public function getOne(int $id)
    {
        $view = new View();
        $view->article = Article::findById($id);
        $view->display(__DIR__ . '/../Template/articleOne.php');
    }


}