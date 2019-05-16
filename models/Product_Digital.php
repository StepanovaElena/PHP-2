<?php

namespace app\models;

class Product_Digital extends Product_Real {

    public function getSubtotal($number) {
        $sum = parent::getSubtotal($number)/2;
        $this->total = $sum;
        return $sum;
    }

    public function getTableName()
    {
        return "product_digital";
    }
}