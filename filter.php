<?php

//RETURNS QUERY DEPENDING ON WHAT USER WANTS TO FILTER BY
function getCategoryQuery($category)
{
  switch ($category) {
    case '1':
      return "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = 1";
      break;
    case '2':
      return "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = 2";
      break;
    case '3':
      return "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = 3";
      break;
    case '4':
      return "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = 4";
      break;
    case '5':
      return "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = 5";
      break;
    case '6':
      return "none";
      break;
  }
}


function filterByCategory()
{
  function SelectProducts() {
    $conn = Connection::Connection();

    $sql = "SELECT ProductID, title, color, price, image FROM Products";
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
}

function runFilter($category)
{
$query = getCategoryQuery($category);



}

runFilter($_POST['category']);