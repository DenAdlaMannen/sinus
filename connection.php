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

  // Check connection
  if ($conn->connect_error) {
    return die("Connection failed: " . $conn->connect_error);
  }
  else
  {
    return $conn;
  }
  }
}
