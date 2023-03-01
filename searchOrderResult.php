<style>
    #titleOrder { text-align: center; }
</style>

<?php
$conn = Connection::Connection();
$stmt = $conn->prepare("SELECT Products.ProductID, Products.Title, Products.Color, 
                                orderline.Quantity, Customers.Firstname, Customers.Lastname, Customers.Street, 
                                Customers.Zipcode, Customers.City, Customers.Phone, Orders.OrderID
                                FROM Products
                                INNER JOIN Orderline
                                ON Products.ProductID = Orderline.ProductID
                                INNER JOIN Orders
                                ON Orderline.OrderID = Orders.OrderID
                                INNER JOIN Customers
                                ON Orders.CustomerID = Customers.CustomerID
                                WHERE Orders.OrderID = ?;");

$stmt->bind_param("s", $_POST['order']);
$stmt->execute();
$result = $stmt->get_result(); ?>
<h3 id="titleOrder">Orderlines related to orderID <?php echo $_POST['order'] ?></h3>
<hr>
<table class="table">
<thead class="thead-dark">
  <tr>
    <th scope="ProductID">ProductID</th> 
    <th scope="Title">Title</th>
    <th scope="Color">Color</th>
    <th scope="Name">Name</th>
    <th scope="Street">Street</th>
    <th scope="Zipcode">Zipcode</th>
    <th scope="City">City</th>
  </tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()) { ?> 
    <tr>
    <td><?php echo $row['ProductID'];?></td>
    <td><?php echo $row['Title'];?></td>
    <td><?php echo $row['Color'];?></td>
    <td><?php echo $row['Firstname'] . " " . $row['Lastname'];?></td>
    <td><?php echo $row['Street'];?></td>
    <td><?php echo $row['Zipcode'];?></td>
    <td><?php echo $row['City'];?></td>
  </tr>     
<?php } ?>

    </tbody>
</table>