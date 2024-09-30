<?php

class PaypalIpn implements PaymentMethodInterface
{

  public function processPayment()
  {
    try {
      // Process the payment using Paypal
      var_dump('Process payment using Paypal');
    } catch (Exception $e) {
    }
  }
}
