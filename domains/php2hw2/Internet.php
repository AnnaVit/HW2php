<?php

namespace php2hw2;


class Internet extends Model
{
    public $id;
    public $name;
    public $weight;

    public function price() : float
    {

        parent::price();
        return ($this->price/1000 * $this->weight);
    }

    public function __construct(int $purchase,int $markup,int $id,string $name, float $weight)
    {
        parent::__construct($purchase, $markup);
        
        $this->id = $id;
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $this->price();
    }
}