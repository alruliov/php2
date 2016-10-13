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


}