<?php

namespace App\Payment;

class CreditCardStrategy implements PaymentStrategyInterface
{

    public function __construct(
        private readonly string $cardNumber,
        private readonly string $expiryDate,
        private readonly string $cvv
    )
    {
    }

    public function supports(string $paymentMethod): bool
    {
        return in_array(strtolower($paymentMethod), ['cb', 'credit_card', 'card', 'creditcard']);
    }

    public function pay(float $amount): bool
    {
        if ($this->validate()) {
            // Logique de paiement par carte bancaire
            echo "Paiement de {$amount}€ par carte bancaire" . PHP_EOL;
            return true;
        }
        return false;
    }

    public function validate(): bool
    {
        return !empty($this->cardNumber) &&
            !empty($this->expiryDate) &&
            !empty($this->cvv);
    }
}