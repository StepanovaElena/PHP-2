<?php


namespace app\engine;


use app\traits\Tsingletone;

class Session
{
    private $session_id;
    public $data;

    use TSingletone;

    public static function call()
    {
        return static::getInstance();
    }

    public function __construct($session_id = null)
    {
        $this->session_id = $session_id;
        $this->start();
    }

    public function start()
    {
        session_start();
        $this->setId(session_id());
        $this->data = $_SESSION;
    }

    public function setId($session_id)
    {
        $this->session_id = $session_id;
    }

    public function getId()
    {
        return $this->session_id;
    }

    public function destroy()
    {
        $this->data = $_SESSION = [];
        session_destroy();
    }

    public function getData()
    {
        return $this->data;
    }


    public function setKey($key1, $params = [])
    {
        foreach ($params as $key => $value) {
                $this->data[$key1][$key] = $value;
            }
        $_SESSION = $this->data;
    }
}

