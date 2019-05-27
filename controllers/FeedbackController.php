<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController extends Controller
{
    private $action;
    public $layout = 'main';
    public $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: 'feedback';
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {

            $this->$method();
        }
        else {
            echo "404";
        }

    }

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

            $fb->save();
        }

        header('Location: /?c=feedback');
        exit();
    }

}