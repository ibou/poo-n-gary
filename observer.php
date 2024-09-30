<?php

declare(strict_types=1);

use App\DesignPattern\SignificantChangeObserver;
use App\DesignPattern\Stock;
use App\DesignPattern\StockPurchaseObserver;

require __DIR__ . '/vendor/autoload.php';

$stock = new Stock();

$stock->attach(new SignificantChangeObserver());
$stock->attach(new StockPurchaseObserver());

dump($stock->getPrice());
$stock->getLatestPrice();