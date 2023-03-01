<?php require_once 'connection.php';
require_once 'order.php';
require_once 'admin.functions.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<style> 
    .customer {
        display: flex;
        justify-content: space-evenly;
        padding-bottom: 5em;
    }
    .customer > div {
        height: 10vh;
        width: auto; 
        margin: 1em;
    }

</style>
</head>
<body>
<?php $orderID= $_POST['details']; 


        $result = SelectOrderlines($orderID);
        $order = SelectOrderByOrderID($orderID);
        $customer = SelectCustomerByID($order['CustomerID']);
      
    
?>
<div class = "customer" >
      <div>
          <p>Order ID <?php echo $orderID ?><p>
          <p>Orderdate <?php echo $order['OrderDate'] ?></p>
      </div>
      <div>
          <p><?php echo $customer->get_firstname();?> <?php echo $customer->get_lastName(); ?></p>
          <address><?php echo $customer->get_street();?><br>
          <?php echo $customer->get_zipcode();?> <?php echo $customer->get_city(); ?> 
          <br><?php echo $customer->get_country(); ?>
          </address>
      </div>
      <div>
          <p><?php echo $customer->get_phone(); ?></p>
          <p><?php echo $customer->get_email(); ?></p>
      </div>

</div>
  

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



