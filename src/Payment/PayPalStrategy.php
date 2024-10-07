<?php

namespace App\Payment;

class PayPalStrategy implements PaymentStrategyInterface
{

    public function __construct(
        private readonly string $email,
        private readonly string $password
    )
    {
    }

    public function supports(string $paymentMethod): bool
    {
        return in_array(strtolower($paymentMethod), ['paypal', 'pp']);
    }

    public function pay(float $amount): bool
    {
        if ($this->validate()) {
            echo "Paiement de {$amount}€ par paypal" . PHP_EOL;
            return true;
        }
        return false;
    }

    public function validate(): bool
    {
        return !empty($this->email) && !empty($this->password);
    }
}