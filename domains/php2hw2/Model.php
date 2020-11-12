<?php
namespace php2hw2;

abstract class Model 
{
    public $purchase;//зена закупки
    public $markup;//процент наценки

    public function __construct($purchase, $markup)
    {
        $this->purchase = $purchase;
        $this->markup = $markup;
    }

    public function price()
    {
        $this->price = $this->purchase + ($this->purchase / 100) * $this->markup;
                
    }


}
