<?php

namespace app\models;


class Users extends DbModel
{
    public $id;
    public $login;
    public $nick_name;
    public $email;
    public $is_confirmed;
    public $role;
    public $password_hash;
    public $created_at;
    public $hash;

    public $flag_hash = false;


   public function __construct($id = null, $login = null, $nick_name = null, $email = null, $is_confirmed = null, $created_at = null, $password_hash = null, $role = null, $hash = null)
   {
       $this->id = $id;
       $this->login = $login;
       $this->nick_name = $nick_name;
       $this->email = $email;
       $this->is_confirmed = $is_confirmed;
       $this->role = $role;
       $this->password_hash = $password_hash;
       $this->created_at = $created_at;
       $this->hash = $hash;
   }

   public function setHash($hash) {
       $this->hash = $hash;
       $this->flag_hash = true;
   }

    public static function auth($login, $pass) {
        $user = static::getOneWhere('login', $login);
        if (!empty($user)) {
            if (password_verify($pass, $user->password_hash)) {
                $_SESSION['auth'] = [
                    'id' => $user->id,
                    'login' => $user->login,
                ];
                return true;
            }
            return false;
        }
    }

    public static function isAuth() {
        return isset($_SESSION['auth']['login']) ? true: false;
    }

    public static function setCookies() {
        $hash = uniqid(rand(), true);
        $id = $_SESSION['auth']['id'];
        $user = static::getOneWhere('id', $id);
        $user->setHash($hash);
        $user->save();

        setcookie("hash", $hash, time() + 3600);

        header("Location: /");
    }

    public static function getTableName()
    {
        return 'users';
    }

}