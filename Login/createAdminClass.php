<?php 
function usernameExist()
{

  //OPEN CONNECTION
  $conn = Connection::Connection();

  //THE USERS INPUT
  $username = $_POST['username'];

  //FETCH ANSWERS FROM DATABASE
  $query = "SELECT Username
  FROM admins
  WHERE Username = ?";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 

  //SUCCESSFULL, USERNAME DOES NOT EXIST
  if($users == NULL)
  {
    return false;
  }
  //UNSUCCESSFULL, USERNAME EXISTS
  else{
      return true;
      $failedLogIn = true;
      }
}
?>