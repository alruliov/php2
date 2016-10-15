<?php

namespace App\Model;

use App\Classes\Model;

class Article extends Model
{

    public static $table = 'news';

    public $id;
    public $title;
    public $text;


}