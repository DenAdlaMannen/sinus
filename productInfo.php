<?php require_once 'connection.php';
include 'moreColors.php';

?>

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
    .card-img-full {
        height: 30vh;
        width: auto; 
        margin-bottom: 2em;
    }
    .cartForm { margin: 2em; }
    .hrImage { width: 15vw;  margin: auto; }
</style>
</head>
<body>
<?php require 'adminNav.php'?>
<div class="container">
<?php require 'menu.php'?>
<!-- MAIN START -->
<div class="main">
<?php if(isset($_POST['id']) && empty($_POST['addtocart'])) {
ViewProduct($_POST['id']); ?>
<?php }  
?>

<?php 
    function ViewProduct($id) {
        $conn = Connection::Connection();

        /* create a prepared statement */
        $stmt = $conn->prepare("SELECT Products.ProductID, Products.Title, Products.Color, Products.Price, Products.Image, category.CategoryName, category.CategoryID
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
            <hr class="hrImage">
            <h4>Color: <?php echo $row['Color'];?></h4>
            <h4>Price: <?php echo $row['Price'];?></h4>
            <h4>Category: <?php echo $row['CategoryName'];?></h4>
            <img src="sinusmaterial/sinus assets/products/<?php echo $row["Image"]?>" class="card-img-full" alt="...">
            <form method="POST"> 
                <input type="submit" name ="addtocart" class="btn btn-outline-secondary" value="Add to cart" >
                <input type="hidden" name="id" value="<?php echo $row["ProductID"]; ?>"/>
            </form>
            <hr> 
        </div>

        <?php      
        
       
        //not the optimal location for the method call, but currently the easiest way to access the variables
        ViewOtherColors($row["CategoryID"], $row["ProductID"]); 
    }
    } 

 ?>
   
    ?>
    <div>
  
        </div>
        
        <!-- INCLUDES ADD TO CART IF PRESSED -->
        <?php if(isset($_POST["addtocart"]))
{
    include "confirmCart.php";
} ?>

<div> 
</div>
</div>
    <!-- FOOTER START -->
    <div class="footer"></div>
  </div>
</body>
</html>

