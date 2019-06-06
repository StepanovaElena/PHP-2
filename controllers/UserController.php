<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Users;

class UserController extends Controller
{
    public function actionAdmin() {
        echo $this->render('admin', [
            'orders' => App::call()->orderRepository->getAllWhere('status', 'new')
        ]);
    }

    public function actionAccount() {
        echo $this->render('account', [
            'orders' => App::call()->orderRepository->getAllWhere('user_id', App::call()->userRepository->getId()),
            'positions' => App::call()->positionRepository->getOrderPosByUserId(App::call()->userRepository->getId())
        ]);
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }

    public function actionLogin()
    {
        $userData = App::call()->request->getParams();

        if (!empty($userData)) {
            $login = $userData['login'];
            $pass = $userData['password'];
        }

        if (!App::call()->userRepository->auth($login, $pass)) {
            Die("Не верный пароль!");
        } else {
            if ($userData['remember']) {
                App::call()->userRepository->setCookies();
            }

            header("Location: /");
        }
    }

    public function actionSignUp() {

        $userData = App::call()->request->getParams();

        if (empty($userData['nick_name'])) {
            throw new \Exception('Не передан Name');
        }

        if (empty($userData['e-mail'])) {
            throw new \Exception('Не передан E-mail');
        }

        if (empty($userData['password'])) {
            throw new \Exception('Не передан Password');
        }

        if (empty($userData['login'])) {
            throw new \Exception('Не передан Login');
        }

        if (!empty ($userData)) {

            $user = new Users();
            $user->id = null;
            $user->login = $userData['login'];
            $user->nick_name = $userData['nick_name'];
            $user->email = $userData['e-mail'];
            $user->password_hash = password_hash($userData['password'], PASSWORD_DEFAULT);
            $user->is_confirmed = false;
            $user->created_at = date("Y-m-d H:i:s");
            $user->role = 'user';
            $user->hash = uniqid(rand(), true);
            App::call()->userRepository->save($user);

            $this->actionLogin();

            header('Location: / ');
            exit();
        }

    }
}