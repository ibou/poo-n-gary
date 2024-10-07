<?php

declare(strict_types=1);

namespace Tests;

use App\Payment\BankTransferStrategy;
use App\Payment\CreditCardStrategy;
use App\Payment\PaymentService;
use App\Payment\PaymentStrategyInterface;
use App\Payment\PaymentStrategyResolver;
use App\Payment\PayPalStrategy;
use PHPUnit\Framework\TestCase;
use TypeError;

class PaymentTest extends TestCase
{

    // Exemple de test unitaire
    public function testPaymentService(): void
    {

        $strategies = [
            new CreditCardStrategy("4111111111111111", "12/25", "123"),
           new PayPalStrategy('test@example', 'password'),
            new BankTransferStrategy('FR1420041010050500013M02606', 'AGRIFRPP882')
        ];


        $resolver = new PaymentStrategyResolver(strategies: $strategies);
        $service = new PaymentService($resolver);
        $result = $service->processPayment('cb', 800.00);
        //assertTrue vérifie que la valeur est vraie
        $this->assertTrue($result);

        $result = $service->processPayment('paypal', 200.00);
        $this->assertTrue($result);

        $result = $service->processPayment('virement', 300.00);
        $this->assertTrue($result);
    }

    //test fail paiment method with InvalidArgumentException
    public function testPaymentServiceWithInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        //message d'erreur
        $this->expectExceptionMessage('Aucune stratégie trouvée pour la méthode de paiement "test"');
        $strategies = [
            new CreditCardStrategy("4111111111111111", "12/25", "123"),
            new PayPalStrategy('test@example', 'password'),
            new BankTransferStrategy('FR1420041010050500013M02606', 'AGRIFRPP882')
        ];

        $resolver = new PaymentStrategyResolver(strategies: $strategies);
        $service = new PaymentService($resolver);
        $service->processPayment('test', 800.00);
    }


}