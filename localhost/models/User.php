<?php

namespace app\models;


class User extends Model
{
    public $id;
    public $name;
    public $email;

    //protected $tableName = 'users';


    public function getTableName(): string
    {
        return "users";
    }


    public function addDbBuild()
    {
        return sprintf("INSERT INTO %s (name, email)
                       VALUES ( '%s', '%s')",
            $this->tableName,
            $this->name,
            $this->email
        );
    }

    public function deleteDbBuild()
    {
        return sprintf("DELETE FROM %s WHERE id = %d",
        $this->tableName,
        $this->id);
    }

    public function updDbBuild()
    {
        return sprintf("UPDATE %s SET 
        name = '%s', email = '%s' WHERE id = %d",
        $this->tableName,
        $this->name,
        $this->email,
        $this->id        
        );
    }

    public function __construct($name, $email, $id)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

}