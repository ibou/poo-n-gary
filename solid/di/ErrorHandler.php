<?php

class ErrorHandler
{

  protected $logger;

  public function __construct(Logger $logger)
  {
    $this->logger = $logger;
  }

  public function error($errno, $errstr, $errfile, $errline)
  {
    // Implémentation de la gestion des erreurs
    $this->logger->log("Erreur [$errno]: $errstr dans le fichier $errfile à la ligne $errline");
    return true;
  }

  public function exception($exception) {
    // Gérer l'exception ici
    $this->logger->log('Exception: ' . $exception->getMessage());
  }
}
