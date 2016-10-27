<?php


namespace App;


class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();


    }

    public function action($ctrlRequest, $actionRequest)
    {

        $ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);

        $controller = new $ctrlClassName;

        $actionMethodName = 'action' . ucfirst($actionRequest);

        //var_dump($ctrlClassName);die;

        if ($ctrlClassName === '\App\Controllers\Admin'){

            if ($controller->access('admin') === true){

                $controller->$actionMethodName();

            } else {

                echo 'Доступ закрыт!';die;

            }

        } else {

            $controller->$actionMethodName();

        }





    }



}