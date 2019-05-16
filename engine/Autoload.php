<?php

namespace app\engine;

class Autoload
{
    public $root = "app\\";

    public function loadClass($className) {

        $className = str_replace($this->root, "", $className);

        //var_dump($className);

        $fileName = '..\\' . $className . '.php';

        //var_dump($fileName);

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}


