<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Feedback;

class FeedbackController extends Controller
{
    public function actionFeedback() {
        $feedback = App::call()->feedbackRepository->getAll();
        echo $this->render("feedback", [
            'feedback' => $feedback
        ]);
    }

    public function actionInsert() {

        $userData = App::call()->request->getParams();

        $fb = new Feedback();
        $fb->setUser_name($userData['name']);
        $fb->setText($userData['text']);
        $fb->setDate(date("Y-m-d H:i:s"));
        $fb->setProductId($userData['id']);
        $fb->setStatus('new');
        $fb->user_id = App::call()->userRepository->getId();

        App::call()->feedbackRepository->save($fb);

        header('Location: /product/card/?id=' . $userData['id']);
        exit();
    }

}