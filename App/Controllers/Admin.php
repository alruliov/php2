<?php


namespace App\Controllers;

use App\Controller;

use App\Model\Article;


class Admin extends Controller
{


   public function actionShow()
    {

        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../Template/admin/index.php');
    }

    public function actionEdit()
    {

        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Template/admin/edit.php');

    }

    public function actionCreateNews()
    {

        $this->view->display(__DIR__ . '/../Template/admin/create.php');

    }

    public function actionCreate($data)
    {

        $article = new Article();
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->save();
        header("Location: admin.php");
    }

    public function actionUpdate($data)
    {
        $article = Article::findById($data['id']);
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->save();
        header("Location: admin.php");
    }


    public function actionDelete()
    {
        $article = new Article();
        $article->delete($_GET['id']);
        $this->show();

    }


}