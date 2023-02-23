<?php
include_once 'search.php';
?>

<div class="header">
      <div class="image">
        <a href="index.php"><img src="sinusmaterial/sinus assets/logo/sinus-logo-landscape - large.png" class="logoHeader"></a>
      </div>
      <div class="search">
        <form action="">
          <input name="search" placeholder="Search Product" type="text" class="searchBar">
          <input type="submit" value="&#128269;" class="searchBtn">
        </form>
        <button class="cart"><a href="" class="cartBtn">&#128722;</a></button>
      </div>
      <div class="menu">


      <!-- TAKE AWAY EVERY SELECT THAT YOU DO NOT WANT TO USE, EACH SELECT GIVES YOU ONE MORE THING TO FILTER BY -->
      <!-- NOTE THAT THIS FORM IS NOT DONE, IT IS ONLY A SUGGESTION -->
      <form action="menu.php" method="POST">
  <label for="cars">Choose filters :</label>
  <select id="cars" name="cars">
    <option value="volvo">T-shirts</option>
    <option value="saab">Hoodies</option>
    <option value="fiat">Skateboards</option>
    <option value="fiat">Caps</option>
    <option value="fiat">Wheels</option>
    <option value="None">None</option>
  </select>
  <select id="cars" name="cars">
    <option value="volvo">Green</option>
    <option value="saab">Purple</option>
    <option value="fiat">Blue</option>
    <option value="None">Orange</option>
  </select>
  <select id="cars" name="cars">
    <option value="volvo">Price from low to high</option>
    <option value="saab">Price from high to low</option>
    <option value="None">Recommended</option>
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