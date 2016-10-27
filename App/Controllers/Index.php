<?php


namespace App\Controllers;


use App\Model\Article;
use App\View;

class Index
{

    public function actionDefault()
    {
        $view = new View();
        $view->articles = Article::findAllByLimit(3);
        $view->display(__DIR__ . '/../Template/article.php');
    }

}