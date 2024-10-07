<?php

declare(strict_types=1);


use App\Payment\BankTransferStrategy;
use App\Payment\CreditCardStrategy;
use App\Payment\PaymentStrategyResolver;
use App\Payment\PayPalStrategy;

require_once __DIR__ . '/vendor/autoload.php';

$strategies = [
    new CreditCardStrategy("4111111111111111", "12/25", "123"),
    new PayPalStrategy('test@example', 'password'),
];
$resolver = new PaymentStrategyResolver(strategies: $strategies);
$transfert = new BankTransferStrategy('FR1420041010050500013M02606', 'AGRIFRPP882');
$resolver->addStrategy($transfert);

try {
    $resolver->resolveStrategy('credit_card')->pay(100);
    $resolver->resolveStrategy('paypal')->pay(200);
    $resolver->resolveStrategy('virement')->pay(300);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

