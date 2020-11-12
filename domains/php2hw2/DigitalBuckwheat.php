<?php

namespace php2hw2;

class DigitalBuckwheat extends Model
{
    public $id;
    public $name;


    public function price()
    {
        parent::price();
        return $this->price/2;
    }

    public function __construct($purchase, $markup, $id, $name)
    {
        parent::__construct($purchase, $markup);
        $this->price = $this->price();
        $this->id = $id;
        $this->name = $name;
    }
}