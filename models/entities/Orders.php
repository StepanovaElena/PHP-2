<?php


namespace app\models\entities;


class Orders extends DataEntity
{
    public $id;
    public $order_number;
    public $date;
    public $session_id;
    public $user_login;
    public $user_id;
    public $status;
    public $telephone;
    public $delivery;
    public $total;


    public $properties = [
        'status' => false
    ];

    public function __construct($id = null, $order_number = null, $date = null, $session_id = null, $user_login = null, $user_id = null, $status = null, $telephone = null, $delivery = null, $total=null)
    {
        $this->id = $id;
        $this->order_number = $order_number;
        $this->date = $date;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->telephone = $telephone;
        $this->delivery = $delivery;
        $this->user_login = $user_login;
        $this->total = $total;
    }

    public function setStatus($status) {
        $this->status = $status;
        $this->properties['status'] = true;
    }

}