<?php

namespace app\models;

class Products extends DbModel
{

    public $id;
    public $name;
    public $description;
    public $price;

    public $flag_name = false;
    public $flag_description = false;
    public $flag_price = false;


    public function __construct($id = null, $name = null, $description = null, $price = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function setName($name)
    {
        $this->name = $name;
        $this->flag_name = true;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        $this->flag_description = true;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        $this->flag_price = true;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getTableName()
    {
        return 'products';
    }


}