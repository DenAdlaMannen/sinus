<?php

function allAdmins()
{
//OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);

  $query = "SELECT Username, adminID
  FROM admins
  WHERE adminID != ?";

  $username = 1;
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $username);
  $stmt->execute();

  $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 

  return $users;
}


?>