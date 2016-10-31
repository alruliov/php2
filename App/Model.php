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
        return $data ?? false;
    }

    public static function findAllByLimit($limit)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        $data = $db->query($sql, [], static::class);
        return $data ?? false;
    }


    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        return $data[0] ?? false;
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


}