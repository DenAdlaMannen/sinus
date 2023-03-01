
<?php require_once 'connection.php';
require_once 'products.php';
require_once 'admin.functions.php'?>



</head>
<body>



    
<?php
if (isset($_POST['edit'])){

  $_SESSION["productID"]= $_POST['edit']; 
  ?>
<?php }  
$_SESSION["product"] = ProductByID($_SESSION["productID"]); 
$products = $_SESSION["product"];

?>

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
    
    <?php

  
   if(empty($_SESSION['update'])) { ?>

      <form action="admin.edit.php" method="post">
      <tr>
      <td>Titel: </td>
      <td><?=$products->getTitle()?></td>
      <td><input type="text" name="title" requied value="<?php echo @$title;?>" placeholder="New title..."></td>
      <td>
              <button name='update' value="">Update</button>
  
      </td>  
  </tr>
      </form>
      <?php } 
      
      ?>
      <?php
      if(empty($_SESSION['update'])) { ?>

      <form action="admin.edit.php" method="post">
      <tr>
      <td>Color: </td>
      <td><?=$products->getColor()?></td>
      <td><input type="text" name="color" value="" placeholder="New color..."></td>
      <td>
              <button name='update' value="">Update</button>
      </td>

      </tr>
      </form>
      <?php } ?>
      <?php
      if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>Price: </td>
        <td><?=$products->getPrice()?></td>
        <td><input type="text" name="price"value="<?php echo @$price;?>" placeholder="New price..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
      if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>Image: </td>
        <td><?=$products->getImage()?></td>
        <td><input type="text" name="image" placeholder="New image..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
        if(empty($_SESSION['update'])) { ?>

        <form action="admin.edit.php" method="post">
        <tr>
        <td>CategoryID: </td>
        <td><?=$products->getCategoryID()?></td>
        <td><input type="text" name="categoryID" placeholder="New categoryID..."></td>
        <td>
                <button name='update' value="">Update</button>
        </td>

        </tr>
        </form>
        <?php } ?>
        <?php
          if (isset($_POST["title"])){
            
                UpdateTitle($_SESSION["productID"],$_POST["title"]);

                echo $_SESSION["productID"];
              }
          if (isset($_POST["color"])){
            
                UpdateColor($_SESSION["productID"],$_POST["color"]);
              } 
          if (isset($_POST["price"])){
            
                UpdatePrice($_SESSION["productID"],$_POST["price"]);
              }  
          if (isset($_POST["image"])){
            
                UpdateImage($_SESSION["productID"],$_POST["image"]);
               }    
          if (isset($_POST["categoryID"])){
            
                UpdateCategoryID($_SESSION["productID"],$_POST["categoryID"]);
              }
             
         
              ?>
        
