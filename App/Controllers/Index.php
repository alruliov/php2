<?php


namespace App\Controllers;


use App\Controller;
use App\Model\Article;
use App\View;

class Index
    extends Controller
{

    public function actionDefault()
    {

        $this->view->articles = Article::findAllByLimit(3);
        $this->view->display(__DIR__ . '/../Template/article.php');
    }

    public function action404($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../Template/404.php');

    }

    public function actionErrorPage()
    {

        $this->view->display(__DIR__ . '/../Template/errorPage.php');

    }

}