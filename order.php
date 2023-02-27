<?php
Class Orders
{ 
  public $orderID;
  public $customerID;
  public $orderDate;


  function __construct($orderID, $customerID, $orderDate)
  {
    $this->orderID = $orderID;
    $this->customerID = $customerID;
    $this->orderDate = $orderDate;
  }

  public function getOrderID() {
    return $this->orderID;
  }
  public function getCustomerID() {
    return $this->customerID;
  }
  public function getOrderDate() {
    return $this->orderDate;
  }
}

function SelectOrders() {
    $conn = Connection::Connection();
    $sql = "SELECT OrderID, CustomerID, OrderDate FROM orders";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    return $orders;
} else {
echo "0 results";
}
$conn->close();

} 