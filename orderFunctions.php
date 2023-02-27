<?php
 require_once "connection.php";
 
class OrderFunctions
{
 
    public static function CreateOrder ($customerID)
    {

        $conn = Connection::Connection();

        $stmt = $conn->prepare("INSERT INTO orders (CustomerID, OrderDate) VALUES (?,?)");
        $stmt ->bind_param("is", $customerID, $nowDate);

        $nowDate = date("Y/m/d H:i:s");

        $stmt->execute();
        $order_ID = $conn->insert_id; //snaking variable name so it doesn't collide with the table row "OrderID"

    }

    public static function CreateOrderLine ($order_ID, $orderLineLength, $itemsInCartList)
    {
        $conn = Connection::Connection();

        echo $itemsInCartList['ProductID'][0];

        foreach ($itemsInCartList as $item)
        {
            if (!empty($item))
            {
                $stmt = $conn->prepare("INSERT INTO orderline (ProductID, OrderID, Quantity, TotalPrice) VALUES (?,?,?,?)");
        $stmt ->bind_param("iiii",$idProduct,$order_ID,$quantity,$totalprice);

        $idProduct = $itemsInCartList[$item]['ProductID'];
        $quantity = 1;
        $totalprice = $itemsInCartList[$item]['Price'];

        $stmt->execute();
            }

        }

       /* for ($i = 0; $i<$orderLineLength; $i++)
        {
        
        $stmt = $conn->prepare("INSERT INTO orderline (ProductID, OrderID, Quantity, TotalPrice) VALUES (?,?,?,?)");
        $stmt ->bind_param("iiii",$idProduct,$order_ID,$quantity,$totalprice);

        $idProduct = $itemsInCartList[$i]['ProductID'];
        $quantity = 1;
        $totalprice = $itemsInCartList[$i]['Price'];

        $stmt->execute();
        }*/
        

    }

    public static function CreateOrderLine2 ($order_ID,$itemsInCartList)
    {
        $conn = Connection::Connection();

        
        $stmt = $conn->prepare("INSERT INTO orderline (ProductID, OrderID, Quantity, TotalPrice) VALUES (?,?,?,?)");
        $stmt ->bind_param("iiii",$idProduct,$order_ID,$quantity,$totalprice);

        $idProduct = $itemsInCartList[0]['ProductID'];
        $quantity = 1;
        $totalprice = $itemsInCartList[0]['Price'];
        
        $stmt->execute();
        
        

    }
  

}

