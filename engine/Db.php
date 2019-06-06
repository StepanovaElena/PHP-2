<?php

namespace app\engine;

class Db
{
    private $config;
    private $connection = null;

    public function __construct($driver, $host, $login, $password, $database, $charset = "utf8")
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
                );
        }
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        return $this->connection;
    }

    private function prepareDsnString() {

        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryObject($sql, $params, $class) {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $obj = $stmt->fetch();
        //if (!$obj) {
        //    throw new \Exception("Нет такого товара!", 404);
        //}
        return $obj;
    }

    public function execute($sql, $params) {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params) {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
    public function __toString() {
        return "Db";
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

}