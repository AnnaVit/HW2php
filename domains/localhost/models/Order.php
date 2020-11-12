<?php
//3. Сделать модель для любой сущности из БД.
namespace models;
use models\Model;

class Order extends Model
{
    protected $user_id;
    protected $email;
    protected $order_id;//номер заказа
    protected $shipping_adress;//адрес доставки
    protected $shipping;//тип доставки
    protected $payment; //тип оплаты

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

    public function setShippingAdress(string $shipping_adress) 
    {//чтоб редактировать адрес доставки
        $this->shipping_adress = $shipping_adress;
    }

    public function payment(int $type)
    {//тип оплаты
        if($type > 1 OR $type < 0){
            return false;
        }
        return $this->payment = self::PAYMENT_TYPE[$type];
    }

    public function shipping(int $type)
    {//тип доставки
        if($type > 1 OR $type < 0){
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
        $this->shipping_adress = $this->setShippingAdress($shipping_adress);
        $this->shipping = $this->shipping($ship_type);
        $this->payment = $this->payment($pay_type);
    }

}