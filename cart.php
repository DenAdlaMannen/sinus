<?php require_once 'connection.php';?>
<?php session_start(); ?>

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


</head>
<body>
    <div class="container">
    <?php require 'menu.php'?>
    <div class="main">
    <div class="productFlexBox">

<?php
if(!empty($_SESSION['Cart'])) {
    $unpackCart = implode(',', $_SESSION['Cart']);

    $conn = Connection::Connection();

    foreach ($_SESSION['Cart'] as $item) {
        $stmt = $conn->prepare("SELECT *
        FROM Products
        WHERE ProductID=?;");

    $stmt->bind_param("s", $item);

    $stmt->execute();

    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) { ?>
    <h1><?php echo $row['Title'];?></h1>
    <?php var_dump($_SESSION['Cart']);?>
    <br>
<?php 
    }
 } 
}
else {
    echo "Cart is empty";
}
?> 

<?php
if(isset($_POST["search"]))
{
    require 'search.php';
}
else if(isset($_POST['category']) || isset($_POST['color']) || isset($_POST['price']))
{
    require 'filter.php';
}
?>

    </div>
    </div>
    <!-- FOOTER START -->
    <div class="footer"></div>
  </div>
</body>
</html>