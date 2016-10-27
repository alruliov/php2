<?php

namespace App\Controllers;


use App\Controller;
use App\Model\Article;
use App\View;


class News extends Controller
{


    public function actionGetLimit()
    {
        $this->view->articles = Article::findAllByLimit(3);
        $this->view->display(__DIR__ . '/../Template/article.php');
    }

    public function actionGetOne()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Template/articleOne.php');
    }


}