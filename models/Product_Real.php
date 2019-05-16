<?php

namespace app\models;

class Product_Real extends Product_Abstract
{
    public static $count = 0;


    public function getSubtotal($number)
    {
        $sum = $this->price * $number;
        $this->total = $sum;
        return $sum;
    }


    public function getTotalSum()
    {
        self::$count += $this->getTotal();
        return self::$count;
    }

    public function getTableName()
    {
       return "product_real";
    }
}