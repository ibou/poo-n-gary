<?php

use Ibou\App\Order;
use Ibou\App\OrderController;
use Ibou\App\SmsNotifier;
use Ibou\App\EmailNotifier;
use Ibou\App\SearchArray;
use Ibou\App\User;

require __DIR__ . '/../vendor/autoload.php';
 

$order = new OrderController();

$user = new User(name: "Ibou", email: "email@gmail.com");

$order->create(new Order("Ibou", "idiallo@gmail.com"), new SmsNotifier());
$order->create(new Order("Jamel", "sara@gmail.com"), new EmailNotifier);
 
dump($user->fullName);
$user->fullName = "jamel";
dump($user->fullName);


$search = new SearchArray();
dump($search->search('Iphone'));
//find a product by name




