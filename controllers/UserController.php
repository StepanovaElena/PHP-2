<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Users;

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

        var_dump($userData);

        if (!empty($userData)) {
            $login = $userData['login'];
            $pass = $userData['password'];
        }



        if (!Users::auth($login, $pass)) {
            Die("Не верный пароль!");
        } else {
            if ($userData['remember']) {
                $auth = [
                    'login' => $_SESSION['auth']['login'],
                ];
                Users::setCookies();
            }

            header("Location: /");
        }
    }

    public function actionSignUp() {

        $request = new Request();
        $userData = $request->getParams();

        if (!empty($userData)) {

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
            $user->save();

            return $user;
        }

        header('Location: /product');
        exit();
    }
}