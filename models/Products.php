<?php

namespace app\models;

class Products extends Model
{
    public $id = null;
    public $name;
    public $description;
    public $price;
    public $category_id = null;
    public $photo;

    public function __construct($name = null, $description = null, $price = null, $photo = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->photo = $photo;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName()
    {
        return 'products';
    }

}