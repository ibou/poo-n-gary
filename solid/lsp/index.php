<?php
require_once 'Car.php';
require_once 'Driver.php';
require_once 'Astra.php';
require_once 'Beetle.php';

echo "".str_repeat('=', 50)."\n";
$car = new Car();
$driver = new Driver($car);
$driver->go();
echo "" . str_repeat('=', 50) . "\n";
$astra = new Astra();
$driver = new Driver($astra);
$driver->go();
echo "" . str_repeat('=', 50) . "\n";
$beetle = new Beetle();
$driver = new Driver($beetle);
$driver->go();