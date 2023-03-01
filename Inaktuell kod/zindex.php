<?php include 'connection.php'?>
<?php require 'products.php';
require 'zexperiment.php';
session_start();
?>

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
<?php require 'zNav.php'?>
 <!-- CONTAINER START -->
  <div class="container">

  <!-- HEADER START! -->
  
  <?php require 'menu.php'?>


    <!-- MAIN START -->
    <div class="main">


    <div class="productFlexBox"> 
    <?php

    //CHECK IF THERE IS A SEARCH
    if(isset($_POST["search"]))
    {
      require 'search.php';
    }
    else if((isset($_POST["category"])) || (isset($_POST["color"])))
    {?>

      <?php require 'filter.php'?>
<?php
    }
  else {
$productList = SelectProducts(); 
foreach($productList as $product)  
  {  
    ?> 
    <div class="card" style="width: 18rem;">
        <img src="sinusmaterial/sinus assets/products/<?php echo $product["image"]?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $product["title"]; ?> </h4>
            <hr>
            <h6 class="card-title">Color:<?php echo $product["color"];?></h6>
            <h6 class="card-title"><?php echo $product["price"]; ?> kr</h6>
            <form method="POST" action="productInfo.php"> 
                <input type="submit" class="btn btn-outline-secondary" value="Details" >
                <input type="hidden" name="id" value="<?php echo $product["ProductID"]; ?>"/>
            </form>
        </div>
    </div>  
    <?php } 

}
?>


</div>

</div>
   

    <!-- FOOTER START -->
    <div class="footer"></div>


  </div>
</body>
</html>

