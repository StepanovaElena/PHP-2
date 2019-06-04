<?php

namespace app\models;
use app\engine\Db;
use app\models\entities\DataEntity;


abstract class Repository
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [":id" => $id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryObject($sql, ["$field"=>$value], $this->getEntityClass());
    }

    public function getSumWhere($column, $field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT sum({$column}) as count FROM `{$tableName}` WHERE `$field`=:$field";
        return $this->db->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getLimit($from, $limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :limit";
        return $this->db->queryAll($sql, [':from' => $from, ':limit' => $limit]);
    }

    public function getAllWhere($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryAll($sql, ["$field"=>$value]);
    }

    public function insert(DataEntity $entity)
    {

        $params = [];
        $columns = [];

        foreach ($entity as $key => $value) {
            if ($key == "db" || $key == "id" || $key == "properties") continue;
            $columns[] = "`$key`";
            $params[":{$key}"] = $value;
        }

        $columns = implode(", ", $columns);
        $value = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";

        $this->db->execute($sql, $params);

        $this->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity)
    {
        $tableName = static::getTableName();

        $params = [];
        $alter = [];

        foreach ($entity as $key => $value) {
            if ($key == 'id' || $key == 'properties') continue;
            if ($entity->properties[$key] == false) continue;
            $entity->properties[$key] = false;
            $params[":{$key}"] = $value;
            $alter[] .= "`" . $key . "` = :" . $key;
        }
        $alter = implode(", ", $alter);
        $params[':id'] = $entity->id;

        $sql = "UPDATE `{$tableName}` SET {$alter} WHERE `id` = :id";

        $this->db->execute($sql, $params);

    }

    public function delete(DataEntity $entity)
    {
        $tableName =$this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $entity->id]);
    }

    public function save(DataEntity $entity)
    {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    abstract public function getTableName();

    abstract public function getEntityClass();
}