<?php
/**
 * Created by PhpStorm.
 * User: Lusienne
 * Date: 15.10.2016
 * Time: 20:46
 */

namespace App\Controllers;


use App\Model\Article;

class Admin
{
    public function show()
    {
        $articles = Article::findAll();
        include __DIR__ . '/../Template/admin/index.php';
    }

    public function edit($id = null)
    {

        if (null === $id) {

            include __DIR__ . '/../Template/admin/edit.php';

        } else {

            $article = Article::findById($id);

            include __DIR__ . '/../Template/admin/edit.php';

        }

    }
    public function process($data)
    {
        // на случай если пользователь не заполнил какое-либо поле
        if(in_array(null, $data)){
            $this->edit();
            return false;
        };
        $article = new Article();
        if (isset($data['id'])){
            $article->id = $data['id'];
        }
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