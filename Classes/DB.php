<?php

trait DB
{

  public static function connect()
  {
    /* TODO extract into env variables */
    $mysqli = new mysqli('localhost', 'root', '', 'php-mysqli-workshop', '3306');
    //var_dump($mysqli);
    
    /* Checks if the connectios was successful */
    if ($mysqli->connect_error) {

      $error = $mysqli->connect_error;
      throw new Exception("Error Processing Request . $error", 1);
    }

    return $mysqli;
  }
}