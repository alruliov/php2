<?php

namespace App;


abstract class Model
{


    public static $table;

    public $id;

    public static function findAll()
    {

        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        $data = $db->query($sql, [], static::class);
        if(isset($data)){
            return $data;
        }else{
            return null;
        }
    }

    public static function findAllByLimit($limit)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        $data = $db->query($sql, [], static::class);
        if(isset($data)){
            return $data;
        }else{
            return null;
        }
    }


    public static function find($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE user_id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if(isset($data[0])){
            return $data[0];
        }else{
            return null;
        }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if ($this->isNew()) {
            $columns = [];
            $binds = [];
            $data = [];
            foreach ($this as $column => $value) {
                if ('id' == $column) {
                    continue;
                }
                $columns[] = $column;
                $binds[] = ':' . $column;
                $data[':' . $column] = $value;
            }
            $sql = '
                INSERT INTO ' . static::$table . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $binds) . ')
                ';
            $db = new Db();
            $db->execute($sql, $data);
            $this->id = $db->lastInsertId();
        }
    }

    protected function update()
    {
        $binds = [];
        $data = [];
        foreach ($this as $columns => $value) {
            $data[':' . $columns] = $value;
            if ('id' == $columns) {
                continue;
            }

            $binds[] = $columns . '=:' . $columns;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $binds) . ' WHERE id=:id';

        //var_dump($this->data); die;

        $db = new Db();
        $db->execute($sql, $data);


    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
            return true;
        };

    }

    public function delete($id)
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db->execute($sql, [':id' => $id]);

    }

    public function fill(array $data)
    {
        foreach ($data as $key => $value) {


            $this->$key = $value;

        }
    }


}