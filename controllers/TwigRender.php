<?php

namespace app\controllers;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {

        $templatePath = $template . ".tmpl";

        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $twig = new \Twig\Environment($loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);


        return $twig->render($templatePath, $params);

    }
}