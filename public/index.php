<?
session_start();

include "../engine/Autoload.php";
include "../config/main.php";
require_once '../vendor/autoload.php';

use app\engine\Autoload;
use app\engine\Render;
use app\engine\Request;
use app\engine\TwigRender;

spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        throw new \Exception("No Controller");
    }

} catch (\PDOException $e) {
    echo $e->getMessage();
    var_dump($e->getTrace());
}

catch (\Exception $e) {
    echo $e->getMessage();
}




