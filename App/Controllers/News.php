<?php

namespace App\Controllers;


use App\Controller;
use App\CustomException;
use App\Model\Article;


class News extends Controller
{

    /**
     * Twig
     * @throws CustomException
     */
    public function actionGetLimit()
    {
        $articles = Article::findAllByLimit(3);
        if (empty($articles)) {

            $e = new CustomException('По вашему запросу ничего не найдено');
            throw $e;

        }
        $this->view->twig('article.php', $articles);
    }

    public function actionGetOne()
    {
        $article = Article::findById($_GET['id']);
        if (empty($article)) {

            $e = new CustomException('По вашему запросу ничего не найдено');
            throw $e;

        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Template/articleOne.php');
    }


}