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
    <option value="2">T-shirts</option>
    <option value="1">Hoodies</option>
    <option value="3">Skateboards</option>
    <option value="5">Caps</option>
    <option value="4">Wheels</option>
    <option value="6">None</option>
  </select>
  <br>
  <input type="radio" id="html" name="color" value="green">
<label for="html">Green</label><br>
<input type="radio" id="css" name="color" value="purple">
<label for="css">Purple</label><br>
<input type="radio" id="javascript" name="color" value="fire">
<label for="javascript">Red</label> 
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