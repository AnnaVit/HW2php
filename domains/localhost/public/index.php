<pre>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/services/Autoloader.php";

use models\Order;
use models\Product;
use models\User;
use php2hw2\Internet;

spl_autoload_register([new \services\Autoloader(), 'loadClass']);
spl_autoload_register( [new \services\Autoloader(), 'hwLoadClass']);//это для той части домашки, которая потом будет удаляться


$product = new Product;
$user = new User;
var_dump($product);
var_dump($user);

$a = new Order(1111,'egurue@ddd', 1234, 'кукушкино 16, ', 10, 0);

$b = new Internet(30,50,111,'xnj-nj', 200);

var_dump($b);

