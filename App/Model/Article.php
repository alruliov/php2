<?php

namespace App\Model;

use App\Classes\Model;

class Article extends Model
{

    public static $table = 'news';

    public $id;
    public $created_at;
    public $author;
    public $title;
    public $text;


}