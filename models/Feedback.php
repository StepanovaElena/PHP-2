<?php
namespace app\models;

class Feedback extends Model
{
    public $id;
    public $user_id;
    public $product_id;
    public $user_name;
    public $text;
    public $date;

    public function __construct($id, $user_id, $product_id, $text, $user_name, $date)
    {
        parent::__construct();
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->text = $text;
        $this->user_name = $user_name;
        $this->date = $date;
    }

    public function getTableName()
    {
        return 'feedback';
    }

}