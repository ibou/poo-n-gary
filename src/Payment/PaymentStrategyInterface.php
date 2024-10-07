<?php

declare(strict_types=1);

namespace App\Payment;

interface PaymentStrategyInterface
{
    public function pay(float $amount): bool;
    public function validate(): bool;
    public function supports(string $paymentMethod): bool;
}