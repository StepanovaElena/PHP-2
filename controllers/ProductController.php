<?php

namespace app\controllers;

use app\models\repositories\FeedbackRepository;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("index");
    }

    public function actionCatalog() {
        $products = (new ProductRepository())->getAll();
            echo $this->render("catalog", [
                'products' => $products
            ]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = (new ProductRepository())->getOne($id);

        echo $this->render("card", [
            'product' => $product,
            'fb' => (new FeedbackRepository())->getAllWhere('product_id', $id),

        ]);
    }

    public function actionPag() {
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $shift = ($page - 1) * ON_PAGE;
        $result = (new ProductRepository())->getLimit($shift, ON_PAGE);
        $count = count((new ProductRepository())->getAll());
        $pages = ceil($count / ON_PAGE);

        echo $this->render("catalog", [
            'products' => $result,
            'pages' => $pages
        ]);

    }

}