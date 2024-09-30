<?php

require_once 'ErrorHandler.php';
require_once 'Logger.php';

$logger = new Logger();
$errorHandler = new ErrorHandler($logger);

set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($errorHandler) {
  return $errorHandler->error($errno, $errstr, $errfile, $errline);
});

set_exception_handler(function ($exception) use ($errorHandler) {
  return $errorHandler->exception($exception);
});
