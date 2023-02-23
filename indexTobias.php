<?php require 'connection.php'?>
header('Content-type: image/jpeg');
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinus</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<style> 
/* .productFlexBox {
    display: grid;
} */

.card {
display:inline-block;
margin: 4em;
}
</style>

</head>
<body>

 <!-- CONTAINER START -->
  <div class="container">

  <!-- HEADER START -->
  <?php require 'menu.php'?>


    <!-- MAIN START -->
<div class="main">
   
<div class="productFlexBox"> 
<?php 
$productList = SelectProduct();?>  

<?php 
foreach($productList as $product)  
  {  
    ?> 
    <div class="card" style="width: 18rem;">
        <img src="sinusmaterial/sinus assets/products/hoodie-fire.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $product["title"]; ?> </h4>
            <h5 class="card-title"><?php echo $product["color"]; ?> </h5>
            <h6 class="card-title"><?php echo $product["price"]; ?> </h6>
            <a href="#" class="btn btn-primary">Details</a>
        </div>
    </div>      

   

    <?php  
    }  
?>  

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
<?php 
    function SelectProduct() {
        $conn = Connection::Connection();

        $sql = "SELECT title, color, price, image FROM Products";
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
?>



</div>

<div>
    
</div>

    </div>

    <!-- FOOTER START -->
    <div class="footer"></div>


  </div>
</body>
</html>