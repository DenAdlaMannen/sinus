<!DOCTYPE html>
<html>
<body>

<body>

<p>You have chosen the follwing items:</p>
<br>
<?php require_once 'connection.php';?>
<?php session_start(); ?>

<?php

$itemsInCartList;
$orderLineLength;

if(isset($_POST["sessionCart"]))
{
    if(!empty($_SESSION['Cart'])) {
        $unpackCart = implode(',', $_SESSION['Cart']);
    
        $conn = Connection::Connection();
        $calcTotalPrice = 0;
    
        foreach ($_SESSION['Cart'] as $item) {
            $stmt = $conn->prepare("SELECT *
            FROM Products
            WHERE ProductID=?;");
    
        $stmt->bind_param("s", $item);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
       
        while($row = $result->fetch_assoc()) { 
            $itemsInCartList[]=$row; //collects all search results in array
            ?>
         <tr>
          <th scope="row">1</th>
          <td><?php echo $row['Title'];?></td>
          <td><?php echo $row['Color'];?></td>
          <td><?php echo $row['Price'];?> kr</td>
          <td><?php echo $row['ProductID'];?></td>;
        </tr> 
    <?php  $calcTotalPrice = $calcTotalPrice + $row['Price'];
        }

     } 
    }
    echo "<br>";
    $orderLineLength = sizeof($itemsInCartList);//Size of order lines
    echo "<br>";
    var_dump($orderLineLength); 
    echo "<br>";
    echo "Lista på * query: ";
   
    echo "<pre>";
    echo print_r($itemsInCartList);
    echo "</pre>";

    echo "<br>";
    echo $itemsInCartList[0]['Color'];


}
/*?>

<?php*/

$firstName = $lastName = $country = $city = $zipcode = $street = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] ==  "POST") {

    $firstName = test_input($_POST["firstname"]);
    $lastName = test_input($_POST["lastname"]);
    $country = test_input($_POST["country"]);
    $city = test_input($_POST["city"]);
    $zipcode = test_input($_POST["zipcode"]);
    $street = test_input($_POST["street"]);
    $city = test_input($_POST["city"]);
    $phone = test_input($_POST["tel"]);
    $email = test_input($_POST["email"]);
    
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<fieldset>
    <legend>Checkout</legend>
    <form method="post">
        <input type="hidden" name="action" value="checkout">
        <label for="FirstName">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        <br>
        <label for="LastName">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
        <br>
        <br>
        <label for="country">Country:</label>
        <select name="country" required>
            <option value="" disabled selected>Choose Country</option>
            <option value="Denmark">Denmark</option>
            <option value="Finland">Finland</option>
            <option value="Norway">Norway</option>
            <option value="Sweden">Sweden</option>
        </select>

        <label for="City">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="FirstName">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required>

        <label for="Street">Street name:</label>
        <input type="text" id="street" name="street" required>
        <br>
        <br>
        <label for="phone">Mobile phone Number:</label>
        <input type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{7}" required> 
        <br>
        <small>In the following format: 123-4567890</small>
        </select>
        <br>
        <br>
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" required>
        
        <br>
        <br>
        <br>
        <h2>Payment method</h2>
        <input type="radio" name="card" value="Visa" required>Visa debit card
        <br>
        <input type="radio" name="card" value="Mastercard">Mastercard
        <br>
        <br>
        Card Number: <input type="text" name="namn" required>
        <br>
        CVS Numbers <input type="text" name="cvs" required>
        <br>
        <br>
        <button>Submit Order</button>
    </form>
</fieldset>
</form>

<?php

include_once "customer.php";
require_once "connection.php";
include_once "orderFunctions.php";


$newCustomer = New Customer ($_POST["firstname"], $_POST["lastname"],$_POST["country"],$_POST["city"],$_POST["zipcode"],$_POST["street"],$_POST["tel"],$_POST["email"]);

$conn = Connection::Connection();
$customerID = Customer::InsertCustomerDB($conn, $newCustomer); //creates a new customer in db and returns  id
$order_ID = OrderFunctions::CreateOrder($customerID); // creates a new order in db and returns id
OrderFunctions::CreateOrderLine($order_ID,$orderLineLength, $itemsInCartList);

var_dump($customerID);
echo "<br>";
echo "here is order_ID ";
var_dump($order_ID);



?>
<?php if (count($_POST)>0) echo '<h1>Thank you for shopping at Sinus!</h1>'; ?>

</body>
</html>