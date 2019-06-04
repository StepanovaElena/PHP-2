<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;

abstract class Controller implements IRenderer
{
    protected $action;
    protected $layout = 'main';
    protected $useLayout = true;
    private $renderer;


    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null) {
        $this->action = $action ?: 'index';
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {

            $this->$method();
        }
        else {
            echo "404";
        }

    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}",[
                'content' => $this->renderTemplate($template, $params),
                'menu' => $this->renderTemplate('menu', $params),
                'auth' => $this->renderTemplate('auth', [
                    'enter' => (new UserRepository())->isAuth()
                ]),
                'header' => $this->renderTemplate('header', [
                    'ngoods' => (new CartRepository())->getSumWhere('quantity', 'session_id', session_id())]),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);

    }

}