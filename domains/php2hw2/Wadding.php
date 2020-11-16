<?php

namespace php2hw2;

class Wadding extends Model
{
    public $id;
    public $name;

    public function price()
    {
        parent::price();
        return $this->price;
    }

    public function __construct($purchase, $markup, $id, $name)
    {
        parent::__construct($purchase, $markup);
        $this->price = $this->price();
        $this->id = $id;
        $this->name = $name;
    }
}