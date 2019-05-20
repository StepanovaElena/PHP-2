<?
use app\models\Products;


include "../engine/Autoload.php";
include "../config/main.php";

use app\engine\Autoload;


spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Products("Огурец", "Зеленый", 22, "Хорошее");

$product->insert();

$product1 = new Products();

$product1->getOne(1);

$product1->delete();

/*для обновления записи
    $product->setName('Новое название ');
    $product->setPrice('Новая цена');
    $product->save(); //функция сохраняющая текущее значение


public function getObjProperties()
{
    $obj = new ReflectionObject($this);
    $properties = $obj->getProperties();

    //здесь приведение к формату массива
}

public function save()
{
    $objProperties = $this->getObjProperties();
    if ($this->id !== null) {
        $this->update($objProperties);
    } else {
        $this->insert($objProperties);
    }
}

private function update($objProperties)
{
    //обновляем существующую запись в базе
}

private function insert($objProperties)
{
    //здесь мы создаём новую запись в базе
}

*/
