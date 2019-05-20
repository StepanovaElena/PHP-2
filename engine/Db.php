<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db
{
    use Tsingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'new_project',
        'charset' => 'utf8'
    ];

    private $connection = null;



    private function getConnection() {
        if (is_null($this->connection)) {
            var_dump("Создаю подключение к БД, Дооолго.");
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
                );
        }

           /*
            * PDO::ATTR_DEFAULT_FETCH_MODE: Задает режим выборки данных по умолчанию.
            *
            * PDO::FETCH_ASSOC: возвращает массив, индексированный именами столбцов результирующего набора
            */

        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

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

// "SELECT * FROM products WHERE id = :id", ["id", 1]
    private function query($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function execute($sql, $params) {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params) {
        return $this->queryAll($sql, $params)[0];
    }

        /*
         * PDOStatement::fetchAll — Возвращает массив, содержащий все строки результирующего набора
         */

    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }




}