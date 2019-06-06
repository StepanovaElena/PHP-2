<?php

namespace app\models\repositories;

use app\models\entities\Positions;
use app\models\Repository;

class PositionRepository extends Repository
{
    public function getOrder($order)
    {
        $sql = "SELECT * FROM positions ps,products p WHERE ps.product_id=p.id AND order_id = :order";
        return $this->db->queryAll($sql, ['order' => $order]);
    }

    public function getOrderPosByUserId($id)
    {
        $sql = "SELECT * FROM orders o LEFT JOIN positions ps ON  (o.order_number = ps.order_id) LEFT JOIN products p ON (ps.product_id=p.id) WHERE o.user_id = :id ";
        return $this->db->queryAll($sql, ['id' => $id]);
    }

    public function getTableName()
    {
        return "positions";
    }

    public function getEntityClass()
    {
        return Positions::class;
    }
}