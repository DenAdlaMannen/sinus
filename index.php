<?php include 'connection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinus</title>
  <link rel="stylesheet" href="style.css">


</head>
<body>

 <!-- CONTAINER START -->
  <div class="container">

  <!-- HEADER START -->
  <?php require 'menu.php'?>


    <!-- MAIN START -->
    <div class="main">

    <?php

    //CHECK IF THERE IS A SEARCH
    if(isset($_POST["search"]))
    {
      require 'search.php';
    }

    ?>

    </div>

    <!-- FOOTER START -->
    <div class="footer"></div>


  </div>
</body>
</html>