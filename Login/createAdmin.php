
<?php require 'checkTest.php'?>
<?php require 'createAdminClass.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="login-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
 <!-- CONTAINER START -->
  <div class="container">

  <!-- HEADER START! -->
  <div class="header">
    <div>
    <h2 class="loginHeader">Create Admin</h2>
    <img src="../sinusmaterial\sinus assets\logo\sinus-logo-symbol.svg" class="logo" style="height: 15em;">
    </div>

  </div>
    <!-- MAIN START -->
    <div class="main">
      <div class="formDiv">
      <form action="createAdmin.php" method="POST" class="form">
        <label for="username">Username: </label>
        <input type="text" name="usernameCreate" placeholder="Username" required>
        <br><br>
        <label for="password">Password: </label>
        <input type="password" name="passwordCreate" placeholder="Password" required>
        <br><br>
        <label for="repassword">Repeat: </label>
        <input type="password" name="repasswordCreate" placeholder="Password" required>
        <br><br>
        <input type="submit" value="Create user" class="loginBtn btn btn-outline-secondary">
      </form>
      <!-- DISPLAYS ERROR MSG IF THE INPUT IS NOT CORRECT -->
      <?php if(isset($userExist)){ echo '<script>alert("Username already exists!")</script>'; }?>
      <?php if(isset($notEqualPass)){ echo '<script>alert("Passwords must match!")</script>'; }?>
      <a href="../indexAdmin.php" class="customerLink">BACK TO ADMIN PAGE</a>
      </div>
    </div>


</div>
  
</body>
</html>