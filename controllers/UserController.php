<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Users;
use app\models\repositories\UserRepository;

class UserController extends Controller
{
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }

    public function actionLogin()
    {
        $request = new Request();
        $userData = $request->getParams();

        if (!empty($userData)) {
            $login = $userData['login'];
            $pass = $userData['password'];
        }

        if ((new UserRepository())->auth($login, $pass)) {
            Die("Не верный пароль!");
        } else {
            if ($userData['remember']) {
                (new UserRepository())->setCookies();
            }

            header("Location: /");
        }
    }

    public function actionSignUp() {

        $request = new Request();
        $userData = $request->getParams();

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
            (new UserRepository())->save($user);

            header('Location: / ');
            exit();
        }

    }
}