<?php

namespace app\models\entities;


class Products extends DataEntity
{

    public $id;
    public $name;
    public $description;
    public $price;

    public $properties = [
        'name' => false,
        'description' => false,
        'price' => false
    ];


    public function __construct($id = null, $name = null, $description = null, $price = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function setName($name)
    {
        $this->name = $name;
        $this->properties['name'] = true;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        $this->properties['description'] = true;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        $this->properties['price'] = true;
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

}