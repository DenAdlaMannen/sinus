
<?php require_once 'connection.php';
require_once 'products.php';
require_once 'admin.functions.php';

?>
</head>
<body>

<?php
$productID ="4";
if (isset($_POST['edit'])){

  $productID= $_POST['edit']; 
  ?>
<?php } 

// Create an object of class products 
$product = ProductByID($productID); 
?>
<!-- Print headers on the table  -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th> 
      <th scope="col">Value</th>
      <th scope="col">New value</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
  
      <!-- Edit Titel -->
      <form action="indexAdmin.php" method="post">
        <tr>
            <td>Titel: </td>
            <td><?=$product->getTitle()?></td>
            <td><input type="text" name="title" value="" placeholder="New title..."></td>
            <td>
            <button name='edit' value=<?php echo $productID ?>>Update</button>
            </td>  
        </tr>
      </form>

      <!-- Edit Color -->
      <form action="indexAdmin.php" method="post">
        <tr>
          <td>Color: </td>
          <td><?= $product->getColor()?></td>
          <td><input type="text" name="color" value="" placeholder="New color..."></td>
          <td>
          <button name='edit' value=<?php echo $productID ?>>Update</button>
          </td>
        </tr>
      </form>
    

      <!-- Edit Price -->
        <form action="indexAdmin.php" method="post">
        <tr>
          <td>Price: </td>
          <td><?=$product->getPrice()?></td>
          <td><input type="text" name="price" value= "" placeholder="New price..."></td>
          <td>
          <button name='edit' value=<?php echo $productID ?>>Update</button>
          </td>
        </tr>
      </form>
            
  
  
        <!-- Edit Image -->
        <form action="indexAdmin.php" method="post">
          <tr>
            <td>Image: </td>
            <td><?=$product->getImage()?></td>
            <td><input type="text" name="image" placeholder="New image..."></td>
            <td>
            <button name='edit' value=<?php echo $productID ?>>Update</button>
            </td>
          </tr>
        </form>


        
  
        <!-- Edit CategoryID -->
        <form action="indexAdmin.php" method="post">
        <tr>
          <td>CategoryID: </td>
          <td><?= $product->getCategoryID()?></td>
          <td><input type="text" name="categoryID" placeholder="New categoryID..."></td>
          <td>
          <button name='edit' value=<?php echo $productID ?>>Update</button>
          </td>
        </tr>
        </form>
   
        <?php
          if (isset($_POST["title"])){
                UpdateTitle($productID,$_POST["title"]);
              }

          if (isset($_POST["color"])){
                UpdateColor($productID ,$_POST["color"]);
              } 

          if (isset($_POST["price"])){
                UpdatePrice($productID ,$_POST["price"]);
              }  

          if (isset($_POST["image"])){
                UpdateImage($productID ,$_POST["image"]);
               }    

          if (isset($_POST["categoryID"])){
                UpdateCategoryID($productID ,$_POST["categoryID"]);
              }

        ?>
        
