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

function getFilterQuery()
{
if(isset($_POST['color']) && isset($_POST['category']))
{
  $query = "SELECT ProductID, title, color, price, image 
  FROM Products
  WHERE CategoryID = ? AND
  Color = ?;
  ";
}
else if(isset($_POST['color']))
{
  $query = "SELECT ProductID, title, color, price, image 
  FROM Products
  WHERE color = ?;";
}
else if(isset($_POST['category']))
{
$query = "SELECT ProductID, title, color, price, image 
FROM Products
WHERE CategoryID = ?;";
}

return $query;
}

function runFilter()
{
    $conn = Connection::Connection();
    $query = getFilterQuery();

    $countQuestionMarks = substr_count($query, '?');

    //CHECKS IF COLOR AND CATEGORY HAS BEEN SET
    if(isset($_POST['color']) && isset($_POST['category']))
    {

      //Query
      $query = "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE CategoryID = ? AND
      Color = ?;
      ";

      //Prepare stmt
      $stmt = $conn->prepare($query);
      $stmt->bind_param("is", $_POST["category"], $_POST["color"]);
      $stmt->execute();
      $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 

      //Return results
      return $results;
    }
    //OR IF ONLY COLOR HAS BEEN SET
    else if (isset($_POST['color']))
    {
      //query
      $query = "SELECT ProductID, title, color, price, image 
      FROM Products
      WHERE color = ?;";

            //Prepare stmt
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $_POST["color"]);
            $stmt->execute();
            $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
      
            //Return results
            return $results;
    }
    //OR IF ONLY CATEGORY HAS BEEN SET
    else if(isset($_POST['category']))
    {
            //query
            $query = "SELECT ProductID, title, color, price, image 
            FROM Products
            WHERE color = ?;";
      
                  //Prepare stmt
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("i", $_POST["category"]);
                  $stmt->execute();
                  $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
            
                  //Return results
                  return $results;
    }

}
