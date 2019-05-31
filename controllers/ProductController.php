<?php

namespace app\controllers;

use app\models\Feedback;
use app\models\Products;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("index");
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
            'product' => $product,
            'fb' => Feedback::getAllWhere('product_id', $id),

        ]);
    }

    public function actionPag() {
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $shift = ($page - 1) * ON_PAGE;
        $result = Products::getLimit($shift, ON_PAGE);
        $count = count(Products::getAll());
        $pages = ceil($count / ON_PAGE);

        echo $this->render("catalog", [
            'products' => $result,
            'pages' => $pages
        ]);

    }

}