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
    function SelectProducts() {
        $conn = Connection::Connection();

        $sql = "SELECT ProductID, title, color, price FROM Products";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productList[] = $row;
        }
        return $productList;
    } else {
    echo "0 results";
    }
    $conn->close();
    } 
?>