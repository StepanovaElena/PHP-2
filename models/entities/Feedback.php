<?php
namespace app\models\entities;


class Feedback extends DataEntity
{
    public $id;
    public $user_id;
    public $product_id;
    public $user_name;
    public $text;
    public $date;
    public $status;
    public $likes;

    public $properties = [
        'text' => false,
        'user_name' => false,
        'status' => false,
        'product_id' => false
    ];

    public function __construct($id = null, $user_id = null, $product_id = null, $text = null, $user_name = null, $date = null, $status = null, $likes = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->text = $text;
        $this->user_name = $user_name;
        $this->date = $date;
        $this->status = $status;
        $this->likes = $likes;
    }

    public function setText($text)
    {
    $this->text = $text;
    $this->properties['text'] = true;
    }

    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;
        $this->properties['user_name'] = true;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->properties['status'] = true;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        $this->properties['product_id'] =true;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getUser_name()
    {
        return $this->user_name;
    }

}