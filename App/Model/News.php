<?php

namespace App\Model;

use App\Model;

class News extends Model
{

    public static $table = 'news';

    public $id;
    public $created_at;
    public $author;
    public $title;
    public $text;


}