<?php

namespace models;


class User extends Model
{
    public $name;
    public $email;

    //protected $tableName = 'users';


    public function getTableName(): string
    {
        return "users";
    }
}