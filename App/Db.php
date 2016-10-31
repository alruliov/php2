<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = new Config();
        $dsn = 'mysql:dbname=' . $config->data['db']['name'] . ';host=' . $config->data['db']['host'];
        try {
        $this->dbh = new \PDO($dsn, $config->data['db']['user'], $config->data['db']['password']);
        } catch (\PDOException $e){
            throw new \Exception('Ошибка соединения с БД');
        }

    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            throw new \Exception('Ошибка в запросе.');
        }
        return true;
    }

    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);

        $result = $sth->execute($data);

        if (false === $result) {
            throw new \Exception('Ошибка в запросе.');
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