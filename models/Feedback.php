<?php
namespace app\models;

class Feedback extends DbModel
{
    protected $id;
    protected $user_id;
    protected $product_id;
    protected $user_name;
    protected $text;
    protected $date;
    protected $status;
    protected $likes;

    public $flag_text = false;
    public $flag_user_name = false;
    public $flag_status = false;

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
    $this->flag_text = true;
    }

    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;
        $this->flag_user_name = true;
    }

    public function setStatus($status)
    {
        $this->status = 'new';
        $this->flag_status = true;
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