<div class="addForm">
  <h2>Add new product</h2>
  <br><br>
<form method="POST" action="indexAdmin.php">
  <label for="productName">Product name: </label>
<input type="text" name="productName" class="addInput" placeholder="Product"> <br><br>
<label for="category">Category name: </label>
<input type="text" name="category" class="addInput" placeholder="Category"><br><br>
<label for="category">Color: </label>
<input type="text" name="color" class="addInput" placeholder="Color"><br><br>
<label for="category">Price: </label>
<input type="text" name="price" class="addInput" placeholder="Price"><br><br>
</form>
<form action="upload.php" method="POST" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>
</div>

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