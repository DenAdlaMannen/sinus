<?php

include_once 'connection.php';
include_once 'products.php';

function SelectCustomerByID($customerID) {
    $conn = Connection::Connection();
    $sql = "SELECT `CustomerID`, `Firstname`, `Lastname`, `Country`, `City`, `Zipcode`, `Street`, 
    `Phone`, `EmailAdress` FROM `customers` WHERE  CustomerID = $customerID ;
    $result = $conn->query($sql);

if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) {
        $customer = new customer($row["firstName"], $row["lastName"], $row["country"], $row["city"], 
        $row["zipcode"], $row["street"], $row["phone"], $row["email"]);
        return $customer;
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

    $sql = "SELECT `OrderLineID`, `ProductID`, `OrderID`, `Quantity`, `TotalPrice` FROM `orderline` WHERE orderid =  $orderID";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $orderlines = new orderLine($row["OrderLineID"], $row["productID"], $row["orderID"], $row["quantity"], $row["totalprice"]);
      return $orderlines;
    }

} else {
echo "0 results";
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
}