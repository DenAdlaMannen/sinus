

<!-- SQL-QUERY
SELECT Products.ProductID, Products.Title, Products.Color, orderline.Quantity, Customers.Firstname, Customers.Lastname, Customers.Street, Customers.Zipcode, Customers.City, Customers.Phone
FROM Products
INNER JOIN Orderline
ON Products.ProductID = Orderline.ProductID
INNER JOIN Orders
ON Orderline.OrderID = Orders.OrderID
INNER JOIN Customers
ON Orders.CustomerID = Customers.CustomerID
WHERE Orders.OrderID =""; -->

