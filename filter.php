<?php


function runFilter()
{
    //OPEN CONNECTION
    $conn = Connection::Connection();

    //CHECKS IF COLOR AND CATEGORY HAS BEEN SET AND HAS A VALUE
    if(isset($_POST['color']) && isset($_POST['category']) && $_POST['color'] != 0 && $_POST['category'] != 0)
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
    else if (isset($_POST['color']) && isset($_POST['category']) && $_POST['category'] == 0)
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
    else if(isset($_POST['category']) && !isset($_POST['color']))
    {
            //query
            $query = "SELECT ProductID, title, color, price, image 
            FROM Products
            WHERE CategoryID = ?;";
      
                  //Prepare stmt
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("i", $_POST["category"]);
                  $stmt->execute();
                  $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
            
                  //Return results
                  return $results;
    }
    //SOMETHING IS WRONG...
    else
    {
      $query = "SELECT ProductID, title, color, price, image 
      FROM Products";

$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 

//Return results
return $results;
    }

    $conn->close();
}

function printProducts($results)
{
  ?>
  <style> 
  .productFlexBox {
      display: flex;
      justify-content: center;
      flex-flow: row-reverse wrap;
      background-color: white;
  } 
  .card {
      margin: 2em;
      border: none;
  }
  </style>
<?php 
if($results != null) {


foreach ($results as $row) {
  

?>

<!-- HTML CARD WITH VALUES FROM THE FOREACH -->
<div class="card" style="width: 18rem;">
  <img src="sinusmaterial/sinus assets/products/<?php echo $row['image']?>" class="card-img-top" alt="...">
  <div class="card-body">
      <h4 class="card-title"><?php echo $row["title"]; ?> </h4>
      <hr>
      <h6 class="card-title">Color:<?php echo $row["color"];?></h6>
      <h6 class="card-title"><?php echo $row["price"]; ?> kr</h6>
       
       <form method="POST" action="productInfo.php"> 
          <input type="submit" name="Details">
          <input type="hidden" name="id" value="<?php echo $row['ProductID']; ?>"/>
      </form>
  </div>

</div>
<?php } ?>
<?php
}
}
printProducts(runFilter());

