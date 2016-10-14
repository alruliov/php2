<?php
/**
 * Created by PhpStorm.
 * User: Lusienne
 * Date: 14.10.2016
 * Time: 16:00
 */

namespace App\Classes;


class Config
{

    public $data;



    public function __construct()
    {

        $this->data = include __DIR__ . '/../Config/database.php' ;

    }


}