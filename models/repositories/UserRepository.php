<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\Repository;
use app\models\entities\Users;


class UserRepository extends Repository
{
    public function getName() {
        return $this->isAuth() ? Session::call()->data['auth']['login'] : "Guest";
    }

    public function getId() {
        return $this->isAuth() ? Session::call()->data['auth']['login'] : "Guest";
    }

    public function auth($login, $pass) {
        $user = $this->getOneWhere('login', $login);
        if (!empty($user)) {
            if (password_verify($pass, $user->password_hash)) {
                Session::call()->setKey('auth', [
                    'id' => $user->id,
                    'login' => $user->login,
                    'role' => $user->role
                ]);
                return true;
            }
            return false;
        }
    }

    public function isAuth() {
        return isset(Session::call()->data['auth']['login']) ? true: false;
    }

    public function isAdmin() {
        return (Session::call()->data['auth']['login']) == 'admin'? true: false;
    }

    public function setCookies() {
        $hash = uniqid(rand(), true);
        $id = Session::call()->data['auth']['id'];
        $user = $this->getOneWhere('id', $id);
        $user->setHash($hash);
        (new UserRepository())->save($user);

        setcookie("hash", $hash, time() + 3600);
    }

    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return Users::class;
    }

}