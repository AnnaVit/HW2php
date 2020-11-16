<?php


namespace app\models;


abstract class Model implements ModelInterface
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = \app\services\Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
    $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }
    
    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $this->id]);
    }

    public function addDb(){
        $sql = $this->addDbBuild();
        return $this->db->execute($sql);

    }

    public function deleteDb(){
        
        $sql = $this->deleteDbBuild();

        return $this->db->execute($sql);
    }

    public function updDb(){

        $sql = $this->updDbBuild();

        return $this->db->execute($sql);
    }


    
    abstract public function getTableName() : string;

    abstract public function addDbBuild();
    abstract public function deleteDbBuild();
    abstract public function updDbBuild();
}