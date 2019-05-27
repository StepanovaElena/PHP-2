<?php

namespace app\controllers;


use app\interfaces\IRenderer;

class Render implements IRenderer
{

    public function renderTemplate($template, $params = []) {
        ob_start();
        var_dump(extract($params));
        $templatePath = "../views/" . $template . ".php";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();

    }
}