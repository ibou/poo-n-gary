<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPattern\CsvFileWriter;
use App\DesignPattern\ExampleProcessor;
use App\DesignPattern\JsonFileWriter;

$csvFileWriter = new CsvFileWriter();
$jsonFileWriter = new JsonFileWriter();

$processor = new ExampleProcessor($csvFileWriter);

dump($processor->process(['data' => 'test']));

$processor = new ExampleProcessor($jsonFileWriter);

dump($processor->process(['data' => 'test']));

