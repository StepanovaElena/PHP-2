<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Feedback;
use app\models\repositories\FeedbackRepository;

class FeedbackController extends Controller
{
    public function actionFeedback() {
        $feedback = (new FeedbackRepository())->getAll();
        echo $this->render("feedback", [
            'feedback' => $feedback
        ]);
    }

    public function actionInsert() {

        $userData = (new Request())->getParams();

        $fb = new Feedback();
        $fb->setUser_name($userData['name']);
        $fb->setText($userData['text']);
        $fb->setDate(date("Y-m-d H:i:s"));
        $fb->setProductId($userData['id']);
        $fb->setStatus('new');

        (new FeedbackRepository())->save($fb);


        header('Location: /product/card/?id=' . $userData['id']);
        exit();
    }

}