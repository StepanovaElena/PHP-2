<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController extends Controller
{
    private $action;
    public $layout = 'main';
    public $useLayout = true;


    public function actionFeedback() {
        $feedback = Feedback::getAll();
        echo $this->render("feedback", [
            'feedback' => $feedback
        ]);
    }

    public function actionInsert() {

        if (!empty($_POST)) {

            $fb = new Feedback();
            $fb->setUser_name($_POST['name']);
            $fb->setText($_POST['text']);
            $fb->setDate(date("Y-m-d H:i:s"));
            //$fb->setProduct_id($_POST['text']);

            $fb->save();
        }

        header('Location: /feedback');
        exit();
    }

}