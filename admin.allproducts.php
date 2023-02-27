<?php require_once 'connection.php';
require_once 'admin.functions.php'?>


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ProcuctID</th> 
        <th scope="col">Titel</th>
        <th scope="col">Color</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">CategoryID</th>
        <th scope="col"></th>
      </tr>
    </thead>
  <tbody>
<?php
 $productList = SelectProducts();  

 foreach ($productList as $product){?>
    <tr>
        <td><?= $product["ProductID"]?></td>
        <td><?= $product["title"]?></td>
        <td><?= $product["color"]?></td>
        <td><?= $product["price"]?> kr</td>
        <td><?= $product["image"]?></td>
        <td><?= $product["categoryID"]?></td>
        <td>
            <form action="admin.edit.php" method='post'>
                <button name='submit' value=<?php echo $product['ProductID']; ?>>Edit</button>
            </form>
        </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
