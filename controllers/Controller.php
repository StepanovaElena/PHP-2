<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Session;
use app\interfaces\IRenderer;

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
                'enter' => App::call()->userRepository->isAuth(),
                'content' => $this->renderTemplate($template, $params),
                'menu' => $this->renderTemplate('menu', [
                    'admin' => App::call()->userRepository->isAdmin(),
                    'enter' => App::call()->userRepository->isAuth()
                ]),
                'auth' => $this->renderTemplate('auth', [
                    'enter' => App::call()->userRepository->isAuth(),
                ]),
                'header' => $this->renderTemplate('header', [
                    'ngoods' => App::call()->cartRepository->getSumWhere('quantity', 'session_id', Session::call()->getId()),
                    'enter' => App::call()->userRepository->isAuth()
                ])
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);

    }

}