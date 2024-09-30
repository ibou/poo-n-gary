<?php

require_once 'User.php';
require_once 'Logger.php';


$logger = new Logger();

$user = new User($logger);

$user->create(['name' => 'John Doe']);
