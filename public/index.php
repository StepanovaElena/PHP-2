<?
use app\models\Products;


include "../engine/Autoload.php";
include "../config/main.php";

use app\engine\Autoload;
use app\models\Users;

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}


/** @var Products $product */

//$product = Products::getOne(1);

//$product->setName('Новое название');
//$product->setDescription('Новое описание');

//$product->save();

//var_dump($product);
