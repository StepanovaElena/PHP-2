<?php

namespace app\models;

use app\engine\Db;

class Cart extends Model
{
    public $product_id;
    public $quantity;
    public $session_id;
    public $user_id;

    public function __construct($user_id = null, $product_id = null, $quantity = null, $session_id = null)
    {
        parent::__construct();
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->session_id = $session_id;
        $this->quantity = $quantity;
    }

    public function getTableName()
    {
        return 'cart';
    }
}