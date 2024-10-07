<?php

namespace App\Payment;

class BankTransferStrategy implements PaymentStrategyInterface
{
    public function __construct(
        private readonly string $iban,
        private readonly string $bic
    )
    {
    }

    public function supports(string $paymentMethod): bool
    {
        return in_array(strtolower($paymentMethod), ['bank_transfer', 'transfer', 'virement']);
    }

    public function pay(float $amount): bool
    {
        if ($this->validate()) {

            echo "Paiement de {$amount}€ via virement \n";
            return true;
        }
        return false;
    }

    public function validate(): bool
    {
        return !empty($this->iban) && !empty($this->bic);
    }

}
