<?php

namespace app\controllers;

use app\engine\Db;
use app\models\Products;

class ProductController extends Controller
{
    private $action;
    public $layout = 'main';
    public $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: 'pag';
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
        else {
            echo "404";
        }

    }

    public function actionCatalog() {
        $products = Products::getAll();
            echo $this->render("catalog", [
                'products' => $products
            ]);

    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render("card", [
            'product' => $product
        ]);
    }

    public function actionPag() {

        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        $on_page = 4;

        $shift = ($page - 1) * $on_page;

        $sql = "SELECT * FROM `products` LIMIT {$shift}, {$on_page}";

        $result = Db::getInstance()->queryAll($sql);

        $products = Products::getAll();

        $count = count ($products);

        $pages = ceil($count / $on_page);

        echo $this->render("catalog", [
            'products' => $result,
            'pages' => $pages
        ]);

    }

}