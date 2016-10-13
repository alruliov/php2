<?php
/**
 * Created by PhpStorm.
 * User: Lusienne
 * Date: 11.10.2016
 * Time: 9:53
 */

namespace App\Model;

use App\Model;

class Articles extends Model
{

    public static $table = 'articles';

    public $id;
    public $created_at;
    public $author;
    public $title;
    public $text;

    /**
     * Вывод всех статей в шаблон App/Template/article.php
     * !!Возможно не много не так понял задание(быд еще один вариант его решения,
     * но так возможно ближе всего к заданию)
     */

    public function getAllByLimit($limit)

    {

        return \App\Model\Articles::findAllByLimit($limit);



    }

    public function getOne($id)

    {
       return \App\Model\Articles::findById($id);


    }

}

