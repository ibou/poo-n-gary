<?php

declare(strict_types=1);

use App\DTO\UserRegistration;
use App\Validation\Validator;

require __DIR__ . '/../vendor/autoload.php';

$admin = new \App\Admin('Ib', 'ibou#ibou.com', 'admin');

$useregistration = new UserRegistration(name: 'Lo', email: 'coco@gmail.com');

$validation = new Validator();
$validation->_validate($useregistration);

dump($validation->getErrors());
