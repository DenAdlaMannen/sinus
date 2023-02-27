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