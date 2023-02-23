<?php
Class Connection
{
  static function Connection()
  {
  $serverHost= "Localhost";
  $dbName = "sinus";
  $dbHost ="root";
  $password = "";

  $conn = new mysqli($serverHost, $dbHost, $password ,$dbName);

  return $conn;

  }
}
