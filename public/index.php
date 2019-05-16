<?
use app\models\{Products, Users};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


//$product = new Products(new Db());

//var_dump($product->getOne(1));

//var_dump($product instanceof Products);

//не весовой товар
$productReal = new \app\models\Product_Real(1, "T-shirts", "Mango People T-Shirts",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae!",
    "XS",52, "pc");
echo "1. {$productReal->name} | size: {$productReal->size} | unit price: $ {$productReal->price} | quantity: 2 {$productReal->unit} | ----- $ {$productReal->getSubtotal(2)}<br>";
//var_dump($productReal);
echo "Total: $ {$productReal->getTotalSum()}<br>";

//цифровой товар
$productDigital = new \app\models\Product_Digital(2, "Books", "Tales of uncle Remus (Audiobook)",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae!",
    "-",69,  "disc");
echo "2. {$productDigital->name} | size: {$productDigital->size} | unit price: $ {$productDigital->price} | quantity: 1 {$productDigital->unit} | ----- $ {$productDigital->getSubtotal(1)}<br>";
//var_dump($productDigital);
echo "Total: $ {$productDigital->getTotalSum()}<br>";

//весосвой товар
$productWeight = new \app\models\Product_Weight(3, "Fasteners", "Screw",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda, debitis dignissimos dolore iusto nam nihil sequi ut vitae!",
    "3.5x9.5 mm",15, "kg");
echo "3. {$productWeight->name} | size: {$productWeight->size} | unit price: $ {$productWeight->price} | quantity: 0.2 {$productWeight->unit} | ----- $ {$productWeight->getSubtotal(0.2)}<br>";
//var_dump($productWeight);
echo "Total: $ {$productWeight->getTotalSum()}<br>";


