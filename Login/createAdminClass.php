<?php 
function usernameExist()
{
//OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);


  //THE USERS INPUT
  $username = $_POST['usernameCreate'];

  //FETCH ANSWERS FROM DATABASE
  $query = "SELECT Username
  FROM admins
  WHERE Username = ?";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
  //SUCCESSFULL, USERNAME DOES NOT EXIST
  if(empty($users))
  {
    return false;
  }
  //UNSUCCESSFULL, USERNAME EXISTS
  else{
      return true;
      }
}

function createAdmin()
{
//OPEN CONNECTION
$serverHost= "Localhost";
$dbName = "sinus";
$dbHost ="root";
$password = "";

$conn = new mysqli($serverHost, $dbHost, $password ,$dbName);

  //THE USERS INPUT
  $username = $_POST['usernameCreate'];
  $password = $_POST['passwordCreate'];

  //FETCH ANSWERS FROM DATABASE
  $query = "INSERT INTO admins (Username, Password) VALUES (?, md5(?))";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();

  //$users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
  echo '<script>alert("Successfully created your new admin account!")</script>';
}


///////////////////////////////////////
//THE PROGRAM STARTS TO RUN FROM HERE//
///////////////////////////////////////

//CHECK IF EVERYTHING IS SET
if(isset($_POST['usernameCreate']) && isset($_POST['passwordCreate']) && isset($_POST['repasswordCreate']))
{
//IF username already exists (true), then display error msg on createAdmin.php page.
if(usernameExist())
{
  $userExist = true;
}
//IF NOT, THEN RUN CREATEADMIN
else
{
  if($_POST['passwordCreate'] == $_POST['repasswordCreate'])
  {
    createAdmin();
  }
  else
  {
    $notEqualPass = true;
  }

}
}


?>

