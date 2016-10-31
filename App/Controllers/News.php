<?php

namespace App\Controllers;


use App\Controller;
use App\CustomException;
use App\Model\Article;
use App\View;


class News extends Controller
{


    public function actionGetLimit()
    {
        $articles = Article::findAllByLimit(3);
        if (empty($articles)){

            $e = new CustomException('По вашему запросу ничего не найдено');
            throw $e;

        }
        $this->view->articles = $articles;
        $this->view->display(__DIR__ . '/../Template/article.php');
    }

    public function actionGetOne()
    {
        $article = Article::findById($_GET['id']);
        if (empty($article)){

            $e = new CustomException('По вашему запросу ничего не найдено');
            throw $e;

        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Template/articleOne.php');
    }


}