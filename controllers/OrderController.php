<?php


namespace app\controllers;

use app\engine\App;
use app\engine\Session;
use app\models\entities\Orders;
use app\models\entities\Positions;

class OrderController extends Controller
{
    public function actionConfirm() {
        $order_number = App::call()->request->getParams()['order_number'];
        $order = App::call()->orderRepository->getOneWhere('order_number',$order_number);
        $order->setStatus('confirm');
        App::call()->orderRepository->save($order);

        header('Location: /user/admin ');
        exit();
    }

    public function actionDecline() {
        $order_number = App::call()->request->getParams()['order_number'];
        $order = App::call()->orderRepository->getOneWhere('order_number',$order_number);
        $order->setStatus('decline');
        App::call()->orderRepository->save($order);

        header('Location: /user/admin ');
        exit();
    }

    public function actionInfo() {
        $order_number = App::call()->request->getParams()['order_number'];

        echo $this->render("order_info", [
            'order' => App::call()->orderRepository->getOneWhere('order_number', $order_number),
            'positions' => App::call()->positionRepository->getOrder($order_number),
            'total' =>App::call()->positionRepository->getSumWhere('subtotal','order_id', $order_number)
        ]);
    }


    public function actionPlaceOrder() {

        $cart = App::call()->cartRepository->getAllWhere('session_id',session_id());

        if(!empty($cart)) {
            $order_number = rand(0, 10000);
            $pos_number = 1;

            $order = new Orders();
            $order->order_number = $order_number;
            $order->date = date("Y-m-d H:i:s");
            $order->session_id = Session::call()->getId();
            $order->user_login = App::call()->userRepository->getName();
            $order->user_id = App::call()->userRepository->getId();
            $order->status = 'new';
            $order->telephone = App::call()->request->getParams()['telephone'];
            $order->delivery = App::call()->request->getParams()['country'];
            $order->total = App::call()->cartRepository->getSumWhere('subtotal','session_id', Session::call()->getId());
            App::call()->orderRepository->save($order);


            foreach ($cart as $item) {
                $pos = new Positions();
                $pos->order_id = $order_number;
                $pos->order_pos = $pos_number;
                $pos->product_id = $item['product_id'];
                $pos->quantity = $item['quantity'];
                $pos->subtotal = $item['subtotal'];
                $pos_number++;
                App::call()->positionRepository->save($pos);
            }

            App::call()->cartRepository->clear(Session::call()->getId());
            header('Location: /cart ');
            exit();

        }
    }
}