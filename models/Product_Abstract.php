<?php
namespace app\models;

abstract class Product_Abstract extends Model
{
    public $id;
    public $category;
    public $name;
    public $description;
    public $size;
    public $price;
    public $unit;
    public $total;

    public function __construct($id, $category, $name, $description, $size, $price, $unit)
    {
        parent::__construct();
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->size = $size;
        $this->price = $price;
        $this->unit = $unit;
    }

    abstract public function getSubtotal($number);

    public function getTotal(){
       return $this->total;
    }
}