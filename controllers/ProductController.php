<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Session;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("index", [
            'enter' => App::call()->userRepository->isAuth()
        ]);
    }

    public function actionCatalog() {
        $products = App::call()->productRepository->getAll();
            echo $this->render("catalog", [
                'products' => $products
            ]);
    }

    public function actionCard() {
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->productRepository->getOne($id);

        echo $this->render("card", [
            'product' => $product,
            'fb' => App::call()->feedbackRepository->getAllWhere('product_id', $id)
        ]);
    }

    public function actionPag() {
        $page = isset(App::call()->request->getParams()['page']) ? (int)(App::call()->request->getParams()['page']) : 1;
        $shift = ($page - 1) * ON_PAGE;
        $result = App::call()->productRepository->getLimit($shift, ON_PAGE);
        $count = count(App::call()->productRepository->getAll());
        $pages = ceil($count / ON_PAGE);

        echo $this->render("catalog", [
            'products' => $result,
            'pages' => $pages
        ]);

    }

}