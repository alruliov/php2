<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . $_ENV['DB_DATABASE'] . ';host=' . $_ENV['DB_HOST'];
        try {
        $this->dbh = new \PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        } catch (\PDOException $e){
            throw new DBException('Ошибка соединения с БД');
        }

    }

    public function execute($sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);

        $result = $sth->execute($data);
        if (false === $result) {
            throw new DBException('Ошибка в запросе.');
        }
        return true;
    }

    public function query($sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);

        $result = $sth->execute($data);


        if (false === $result) {
            throw new DBException('Нет такого результата.');
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