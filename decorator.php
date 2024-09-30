<?php

declare(strict_types=1);

use App\DesignPattern\ExecutiveSuiteDecorator;
use App\DesignPattern\LateCheckoutDecorator;
use App\DesignPattern\MembershipDecorator;
use App\DesignPattern\Reservation;

require_once __DIR__ . '/vendor/autoload.php';

$reservation = new Reservation();
$reservation = new ExecutiveSuiteDecorator($reservation);
$reservation = new MembershipDecorator($reservation); // 7.5
$reservation = new LateCheckoutDecorator($reservation); // 9

print $reservation->calculateCost(). PHP_EOL;