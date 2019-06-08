<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Session;
use app\models\entities\Cart;

class CartController extends Controller
{
    public function actionIndex() {
        echo $this->render('cart', [
            'products' => App::call()->cartRepository->getBasket(Session::call()->getId()),
            'total' =>App::call()->cartRepository->getSumWhere('subtotal','session_id', Session::call()->getId())
        ]);
    }

    public function actionClear() {
        App::call()->cartRepository->clear(Session::call()->getId());
        header('Location: /cart');
        exit();
    }

    public function actionAddToCart() {

        $id = App::call()->request->getParams()['id'];
        $cart = App::call()->cartRepository->getOneWhere('product_id',$id);

        if(!empty($cart)) {
            if (Session::call()->getId() == $cart->session_id) {
                $price = App::call()->productRepository->getOne($id)->price;
                $quantity = $cart->quantity;
                $quantity++;
                $cart->setSubtotal($quantity * $price);
                $cart->setQuantity($quantity);
                App::call()->cartRepository->save($cart);
            }
        } else {
            App::call()->cartRepository->save(new Cart(null, Session::call()->getId(), $id , App::call()->userRepository->getId() , 1, App::call()->productRepository->getOne($id)->price));
        };

        $count = App::call()->cartRepository->getSumWhere('quantity', 'session_id', Session::call()->getId());
        $response = ['ngoods' => $count];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionDelete() {

        $id = App::call()->request->getParams()['id'];
        $cart = App::call()->cartRepository->getOneWhere('product_id',$id);

        if (Session::call()->getId() == $cart->session_id) {
            App::call()->cartRepository->delete($cart);
            $count = App::call()->cartRepository->getSumWhere('quantity','session_id', Session::call()->getId());
            $total = App::call()->cartRepository->getSumWhere('subtotal','session_id', Session::call()->getId()) ;
            if ($count == null){
                $count = 0;
                $total = 0;
            }
            echo json_encode([
                'response' => 1,
                'id' => $id,
                'ngoods' => $count,
                'total' => $total]);
        } else {
                json_encode(['response' => 0]);

        }
    }

}