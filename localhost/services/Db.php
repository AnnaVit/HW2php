<?php

namespace app\services;

use app\models\Product;
use app\traits\SingletonTrait;

//use app\models\Product;

class Db
{
    use SingletonTrait;

    public $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop_gb',
        'charset' => 'utf8'
        
    ];

    private $connection = null;

    public function getConnection()
    {
        
        if(is_null($this->connection)){
            
            $this->connection = new \PDO(
                $this->buildDnsString(),
                $this->config['login'],
                $this->config['password']
            );
           $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ); 
           
        }

        return $this->connection; 
    }

    public function buildDnsString()
    {
        return sprintf('%s:host=%s;dbname=%s; charset = %s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
            
        );
    }

    public function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }
    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
        
    }


    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }
}