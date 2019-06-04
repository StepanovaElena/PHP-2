<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;

class CartController extends Controller
{
    public function actionIndex() {
        echo $this->render('cart', [
            'products' => (new CartRepository())->getBasket(session_id())
        ]);
    }

    public function actionAddToCart() {
        //Поместить товар в корзину
        $id = (new Request())->getParams()['id'];

        $cart = (new CartRepository())->getOneWhere('product_id',$id);

        if(!empty($cart)) {
            if (session_id() == $cart->session_id) {
                $price = ((new ProductRepository())->getOne($id))->price;

                $quantity = $cart->quantity;
                $quantity++;
                $cart->setSubtotal($quantity * $price);
                $cart->setQuantity($quantity);
                (new CartRepository())->save($cart);
            }
        } else {
            (new CartRepository())->save(new Cart(null, session_id(), $id , null , 1, ((new ProductRepository())->getOne($id))->price));
        };

        $count = (new CartRepository())->getSumWhere('quantity', 'session_id', session_id());
        $response = ['ngoods' => $count];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionDelete() {
        //Прежде чем удалять, убедимся что сессия совпадает
        $id = (new Request())->getParams()['id'];
        $basket = (new CartRepository())->getOneWhere('product_id',$id);
        if (session_id() == $basket->session_id) {
            (new CartRepository())->delete($basket);
            $count = (new CartRepository())->getSumWhere('quantity','session_id', session_id());
            echo json_encode(['id' => $id, 'ngoods' => $count]);
        }
    }

}