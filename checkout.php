<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<body>

<?php require_once 'connection.php';?>

<?php session_start(); ?>

<?php require_once 'connection.php';?>

<style>.alignText {
    padding-top: 2em;
  padding-left:20px;
}
</style>

<div class=alignText>
<h3>You have chosen the follwing items:</h3>

<?php
function getItemsInCartList($sessionCart) {
    $itemsInCartList = array();
    

    if (!empty($sessionCart)) {
        $unpackCart = implode(',', $sessionCart);

        $conn = Connection::Connection();
        $calcTotalPrice = 0;

        foreach ($sessionCart as $item) {
            $stmt = $conn->prepare("SELECT *
                FROM Products
                WHERE ProductID=?;");

            $stmt->bind_param("s", $item);

            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $itemsInCartList[] = $row; // saves query result as array
                $calcTotalPrice = $calcTotalPrice + $row['Price'];
                echo  "<br>" . "&bull; " . $row["Title"].  ", " . $row['Color'] .  ", ". $row['Price']. " SEK" . "<br>";

            }
            
        }
    }echo "<br>" . "<h5>total price for order:   $calcTotalPrice SEK</h5>";

    return $itemsInCartList;
}
?>

<?php
$itemsInCartList = getItemsInCartList($_SESSION['Cart']);
$orderLineLength = sizeof($itemsInCartList);
?></div>


<?php
//var_dump($orderLineLength);
/*echo "<pre>";
echo print_r($itemsInCartList);
echo "</pre>";*/

//print_r($itemsInCartList);

$firstName = $lastName = $country = $city = $zipcode = $street = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] ==  "POST") {


    if (isset($_POST['firstname'])) {
        $firstName = test_input($_POST["firstname"]);
    }
    if (isset($_POST['lastname'])) {
        $lastName = test_input($_POST["lastname"]);
    }
    if (isset($_POST['country'])) {
        $country = test_input($_POST["country"]);
    }
    if (isset($_POST['city'])) {
        $city = test_input($_POST["city"]);
    }
    if (isset($_POST['zipcode'])) {
        $zipcode = test_input($_POST["zipcode"]);
    }
    if (isset($_POST['street'])) {
        $street = test_input($_POST["street"]);
    }
    if (isset($_POST['city'])) {
        $city = test_input($_POST["city"]);
    }
    if (isset($_POST['tel'])) {
        $phone = test_input($_POST["tel"]);
    }
    if (isset($_POST['email'])) {
        $email = test_input($_POST["email"]);
    }

    
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<style>.centerForm {
  width: 30em;
  margin: 0 auto;
}
</style>

<div class=centerForm>
<div class="addForm">
<fieldset>
    <legend><h2>Checkout</h2></legend>
    <form method="post">
        <input type="hidden" name="action" value="checkout" class="addInput">
        <label for="FirstName">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        <br>
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
        <br>
        <br>
        <label for="City">City:</label>
        <input type="text" id="city" name="city" required>
        <br>
        <br>
        <label for="FirstName">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required>
        <br>
        <br>
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
        <h3>Payment method</h3>
        <input type="radio" name="card" value="Visa" required>Visa debit card
        <br>
        <input type="radio" name="card" value="Mastercard">Mastercard
        <br>
        <br>
        Card Number: <input type="text" name="namn" required>
        <br>
        CVV Numbers <input type="text" name="cvv" required>
        <br>
        <br>
        <button>Submit Order</button>
    </form>
</fieldset>
</div>
</div>

<?php
include_once "customer.php";
require_once "connection.php";
include_once "orderFunctions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["country"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"]) && !empty($_POST["street"]) && !empty($_POST["tel"]) && !empty($_POST["email"]) )

{


$newCustomer = New Customer ($_POST["firstname"], $_POST["lastname"],$_POST["country"],$_POST["city"],$_POST["zipcode"],$_POST["street"],$_POST["tel"],$_POST["email"]);

$conn = Connection::Connection();
$customerID = Customer::InsertCustomerDB($conn, $newCustomer); //creates a customer in db
$order_ID = OrderFunctions::CreateOrder($customerID); //creates an order in db, linking customer
OrderFunctions::CreateOrderLine($order_ID, $orderLineLength, $itemsInCartList);

//echo "THIS IS ORDER ID: " . $order_ID;

//var_dump($newCustomer);
if (count($_POST)>0) echo '<h3>Thank you for shopping at Sinus!</h3>';
echo "<h5>Your ordernumber is: #  $order_ID</h5>";

/*echo "<pre>";
echo print_r($itemsInCartList);
echo "</pre>";*/

echo "You have bought the following items <br>"; //makes a printout of items bought
for ($i =0; $i<$orderLineLength; $i++)
{

echo $itemsInCartList[$i]["Title"] . ", " . $itemsInCartList[$i]["Color"] . ", " . $itemsInCartList[$i]["Price"] ." SEK. <br>";
}

session_destroy();
}
?>

<a href="index.php">Back to main</a>

<?php 
?>

</body>
</html>