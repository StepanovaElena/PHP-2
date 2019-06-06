<?php

namespace app\models\entities;

class Users extends DataEntity
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

    public $properties = [
        'hash' => false
    ];


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
        $this->properties['hash'] = true;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }
}