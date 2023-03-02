
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<?php 
//FUNCTIONS
function ViewFilterColor() {
  include_once 'connection.php';
  $connMenu = Connection::Connection();

  $query = "SELECT DISTINCT Color
            FROM products";
  $result = mysqli_query($connMenu, $query);
  $colors = array();?>

<?php while (($row = mysqli_fetch_assoc($result))) { ?>
  <?php if($row['Color'] != Null) { ?> 
    <?php array_push($colors, $row['Color']);
  }
}
return $colors;
}

function ViewCategories() {
  include_once 'connection.php';
  $connMenu = Connection::Connection();

  $query = "SELECT DISTINCT CategoryName
            FROM category";
  $result = mysqli_query($connMenu, $query);
  $categories = array();?>

<?php while (($row = mysqli_fetch_assoc($result))) { ?>
  <?php if($row['CategoryName'] != Null) { ?> 
    <?php array_push($categories, $row['CategoryName']);
  }
}
return $categories;
}
///END FUNCTIONS
?>
<style>.centerForm {
  width: 30em;
  margin: 0 auto;
}
</style>

<div class=centerForm>

<div class="addForm">

  <form method="POST" action="upload.php" enctype="multipart/form-data">
  <label for="productName">Product name: </label>
  <input type="text" name="productName" class="addInput" placeholder="Product" required> <br><br>

  <label for="choiceCategory">Choose from categories: </label>
<select id="choiceCategory" name="choiceCategory"class="addInput">
  <option value="" disabled selected>Choose</option>
  <?php
   $categories = ViewCategories();
  foreach ($categories as $category) {
     ?>
  <li><option value="<?php echo $category?>"><?php echo $category?></option></li>
  <?php 
  }
  ?>
  <li><option value="0">None</option></li>
  </select>
  <br>
  <br>

  <label for="category">Add new category: </label>
  <input type="text" name="category" class="addInput" placeholder="Category"> <br><br>

  <label for="choiceColor">Choose from colors: </label>
<select id="choiceColor" name="choiceColor" class="addInput">
  <option value="" disabled selected>Choose</option>
  <?php 
  $colors = ViewFilterColor();
  foreach ($colors as $color) { 
    ?>
    <li><option value="<?php echo $color?>"><?php echo $color?></option></li>
    <?php 
  }
  ?>
  <li><option value="0">None</option></li>
</select>
  <br>
  <br>

  <label for="color">Add new Color: </label>
  <input type="text" name="color" class="addInput" placeholder="Color" ><br><br>

  <label for="price">Price: </label>
  <input type="text" name="price" class="addInput" placeholder="Price" required><br><br>

  Select image to upload:
  <input type="file" name="fileToUpload" value="Choose file" id="fileToUpload"><br>
  <br>
  <input  type="submit" value="Add product" name="submit" background-color= blue;>
</form>
</div>
</div>





<div class="addForm">

<style>
  .addForm
  {
    width: 30em;
    align-self: center;
    justify-self: center;
    
  }
  .addInput
  {
    float: right;
  }

</style>