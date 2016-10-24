<?php
/**
 * Created by PhpStorm.
 * User: Lusienne
 * Date: 23.10.2016
 * Time: 21:09
 */

namespace App\Model;

use App\Model;

/**
 * Class Author
 * @package App\Model
 */

class Author extends Model
{

    /**
     * @var string
     */
    public static $table = 'authors';

    public $id;
    public $name;


}