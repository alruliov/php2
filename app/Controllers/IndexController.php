<?php


namespace App\Controllers;


use App\Controller;
use App\Model\Article;
use App\Model\User;
use App\MultiException;
use App\View;

class IndexController extends Controller
{

    public function index()
    {
        $user = User::find(5376);
        $this->smarty->assign('user', $user);
        echo $this->smarty->display(__DIR__ . '/../templates/site/index.tpl');
    }


    public function action404($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../Template/1.php');

    }

    public function actionError()
    {

        $this->view->display(__DIR__ . '/../Template/errorPage.php');

    }




}