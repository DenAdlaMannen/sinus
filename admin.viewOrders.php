<?php require_once 'connection.php';
require_once 'order.php';
require_once 'admin.functions.php'?>
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
</head>
<body>

    <table class="table">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Order ID</th> 
      <th scope="col">Customer ID</th>
      <th scope="col">Orderdate</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php

 $orders = SelectOrders();  

 foreach ($orders as $order){?>
    <tr>
      
        <td><?= $order["OrderID"]?></td>
        <td><?= $order["CustomerID"]?></td>
        <td><?= $order["OrderDate"]?></td>
        <td>
            <form action="admin.orderDetails.php" method='post'>
                <button name='submit'  value=<?php echo $order['OrderID']; ?> >View</button>
            </form>
        </td>
        
    </tr>
    <?php } ?>
