<?php

namespace app\models;

use app\engine\Db;

class Feedbacks extends Model
{
    public $id;
    public $user_id;
    public $product_id;
    public $text;

    public function __construct($id = null, $user_id = null, $product_id = null, $text = null, $userName = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->text = $text;
        $this->userName = $userName;
    }

    public function getTableName()
    {
        return 'feedbacks';
    }
}
