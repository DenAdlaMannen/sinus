<?php

include_once 'connection.php';

function ProductByID($productID) {
      $conn = Connection::Connection();

      $sql = "SELECT productID, title, color, price, image, categoryID FROM Products
      WHERE productID= $productID";
      $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $productList[] = $row;
      }
      return $productList;
  } else {
  echo "0 results";
  }
  $conn->close();
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
function SelectProducts() {
    $conn = Connection::Connection();

    $sql = "SELECT productID, title, color, price, image, categoryID FROM Products";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productList[] = $row;
    }
    return $productList;
} else {
echo "0 results";
}
$conn->close();
} 