<?php
namespace app\models;

class Feedback extends DbModel
{
    public $id;
    public $user_id;
    public $product_id;
    public $user_name;
    public $text;
    public $date;

    public $flag_text = false;
    public $flag_user_name = false;

    public function __construct($id = null, $user_id = 1, $product_id = 1, $text = null, $user_name = null, $date = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->text = $text;
        $this->user_name = $user_name;
        $this->date = $date;
    }

    public function setText($text)
    {
    $this->text = $text;
    $this->flag_text = true;
    }

    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;
        $this->flag_user_name = true;
    }


    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getUser_name()
    {
        return $this->user_name;
    }


    public static function getTableName()
    {
        return 'feedback';
    }

}