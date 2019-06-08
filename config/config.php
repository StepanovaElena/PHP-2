<?php
define("ON_PAGE", '3');
//define("DIR_ROOT", $_SERVER['DOCUMENT_ROOT']);
//define("DS", DIRECTORY_SEPARATOR);

use app\engine\Request;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\FeedbackRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\PositionRepository;
use app\engine\Db;

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../views/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'new_project',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],

        'session' =>[
            'class' => Session::class
        ],
        //По хорошему сделать для репозиториев отедьное простое хранилище
        //без reflection
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'feedbackRepository' => [
            'class' => FeedbackRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'positionRepository' => [
            'class' => PositionRepository::class
        ]

    ]
];