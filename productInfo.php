<?php require 'connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Info</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<style>
    .productView {text-align:center;}
</style>
</head>
<body>

    <!-- CONTAINER START -->
    <div class="container">

  <!-- HEADER START -->
<?php require 'menu.php'?>

<!-- MAIN START -->
<div class="main">
    
<?php if ($_POST['id'] != null) {
ViewProduct($_POST['id']); ?>
<?php }  
?>

<?php 
    function ViewProduct($id) {
        $conn = Connection::Connection();

        /* create a prepared statement */
        $stmt = $conn->prepare("SELECT Products.Title, Products.Color, Products.Price, category.CategoryName 
                                FROM Products
                                INNER JOIN category
                                ON Products.CategoryID = category.CategoryID
                                WHERE ProductID=?;");

        /* bind parameters for markers */
        $stmt->bind_param("s", $id);

        /* execute query */
        $stmt->execute();
        /* bind result variables */
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()) { ?>
        <div class="productView">
           <h1><?php echo $row['Title'];?></h1>
           <hr>
           <h4>Color: <?php echo $row['Color'];?></h4>
           <h4>Price: <?php echo $row['Price'];?></h4>
           <h4>Category: <?php echo $row['CategoryName'];?></h4>
           <form method="POST"> 
                <input type="submit" value="Add to cart" >
                <input type="hidden" name="id" value="<?php echo $product["ProductID"]; ?>"/>
            </form>
        </div>
<?php      }
    } 
?>

<div> 
</div>
</div>

    <!-- FOOTER START -->
    <div class="footer"></div>

  </div>
</body>
</html>

