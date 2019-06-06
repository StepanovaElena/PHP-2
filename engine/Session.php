<?php


namespace app\engine;


use app\traits\Tsingletone;

class Session
{
    use TSingletone;

    private $session_id;

    public static function call()
    {
        return static::getInstance();
    }

    protected function __construct($session_id = null)
    {
        if (null !== $session_id) {
            $this->session_id = $session_id;
        }
        $this->start();
    }
    //стартуем сессию
    protected function start()
    {
        if (!$this->isStarted()) {
            if ($this->session_id) {
                $this->setId($this->session_id);
            }
            session_start();
            $this->session_id = session_id();

            if (!empty($_SESSION)) {
                $this->data = $_SESSION;
            }
        }
    }
    //Проверяем существует ли сессия.
    protected function isStarted()
    {
        return !(session_id() === '');
    }
    //Добавление ID 
    protected function setId($session_id)
    {
        $this->session_id = $session_id;
    }

    public function getId()
    {
        return $this->session_id;
    }

}

class Krugozor_Base_Session extends Krugozor_Cover_Abstract_Array
{
    private static $instance;

    /**
     * Имя сессии.
     *
     * @var string
     */
    private $session_name;




    /**
     * Инициализация сессии.
     *
     * @param null|string $session_name имя сессии
     * @param null|string $session_id идентификатор сессии
     * @return Krugozor_Base_Session
     */
    public static function getInstance($session_name = null, $session_id = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($session_name, $session_id);
        }

        return self::$instance;
    }

    public function __destruct()
    {
        $this->save();
    }

    /**
     * Уничтожает сессию.
     *
     * @param void
     * @return void
     */
    public function destroy()
    {
        $this->data = $_SESSION = array();

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }

        session_destroy();
    }

    /**
     * Возвращает имя сессии.
     *
     * @param void
     * @return string
     */
    public function getName()
    {
        return $this->session_name;
    }

    /**
     * Возвращает идентификатор сессии.
     *
     * @param void
     * @return string
     */
    public function getId()
    {
        return $this->session_id;
    }


    protected function __construct($session_name = null, $session_id = null)
    {
        $this->session_name = !empty($session_name) ? $session_name : session_name();

        session_name($this->session_name);

        // Устанавливаем $this->session_id именно таким образом, а не через $this->setId() потому,
        // что в $this->start() идёт проверка с использованием session_id().
        if (null !== $session_id) {
            $this->session_id = $session_id;
        }

        $this->start();
    }




    /**
     * Устанавливает ID сессии.
     *
     * @param string $sid идентификатор сессии
     * @return void
     */
    protected function setId($session_id)
    {
        $session_id = trim($session_id);

        if (preg_match('~[^a-z0-9,\-]+~i', $session_id)) {
            throw new InvalidArgumentException('Попытка присвоить некорректный ID сессии.');
        }

        session_id($session_id);
    }



    /**
     * Сохраняет данные объекта в сессии.
     *
     * @param void
     * @return void
     */
    protected function save()
    {
        $_SESSION = $this->data;
    }
}