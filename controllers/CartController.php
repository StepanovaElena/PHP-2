<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Cart;
use app\models\Products;

class CartController extends Controller
{
    public function actionIndex() {
        echo $this->render('cart', [
            'products' => Cart::getBasket(session_id())
        ]);
    }

    public function actionAddToCart() {
        //Поместить товар в корзину
        $request = new Request();
        $id = $request->getParams()['id'];

        //проверка на то есть ли товар в корзине
        $item = Cart::getOneWhere('product_id', $id);
        $product = Products::getOneWhere('id', $id);
       if ($item) {
           $quantity = $item->getQuantity();
           $quantity++;
           $item->setSubtotal($quantity * $product->price);
           $item->setQuantity($quantity);
           $item->save();
       } else {
           $basket = new Cart(null, session_id(), $id , null , 1, $product->price);
           $basket->save();
       }

       // (new Basket(null, session_id(), (new Request())->getParams()['id']))->save();

        $count = Cart::getSumWhere('quantity', 'session_id', session_id());
        $response = ['ngoods' => $count];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionDelete() {

        $request = new Request();
        $id = $request->getParams()['id'];

        $item = Cart::getOneWhere('product_id', $id);
        $item->delete();

        header('Location: /cart');
        exit();
    }


}