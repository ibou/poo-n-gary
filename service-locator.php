<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPattern\CsvFileWriter;
use App\DesignPattern\ExampleProcessor;
use App\DesignPattern\FileWriter;
use App\DesignPattern\JsonFileWriter;

$serviceLocator = new \App\ServiceLocator();
//$serviceLocator->addInstance(FileWriter::class, new CsvFileWriter()); 
$serviceLocator->addInstance(FileWriter::class, new JsonFileWriter()); 
$fileWriter = $serviceLocator->get(FileWriter::class);

$serviceLocator->addClass(ExampleProcessor::class, [$fileWriter]);

// Vérifiez si ServiceLocator a ExampleProcessor...imprimez le résultat
print $serviceLocator->has(ExampleProcessor::class) . PHP_EOL;
// Récupérez l'ExampleProcessor du ServiceLocator
$processor = $serviceLocator->get(ExampleProcessor::class);
// Appelez la méthode process sur ExampleProcessor avec ['some' => 'data']
$processor->process(['some' => 'data']);

dump($serviceLocator);
