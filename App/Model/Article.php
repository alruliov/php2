<?php

namespace App\Model;

use App\Model;

/**
 * Class Article
 * @package App\Model
 */
class Article extends Model
{

    public static $table = 'news';

    public $id;
    public $title;
    public $text;
    public $author_id;

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {

    }

    /**
     * @param $name
     * @return bool|null
     * @property $author
     */
    public function __get($name)
    {

        if ($name == 'author') {

            return Author::findById($this->author_id);

        } else return null;

    }

    /**
     * @param $name
     * @return bool
     * @property $author
     */

    public function __isset($name)
    {
        if ($name == 'author') {

            return true;

        } else {
            return false;
        }

    }

}

