<?php


namespace app\models\entities;


class Positions extends DataEntity
{
    public $id;
    public $order_id;
    public $order_pos;
    public $quantity;
    public $product_id;
    public $subtotal;

    public function __construct($id = null, $order_id = null, $order_pos = null, $quantity = null, $product_id = null, $subtotal = null)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->order_pos = $order_pos;
        $this->quantity = $quantity;
        $this->product_id = $product_id;
        $this->subtotal = $subtotal;
    }
}