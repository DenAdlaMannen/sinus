<?php

function allAdmins()
{
//OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);

  //FETCH DATA
  $query = "SELECT Username, adminID
  FROM admins
  WHERE adminID != ?";

  $username = 1;
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $username);
  $stmt->execute();

  $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $conn->close(); 

  return $users;
}

if(isset($_POST['deleteAdmin']))
{
  //OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);

  //QUERY WITH EXECUTION TO DATABASE, DELETES CHOSEN ADMIN
  $query = "DELETE FROM admins
  WHERE adminID = ?";

  $adminID = $_POST['deleteAdmin'];
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $adminID);
  $stmt->execute();
  $conn->close(); 
}


?>