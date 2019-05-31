<?php
namespace app\models;

use app\engine\Db;
use app\engine\Request;

class Cart extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;
    public $user_id;
    public $quantity;
    public $subtotal;

    public $flag_quantity = false;
    public $flag_subtotal = false;

    public function __construct($id = null, $session_id = null, $product_id = null, $user_id = null, $quantity = null, $subtotal = null)
    {
        $this->id = $id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
        $this->quantity = $quantity;
        $this->subtotal = $subtotal;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        $this->flag_quantity = true;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        $this->flag_subtotal = true;
    }

    public function getQuantity () {
        return $this->quantity;
    }

    public static function getBasket($session)
    {
        $sql = "SELECT * FROM cart c,products p WHERE c.product_id=p.id AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public static function getTableName()
    {
        return "cart";
    }
}