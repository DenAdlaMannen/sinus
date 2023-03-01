<?php 

Class Products
{ 
  private $title;
  private $categoryId;
  private $color;
  private $price;
  private $image;

  function __construct($title, $categoryId, $color, $price, $image)
  {
    $this->title = $title;
    $this->categoryId = $categoryId;
    $this->color = $color;
    $this->price = $price;
    $this->image = $image;
  }

  public function getTitle() {
    return $this->title;
  }
  public function getCategoryID() {
    return $this->categoryId;
  }
  public function getColor() {
    return $this->color;
  }
  public function getPrice() {
    return $this->price;
  }
  public function getImage() {
    return $this->image;
  }

}
    function SelectProducts() {
        $conn = Connection::Connection();
        $sql = "SELECT ProductID, title, color, price, image, categoryID FROM Products";
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