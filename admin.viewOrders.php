
<?php require_once 'connection.php';
require_once 'order.php';
require_once 'admin.functions.php'?>


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
