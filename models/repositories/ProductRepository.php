<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Products;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "products";
    }

    public function getEntityClass()
    {
        return Products::class;
    }

}