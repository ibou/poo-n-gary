<?php

class CreditCard implements PaymentMethodInterface
{
  public function processPayment()
  {
    var_dump('Process payment using credit card');
  }
}