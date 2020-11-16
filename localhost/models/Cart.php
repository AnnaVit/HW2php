<?php
namespace app\models;

class Cart extends Model
{
    protected $id_order;
    protected $id_user;
    protected $id_product;

    public function getTableName() : string
    {
        return 'orders_has_products';
    }

    public function addDbBuild()
    {
        return sprintf("INSERT INTO %s (orders_orders_id, orders_users_id, products_id)
        VALUES ( %d, %d, %d)",
            $this->tableName,
            $this->id_order,
            $this->id_product
    
        );
    }

    public function deleteDbBuild()
    {
        return sprintf("DELETE FROM %s WHERE orders_orders_id = %d",
        $this->tableName,
        $this->id_order);
    }

    public function updDbBuild()
    {
        return sprintf("UPDATE %s SET 
        orders_orders_id =  %d, orders_users_id =  %d, products_id =  %d WHERE orders_orders_id = %d",
        $this->tableName,
        $this->id_order,
        $this->id_user,
        $this->id_product,
        $this->id_order
        );
    }

    public function __construct(int $id_order, int $id_user, int $id_product)
    {
        parent::__construct();
        $this->id_order = $id_order;
        $this->id_user = $id_user;
        $this->id_product = $id_product;
    }
}
