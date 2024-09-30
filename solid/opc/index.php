<?php

require_once 'PaymentMethodInterface.php';
require_once 'PaymentManager.php';
require_once 'PaypalIpn.php';
require_once 'CreditCard.php';

$paypal = new PaypalIpn();
$paymentManager = new PaymentManager($paypal);
$paymentManager->process();

$creditCard = new CreditCard();
$paymentManager = new PaymentManager($creditCard);
$paymentManager->process();