<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id'=>$id]);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function delete()
    {
        $arr = (array)$this;

        if ((isset($arr['id'])) && ($arr['id'] == 0)) {
            $id = $arr['id'];
        }

        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, ['id'=>$id]);
    }

    public function deleteAll()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName}";
        return $this->db->execute($sql);
    }


    //INSERT INTO table_name SET column1 = :param1, column2 = :param2, ... ;
    public function insert()
    {
        $arr = (array)$this; //простое приведение объекта в массив
        array_pop($arr); //отбрасывание db

        $columns = [];
        $params = [];
        $param_value = [];
        $index = 1;

        foreach ($arr as $column => $value) {
            $params[] = ':param' . $index;
            $columns[] = $column;
            $param_value[':param' . $index] = $value; // [:param => value]
            $index++;
        }

        $tableName = $this->getTableName();

        $sql = 'INSERT INTO ' . $tableName . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $params) . ')';

        //var_dump($sql);
        //var_dump($param_value);

        return $this->db->execute($sql, $param_value);
    }


    //UPDATE table_name SET column1 = :param1, column2 = :param2, ... WHERE condition;
    public function update()
    {
        $arr = (array)$this; //простое приведение объекта в массив
        array_pop($arr); //отбрасывание db

        $column_param = [];
        $param_value = [];
        $index = 1;

        foreach ($arr as $column => $value) {
            $param = ':param' . $index;
            $column_param[] = $column . ' = ' . $param;
            $param_value[':param' . $index] = $value;
            $index++;
        }

        $tableName = $this->getTableName();

        $sql = 'UPDATE ' . $tableName . ' SET ' . implode(', ', $column_param) . ' WHERE id = ' . $this->id;

        var_dump($sql);

        return $this->db->execute($sql, $param_value);
    }

    abstract public function getTableName();


}