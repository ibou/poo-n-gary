<?php

declare(strict_types=1);

require_once 'ErrorHandler.php';
require_once 'Logger.php';

$errorFile = __DIR__ . '/errors_'.date('Ymd').'.log';

$logger = new Logger(logFile: $errorFile);
$errorHandler = new ErrorHandler($logger);

set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($errorHandler) {
  return $errorHandler->error($errno, $errstr, $errfile, $errline);
});

set_exception_handler(function ($exception) use ($errorHandler) {
  return $errorHandler->exception($exception);
});

function printTestHeader($testName)
{
  echo "\n" . str_repeat('=', 50) . "\n";
  echo "Test: $testName\n";
}

// Test 1: Erreur simple
printTestHeader("Test d'erreur simple");
trigger_error("Ceci est une erreur de test", E_USER_WARNING);

// Test 2: Notice
printTestHeader("Test d'une notice");
$undefinedVariable;  // Ceci va générer une notice

// Test 3: Division par zéro
printTestHeader("Test division par zéro");
try {
  $result = 1 / 0;
} catch (Error $e) {
  $errorHandler->exception($e);
}

// Test 4: Exception personnalisée
printTestHeader("Test d'exception personnalisée");
try {
  throw new Exception("Ceci est une exception de test");
} catch (Exception $e) {
  $errorHandler->exception($e);
}

// Test 5: Erreur de type
 
// Test 6: Appel d'une fonction inexistante
printTestHeader("Test de fonction inexistante");
try {
  fonctionInexistante();
} catch (Error $e) {
  $errorHandler->exception($e);
}

// Test 7: Erreur syntaxique (commenté car il arrêterait l'exécution)
printTestHeader("Test d'erreur de syntaxe");
/* 
eval('<?php
    if() {    // Erreur de syntaxe intentionnelle
');
*/

// Test 8: Test avec différents niveaux d'erreur
printTestHeader("Test des différents niveaux d'erreur");
trigger_error("Erreur de dépréciation", E_USER_DEPRECATED);
trigger_error("Erreur de notice", E_USER_NOTICE);
trigger_error("Erreur d'avertissement", E_USER_WARNING);
