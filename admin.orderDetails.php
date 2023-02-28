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
<style> 
    table { margin-top: 5em;}
    .card {border:none;}

</style>
</head>
<body>
<?php $orderID= $_POST['submit']; 


        $result = SelectOrderlines($orderID);
        $order = SelectOrderByOrderID($orderID);
        $customer = SelectCustomerByID($order['CustomerID']);
      
    
?>

    <p>Order ID <?php echo $orderID ?><p>
        <p>Order date <?php echo $order['OrderDate'] ?></p>
        <p><?php echo $customer->get_firstname();?> <?php echo $customer->get_lastName(); ?></p>
        <address><?php echo $customer->get_street();?><br>
        <?php echo $customer->get_zipcode();?> <?php echo $customer->get_city(); ?> 
        <br><?php echo $customer->get_country(); ?>
        </address>
    
        <p><?php echo $customer->get_phone(); ?></p>
        <p><?php echo $customer->get_email(); ?></p>
  

    <table class="table">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Orderline</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product name</th>
      <th scope="col">Product Price</th> 
      <th scope="col">Quantity</th>
      <th scope="col">Total price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php
  while($row = $result->fetch_assoc()) { ?>
    <tr>
    
        <td><?php echo $row['OrderLineID'];?></td>
        <td><?php echo $row['ProductID'];?></td>
        <td><?php echo $row['Title'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['Quantity'];?></td>
        <td><?php echo $row['TotalPrice'];?></td>
  </tr>
<?php } ?>



