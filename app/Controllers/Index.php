<?php


namespace App\Controllers;


use App\Controller;
use App\Model\Article;
use App\MultiException;
use App\View;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $articles = Article::findAllByLimit(3);
        $this->view->twig('article.php', ['articles'=> $articles]);
    }


    public function action404($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../Template/404.php');

    }

    public function actionError()
    {

        $this->view->display(__DIR__ . '/../Template/errorPage.php');

    }

    public function actionTestMultiException(){
        $errors  = new MultiException();
        $article = new Article();

        $article->fill([
            'id' => '1',
            'title' => 'Новые приключения!!!',
            'text' => '',
            'author_id' => '2',

        ]);

        if (empty($article->id)){
            $errors->add(new MultiException('Пустой id'));
        }
        if (empty($article->title)){
            $errors->add(new MultiException('Пустой title'));
        }
        if (empty($article->text)){
            $errors->add(new MultiException('Пустой text'));
        }
        if (empty($article->author_id)){
            $errors->add(new MultiException('Пустой author_id'));
        }
        throw $errors;

    }



}