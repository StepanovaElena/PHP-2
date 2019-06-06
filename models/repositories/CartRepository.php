<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Cart;


class CartRepository extends Repository
{

    public function getCount($session) {
        $sql = "SELECT count(*) as count FROM `basket` WHERE `session` = :session";
        return $this->db->queryOne($sql, ['session' => $session])['count'];
    }

    public function getBasket($session)
    {
        $sql = "SELECT * FROM cart c,products p WHERE c.product_id=p.id AND session_id = :session";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function clear($session)
    {
        $sql = "DELETE FROM `cart` WHERE session_id = :session";
        return $this->db->execute($sql, [":session" => $session]);

    }

    public function getTableName()
    {
        return "cart";
    }

    public function getEntityClass()
    {
        return Cart::class;
    }
}