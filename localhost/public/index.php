<pre>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";
include ROOT_DIR . "/services/Autoloader.php";


use app\models\Product;
use app\models\User;
use app\services\Db;
use app\models\Order;


spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$order = new Order(2, 'Марья Ивановна', 3, 'деревня дедушки', 0, 0);

$order->addDb();


