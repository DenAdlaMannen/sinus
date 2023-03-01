<?php
include_once 'connection.php';
include_once 'products.php';
include_once 'customer.php';

function SelectCustomerByID($customerID) {
    $conn = Connection::Connection();
      $sql = "SELECT firstname, lastname, country, city, zipcode, street, phone, email FROM customers where customerID = $customerID";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $customer = new customer($row["firstname"], $row["lastname"], $row["country"], $row["city"], $row["zipcode"], $row["street"], $row["phone"], $row["email"]);
          return $customer;
        }
   
    } else {
    echo "0 results";
    }
    $conn->close();
}

function ProductByID($productID) {
      $conn = Connection::Connection();
      $sql = "SELECT title, color, price, image, categoryID FROM Products
      WHERE productID= $productID";
      $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $product = new products($row["title"], $row["categoryID"], $row["color"], $row["price"], $row["image"]);
        return $product;
      }
 
  } else {
  echo "0 results";
  }
  $conn->close();
}

function SelectOrderlines($orderID){
    $conn = Connection::Connection();
    $sql = "SELECT orderline.OrderLineID, orderline.ProductID, products.Title, products.price, orderline.Quantity, OrderLine.TotalPrice
    FROM Orderline
    INNER JOIN products ON Orderline.productID = products.ProductID
    WHERE orderid = $orderID";
    $result = $conn->query($sql);
    return $result;
}

function UpdateTitle($productID, $title){

    $conn = Connection::Connection();
    $stmt = $conn->prepare("UPDATE products 
    SET title = ?
    WHERE productID = ?;");
    
    
        $stmt->bind_param("si", $title, $productID); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
}

function UpdateColor($productID, $color){

    $conn = Connection::Connection();
    $stmt = $conn->prepare("UPDATE products 
    SET color = ?
    WHERE productID = ?;");
    
    
        $stmt->bind_param("si", $color, $productID); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
}

function UpdatePrice($productID, $price){

    $conn = Connection::Connection();
    $stmt = $conn->prepare("UPDATE products 
    SET price = ?
    WHERE productID = ?;");
        $stmt->bind_param("ii", $price, $productID); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
}

function UpdateImage($productID, $image){

    $conn = Connection::Connection();
    $stmt = $conn->prepare("UPDATE products 
    SET image = ?
    WHERE productID = ?;");
    
    
        $stmt->bind_param("si", $image, $productID); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
}

function UpdateCategoryID($productID, $categoryID){

    $conn = Connection::Connection();
    $stmt = $conn->prepare("UPDATE products 
    SET categoryID = ?
    WHERE productID = ?;");
    
    
        $stmt->bind_param("ii", $categoryID, $productID); 
        $stmt->execute();
        $stmt->close();
        $conn->close();
}
