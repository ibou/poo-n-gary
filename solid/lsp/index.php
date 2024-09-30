<?php
require_once 'Car.php';
require_once 'Driver.php';
require_once 'Astra.php';
require_once 'Beetle.php';

$car = new Car();
$astra = new Astra();
$beetle = new Beetle();
$driver = new Driver($beetle);
$driver->go();