<?php

namespace App\Payment;

class PaymentStrategyResolver
{
    /**
     * @param iterable<PaymentStrategyInterface> $strategies
     */
    public function __construct(
        private iterable $strategies
    ) {}

    //private array $strategies = [];

    public function addStrategy(PaymentStrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function resolveStrategy(string $paymentMethod): PaymentStrategyInterface
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($paymentMethod)) {
                return $strategy;
            }
        }
        throw new \InvalidArgumentException(
            sprintf('Aucune stratégie trouvée pour la méthode de paiement "%s"', $paymentMethod)
        );
    }
}