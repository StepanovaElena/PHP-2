<?
//session_start();

//include "../engine/Autoload.php";
require_once '../vendor/autoload.php';

$config = include __DIR__ . "/../config/config.php";

use app\engine\App;
use app\engine\Autoload;
use app\engine\Session;

//spl_autoload_register([new Autoload(), 'loadClass']);

Session::call();

try {
    App::call()->run($config);

} catch (Exception $e) {
    var_dump($e);

} catch (\PDOException $e) {
    echo $e->getMessage();
    var_dump($e->getTrace());
}




