<?php

namespace App;

abstract class Model
{

    public static $table = 'foobar';

    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }

}