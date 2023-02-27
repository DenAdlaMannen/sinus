<?php

//use FTP\Connection;

?>

<div class="header">
      <div class="image">
        <a href="index.php"><img src="sinusmaterial/sinus assets/logo/sinus-logo-landscape - large.png" class="logoHeader"></a>
      </div>
      <div class="search">
        <form action="index.php" method="POST">
          <input name="search" placeholder="Search Product" type="text" class="searchBar">
          <input type="submit" value="&#128269;" class="searchBtn">
        </form>

          <button class="cart"><a href="cart.php" class="cartBtn">&#128722;</a></button>
      </div>
      <div class="menu">

      <!-- TEST---------------------------------------------------------- -->

    <?php 
    include_once 'connection.php';
    $connMenu = Connection::Connection();
    $connMenu2 = Connection::Connection();

    $query = "SELECT DISTINCT CategoryName
    FROM category";

    // $query = "SELECT DISTINCT products.Color, category.CategoryName
    // FROM Products
    // inner JOIN
    // category 
    // on category.CategoryID = products.CategoryID";
    $result = mysqli_query($connMenu, $query);



    // $categoryArray = array();
    // $i = 0;
    // foreach ($row as $key => $value) {
    //   $categoryArray[$i] = $value;
    //   $i++;
    // }

    $query2 = "SELECT DISTINCT Color
    FROM Products";
    $result2 = mysqli_query($connMenu2, $query2);
 
     $counter = 1;
?>
  <form action="index.php" method="POST">
  <label for="category">Choose filters :</label>
  <select id="category" name="category">
  <option value="0">None</option>
<?php
    //ALL RESULTS STORED IN ROW IN ASSOC ARRAY BELOW
    while (($row = mysqli_fetch_assoc($result))) {
        ?>
    <?php if($row['CategoryName'] != Null) { ?> <option value=<?php echo $counter?>><?php echo $row['CategoryName'] ?></option> <?php } ?>
   
<?php $counter++;}?>
</select><br>

<input type="radio" id="radioInfo" name="color" value="0">
<label for="radioInfo">None</label><br>
<?php
while ($row2 = mysqli_fetch_assoc($result2)) {
?>
 <?php if($row2['Color'] != Null) { ?>   <input type="radio" id="html" name="color" value=<?php echo $row2['Color']?>>
<label for="html"><?php echo $row2['Color']?></label><br><?php } ?>
<?php } ?>
      <!-- TEST---------------------------------------------------------- -->




      <!-- TAKE AWAY EVERY SELECT THAT YOU DO NOT WANT TO USE, EACH SELECT GIVES YOU ONE MORE THING TO FILTER BY -->
      <!-- NOTE THAT THIS FORM IS NOT DONE, IT IS ONLY A SUGGESTION -->
      <!-- <form action="index.php" method="POST">
  <label for="category">Choose filters :</label>
  <select id="category" name="category">
    <option value="2">T-shirts</option>
    <option value="1">Hoodies</option>
    <option value="3">Skateboards</option>
    <option value="5">Caps</option>
    <option value="4">Wheels</option>
    <option value="0">None</option>
  </select> -->
  <!-- <br> -->
  <!-- <input type="radio" id="html" name="color" value="green">
<label for="html">Green</label><br>
<input type="radio" id="css" name="color" value="purple">
<label for="css">Purple</label><br>
<input type="radio" id="radioInfo" name="color" value="red">
<label for="radioInfo">Red</label><br>
<input type="radio" id="radioInfo" name="color" value="grey">
<label for="radioInfo">Grey</label><br>
<input type="radio" id="radioInfo" name="color" value="blue">
<label for="radioInfo">Blue</label><br>
<input type="radio" id="radioInfo" name="color" value="multicolor">
<label for="radioInfo">Multicolor</label><br>
<input type="radio" id="radioInfo" name="color" value="black">
<label for="radioInfo">Black</label><br>
<input type="radio" id="radioInfo" name="color" value="yellow">
<label for="radioInfo">Yellow</label><br>
<input type="radio" id="radioInfo" name="color" value="pink">
<label for="radioInfo">Pink</label><br>
<input type="radio" id="radioInfo" name="color" value="white">
<label for="radioInfo">White</label><br>
<input type="radio" id="radioInfo" name="color" value="0">
<label for="radioInfo">None</label>   -->
  <!-- <select id="color" name="color">
    <option value="green">Green</option>
    <option value="purple">Purple</option>
    <option value="blue">Blue</option>
    <option value="fire">Red</option>
    <option value="multicolor">Multicolor</option>
    <option value="none">None</option>
  </select> -->
  <br>
<input name="btn" type="submit" value="Filter">
</form>
        <!-- <ul>
          <li class="menuBtn">T-shirts</li>
          <li class="menuBtn">Hoodies</li>
          <li class="menuBtn">Skateboards</li>
          <li class="menuBtn">Wheels</li>
          <li class="menuBtn">Caps</li>
        </ul> -->

        
      </div>
    </div>