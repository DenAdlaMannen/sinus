<?php 

Class Products
{ 
  public $title;
  public $categoryId;
  public $color;
  public $price;
  public $imagePath;

  function __construct($title, $categoryId, $color, $price, $imagePath)
  {
    this.$title = $title;
    this.$categoryId = $categoryId;
    this.$color = $color;
    this.$price = $price;
    this.$imagePath = $imagePath;
  }
}