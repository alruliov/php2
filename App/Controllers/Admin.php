<?php


namespace App\Controllers;

use App\Model\Article;
use App\View;

class Admin
{
    public function show()
    {
        $view = new View();
        $view->articles = Article::findAll();
        $view->display(__DIR__ . '/../Template/admin/index.php');
    }

    public function edit($id)
    {
        $view = new View();
        $view->article = Article::findById($id);
        $view->display(__DIR__ . '/../Template/admin/edit.php');

    }

    public function createNews()
    {
        $view = new View();
        $view->display(__DIR__ . '/../Template/admin/create.php');

    }

    public function create($data)
    {

        $article = new Article();
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->save();
        header("Location: admin.php");
    }

    public function update($data)
    {
        $article = Article::findById($data['id']);
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->save();
        header("Location: admin.php");
    }


    public function delete($id)
    {
        $article = new Article();
        $article->delete($id);
        $this->show();

    }


}