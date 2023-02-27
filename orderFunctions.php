<?php
 require_once "connection.php";
 require_once "checkout.php";
 
class OrderFunctions
{
 
    public static function CreateOrder ($customerID)
    {

        $conn = Connection::Connection();

        $stmt = $conn->prepare("INSERT INTO orders (CustomerID, OrderDate) VALUES (?,?)");
        $stmt ->bind_param("is", $customerID, $nowDate);

        $nowDate = date("Y/m/d H:i:s");

        $stmt->execute();
        $order_ID = $conn->insert_id;

        return $order_ID;

    }

    public static function CreateOrderLine ($order_ID, $orderLineLength, $itemsInCartList)
    {
       $conn = Connection::Connection();

       for ($i = 0; $i<$orderLineLength; $i++)
        {
        
        $stmt = $conn->prepare("INSERT INTO orderline (ProductID, OrderID, Quantity, TotalPrice) VALUES (?,?,?,?)");
        $stmt ->bind_param("iiii",$idProduct,$order_ID,$quantity,$totalprice);

        $idProduct = $itemsInCartList[$i]['ProductID'];
        $quantity = 1;
        $totalprice = $itemsInCartList[$i]['Price'];

        $stmt->execute();
        }
        

    }

  

}

