<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = new Config();
        $dsn = 'mysql:dbname=' . $config->data['db']['name'] . ';host=' . $config->data['db']['host'];
        $this->dbh = new \PDO($dsn, $config->data['db']['user'], $config->data['db']['password']);
    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        return true;
    }

    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump($sth->errorInfo());
            die;
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}