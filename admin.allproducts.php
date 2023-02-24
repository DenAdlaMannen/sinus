<?php require 'connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sinus admin</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
    function SelectProducts() {
        $conn = Connection::Connection();

        $sql = "SELECT title, color, price, image, categoryID FROM Products";
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
    $productList = SelectProducts();  
    ?>
    <table>
<tr>
        <td>Title</td>
        <td>Color</td>
        <td>Price</td>
        <td>Image</td>
        <td>ProductID</td>
    </tr>
    
    <?php foreach ($productList as $product){?>
    
    <tr>
        <td><?= $product["title"]?></td>
        <td><?= $product["color"]?></td>
        <td><?= $product["price"]?></td>
        <td><?= $product["image"]?></td>
        <td><?= $product["categoryID"]?></td>
   
    </tr>
    <?php } ?>
</table>

</body>
</html>


?>






 






