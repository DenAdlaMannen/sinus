<?php
//use FTP\Connection;
?>
<div class="header">
      <div class="image">
        <a href="index.php"><img src="sinusmaterial/sinus assets/logo/sinus-logo-landscape - large.png" class="logoHeader"></a>
      </div>
  <!-- NOT NEEDED ANYMORE? -->


      <!-- <div class="search">
        <form action="index.php" method="POST">
          <input name="search" placeholder="Search Product" type="text" class="searchBar">
          <input type="submit" value="&#128269;" class="searchBtn">
        </form>

          <button class="cart"><a href="cart.php" class="cartBtn">&#128722;</a></button>
      </div> -->
      
      <div class="menu">
      <!-- TEST---------------------------------------------------------- -->
    <?php 

  include_once 'connection.php';
  function printCategories()
  {
    $connMenu = Connection::Connection();
    $connMenu2 = Connection::Connection();

    $query = "SELECT DISTINCT CategoryName
    FROM category";

    $result = mysqli_query($connMenu, $query);

    $query2 = "SELECT DISTINCT Color
    FROM Products";
    $result2 = mysqli_query($connMenu2, $query2);
 
     $counter = 1;
     

    ?>


  <select id="category" name="category">
  <option value="0">None</option>
<?php
    //ALL RESULTS STORED IN ROW IN ASSOC ARRAY BELOW
    while (($row = mysqli_fetch_assoc($result))) {
        ?>
  <?php if($row['CategoryName'] != Null) { return?> <option value=<?php echo $counter?>><?php echo $row['CategoryName'] ?></option> <?php } ?>
   
<?php $counter++;}?>
</select><br>

<?php
  }

?>
  

<input type="radio" id="radioInfo" name="color" value="0">
<label for="radioInfo">None</label><br>
<?php
while ($row2 = mysqli_fetch_assoc($result2)) {
?>
 <?php if($row2['Color'] != Null) { ?>   <input type="radio" id="html" name="color" value=<?php echo $row2['Color']?>>
<label for="html"><?php echo $row2['Color']?></label><br><?php } ?>
<?php } ?>
      <!-- TEST---------------------------------------------------------- -->
  <br>
<input name="btn" type="submit" value="Filter">
</form>
      </div>
    </div>