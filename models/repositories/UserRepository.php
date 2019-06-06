<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Users;


class UserRepository extends Repository
{
    public function getName() {
        return $this->isAuth() ? $_SESSION['auth']['login'] : "Guest";
    }

    public function getId() {
        return $this->isAuth() ? $_SESSION['auth']['id'] : "Guest";
    }

    public function auth($login, $pass) {
        $user = $this->getOneWhere('login', $login);
        if (!empty($user)) {
            if (password_verify($pass, $user->password_hash)) {
                $_SESSION['auth'] = [
                    'id' => $user->id,
                    'login' => $user->login,
                    'role' => $user->role
                ];
                return true;
            }
            return false;
        }
    }

    public function isAuth() {
        return isset($_SESSION['auth']['login']) ? true: false;
    }

    public function isAdmin() {
        return ($_SESSION['auth']['role']) == 'admin'? true: false;
    }

    public function setCookies() {
        $hash = uniqid(rand(), true);
        $id = $_SESSION['auth']['id'];
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