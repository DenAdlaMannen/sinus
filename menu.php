<?php

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
        <button class="cart"><a href="" class="cartBtn">&#128722;</a></button>
      </div>
      <div class="menu">


      <!-- TAKE AWAY EVERY SELECT THAT YOU DO NOT WANT TO USE, EACH SELECT GIVES YOU ONE MORE THING TO FILTER BY -->
      <!-- NOTE THAT THIS FORM IS NOT DONE, IT IS ONLY A SUGGESTION -->
      <form action="index.php" method="POST">
  <label for="category">Choose filters :</label>
  <select id="category" name="category">
    <option value="tshirt">T-shirts</option>
    <option value="hoodie">Hoodies</option>
    <option value="skateboard">Skateboards</option>
    <option value="caps">Caps</option>
    <option value="wheels">Wheels</option>
    <option value="none">None</option>
  </select>
  <select id="color" name="color">
    <option value="green">Green</option>
    <option value="purple">Purple</option>
    <option value="blue">Blue</option>
    <option value="fire">Red</option>
    <option value="multicolor">Multicolor</option>
    <option value="none">None</option>
  </select>
  <select id="price" name="price">
    <option value="low">Price from low to high</option>
    <option value="high">Price from high to low</option>
    <option value="None">None</option>
  </select>
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