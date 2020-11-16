<?php

namespace app\models;


class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;

    public function getTableName(): string
    {
        return "products";
    }

    public function addDbBuild()
    {
        return sprintf("INSERT INTO %s (name, description, price, category_id)
                       VALUES ( '%s', '%s', %g, %d)",
            $this->tableName,
            $this->name,
            $this->description,
            $this->price,
            $this->categoryId
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
        name = '%s', description = '%s', price = %g, category_id = %d WHERE id = %d",
        $this->tableName,
        $this->name,
        $this->description,
        $this->price,
        $this->categoryId,
        $this->id        
        );
    }

    public function __construct(
        int $id, string $name, string $description, int $price, int $categoryId)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->categoryId = $categoryId;
        $this->tableName = $this->getTableName();
    }


}

