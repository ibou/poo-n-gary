<?php

require_once 'User.php';

$user = new User('John', 'Doe');
$user->fullName = 'Jane Dasian';

echo $user->fullName . PHP_EOL; // Jane Dasian
//hooks
$data = [
    'a' => 'first',
    'b' => 'second',
    'c' => 'thid',
    'd' => 'fourth',
    'e' => 'fifth fdaf'
];

var_dump(array_all($data, function ($letter) {
    return strlen($letter) > 5;
})); // fifth fdaf 

require_once 'IterableDemoClass.php';
$sizes = ['small', 'medium', 'large', 'xlarge'];
$iterableDemoClass = new IterableDemoClass($sizes);
var_dump($iterableDemoClass); // object
function iterata_things(iterable $iterableDemoClass)
{
    foreach ($iterableDemoClass as $key => $value) {
        print $key . ' => ' . $value . PHP_EOL;
    }
}

iterata_things($iterableDemoClass);
var_dump($iterableDemoClass);

require_once 'MappedIteratorDemo.php';

$mappedIteratorDemo = new MappedIteratorDemo($sizes);
foreach ($mappedIteratorDemo as $item => $value) {
    print "$item: $value" . PHP_EOL;
}
//var_dump($mappedIteratorDemo->getChildren()); // 4

print count($mappedIteratorDemo) . PHP_EOL; // Countab 

require_once 'Collection.php';
require_once 'City.php';

$cities = [
    'frankfurt' => new City(name: 'Frankfurt', country: 'Germany', population: 3000000),
    'mumbai' => new City(name: 'Mumbai', country: 'India', population: 120000000),
    'valencia' => new City(name: 'Valencia', country: 'Spain', population: 1000000)
];

$citiesCollection = new Collection($cities);

print count($citiesCollection) . PHP_EOL;
var_dump($citiesCollection->getKeys());
var_dump($citiesCollection->first());
var_dump($citiesCollection->last());

$citiesCollection->remove('frankfurt');
$citiesCollection->set('london', new City('London', 'UK', 10000000));
var_dump($citiesCollection->toArray());
