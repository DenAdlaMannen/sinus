

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinus</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'adminNav.php'?>
 <!-- CONTAINER START -->
<div class="container">
<div class="header">
<?php require 'menuAdmin.php'?>
</div>
<div class="main">
<?php
if(isset($_POST["showProducts"]))
{
    include("admin.allproducts.php");
}
if(isset($_POST["newProduct"]))
{
    include("addProductsAdmin.php");
}
if(isset($_POST["viewOrders"]))
{
    include("#");
}
if(isset($_POST["searchOrder"]))
{
    include("#");
}
?>
</div>

<div class="footer"></div>
</div>
</div>
</body>
</html>