<?php
namespace app\models\entities;

class Cart extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;
    public $user_id;
    public $quantity;
    public $subtotal;

    public $properties = [
        'quantity' => false,
        'subtotal' => false
    ];


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
        $this->properties['quantity'] = true;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        $this->properties['subtotal'] = true;
    }

    public function getQuantity () {
        return $this->quantity;
    }

}