<?php

namespace app\models;

use app\engine\Db;

class Products extends DbModel
{

    public $id;
    public $name;
    public $description;
    public $price;

    protected $prop = [
        'id' => false,
        'name' => false,
        'description' => false,
        'price' => false,
    ];

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
        $this->prop['id'] = true;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param null $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }



    public function __construct($id = null, $name = null, $description = null, $price = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }



    public static function getTableName()
    {
        return 'products';
    }


}