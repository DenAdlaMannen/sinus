<div class="addForm">
  <h2>Add new product</h2>
  <br><br>

  <form method="POST" action="upload.php" enctype="multipart/form-data">
  <label for="productName">Product name: </label>
  <input type="text" name="productName" class="addInput" placeholder="Product" required> <br><br>
  <label for="category">Category name: </label>
  <input type="text" name="category" class="addInput" placeholder="Category" required><br><br>
  <label for="color">Color: </label>
  <input type="text" name="color" class="addInput" placeholder="Color" required><br><br>
  <label for="price">Price: </label>
  <input type="text" name="price" class="addInput" placeholder="Price" required><br><br>
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