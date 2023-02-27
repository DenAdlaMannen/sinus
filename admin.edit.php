<?php session_start(); ?>
<?php require_once 'connection.php';
require_once 'products.php';
require_once 'admin.functions.php'?>

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
<style> 
    table { margin-top: 5em;}
    .card {border:none;}
    .display-4 {margin:3em;}
</style>
</head>
<body>
<h1>Admin edit</h1>


    
<?php
if (isset($_POST['submit'])){

  $_SESSION["productID"]= $_POST['submit']; 
  ?>
<?php }  
$_SESSION["product"] = ProductByID($_SESSION["productID"]); 
$products = $_SESSION["product"];

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th> 
      <th scope="col">Value</th>
      <th scope="col">New value</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php

  
   if(empty($_SESSION['update'])) { ?>

      <form action="admin.edit.php" method="post">
      <tr>
      <td>Titel: </td>
      <td><?=$products->getTitle()?></td>
      <td><input type="text" name="title" value="<?php echo @$title;?>" placeholder="New title..."></td>
      <td>
              <button name='update' value="">Update</button>
  
      </td>  
  </tr>
      </form>
      <?php } 
      
      ?>
      <?php
      if(empty($_SESSION['update'])) { ?>

      <form action="admin.edit.php" method="post">
      <tr>
      <td>Color: </td>
      <td><?=$products->getColor()?></td>
      <td><input type="text" name="color" value="" placeholder="New color..."></td>
      <td>
              <button name='update' value="">Update</button>
      </td>

      </tr>
      </form>
      <?php } ?>
      <?php
      if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>Price: </td>
        <td><?=$products->getPrice()?></td>
        <td><input type="text" name="price"value="<?php echo @$price;?>" placeholder="New price..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
      if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>Image: </td>
        <td><?=$products->getImage()?></td>
        <td><input type="text" name="image" placeholder="New image..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
        if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>CategoryID: </td>
        <td><?=$products->getCategoryID()?></td>
        <td><input type="text" name="categoryID" placeholder="New categoryID..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
          if (isset($_POST["title"])){
            
                UpdateTitle($_SESSION["productID"],$_POST["title"]);

                echo $_SESSION["productID"];
              }
          if (isset($_POST["color"])){
            
                UpdateColor($_SESSION["productID"],$_POST["color"]);
              } 
          if (isset($_POST["price"])){
            
                UpdatePrice($_SESSION["productID"],$_POST["price"]);
              }  
          if (isset($_POST["image"])){
            
                UpdateImage($_SESSION["productID"],$_POST["image"]);
               }    
          if (isset($_POST["categoryID"])){
            
                UpdateCategoryID($_SESSION["productID"],$_POST["categoryID"]);
               }        
          ?>
<a href="indexAdmin.php" align="center" class="btn btn-secondary btn-lg">Return to Admin view</a><br><br>
<a href="admin.edit.php" align="center" class="btn btn-secondary btn-lg">Relode page</a>