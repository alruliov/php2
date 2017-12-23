<?php

namespace App;

abstract class Controller

{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->smarty = new \Smarty();//\Twig_Environment(new \Twig_Loader_Filesystem([__DIR__ . '/templates']));
    }




    protected function access()
    {

        return true;

    }

    public function action($action)
    {
        if ($this->access() === false){

            echo 'Доступ закрыт'; die;

        }

        elseif (method_exists($this, $action)){

                return $this->$action();

        }

    }

}