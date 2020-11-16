<?php

namespace app\models;
use app\models\Model;

class Order extends Model
{
    protected $user_id;
    protected $email;
    protected $order_id;//номер заказа
    protected $shipping_adress;//адрес доставки
    protected $shipping;//тип доставки
    protected $payment; //тип оплаты

    const SHIPPING_TYPE_PICKUP = 0;
    const SHIPPING_TYPE_DELIVERY = 1;

    const PAYMENT_TYPE_CASHE = 0;
    const PAYMENT_TYPE_ONLINE = 1;

    const SHIPPING_TYPE = [
        'самовывоз',
        'доставка курьером'
    ];

    const PAYMENT_TYPE = [
        'наличными',
        'онлайн'
    ];

    public function getTableName() : string
    {
        return 'orders';
    }

    public function addDbBuild()
    {
        return sprintf("INSERT INTO %s (adress, shipping_type, payment_type, users_id)
        VALUES ( '%s', '%s', '%s', %d)",
            $this->tableName,
            $this->shipping_adress,
            $this->shipping,
            $this->payment,
            $this->user_id
    
        );
    }

    public function deleteDbBuild()
    {
        return sprintf("DELETE FROM %s WHERE orders_id = %d",
        $this->tableName,
        $this->order_id);
    }

    public function updDbBuild()
    {//orders_id , adress , shipping_type, payment_type, users_id
        return sprintf("UPDATE %s SET 
        adress = '%s', shipping_type = '%s', payment_type = '%s' WHERE orders_id = %g",
        $this->tableName,
        $this->shipping_adress,
        $this->shipping,
        $this->payment,
        $this->order_id       
        );
    }


    public function payment(int $type) 
    {//тип оплаты
        if($type > self::SHIPPING_TYPE_DELIVERY || $type < self::SHIPPING_TYPE_PICKUP){
            return false;
        }
        return $this->payment = self::PAYMENT_TYPE[$type];
    }

    public function shipping(int $type)
    {//тип доставки
        if($type > self::PAYMENT_TYPE_ONLINE || $type < self::PAYMENT_TYPE_CASHE){
            return false;
        }
        return $this->shipping = self::SHIPPING_TYPE[$type];
    }

    public function __construct(
        int $user_id, string $email, int $order_id, 
        string $shipping_adress, int $ship_type, int $pay_type)
    {
        parent::__construct();
        
        $this->user_id = $user_id;
        $this->email = $email;
        $this->order_id = $order_id;
        $this->shipping_adress = $shipping_adress;
        $this->shipping = $this->shipping($ship_type);
        $this->payment = $this->payment($pay_type);
    }

}