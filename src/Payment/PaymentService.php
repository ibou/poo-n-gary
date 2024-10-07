<?php

namespace App\Payment;

class PaymentService
{
    public function __construct(
        private readonly PaymentStrategyResolver $resolver
    ) {}

    public function processPayment(string $paymentMethod, float $amount): bool
    {
        $strategy = $this->resolver->resolveStrategy($paymentMethod);
        return $strategy->pay($amount);
    }
}