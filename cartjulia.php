<?php require_once 'connection.php';?>
<?php session_start(); ?>

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
    <div class="container">
    <?php require 'menu.php'?>
    <div class="main">
    <div class="productFlexBox">

<?php if(!empty($_SESSION['Cart'])) { ?>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th> <!-- CAN LATER BE USED FOR QUANTITY? -->
      <th scope="col">Product</th>
      <th scope="col">Color</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php } ?>
<?php
if(!empty($_SESSION['Cart'])) {
    $unpackCart = implode(',', $_SESSION['Cart']);

    $conn = Connection::Connection();
    $calcTotalPrice = 0;

    foreach ($_SESSION['Cart'] as $item) {
        $stmt = $conn->prepare("SELECT *
        FROM Products
        WHERE ProductID=?;");

    $stmt->bind_param("s", $item);

    $stmt->execute();

    $result = $stmt->get_result();
   
    while($row = $result->fetch_assoc()) { ?>
     <tr>
      <th scope="row">1</th>
      <td><?php echo $row['Title'];?></td>
      <td><?php echo $row['Color'];?></td>
      <td><?php echo $row['Price'];?> kr</td>
    </tr> 
<?php  $calcTotalPrice = $calcTotalPrice + $row['Price'];
    }
 } 
}
else { ?> 
    <h1 class="display-4">Cart is empty</h1>
<?php } ?> 

</tbody>
<?php if(!empty($_SESSION['Cart'])) { ?>
<thead class="thead-dark">
    <tr>
      <th scope="col"> </th> <!-- CAN LATER BE USED FOR QUANTITY? -->
      <th scope="col"> </th>
      <th scope="col"> </th>
      <th scope="col"><?php echo $calcTotalPrice?> kr</th>
    </tr>
  </thead>
</table>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="checkout.php" class="btn btn-outline-secondary">Checkout</a>
  </div>
  <div class="card-body">
    <form method="POST" action="cart.php">
    <Input type="submit" name="emptycart" class="btn btn-outline-secondary" value="Empty cart"/>
    </form>
  </div>
</div>
<?php } ?>
  </div>
    </div>
    <div class="footer"></div>
  </div>
</body>
</html>

<!-- CODE RELATED TO SEARCH-FUNCTIONS -->
<?php
if(isset($_POST["search"]))
{
    require 'search.php';
}
else if(isset($_POST['category']) || isset($_POST['color']) || isset($_POST['price']))
{
    require 'filter.php';
}
?>

<!-- TRIGGER FOR EMPTY CART -->
<?php
if(isset($_POST["emptycart"]))
{
    session_destroy();
}
?>