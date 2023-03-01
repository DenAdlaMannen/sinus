<?php 
//START SESSION
session_start();

//INCLUDES AND OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);


//CHECK IF THERE IS USER INPUT
if(isset($_POST['username']) && isset($_POST['password'])) 
{
//IF THERE IS NO SESSION WITH USER
if(!isset($_SESSION['user']))
{

  //THE USERS INPUT
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  //FETCH ANSWERS FROM DATABASE
  $query = "SELECT Username, Password
  FROM admins
  WHERE Password = ?
  AND Username = ?";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss",$password, $username);
  $stmt->execute();

  $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 

  //SUCCESSFULL LOG IN
  if($users != NULL)
  {
    $_SESSION['user'] = $_POST['username'];
    Header("Location: ../indexAdmin.php");
    exit();
  }
  //UNSUCCESSFULL LOG IN
  else{
      $failedLogIn = true;
      }
}
//IF THERE IS A SESSION, HEAD THE USER TO INDEXADMIN PAGE
else if(isset($_SESSION['user']))
{
header("Location: ../indexAdmin.php");
exit();
}
}

?>