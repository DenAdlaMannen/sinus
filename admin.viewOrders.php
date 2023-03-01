
<?php require_once 'connection.php';
require_once 'admin.functions.php';
?>


    <table class="table">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Order ID</th> 
      <th scope="col">Customer name</th>
      <th scope="col">Orderdate</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php
function SelectOrders() {
  $conn = Connection::Connection();
  $sql = "SELECT orders.OrderID, customers.Firstname, customers.Lastname, OrderDate 
          FROM orders 
          INNER JOIN customers on orders.CustomerID = customers.CustomerID;";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $orders[] = $row;
  }
  return $orders;
} else {
echo "0 results";
}
$conn->close();

} 
 $orders = SelectOrders();  

 foreach ($orders as $order){?>
    <tr>
      
        <td>#<?= $order["OrderID"]?></td>
        <td><?= $order["Firstname"]?> <?= $order["Lastname"]?> </td>
        <td><?= $order["OrderDate"]?></td>
        <td>
            <form action="indexAdmin.php" method='post'>
                <button name='details'  value=<?php echo $order['OrderID']; ?> >View</button>
            </form>
        </td>
        
    </tr>
    <?php } ?>
